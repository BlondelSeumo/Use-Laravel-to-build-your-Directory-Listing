@php
	/**
	* @var $row \Modules\Location\Models\Location
	* @var $to_location_detail bool
	* @var $service_type string
	*/
	$translation = $row->translateOrOrigin(app()->getLocale());
	$link_location = false;
	if(is_string($service_type)){
		$link_location = $row->getLinkForPageSearch($service_type);
	}
	if(is_array($service_type) and count($service_type) == 1){
		$link_location = $row->getLinkForPageSearch($service_type[0] ?? "");
	}
	if($to_location_detail){
		$link_location = $row->getDetailUrl();
	}
@endphp
<div class="properti_city">
	<div class="thumb"><img class="img-fluid w100" src="{{$row->getImageUrl()}}" alt="{{$translation->name}}"></div>
	<div class="overlay">
        @if(!empty($link_location)) <a href="{{$link_location}}" class="detail-url">  @endif
		<div class="details">
			<h4>{{$translation->name}}</h4>
			<p>
				@foreach($service_type as $type)
					<?php

	                    $stringCount = $type.'_count';
	                    $count = 0;
						if(Arr::exists(get_bookable_services(),$type)){
                            $count = !empty($row->$stringCount)?$row->$stringCount:0;
                        }
					;?>
					@if(!empty($count))
						@if(!empty($link_location))
							<a class="text-white text-capitalize" href="{{ $row->getLinkForPageSearch( $type ) }}" target="_blank">
								{{$count}} {{Str::pluralStudly($type, $count)}}
							</a>
						@else
							<span class="text-capitalize">{{$count}} {{Str::pluralStudly($type, $count)}}</span>
						@endif
					@endif
				@endforeach</p>
		</div>
        @if(!empty($link_location)) </a>  @endif
	</div>
</div>

