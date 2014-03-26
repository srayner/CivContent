<?php

namespace CivContent\Model\Post;

interface PostInterface
{
	public function getContentPostId();
	public function setContentPostId($id);
	public function getPostTitle();
	public function setPostTitle($title);
	public function getPostBody();
	public function setPostBody($body);
}