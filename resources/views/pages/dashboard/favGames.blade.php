<div class="container-for-box mb-15">
	<div class="table-layout-design">
		<div class="table-layout-header d-flex justify-content-spacebw align-items-center">
			<h5>Favourite Games</h5>
		</div>
		<div class="table-design table-responsive">
			<table>
				<thead>
					<tr>
						<th>Name</th>
						<th>View</th>
					</tr>
				</thead>
				<tbody>
					@foreach($favGames as $fav)
					<tr>
						<td>
							<div class="game-title-img d-flex align-items-center">
								@if(@$fav->game->full_image)
									<img src="{{ $fav->game->full_image }}">
								@endif
								<span class="game-title">{{ $fav->game->title }}</span>
							</div>
						</td>
						<td>
							<div class="edit-view-btns">
								<a href="{{ route('game.view', $fav->game->id) }}">
									<svg width="23" height="16" viewBox="0 0 23 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M7 7.875C7 5.45875 8.95875 3.5 11.375 3.5C13.7912 3.5 15.75 5.45875 15.75 7.875C15.75 10.2912 13.7912 12.25 11.375 12.25C8.95875 12.25 7 10.2912 7 7.875ZM11.375 5.25C9.92525 5.25 8.75 6.42525 8.75 7.875C8.75 9.32475 9.92525 10.5 11.375 10.5C12.8247 10.5 14 9.32475 14 7.875C14 6.42525 12.8247 5.25 11.375 5.25Z" fill="black"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M2.419 6.29575C1.93003 7.00033 1.75 7.55148 1.75 7.875C1.75 8.19852 1.93003 8.74967 2.419 9.45425C2.89167 10.1354 3.59424 10.8737 4.48312 11.5559C6.26475 12.9233 8.70736 14 11.375 14C14.0426 14 16.4853 12.9233 18.2669 11.5559C19.1558 10.8737 19.8583 10.1354 20.331 9.45425C20.82 8.74967 21 8.19852 21 7.875C21 7.55148 20.82 7.00033 20.331 6.29575C19.8583 5.61465 19.1558 4.87634 18.2669 4.19413C16.4853 2.82674 14.0426 1.75 11.375 1.75C8.70736 1.75 6.26475 2.82674 4.48312 4.19413C3.59424 4.87634 2.89167 5.61465 2.419 6.29575ZM3.41764 2.80587C5.43626 1.25659 8.24365 0 11.375 0C14.5064 0 17.3137 1.25659 19.3324 2.80587C20.3436 3.582 21.1787 4.44785 21.7687 5.298C22.3424 6.12467 22.75 7.03185 22.75 7.875C22.75 8.71815 22.3424 9.62533 21.7687 10.452C21.1787 11.3021 20.3436 12.168 19.3324 12.9441C17.3137 14.4934 14.5064 15.75 11.375 15.75C8.24365 15.75 5.43626 14.4934 3.41764 12.9441C2.40639 12.168 1.57128 11.3021 0.981287 10.452C0.407599 9.62533 0 8.71815 0 7.875C0 7.03185 0.407599 6.12467 0.981287 5.298C1.57128 4.44785 2.40639 3.582 3.41764 2.80587Z" fill="black"/>
									</svg>
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