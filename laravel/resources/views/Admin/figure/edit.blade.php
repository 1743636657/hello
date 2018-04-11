@extends('admin.layout.index')

@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span>{{ $title }}</span>
	</div>
	<div class="mws-panel-body no-padding">
		<form class="mws-form" action="/admin/figure/{{$data->id}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{method_field('PUT')}}
			<div class="mws-form-inline">
				<div class="mws-form-row">
					<label class="mws-form-label">店铺ID</label>
					<div class="mws-form-item">
						<input type="text" name="shop_id" value="{{ $data-> shop_id }}" class="small">
					</div>

				</div>

				<div class="mws-form-row">
					<label class="mws-form-label">图片预览</label>
					<div class="mws-form-item">
						<input type="file" name="pic_addr" value="{{ $data-> pic_attr }}" class="small">
					</div>
				</div>

			</div>
			<div class="mws-button-row">
				<input type="submit" value="修改" class="btn btn-danger">
				<input type="reset" value="重置" class="btn ">
			</div>
		</form>
	</div>    	
	</div>
@endsection