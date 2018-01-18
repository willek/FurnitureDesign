<?php

namespace App\Http\Controllers\Superuser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryBlogModel;
use App\Models\BlogModel;
use App\Models\ConfigModel;
use Validator;
use App\Models\InboxModel;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->data['sidebar_menu'] = 'blog';
        $this->data['config'] = ConfigModel::findOrFail(1);
        $this->data['new_message'] = InboxModel::New()->count();
    }

    public function index()
    {
        $data = $this->data;
        $data['blog'] = BlogModel::orderBy('id', 'desc')->get();
        return view('back.blog.data', $data);
    }

    public function create()
    {
        $data = $this->data;
        $data['category'] = CategoryBlogModel::orderBy('id', 'desc')->get();
        return view('back.blog.create', $data);
    }

    public function created(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        if (!$validator->fails()){
            $blog = new BlogModel();
            $image = $request->file('image');
            $category = CategoryBlogModel::find($request->category);
            if (!isset($category->id)){
                return redirect()->back()->with('status', 'failed');
            }
            if (!empty($image)){
                $name = random_name($request->name);
                $filename = 'Blog_'.$name.'.'.$image->getClientOriginalExtension();
                $path = 'images/blog/';
                $upload = upload_image($image, $filename, $path);
                $blog->image = $upload['name'];
            }
            $blog->name = $request->name;
            $blog->category_id = $category->id;
            $blog->content = $request->content;
            if ($blog->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function update($id)
    {
        $data = $this->data;
        $data['blog'] = BlogModel::findOrFail($id);
        $data['category'] = CategoryBlogModel::orderBy('id', 'desc')->get();
        if (!isset($data['blog']->id)){
            return redirect()->route('back.blog');
        }

        return view('back.blog.edit', $data);
    }

    public function updated(Request $request, $id)
    {
        $blog = BlogModel::findOrFail($id);
        $category = CategoryBlogModel::find($request->category);

        if (!isset($blog->id) || !isset($category->id)){
            return redirect()->back()->with('status', 'failed');
        }

        $rules = array(
            'name' => 'required',
            'category' => 'required',
            'content' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        if (!$validator->fails()){
            $image = $request->file('image');
            if (!empty($image)){
                if (!empty($blog->image) && file_exists("images/blog/{$blog->image}")){
                    remFile("images/blog/{$blog->image}");
                }
                $name = random_name($request->name);
                $filename = 'Blog_'.$name.'.'.$image->getClientOriginalExtension();
                $path = 'images/blog/';
                $upload = upload_image($image, $filename, $path);
                $blog->image = $upload['name'];
            }
            $blog->name = $request->name;
            $blog->category_id = $category->id;
            $blog->content = $request->content;
            if ($blog->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function destroy($id)
    {
        $blog = BlogModel::findOrFail($id);

        if(!isset($blog->id)){
            return redirect()->route('back.blog');
        }

        if(!empty($blog->image) && file_exists("images/blog/{$blog->image}")){
            remFile("images/blog/{$blog->image}");
        }

        $blog->delete();

        return redirect()->route('back.blog');
    }
}
