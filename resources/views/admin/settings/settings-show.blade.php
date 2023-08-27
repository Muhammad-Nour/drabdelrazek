@extends('layouts.admin_app')

@section('title', __('site.settings'))

@section('css')
@stop

@section('js')
@stop


@section('title-page', __('site.settings'))

@section('content')
<div class="main-stage settings">
	<div class="row">
		<div class="col-md-11 m-auto">
			@include('partial.alerts')

			@if($settings->count() > 0)
			<div class="row">
				@foreach($settings as $setting)
				<div class="col-md-12 single-row">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.code')}}</p>
									<p class="value">{{$setting->code}}</p>
								</div>
								<div class="col-6 col-md-7">
									<p class="key">{{__('site.value')}}</p>
									<p class="value">{{$setting->value}}</p>
								</div>
								@can('edit_settings')
								<div class="col-6 col-md-2">
									<p class="key">{{__('site.edit')}}</p>
									<a href="{{route('settings.edit',$setting->id)}}" class="btn btn-style btn-sm">
										<i class="fa fa-edit"></i></a>
									</div>
									@endcan
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			@endif
			@isset($paginate)
			{{ $settings->links() }}
			@endisset
		</div>
	</div>
	@stop
