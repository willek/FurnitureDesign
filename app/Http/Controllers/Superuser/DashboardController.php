<?php

namespace App\Http\Controllers\Superuser;

use App\Http\Controllers\Controller;
use App\Models\ConfigModel;
use App\Models\InboxModel;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->data['sidebar_menu'] = 'dashboard';
        $this->data['config'] = ConfigModel::findOrFail(1);
        $this->data['new_message'] = InboxModel::New()->count();
    }

    public function index()
    {
        $data = $this->data;
        return view('back.dashboard.data', $data);
    }

}
