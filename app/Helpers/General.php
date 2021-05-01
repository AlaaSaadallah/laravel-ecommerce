<?php
use Illuminate\Support\Facades\Config;

function get_languages(){
  return \App\Models\languages::active() -> selection() -> get();
}

function get_default_lang(){
   return config::get('app.local') ;
}

function uploadImage( $folder, $image)
{
   $image->store('/', $folder);
   $filename = $image->hasName();
   $path = 'images/' . $folder . '/' . $filename;
   return $path;
}
?>