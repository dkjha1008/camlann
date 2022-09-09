<header class="main-header">
	<div class="header-wrapper">
	
		@include('layouts.includes.header_search')
		
		<ul class="list-unstyled">
			{{--
			<li class="nav-item navigation-icon">
				<div class="dropdown">
					<button type="button" class="btn-notifaction dropdown-toggle position-relative" data-bs-toggle="dropdown">
						<svg width="18" height="26" viewBox="0 0 23 32" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M19.807 17.1282V14.4112H18.0989V17.5632C18.0989 17.8419 18.1889 18.1091 18.3491 18.3061L20.6611 21.1503V22.8167H1.87126V21.1503L4.18327 18.3061C4.34345 18.1091 4.43346 17.8419 4.43351 17.5632V13.3605C4.43113 11.884 4.74551 10.433 5.3449 9.15384C5.94428 7.87471 6.80744 6.81282 7.8472 6.07542C8.88696 5.33801 10.0665 4.95122 11.2667 4.95409C12.4668 4.95697 13.6451 5.34942 14.6825 6.0918V3.74351C13.8695 3.30067 13.0048 3.01841 12.1203 2.90716V0.752197H10.4121V2.90611C8.30642 3.16976 6.355 4.38455 4.93518 6.31558C3.51535 8.24661 2.72799 10.7567 2.72534 13.3605V17.1282L0.413333 19.9725C0.25315 20.1695 0.163134 20.4367 0.163086 20.7153V23.8674C0.163086 24.146 0.25307 24.4133 0.413242 24.6103C0.573414 24.8074 0.790654 24.9181 1.01717 24.9181H6.99577V25.9687C6.99577 27.362 7.44569 28.6983 8.24655 29.6835C9.04741 30.6687 10.1336 31.2222 11.2662 31.2222C12.3988 31.2222 13.485 30.6687 14.2858 29.6835C15.0867 28.6983 15.5366 27.362 15.5366 25.9687V24.9181H21.5152C21.7417 24.9181 21.959 24.8074 22.1191 24.6103C22.2793 24.4133 22.3693 24.146 22.3693 23.8674V20.7153C22.3693 20.4367 22.2792 20.1695 22.1191 19.9725L19.807 17.1282ZM13.8285 25.9687C13.8285 26.8047 13.5585 27.6065 13.078 28.1976C12.5975 28.7887 11.9457 29.1208 11.2662 29.1208C10.5866 29.1208 9.93492 28.7887 9.45441 28.1976C8.97389 27.6065 8.70394 26.8047 8.70394 25.9687V24.9181H13.8285V25.9687Z" fill="#231769"/>
						</svg>
						<span class="notification-indicators"></span>              
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Link 1</a></li>
						<li><a class="dropdown-item" href="#">Link 2</a></li>
						<li><a class="dropdown-item" href="#">Link 3</a></li>
					</ul>
				</div>
			</li>
			--}}


			<li class="nav-item dashboard-icon">
				<div class="dropdown">
					<button type="button" class="btn-dashboard dropdown-toggle position-relative" data-bs-toggle="dropdown">
						<span class="avtar-img"><img src="{{ $user->profile_pic}}"></span>
						<span class="user-name">{{ $user->name }}</span>  
						<span class="dots-icon"><img src="{{ asset('assets/images/icons/dots.svg') }}"></span>            
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
						<li><a class="dropdown-item" href="{{ route('profile.password') }}">Change Password</a></li>
						<li>
							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</li>
						
					</ul>
				</div>
			</li>
		</ul>
	</div>
</header>