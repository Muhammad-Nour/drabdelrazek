@extends('layouts.admin_app')

@section('title', __('site.slider'))

@section('css')
@stop

@section('js')
@stop


@section('title-page',__('site.slider'))

@section('content')

<!-- Main content -->
<div class="main-stage sliders">
	<div class="row">
		<div class="col-md-11 m-auto">
			@include('partial.alerts')
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{__('site.edit_data')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('sliders.update',$slider->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="card-body">
						<div class="form-group display-none">
							<label>{{__('site.title_ar')}}</label>
							<input class="form-control" name="title_ar" value="{{old('title_ar',$slider->title_ar)}}">
						</div>
						<div class="form-group display-none">
							<label>{{__('site.title_en')}}</label>
							<input type="text" class="form-control" name="title_en" value="{{old('title_ar',$slider->title_en)}}">
						</div>
						<div class="form-group display-none">
							<label>{{__('site.description_ar')}}</label>
							<textarea class="ckeditor" name="description_ar" >{{old('title_ar',$slider->description_ar)}}
							</textarea>
						</div>
						<div class="form-group display-none">
							<label>{{__('site.description_en')}}</label>
							<textarea class="ckeditor" name="description_en" >{{old('title_ar',$slider->description_en)}}
							</textarea>
						</div>
						<div class="form-group">
							<label>{{__('site.image')}}</label>
                            <input type="file" class="form-control" name="photo">
						</div>
                        <div class="form-group">
                            <img src="{{asset('images/'.$slider->photo)}}">
                        </div>
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<button type="submit" class="btn btn-style"> <i class="fa fa-edit"></i> {{__('site.update')}}</button>
					</div>
					<!-- /.card-footer -->
				</form>
			</div>
		</div>
	</div>
</div>
@stop
