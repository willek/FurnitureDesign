<?php

namespace App\Http\Controllers\Superuser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConfigModel;
use App\Models\HeaderModel;
use Validator;
use App\Models\InboxModel;

class HeaderController extends Controller
{
    public function __construct()
    {
        $this->data['sidebar_menu'] = 'header';
        $this->data['config'] = ConfigModel::findOrFail(1);
        $this->data['new_message'] = InboxModel::New()->count();
    }

    public function index()
    {
        $data = $this->data;
        $data['header'] = HeaderModel::findOrFail(1);
        return view('back.header.index', $data);
    }

    public function save(Request $request, $id)
    {
        $header = HeaderModel::findOrFail(1);

        $rules = array(
            'about' => 'image|mimes:jpeg,png,jpg|max:2048',
            'product' => 'image|mimes:jpeg,png,jpg|max:2048',
            'productset' => 'image|mimes:jpeg,png,jpg|max:2048',
            'gallery' => 'image|mimes:jpeg,png,jpg|max:2048',
            'blog' => 'image|mimes:jpeg,png,jpg|max:2048',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        $about = $request->file('about');
        if (!empty($about)){
            if (!empty($header->about_img) && file_exists("images/header/{$header->about_img}")){
                remFile("images/header/{$header->about_img}");
            }
            $filename = 'About_'.str_before(str_slug(today()), '-000000').'.'.$about->getClientOriginalExtension();
            $path = str_finish('images\header', '\\');
            $upload = upload_image($about, $filename, $path);
            $header->about_img = $upload['name'];
        }

        $product = $request->file('product');
        if (!empty($product)){
            if (!empty($header->product_img) && file_exists("images/header/{$header->product_img}")){
                remFile("images/header/{$header->product_img}");
            }
            $filename = 'Product_'.str_before(str_slug(today()), '-000000').'.'.$product->getClientOriginalExtension();
            $path = str_finish('images\header', '\\');
            $upload = upload_image($product, $filename, $path);
            $header->product_img = $upload['name'];
        }

        $productset = $request->file('productset');
        if (!empty($productset)){
            if (!empty($header->product_set_img) && file_exists("images/header/{$header->product_set_img}")){
                remFile("images/header/{$header->product_set_img}");
            }
            $filename = 'ProductSet_'.str_before(str_slug(today()), '-000000').'.'.$productset->getClientOriginalExtension();
            $path = str_finish('images\header', '\\');
            $upload = upload_image($productset, $filename, $path);
            $header->product_set_img = $upload['name'];
        }

        $gallery = $request->file('gallery');
        if (!empty($gallery)){
            if (!empty($header->gallery_img) && file_exists("images/header/{$header->gallery_img}")){
                remFile("images/header/{$header->gallery_img}");
            }
            $filename = 'Gallery_'.str_before(str_slug(today()), '-000000').'.'.$gallery->getClientOriginalExtension();
            $path = str_finish('images\header', '\\');
            $upload = upload_image($gallery, $filename, $path);
            $header->gallery_img = $upload['name'];
        }

        $blog = $request->file('blog');
        if (!empty($blog)){
            if (!empty($header->blog_img) && file_exists("images/header/{$header->blog_img}")){
                remFile("images/header/{$header->blog_img}");
            }
            $filename = 'Blog_'.str_before(str_slug(today()), '-000000').'.'.$blog->getClientOriginalExtension();
            $path = str_finish('images\header', '\\');
            $upload = upload_image($blog, $filename, $path);
            $header->blog_img = $upload['name'];
        }

        if ($header->save()){
            return redirect()->back()->with('status', 'success');
        }
    }
}
