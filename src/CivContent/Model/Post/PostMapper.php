<?php

namespace CivContent\Model\Post;

use ZfcBase\Mapper\AbstractDbMapper;
use EdpDiscuss\Service\DbAdapterAwareInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

class PostMapper extends AbstractDbMapper implements PostMapperInterface, DbAdapterAwareInterface
{
	protected $tableName = 'content_post';
    protected $contentPostIDField = 'content_post_id';
    protected $contentCategoryIDField = 'content_category_id';
    
	public function getPostsByCategoryId($id)
	{
		$select = $this->getSelect()
                       ->where(array($this->contentCategoryIDField => $id));
        return $this->select($select);	
	}
	
	public function getPostById($id)
	{
		$select = $this->getSelect()
                       ->where(array($this->contentPostIDField => $id));
        return $this->select($select)->current();
	}
	
	public function persist(PostInterface $post)
	{
		if ($post->getContentPostId() > 0) {
            $this->update($post, null, null, new PostHydrator);
        } else {
            $this->insert($post, null, new PostHydrator);
        }
        return $post;
	}
	
    /**
     * insert - Inserts a new content post into the database, using the specified hydrator.
     * 
     * @param PostInterface $entity
     * @param String $tableName
     * @param HydratorInterface $hydrator
     * @return unknown
     */
    protected function insert($entity, $tableName = null, HydratorInterface $hydrator = null)
    {
        $result = parent::insert($entity, $tableName, $hydrator);
        $entity->setContentPostId($result->getGeneratedValue());
        return $result;
    }

    /**
     * update - Updates an existing content post in the database.
     * @param PostInterface $entity
     * @param String $where
     * @param String $tableName
     * @param HydratorInterface $hydrator
     */
    protected function update($entity, $where = null, $tableName = null, HydratorInterface $hydrator = null)
    {
        if (!$where) {
            $where = $this->contentPostIDField . ' = ' . $entity->getContentPostId();
        }
        return parent::update($entity, $where, $tableName, $hydrator);
    }
}
