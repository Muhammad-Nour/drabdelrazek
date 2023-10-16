@extends('layouts.admin_app')

@section('title', __('site.serviceInstructions'))

@section('css')
@stop

@section('js')
@stop

@section('title-page',__('site.serviceInstructions'))

@section('content')

<!-- Main content -->
<div class="main-stage serviceInstructions">
	<div class="row">
		<div class="col-md-10 m-auto">
			@include('partial.alerts')
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{__('site.edit')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('servicesIsnta.update',$service->id)}}" method="post">
					@csrf
					{{method_field('put')}}
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-6">
								<label>{{__('site.title_ar')}}</label>
								<input type="text" class="form-control" name="title_ar"value="{{$serviceInsta->title_ar}}" required>
							</div>
							<div class="form-group col-md-6 display-none">
								<label>{{__('site.title_en')}}</label>
								<input type="text" class="form-control" name="title_en" value="{{$serviceInsta->title_en}}">
							</div>
							<div class="form-group col-md-12">
								<label>{{__('site.description_ar')}}</label>
								<textarea class="ckeditor" name="description_ar" value="{!!$serviceInsta->description_ar!!}" required>
									{{$serviceInsta->description_ar}}</textarea>
								</div>
								<div class="form-group col-md-6 display-none">
									<label>{{__('site.description_en')}}</label>
									<textarea class="ckeditor"name="description_en"value="{{$serviceInsta->description_en}}">
										{!!$serviceInsta->description_en!!}</textarea>
									</div>
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