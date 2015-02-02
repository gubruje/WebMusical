<?php

namespace GuBruJe\MusicalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GuBruJe\MusicalBundle\Entity\Information;
use GuBruJe\MusicalBundle\Form\InformationType;

/**
 * Information controller.
 *
 */
class InformationController extends Controller
{

    /**
     * Lists all Information entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GuBruJeMusicalBundle:Information')->findAll();

        return $this->render('GuBruJeMusicalBundle:Information:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Information entity.
     *
     */
    public function createAction(Request $request)
    {
        $statut = $this->getDoctrine()->getRepository('GuBruJeMusicalBundle:Statut')->findOneByNom('En Attente');
        $user = $this->getUser();
        $entity = new Information();
        $entity->setAuteur($user);
        $entity->setStatut($statut);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $flash = $this->get('braincrafted_bootstrap.flash');
            $flash->success('Information Ajoutée avec succès.');
            return $this->redirect($this->generateUrl('fos_user_profile_show'));
        }

        return $this->render('GuBruJeMusicalBundle:Information:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Information entity.
     *
     * @param Information $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Information $entity)
    {
        $form = $this->createForm(new InformationType(), $entity, array(
            'action' => $this->generateUrl('information_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Information entity.
     *
     */
    public function newAction()
    {
        $entity = new Information();
        $form   = $this->createCreateForm($entity);

        return $this->render('GuBruJeMusicalBundle:Information:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Information entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GuBruJeMusicalBundle:Information')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Information entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GuBruJeMusicalBundle:Information:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Information entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GuBruJeMusicalBundle:Information')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Information entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GuBruJeMusicalBundle:Information:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Information entity.
    *
    * @param Information $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Information $entity)
    {
        $form = $this->createForm(new InformationType(), $entity, array(
            'action' => $this->generateUrl('information_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

       // $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Information entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GuBruJeMusicalBundle:Information')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Information entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $statut = $this->getDoctrine()->getRepository('GuBruJeMusicalBundle:Statut')->findOneByNom('En Attente');
            $entity->setStatut($statut);
            $em->flush();
            $flash = $this->get('braincrafted_bootstrap.flash');
            $flash->success('Information modifiée avec succès.');
            return $this->redirect($this->generateUrl('fos_user_profile_show'));
        }

        return $this->render('GuBruJeMusicalBundle:Information:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Information entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GuBruJeMusicalBundle:Information')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Information entity.');
            }

            $em->remove($entity);
            $em->flush();
            $flash = $this->get('braincrafted_bootstrap.flash');
            $flash->success('Information supprimée avec succès.');
        }

        return $this->redirect($this->generateUrl('fos_user_profile_show'));
    }

    /**
     * Creates a form to delete a Information entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('information_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer l\'information', 'attr' => array( 'class' => 'btn-danger')))
            ->getForm()
        ;
    }
}
