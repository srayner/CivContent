<?php

namespace CivContent\Model\Content;

class Content implements ContentInterface
{
	protected $contentId;
	protected $contentTitle;
	protected $contentBody;

	public function getContentId()
	{
		return $this->contentId;
	}
	
	public function setContentId($id)
	{
		$this->contentId = $id;
		return $this;
	}
	
    public function getContentTitle()
	{
		return $this->contentTitle;
	}
	
	public function setContentTitle($title)
	{
		$this->contentTitle = $title;
		return $this;
	}
	
    public function getContentBody()
	{
		return $this->contentBody;
	}
	
	public function setContentBody($body)
	{
		$this->contentBody = $body;
		return $this;
	}
	
}