<?php

namespace CivContent\Model\Category;

class Category implements CategoryInterface
{
    protected $contentCategoryId;
    protected $categoryName;
    
    public function getContentCategoryId()
    {
        return $this->contentCategoryId;
    }
    
    public function setContentCategoryId($id)
    {
        $this->contentCategoryId = $id;
        return $this;
    }
    
    public function getCategoryName()
    {
        return $this->categoryName;
    }
    
    public function setCategoryName($name)
    {
        $this->categoryName = $name;
        return $this;
    }
}