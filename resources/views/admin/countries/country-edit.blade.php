@extends('layouts.admin_app')

@section('title', __('site.countries'))

@section('css')
@stop

@section('js')
@stop


@section('title-page',__('site.countries'))

@section('content')

<!-- Main content -->
<div class="main-stage countries">
	<div class="row">
		<div class="col-md-7 m-auto">
			@include('partial.alerts')
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{__('site.edit')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('countries.update',$country->id)}}" method="post">
					@csrf
					@method('PUT')
					<div class="card-body">
						<div class="form-group">
							<label >{{__('site.name_ar')}}</label>
							<input type="text" class="form-control" name="name_ar" required value="{{ old('name_ar',$country->name_ar) }}">
						</div>
						<div class="form-group display-none">
							<label >{{__('site.name_en')}}</label>
							<input type="text" class="form-control" name="name_en" value="{{ old('name_en',$country->name_en) }}">
						</div>
						<div class="form-group">
							<label >{{__('site.country_code')}}</label>
							<input type="text" class="form-control" name="country_code" required value="{{ old('country_code',$country->country_code) }}">
						</div>
						<div class="form-group">
							<label >{{__('site.code')}}</label>
							<input type="text" class="form-control" name="code" required value="{{ old('code',$country->code) }}">
						</div>
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<button type="submit" class="btn btn-style">
							{{__('site.update')}}
						</button>
					</div>
					<!-- /.card-footer -->
				</form>
			</div>
		</div>
	</div>
</div>
@stop
