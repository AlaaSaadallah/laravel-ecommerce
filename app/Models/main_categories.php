<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class main_categories extends Model
{
    use HasFactory;

    protected $table = 'main_categories';

    protected $fillable =[
        'translation_lang','translation_of','name','slug','photo','active','created_at','updated_at'
    ];
    

     public function scopeActive($query){
         $this -> active == 1 ? 'مفعل' : 'غير مفعل' ;
         return $query -> where ('active',1);
     }


     public function scopeSelection($query){
         return $query -> select('id','translation_lang','name','slug','image','active');
     }
}
