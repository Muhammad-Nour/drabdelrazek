@extends('layouts.admin_app')

@section('title', __('site.users'))

@section('css')
@stop

@section('js')
@stop

@section('title-page',__('site.users'))

@section('content')

<!-- Main content -->
<div class="main-stage admins">
	<div class="row">
		<div class="col-md-7 m-auto">
			@include('partial.alerts')
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{__('site.add_data')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('admins.store')}}" method="post">
					@csrf
					<div class="card-body">
						<div class="form-group">
							<label>{{__('site.name')}}</label>
							<input type="text" class="form-control" name="name"	value="{{old('name')}}" required>
						</div>
						<div class="form-group">
							<label>{{__('site.email')}}</label>
							<input type="email" class="form-control" name="email" value="{{old('email')}}" required>
						</div>
						<div class="form-group">
							<label>{{__('site.password')}}</label>
							<input type="password" class="form-control" name="password">
						</div>
						<div class="form-group">
							<label>{{__('site.roles')}}</label>
							{!! Form::select('roles_name[]',$roles,[], array('class' => 'form-control','multiple')) !!}
						</div>

						<div class="form-group">
							<label>{{__('site.status')}}</label>
							<select class="custom-select form-control-border col-sm-9" name="status" required>
								<option value="">{{__('site.select')}}</option>
								<option value="1">مفعل</option>
								<option value="2">غير مفعل</option>
							</select>
						</div>
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<button type="submit" class="btn btn-style">
							<i class="fa fa-plus"></i> 
							{{__('site.add')}}
						</button>
					</div>
					<!-- /.card-footer -->
				</form>
			</div>
		</div>
	</div>
</div>
@stop