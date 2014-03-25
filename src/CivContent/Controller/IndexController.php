<?php

namespace CivContent\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $category;
    
    public function getCategory()
    {
        if (null !== $this->category) {
            return $this->category;
        }
        $name = $this->getEvent()->getRouteMatch()->getParam('category');
        return $this->category = $this->getContentServiceService()->getCategoryByName($name);
    }
    
	public function indexAction()
    {
    	return new ViewModel();
    }
    
    public function postAction()
    {
        // Create a new instance of the post form.
        $form = $this->getServiceLocator()->get('civcontent_post_form');
        $formHydrator = $this->getServiceLocator()->get('civcontent_post_form_hydrator');
        $form->setHydrator($formHydrator);
        
        // Grab a copy of the category.
        $category = $this->getCategory();
        
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {   
            // Create a new post and set its category.
            $post = $this->getServiceLocator()->get('civcontent_post');
            $post->setCategory($category());
            
            $data = (array) $request->getPost();
            $form->bind($message);
            $form->setData($data);
            if ($form->isValid())
            {
                // Persist changes.
                $this->getContentService()->persist($post);
                
                // Redirect to content category
                return $this->redirect()->toRoute('civcontent', array(
                    'category'   => $category->getName(),
                    'action'     => 'index'
                ));
            }
        }
        
        // If a GET request, or invalid data then render/re-render the form
        return new ViewModel(array(
            'form'   => $form,
            'tag'    => $category
        ));
    }
	
}