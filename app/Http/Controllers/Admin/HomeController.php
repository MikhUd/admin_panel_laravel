<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){

        $products_count = Product::all()->count();
        $users_count = User::all()->count();

        if (Gate::allows('access-admin')) {
            return view('admin.home.index',[
                'products_count' => $products_count,
                'users_count' => $users_count
            ]);
        }else{
            return view('manager.home.index',[
                'products_count' => $products_count,
            ]);
        }    
    }
}
