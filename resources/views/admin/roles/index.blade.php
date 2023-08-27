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
		<div class="col-md-11 m-auto">
			@include('partial.alerts')
			@if($roles->count() > 0)
			<div class="row">
				@foreach($roles as $role)
				<div class="col-md-12 single-row">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-6 col-md-2">
									<p class="key">{{__('site.code')}}</p>
									<p class="value">{{$role->id}}</p>
								</div>
								<div class="col-6 col-md-2">
									<p class="key">{{__('site.name')}}</p>
									<p class="value">{{$role->name}}</p>
								</div>


								<div class="col-6 col-md-2">
									<p class="key">{{__('site.actions')}}</p>
									<div class="actions-dropdown">
										<button type="button" class="btn btn-style btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-h"></i>
										</button>
										<div class="dropdown-menu">
											@can('roles')
											<a href="{{route('roles.show',$role->id)}}" class="dropdown-item"><i class="fa fa-eye"></i>{{__('site.show')}}</a>
											@endcan('roles')
											@can('edit_roles')
											<a href="{{route('roles.edit',$role->id)}}" class=" dropdown-item"><i class="fa fa-edit"> </i> {{__('site.edit')}}</a>
											@endcan('edit_roles')
											@can('delete_roles')
											<form action="{{route('roles.destroy', $role->id)}}" method="POST" class="dropdown-item">
												@csrf
												{{ method_field('delete') }}
												<a href="" class="delete text-danger"> <i class="fa fa-trash-alt"> </i>   {{__('site.delete')}} </a>
											</form>
											@endcan('delete_roles')
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			@endif
			{{ $roles->links() }}
		</div>
	</div>
</div>
@stop