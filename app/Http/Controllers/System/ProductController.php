<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $products = Product::latest()->get();
            return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
        $product=new Product();
        return view('dashboard.products.create',compact('product'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ProductRequest $request)
    { 
       
        $requests = $request->except('cover_image');
        $product = Product::create($requests);

if ($request->hasFile('cover_image'))
        {
            $image = $request->file('cover_image');
            $destinationPath = base_path().'/uploads/products/';
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $name = time().''.rand(11111,99999).'.'.$extension; // renameing image
            $image->move($destinationPath, $name); // uploading file to given
            $product->cover_image = 'uploads/products/'.$name;
            $product->save();
        }

      if ($request->hasFile('images'))
      {
        foreach ($request->images as $photo) {
          $destinationPath = base_path() . '/uploads/products/';
          $extension = $photo->getClientOriginalExtension(); // getting image extension
          $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
          $photo->move($destinationPath, $name); // uploading file to given
          $product->photos()->create(['extension' => $extension, 'url' => 'uploads/products/' . $name]);

        }
      }
        toast(__('Product Added successfully'),'success');
        return redirect(route('system.products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('dashboard.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id,Request $request)
    {
        $product = Product::findOrFail($id);
       
        return view('dashboard.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,ProductRequest $request)
    {
        
        $product = Product::find($id);
        
        $product->fill($request->all())->save();
	 if ($request->hasFile('cover_image'))
        {
            $image = $request->file('cover_image');
            $destinationPath = base_path().'/uploads/products/';
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $name = time().''.rand(11111,99999).'.'.$extension; // renameing image
            $image->move($destinationPath, $name); // uploading file to given
            $product->image = 'uploads/products/'.$name;
            $product->save();
        }
      if ($request->hasFile('images'))
      {
        foreach ($request->images as $photo) {
          $destinationPath = base_path() . '/uploads/products/';
          $extension = $photo->getClientOriginalExtension(); // getting image extension
          $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
          $photo->move($destinationPath, $name); // uploading file to given
          $product->photos()->create(['extension' => $extension, 'url' => 'uploads/products/' . $name]);

        }
      }
        toast(__('Product Edited successfully'),'success');
        return redirect(route('system.products.index',['type'=>$request->type]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $product= Product::findOrFail($id);
        $product->delete();
        toast(__('Product Deleted successfully'),'success');
        return back();
    }

}
