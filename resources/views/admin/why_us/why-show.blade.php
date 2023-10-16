@extends('layouts.admin_app')

@section('title', __('site.why_us'))

@section('css')
@stop

@section('js')
@stop


@section('title-page', __('site.why_us'))

@section('content')
<div class="main-stage why_us">
	<div class="row">
		<div class="col-md-11 m-auto">
			@include('partial.alerts')

			@if($why_us->count() > 0)
			<div class="row">
				@foreach($why_us as $why)
				<div class="col-md-12 single-row">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-6 col-md-1">
									<p class="key">{{__('site.code')}}</p>
									<p class="value">{{$why->id}}</p>
								</div>

								<div class="col-6 col-md-5">
									<p class="key">{{__('site.description_ar')}}</p>
									<p class="value">{!!$why->description_ar!!}</p>
								</div>
								<div class="col-6 col-md-2 display-none">
									<p class="key">{{__('site.description_en')}}</p>
									<p class="value">{{$why->description_en}}</p>
								</div>
								<div class="col-6 col-md-2">
                                    <p class="key">{{__('site.actions')}}</p>
                                    <div class="actions-dropdown">
                                        <button type="button" class="btn btn-style btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>

                                        <div class="dropdown-menu">
                                            @can('edit_why_us')
                                            <a href="{{route('whys.edit',$why->id)}}" class=" dropdown-item"><i class="fa fa-edit"> </i> {{__('site.edit')}}</a>
                                            @endcan
                                            @can('delete_why_us')
                                            <form action="{{route('whys.destroy', $why->id)}}" method="POST" class="dropdown-item">
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
		{{ $why_us->links() }}
		@endisset
	</div>
</div>
@stop
