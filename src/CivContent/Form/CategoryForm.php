<?php

namespace CivContent\Form;

use Zend\Form\Form;

class CategoryForm extends Form
{
    public function __construct()
    {
        parent::__construct();
        
        // Category id.
        $this->add(array(
            'name' => 'content_category_id',
            'options' => array(
                'label' => '',
            ),
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));
        
        // Category name.
        $this->add(array(
            'name' => 'category_name',
            'options' => array(
                'label' => 'Category Name',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
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