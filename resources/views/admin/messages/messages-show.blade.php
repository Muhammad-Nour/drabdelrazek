@extends('layouts.admin_app')

@section('title', __('site.messages'))

@section('css')
@stop

@section('js')
@stop


@section('title-page', __('site.messages'))

@section('content')
<div class="main-stage messages">
	<div class="row">
		<div class="col-md-11 m-auto">
			@include('partial.alerts')

			@if($messages->count() > 0)
			<div class="row">
				@foreach($messages as $message)
				<div class="col-md-12 single-row">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.code')}}</p>
									<p class="value">{{$message->id}}</p>
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.name')}}</p>
									<p class="value">{{$message->name}}</p>
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.phone')}}</p>
									<p class="value">{{$message->phone}}</p>
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.email')}}</p>
									<p class="value">{{$message->email}}</p>
								</div>
								<div class="col-6 col-md-6">
									<p class="key">{{__('site.message')}}</p>
									<p class="value">{{$message->description}}</p>
								</div>

								<div class="col-6 col-md-2">
                                    <p class="key">{{__('site.actions')}}</p>
                                    <div class="actions-dropdown">
                                        <button type="button" class="btn btn-style btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>

                                        <div class="dropdown-menu">
                                            @can('edit_messages')
                                            <a href="{{route('messages.edit',$message->id)}}" class=" dropdown-item"><i class="fa fa-edit"> </i> {{__('site.edit')}}</a>
                                            @endcan
                                            @can('delete_messages')
                                            <form action="{{route('messages.destroy', $message->id)}}" method="POST" class="dropdown-item">
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
		{{ $messages->links() }}
		@endisset
	</div>
</div>
@stop
