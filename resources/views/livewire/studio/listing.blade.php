<div>
    <form class="form-design">
		<div class="row">
			<div class="col-md-3">
				<div class="form-grouph select-design">
					<select wire:model="user_type">
						<option value="">Select User Type</option>
						<option value="reporter">Reporter</option>
						<option value="streamer">Streamer</option>
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-grouph input-design">
					<input placeholder="Search keyword" wire:model="keyword" type="text">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-grouph select-design">
					<select wire:model="tag">
						<option value="">Select Tag</option>
						@foreach($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-grouph select-design">
					<select wire:model="publication">
						<option value="">Select Publication</option>
						@foreach($publications as $publication)
						<option value="{{ $publication->id }}">{{ $publication->publication }}</option>
						@endforeach
					</select>
				</div>
			</div>
			
			<div class="col-md-2">
				<button class="submit-short-btn" type="button" wire:click="search" wire:loading.attr="disabled">
					<i wire:loading wire:target="search" class="fa fa-spin fa-spinner"></i> {{__ ('Search') }}
				</button>
			</div>
		</div>
	</form>
	
	
	
	<div class="row">
		@if(count($searchData) > 0)
		@foreach($searchData as $user)
		<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="{{ $user->profile_pic }}" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title">{{ $user->name }}</h5>
				<p class="card-text">{{ $user->email }}</p>
				<a href="#" class="btn btn-primary">Link</a>
			</div>
		</div>
		@endforeach
		@else
			No Data Found
		@endif
	</div>
	
	
</div>
