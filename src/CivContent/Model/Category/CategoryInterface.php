<?php

namespace CivContent\Model\Category;

interface CategoryInterface
{
	public function getContentCategoryId();
	public function setContentCategoryId($id);
	public function getCategoryName();
	public function setCategoryName($name);
	public function getUrlPath();
	public function setUrlPath($path);
	public function getCategoryBody();
	public function setCategoryBody($body);
}
