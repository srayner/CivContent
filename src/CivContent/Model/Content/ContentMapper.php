<?php

namespace CivContent\Model\Content;

use ZfcBase\Mapper\AbstractDbMapper;
use EdpDiscuss\Service\DbAdapterAwareInterface;

class ContentMapper extends AbstractDbMapper implements ContentMapperInterface, DbAdapterAwareInterface
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
	
	public function persist(ContentInterface $content)
	{
		if ($post->getContentId() > 0) {
            $this->update($content, null, null, new ContentHydrator);
        } else {
            $this->insert($content, null, new ContentHydrator);
        }
        return $content;
	}
}
