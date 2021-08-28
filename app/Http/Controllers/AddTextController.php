<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AddTextController extends Controller
{
    public function addWatermark(){
        $img = Image::make(public_path('images/demo.jpeg'));
         // add text from database 
        $img->text('add data what you want.', 120, 100);
     
        $img->save(public_path('images/demo-new.png')); 
        
        dd('Watermark create successfully.');
        
        // create Image from file
         $img = Image::canvas(10, 10, '#fff');
         
         // write text
         $img->text('The quick brown fox jumps over the lazy dog.');
         $img->save(public_path('images/demo-new1.png')); 
     
         // write text at position
         $img->text('The quick brown fox jumps over the lazy dog.', 120, 100);
     
         // use callback to define details
         $img->text('foo', 0, 0, function($font) {
             $font->file('foo/bar.ttf');
             $font->size(24);
             $font->color('#fdf6e3');
             $font->align('center');
             $font->valign('top');
             $font->angle(45);
         });
         
         $img->save(public_path('images/demo-new2.png')); 
     
         // draw transparent text
         $img->text('foo', 0, 0, function($font) {
             $font->color(array(255, 255, 255, 0.5));
         });
         
         $img->save(public_path('images/demo-new3.png')); 
         dd('Watermark create successfully.');
     }
}
