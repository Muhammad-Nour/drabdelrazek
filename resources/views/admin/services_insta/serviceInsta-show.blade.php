@extends('layouts.admin_app')

@section('title', __('site.servicesInstruction'))

@section('css')
@stop

@section('js')
@stop


@section('title-page', __('site.servicesInstruction'))

@section('content')

<!-- Main content -->
<div class="main-stage servicesInstruction">
	<div class="col-md-11 m-auto">
		@include('partial.alerts')
		@if($serviceInsta->count() > 0)
		<h3 class="service-title">{{$service->title_ar}}</h3>
		<a class="btn btn-style" href="{{route('servicesIsnta.create')}}">
			<i class="fa fa-plus"></i>&nbsp;&nbsp;{{__('site.add_insta')}}
		</a>
		<div class="row">

			@foreach($serviceInsta as $service)
			<div class="col-md-12 single-row">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-md-2">
								<p class="key">{{__('site.code')}}</p>
								<p class="value">{{$service->id}}</p>
							</div>
							<div class="col-12 col-md-2">
								<p class="key">{{__('site.title_ar')}}</p>
								<p class="value">{{$service->title_ar}}</p>
							</div>
							<div class="col-12 col-md-2 display-none">
								<p class="key">{{__('site.title_en')}}</p>
								<p class="value">{{$service->title_en}}</p>
							</div>
							<div class="col-12 col-md-8">
								<p class="key">{{__('site.description_ar')}}</p>
								<p class="value">{!!$service->description_ar!!}</p>
							</div>
							<div class="col-12 col-md-2 display-none">
								<p class="key">{{__('site.description_en')}}</p>
								<p class="value">{{$service->description_en}}</p>
							</div>
							
							<div class="col-6 col-md-2">
								<p class="key">{{__('site.actions')}}</p>
								<div class="actions-dropdown">
									<button type="button" class="btn btn-style btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-h"></i>
									</button>

									<div class="dropdown-menu">
											@can('edit_service')
											<a href="{{route('servicesIsnta.edit',$service->id)}}" class=" dropdown-item">
												<i class="fa fa-edit"> </i> {{__('site.edit')}}</a>
											@endcan
											@can('delete_service')
											<form action="{{route('servicesIsnta.destroy',$service->id)}}" method="POST" class="dropdown-item">
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
		</div>
	</div>
	@stop

