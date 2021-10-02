@if(!empty($row->header_style) and $row->header_style=='transparent')
	<div class="ht_left_widget  float-left">
		<ul>
			<li class="list-inline-item">
				<div class="ht_search_widget">
					<div class="header_search_widget home1">
						<div class="form-inline mailchimp_form">
							<input type="text" class="custom_search_with_menu_trigger form-control" placeholder="What are you looking for?" data-toggle="modal" data-target="#staticBackdrop">
							<button type="submit" class="btn"><span class="flaticon-loupe"></span></button>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
@else
	<div class="ht_left_widget style2 float-left">
		<ul>
			<li class="list-inline-item">
				<div class="ht_search_widget">
					<div class="header_search_widget inner_page">
						<div class="form-inline mailchimp_form">
							<input type="text" class="custom_search_with_menu_trigger form-control" placeholder="What are you looking for?" data-toggle="modal" data-target="#staticBackdrop">
							<button type="submit" class="btn"><span class="flaticon-loupe"></span></button>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
@endif
	
