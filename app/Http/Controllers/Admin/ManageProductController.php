<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\pCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ManageProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Log::channel("customlog")->info("Start Product index function.");

        $product =new Product();
        $productList = $product->productList();
        // dd($productList->p_categories);

        Log::channel("customlog")->info("End Product index function.");

        return View("admin.showProducts",[
            "productList"=> $productList,
        ]);
        // return View("admin.showProducts");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $product = new pCategory();
        $pCategory = $product->getAll();
        // dd($pCategory);

        return View('admin.addProducts',[
            "p_category"=> $pCategory
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->insert($request);
        Log::channel("customlog")->info("End Product store function.");
        // dd($request->request);

        return redirect("/manageProduct");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = new Product();
        $productInfo= $product->showProduct($id);
        $category= $productInfo->category;

        return view("admin.productInfo",[
            "productInfo"=> $productInfo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Log::channel("customlog")->info("Start Product edit function.");

        $product = new Product();
        $productInfo= $product->showProduct($id);
        $product = new pCategory();
        $pCategory = $product->getAll();
        Log::channel("customlog")->info("End Product edit function.");

        return view("admin.editProduct",[
            "productInfo"=> $productInfo, "p_category" => $pCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = new Product();
        $product->updateProductById($id,$request);

        return redirect('/manageProduct');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::channel("customlog")->info("Start Product destory function.");

        $product = new Product();
        $product->deleteProduct($id);
        Log::channel("customlog")->info("End Product destory function.");

        return redirect("/manageProduct");
    }
}
