<?php

namespace App\Http\Controllers\Superuser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SliderModel;
use App\Models\ConfigModel;
use Validator;
use App\Models\InboxModel;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->data['sidebar_menu'] = 'slider';
        $this->data['config'] = ConfigModel::findOrFail(1);
        $this->data['new_message'] = InboxModel::New()->count();
    }

    public function index()
    {
        $data = $this->data;
        $data['slider'] = SliderModel::orderBy('id', 'desc')->get();
        return view('back.slider.data', $data);
    }

    public function create()
    {
        $data = $this->data;
        return view('back.slider.create', $data);
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
            $slider = new SliderModel();
            $image = $request->file('image');
            if (!empty($image)){
                $name = random_name($request->name);
                $filename = 'Slider_'.$name.'.'.$image->getClientOriginalExtension();
                $path = 'images/slider/';
                $upload = upload_image($image, $filename, $path);
                $slider->image = $upload['name'];
            }
            $slider->name = $request->name;
            $slider->status = (null !== $request->status ? 1 : 0);
            if ($slider->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function update($id)
    {
        $data = $this->data;
        $data['slider'] = SliderModel::findOrFail($id);
        if (!isset($data['slider']->id)){
            return redirect()->route('back.slider');
        }

        return view('back.slider.edit', $data);
    }

    public function updated(Request $request, $id)
    {
        $slider = SliderModel::findOrFail($id);

        if (!isset($slider->id)){
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
                if (!empty($slider->image) && file_exists("images/slider/{$slider->image}")){
                    remFile("images/slider/{$slider->image}");
                }
                $name = random_name($request->name);
                $filename = 'Slider_'.$name.'.'.$image->getClientOriginalExtension();
                $path = 'images/slider/';
                $upload = upload_image($image, $filename, $path);
                $slider->image = $upload['name'];
            }
            $slider->name = $request->name;
            $slider->status = (null !== $request->status ? 1 : 0);
            if ($slider->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function destroy($id)
    {
        $slider = SliderModel::findOrFail($id);

        if(!isset($slider->id)){
            return redirect()->route('back.slider');
        }

        if(!empty($slider->image) && file_exists("images/slider/{$slider->image}")){
            remFile("images/slider/{$slider->image}");
        }

        $slider->delete();

        return redirect()->route('back.slider');
    }
}
