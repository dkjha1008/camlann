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
					<a class="view-btn" href="#">View</a>
					<!-- Button trigger modal -->
					<button type="button" class=" view-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
						Contact
					</button>

					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Contact</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form class="modal-form">
										<label>Name</label>
										<input></input>
										<label>Last name</label>
										<input></input>
										<label>Phone</label>
										<input>Email</input>
										<label></label>
										<textarea></textarea>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary view-btn" data-bs-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary view-btn">Save changes</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		@else
		<p class="nodata">No Data Found</p>
		@endif
	</div>


</div>