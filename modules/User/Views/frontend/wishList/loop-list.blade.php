@php
$service = $row->service;
@endphp
@if(!empty($service))
    @includeIf($service->item_loop,['row'=>$service])
@endif
