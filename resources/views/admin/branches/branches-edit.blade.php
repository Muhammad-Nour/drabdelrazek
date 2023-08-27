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
					<h3 class="card-title">{{__('site.edit')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('branches.update',$branch->id)}}" 
					method="post" enctype="multipart/form-data">
					@csrf
					{{ method_field('put') }}
					<div class="card-body">
						<div class="form-group">
							<label>{{__('site.name_ar')}}</label>
							<input type="text" class="form-control" name="name_ar" required 
							value="{{ isset($branch) ? $branch->name_ar : ''}}">
						</div>
						<div class="form-group">
							<label>{{__('site.name_en')}}</label>
							<input type="text" class="form-control" name="name_en" required 
							value="{{ isset($branch) ? $branch->name_en : ''}}">
						</div>
						<div class="form-group">
							<label>{{__('site.address_ar')}}</label>
							<input type="text" class="form-control" name="address_ar" required 
							value="{{ isset($branch) ? $branch->address_ar : ''}}">
						</div>
						<div class="form-group">
							<label>{{__('site.address_en')}}</label>
							<input type="text" class="form-control" name="address_en" required 
							value="{{ isset($branch) ? $branch->address_en : ''}}">
						</div>
						<div class="form-group">
							<label>{{__('site.map')}}</label>
							<input type="text" class="form-control" name="map" required 
							value="{{ isset($branch) ? $branch->map : ''}}">
						</div>
						<div class="form-group">
							<strong>{{__('site.image')}}</strong>
							<img src="{{asset('gallery/'.$branch->photo)}}" style="width:100px;height:100px;">
							<input type="file" class="form-control" name="photo">
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