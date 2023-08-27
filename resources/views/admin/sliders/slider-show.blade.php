@extends('layouts.admin_app')

@section('title', __('site.slider'))

@section('css')
@stop

@section('js')
@stop


@section('title-page', __('site.slider'))

@section('content')
<div class="main-stage sliders">
	<div class="row">
		<div class="col-md-11 m-auto">
			@include('partial.alerts')

			@if($sliders->count() > 0)
			<div class="row">
				@foreach($sliders as $slider)
				<div class="col-md-12 single-row">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-6 col-md-2">
									<p class="key">{{__('site.code')}}</p>
									<p class="value">{{$slider->id}}</p>
								</div>
								<div class="col-6 col-md-2" style="overflow: hidden;">
									<p class="key">{{__('site.image')}}</p>
									<img src="{{asset('images/'.$slider->photo)}}" >
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.title_ar')}}</p>
									<p class="value">{{$slider->title_ar}}</p>
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.title_en')}}</p>
									<p class="value">{{$slider->title_en}}</p>
								</div>
								
								<div class="col-6 col-md-2">
                                    <p class="key">{{__('site.actions')}}</p>
                                    <div class="actions-dropdown">
                                        <button type="button" class="btn btn-style btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            @can('edit_sliders')
                                            <a href="{{route('sliders.edit',$slider->id)}}" class=" dropdown-item"><i class="fa fa-edit"> </i> {{__('site.edit')}}</a>
                                            @endcan
                                            @can('delete_sliders')
                                            <form action="{{route('sliders.destroy', $slider->id)}}" method="POST" class="dropdown-item">
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
		{{ $sliders->links() }}
		@endisset
	</div>
</div>
@stop
