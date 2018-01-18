<?php

namespace App\Http\Controllers\Superuser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryProductModel;
use App\Models\ProductModel;
use App\Models\ConfigModel;
use Validator;
use App\Models\InboxModel;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->data['sidebar_menu'] = 'product';
        $this->data['config'] = ConfigModel::findOrFail(1);
        $this->data['new_message'] = InboxModel::New()->count();
    }

    public function index()
    {
        $data = $this->data;
        $data['product'] = ProductModel::orderBy('id', 'desc')->get();
        return view('back.product.data', $data);
    }

    public function create()
    {
        $data = $this->data;
        $data['category'] = CategoryProductModel::orderBy('id', 'desc')->get();
        return view('back.product.create', $data);
    }

    public function created(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        if (!$validator->fails()){
            $product = new ProductModel();
            $image = $request->file('image');
            $category = CategoryProductModel::find($request->category);
            if (!isset($category->id)){
                return redirect()->back()->with('status', 'failed');
            }
            if (!empty($image)){
                $name = random_name($request->name);
                $filename = 'Product_'.$name.'.'.$image->getClientOriginalExtension();
                $path = 'images/product/single';
                $upload = upload_image($image, $filename, $path);
                $product->image = $upload['name'];
            }
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->category_id = $category->id;
            if ($product->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function update($id)
    {
        $data = $this->data;
        $data['product'] = ProductModel::with('category')->findOrFail($id);
        $data['category'] = CategoryProductModel::orderBy('id', 'desc')->get();
        if (!isset($data['product']->id)){
            return redirect()->route('back.product');
        }
        return view('back.product.edit', $data);
    }

    public function updated(Request $request, $id)
    {
        $product = ProductModel::findOrFail($id);
        $category = CategoryProductModel::find($request->category);

        if (!isset($product->id) || !isset($category->id)){
            return redirect()->back()->with('status', 'failed');
        }

        $rules = array(
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'description' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        if (!$validator->fails()){
            $image = $request->file('image');
            if (!empty($image)){
                if (!empty($product->image) && file_exists("images/product/single/{$product->image}")){
                    remFile("images/product/single/{$product->image}");
                }
                $name = random_name($request->name);
                $filename = 'Product_'.$name.'.'.$image->getClientOriginalExtension();
                $path = 'images/product/single';
                $upload = upload_image($image, $filename, $path);
                $product->image = $upload['name'];
            }
            $product->name = $request->name;
            $product->category_id = $category->id;
            $product->price = $request->price;
            $product->description = $request->description;
            if ($product->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function destroy($id)
    {
        $product = ProductModel::findOrFail($id);

        if(!isset($product->id)){
            return redirect()->route('back.product');
        }

        if(!empty($product->image) && file_exists("images/product/single/{$product->image}")){
            remFile("images/product/single/{$product->image}");
        }

        $product->delete();

        return redirect()->route('back.product');
    }
}
