<?php

namespace CivContent\Model\Category;

interface CategoryInterface
{
	public function getContentCategoryId();
	public function setContentCategoryId($id);
	public function getCategoryName();
	public function setCategoryName($name);
}
