<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //This method will show products page
    public function index()
    {
        // $products = Product::orderBy('created_at','ASC')->get();
        // $products = Product::orderBy('created_at','ASC')->paginate(5);
        $products = Product::orderBy('created_at','DESC')->paginate(5);

        // Pass the products to the view
        // return view('products.index', compact('products'));

        return view('Products.productList',[
            'products' => $products
        ]);
        // return view('Products.productList');
    }

    //This method will show create products page
    public function create()
    {
        return view('Products.create');
    }

    //This method will store products in a DB
    public function store(Request $request)
    {
        // $request -> validate(
        //     [
        //         'name' => 'required',
        //         'name' => 'required',
        //         'name' => 'required',
        //     ]
        // )
        $rules = [
            'product_name' => 'required | string | min:3',
            'sku' => 'required | min:3',
            'price' => 'required | numeric',
            'product_description' => 'nullable|string',
            'product_image' => 'nullable|image'
        ];

        if($request->product_image != "")
        {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        if($validator -> fails()){
            // return redirect()->back()->withErrors($validator)->withInput();
            return redirect()->route('Products.create')->withErrors($validator)->withInput();
        }

        // here we will insert product in db
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->product_description = $request->description;
        $product->product_image = $request->product_image;


        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/uploads/products');
            $product->product_image = basename($path);
        }
        
        // if($request->product_image != "")
        // {
        //     // here we will store image
        //     $image = $request->product_image;
        //     $ext = $image->getClientOriginalExtension();
        //     $imageName = time().'.'.$ext; //unique image name

        //     //save image to products
        //     $image->move(public_path('uploads/products'), $imageName);

        //     //save image name in db
        //     $product->product_image = $imageName;
        // }
        
        $product->save();
        
        return redirect()->route('Products.index')->with('success', 'Product Added Successfully');
        }

    //This method will edit product 
    public function edit($product_id)
    {
        // return view('Products.edit');
        $product = Product::findOrFail($product_id);
        return view('Products.edit',[
            'product' => $product
        ]);
    }

    //This method will update a product
    public function update($product_id, Request $request)
    {

        $product = Product::findOrFail($product_id);

        $rules = [
            'product_name' => 'required | string | min:5',
            'sku' => 'required | min:3',
            'price' => 'required | numeric',
            'product_description' => 'nullable|string',
            'product_image' => 'nullable|image'
        ];

        if($request->product_image != "")
        {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        if($validator -> fails()){
            // return redirect()->back()->withErrors($validator)->withInput();
            return redirect()->route('Products.edit', $product->product_id)->withErrors($validator)->withInput();
        }

        // here we will insert product in db
        // $product = new Product();
        $product->product_name = $request->product_name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->product_description = $request->description;
        $product->product_image = $request->product_image;


        // if ($request->hasFile('image')) {

        //     // deleting old image
        //     File::delete(public_path('public/uploads/products/' . $product->image));
        //     // $product->image = $request->file('image')->store('products', 'public');
        //     $path = $request->file('image')->store('public/uploads/products');
        //     $product->product_image = basename($path);
        // }

        if ($request->hasFile('image')) {
            // Check if there's an existing image
            if (!empty($product->product_image)) {
                $oldImagePath = public_path('storage/uploads/products/' . $product->product_image);
                
                // Check if the file exists and delete it
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
        
            // Store new image
            $path = $request->file('image')->store('public/uploads/products');
            $product->product_image = basename($path);
        }
        
        // if($request->product_image != "")
        // {
        //     // here we will store image
        //     $image = $request->product_image;
        //     $ext = $image->getClientOriginalExtension();
        //     $imageName = time().'.'.$ext; //unique image name

        //     //save image to products
        //     $image->move(public_path('uploads/products'), $imageName);

        //     //save image name in db
        //     $product->product_image = $imageName;
        // }
        
        $product->save();
        
        return redirect()->route('Products.index')->with('success', 'Product Successfully Updated');
    }

    //This method will delete products from DB and Products page
    public function destroy($product_id)
    {
        $product = Product::findOrFail($product_id);

        if (!empty($product->product_image)) {
            $oldImagePath = public_path('storage/uploads/products/' . $product->product_image);
            
            // Check if the file exists and delete it
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        // delete Product
        $product->delete();

        return redirect()->route('Products.index')->with('success', 'Product deleted Successfully');
    }
}
