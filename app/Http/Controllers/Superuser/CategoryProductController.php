<?php

namespace App\Http\Controllers\Superuser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryProductModel;
use App\Models\ProductModel;
use App\Models\ConfigModel;
use Validator;
use App\Models\InboxModel;

class CategoryProductController extends Controller
{
    public function __construct()
    {
        $this->data['sidebar_menu'] = 'category_product';
        $this->data['config'] = ConfigModel::findOrFail(1);
        $this->data['new_message'] = InboxModel::New()->count();
    }

    public function index()
    {
        $data = $this->data;
        $data['category_product'] = CategoryProductModel::orderBy('id', 'desc')->get();
        return view('back.category_product.data', $data);
    }

    public function create()
    {
        $data = $this->data;
        return view('back.category_product.create', $data);
    }

    public function created(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        if (!$validator->fails()){
            $category_product = new CategoryProductModel();
            $image = $request->file('image');
            if (!empty($image)){
                $name = random_name($request->name);
                $filename = 'CategoryProduct_'.$name.'.'.$image->getClientOriginalExtension();
                $path = 'images/category_product/';
                $upload = upload_image($image, $filename, $path);
                $category_product->image = $upload['name'];
            }
            $category_product->name = $request->name;
            $category_product->description = $request->description;
            if ($category_product->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function update($id)
    {
        $data = $this->data;
        $data['category_product'] = CategoryProductModel::findOrFail($id);
        if (!isset($data['category_product']->id)){
            return redirect()->route('back.category_product');
        }

        return view('back.category_product.edit', $data);
    }

    public function updated(Request $request, $id)
    {
        $category_product = CategoryProductModel::findOrFail($id);

        if (!isset($category_product->id)){
            return redirect()->back()->with('status', 'failed');
        }

        $rules = array(
            'name' => 'required',
            'description' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        if (!$validator->fails()){
            $image = $request->file('image');
            if (!empty($image)){
                if (!empty($category_product->image) && file_exists("images/category_product/{$category_product->image}")){
                    remFile("images/category_product/{$category_product->image}");
                }
                $name = random_name($request->name);
                $filename = 'CategoryProduct_'.$name.'.'.$image->getClientOriginalExtension();
                $path = 'images/category_product/';
                $upload = upload_image($image, $filename, $path);
                $category_product->image = $upload['name'];
            }
            $category_product->name = $request->name;
            $category_product->description = $request->description;
            if ($category_product->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function destroy($id)
    {
        $category_product = CategoryProductModel::findOrFail($id);

        if(!isset($category_product->id)){
            return redirect()->route('back.category_product');
        }

        if(!empty($category_product->image) && file_exists("images/category_product/{$category_product->image}")){
            remFile("images/category_product/{$category_product->image}");
        }

        $product = ProductModel::where('category_id', $category_product->id)->orderBy('id','desc')->get();

        foreach ($product as $result) {
            if(!empty($result->image) && file_exists("images/product/single/{$result->image}")){
                remFile("images/product/single/{$result->image}");
            }
        }

        ProductModel::where('category_id', $category_product->id)->delete();
        $category_product->delete();

        return redirect()->route('back.category_product');
    }
}
