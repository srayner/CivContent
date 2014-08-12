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
     * @var CategoryMapperInterface;
     */
    protected $categoryMapper;
    
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
     * getCategoryMapper
     *
     * @return ContentCategoryMapperInterface
     */
    public function getCategoryMapper()
    {
        return $this->categoryMapper;
    }
    
    /**
     * setCategoryMapper
     *
     * @param ContentCategoryMapperInterface $categoryMapper
     * @return Content
     */
    public function setCategoryMapper($categoryMapper)
    {
        $this->categoryMapper = $categoryMapper;
        return $this;
    }
    
    /**
     * getPostMapper
     *
     * @return ContentPostMapperInterface
     */
    public function getPostMapper()
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
    
    public function getCategories()
    {
        return $this->categoryMapper->getCategories();
    }
    
    public function getCategoriesArray()
    {
        return $this->categoryMapper->getCategoryArray();
    }
    
    public function getCategoryById($id)
    {
        return $this->categoryMapper->getCategoryById($id);
    }
    
    public function persistCategory($category)
    {
        return $this->categoryMapper->persist($category);
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
    
    public function deleteCategoryById($id)
    {
        return $this->categoryMapper->deleteCategoryById($id);
    }
    
    public function deletePostById($id)
    {
        return $this->postMapper->deletePostById($id);
    }
}