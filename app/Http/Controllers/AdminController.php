<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('admin.dashboard');
    }
    public function add(){
        return view('admin.createProduct');
    }
    public function edit($id) {
        $product = Product::where('pid', $id)->firstOrFail(); // get only ONE product
        return view('admin.updateProduct', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pname' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('img'), $imageName);
        }

        Product::create([
            'pname' => $request->pname,
            'pdesc' => $request->pdesc,
            'price' => $request->price,
            'porder' => $request->porder,
            'image' => $imageName
        ]);

        return redirect()->route('product')->with('success', 'Product created successfully.');
    }
    public function updated(Request $request, $id)
{
    $product = Product::findOrFail($id);
    
    $product->pname = $request->pname;
    $product->price = $request->price;
    $product->pdesc = $request->pdesc;
    $product->porder = $request->porder;

    if ($request->hasFile('image')) {
        $imageName = time().'_'.$request->image->getClientOriginalName();
        $request->image->move(public_path('img'), $imageName);
        $product->image = $imageName;
    }

    $product->save();

    return redirect()->route('product')->with('success', 'Product updated successfully.');
}
}
