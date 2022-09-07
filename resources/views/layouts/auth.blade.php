<!doctype html>
<html lang="en">
	<head>
		@include('layouts.includes.style')
	</head>
	<body class="light-theme">
	
		<main id="main-content">
		@yield('content')
		</main>
		
		@include('layouts.includes.scripts')
		
		@yield('script')
	</body>
</html>