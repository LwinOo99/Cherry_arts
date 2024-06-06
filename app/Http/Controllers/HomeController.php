<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\pCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $product = new Product();
        $productList = $product->productList();
        $category = new pCategory();
        $categoryList = $category->getAll();
        $lastTwo = $product->lastTwo();


        return view('admin.adminHome',[
            'productList'=>$productList, 'categoryList'=>$categoryList, 'lastTwo' =>$lastTwo,
        ]);
    }
}
