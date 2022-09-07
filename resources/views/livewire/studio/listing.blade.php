<div>
	<form class="form-design listing-search">
		<div class="row">
			<div class="col-md-3 input-box">
				<div class="form-grouph select-design">
					<select wire:model="user_type">
						<option value="">Select User Type</option>
						<option value="reporter">Reporter</option>
						<option value="streamer">Streamer</option>
					</select>
				</div>
			</div>
			<div class="col-md-2 input-box">
				<div class="form-grouph input-design">
					<input placeholder="Search keyword" wire:model="keyword" type="text">
				</div>
			</div>
			<div class="col-md-2 input-box">
				<div class="form-grouph select-design">
					<select wire:model="tag">
						<option value="">Select Tag</option>
						@foreach($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3 input-box">
				<div class="form-grouph select-design ">
					<select wire:model="publication">
						<option value="">Select Publication</option>
						@foreach($publications as $publication)
						<option value="{{ $publication->id }}">{{ $publication->publication }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-2 input-box">
				<button class="submit-short-btn" type="button" wire:click="search" wire:loading.attr="disabled">
					<i wire:loading wire:target="search" class="fa fa-spin fa-spinner"></i> {{__ ('Search') }}
				</button>
			</div>
		</div>
	</form>



	<div class="row">
		@if(count($searchData) > 0)
		@foreach($searchData as $user)
		<div class="card col-md-3" >
			<img class="card-img-top" src="{{ $user->profile_pic }}" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title">{{ $user->name }}</h5>
				<p class="card-text">{{ $user->email }}</p>
				<div class="card-btn">

					@if(in_array($user->id, $favourites))
					<a class="view-btn toggle-class-remove" href="javascript:void(0)" wire:click="unfavourite({{$user->id}})">Unfavourite</a>
					@else
					<a class="view-btn toggle-class" href="javascript:void(0)" wire:click="favourite({{$user->id}})">Favourite</a>
					@endif

					<a target="_blank" class="view-btn" href="{{ route('user.view', $user->id) }}">View</a>
			
					<button type="button" class="view-btn" wire:click="contactModal({{$user->id}})">
						Contact
					</button>
					
				</div>
			</div>
		</div>
		@endforeach
		@else
		<p class="nodata">No Data Found</p>
		@endif
	</div>


	<!-- Accept Modal Start Here-->
    <div wire:ignore.self class="modal fade" id="contactForm" tabindex="-1" aria-labelledby="contactForm" aria-hidden="true">
        <div class="modal-dialog modal_style">
            <button type="button" class="btn btn-default close closeModal">
                <i class="fas fa-close"></i>
			</button>
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h3>Contact</h3>
					</div>
                    <div class="modal-body">
                        <div>
                            <div class="form-grouph input-design mb-15">
                                <label>Message</label>
                                <textarea wire:model="message" class="form-control"></textarea>
                                {!! $errors->first('message', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
					</div>
                    <div class="text-center mb-3">
                        <button type="button" class="btn btn-success" wire:click="sendMessage" wire:loading.attr="disabled">
                            <i wire:loading wire:target="sendMessage" class="fas fa-spin fa-spinner"></i> Send
						</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>

	@push('scripts')
    <script>
        $(document).ready(function () {
			window.livewire.on('showModal', () => {
                $('#contactForm').modal('show');
			});
            window.livewire.on('closeModal', () => {
                $('#contactForm').modal('hide');
			});
		});
        $(document).on('click', '.closeModal', function(e) {
            $('#contactForm').modal('hide');
		});
	</script>
    @endpush

</div>