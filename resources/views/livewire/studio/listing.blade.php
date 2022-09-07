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
			@if($user_type=='reporter')
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
		@if(count($searchData) > 0)
		@foreach($searchData as $user)
		<div class="card col-md-3" >
			<img class="card-img-top" src="{{ $user->profile_pic }}" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title">{{ $user->name }}</h5>
				<p class="card-text">{{ $user->email }}</p>
				<div class="card-btn">
					<form>
						@foreach($favourites as $favourite)
						@endforeach
					@if($favourite->fav_users_id == $user->id)
					<a class="view-btn toggle-class-remove" href="javascript:void(0)" data-id="{{$user->id}}">Unfavourite</a>
					@else
					<a class="view-btn toggle-class" href="javascript:void(0)" data-id="{{$user->id}}">Favourite</a>
					@endif

					</form>
					
					<a class="view-btn" href="{{route('user-view', ['id' => $user->id])}}">View</a>
				<!-- 	<button type="button" class=" view-btn" data-bs-toggle="modal" data-bs-target="#exampleModal2">
						View
					</button> -->

					<!-- Button trigger modal -->
					<button type="button" class=" view-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
						Contact
					</button>

					<!-- Modal -->
					<div class="modal fade cls" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-id="{{$user->id}}">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Contact</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form class="modal-form">
								<!-- 		<label>Name</label>
										<input></input>
										<label>Last name</label>
										<input></input>
										<label>Phone</label>
										<input></input> -->
										<label>Message</label>
										<textarea id="textt" name="mess"></textarea>
										<input type="hidden" name="hidd" id="mailhid" value="{{$user->email}}">
									</form>
								</div>
								<div class="modal-footer">
									<!-- <button type="button" class="btn btn-secondary view-btn" data-bs-dismiss="modal">Close</button> -->
									<button type="button" class="btn btn-primary view-btn send" >Save changes</button>
								</div>
							</div>
						</div>
					</div>
					

					<!--View Modal -->
			<!-- 		<div class="modal fade cls" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-id="">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">User</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form class="modal-form">
										<label>Profile</label>
										<img src="{{url('/storage/images/'.$user->image)}}" height="100" width="100"><br>
										<label>Name</label>
										<input type="text" value="{{$user->first_name}}" readonly></input>
										<label>Last name</label>
										<input type="text" value="{{$user->last_name}}" readonly></input>
										<label>Email</label>
										<input type="text" value="{{$user->email}}" readonly></input><br>

										@foreach($favourites as $favourite)
						@endforeach
					@if($favourite->fav_users_id == $user->id)
					<a class="view-btn toggle-class-remove" href="javascript:void(0)" data-id="{{$user->id}}">Unfavourite</a>
					@else
					<a class="view-btn toggle-class" href="javascript:void(0)" data-id="{{$user->id}}">Favourite</a>
					@endif
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary view-btn" data-bs-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary view-btn" >Save changes</button>
								</div>
							</div>
						</div>
					</div> -->


				</div>
			</div>
		</div>
		@endforeach
		@else
		<p class="nodata">No Data Found</p>
		@endif
	</div>


</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">

	 $(document).ready(function(){
	 $('.toggle-class').click(function() {
	 var user_id = $(this).data('id');
 		$.ajax({
            type: 'post',
            url: 'addfavourite',
            data: {
            	"_token": "{{ csrf_token() }}",
                'user_id': user_id,
           
            },
            success: function (response) {
            	if(response){
            		location.reload();
            	}
            },
            error: function (XMLHttpRequest) {
            }
        });	

	});
	  $('.toggle-class-remove').click(function() {
	 var user_id = $(this).data('id');
      $.ajax({
            type: 'post',
            url: 'removefavourite',
            data: {
            	"_token": "{{ csrf_token() }}",
                'user_id': user_id,
            },
            success: function (response) {
            	if(response){
            		location.reload();
            	}
            },
            error: function (XMLHttpRequest) {
            }
        });	

	});

	 $('.send').click(function() {

	 var user_id = $('.cls').attr('data-id');
	 var mess = $('#textt').val();
	 var email = $('#mailhid').val();
      $.ajax({
            type: 'post',
            url: 'contact-message',
            data: {
            	"_token": "{{ csrf_token() }}",
                'user_id': user_id,
                'message': mess,
                'email': email,
            },
            success: function (response) {
  				console.log(response)
            },
            error: function (XMLHttpRequest) {
            }
        });	

	});
	});
</script>