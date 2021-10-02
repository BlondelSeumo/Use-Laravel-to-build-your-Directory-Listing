@extends('layouts.user')
@section('content')
    <div class="col-lg-12 mb15">
        <div class="breadcrumb_content">
            <div class="row">
                <div class="col-6">
                    <h2 class="breadcrumb_title">{{ __("My Contact") }}</h2>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('property.vendor.index') }}" class="btn btn-primary">{{ __("Back to listings") }}</a>
                    <a href="{{ route('property.vendor.create') }}" class="btn btn-primary add-new-property">{{ __("Add new Property") }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb40">
            <div class="property_table">
                <div class="table-responsive mt0">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Name of property') }}</th>
                                <th scope="col">{{ __('phone') }}</th>
                                <th scope="col">{{ __('email') }}</th>
                                <th scope="col">{{ __('Message') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($rows) > 0)
                                @foreach($rows as $row)
                                    <tr>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->nameProperty }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->message }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">{{__("No data")}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="mbp_pagination">
                    {{$rows->appends(request()->query())->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
