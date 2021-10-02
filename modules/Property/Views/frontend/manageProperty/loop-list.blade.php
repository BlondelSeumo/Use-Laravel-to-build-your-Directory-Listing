
    <th scope="row">
        <ul class="cart_list">
            @if($row->image_url)
                <li class="list-inline-item pr10"><a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl()}}" >
                        <img src="{{$row->image_url}}" alt="{{$row->title}}"></a>
                </li>
            @endif
            <li class="list-inline-item"><a class="cart_title" href="{{$row->getDetailUrl()}}" @if(!empty($blank)) target="_blank" @endif>{{$row->title}}</a></li>
        </ul>
    </th>
    <td class="dn-lg"></td>
    <td>
        @if(!empty($row->location->name))
            {{$row->location->name}}
        @endif
    </td>
    <td>
        @if(!empty($row->categories) && count($row->categories) > 0)
            @foreach($row->categories as $key =>  $category)
                {{ $category->name }}<br>
            @endforeach
        @endif
    </td>
    <td class="{{ $row->status == 'publish' ? 'text-success' : ($row->status == 'draft' ? 'color-danger' : '') }}">
        {{ $row->status }}
    </td>
    <td class="editing_list">
        <ul>
            @if(Auth::user()->hasPermissionTo('property_update'))
                <li class="list-inline-item">
                    <a href="{{ route("property.vendor.edit",[$row->id]) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><span class="flaticon-edit"></span></a>
                </li>
            @endif
            <li class="list-inline-item">
                <a href="{{$row->getDetailUrl()}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><span class="flaticon-view"></span></a>
            </li>
            @if(Auth::user()->hasPermissionTo('property_delete'))
                <li class="list-inline-item">
                    <a href="{{ route("property.vendor.delete",[$row->id]) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><span class="flaticon-delete"></span></a>
                </li>
            @endif
        </ul>
    </td>
