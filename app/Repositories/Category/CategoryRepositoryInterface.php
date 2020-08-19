<?php

namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    public function search($category);
    public function showall();
    public function paginate();
    public function showCategory($category);
    public function destroyCategory($category);
    public function restoreCategory($category);
}
