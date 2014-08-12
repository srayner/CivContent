<?php
/**
 * CivContent (https://github.com/srayner/CivContent)
 */

namespace CivContent\Form;

use Zend\Form\Form;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

abstract class AbstractForm extends Form implements ServiceLocatorAwareInterface
{
    protected $serviceLocator;
    
    /**
     * Set service locator
     *
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }
    
    /**
     * Get service locator
     *
     * @return ServiceLocatorInterface
    */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    } 
}
