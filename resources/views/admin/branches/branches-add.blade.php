@extends('layouts.admin_app')

@section('title', __('site.branches'))

@section('css')
@stop

@section('js')
@stop


@section('title-page',__('site.branches'))

@section('content')

<!-- Main content -->
<div class="main-stage branches">
	<div class="row">
		<div class="col-md-7 m-auto">
			@include('partial.alerts')
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{__('site.add_data')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('branches.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<div class="form-group">
							<label>{{__('site.name_ar')}}</label>
							<input type="text" class="form-control" name="name_ar" required 
							value="{{old('name_ar')}}">
						</div>
						<div class="form-group display-none">
							<label>{{__('site.name_en')}}</label>
							<input type="text" class="form-control" name="name_en" 
							value="{{old('name_en')}}">
						</div>
						<div class="form-group">
							<label>{{__('site.address_ar')}}</label>
							<input type="text" class="form-control" name="address_ar" required 
							value="{{old('address_ar')}}">
						</div>

						<div class="form-group display-none">
							<label>{{__('site.address_en')}}</label>
							<input type="text" class="form-control" name="address_en" 
							value="{{old('address_en')}}">
						</div>

						<div class="form-group">
							<label>{{__('site.description_ar')}}</label>
							<input type="text" class="form-control" name="description_ar" required 
							value="{{old('description_ar')}}">
						</div>

						<div class="form-group display-none">
							<label>{{__('site.description_en')}}</label>
							<input type="text" class="form-control" name="description_en" 
							value="{{old('description_en')}}">
						</div>

						<div class="form-group">
							<label>{{__('site.map')}}</label>
							<input type="text" class="form-control" name="map" required 
							value="{{old('map')}}">
						</div>

						<div class="form-group display-none">
							<label>{{__('site.add_image')}}</label>
							<input type="file" class="form-control" name="photo">
						</div>
						<div class="form-group display-none">
							<label>{{__('site.add_gallery')}}</label>
							<input type="file" class="form-control" name="gallery[]" multiple>
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