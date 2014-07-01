<?php

namespace CivContent\Form;

use Zend\InputFilter\InputFilter;

class PostFilter extends InputFilter
{
    public function __construct() {

        $this->add(array(
            'name' => 'post_title',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
            ),
        ));
    }
}