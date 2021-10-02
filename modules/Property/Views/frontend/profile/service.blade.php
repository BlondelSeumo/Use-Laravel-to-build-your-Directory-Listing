<?php
    if (!$user->hasPermissionTo('property_create')) return;
?>
@if($services->total())
	<div class="bc-profile-list-services">
		<div class="col-lg-12">
			<div class="feature_property_slider">
				@foreach($services as $service)
					@includeIf($service->item_loop_list,['row'=>$service])
				@endforeach
			</div>
		</div>
		<div class="container">
			@if(!empty($view_all))
				<div class="review-pag-wrapper">
					<div class="bc-pagination">
						{{$services->appends(request()->query())->links()}}
					</div>
					<div class="review-pag-text text-center">
						{{ __("Showing :from - :to of :total total",["from"=>$services->firstItem(),"to"=>$services->lastItem(),"total"=>$services->total()]) }}
					</div>
				</div>
			@else
				<div class="text-center mt30"><a class="btn btn-sm btn-primary" href="{{route('user.profile.services',['id'=>$user->id,'type'=>'property'])}}">{{__('View all (:total)',['total'=>$services->total()])}}</a></div>
			@endif
		</div>
	</div>
@endif
