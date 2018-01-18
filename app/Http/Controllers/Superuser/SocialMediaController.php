<?php

namespace App\Http\Controllers\Superuser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SocialMediaModel;
use App\Models\ConfigModel;
use Validator;
use App\Models\InboxModel;

class SocialMediaController extends Controller
{
    public function __construct()
    {
        $this->data['sidebar_menu'] = 'social_media';
        $this->data['config'] = ConfigModel::findOrFail(1);
        $this->data['new_message'] = InboxModel::New()->count();
    }

    public function index()
    {
        $data = $this->data;
        $data['social_media'] = SocialMediaModel::orderBy('id', 'desc')->get();
        return view('back.social_media.data', $data);
    }

    public function create()
    {
        $data = $this->data;
        return view('back.social_media.create', $data);
    }

    public function created(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'url' => 'required',
            'type' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        if (!$validator->fails()){
            $social_media = new SocialMediaModel();
            $social_media->name = $request->name;
            $social_media->url = $request->url;
            $social_media->type= $request->type;
            if ($social_media->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function update($id)
    {
        $data = $this->data;
        $data['social_media'] = SocialMediaModel::findOrFail($id);
        if (!isset($data['social_media']->id)){
            return redirect()->route('back.social_media');
        }

        return view('back.social_media.edit', $data);
    }

    public function updated(Request $request, $id)
    {
        $social_media = SocialMediaModel::findOrFail($id);

        if (!isset($social_media->id)){
            return redirect()->back()->with('status', 'failed');
        }

        $rules = array(
            'name' => 'required',
            'url' => 'required',
            'type' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        if (!$validator->fails()){
            $social_media->name = $request->name;
            $social_media->url = $request->url;
            $social_media->type = $request->type;
            if ($social_media->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function destroy($id)
    {
        $social_media = SocialMediaModel::findOrFail($id);

        if(!isset($social_media->id)){
            return redirect()->route('back.social_media');
        }

        $social_media->delete();

        return redirect()->route('back.social_media');
    }
}
