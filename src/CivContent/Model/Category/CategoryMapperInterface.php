<?php

namespace CivContent\Model\Category;

interface CategoryMapperInterface
{
    public function getCategories();
    public function getCategoryById($id);
    public function persist(CategoryInterface $category);
    public function deleteCategoryById($id);
}