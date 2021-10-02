@extends('layouts.user')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb15">
            <div class="breadcrumb_content">
                <div class="row">
                    <div class="col-6">
                        <h2 class="breadcrumb_title">{{ __("My Listings") }}</h2>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('property.vendor.contact') }}" class="btn btn-primary add-new-property">{{ __("View Contact") }}</a>
                        <a href="{{ route('property.vendor.create') }}" class="btn btn-primary add-new-property">{{ __("Add new Property") }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            @include('admin.message')
        </div>
    </div>

    <div class="my_listings">
        <div class="row">
            <div class="col-lg-12">
                <div class="candidate_revew_select style2 mb30-991 float-left fn-smd">
                    <ul class="mb0">
                        <li class="list-inline-item">
                            <div class="candidate_revew_search_box course fn-520">
                                <form class="form-inline my-2" method="get" action="{{ route('property.vendor.index') }}">
                                    <input class="form-control mr-sm-2" type="search" name="s" placeholder="{{ __("Search Properties") }}" aria-label="Search" value="{{ Request::query("s") }}">
                                    <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-loupe"></span></button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="candidate_revew_select style2 text-right mb30-991 tal-smd">
                    <form method="get" action="{{ route('property.vendor.index') }}">
                        <ul class="mb0 mt10">
                            @php
                            $cats = \Modules\Property\Models\PropertyCategory::all();
                            @endphp
                            @if(!empty($cats))
                            <li class="list-inline-item mb30-767">
                                <select class="selectpicker show-tick" onchange="this.form.submit()" name="category_id" >
                                    <option>{{ __("Categories : All") }}</option>
                                    @foreach($cats as $cat)
                                        <option value="{{ $cat->id }}" @if(request()->input('category_id') == $cat->id) selected @endif>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </li>
                            @endif
                            <li class="list-inline-item">
                                <select class="selectpicker show-tick" onchange="this.form.submit()" name="status">
                                    <option value="">{{ __("Status : All") }}</option>
                                    <option value="publish" @if(request()->input('status') == 'publish') selected @endif>{{ __("Publish") }}</option>
                                    <option value="draft" @if(request()->input('status') == 'draft') selected @endif>{{ __("Draft") }}</option>
                                </select>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
            <div class="col-lg-12 mt25">
                <div class="listing_table table-responsive">
                    <table class="table">
                        <thead>
                        <tr class="carttable_row">
                            <th class="cartm_title">{{ __("Name") }}</th>
                            <th class="dn-lg"></th>
                            <th class="cartm_title">{{ __("City") }}</th>
                            <th class="cartm_title">{{ __("Category") }}</th>
                            <th class="cartm_title">{{ __("Status") }}</th>
                            <th class="cartm_title">{{ __("Action") }}</th>
                        </tr>
                        </thead>
                        <tbody class="table_body">
                        @if($rows->total() > 0)
                            @foreach($rows as $row)
                                <tr>
                                    @include('Property::frontend.manageProperty.loop-list')
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">
                                    {{ __("No properties found") }}
                                </td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="mbp_pagination mt10">
                    {{$rows->appends(request()->query())->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
