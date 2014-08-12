<?php

namespace CivContent\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $post;
	protected $category;
    protected $contentService;
    
    protected function getContentService()
    {
        if (null === $this->contentService) {
            $this->contentService = $this->getServiceLocator()->get('civcontent_service');
        }
        return $this->contentService;
    }
    
    protected function getPost()
    {
    	if (null === $this->post) {
    	    $postId = $this->getEvent()->getRouteMatch()->getParam('postid');
    	    $this->post = $this->getContentService()->getPostById($postId);
    	}
    	return $this->post;
    }
    
    protected function getCategoryName()
    {
        if (null === $this->category) {
            $this->category = $this->getEvent()->getRouteMatch()->getParam('category');
        }
        return $this->category;
    }
    
	public function indexAction()
    {
    	$posts = $this->getContentService()->getPostsByCategoryId(1);
    	return array(
    	    'posts' => $posts
    	);
    }
    
    public function viewAction()
    {
        $postId = $this->getEvent()->getRouteMatch()->getParam('postid');
        $post = $this->getContentService()->getPostById($postId);
        if ($post === false)
        {
            $this->notFoundAction();
        }
        return array(
            'post' => $post
        );
    }
    
    public function addAction()
    {
        // Create a new instance of the post form.
        $form = $this->getServiceLocator()->get('civcontent_post_form');
        
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {   
            // Create a new post and set its category.
            $post = $this->getServiceLocator()->get('civcontent_post');
   
            $data = (array) $request->getPost();
            $form->bind($post);
            $form->setData($data);
            if ($form->isValid())
            {
                // Persist changes.
                $this->getContentService()->persist($post);
                
                // Redirect to content category
                return $this->redirect()->toRoute('content/action', array(
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
        // Create a new instance of the post form.
        $form = $this->getServiceLocator()->get('civcontent_post_form');
        
        // Grab copy of the existing entity
        $post = $this->getPost();
        if (!$post) {
            $this->getResponse()->setStatusCode(404);
            return;
        }
		$form->bind($post);
		    
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {   
            $data = (array) $request->getPost();
            $form->setData($data);
            if ($form->isValid())
            {
                // Persist changes.
                $this->getContentService()->persist($post);
                
                // Redirect to content category
                return $this->redirect()->toRoute('content/action', array(
                    'action' => 'index'
                ));
            }
        }
       
        // If a GET request, or invalid data then render/re-render the form
        return new ViewModel(array(
            'form'   => $form,
            'post' => $post
        ));
    }

    public function deleteAction()
    {
        $form = $this->getServiceLocator()->get('civcontent_confirmation_form');
         
        $id = $this->params()->fromRoute('postid');
        if (!$id)
        {
            $this->getResponse()->setStatusCode(404);
            return;
        }
        
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {
            // delete
            $this->getContentService()->deletePostById($id);
            
            // Redirect to content category
            return $this->redirect()->toRoute('content/action', array(
                'action'     => 'index'
            ));
        }
        
        return new ViewModel(array(
            'id' => $id,
            'form' => $form
        ));
    }
}