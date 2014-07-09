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
    	if (null !== $this->post) {
    		return $this->post;
    	}
    	$postId = $this->getEvent()->getRouteMatch()->getParam('postid');
    	return $this->getContentService()->getPostById($postId); 
    }
    
    protected function getCategoryName()
    {
        if (null !== $this->category) {
            return $this->category;
        }
        return $this->getEvent()->getRouteMatch()->getParam('category');
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
        
        // Grab a copy of the category.
    //    $category = $this->getCategory();
        
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {   
            // Create a new post and set its category.
            $post = $this->getServiceLocator()->get('civcontent_post');
   //         $post->setCategory($category());
   
            $data = (array) $request->getPost();
            $form->bind($post);
            $form->setData($data);
            if ($form->isValid())
            {
                // Persist changes.
                $post->setContentCategoryId(1);  // temp hack
                $this->getContentService()->persist($post);
                
                // Redirect to content category
                return $this->redirect()->toRoute('content/action', array(
       //             'category'   => $category->getName(),
                    'action'     => 'index'
                ));
            }
        }
        
        // If a GET request, or invalid data then render/re-render the form
        return new ViewModel(array(
            'form'   => $form,
         //   'tag'    => $category
        ));
    }
    
public function editAction()
    {
        // Create a new instance of the post form.
        $form = $this->getServiceLocator()->get('civcontent_post_form');
        
        // Grab a copy of the category.
    //    $category = $this->getCategory();
		
        // Grab copy of the existing entity
        $post = $this->getPost();
        if (!$post) {
            $this->getResponse()->setStatusCode(404);
            return;
        }
        $form->setBindOnValidate(false);
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
                $post->setContentCategoryId(1);  // temp hack
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