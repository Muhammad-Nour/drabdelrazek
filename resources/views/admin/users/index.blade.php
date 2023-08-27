@extends('layouts.admin_app')

@section('title', __('site.clients'))

@section('css')
@stop

@section('js')
@stop

@section('title-page',__('site.clients'))

@section('content')

<!-- Main content -->

<div class="main-stage clients">
	<div class="row">
		<div class="col-md-11 m-auto">
			@include('partial.alerts')
			@if($users->count() > 0)
			<div class="row">
				@foreach($users as $user)
				<div class="col-md-12 single-row">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-6 col-md-1">
							<p class="key">{{__('site.code')}}</p>
							<p class="value">{{$user->id}}</p>
						</div>
						<div class="col-6 col-md-3">
							<p class="key">{{__('site.name')}}</p>
							<p class="value">{{$user->name}}</p>
						</div>
						<div class="col-6 col-md-3">
							<p class="key">{{__('site.email')}}</p>
							<p class="value">{{$user->email}}</p>
						</div>
						<div class="col-6 col-md-2">
							<p class="key">{{__('site.phone')}}</p>
							<p class="value">{{$user->phone}}</p>
						</div>
						<div class="col-6 col-md-3">
							<p class="key">{{__('site.address')}}</p>
							<p class="value">{{$user->address}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	@endif
	{{ $users->links() }}
</div>
</div>
</div>

@stop