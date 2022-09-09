<div>
    <form class="form-design">
		<div class="row">
		
			
			<div class="col-md-3">
				<div class="form-grouph select-design">
					<select wire:model="type">
						<option value="">Select Type</option>
						<option value="studio">Studio</option>
						<option value="game">Game</option>
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
			
			<div class="col-md-2">
				<button class="submit-short-btn" type="button" wire:click="search" wire:loading.attr="disabled">
					<i wire:loading wire:target="search" class="fa fa-spin fa-spinner"></i> {{__ ('Search') }}
				</button>
			</div>
		</div>
	</form>
	
	
	
	<div class="row">
		
		@if($type=='studio')
		@foreach($searchData as $user)
		<div class="card col-md-3" >
			<img class="card-img-top" src="{{ $user->profile_pic }}" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title">{{ $user->name }}</h5>
				<p class="card-text">{{ $user->email }}</p>
				<div class="card-btn">

					@include('livewire.studio.button')
					
				</div>
			</div>
		</div>
		@endforeach
		@endif
		
		
		@if($type=='game')
		@foreach($searchData as $game)
		<div class="card col-md-3">
			<img class="card-img-top" src="{{ $game->full_image }}" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title">{{ $game->title }}</h5>
				<div class="card-btn">
					
					@include('livewire.studio.button_game')

				</div>
			</div>
		</div>
		@endforeach
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
            window.livewire.on('urlChange', param => {
                history.pushState(null, null, param);
            });
		});
        $(document).on('click', '.closeModal', function(e) {
            $('#contactForm').modal('hide');
		});
	</script>
    @endpush
	
	
</div>
