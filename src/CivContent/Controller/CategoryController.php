<?php

namespace CivContent\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CategoryController extends AbstractActionController
{
    protected $contentService;
    
    protected function getContentService()
    {
        if (null === $this->contentService) {
            $this->contentService = $this->getServiceLocator()->get('civcontent_service');
        }

        return $this->contentService;
    }
    
    public function indexAction()
    {
        $categories = $this->getContentService()->getCategories();
        return array(
            'categories' => $categories
        );
    }

	public function addAction()
    {
        // Create a new instance of the category form.
        $form = $this->getServiceLocator()->get('civcontent_category_form');
    
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {
            // Create a new category object.
            $category = $this->getServiceLocator()->get('civcontent_category');
             
            $data = (array) $request->getPost();
            $form->bind($category);
            $form->setData($data);
            if ($form->isValid())
            {
                // Persist changes.
                $this->getContentService()->persistCategory($category);
    
                // Redirect to content categories
                return $this->redirect()->toRoute('content/category', array(
                    'action'     => 'index'
                ));
            }
        }
    
        // If a GET request, or invalid data then render/re-render the form
        return new ViewModel(array(
            'form'   => $form,
        ));
    }

	public function editAction()
    {
        // Create a new instance of the category form.
        $form = $this->getServiceLocator()->get('civcontent_category_form');
         
        // Grab copy of the existing entity
        $id = $this->params()->fromRoute('categoryid');
        $category = $this->getContentService()->getCategoryById($id);
        if (!$category)
        {
            $this->getResponse()->setStatusCode(404);
            return;
        }
        $form->bind($category);
    
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {
            $data = (array) $request->getPost();
            $form->setData($data);
            if ($form->isValid())
            {
                // Persist changes.
                $this->getContentService()->persistCategory($category);
    
                // Redirect to content categories
                return $this->redirect()->toRoute('content/category', array(
                    'action'     => 'index'
                ));
            }
        }
         
        // If a GET request, or invalid data then render/re-render the form
        return new ViewModel(array(
            'form'   => $form,
            'id' => $id
        ));
    }
}