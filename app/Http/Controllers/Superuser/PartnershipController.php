<?php

namespace App\Http\Controllers\Superuser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PartnershipModel;
use App\Models\ConfigModel;
use Validator;
use App\Models\InboxModel;

class PartnershipController extends Controller
{

    public function __construct()
    {
        $this->data['sidebar_menu'] = 'partnership';
        $this->data['config'] = ConfigModel::findOrFail(1);
        $this->data['new_message'] = InboxModel::New()->count();
    }

    public function index()
    {
        $data = $this->data;
        $data['partnership'] = PartnershipModel::orderBy('id', 'desc')->get();
        return view('back.partnership.data', $data);
    }

    public function create()
    {
        $data = $this->data;
        return view('back.partnership.create', $data);
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
            $partnership = new PartnershipModel();
            $image = $request->file('image');
            if (!empty($image)){
                $name = random_name($request->name);
                $filename = 'Partnership_'.$name.'.'.$image->getClientOriginalExtension();
                $path = 'images/partnership/';
                $upload = upload_image($image, $filename, $path);
                $partnership->image = $upload['name'];
            }
            $partnership->name = $request->name;
            $partnership->status = (null !== $request->status ? 1 : 0);
            if ($partnership->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function update($id)
    {
        $data = $this->data;
        $data['partnership'] = PartnershipModel::findOrFail($id);
        if (!isset($data['partnership']->id)){
            return redirect()->route('back.partnership');
        }

        return view('back.partnership.edit', $data);
    }

    public function updated(Request $request, $id)
    {
        $partnership = PartnershipModel::findOrFail($id);

        if (!isset($partnership->id)){
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
                if (!empty($partnership->image) && file_exists("images/partnership/{$partnership->image}")){
                    remFile("images/partnership/{$partnership->image}");
                }
                $name = random_name($request->name);
                $filename = 'Partnership_'.$name.'.'.$image->getClientOriginalExtension();
                $path = 'images/partnership/';
                $upload = upload_image($image, $filename, $path);
                $partnership->image = $upload['name'];
            }
            $partnership->name = $request->name;
            $partnership->status = (null !== $request->status ? 1 : 0);
            if ($partnership->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function destroy($id)
    {
        $partnership = PartnershipModel::findOrFail($id);

        if(!isset($partnership->id)){
            return redirect()->route('back.partnership');
        }

        if(!empty($partnership->image) && file_exists("images/partnership/{$partnership->image}")){
            remFile("images/partnership/{$partnership->image}");
        }

        $partnership->delete();

        return redirect()->route('back.partnership');
    }
}
