@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="panel">
            <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th width="150px">{{ __('Name')}}</th>
                                <th width="150px">{{ __('Name of property') }}</th>
                                <th width="150px">{{ __('Name of vendor') }}</th>
                                <th width="130px"> {{ __('Phone')}}</th>
                                <th width="100px"> {{ __('Email')}}</th>
                                <th width="500px"> {{ __('Message')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($rows->isNotEmpty())
                                @foreach($rows as $row)
                                    <tr>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->nameProperty }}</td>
                                        <td>{{ $row->nameVendor }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->message }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">{{__("No data")}}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                {{$rows->appends(request()->query())->links()}}
            </div>
        </div>
    </div>
@endsection
