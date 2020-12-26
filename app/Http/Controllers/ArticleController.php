<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class ArticleController extends Controller
{
    public function index()
    {
      
    }
    
    

    public function article(){
        
        return view("article");
    }

    
}

