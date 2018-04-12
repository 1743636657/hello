<?php

namespace App\Http\Controllers\Admin\Index;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\user;
use DB;
use Session;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //加载后台首页模板
        return view('Admin.Index.Index','title'=>'后台首页');
    }

    
}
