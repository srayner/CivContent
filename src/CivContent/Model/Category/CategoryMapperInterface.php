<?php

namespace CivContent\Model\Category;

interface CategoryMapperInterface
{
    public function getCategories();
    public function getCategoryArray();
    public function getCategoryById($id);
    public function getCategoryByUrlPath($path);
    public function persist(CategoryInterface $category);
    public function deleteCategoryById($id);
}