@extends('layouts.admin_app')

@section('title', __('site.roles'))

@section('css')
@stop

@section('js')
@stop


@section('content')

<!-- Main content -->
<div class="main-stage roles">
	<div class="col-md-11 m-auto">

		<h3 class="text-center">{{__('site.roles')}} | {{$role->name}}</h3>

		<div class="pull-right role-back">
			<a class="btn btn-primary" href="{{ route('roles.index') }}">رجوع</a>
		</div>

		<div class="card">
			<div class="card-body">
				{{__('site.roles')}} | {{$role->name}}
				<div class="row">
					<div class="col-md-7">
						<ul>
							@if(isset($rolePermissions))
							@foreach($rolePermissions as $rolePermission)
							<li>{{$rolePermission->name}}</li>
							@endforeach
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
@stop