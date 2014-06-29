<?php

namespace CivContent\Model\Category;

use Zend\Stdlib\Hydrator\ClassMethods;

class CategoryHydrator extends ClassMethods
{
    /**
     * Extract values from $object
     *
     * @param  object $object
     * @return array
     * @throws Exception\InvalidArgumentException
     */
    public function extract($object)
    {
        if (!$object instanceof CategoryInterface) {
            throw new Exception\InvalidArgumentException('$object must be an instance of CivContent\Model\Category\CategoryInterface');
        }
        return parent::extract($object);
    }
    
    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array $data
     * @param  object $object
     * @return CategoryInterface
     * @throws Exception\InvalidArgumentException
     */
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof CategoryInterface) {
            throw new Exception\InvalidArgumentException('$object must be an instance of CivContent\Model\Category\CategoryInterface');
        }
        return parent::hydrate($data, $object);
    }
	
}
