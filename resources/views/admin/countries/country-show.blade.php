@extends('layouts.admin_app')

@section('title', __('site.countries'))

@section('css')
@stop

@section('js')
@stop


@section('title-page', __('site.countries'))

@section('content')
<div class="main-stage countries">
	<div class="row">
		<div class="col-md-11 m-auto">
			@include('partial.alerts')

			@if($countries->count() > 0)
			<div class="row">
				@foreach($countries as $country)
				<div class="col-md-12 single-row">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-6 col-md-2">
									<p class="key">{{__('site.code')}}</p>
									<p class="value">{{$country->id}}</p>
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.name_ar')}}</p>
									<p class="value">{{$country->name_ar}}</p>
								</div>
								<div class="col-6 col-md-3 display-none">
									<p class="key">{{__('site.name_en')}}</p>
									<p class="value">{{$country->name_en}}</p>
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.country_code')}}</p>
									<p class="value">{{$country->country_code}}</p>
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.code')}}</p>
									<p class="value">{{$country->code}}</p>
								</div>
								<div class="col-6 col-md-2">
                                    <p class="key">{{__('site.actions')}}</p>
                                    <div class="actions-dropdown">
                                        <button type="button" class="btn btn-style btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>

                                        <div class="dropdown-menu">
                                            @can('edit_countries')
                                            <a href="{{route('countries.edit',$country->id)}}" class=" dropdown-item"><i class="fa fa-edit"> </i> {{__('site.edit')}}</a>
                                            @endcan
                                            @can('delete_countries')
                                            <form action="{{route('countries.destroy', $country->id)}}" method="POST" class="dropdown-item">
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
		{{ $countries->links() }}
		@endisset
	</div>
</div>
@stop
