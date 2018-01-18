<?php

namespace App\Http\Controllers\Superuser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConfigModel;
use App\Models\InboxModel;

class InboxController extends Controller
{
    public function __construct()
    {
        $this->data['sidebar_menu'] = 'inbox';
        $this->data['config'] = ConfigModel::findOrFail(1);
        $this->data['new_message'] = InboxModel::New()->count();
    }

    public function index()
    {
        $data = $this->data;
        $data['inbox'] = InboxModel::orderBy('id', 'desc')->get();
        return view('back.inbox.data', $data);
    }


    public function view($id)
    {
        $data = $this->data;
        $data['inbox'] = InboxModel::findOrFail($id);
        if (!isset($data['inbox']->id)){
            return redirect()->route('back.inbox');
        }

        $data['inbox']->status = 'readed';
        $data['inbox']->save();

        return view('back.inbox.view', $data);
    }

    public function destroy($id)
    {
        $inbox = InboxModel::findOrFail($id);

        if(!isset($inbox->id)){
            return redirect()->route('back.inbox');
        }

        $inbox->delete();
        return redirect()->route('back.inbox');
    }
}
