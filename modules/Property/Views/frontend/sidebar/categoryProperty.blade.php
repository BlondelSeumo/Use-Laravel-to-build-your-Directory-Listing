@php
    $categories = \Modules\Property\Models\PropertyCategory::with('property')->get();
@endphp
@if(!empty($categories))
<div class="terms_condition_widget">
    <h4 class="title">{{__('Categories')}}</h4>
    <div class="widget_list">
        <ul class="list_details">
            @foreach($categories as $category)
            <li><a href="{{route('property.search', ['category_id' => $category->id])}}"><i class="fa fa-caret-right mr10"></i>{{$category->name}} <span class="float-right">{{$category->property->count()}} {{$category->property->count() < 1 ? __('property') :  __('properties')}}</span></a></li>
            @endforeach
        </ul>
    </div>
</div>
@endif