@extends('layouts.admin_app')

@section('title', __('site.services'))

@section('css')
@stop

@section('js')
@stop

@section('title-page',__('site.services'))

@section('content')

<!-- Main content -->
<div class="main-stage services">
	<div class="row">
		<div class="col-md-10 m-auto">
			@include('partial.alerts')
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{__('site.add_data')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('services.store')}}" method="post" enctype="multipart/form-data" >
					@csrf
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-6">
								<label>{{__('site.category')}}</label>
								<select class="form-control" name="category_id" required>
									<option>{{__('site.select')}}</option>
									@if(isset($categories))
									@foreach($categories as $category)
									<option value="<?php echo $category->id; ?>">  <?php echo $category->name_ar; ?> 
								</option>
								@endforeach
								@endif
							</select>
						</div>

						<div class="form-group  col-md-6">
							<label>{{__('site.title_ar')}}</label>
							<input type="text" class="form-control" name="title_ar" value="{{old('title_ar')}}" required>
						</div>

						<div class="form-group  col-md-6 display-none">
							<label>{{__('site.title_en')}}</label>
							<input type="text" class="form-control" name="title_en" value="{{old('title_en')}}">
						</div>

						<div class="form-group  col-md-12">
							<label>{{__('site.description_ar')}}</label>
							<textarea class="ckeditor" name="description_ar" value="{{old('description_ar')}}" required></textarea>
						</div>

						<div class="form-group  col-md-6 display-none">
							<label>{{__('site.description_en')}}</label>
							<textarea class="ckeditor" name="description_en" value="{{old('description_en')}}"></textarea>
						</div>

						<div class="form-group  col-md-6">
							<label>{{__('site.add_image')}}</label>
							<input type="file" class="form-control" name="photo">
						</div>
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<button type="submit" class="btn btn-style">
						<i class="fa fa-plus"></i> 
						{{__('site.add')}}
					</button>
				</div>
				<!-- /.card-footer -->
			</form>
		</div>
	</div>
</div>
</div>
@stop
