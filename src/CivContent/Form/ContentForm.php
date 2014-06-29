<?php

namespace CivContent\Form;

use Zend\Form\Form;

class ContentForm extends Form
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
        
        $categories = array(
            '1' => 'My Robot',
            '2' => 'Raspberry Pi',
            '3' => 'RepRap',
            '4' => 'Beaglebone Black',
            '5' => 'Quadcopter',
        );
        $this->add(array(
            'name' => 'content_category_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Category'
            ),
            'attributes' => array(
                'options' => $categories,
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
                'name' => 'post_body',
                'options' => array(
                        'label' => 'Content',
                ),
                'attributes' => array(
                        'type' => 'textarea',
                        'class' => 'form-control ckeditor',
                        'rows' => '6',
                        'id' => 'editor1'
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
}
