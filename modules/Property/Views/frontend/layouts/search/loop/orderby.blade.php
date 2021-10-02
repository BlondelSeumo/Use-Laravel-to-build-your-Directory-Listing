<form class="bc_form_search"  method="GET">
    @if(!empty(request()->query('_layout')))
        <input type="hidden" name="_layout" value="{{request()->query('_layout')}}">
    @endif
    <ul class="mb0">
        <li class="list-inline-item dropdown text-left"><span class="stts">{{__("Sort by:")}} </span>
            <select onchange="this.form.submit()" name="orderby" class="selectpicker show-tick">
                <option value="new" @if(Request::input('orderby') == 'new') selected @endif>{{__('Default')}}</option>
                <option value="old" @if(Request::input('orderby') == 'old') selected @endif>{{__('Oldest')}}</option>
                <option value="name_high" @if(Request::input('orderby') == 'name_high') selected @endif>{{__('Name [a->z]')}}</option>
                <option value="name_low" @if(Request::input('orderby') == 'name_low') selected @endif>{{__('Name [z->a]')}}</option>
                <option value="featured" @if(Request::input('orderby') == 'featured') selected @endif>{{__('Featured')}}</option>
            </select>
            @if($layout = Request::input('layout'))
                <input type="hidden" name="layout" value="{{ $layout }}">
            @endif
        </li>
        <li class="list-inline-item gird" id="btn-gird"><a class="@if(Request::input('layout') != 'list') text-thm @endif" href="{{ request()->fullUrlWithQuery(['layout' => 'grid']) }}"><span class="fa fa-th-large"></span></a></li>
        <li class="list-inline-item list" id="btn-list"><a class="@if(Request::input('layout') == 'list') text-thm @endif" href="{{ request()->fullUrlWithQuery(['layout' => 'list']) }}"><span class="fa fa-th-list"></span></a></li>
    </ul>
</form>
