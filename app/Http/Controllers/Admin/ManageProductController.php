<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Product;
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
        Log::channel("customlog")->info("End Product index function.");
        // dd($productList);
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
        return View('admin.addProducts');

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
        Log::channel("customlog")->info("Start Product show function.");

        $product = new Product();
        $productInfo= $product->showProduct($id);
        Log::channel("customlog")->info("End Product show function.");
        // dd($productInfo);
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
        Log::channel("customlog")->info("End Product edit function.");
        // dd($productInfo);
        return view("admin.editProduct",[
            "productInfo"=> $productInfo
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
