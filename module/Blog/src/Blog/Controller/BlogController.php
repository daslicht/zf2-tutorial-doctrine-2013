<?php

namespace Blog\Controller;

//use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Blog\Entity\BlogPost;
use Blog\Form\CreateBlogPostForm;
use Doctrine\ORM\EntityManager;

class BlogController extends EntityManagerController //AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel(array(

        ));
    }

    public function createAction()
    {
        // Get your ObjectManager from the ServiceManager
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        // Create the form and inject the ObjectManager
        $form = new CreateBlogPostForm($objectManager);

        // Create a new, empty entity and bind it to the form
        $blogPost = new BlogPost();
        $form->bind($blogPost);

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $objectManager->persist($blogPost);
                $objectManager->flush();
            }
        }

        return array('form' => $form);
    }

    public function updateAction()
    {
        // Get your ObjectManager from the ServiceManager
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        // Create the form and inject the ObjectManager
        $form = new UpdateBlogPostForm($objectManager);

        // Create a new, empty entity and bind it to the form
        $blogPost = $this->userService->get($this->params('blogPost_id'));
        $form->bind($blogPost);

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                // Save the changes
                $objectManager->flush();
            }
        }

        return array('form' => $form);
    }
}