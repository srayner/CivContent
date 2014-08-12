<?php

namespace CivContent\Model\Post;

class Post implements PostInterface
{
	protected $contentPostId;
	protected $contentCategoryId;
	protected $postTitle;
	protected $blurb;
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

	public function getContentCategoryId()
	{
		return $this->contentCategoryId;
	}
	
	public function setContentCategoryId($id)
	{
		$this->contentCategoryId = $id;
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

	public function getBlurb()
	{
	    return $this->blurb;
	}
	
	public function setBlurb($blurb)
	{
	    $this->blurb = $blurb;
	    return $this;
	}
	
	public function getLinkText()
	{
	    return $this->linkText;
	}
	
	public function setLinkText($text)
	{
	    $this->linkText = $text;
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