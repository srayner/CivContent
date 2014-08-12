<?php
/**
 * CivContent (https://github.com/srayner/CivContent)
 */

namespace CivContent\Form;

class ContentForm extends AbstractForm
{
    public function __construct()
    {
        parent::__construct();
        
        $this->add(array(
                'name' => 'content_post_id',
                'options' => array(
                        'label' => '',
                ),
                'attributes' => array(
                        'type' => 'hidden',
                ),
        ));
        
        $this->add(array(
            'name' => 'content_category_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Category'
            ),
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        
        $this->add(array(
                'name' => 'post_title',
                'options' => array(
                        'label' => 'Title',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control',
                ),
                
        ));
        
        $this->add(array(
            'name' => 'blurb',
            'options' => array(
                'label' => 'Blurb',
            ),
            'attributes' => array(
                'type' => 'textarea',
                'class' => 'form-control ckeditor',
                'rows' => '3',
                'id' => 'editor1'
            ),
        
        ));
        
        $this->add(array(
            'name' => 'link_text',
            'options' => array(
                'label' => 'Link Text',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
            ),
        
        ));
        
        $this->add(array(
                'name' => 'post_body',
                'options' => array(
                        'label' => 'Content',
                ),
                'attributes' => array(
                        'type' => 'textarea',
                        'class' => 'form-control ckeditor',
                        'rows' => '6',
                        'id' => 'editor2'
                ),
                
        ));
        
        // Submit button.
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Post',
                'id'    => 'submitbutton',
                'class' => 'btn btn-primary'
            ),
        ));
    }
    
    public function setCategories($contentService)
    {
        $categories = $contentService->getCategoriesArray();
        $this->get('content_category_id')->setAttribute('options', $categories);
    }
}
