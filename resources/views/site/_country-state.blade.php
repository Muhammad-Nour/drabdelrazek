<option value="">{{ __('site.select') }}</option>
@foreach ($states as $state)
<option value="{{ $state->id }}" {{ (request()->state == $state->id) ? 'selected' : '' }} >
{{ $state->{'name_'.app()->getLocale()} }}
</option>
@endforeach