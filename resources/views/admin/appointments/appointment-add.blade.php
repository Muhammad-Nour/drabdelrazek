@extends('layouts.admin_app')

@section('title', __('site.appointments'))

@section('css')
@stop

@section('js')
@stop


@section('title-page',__('site.appointments'))

@section('content')

<!-- Main content -->
<div class="main-stage appointments">
	<div class="row">
		<div class="col-md-11 m-auto">
			@include('partial.alerts')
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{__('site.add_data')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('appointments.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<div class="form-group">
							<label>{{__('site.name')}}</label>
							<input type="text" class="form-control" name="name" required value="{{old('name')}}">
						</div>
						<div class="form-group">
							<label>{{__('site.phone')}}</label>
							<input type="text" class="form-control" name="phone" required value="{{old('phone')}}">
						</div>
						<div class="form-group">
							<label>{{__('site.governorate')}}</label>
							<input type="text" class="form-control" name="governorate" required value="{{old('governorate')}}">
						</div>
						<div class="form-group">
							<label>{{__('site.city')}}</label>
							<input type="text" class="form-control" name="city" required value="{{old('city')}}">
						</div>
						<div class="form-group">
							<label>{{__('site.height')}}</label>
							<input type="text" class="form-control" name="height" required value="{{old('height')}}">
						</div>
						<div class="form-group">
							<label>{{__('site.weight')}}</label>
							<input type="text" class="form-control" name="weight" required value="{{old('Weight')}}">
						</div>
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<button type="submit" class="btn btn-style"><i class="fa fa-plus"></i> {{__('site.add')}}</button>
				</div>
				<!-- /.card-footer -->
			</form>
		</div>
	</div>
</div>
</div>
@stop
