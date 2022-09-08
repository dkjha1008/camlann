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
					<a class="view-btn toggle-class-remove" href="javascript:void(0)" wire:click="unfavourite({{$user->id}})"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M0.25 6.01872C0.25 2.7595 2.8899 0.25 5.98857 0.25C7.58587 0.25 8.99139 1.0612 10 2.11083C11.0086 1.0612 12.4141 0.25 14.0114 0.25C17.1101 0.25 19.75 2.7595 19.75 6.01872C19.75 8.25132 18.871 10.2147 17.6531 11.8743C16.4374 13.531 14.8471 14.9371 13.3244 16.0796C12.7429 16.516 12.1545 16.9186 11.616 17.2156C11.1104 17.4945 10.529 17.75 10 17.75C9.471 17.75 8.88961 17.4945 8.38399 17.2156C7.84551 16.9186 7.25714 16.516 6.67556 16.0796C5.15291 14.9371 3.56263 13.531 2.34689 11.8743C1.12904 10.2147 0.25 8.25132 0.25 6.01872ZM5.98857 2.06034C3.67169 2.06034 1.92143 3.90581 1.92143 6.01872C1.92143 7.71259 2.58531 9.28965 3.65536 10.7478C4.72751 12.2089 6.17011 13.498 7.6274 14.5915C8.17883 15.0053 8.69823 15.3573 9.1425 15.6024C9.61964 15.8656 9.896 15.9397 10 15.9397C10.104 15.9397 10.3804 15.8656 10.8575 15.6024C11.3018 15.3573 11.8212 15.0053 12.3726 14.5915C13.8299 13.498 15.2725 12.2089 16.3446 10.7478C17.4147 9.28965 18.0786 7.71259 18.0786 6.01872C18.0786 3.90581 16.3283 2.06034 14.0114 2.06034C12.6808 2.06034 11.4383 2.92137 10.6625 4.01422C10.5043 4.23706 10.2595 4.36765 10 4.36765C9.74047 4.36765 9.49568 4.23706 9.33749 4.01422C8.56168 2.92137 7.3192 2.06034 5.98857 2.06034Z" fill="black"/>
</svg></a>
					@else
					<a class="view-btn toggle-class" href="javascript:void(0)" wire:click="favourite({{$user->id}})"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 20 18" style="enable-background:new 0 0 20 18;" xml:space="preserve" width="20" height="18">
<style type="text/css">
	.st0{fill-rule:evenodd;clip-rule:evenodd;fill:#EC428A;}
	.st1{fill-rule:evenodd;clip-rule:evenodd;}
</style>
<path class="st0" d="M9.5,3.2c0,0-4-4.3-6.9-0.6s0,7.9,0,7.9l4.9,5.4l2.5,1c0,0,7.6-4.9,7.3-5.4C17,11.1,20,3.5,18.4,3.4  C16.9,3.2,14.9-1.2,9.5,3.2z"/>
<path class="st1" d="M0.2,6c0-3.3,2.6-5.8,5.7-5.8c1.6,0,3,0.8,4,1.9c1-1,2.4-1.9,4-1.9c3.1,0,5.7,2.5,5.7,5.8  c0,2.2-0.9,4.2-2.1,5.9c-1.2,1.7-2.8,3.1-4.3,4.2c-0.6,0.4-1.2,0.8-1.7,1.1c-0.5,0.3-1.1,0.5-1.6,0.5s-1.1-0.3-1.6-0.5  c-0.5-0.3-1.1-0.7-1.7-1.1c-1.5-1.1-3.1-2.5-4.3-4.2C1.1,10.2,0.2,8.3,0.2,6z M6,2.1c-2.3,0-4.1,1.8-4.1,4c0,1.7,0.7,3.3,1.7,4.7  c1.1,1.5,2.5,2.8,4,3.8c0.6,0.4,1.1,0.8,1.5,1c0.5,0.3,0.8,0.3,0.9,0.3s0.4-0.1,0.9-0.3c0.4-0.2,1-0.6,1.5-1c1.5-1.1,2.9-2.4,4-3.8  c1.1-1.5,1.7-3,1.7-4.7c0-2.1-1.8-4-4.1-4c-1.3,0-2.6,0.9-3.3,2c-0.2,0.2-0.4,0.4-0.7,0.4C9.7,4.4,9.5,4.2,9.3,4  C8.6,2.9,7.3,2.1,6,2.1z"/>
</svg></a>
					@endif

					<a target="_blank" class="view-btn" href="{{ route('user.view', $user->id) }}"><svg width="23" height="16" viewBox="0 0 23 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M7 7.875C7 5.45875 8.95875 3.5 11.375 3.5C13.7912 3.5 15.75 5.45875 15.75 7.875C15.75 10.2912 13.7912 12.25 11.375 12.25C8.95875 12.25 7 10.2912 7 7.875ZM11.375 5.25C9.92525 5.25 8.75 6.42525 8.75 7.875C8.75 9.32475 9.92525 10.5 11.375 10.5C12.8247 10.5 14 9.32475 14 7.875C14 6.42525 12.8247 5.25 11.375 5.25Z" fill="black"></path>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M2.419 6.29575C1.93003 7.00033 1.75 7.55148 1.75 7.875C1.75 8.19852 1.93003 8.74967 2.419 9.45425C2.89167 10.1354 3.59424 10.8737 4.48312 11.5559C6.26475 12.9233 8.70736 14 11.375 14C14.0426 14 16.4853 12.9233 18.2669 11.5559C19.1558 10.8737 19.8583 10.1354 20.331 9.45425C20.82 8.74967 21 8.19852 21 7.875C21 7.55148 20.82 7.00033 20.331 6.29575C19.8583 5.61465 19.1558 4.87634 18.2669 4.19413C16.4853 2.82674 14.0426 1.75 11.375 1.75C8.70736 1.75 6.26475 2.82674 4.48312 4.19413C3.59424 4.87634 2.89167 5.61465 2.419 6.29575ZM3.41764 2.80587C5.43626 1.25659 8.24365 0 11.375 0C14.5064 0 17.3137 1.25659 19.3324 2.80587C20.3436 3.582 21.1787 4.44785 21.7687 5.298C22.3424 6.12467 22.75 7.03185 22.75 7.875C22.75 8.71815 22.3424 9.62533 21.7687 10.452C21.1787 11.3021 20.3436 12.168 19.3324 12.9441C17.3137 14.4934 14.5064 15.75 11.375 15.75C8.24365 15.75 5.43626 14.4934 3.41764 12.9441C2.40639 12.168 1.57128 11.3021 0.981287 10.452C0.407599 9.62533 0 8.71815 0 7.875C0 7.03185 0.407599 6.12467 0.981287 5.298C1.57128 4.44785 2.40639 3.582 3.41764 2.80587Z" fill="black"></path>
									</svg></a>
			
					<button type="button" class="view-btn" wire:click="contactModal({{$user->id}})">
					<svg width="24" height="19" viewBox="0 0 24 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.25 7.21447C0.25 3.24636 4.05525 0.25 8.45161 0.25C11.9502 0.25 15.0521 2.13375 16.1918 4.89933C16.243 5.02337 16.154 5.15792 16.0203 5.16898C15.648 5.19978 15.2782 5.25265 14.9138 5.32662C14.8207 5.34551 14.7269 5.29807 14.6853 5.2127C13.7216 3.23442 11.3546 1.75 8.45161 1.75C4.61715 1.75 1.75 4.31827 1.75 7.21447C1.75 8.77913 2.56392 10.224 3.9325 11.2455C4.12216 11.3871 4.23387 11.6099 4.23387 11.8465V12.7873L5.78151 12.357C5.9163 12.3196 6.05888 12.3205 6.19314 12.3598C6.80385 12.5387 7.45668 12.6474 8.13752 12.673C8.24556 12.6771 8.33258 12.764 8.33726 12.8721C8.35581 13.3 8.41311 13.7133 8.50538 14.1107C8.51344 14.1454 8.48728 14.1788 8.45161 14.1789C7.59258 14.1789 6.76262 14.0669 5.98177 13.8582L3.68475 14.4968C3.45891 14.5596 3.21671 14.5132 3.03009 14.3713C2.84346 14.2295 2.73387 14.0086 2.73387 13.7742V12.211C1.22401 10.9648 0.25 9.20157 0.25 7.21447Z" fill="black"/>
<path d="M6.85486 5.25806C6.85486 5.84597 6.37826 6.32257 5.79035 6.32257C5.20243 6.32257 4.72583 5.84597 4.72583 5.25806C4.72583 4.67014 5.20243 4.19354 5.79035 4.19354C6.37826 4.19354 6.85486 4.67014 6.85486 5.25806Z" fill="black"/>
<path d="M11.1129 6.32257C11.7008 6.32257 12.1774 5.84597 12.1774 5.25806C12.1774 4.67014 11.7008 4.19354 11.1129 4.19354C10.525 4.19354 10.0484 4.67014 10.0484 5.25806C10.0484 5.84597 10.525 6.32257 11.1129 6.32257Z" fill="black"/>
<path d="M14.5459 12.1774C15.0604 12.1774 15.4774 11.7604 15.4774 11.246C15.4774 10.7315 15.0604 10.3145 14.5459 10.3145C14.0315 10.3145 13.6145 10.7315 13.6145 11.246C13.6145 11.7604 14.0315 12.1774 14.5459 12.1774Z" fill="black"/>
<path d="M20.0016 11.246C20.0016 11.7604 19.5846 12.1774 19.0702 12.1774C18.5557 12.1774 18.1387 11.7604 18.1387 11.246C18.1387 10.7315 18.5557 10.3145 19.0702 10.3145C19.5846 10.3145 20.0016 10.7315 20.0016 11.246Z" fill="black"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M16.7856 6.85853C20.496 6.85853 23.7452 9.39117 23.7452 12.7873C23.7452 14.4662 22.9366 15.7319 21.6801 16.7881V18.0322C21.6801 18.2666 21.5705 18.4876 21.3839 18.6294C21.1972 18.7712 20.955 18.8176 20.7292 18.7548L18.8477 18.2318C18.1961 18.4029 17.5049 18.4945 16.7903 18.4945C13.0798 18.4945 9.83063 15.9619 9.83063 12.5658C9.83063 9.16972 13.0751 6.85853 16.7856 6.85853ZM22.25 12.5658C22.25 10.2416 19.9389 8.13708 16.7903 8.13708C13.6417 8.13708 11.3306 10.2416 11.3306 12.5658C11.3306 14.89 13.6417 16.9945 16.7903 16.9945C17.4405 16.9945 18.062 16.9021 18.6372 16.7337C18.7715 16.6943 18.9141 16.6934 19.0489 16.7308L20.1801 17.0453V16.4259C20.1801 16.1892 20.2918 15.9664 20.4815 15.8248C21.596 14.9929 22.25 13.8237 22.25 12.5658Z" fill="black"/>
</svg>

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