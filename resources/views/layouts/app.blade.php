@php
$user = auth()->user();
@endphp

<!doctype html>
<html lang="en">
	<head>
		@include('layouts.includes.style')
		@livewireStyles
		@yield('style')
	</head>
	<body class="light-theme">
	
		<div class="dashboard-wrapper">
			
			@include('layouts.includes.header', ['user'=>$user])
			
			<main id="main-content">
				<div class="light-bg-container">
				
					<div class="back-div d-flex align-items-center">
					{{--
					<a href="#"><svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.44666 16C7.35892 16.0005 7.27194 15.9837 7.19072 15.9505C7.10949 15.9174 7.03561 15.8685 6.97332 15.8067L1.52666 10.36C1.21623 10.0504 0.969948 9.68256 0.801905 9.27759C0.633862 8.87262 0.547363 8.43848 0.547363 8.00003C0.547363 7.56158 0.633862 7.12744 0.801905 6.72248C0.969948 6.31751 1.21623 5.94967 1.52666 5.64004L6.97332 0.193375C7.03548 0.131216 7.10927 0.0819092 7.19049 0.048269C7.2717 0.0146288 7.35875 -0.00268555 7.44666 -0.00268555C7.53456 -0.00268555 7.62161 0.0146288 7.70282 0.048269C7.78404 0.0819092 7.85783 0.131216 7.91999 0.193375C7.98215 0.255534 8.03146 0.329328 8.0651 0.410542C8.09874 0.491757 8.11605 0.578802 8.11605 0.666708C8.11605 0.754614 8.09874 0.841659 8.0651 0.922874C8.03146 1.00409 7.98215 1.07788 7.91999 1.14004L2.47332 6.5867C2.09879 6.9617 1.88842 7.47003 1.88842 8.00003C1.88842 8.53003 2.09879 9.03836 2.47332 9.41336L7.91999 14.86C7.98247 14.922 8.03207 14.9957 8.06592 15.077C8.09976 15.1582 8.11719 15.2453 8.11719 15.3334C8.11719 15.4214 8.09976 15.5085 8.06592 15.5897C8.03207 15.671 7.98247 15.7447 7.91999 15.8067C7.85769 15.8685 7.78382 15.9174 7.70259 15.9505C7.62137 15.9837 7.53439 16.0005 7.44666 16Z" fill="#374957"/>
					</svg>
					</a>
					--}}
					<span class="page-text-header">{{ @$title['title'] }}</span>
				</div>

				@yield('content')
				
				</div>
			</main>
			
		</div>
		
		@include('layouts.includes.sidebar', ['user'=>$user])
		
		@include('layouts.includes.scripts')
	
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<x-livewire-alert::scripts />

		@livewireScripts
		@yield('script')
		@stack('scripts')
  
	</body>
</html>