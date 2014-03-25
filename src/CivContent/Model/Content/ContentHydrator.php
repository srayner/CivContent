<?php

namespace CivContent\Model\Content;

use Zend\Stdlib\Hydrator\ClassMethods;

class ContentHydrator extends ClassMethods
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
        if (!$object instanceof ContentInterface) {
            throw new Exception\InvalidArgumentException('$object must be an instance of CivContent\Model\Content\ContentInterface');
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
        if (!$object instanceof ContentInterface) {
            throw new Exception\InvalidArgumentException('$object must be an instance of CivContent\Model\Content\ContentInterface');
        }
        return parent::hydrate($data, $object);
    }
	
}