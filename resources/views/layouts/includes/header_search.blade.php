@if(auth()->user()->role=='studio' && !request()->routeIs('studio.listing'))
<form action="{{ route('studio.listing') }}" class="form-design">
	<div class="row">
		<div class="col-md-3">
			<div class="form-grouph input-design">
				{!! Form::text('keyword', null, ['placeholder'=>'Search keyword', 'required']) !!}
			</div>
		</div>
		<div class="col-md-2">
			<button class="submit-short-btn" type="submit">{{__ ('Search') }}</button>
		</div>
	</div>
</form>
@endif


@if(auth()->user()->role=='reporter' && !request()->routeIs('reporter.listing'))
<form action="{{ route('reporter.listing') }}" class="form-design">
	<div class="row">
		<div class="col-md-3">
			<div class="form-grouph input-design">
				{!! Form::text('keyword', null, ['placeholder'=>'Search keyword', 'required']) !!}
			</div>
		</div>
		<div class="col-md-2">
			<button class="submit-short-btn" type="submit">{{__ ('Search') }}</button>
		</div>
	</div>
</form>
@endif

@if(auth()->user()->role=='streamer' && !request()->routeIs('streamer.listing'))
<form action="{{ route('streamer.listing') }}" class="form-design">
	<div class="row">
		<div class="col-md-3">
			<div class="form-grouph select-design">
				{!! Form::select('user_type', ['reporter'=>'Reporter', 'streamer'=>'Streamer'], null, ['placeholder'=>'Select User Type', 'required']) !!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-grouph input-design">
				{!! Form::text('keyword', null, ['placeholder'=>'Search keyword', 'required']) !!}
			</div>
		</div>
		<div class="col-md-2">
			<button class="submit-short-btn" type="submit">{{__ ('Search') }}</button>
		</div>
	</div>
</form>
@endif



