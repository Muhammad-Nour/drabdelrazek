@extends('layouts.admin_app')

@section('title', __('site.why_us'))

@section('css')
@stop

@section('js')
@stop


@section('title-page',__('site.why_us'))

@section('content')

<!-- Main content -->
<div class="main-stage why_us">
	<div class="row">
		<div class="col-md-11 m-auto">
			@include('partial.alerts')
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{__('site.edit')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('whys.update',$why->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					{{ method_field('put') }}
					<div class="card-body">
						<div class="form-group">
							<label>{{__('site.description_ar')}}</label>
							<textarea class="ckeditor" name="description_ar" required>{{old('description_ar',$why->description_ar) }}</textarea>
						</div>
						<div class="form-group display-none">
							<label>{{__('site.description_en')}}</label>
							<textarea class="ckeditor" name="description_en">{{old('description_en',$why->description_en) }}</textarea>
						</div>
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<button type="submit" class="btn btn-style"><i class="fa fa-edit"></i> {{__('site.update')}}</button>
					</div>
					<!-- /.card-footer -->
				</form>
			</div>
		</div>
	</div>
</div>
@stop