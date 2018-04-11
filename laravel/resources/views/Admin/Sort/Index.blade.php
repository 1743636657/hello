@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>{{ $title }}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    <th>分类ID</th>
                                    <th>父类ID</th>
                                    <th>分类名称</th>
                                    <th>分类类别</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $v)
	                                <tr>
	                                    <td>{{$v->id}}</td>
	                                    <td>{{$v->pid}}</td>
	                                    <td>{{$v->name}}</td>
	                                    <td>

		                                    @if ($v->num === 0)
											    一级分类
											@elseif ($v->num === 1)
											    二级分类
											@else
											    三级分类
											@endif
	                                    </td>
	                                    <td align = "center">
					                    	<a href="/admin/sort/{{$v->id}}/edit" class="btn btn-info">修改</a>
					                    	<a href="/admin/sort/{{$v->id}}" class="btn btn-info">添加子类</a>
                                            <form action="/admin/sort/{{$v->id}}" method="post" style="display: inline;">
													{{ csrf_field() }}
													{{ method_field('DELETE') }}
					                    		<input type="submit" value="删除" class="btn btn-danger">
					                    	</form>
					                    </td>
	                                </tr>
	                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
@endsection