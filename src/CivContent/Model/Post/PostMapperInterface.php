<?php

namespace CivContent\Model\Post;

interface PostMapperInterface
{
	public function getPostsByCategoryId($id);
	public function getPostById($id);
	public function persist(PostInterface $post);
	public function deletePostById($id);
}