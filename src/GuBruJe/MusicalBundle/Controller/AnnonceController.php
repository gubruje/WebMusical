<?php

namespace GuBruJe\MusicalBundle\Controller;

use GuBruJe\MusicalBundle\Entity\Commentaire;
use GuBruJe\MusicalBundle\Form\CommentaireType;
use Symfony\Component\Form\Extension\Validator\Constraints\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GuBruJe\MusicalBundle\Entity\Annonce;
use GuBruJe\MusicalBundle\Form\AnnonceType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Annonce controller.
 *
 */
class AnnonceController extends Controller
{

    /**
     * Lists all Annonce entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $annonces = $em->getRepository('GuBruJeMusicalBundle:Annonce')->findValide();

        return $this->render('GuBruJeMusicalBundle:Annonce:index.html.twig', array(
            'annonces' => $annonces,
        ));
    }

    /**
     * Creates a new Annonce entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Annonce();
        $user = $this->getUser();
        $entity->setAuteur($user);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $statut = $this->getDoctrine()->getRepository('GuBruJeMusicalBundle:Statut')->findOneByNom('En Attente');
            $entity->setStatut($statut);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $flash = $this->get('braincrafted_bootstrap.flash');
            $flash->success('Annonce créée avec succès.');
            return $this->redirect($this->generateUrl('fos_user_profile_show'));
        }

        return $this->render('GuBruJeMusicalBundle:Annonce:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Annonce entity.
     *
     * @param Annonce $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Annonce $entity)
    {
        $form = $this->createForm(new AnnonceType(), $entity, array(
            'action' => $this->generateUrl('annonce_create'),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Displays a form to create a new Annonce entity.
     *
     */
    public function newAction()
    {
        $entity = new Annonce();
        $form = $this->createCreateForm($entity);

        return $this->render('GuBruJeMusicalBundle:Annonce:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Annonce entity.
     *
     */
    public function showAction(Annonce $annonce, Form $form = null)
    {
        $em = $this->getDoctrine()->getManager();

        $commentaires = $em->getRepository('GuBruJeMusicalBundle:Commentaire')
            ->findByAnnonce($annonce->getId());

        if (null === $form) {
            $form = $this->getCommentaireForm($annonce);
        }

        return $this->render('GuBruJeMusicalBundle:Annonce:show.html.twig', array(
            'annonce' => $annonce,
            'form' => $form->createView(),
            'commentaires' => $commentaires
        ));
    }

    /**
     * Displays a form to edit an existing Annonce entity.
     *
     */
    public function editAction(Annonce $annonce)
    {

        $editForm = $this->createEditForm($annonce);
        $deleteForm = $this->createDeleteForm($annonce->getId());

        return $this->render('GuBruJeMusicalBundle:Annonce:edit.html.twig', array(
            'entity' => $annonce,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Annonce entity.
     *
     * @param Annonce $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Annonce $entity)
    {
        $form = $this->createForm(new AnnonceType(), $entity, array(
            'action' => $this->generateUrl('annonce_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));


        return $form;
    }

    /**
     * Edits an existing Annonce entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GuBruJeMusicalBundle:Annonce')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Annonce entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $statut = $this->getDoctrine()->getRepository('GuBruJeMusicalBundle:Statut')->findOneByNom('En Attente');
            $entity->setStatut($statut);
            $em->flush();

            $flash = $this->get('braincrafted_bootstrap.flash');
            $flash->success('Annonce modifiée avec succès.');
            return $this->redirect($this->generateUrl('fos_user_profile_show'));
        }

        return $this->render('GuBruJeMusicalBundle:Annonce:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Annonce entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GuBruJeMusicalBundle:Annonce')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Annonce entity.');
            }

            $em->remove($entity);
            $em->flush();
            $flash = $this->get('braincrafted_bootstrap.flash');
            $flash->success('Annonce supprimée avec succès.');
        }

        return $this->redirect($this->generateUrl('fos_user_profile_show'));
    }

    /**
     * Creates a form to delete a Annonce entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('annonce_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer l\'annonce', 'attr' => array('class' => 'btn-danger')))
            ->getForm();
    }

    public function ajouterCommentaireAction(Request $request, Annonce $annonce)
    {
        $commentaire = new Commentaire;
        $commentaire->setAnnonce($annonce);
        $commentaire->setIp($this->getRequest()->server->get('REMOTE_ADDR'));

        $form = $this->getCommentaireForm($annonce, $commentaire);
        $form->handleRequest($request);

        $flash = $this->get('braincrafted_bootstrap.flash');

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commentaire);
            $em->flush();


            $flash->success('Commentaire bien enregistré !');

            return $this->redirect($this->generateUrl('annonce_show', array('id' => $annonce->getId())) . '#comment' . $commentaire->getId());
        }

        $flash->error('Votre formulaire contient des erreurs');

        return $this->forward('GuBruJeMusicalBundle:Annonce:show', array(
            'annonce' => $annonce,
            'form' => $form
        ));
    }

    /**
     * @param Commentaire $commentaire
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function supprimerCommentaireAction(Request $request, Commentaire $commentaire)
    {
        $form = $this->createFormBuilder()->getForm();

        $flash = $this->get('braincrafted_bootstrap.flash');
        $form->handleRequest($request);
            if ($form->isValid()) { // Ici, isValid ne vÃ©rifie donc que le CSRF
                $em = $this->getDoctrine()->getManager();
                $em->remove($commentaire);
                $em->flush();
                $flash->info('Commentaire bien supprimé !');

                return $this->redirect($this->generateUrl('annonce_show', array('id' => $commentaire->getAnnonce()->getId())));
            }

        return $this->render('GuBruJeMusicalBundle:Commentaire:supprimer.html.twig', array(
            'commentaire' => $commentaire,
            'form' => $form->createView()
        ));
    }

    /**
     * Retourne le formulaire d'ajout d'un commentaire
     * @param Annonce $annonce
     * @param Commentaire $commentaire
     * @return Form
     */
    protected function getCommentaireForm(Annonce $annonce, Commentaire $commentaire = null)
    {
        if (null === $commentaire) {
            $commentaire = new Commentaire;
        }

        if (null !== $this->getUser()) {
            $commentaire->setUser($this->getUser());
        }

        return $this->createForm(new CommentaireType(), $commentaire);
    }

    /**
     * Generate the article feed
     *
     * @return Response XML Feed
     */
    public function feedAction()
    {
        $annonces = $this->getDoctrine()->getRepository('GuBruJeMusicalBundle:Annonce')->findValide();

        $feed = $this->get('eko_feed.feed.manager')->get('annonce');
        $feed->addFromArray($annonces);

        return new Response($feed->render('rss')); // or 'atom'
    }

    public function lastAction($nombre)
    {
        $annonces = $this->getDoctrine()->getManager()->getRepository('GuBruJeMusicalBundle:Annonce')->findValide(3);
        return $this->render('GuBruJeMusicalBundle:Annonce:last.html.twig', array(
            'annonces' => $annonces,
        ));
    }
}
