<?php

namespace CivContent\Model\Content;

interface ContentMapperInterface
{
	public function getPostsByCategoryId($id);
	public function getPostById($id);
	public function persist(ContentInterface $content);
}