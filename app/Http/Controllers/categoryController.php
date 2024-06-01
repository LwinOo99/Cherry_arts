<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pCategory;
class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = new pCategory();
        $pCategory = $product->getAll();
        // dd($pCategory);

        return View('admin.addCategory',[
            "p_category"=> $pCategory
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new pCategory();
        $category->insert($request);
        Log::channel("customlog")->info("End Product store function.");
        // dd($request->request);

        return redirect("/manageProduct");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
