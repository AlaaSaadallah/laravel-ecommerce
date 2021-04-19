<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\languages;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    public function index(){

        $languages=languages::select()->paginate(PAGINATION_COUNT);
        return view('admin.languages.index', compact('languages'));
    }
}
