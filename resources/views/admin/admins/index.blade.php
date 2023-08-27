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
		<div class="col-md-11 m-auto">
			@include('partial.alerts')
			@if($admins->count() > 0)
			<div class="row">
				@foreach($admins as $admin)
				<div class="col-md-12 single-row">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-6 col-md-2">
							<p class="key">{{__('site.code')}}</p>
							<p class="value">{{$admin->id}}</p>
						</div>
						<div class="col-6 col-md-2">
							<p class="key">{{__('site.name')}}</p>
							<p class="value">{{$admin->name}}</p>
						</div>
						<div class="col-6 col-md-2">
							<p class="key">{{__('site.status')}}</p>
							<p class="value">{{$admin->getStatus()}}</p>
						</div>
						<div class="col-6 col-md-2">
							<p class="key">{{__('site.roles')}}</p>
							@if (!empty($admin->roles_name))
							@foreach ($admin->getRoleNames() as $v)
							<label class="badge badge-success">{{ $v }}</label>
							@endforeach
							@endif
						</div>

								<div class="col-6 col-md-2">
                                    <p class="key">{{__('site.actions')}}</p>
                                    <div class="actions-dropdown">
                                        <button type="button" class="btn btn-style btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>

                                        <div class="dropdown-menu">
                                            @can('edit_users')
                                            <a href="{{route('admins.edit',$admin->id)}}" class=" dropdown-item"><i class="fa fa-edit"> </i> {{__('site.edit')}}</a>
                                            @endcan
                                            @can('delete_users')
                                            <form action="{{route('admins.destroy', $admin->id)}}" method="POST" class="dropdown-item">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <a href="" class="delete text-danger"> <i class="fa fa-trash-alt"> </i>   {{__('site.delete')}} </a>
                                            </form>
                                            @endcan
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
	{{ $admins->links() }}
</div>
</div>
</div>

@stop