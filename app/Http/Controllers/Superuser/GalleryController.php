<?php

namespace App\Http\Controllers\Superuser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GalleryModel;
use App\Models\ConfigModel;
use Validator;
use App\Models\InboxModel;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->data['sidebar_menu'] = 'gallery';
        $this->data['config'] = ConfigModel::findOrFail(1);
        $this->data['new_message'] = InboxModel::New()->count();
    }

    public function index()
    {
        $data = $this->data;
        $data['gallery'] = GalleryModel::orderBy('id', 'desc')->get();
        return view('back.gallery.data', $data);
    }

    public function create()
    {
        $data = $this->data;
        return view('back.gallery.create', $data);
    }

    public function created(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        if (!$validator->fails()){
            $gallery = new GalleryModel();
            $image = $request->file('image');
            if (!empty($image)){
                $name = random_name($request->name);
                $filename = 'Gallery_'.$name.'.'.$image->getClientOriginalExtension();
                $path = 'images/gallery/';
                $upload = upload_image($image, $filename, $path);
                $gallery->image = $upload['name'];
            }
            $gallery->name = $request->name;
            if ($gallery->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function update($id)
    {
        $data = $this->data;
        $data['gallery'] = GalleryModel::findOrFail($id);
        if (!isset($data['gallery']->id)){
            return redirect()->route('back.gallery');
        }

        return view('back.gallery.edit', $data);
    }

    public function updated(Request $request, $id)
    {
        $gallery = GalleryModel::findOrFail($id);

        if (!isset($gallery->id)){
            return redirect()->back()->with('status', 'failed');
        }

        $rules = array(
            'name' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        if (!$validator->fails()){
            $image = $request->file('image');
            if (!empty($image)){
                if (!empty($gallery->image) && file_exists("images/gallery/{$gallery->image}")){
                    remFile("images/gallery/{$gallery->image}");
                }
                $name = random_name($request->name);
                $filename = 'Gallery_'.$name.'.'.$image->getClientOriginalExtension();
                $path = 'images/gallery/';
                $upload = upload_image($image, $filename, $path);
                $gallery->image = $upload['name'];
            }
            $gallery->name = $request->name;
            if ($gallery->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function destroy($id)
    {
        $gallery = GalleryModel::findOrFail($id);

        if(!isset($gallery->id)){
            return redirect()->route('back.gallery');
        }

        if(!empty($gallery->image) && file_exists("images/gallery/{$gallery->image}")){
            remFile("images/gallery/{$gallery->image}");
        }

        $gallery->delete();

        return redirect()->route('back.gallery');
    }
}
