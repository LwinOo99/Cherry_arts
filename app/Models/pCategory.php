<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class pCategory extends Model
{
    use HasFactory;

    public function getAll(){
        return DB::table("p_categories")->where("del_flg","=",0)->get();
    }
}
