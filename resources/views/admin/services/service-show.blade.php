@extends('layouts.admin_app')

@section('title', __('site.services'))

@section('css')
@stop

@section('js')
@stop


@section('title-page', __('site.services'))

@section('content')

<!-- Main content -->
<div class="main-stage services">
	<div class="col-md-11 m-auto">
		@include('partial.alerts')
		@if($services->count() > 0)
		<div class="row">
			@foreach($services as $service)
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
							<div class="col-12 col-md-2">
								<p class="key">{{__('site.category_ar')}}</p>
								<p class="value">{{$service->category->name_ar}}</p>
							</div>
							<div class="col-12 col-md-2 display-none">
								<p class="key">{{__('site.category_en')}}</p>
								<p class="value">{{$service->category->name_en}}</p>
							</div>
							<div class="col-12 col-md-2">
								<p class="key">{{__('site.image')}}</p>
								<p><img src="{{asset('images/'.$service->photo)}}" style="width:75px;height: 75px;"></p>
							</div>

							<div class="col-6 col-md-2">
								<p class="key">{{__('site.actions')}}</p>
								<div class="actions-dropdown">
									<button type="button" class="btn btn-style btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-h"></i>
									</button>

									<div class="dropdown-menu">
											@can('add_insta')
											<a href="{{route('servicesIsnta.show',$service->id)}}" class=" dropdown-item">
												<i class="fa fa-question"></i> {{__('site.add_insta')}}</a>
											@endcan
											@can('edit_service')
											<a href="{{route('services.edit',$service->id)}}" class=" dropdown-item"><i class="fa fa-edit"> </i> {{__('site.edit')}}</a>
											@endcan
											@can('delete_service')
											<form action="{{route('services.destroy',$service->id)}}" method="POST" class="dropdown-item">
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
			{{ $services->links() }}
		</div>
	</div>
	@stop

