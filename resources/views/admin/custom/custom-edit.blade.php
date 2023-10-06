@extends('layouts.admin_app')

@section('title', __('site.customs'))

@section('css')
@stop

@section('js')
@stop


@section('title-page',__('site.customs'))

@section('content')

<!-- Main content -->
<div class="main-stage customs">
	<div class="row">
		<div class="col-md-11 m-auto">
			@include('partial.alerts')
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{__('site.edit')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('customs.update',$custom->id)}}" method="post" enctype='multipart/form-data'>

					@csrf
					{{ method_field('put') }}

					<div class="card-body">
                        <div class="form-group">
							<label>{{__('site.code')}} : {{ $custom->code }}</label>
						</div>
						<div class="form-group">
							<label>{{__('site.description_ar')}}</label>
							<textarea class="ckeditor" name="description_ar">{{ old('description_ar', $custom->description_ar) }}</textarea>
						</div>
						<div class="form-group display-none">
							<label>{{__('site.description_en')}}</label>
							<textarea class="ckeditor" name="description_en">{{ old('description_en', $custom->description_en) }}</textarea>
						</div>
					<div class="form-group">
						<label>{{__('site.image')}}</label>
						<input type="file" class="form-control" name="photo">
                    </div>
                    <div class="form-group">
                        @if($custom->photo)
                        <img src="{{asset('images/'.$custom->photo)}}">
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
