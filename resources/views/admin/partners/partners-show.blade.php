@extends('layouts.admin_app')

@section('title', __('site.partners'))

@section('css')
@stop

@section('js')
@stop


@section('title-page', __('site.partners'))

@section('content')
<div class="main-stage partners">
	<div class="row">
		<div class="col-md-11 m-auto">
			@include('partial.alerts')

			@if($partners->count() > 0)
			<div class="row">
				@foreach($partners as $partner)
				<div class="col-md-12 single-row">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-6 col-md-2">
									<p class="key">{{__('site.code')}}</p>
									<p class="value">{{$partner->id}}</p>
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.name_ar')}}</p>
									<p class="value">{{$partner->name_ar}}</p>
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.name_en')}}</p>
									<p class="value">{{$partner->name_en}}</p>
								</div>

								<div class="col-6 col-md-2">
									<p class="key">{{__('site.image')}}</p>
									<img src="{{asset('images/'.$partner->photo)}}">
								</div>

								<div class="col-6 col-md-2">
                                    <p class="key">{{__('site.actions')}}</p>
                                    <div class="actions-dropdown">
                                        <button type="button" class="btn btn-style btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>

                                        <div class="dropdown-menu">
                                            @can('edit_partners')
                                            <a href="{{route('partners.edit',$partner->id)}}" class=" dropdown-item"><i class="fa fa-edit"> </i> {{__('site.edit')}}</a>
                                            @endcan('edit_partners')

                                            @can('delete_partners')
                                            <form action="{{route('partners.destroy', $partner->id)}}" method="POST" class="dropdown-item">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <a href="" class="delete text-danger"> <i class="fa fa-trash-alt"> </i>   {{__('site.delete')}} </a>
                                            </form>
                                            @endcan('delete_partners')
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
		{{ $partners->links() }}
		@endisset
	</div>
</div>
@stop
