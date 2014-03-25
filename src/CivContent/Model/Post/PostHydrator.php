<?php

namespace CivContent\Model\Post;

use Zend\Stdlib\Hydrator\ClassMethods;

class PostHydrator extends ClassMethods
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
        if (!$object instanceof PostInterface) {
            throw new Exception\InvalidArgumentException('$object must be an instance of CivContent\Model\Post\PostInterface');
        }
        return parent::extract($object);
    }
    
    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array $data
     * @param  object $object
     * @return MessageInterface
     * @throws Exception\InvalidArgumentException
     */
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof PostInterface) {
            throw new Exception\InvalidArgumentException('$object must be an instance of CivContent\Model\Post\PostInterface');
        }
        return parent::hydrate($data, $object);
    }
	
}