<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoryRequest;
use App\Models\main_categories;
use Illuminate\Http\Request;

class MainCategoriesController extends Controller
{
   public function index() {
    $default_lang = get_default_lang() ;
   $categories = main_categories::where('translation_lang',$default_lang) -> selection() -> get();
    return view('admin.mainCategories.index',compact('categories'));
   } 
   
   public function create(){
      return view('admin.mainCategories.create');
   }

   public function store(MainCategoryRequest $request){
      return $request;
   }
}
