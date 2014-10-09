<?php

namespace CivContent\Model\Category;

class Category implements CategoryInterface
{
    protected $contentCategoryId;
    protected $categoryName;
    protected $urlPath;
    protected $categoryBody;
    protected $showinmenu;
    
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
    
    public function getUrlPath()
    {
        return $this->urlPath;
    }
    
    public function setUrlPath($path)
    {
        $this->urlPath = $path;
        return $this;
    }
    
    public function getCategoryBody()
    {
        return $this->categoryBody;
    }
    
    public function setCategoryBody($body)
    {
        $this->categoryBody = $body;
        return $this;
    }
    
    public function getShowInMenu()
    {
        return $this->showInMenu;
    }
    
    public function setShowInMenu($showInMenu)
    {
        $this->showInMenu = $showInMenu;
        return $this;
    }
}