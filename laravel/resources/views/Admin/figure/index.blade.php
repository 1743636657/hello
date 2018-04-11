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
                    <th>ID</th>
                    <th>店铺ID</th>
                    <th>图片地址</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($data as $k=>$v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->shop_id}}</td>
                    <td><img src="{{URL::asset($v->pic_addr)}}" width="100px"></td>
                    <td>
                    	<form action="/admin/figure/{{$v->id}}" method="post" style="display: inline;">
                    		{{csrf_field()}}
							{{method_field('DELETE')}}
 	                   		<input type="submit" class="btn btn-danger" value="删除">
                    	</form>
                    	<form action="/admin/figure/{{$v->id}}/edit" method="get" style="display: inline;">
 	                   		<input type="submit" class="btn btn-warning" value="修改">
                    	</form>
                    </td>
                </tr>
              	@endforeach
            </tbody>
        </table>
    </div>
    <div id="pages">
    	{!! $data->appends($search)->render() !!}
    </div>
</div>
@endsection
