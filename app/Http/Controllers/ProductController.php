<?php
  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Models\Product;
  use Illuminate\Support\Facades\Storage;
  use App\Models\Category; // เพิ่มบรรทัดนี้

  class ProductController extends Controller
  {
      public function index()
      {
          $products = Product::all(); // Fetch all products
          return view('products/index', compact('products'));
      }
  
      public function create()
      {
        $categories = Category::all(); // หรือวิธีการดึงข้อมูล category ที่เหมาะสม
        return view('products.create', compact('categories'));// Show form to create new product
      }
      public function store(Request $request)
      {
          // Validate the request
          $request->validate([
              'name' => 'required|string|max:255',
              'price' => 'required|numeric',
              'product_code' => 'required|string|max:255',
              'description' => 'required|string',
              'stock_quantity' => 'required|integer|min:0',
              'category_id' => 'required|string',  // validate category
              'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
      
          // Check if category exists, if not create a new category
          $category = \App\Models\Category::firstOrCreate([
              'name' => $request->category_id,  // using the input as category name
          ]);
      
          // Handle image upload
          $imagePath = $request->hasFile('image') ? $request->file('image')->store('product_images', 'public') : null;
      
          // Create product
          Product::create([
              'name' => $request->name,
              'price' => $request->price,
              'product_code' => $request->product_code,
              'description' => $request->description,
              'stock_quantity' => $request->stock_quantity,
              'category_id' => $category->id,  // link to the created category
              'image' => $imagePath,
          ]);
      
          return redirect()->route('products.index')->with('success', 'Product added successfully');
      }
      
      public function edit($id)
      {
          $product = Product::findOrFail($id); // Fetch product by ID
          return view('products.edit', compact('product')); // Show form to edit product
      }
  
      public function update(Request $request, $id)
      {
          // Validate the request
          $request->validate([
              'name' => 'required|string|max:255',
              'description' => 'required|string',
              'price' => 'required|numeric',
              'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // validate image
          ]);
  
          $product = Product::findOrFail($id); // Fetch product by ID
  
          // Handle image upload
          if ($request->hasFile('image')) {
              // Delete old image if exists
              if ($product->image && Storage::exists('public/' . $product->image)) {
                  Storage::delete('public/' . $product->image);
              }
  
              // Store new image
              $imagePath = $request->file('image')->store('product_images', 'public');
          } else {
              $imagePath = $product->image; // Keep old image if no new one is uploaded
          }
  
          // Update product details
          $product->update([
              'name' => $request->name,
              'description' => $request->description,
              'price' => $request->price,
              'image' => $imagePath, // Update image path
          ]);
  
          return redirect()->route('products.index')->with('success', 'Product updated successfully');
      }
  
      public function show($id)
      {
          $product = Product::findOrFail($id); // Fetch product by ID
          return view('products.show', compact('product')); // Show product details
      }
  
      public function destroy($id)
      {
          $product = Product::findOrFail($id);
          
          // Delete product image from storage if exists
          if ($product->image && Storage::exists('public/' . $product->image)) {
              Storage::delete('public/' . $product->image);
          }
  
          // Delete product
          $product->delete();
          
          return redirect()->route('products.index')->with('success', 'Product deleted successfully');
      }
  }
  