<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;


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
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $imageName = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->move(public_path('img'), $imageName);
    }

    Product::create([
        'pname' => $request->pname,
        'pdesc' => $request->pdesc,
        'image' => $imageName,
        'price' => $request->price,
        'porder' => $request->porder
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
    //delete product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            $imagePath = public_path('img/' . $product->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $product->delete();

        return redirect()->route('product')->with('success', 'Product deleted successfully.');
    }

}
