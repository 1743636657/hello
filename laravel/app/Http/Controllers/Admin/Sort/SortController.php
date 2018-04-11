<?php

namespace App\Http\Controllers\Admin\Sort;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cate;
use DB;
class SortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询所有数据
        $data = DB::select("select *,concat(path,',',id) as paths from watch_category order by paths");
        //处理数据
        foreach ($data as $k=>$v) {
            //统计path
            $n = substr_count($v->path,',');
            // 处理name
            $data[$k]->name = str_repeat ("|-----" , $n) . $v->name; 
            $data[$k]->num = $n; //获取分类个数
        }
        return view('Admin.Sort.Index',['title'=>'分类列表','data'=>$data]);
    }

    /**
     * 分类添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate_data = Cate::get(); //获取所有数据
        return view('Admin.Sort.Add',['title'=>'添加分类','cate_data'=>$cate_data]);
    }

    /**
     * 处理提交数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取数据
        $data = $request->except('_token');
       
        if ($data['pid'] == 0) {
            $data['path'] = 0; 
        } else{
            //如果不为一级父类 则把父类的path和父级的id拼接
            $parent_data = Cate::where('id','=',$data['pid'])->first();
            // dd($parent_data);
            $data['path'] = $parent_data['path'] . ',' . $parent_data['id'];
        }
        //添加时间
        $data['created_at'] = time();
        //执行添加
        $cate_data = new Cate;
        $cate_data -> pid = $data['pid'];
        $cate_data -> name = $data['name'];
        $cate_data -> path = $data['path'];
        $cate_data -> created_at = $data['created_at'];
        $res = $cate_data -> save();
        //根据返回结果判断
        if($res){
            return redirect('/admin/sort')->with('success','添加成功'); //跳转 并且附带信息
        }else{
            return back()->with('error','添加失败'); //跳转 并且附带信息
        }
    }

    /**
     * 显示单条
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 加载修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取数据
        $cate_data = Cate::where('id',$id)->first();
        return view('Admin.Sort.Edit',['title'=>'分类修改','cate_data'=>$cate_data]);
    }

    /**
     * 执行修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //过滤数据
        $cate_data = $request -> except('_token','_method');
        //根据id获取数据
        $data = Cate::find($id);
        //执行修改
        $data -> name = $cate_data['name'];
        $res = $data -> save();
        //根据返回结果判断
        if($res){
            return redirect('/admin/sort')->with('success','修改成功'); //跳转 并且附带信息
        }else{
            return back()->with('error','修改失败'); //跳转 并且附带信息
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
        $del = Cate::find($id);
        //查询分类下是否存在分类
        $data = DB::select('select * from watch_category where pid = ?',[$id]);
        if (!empty($data)){
             return back()->with('error','当前类别下面有子分类不允许删除....'); //跳转 并且附带信息
        }
        $res = $del -> delete(); //执行删除
        if($res){
            return redirect('/admin/sort')->with('success','删除成功'); //跳转 并且附带信息
        }else{
            return back()->with('error','删除失败'); //跳转 并且附带信息
        }
    }
}