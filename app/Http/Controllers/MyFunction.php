<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class MyFunction extends Controller
{
    public function AddDashToText($text){
        $text = trim($text);
        $text = htmlspecialchars($text);
        $newText = Str::slug($text);
        return $newText;
    }

}
