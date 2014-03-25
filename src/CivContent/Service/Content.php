<?php

namespace CivContent\Service;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

class Content implements ServiceManagerAwareInterface
{
    /**
     * @var ServiceManager
     */
    protected $serviceManager;
    
    /**
     * @var PostMapperInterface
     */
    protected $postMapper;
    
    /**
     * Retrieve service manager instance
     *
     * @return ServiceManager
     */
    public function getServiceManager()
    {
        return $this->serviceManager;
    }
    
    /**
     * Set service manager instance
     *
     * @param ServiceManager $serviceManager
     * @return Discuss
     */
    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
        return $this;
    }
    
    /**
     * getPostMapper
     *
     * @return ContentPostMapperInterface
     */
    public function getThreadMapper()
    {
        return $this->postMapper;
    }
    
    /**
     * setPostMapper
     *
     * @param ContentPostMapperInterface $postMapper
     * @return Content
     */
    public function setPostMapper($postMapper)
    {
        $this->postMapper = $postMapper;
        return $this;
    }
    
    public function getPostsByCategoryId($id)
    {
        return $this->postMapper->getPostsByCategoryId($id);
    }
    
    public function getPostById($id)
    {
        return $this->postMapper->getPostById($id);
    }
    
    public function persist($post)
    {
        return $this->postMapper->persist($post);
    }
    
}