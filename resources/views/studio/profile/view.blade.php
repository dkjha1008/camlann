 @extends('layouts.app2')
 @section('content')
 <main id="main-content">
 	<section class="banner-section--view" style="background: var(--blue);">
 		<div class="container-1205px">
 			<div class="page-headeing-wrap">
 				<h1></h1>
 			</div>
 		</div>
 	</section>
 	<section class="tags-comps-data">

 		<div class="tags-white-wrapper">
 			<div class="tags-data container-1205px">
 				<div class="row">
 					<div class="profile-img-wrappr col-md-3">
 						<img src="{{ @$profile->profile_pic }}" height="70" width="70">
 					</div>
 					<div class="col-md-9">
 						<h2 class="user-name">{{ @$profile->first_name }} {{ @$profile->last_name }}</h2>
 						<a href="#" class="profile-links">{{ @$profile->email }}</a>
 						<a href="#" class="m-3">{{ @$profile->userStudio->website }}</a>
 					</div>
 				</div>
 			</div>
 		</div>

 		<div class="container-1205px">

 			<div class="row profile-bottom">
 				<div class="col-md-3  ">
 					<div class="left-section">
 						<div class="phone-number">
						 <i class="fa fa-phone" aria-hidden="true"></i>
						 <a class="phone1">+1234567890</a>
 						</div>
 						<div class="mail">
						 <i class="fa fa-envelope" aria-hidden="true"></i><a>{{ @$profile->email }}</a>
 						</div>
 						<a class="submit-short-btn chat-btn"><svg width="24" height="19" viewBox="0 0 24 19" fill="#fff" xmlns="http://www.w3.org/2000/svg">
 								<path d="M0.25 7.21447C0.25 3.24636 4.05525 0.25 8.45161 0.25C11.9502 0.25 15.0521 2.13375 16.1918 4.89933C16.243 5.02337 16.154 5.15792 16.0203 5.16898C15.648 5.19978 15.2782 5.25265 14.9138 5.32662C14.8207 5.34551 14.7269 5.29807 14.6853 5.2127C13.7216 3.23442 11.3546 1.75 8.45161 1.75C4.61715 1.75 1.75 4.31827 1.75 7.21447C1.75 8.77913 2.56392 10.224 3.9325 11.2455C4.12216 11.3871 4.23387 11.6099 4.23387 11.8465V12.7873L5.78151 12.357C5.9163 12.3196 6.05888 12.3205 6.19314 12.3598C6.80385 12.5387 7.45668 12.6474 8.13752 12.673C8.24556 12.6771 8.33258 12.764 8.33726 12.8721C8.35581 13.3 8.41311 13.7133 8.50538 14.1107C8.51344 14.1454 8.48728 14.1788 8.45161 14.1789C7.59258 14.1789 6.76262 14.0669 5.98177 13.8582L3.68475 14.4968C3.45891 14.5596 3.21671 14.5132 3.03009 14.3713C2.84346 14.2295 2.73387 14.0086 2.73387 13.7742V12.211C1.22401 10.9648 0.25 9.20157 0.25 7.21447Z"></path>
 								<path d="M6.85486 5.25806C6.85486 5.84597 6.37826 6.32257 5.79035 6.32257C5.20243 6.32257 4.72583 5.84597 4.72583 5.25806C4.72583 4.67014 5.20243 4.19354 5.79035 4.19354C6.37826 4.19354 6.85486 4.67014 6.85486 5.25806Z"></path>
 								<path d="M11.1129 6.32257C11.7008 6.32257 12.1774 5.84597 12.1774 5.25806C12.1774 4.67014 11.7008 4.19354 11.1129 4.19354C10.525 4.19354 10.0484 4.67014 10.0484 5.25806C10.0484 5.84597 10.525 6.32257 11.1129 6.32257Z"></path>
 								<path d="M14.5459 12.1774C15.0604 12.1774 15.4774 11.7604 15.4774 11.246C15.4774 10.7315 15.0604 10.3145 14.5459 10.3145C14.0315 10.3145 13.6145 10.7315 13.6145 11.246C13.6145 11.7604 14.0315 12.1774 14.5459 12.1774Z"></path>
 								<path d="M20.0016 11.246C20.0016 11.7604 19.5846 12.1774 19.0702 12.1774C18.5557 12.1774 18.1387 11.7604 18.1387 11.246C18.1387 10.7315 18.5557 10.3145 19.0702 10.3145C19.5846 10.3145 20.0016 10.7315 20.0016 11.246Z"></path>
 								<path fill-rule="evenodd" clip-rule="evenodd" d="M16.7856 6.85853C20.496 6.85853 23.7452 9.39117 23.7452 12.7873C23.7452 14.4662 22.9366 15.7319 21.6801 16.7881V18.0322C21.6801 18.2666 21.5705 18.4876 21.3839 18.6294C21.1972 18.7712 20.955 18.8176 20.7292 18.7548L18.8477 18.2318C18.1961 18.4029 17.5049 18.4945 16.7903 18.4945C13.0798 18.4945 9.83063 15.9619 9.83063 12.5658C9.83063 9.16972 13.0751 6.85853 16.7856 6.85853ZM22.25 12.5658C22.25 10.2416 19.9389 8.13708 16.7903 8.13708C13.6417 8.13708 11.3306 10.2416 11.3306 12.5658C11.3306 14.89 13.6417 16.9945 16.7903 16.9945C17.4405 16.9945 18.062 16.9021 18.6372 16.7337C18.7715 16.6943 18.9141 16.6934 19.0489 16.7308L20.1801 17.0453V16.4259C20.1801 16.1892 20.2918 15.9664 20.4815 15.8248C21.596 14.9929 22.25 13.8237 22.25 12.5658Z"></path>
 							</svg>Chat</a>
 						<div class="rating">
 							<span>0.0<span>
 									<span class="fa fa-star checked"></span>
 									<span class="fa fa-star checked"></span>
 									<span class="fa fa-star checked"></span>
 									<span class="fa fa-star"></span>
 									<span class="fa fa-star"></span>
 						</div>
 					</div>
 				</div>

 				<div class="col-md-3 bottom-com">
 					<div class="center-section ">
 						<h4>Description<h4>
 								<p>{{ @$profile->userStudio->description }}
 									Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
 					</div>
 				</div>
 				<div class="col-md-6">
 					<div class="right-section "><iframe width="560" height="315" src="https://www.youtube.com/embed/aqz-KE-bpKQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
 				</div>
 			</div>
 	</section>



 </main>
 @endsection