@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{ $title }}</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="{{ url('/admin/sort') }}" method = "post">
    	    {{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">分类选择</label>
    				<div class="mws-form-item">
    					<select class="large small" name = "pid">
    						<option value = "0">----------请选择----------</option>
    						@foreach($cate_data as $v)
    						   <option value = "{{$v->id}}">----------{{$v->name}}----------</option>
    						@endforeach
    					</select>
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
@endsection