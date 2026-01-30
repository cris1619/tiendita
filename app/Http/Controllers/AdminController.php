<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //CONTROLLER CATEGORIAS
    public function addCategory(Request $request){
        return view('admin.addcategory');
    }

    public function postAddCategory(Request $request){
        $category=new Category();
        $category->category=$request->category;
        $category->save();
        return redirect()->back()->with('category_message','Category added successfully');
    }

    public function viewCategory(){
        $categories=Category::all();
        return view('admin.viewcategory',compact('categories'));
    }

    public function deleteCategory($id){
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('delete_category','Category deleted successfully');
    }

    public function updatecategory($id){
        $category=Category::findOrFail($id);
        return view('admin.updatecategory',compact('category'));
    }

    public function postUpdateCategory(Request $request,$id){
        $category=Category::findOrFail($id);
        $category->category=$request->category;
        $category->save();
        return redirect()->back()->with('update_category','Category updated successfully');
    }

    //CONTROLLER PRODUCTOS
    public function addProduct(Request $request){
        $categories=Category::all();
        return view('admin.addproduct',compact('categories'));
    }

    public function viewProduct(){
        $products=Product::all();
        return view('admin.viewproduct',compact('products'));
    }

    public function postAddProduct(Request $request){
        $product=new Product();
        $product->product_title=$request->product_title;
        $product->product_description=$request->product_description;
        $product->product_stock=$request->product_stock;
        $product->product_prices=$request->product_prices;
        $product->product_category=$request->product_category;
        $image=$request->product_image;
            if($image){
                $imagename = time().'.'.$image->getClientOriginalExtension();

                $product->product_image=$imagename;
            }
        $product->save();
        
        if($image && $product->save()){
            $request->product_image->move('products',$imagename);
        }

        return redirect()->back()->with('product_message','Product added successfully');
    }
}
