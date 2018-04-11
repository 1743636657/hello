@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{ $title }}</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/sort/{{$cate_data->id}}" method = "post">
    	    {{ csrf_field() }}
    	    {{method_field('PUT')}}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">修改名称</label>
    				<div class="mws-form-item">
    					<input type="text" value = "{{$cate_data->name}}" disabled> 
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">分类名称</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name = "name">
    				</div>
    			</div>
    			
    		<div class="mws-button-row">
    			<input type="submit" value="提交" class="btn btn-danger">
    			<input type="reset" value="重置" class="btn ">
    		</div>
    	</form>
    </div>    	
</div>
@endsection('content')
