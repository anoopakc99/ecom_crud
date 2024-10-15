<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class ProductController extends Controller
{
    //insert form

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('products'), $imageName);
    }

    // Create a new product
    Product::create([
        'name' => $request->name,
        'amount' => $request->amount,
        'description' => $request->description,
        'image' => $imageName,
    ]);

    return redirect()->route('products.index')->with('success', 'Product created successfully!');
}


    // List all products
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

      // Show a single product
      public function show(Product $product)
      {
          return view('products.show', compact('product'));
      }
  
      // Edit a product
      public function edit(Product $product)
      {
          return view('products.edit', compact('product'));
      }
  
      // Update  product
      public function update(Request $request, Product $product)
      {
          // Validate the form data
          $request->validate([
              'name' => 'required|string|max:255',
              'amount' => 'required|numeric',
              'description' => 'required',
              'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
          ]);
      
          if ($request->hasFile('image')) {
              if ($product->image && file_exists(public_path('products/' . $product->image))) {
                  unlink(public_path('products/' . $product->image));
              }
      
              $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
              $request->file('image')->move(public_path('products'), $imageName);
              $product->image = $imageName;
          }

          $product->update([
              'name' => $request->name,
              'amount' => $request->amount,
              'description' => $request->description,
          ]);
      
          // Save the new image name db
          if (isset($imageName)) {
              $product->image = $imageName;
              $product->save();
          }
      
          return redirect()->route('products.index')->with('success', 'Product updated successfully!');
      }
      
  
      // Delete a product
      public function destroy(Product $product)
      {
          if ($product->image) {
              Storage::delete('public/' . $product->image);
          }
          $product->delete();
  
          return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
      }

}
