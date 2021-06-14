<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products = Product::paginate(20);
        if (Gate::allows('access-admin')) {
            return view('admin.product.index',[
                'products' => $products
            ]);
        }else{
            return view('manager.product.index',[
                'products' => $products
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('access-admin')) {
            
            return redirect()->back();  
        }
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('access-admin')) {
            
            return redirect()->back();  
        }
        $product = new Product();
        $product['title'] = $request['title'];
        $product['text'] = $request['text'];
        $product['img'] = $request['img'];
        $product['price'] = $request['price'];

        $product->save();

        return redirect()->back()->withSuccess('Товар был успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if (Gate::allows('access-admin')) {}
        else{
            return redirect()->back()->withError('У вас нет доступа');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {   
        
        if (!Gate::allows('access-admin')) {
            
            return redirect()->back()->withError('У вас нет доступа');  
        } 
            $product->delete();  
            return redirect()->back()->withSuccess('Товар был успешно удален');
        
    }
}
