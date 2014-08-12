<?php

namespace CivContent\Model\Category;

use ZfcBase\Mapper\AbstractDbMapper;
use CivContent\Service\DbAdapterAwareInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

class CategoryMapper extends AbstractDbMapper implements CategoryMapperInterface, DbAdapterAwareInterface
{
	protected $tableName = 'content_category';
    protected $contentCategoryIDField = 'content_category_id';
	
    /**
     * getCategories - Returns all categories.
     */
	public function getCategories()
	{
	    $select = $this->getSelect();
	    return $this->select($select);
	}
	
	public function getCategoryArray()
	{
	    $select = $this->getSelect();
	    $categories = $this->select($select);
	    $result = array();
	    foreach ($categories as $category)
	    {
	        $result[$category->getContentCategoryId()] = $category->getCategoryName(); 
	    }
	    return $result;
	}
	
	/**
	 * getCategoryById - Returns a single category.
	 * 
	 * @param unknown_type $id
	 */
	public function getCategoryById($id)
	{
		$select = $this->getSelect()
                       ->where(array($this->contentCategoryIDField => $id));
        return $this->select($select)->current();
	}
	
	/**
	 * persist - persists a category object to the database.
	 * 
	 * @param CategoryInterface $category
	 * @return CategoryInterface
	 */
	public function persist(CategoryInterface $category)
	{
		if ($category->getContentCategoryId() > 0) {
            $this->update($category, null, null, new CategoryHydrator);
        } else {
            $this->insert($category, null, new CategoryHydrator);
        }
        return $category;
	}
	
	/**
	 * deleteCategoryById - Deletes a content category.
	 * 
	 * @param unknown_type $id
	 */
	public function deleteCategoryById($id)
	{
	    return parent::delete(array($this->contentCategoryIDField => $id));
	}
	
    /**
     * insert - Inserts a new content category into the database, using the specified hydrator.
     * 
     * @param CategoryInterface $entity
     * @param String $tableName
     * @param HydratorInterface $hydrator
     * @return unknown
     */
    protected function insert($entity, $tableName = null, HydratorInterface $hydrator = null)
    {
        $result = parent::insert($entity, $tableName, $hydrator);
        $entity->setContentCategoryId($result->getGeneratedValue());
        return $result;
    }

    /**
     * update - Updates an existing content category in the database.
     * @param CategoryInterface $entity
     * @param String $where
     * @param String $tableName
     * @param HydratorInterface $hydrator
     */
    protected function update($entity, $where = null, $tableName = null, HydratorInterface $hydrator = null)
    {
        if (!$where) {
            $where = $this->contentCategoryIDField . ' = ' . $entity->getContentCategoryId();
        }
        return parent::update($entity, $where, $tableName, $hydrator);
    }
}

