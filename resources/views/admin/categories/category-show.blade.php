@extends('layouts.admin_app')

@section('title', __('site.categories'))

@section('css')
@stop

@section('js')
@stop


@section('title-page', __('site.categories'))

@section('content')
<div class="main-stage categories">
	<div class="row">
		<div class="col-md-11 m-auto">
			@include('partial.alerts')

			@if($categories->count() > 0)
			<div class="row">
				@foreach($categories as $category)
				<div class="col-md-12 single-row">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-6 col-md-2">
									<p class="key">{{__('site.code')}}</p>
									<p class="value">{{$category->id}}</p>
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.name_ar')}}</p>
									<p class="value">{{$category->name_ar}}</p>
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.name_en')}}</p>
									<p class="value">{{$category->name_en}}</p>
								</div>


								<div class="col-6 col-md-2">
                                    <p class="key">{{__('site.actions')}}</p>
                                    <div class="actions-dropdown">
                                        <button type="button" class="btn btn-style btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>

                                        <div class="dropdown-menu">
                                            @can('edit_category')
                                            <a href="{{route('categories.edit',$category->id)}}" class=" dropdown-item"><i class="fa fa-edit"> </i> {{__('site.edit')}}</a>
                                            @endcan
                                            @can('delete_category')
                                            <form action="{{route('categories.destroy', $category->id)}}" method="POST" class="dropdown-item">
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
		{{ $categories->links() }}
		@endisset
	</div>
</div>
@stop
