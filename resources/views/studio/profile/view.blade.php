 @extends('layouts.app2')
@section('content')
<main id="main-content">
 <section class="banner-section--view" style="background-image: url('/assets/images/game-banner.png')">
   <div class="container-1205px">
    <div class="page-headeing-wrap">
      <h1></h1>
    </div>
   </div>
 </section>
 <section class="tags-comps-data">
  <div class="container-1205px">
    <div class="tags-white-wrapper">
     <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6">
          <div class="tags-data">
            <h4 class="h4-design">User</h4>
            <table>
            	<thead>
            		<tr>
            			<th>Profile</th>
            			<th>FirtName</th>
            			<th>LastName</th>
            			<th>Email</th>
            			<th>Website</th>
            			<th>Description</th>
            		</tr>
            	</thead>
            	<tbody>
            		<tr>
            			<td><img src="{{ @$profile->profile_pic }}" height="70" width="70"></td>
            			<td>{{ @$profile->first_name }}</td>
            			<td>{{ @$profile->last_name }}</td>
            			<td>{{ @$profile->email }}</td>
            			<td>{{ @$profile->userStudio->website }}</td>
            			<td>{{ @$profile->userStudio->description }}</td>
            		</tr>
            	</tbody>
            </table>
        
          </div>
      </div>
    
     </div>
  </div>
  </div>
 </section>

 

</main>
@endsection