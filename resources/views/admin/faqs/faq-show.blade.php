@extends('layouts.admin_app')

@section('title', __('site.faqs'))

@section('css')
@stop

@section('js')
@stop


@section('title-page', __('site.faqs'))

@section('content')
<div class="main-stage faqs">
	<div class="row">
		<div class="col-md-11 m-auto">
			@include('partial.alerts')

			@if($faqs->count() > 0)
			<div class="row">
				@foreach($faqs as $faq)
				<div class="col-md-12 single-row">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-6 col-md-1">
									<p class="key">{{__('site.code')}}</p>
									<p class="value">{{$faq->id}}</p>
								</div>
								<div class="col-6 col-md-2">
									<p class="key">{{__('site.title_ar')}}</p>
									<p class="value">{{$faq->title_ar}}</p>
								</div>
								<div class="col-6 col-md-2 display-none">
									<p class="key">{{__('site.title_en')}}</p>
									<p class="value">{{$faq->title_en}}</p>
								</div>

								<div class="col-6 col-md-5">
									<p class="key">{{__('site.description_ar')}}</p>
									<p class="value">{!!$faq->description_ar!!}</p>
								</div>
								<div class="col-6 col-md-2 display-none">
									<p class="key">{{__('site.description_en')}}</p>
									<p class="value">{{$faq->description_en}}</p>
								</div>
								<div class="col-6 col-md-2">
                                    <p class="key">{{__('site.actions')}}</p>
                                    <div class="actions-dropdown">
                                        <button type="button" class="btn btn-style btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>

                                        <div class="dropdown-menu">
                                            @can('edit_faq')
                                            <a href="{{route('faqs.edit',$faq->id)}}" class=" dropdown-item"><i class="fa fa-edit"> </i> {{__('site.edit')}}</a>
                                            @endcan
                                            @can('delete_faq')
                                            <form action="{{route('faqs.destroy', $faq->id)}}" method="POST" class="dropdown-item">
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
		{{ $faqs->links() }}
		@endisset
	</div>
</div>
@stop
