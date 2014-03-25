<?php

namespace CivContent\Model\Post;

class Post implements PostInterface
{
	protected $contentPostId;
	protected $postTitle;
	protected $postBody;

	public function getContentPostId()
	{
		return $this->contentPostId;
	}
	
	public function setContentPostId($id)
	{
		$this->contentPostId = $id;
		return $this;
	}
	
    public function getPostTitle()
	{
		return $this->postTitle;
	}
	
	public function setPostTitle($title)
	{
		$this->postTitle = $title;
		return $this;
	}
	
    public function getPostBody()
	{
		return $this->postBody;
	}
	
	public function setPostBody($body)
	{
		$this->postBody = $body;
		return $this;
	}
}