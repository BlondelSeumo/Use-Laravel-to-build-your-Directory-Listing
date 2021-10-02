@if($list_item)
	<div class="counter-to-number">
		<div class="container">
			<div class="main-title text-center">
				@if(!empty($title))
				<div class="title  ">
					{{$title}}
				</div>
				@endif
				@if(!empty($sub_title))
					<div class="sub-title ">
						{{$sub_title}}
					</div>
				@endif
			</div>
			<div class="row m50">
				@foreach($list_item as $k=>$item)
				<div class="col-md-6 col-lg-3">
					<div class="funfact_one style2 text-center">
						<div class="details">
							@if(!empty($item['suffix']))
								<ul>
									<li class="list-inline-item"><div class="timer">{{$item['number']??0}}</div></li>
									<li class="list-inline-item"><span>{{$item['suffix']}}</span></li>
								</ul>
							@else
								<div class="timer">{{$item['number']??0}}</div>
							
							@endif
							<h4 class="ff_title">{{$item['title']}}</h4>
						</div>
					</div>
				</div>
				@endforeach
				
			</div>
		</div>
	</div>
@endif
