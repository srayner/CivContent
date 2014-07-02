<?php

namespace CivContent\Form;

use Zend\Form\Form;

class ConfirmationForm extends Form
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
        
        // Yes button.
        $this->add(array(
            'name' => 'yes',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Yes',
                'id'    => 'yesbutton',
                'class' => 'btn btn-primary'
            ),
        ));
        
        // No button.
        $this->add(array(
            'name' => 'no',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'No',
                'id'    => 'nobutton',
                'class' => 'btn btn-primary'
            ),
        ));
        
    }
}