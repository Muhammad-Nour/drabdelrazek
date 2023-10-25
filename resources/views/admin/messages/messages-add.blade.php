@extends('layouts.admin_app')

@section('title', __('site.messages'))

@section('css')
@stop

@section('js')
@stop

@section('title-page',__('site.messages'))

@section('content')

<!-- Main content -->
<div class="main-stage messages">
	<div class="row">
		<div class="col-md-7 m-auto">
			@include('partial.alerts')
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{__('site.add_data')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('messages.store')}}" method="post">
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
							<label>{{__('site.email')}}</label>
							<input type="text" class="form-control" name="email" value="{{old('email')}}">
						</div>
						<div class="form-group">
							<label>{{__('site.message')}}</label>
							<textarea class="form-control" name="description" required>{{old('description')}}</textarea>
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