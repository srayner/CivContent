<?php

namespace CivContent\Form;

use Zend\Form\Form;

class ContentForm extends Form
{
    public function __construct()
    {
        parent::__construct();
        
        $this->add(array(
                'name' => 'content_category_id',
                'options' => array(
                        'label' => '',
                ),
                'attributes' => array(
                        'type' => 'hidden',
                ),
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
                        'class' => 'form-control',
                        'rows' => '6',
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
