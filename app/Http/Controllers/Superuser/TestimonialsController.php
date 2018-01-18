<?php

namespace App\Http\Controllers\Superuser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConfigModel;
use App\Models\TestimonialsModel;
use Validator;
use App\Models\InboxModel;

class TestimonialsController extends Controller
{
    public function __construct()
    {
        $this->data['sidebar_menu'] = 'testimonials';
        $this->data['config'] = ConfigModel::findOrFail(1);
        $this->data['new_message'] = InboxModel::New()->count();
    }

    public function index()
    {
        $data = $this->data;
        $data['testimonials'] = TestimonialsModel::orderBy('id', 'desc')->get();
        return view('back.testimonials.data', $data);
    }

    public function create()
    {
        $data = $this->data;
        return view('back.testimonials.create', $data);
    }

    public function created(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required',
            'occupation' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        if (!$validator->fails()){
            $testimonials = new TestimonialsModel();
            $image = $request->file('image');
            if (!empty($image)){
                $name = random_name($request->name);
                $filename = 'Testimonials_'.$name.'.'.$image->getClientOriginalExtension();
                $path = 'images/testimonials/';
                $upload = upload_image($image, $filename, $path);
                $testimonials->image = $upload['name'];
            }
            $testimonials->name = $request->name;
            $testimonials->occupation = $request->occupation;
            $testimonials->content = $request->content;
            if ($testimonials->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function update($id)
    {
        $data = $this->data;
        $data['testimonials'] = TestimonialsModel::findOrFail($id);
        if (!isset($data['testimonials']->id)){
            return redirect()->route('back.testimonials');
        }

        return view('back.testimonials.edit', $data);
    }

    public function updated(Request $request, $id)
    {
        $testimonials = TestimonialsModel::findOrFail($id);

        if (!isset($testimonials->id)){
            return redirect()->back()->with('status', 'failed');
        }

        $rules = array(
            'name' => 'required',
            'content' => 'required',
            'occupation' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        if (!$validator->fails()){
            $image = $request->file('image');
            if (!empty($image)){
                if (!empty($testimonials->image) && file_exists("images/testimonials/{$testimonials->image}")){
                    remFile("images/testimonials/{$testimonials->image}");
                }
                $name = random_name($request->name);
                $filename = 'Testimonials_'.$name.'.'.$image->getClientOriginalExtension();
                $path = 'images/testimonials/';
                $upload = upload_image($image, $filename, $path);
                $testimonials->image = $upload['name'];
            }
            $testimonials->name = $request->name;
            $testimonials->content = $request->content;
            $testimonials->occupation = $request->occupation;
            if ($testimonials->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function destroy($id)
    {
        $testimonials = TestimonialsModel::findOrFail($id);

        if(!isset($testimonials->id)){
            return redirect()->route('back.testimonials');
        }

        if(!empty($testimonials->image) && file_exists("images/testimonials/{$testimonials->image}")){
            remFile("images/testimonials/{$testimonials->image}");
        }

        $testimonials->delete();

        return redirect()->route('back.testimonials');
    }
}
