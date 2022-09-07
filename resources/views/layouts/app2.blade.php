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
	
		<div class="view-wrapper">
			
			@include('layouts.includes.header_view_page', ['user'=>$user])
			
			@yield('content')
			
		</div>
		
		<!-- @include('layouts.includes.sidebar', ['user'=>$user]) -->
		
		@include('layouts.includes.scripts')
	
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<x-livewire-alert::scripts />

		@livewireScripts
		@yield('script')
		@stack('scripts')
  
	</body>
</html>