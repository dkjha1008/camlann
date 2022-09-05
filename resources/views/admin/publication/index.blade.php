@extends('layouts.app')
@section('content')
<div class="container-for-box">
	<div class="table-layout-design">
        <div class="table-layout-header d-flex justify-content-spacebw align-items-center">
			<h5>List Of Publications</h5>
			<a href="{{ route('admin.publication.create') }}">Add New</a>
		</div>
        <div class="table-design table-responsive">
			<table>
				<thead>
					<tr>
						<th>Name</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($publications as $publication)
					<tr>
						<td>
							<div class="game-title-img d-flex align-items-center">
								<img src="{{ $publication->profile_pic }}">
								<span class="game-title">{{ $publication->publication }}</span>
							</div>
						</td>
						<td>
							@if($publication->status=='1')
							<button type="button" class="badge badge-success">Active</button>
							@else
							<button type="button" class="badge badge-danger">De-active</button>
							@endif
						</td>
						<td>
							<div class="edit-view-btns">
								<a href="{{ route('admin.publication.edit', $publication->id) }}">
									<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M19.4546 3.41575C19.6468 3.70687 19.6147 4.10248 19.3585 4.35876L10.1661 13.5511C10.0718 13.6454 9.9542 13.7128 9.82528 13.7465L5.99685 14.7465C5.87198 14.7791 5.74327 14.7784 5.62234 14.7476C5.49378 14.7149 5.37401 14.6482 5.27699 14.5511C5.08871 14.3629 5.01438 14.0889 5.08167 13.8313L6.08167 10.0028C6.11113 9.89003 6.16643 9.77861 6.24291 9.69121L15.4694 0.46967C15.5501 0.388906 15.6474 0.32846 15.7533 0.291631C15.8318 0.264324 15.915 0.25 15.9997 0.25C16.1986 0.25 16.3894 0.329017 16.53 0.46967L19.3585 3.2981C19.3951 3.33471 19.4271 3.37416 19.4546 3.41575ZM17.7675 3.82843L15.9997 2.06066L7.48153 10.5788L6.85654 12.9716L9.24931 12.3466L17.7675 3.82843Z" fill="black"/>
										<path d="M17.641 15.1603C17.9145 12.8227 18.0014 10.4688 17.902 8.12079C17.8973 8.00837 17.9395 7.89898 18.0191 7.81942L19.0024 6.83609C19.1233 6.71519 19.3299 6.79194 19.3412 6.96254C19.5262 9.75219 19.456 12.5545 19.1309 15.3346C18.8943 17.3571 17.27 18.9421 15.258 19.167C11.7914 19.5544 8.20804 19.5544 4.74146 19.167C2.72941 18.9421 1.10507 17.3571 0.868521 15.3346C0.453983 11.7903 0.453983 8.20973 0.868521 4.66543C1.10507 2.6429 2.72941 1.05789 4.74146 0.833012C7.37121 0.539099 10.0682 0.468149 12.7303 0.620161C12.9019 0.629958 12.9801 0.837575 12.8586 0.959093L11.8661 1.95165C11.7874 2.03034 11.6795 2.07261 11.5682 2.06885C9.34181 1.99376 7.10025 2.07872 4.90807 2.32373C3.57797 2.47239 2.51248 3.522 2.35837 4.83968C1.95737 8.26821 1.95737 11.7318 2.35837 15.1603C2.51248 16.478 3.57797 17.5276 4.90807 17.6763C8.26392 18.0513 11.7355 18.0513 15.0913 17.6763C16.4214 17.5276 17.4869 16.478 17.641 15.1603Z" fill="black"/>
									</svg>
								</a>
								<a href="game-profile-view.html">
									Delete
								</a>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection