<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepository;

use App\Models\Category;
use Illuminate\Support\Facades\DB;


class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Category::class;
    }
    public function search($category)
    {
        return $this->model =  Category::where('title', 'LIKE', '%' . $category . '%')->paginate(100);
    }
   
    public function showall()
    {
        return $this->model = Category::withTrashed()->get();
    }

    public function paginate()
    {
        return $this->model = Category::withTrashed()->paginate(6);
    }

    public function showCategory($category)
    {
        return $this->model = Category::withTrashed()->OfTitle($category)->first();
    }

    public function destroyCategory($category)
    {
        $category = Category::OfTitle($category)->first();
        return $this->model = $category->delete();
    }

    public function restoreCategory($category)
    {
        $category = Category::onlyTrashed()->OfTitle($category)->first();
        return $this->model = $category->restore();
    }
}
