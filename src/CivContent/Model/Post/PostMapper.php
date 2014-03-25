<?php

namespace CivContent\Model\Post;

use ZfcBase\Mapper\AbstractDbMapper;
use EdpDiscuss\Service\DbAdapterAwareInterface;

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
        return $content;
	}
}
