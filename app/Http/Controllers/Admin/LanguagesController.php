<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Models\languages;

class LanguagesController extends Controller
{
    public function index(){

        $languages = languages::select()->paginate(PAGINATION_COUNT);
        return view('admin.languages.index', compact('languages'));
    }
    public function create(){

        return view('admin.languages.create');
    }
    public function store(LanguageRequest $request){

        try{
            languages::create($request->except(['_token']));
            return redirect()->route('admin.languages')->with(['success' => 'تم حفظ اللغة بنجاح']);
        }catch(\Exception $ex){
            return redirect()->route('admin.languages')->with(['error' => 'هناك خطأ يرجى المحاولة لاحقا']);
            
        }

    }
}
