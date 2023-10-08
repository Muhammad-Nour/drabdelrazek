@extends('layouts.admin_app')

@section('title', __('site.appointments'))

@section('css')
@stop

@section('js')
@stop


@section('title-page', __('site.appointments'))

@section('content')
<div class="main-stage appointments">
	<div class="row">
		<div class="col-md-11 m-auto">
			@include('partial.alerts')

			@if($appointments->count() > 0)
			<div class="row">
				@foreach($appointments as $appointment)
				<div class="col-md-12 single-row">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-6 col-md-2">
									<p class="key">{{__('site.code')}}</p>
									<p class="value">{{$appointment->id}}</p>
								</div>
								<div class="col-6 col-md-2">
									<p class="key">{{__('site.name')}}</p>
									<p class="value">{{$appointment->name}}</p>
								</div>
								<div class="col-6 col-md-2">
									<p class="key">{{__('site.phone')}}</p>
									<p class="value">{{$appointment->phone}}</p>
								</div>

								<div class="col-6 col-md-2">
									<p class="key">{{__('site.governorate')}}</p>
									<p class="value">{{$appointment->governorate}}</p>
								</div>
								<div class="col-6 col-md-2">
									<p class="key">{{__('site.city')}}</p>
									<p class="value">{{$appointment->city}}</p>
								</div>
								<div class="col-6 col-md-2">
									<p class="key">{{__('site.height')}}</p>
									<p class="value">{{$appointment->height}}</p>
								</div>
								<div class="col-6 col-md-2">
									<p class="key">{{__('site.weight')}}</p>
									<p class="value">{{$appointment->weight}}</p>
								</div>
								<div class="col-6 col-md-2">
                                    <p class="key">{{__('site.actions')}}</p>
                                    <div class="actions-dropdown">
                                        <button type="button" class="btn btn-style btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>

                                        <div class="dropdown-menu">
                                            @can('edit_appointment')
                                            <a href="{{route('appointments.edit',$appointment->id)}}" class=" dropdown-item"><i class="fa fa-edit"> </i> {{__('site.edit')}}</a>
                                            @endcan
                                            @can('delete_appointment')
                                            <form action="{{route('appointments.destroy', $appointment->id)}}" method="POST" class="dropdown-item">
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
		</div>
		@endif
		@isset($paginate)
		{{ $appointments->links() }}
		@endisset
	</div>
</div>
@stop
