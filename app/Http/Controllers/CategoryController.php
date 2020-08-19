<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Repositories\Hotel\HotelRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $hotelRepo;
    protected $categoryRepo;

    public function __construct(HotelRepositoryInterface $hotelRepo, CategoryRepositoryInterface $categoryRepo)
    {
        $this->hotelRepo = $hotelRepo;
        $this->categoryRepo = $categoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category)
    {
        if (isset($_GET['query'])) {
            $search_query = $_GET['query'];
            $category = $this->categoryRepo->showCategory($category);
            $hotels = $this->hotelRepo->searchOnCategory($search_query,$category->id);
            return view('Category.homepage', compact('hotels', 'category'));
        } else {
            $category = $this->categoryRepo->showCategory($category);
            $hotels = $this->hotelRepo->showalloncategory($category->id);
    
            return view('Category.homepage', compact('hotels', 'category'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
