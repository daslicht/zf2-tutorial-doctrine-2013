<?php

namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\EntityManager;

class EntityUsingController extends AbstractActionController
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * Sets the EntityManager
     *
     * @param EntityManager $em
     * @access protected
     * @return AlbumController
     */
    protected function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Returns the EntityManager
     *
     * Fetches the EntityManager from ServiceLocator if it has not been initiated
     * and then returns it
     *
     * @access protected
     * @return EntityManager
     */
    protected function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }
}