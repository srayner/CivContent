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
        
        // Url path.
        $this->add(array(
            'name' => 'url_path',
            'options' => array(
                'label' => 'URL Path',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
            ),
        ));
        
        // Show in menu
        $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'show_in_menu',
            'options' => array(
                'label' => 'Show in menu',
                'use_hidden_element' => false,
                'checked_value' => 'Yes',
                'unchecked_value' => 'No'
            ),
        ));
        
        $this->add(array(
            'name' => 'category_body',
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