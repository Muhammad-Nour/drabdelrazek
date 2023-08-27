@extends('layouts.admin_app')

@section('title', __('site.roles'))

@section('css')
@stop

@section('js')
@stop

@section('title-page',__('site.roles'))

@section('content')

<!-- Main content -->
<div class="main-stage roles">
	<div class="row">
		<div class="col-md-7 m-auto">
			@include('partial.alerts')
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{__('site.edit')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('roles.update',$role->id)}}" 
					method="post">
					@csrf
					{{method_field('put')}}
					<div class="card-body">
						<div class="form-group">
							<label>{{__('site.name')}}</label>
							<input type="text" class="form-control" name="name" value="{{$role->name}}" required>
						</div>
						<div class="row">
							{{__('site.roles')}} | {{$role->name}}
							<ul>
								<li>
									@foreach($permission as $value)
									<label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
										{{ $value->name }}
									</label><br/>
									@endforeach
								</li>
							</ul>
							<div class="col-xs-12 col-sm-12 col-md-12 text-center">
								<button type="submit" class="btn btn-style">{{__('site.update')}}</button>
							</div>
						</div>
					</div>
					<!-- /.card-footer -->
				</form>
			</div>
		</div>
	</div>
</div>
@stop