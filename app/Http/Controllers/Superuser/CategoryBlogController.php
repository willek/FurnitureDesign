<?php

namespace App\Http\Controllers\Superuser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConfigModel;
use App\Models\CategoryBlogModel;
use App\Models\BlogModel;
use Validator;
use App\Models\InboxModel;

class CategoryBlogController extends Controller
{
    public function __construct()
    {
        $this->data['sidebar_menu'] = 'category_blog';
        $this->data['config'] = ConfigModel::findOrFail(1);
        $this->data['new_message'] = InboxModel::New()->count();
    }

    public function index()
    {
        $data = $this->data;
        $data['category_blog'] = CategoryBlogModel::orderBy('id', 'desc')->get();
        return view('back.category_blog.data', $data);
    }

    public function create()
    {
        $data = $this->data;
        return view('back.category_blog.create', $data);
    }

    public function created(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'description' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        if (!$validator->fails()){
            $category_blog = new CategoryBlogModel();
            $category_blog->name = $request->name;
            $category_blog->description = $request->description;
            if ($category_blog->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function update($id)
    {
        $data = $this->data;
        $data['category_blog'] = CategoryBlogModel::findOrFail($id);
        if (!isset($data['category_blog']->id)){
            return redirect()->route('back.category_blog');
        }

        return view('back.category_blog.edit', $data);
    }

    public function updated(Request $request, $id)
    {
        $category_blog = CategoryBlogModel::findOrFail($id);

        if (!isset($category_blog->id)){
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
            $category_blog->name = $request->name;
            $category_blog->description = $request->description;
            if ($category_blog->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function destroy($id)
    {
        $category_blog = CategoryBlogModel::findOrFail($id);

        if(!isset($category_blog->id)){
            return redirect()->route('back.category_blog');
        }

        $blog = BlogModel::where('category_id', $category_blog->id)->orderBy('id','desc')->get();

        foreach ($blog as $result) {
            if(!empty($result->image) && file_exists("images/blog/{$result->image}")){
                remFile("images/blog/{$result->image}");
            }
        }

        BlogModel::where('category_id', $category_blog->id)->delete();
        $category_blog->delete();

        return redirect()->route('back.category_blog');
    }
}
