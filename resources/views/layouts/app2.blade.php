@php
$user = '';

if(auth()->check()){
	$user = auth()->user();
}

@endphp

<!doctype html>
<html lang="en">
	<head>
		@include('layouts.includes.style')
		@livewireStyles
		@yield('style')
	</head>
	<body class="light-theme">
	
		<div class="view-wrapper dashboard-wrapper">

			@include('layouts.includes.header_view_page', ['user'=>$user])
			
			@yield('content')
			


			<footer id="footer-main">
			     <div class="container-1205px">
			        <div class="copyright-text">
			            <p>All right Reserved CAMLANN © {{date('Y')}}.</p>
			        </div>
			     </div>
			</footer>

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