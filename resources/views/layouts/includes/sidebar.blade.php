<div id="sidebar">
	<div class="sidebar-wrapper">
		<div class="sidebar-logo-wraapper">
			<a href="{{ route($user->role) }}"><img src="{{ asset('assets/images/dark-logo.png') }}"></a>
		</div>
		<div class="sidebar-list">
			<ul class="list-unstyled">
			
			
				@include('layouts.includes.sidebars.'.$user->role)
				
				
				
				
				<li class="nav-divider"></li>
				<li class="nav-item">
					<a href="#">
						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0_84_1062)">
								<path d="M18.75 8.75H16.1242C15.9626 7.9667 15.6514 7.22196 15.2075 6.55667L17.0675 4.69667C17.2952 4.46091 17.4212 4.14516 17.4183 3.81742C17.4155 3.48967 17.284 3.17615 17.0523 2.94439C16.8205 2.71263 16.507 2.58117 16.1793 2.57832C15.8515 2.57548 15.5358 2.70147 15.3 2.92917L13.4433 4.78917C12.778 4.34528 12.0333 4.03402 11.25 3.8725V1.25C11.25 0.918479 11.1183 0.600537 10.8839 0.366117C10.6495 0.131696 10.3315 0 10 0C9.66848 0 9.35054 0.131696 9.11612 0.366117C8.8817 0.600537 8.75 0.918479 8.75 1.25V3.87583C7.9667 4.03736 7.22196 4.34861 6.55667 4.7925L4.69667 2.92917C4.46091 2.70147 4.14516 2.57548 3.81742 2.57832C3.48967 2.58117 3.17615 2.71263 2.94439 2.94439C2.71263 3.17615 2.58117 3.48967 2.57832 3.81742C2.57548 4.14516 2.70147 4.46091 2.92917 4.69667L4.78917 6.55667C4.34528 7.22196 4.03402 7.9667 3.8725 8.75H1.25C0.918479 8.75 0.600537 8.8817 0.366117 9.11612C0.131696 9.35054 0 9.66848 0 10C0 10.3315 0.131696 10.6495 0.366117 10.8839C0.600537 11.1183 0.918479 11.25 1.25 11.25H3.87583C4.03736 12.0333 4.34861 12.778 4.7925 13.4433L2.92917 15.3033C2.70147 15.5391 2.57548 15.8548 2.57832 16.1826C2.58117 16.5103 2.71263 16.8238 2.94439 17.0556C3.17615 17.2874 3.48967 17.4188 3.81742 17.4217C4.14516 17.4245 4.46091 17.2985 4.69667 17.0708L6.55667 15.2108C7.22196 15.6547 7.9667 15.966 8.75 16.1275V18.75C8.75 19.0815 8.8817 19.3995 9.11612 19.6339C9.35054 19.8683 9.66848 20 10 20C10.3315 20 10.6495 19.8683 10.8839 19.6339C11.1183 19.3995 11.25 19.0815 11.25 18.75V16.1242C12.0333 15.9626 12.778 15.6514 13.4433 15.2075L15.3033 17.0675C15.5391 17.2952 15.8548 17.4212 16.1826 17.4183C16.5103 17.4155 16.8238 17.284 17.0556 17.0523C17.2874 16.8205 17.4188 16.507 17.4217 16.1793C17.4245 15.8515 17.2985 15.5358 17.0708 15.3L15.2108 13.44C15.6547 12.7747 15.966 12.03 16.1275 11.2467H18.75C19.0699 11.2301 19.3713 11.0914 19.5919 10.8591C19.8125 10.6268 19.9355 10.3187 19.9355 9.99833C19.9355 9.67798 19.8125 9.36986 19.5919 9.13757C19.3713 8.90527 19.0699 8.76654 18.75 8.75V8.75ZM10 13.75C9.00544 13.75 8.05161 13.3549 7.34835 12.6516C6.64509 11.9484 6.25 10.9946 6.25 10C6.25 9.00544 6.64509 8.05161 7.34835 7.34835C8.05161 6.64509 9.00544 6.25 10 6.25C10.9946 6.25 11.9484 6.64509 12.6516 7.34835C13.3549 8.05161 13.75 9.00544 13.75 10C13.75 10.9946 13.3549 11.9484 12.6516 12.6516C11.9484 13.3549 10.9946 13.75 10 13.75Z" fill="black"/>
							</g>
							<defs>
								<clipPath id="clip0_84_1062">
									<rect width="20" height="20" fill="white"/>
								</clipPath>
							</defs>
						</svg>                                       
						Setting
					</a>
				</li>
				<li class="nav-item">
					<a href="#">
						<svg width="18" height="18" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M8.07068 3.32172C7.24521 3.32276 6.45385 3.65114 5.87015 4.23484C5.28646 4.81853 4.95808 5.60989 4.95703 6.43536H6.53997C6.53997 5.59086 7.22697 4.90466 8.07068 4.90466C8.91438 4.90466 9.60138 5.59086 9.60138 6.43536C9.60138 6.90866 9.22068 7.25216 8.63895 7.72229C8.44891 7.87117 8.26638 8.02939 8.09205 8.19638C7.30216 8.98548 7.27921 9.82365 7.27921 9.91704V10.445H8.86215L8.86136 9.94395C8.86215 9.93129 8.88747 9.63844 9.21039 9.31631C9.32911 9.19759 9.4787 9.07887 9.63383 8.95382C10.2504 8.4544 11.1835 7.70013 11.1835 6.43536C11.1829 5.6099 10.8548 4.81842 10.2712 4.23466C9.68754 3.65089 8.89614 3.32255 8.07068 3.32172ZM7.27921 11.2364H8.86215V12.8194H7.27921V11.2364Z" fill="black"/>
							<path d="M8.07047 0.155884C3.7063 0.155884 0.155762 3.70642 0.155762 8.07059C0.155762 12.4348 3.7063 15.9853 8.07047 15.9853C12.4346 15.9853 15.9852 12.4348 15.9852 8.07059C15.9852 3.70642 12.4346 0.155884 8.07047 0.155884ZM8.07047 14.4024C4.57929 14.4024 1.7387 11.5618 1.7387 8.07059C1.7387 4.57941 4.57929 1.73882 8.07047 1.73882C11.5616 1.73882 14.4022 4.57941 14.4022 8.07059C14.4022 11.5618 11.5616 14.4024 8.07047 14.4024Z" fill="black"/>
						</svg>                                       
						Help
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-side').submit();">
						<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M13.4675 3.67353L12.2276 4.9135L14.4965 7.19118H5.55284V8.95H14.4965L12.2276 11.2189L13.4675 12.4676L17.8646 8.07059L13.4675 3.67353ZM2.03519 1.91471H9.07049V0.155884H2.03519C1.06784 0.155884 0.276367 0.947354 0.276367 1.91471V14.2265C0.276367 15.1938 1.06784 15.9853 2.03519 15.9853H9.07049V14.2265H2.03519V1.91471Z" fill="black"/>
						</svg>                                      
						Log Out
					</a>
					<form id="logout-form-side" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</li>
				<li class="nav-item toggle-switch">
					<button class="toggle-btn"></button>
					<span class="toggle-text">Dark Theme</span>
				</li>
			</ul>
		</div>
	</div>
</div>