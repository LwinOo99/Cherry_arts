<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;




class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(pCategory::class);
    }

    public function getAll(){
        Log::channel("customlog")->info("Start Product getAll function.");

        // return DB::table("products")->take(5)->where("del_flg","=",0)->get();
        return DB::table("products")->where("del_flg","=",0)->get();
        // return Product::has("p_categories")->where("del_flg","=",0)->get();

    }

    public function productList(){
        Log::channel("customlog")->info("Start Product productList function.");
        
        // return DB::table("products")->orderBy("id", "DESC")->where("del_flg","=",0);
        // return Product::has("p_categories")->orderBy("id", "DESC")->where("del_flg","=",0)->paginate(10);
        return Product::has("category")->orderBy("id", "DESC")->where("del_flg","=",0)->paginate(10);
    }
    public function lastTwo(){
        return Product::has("category")->orderBy("id", "DESC")->where("del_flg","=",0)->take(2)->get();

    }


    public function insert(Request $request){
        // Log::channel("customlog")->info("Start Product insert function.");
        $path= null;
        if ($request->hasFile("p_picture")) {
            $file= $request->file("p_picture"); 
            // $path = $file->store("doctorProfile");
            // $path = Storage::disk('public')->put('productImage' , $file);
            $path = Storage::disk('public')->put('productImage' , $file);
        } 

        DB::table('products')
        ->insert([
            "p_name"=>$request->p_name,
            "p_code"=>$request->p_code,
            "category_id" =>$request->category_id,
            "p_price"=>$request->p_price,
            "p_height"=>$request->p_height,
            "p_des"=>$request->p_des,
            "p_picture"=>$path,
            "created_at"=>Carbon::now()

        ]);
    }

    public function showProduct($id){
        Log::channel("customlog")->info("Start Product showProduct function.");

        return Product::find($id);
    }


    public function updateProductById($id, Request $request){
        Log::channel("customlog")->info("Start Product updateProductById function.");
        
        // Retrieve the existing product record
        $product = DB::table('products')->where("id", $id)->first();
        
        // Check if a new image was uploaded
        if ($request->hasFile("p_picture")) {
            $file = $request->file("p_picture"); 
            $path = Storage::disk('public')->put('productImage', $file);
    
            // If an old image exists, delete it
            if ($product->p_picture) {
                Storage::disk('public')->delete($product->p_picture);
            }
        } else {
            // If no new image was uploaded, retain the old image path
            $path = $product->p_picture;
        }
    
        // Update the product record
        DB::table('products')
            ->where("id", $id)
            ->update([
                "p_name" => $request->p_name,
                "p_picture" => $path,
                "p_code" => $request->p_code,
                "category_id" =>$request->category_id,
                "p_price" => $request->p_price,
                "p_height" => $request->p_height,
                "p_des" => $request->p_des,
            ]);
    
        Log::channel("customlog")->info("End Product updateProductById function.");
    }
    


    public function deleteProduct($id){
        // DB::table("drugs")
        // ->where("id","=",$id)
        // ->delete();

        DB::table('products')
        ->where("id","=",$id)
        ->update([
            "del_flg"=> 1
        ]);

    }
}

