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
					<h3 class="card-title">{{__('site.edit')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('services.update',$service->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					{{method_field('put')}}
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-6">
								<label>{{__('site.category_ar')}}</label>
								<select class="form-control" name="category_id" required>
									@if(isset($categories)) 
									@foreach($categories as $category)
									<option value="{{ $category->id }}"@if($service->category_id == $category->id) selected @endif>
										{{ $category->name_ar }}</option>
										@endforeach
										@endif
									</select>
								</div>

								<div class="form-group col-md-6 display-none">
									<label>{{__('site.category_en')}}</label>
									<select class="form-control" name="category_id" required>
										@if(isset($categories)) 
										@foreach($categories as $category)
										<option value="{{ $category->id }}" @if($service->category_id == $category->id) selected @endif>
											{{ $category->name_en }}</option>
											@endforeach
											@endif
										</select>
									</div>

									<div class="form-group col-md-6">
										<label>{{__('site.title_ar')}}</label>
										<input type="text" class="form-control" name="title_ar"value="{{$service->title_ar}}" required>
									</div>

									<div class="form-group col-md-6 display-none">
										<label>{{__('site.title_en')}}</label>
										<input type="text" class="form-control" name="title_en" value="{{$service->title_en}}">
									</div>

									<div class="form-group col-md-12">
										<label>{{__('site.description_ar')}}</label>
										<textarea class="ckeditor" name="description_ar" value="{!!$service->description_ar!!}" required>
											{{$service->description_ar}}</textarea>
										</div>

										<div class="form-group col-md-6 display-none">
											<label>{{__('site.description_en')}}</label>
											<textarea class="ckeditor" name="description_en" value="{{$service->description_en}}">
												{!!$service->description_en!!}</textarea>
											</div>
										</div>

										<div class="form-group">
											<label>{{__('site.image')}}</label>
											<input type="file" class="form-control" name="photo">
										</div>
										<div class="form-group">
											@if($service->photo)
											<img src="{{asset('images/'.$service->photo)}}">
											@endif
										</div>
										<!-- /.card-body -->
										<div class="card-footer">
											<button type="submit" class="btn btn-style">{{__('site.update')}}</button>
										</div>
										<!-- /.card-footer -->
									</form>
								</div>
							</div>
						</div>
					</div>
					@stop