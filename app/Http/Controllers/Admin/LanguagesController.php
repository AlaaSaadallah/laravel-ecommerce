<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Models\languages;
use Exception;

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
        }catch(Exception $ex){
            return redirect()->route('admin.languages')->with(['error' => 'هناك خطأ يرجى المحاولة لاحقا']);
            
        }
    }

        public function edit($id){
            $language = languages::find($id);

            if(!$language){
                return redirect() -> route('admin.languages') -> with(['error' => 'هذه اللغة غير موجودة']);
            }
            return view('admin.languages.edit',compact('language'));
        }

    
        public function update($id,LanguageRequest $request){

            try{

            $language = languages::find($id);

            if(!$language){
                return redirect() -> route('admin.languages.edit',$id) -> with(['error' => 'هذه اللغة غير موجودة']);
            }
            $language -> update($request -> except('_token'));
            return redirect() -> route('admin.languages')->with(['success'=>'تم تحديث اللغة بنجاح']);
        }
        catch(Exception $ex){
            
            return redirect() -> route('admin.languages')->with(['error'=>'هناك خطأ يرجى المحاولة لاحقا']);
        }

    
    }}
