@extends('layouts.admin_app')

@section('title', __('site.blogs'))

@section('css')
@stop

@section('js')
@stop


@section('title-page',__('site.blogs'))

@section('content')

<!-- Main content -->
<div class="main-stage blogs">
	<div class="row">
		<div class="col-md-11 m-auto">
			@include('partial.alerts')
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{__('site.edit')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('blogs.update',$blog->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					{{ method_field('put') }}
					<div class="card-body">
						<div class="form-group">
							<label>{{__('site.title_ar')}}</label>
							<input type="text" class="form-control" name="title_ar" required 
							value="{{old('title_ar',$blog->title_ar) }}">
						</div>
						<div class="form-group display-none">
							<label>{{__('site.title_en')}}</label>
							<input type="text" class="form-control" name="title_en" value="{{old('title_en',$blog->title_en) }}">
						</div>
						<div class="form-group">
							<label>{{__('site.description_ar')}}</label>
							<textarea class="ckeditor" name="description_ar" required>{{old('description_ar',$blog->description_ar) }}</textarea>
						</div>
						<div class="form-group display-none">
							<label>{{__('site.description_en')}}</label>
							<textarea class="ckeditor" name="description_en">{{old('description_en',$blog->description_en) }}</textarea>
						</div>

						<div class="form-group">
							<label>{{__('site.date')}}</label>
							<input type="date" class="form-control" name="date" id="date" required value="{{ $blog->date }}">
						</div>
                        <div class="form-group">
                            <label>{{__('site.image')}}</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                        <div class="form-group">
                            @if($blog->photo)
                            <img src="{{asset('images/'.$blog->photo)}}">
                            @endif
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
