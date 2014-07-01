<?php

namespace CivContent\Form;

use Zend\InputFilter\InputFilter;

class CategoryFilter extends InputFilter
{
    public function __construct() {

        $this->add(array(
            'name' => 'category_name',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
            ),
        ));
    }
}
