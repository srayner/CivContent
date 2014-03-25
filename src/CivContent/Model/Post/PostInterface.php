<?php

namespace CivContent\Model\Post;

interface PostInterface
{
	public function getContentPostId();
	public function setContentPostId();
	public function getPostTitle();
	public function setPostTitle();
	public function getPostBody();
	public function setPostBody();
}