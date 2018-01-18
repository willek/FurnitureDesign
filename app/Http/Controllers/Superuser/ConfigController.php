<?php

namespace App\Http\Controllers\Superuser;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\ConfigModel;
use Validator;
use App\Models\InboxModel;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->data['sidebar_menu'] = 'config';
        $this->data['config'] = ConfigModel::findOrFail(1);
        $this->data['new_message'] = InboxModel::New()->count();
    }

    public function index()
    {
        $data = $this->data;
        $data['auth'] = Auth::user();
        return view('back.config.layout', $data);
    }

    public function settings(Request $request, $id)
    {
        $config = ConfigModel::findOrFail($id);

        if (!isset($config->id)){
            return redirect()->back()->with('status', 'failed');
        }

        $rules = array(
            'website_name' => 'required',
            'website_description' => 'required',
            'maintenance_message' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        if (!$validator->fails()){
            $config->website_name = $request->website_name;
            $config->website_description = $request->website_description;
            $config->maintenance = (null !== $request->maintenance ? 'enable' : 'disable');
            $config->maintenance_message = $request->maintenance_message;
            if ($config->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function contact(Request $request, $id)
    {
        $config = ConfigModel::findOrFail($id);

        if (!isset($config->id)){
            return redirect()->back()->with('status', 'failed');
        }

        $rules = array(
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'sub_address' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        if (!$validator->fails()){
            $config->email = $request->email;
            $config->phone = $request->phone;
            $config->address = $request->address;
            $config->sub_address = $request->sub_address;
            if ($config->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function maps(Request $request, $id)
    {
        $config = ConfigModel::findOrFail($id);

        if (!isset($config->id)){
            return redirect()->back()->with('status', 'failed');
        }

        $rules = array(
            'gmaps' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        if (!$validator->fails()){
            $config->gmaps= $request->gmaps;
            if ($config->save()){
                return redirect()->back()->with('status', 'success');
            }
        }
    }

    public function images(Request $request, $id)
    {
        $config = ConfigModel::findOrFail($id);

        if (!isset($config->id)){
            return redirect()->back()->with('status', 'failed');
        }

        $rules = array(
            'favicon' => 'image|mimes:jpeg,png,jpg|max:2048',
            'icon' => 'image|mimes:jpeg,png,jpg|max:2048',
            'not_found' => 'image|mimes:jpeg,png,jpg|max:2048',
            'login' => 'image|mimes:jpeg,png,jpg|max:2048',
            'webimg' => 'image|mimes:jpeg,png,jpg|max:2048'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        $favicon = $request->file('favicon');

        if (!empty($favicon)){
            if (!empty($config->favicon) && file_exists("images/config/{$config->favicon}")){
                remFile("images/config/{$config->favicon}");
            }
            $filename = 'Favicon_'.str_before(str_slug(today()), '-000000').'.'.$favicon->getClientOriginalExtension();
            $path = str_finish('images\config', '\\');
            $upload = upload_image($favicon, $filename, $path);
            $config->favicon = $upload['name'];
        }

        $icon = $request->file('icon');

        if (!empty($icon)){
            if (!empty($config->icon) && file_exists("images/config/{$config->icon}")){
                remFile("images/config/{$config->icon}");
            }
            $filename = 'Icon_'.str_before(str_slug(today()), '-000000').'.'.$icon->getClientOriginalExtension();
            $path = str_finish('images\config', '\\');
            $upload = upload_image($icon, $filename, $path);
            $config->icon = $upload['name'];
        }

        $not_found = $request->file('not_found');

        if (!empty($not_found)){
            if (!empty($config->not_found) && file_exists("images/config/{$config->not_found}")){
                remFile("images/config/{$config->not_found}");
            }
            $filename = 'NotFound_'.str_before(str_slug(today()), '-000000').'.'.$not_found->getClientOriginalExtension();
            $path = str_finish('images\config', '\\');
            $upload = upload_image($not_found, $filename, $path);
            $config->not_found = $upload['name'];
        }

        $login = $request->file('login');

        if (!empty($login)){
            if (!empty($config->login) && file_exists("images/config/{$config->login}")){
                remFile("images/config/{$config->login}");
            }
            $filename = 'Login_'.str_before(str_slug(today()), '-000000').'.'.$login->getClientOriginalExtension();
            $path = str_finish('images\config', '\\');
            $upload = upload_image($login, $filename, $path);
            $config->login = $upload['name'];
        }

        $webimg = $request->file('webimg');

        if (!empty($webimg)){
            if (!empty($config->website_image) && file_exists("images/config/{$config->website_image}")){
                remFile("images/config/{$config->website_image}");
            }
            $filename = 'Webimg_'.str_before(str_slug(today()), '-000000').'.'.$webimg->getClientOriginalExtension();
            $path = str_finish('images\config', '\\');
            $upload = upload_image($webimg, $filename, $path);
            $config->website_image = $upload['name'];
        }

        if ($config->save()){
            return redirect()->back()->with('status', 'success');
        }

    }

}
