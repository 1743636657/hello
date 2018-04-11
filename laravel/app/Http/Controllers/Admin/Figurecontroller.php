<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use DB;
use App\Models\Figure;
class Figurecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page_count = $request -> input('page_count',5);
        $figure = DB::table('watch_figure');  //创建数据对象
        $data = $figure->paginate($page_count);//获取数据并且分页
        //加载模板
        return view('admin.figure.index',['title'=>'轮播图管理','data'=>$data,'search'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view('admin.figure.create',['title'=>'轮播图添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> except('_token');
        $pic =  $request -> file('pic_addr');//创建文件上传对象
        $temp_name = time()+rand(10000,99999);
        $hz = $pic -> getClientOriginalExtension();
        $filename = $temp_name.'.'.$hz;
        $lj = $pic -> move('./Admin/Uploads/',$filename);//执行上传
        $data['pic_addr'] = $lj;
        //实例化模型
         $figure = new Figure;
            $figure -> shop_id = $data['shop_id'];
            $figure -> pic_addr = $data['pic_addr'];
            $res = $figure -> save();
        // 执行添加
        // $res = DB::table('watch_figure')->insert($data);
        if($res){
            return redirect('/admin/figure')->with('success','添加成功'); //跳转 并且附带信息
        }else{
            return back()->with('error','添加失败'); //跳转 并且附带信息
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Figure::where('id',$id)->first();
        // dump($data);
        return view('admin.figure.edit',['title'=>'轮播台修改','data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data  =  $request ->except('_token','_method');
        $pic =  $request -> file('pic_addr');//创建文件上传对象
        $temp_name = time()+rand(10000,99999);
        $hz = $pic -> getClientOriginalExtension();
        $filename = $temp_name.'.'.$hz;
        $lj = $pic -> move('./Admin/Uploads/',$filename);//执行上传
        $data['pic_addr'] = $lj;
        $figure =  Figure::find($id);
        $figure -> shop_id = $data['shop_id'];
        $figure -> pic_addr = $data['pic_addr'];
        $res = $figure->save();
        if($res){
            return redirect('/admin/figure')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $figure =  Figure::find($id);
       $res = $figure -> delete();
       if($res){
            return redirect('/admin/figure')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
