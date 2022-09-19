<div class="container-for-box lsiting-wrapper_box">
	<form class="form-design listing-search">
		<div class="row">
			<div class="col-md-3 input-box">
				<div class="form-grouph select-design">
					<select wire:model="user_type">
						<option value="">Select User Type</option>
						<option value="reporter">Reporter</option>
						<option value="streamer">Streamer</option>
					</select>
					{!! $errors->first('user_type', '<span class="help-block">:message</span>') !!}
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
			
			@if(@$publications)
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
			@endif
			
			<div class="col-md-2 input-box">
				<button class="submit-short-btn" type="button" wire:click="search" wire:loading.attr="disabled">
					<i wire:loading wire:target="search" class="fa fa-spin fa-spinner"></i> {{__ ('Search') }}
				</button>
			</div>
		</div>
	</form>
	
	
	
	<div class="row">
		<div class="table-design table-responsive">
			<table>
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@if(!$searchData->isEmpty())
					@foreach($searchData as $user)
					<tr>
						<td>
							<div class="game-title-img d-flex align-items-center">
								<img src="{{ $user->profile_pic }}">
								<span class="game-title">{{ $user->name }}</span>
							</div> 
						</td>
						<td>
							<a href="mailto:{{ $user->email }}" class="mail-text">{{ $user->email }}</a>
						</td>
						<td class="action-btns">
							@include('livewire.studio.button')
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table>



			@if($searchData->isEmpty())
			<div class="no-data-found">
				<div class="container-1205px">
					<div class="nothing-here-yet">
						<h4><i class="fas fa-database"></i> {{ $user_type=='reporter' ? 'Reporter' : 'Streamer' }} not found.</h4>
					</div>
				</div>
			</div>
			@endif

		</div>
	</div>
	
	
	<!-- Accept Modal Start Here-->
    <div wire:ignore.self class="modal fade modal-design" id="contactForm" tabindex="-1" aria-labelledby="contactForm" aria-hidden="true">
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