<div>
	<div class="container-for-box">
		<div class="table-layout-design">
			<div class="table-layout-header d-flex justify-content-spacebw align-items-center">
				<h5>List Of {{ @$title['title'] }}</h5>
				<a href="javascript:void(0)" class="showModal">Add New</a>
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
						@foreach($tags as $tag)
						<tr>
							<td>{{ $tag->name }}</td>
							<td>
								@if($tag->status=='1')
								<button type="button" class="badge badge-success">Active</button>
								@else
								<button type="button" class="badge badge-danger">De-active</button>
								@endif
							</td>
							<td>
								<div class="edit-view-btns">
									<a href="javascript:void(0)" wire:click="edit('{{$tag->id}}')"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M19.4546 3.41575C19.6468 3.70687 19.6147 4.10248 19.3585 4.35876L10.1661 13.5511C10.0718 13.6454 9.9542 13.7128 9.82528 13.7465L5.99685 14.7465C5.87198 14.7791 5.74327 14.7784 5.62234 14.7476C5.49378 14.7149 5.37401 14.6482 5.27699 14.5511C5.08871 14.3629 5.01438 14.0889 5.08167 13.8313L6.08167 10.0028C6.11113 9.89003 6.16643 9.77861 6.24291 9.69121L15.4694 0.46967C15.5501 0.388906 15.6474 0.32846 15.7533 0.291631C15.8318 0.264324 15.915 0.25 15.9997 0.25C16.1986 0.25 16.3894 0.329017 16.53 0.46967L19.3585 3.2981C19.3951 3.33471 19.4271 3.37416 19.4546 3.41575ZM17.7675 3.82843L15.9997 2.06066L7.48153 10.5788L6.85654 12.9716L9.24931 12.3466L17.7675 3.82843Z" fill="black"/>
										<path d="M17.641 15.1603C17.9145 12.8227 18.0014 10.4688 17.902 8.12079C17.8973 8.00837 17.9395 7.89898 18.0191 7.81942L19.0024 6.83609C19.1233 6.71519 19.3299 6.79194 19.3412 6.96254C19.5262 9.75219 19.456 12.5545 19.1309 15.3346C18.8943 17.3571 17.27 18.9421 15.258 19.167C11.7914 19.5544 8.20804 19.5544 4.74146 19.167C2.72941 18.9421 1.10507 17.3571 0.868521 15.3346C0.453983 11.7903 0.453983 8.20973 0.868521 4.66543C1.10507 2.6429 2.72941 1.05789 4.74146 0.833012C7.37121 0.539099 10.0682 0.468149 12.7303 0.620161C12.9019 0.629958 12.9801 0.837575 12.8586 0.959093L11.8661 1.95165C11.7874 2.03034 11.6795 2.07261 11.5682 2.06885C9.34181 1.99376 7.10025 2.07872 4.90807 2.32373C3.57797 2.47239 2.51248 3.522 2.35837 4.83968C1.95737 8.26821 1.95737 11.7318 2.35837 15.1603C2.51248 16.478 3.57797 17.5276 4.90807 17.6763C8.26392 18.0513 11.7355 18.0513 15.0913 17.6763C16.4214 17.5276 17.4869 16.478 17.641 15.1603Z" fill="black"/>
									</svg></a>
									<a href="javascript:void(0)" wire:click="delete('{{$tag->id}}')">
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
	
	
    <!-- Accept Modal Start Here-->
    <div wire:ignore.self class="modal fade" id="tagForm" tabindex="-1" aria-labelledby="tagForm" aria-hidden="true">
        <div class="modal-dialog modal_style">
            <button type="button" class="btn btn-default close closeModal">
                <i class="fas fa-close"></i>
			</button>
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h3>Add/Edit Contract</h3>
					</div>
                    <div class="modal-body">
                        <div>
                            <div class="form-grouph input-design mb-15">
                                <label>Name</label>
                                <input type="text" wire:model="name" class="form-control">
                                {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
							</div>
                            <div class="form-grouph input-design mb-15">
                                <label>Status</label></br>
                                <input type="radio" name="status" wire:model="status" value="1"> Active
                                <input type="radio" name="status" wire:model="status" value="0"> De-active
                                {!! $errors->first('status', '<span class="help-block">:message</span>') !!}
							</div>
							
						</div>
					</div>
                    <div class="text-center mb-3">
                        <button type="button" class="btn btn-success" wire:click="store" wire:loading.attr="disabled">
                            <i wire:loading wire:target="store" class="fas fa-spin fa-spinner"></i> Save
						</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>
    <!-- Accept Modal Close Here-->
	
    @push('scripts')
    <script>
        $(document).ready(function () {
			window.livewire.on('tagFormClose', () => {
                $('#tagForm').modal('hide');
			});
            window.livewire.on('tagFormShow', () => {
                $('#tagForm').modal('show');
			});
		});
        $(document).on('click', '.showModal', function(e) {
            $('#tagForm').modal('show');
		});
        $(document).on('click', '.closeModal', function(e) {
            $('#tagForm').modal('hide');
		});
	</script>
    @endpush
</div>