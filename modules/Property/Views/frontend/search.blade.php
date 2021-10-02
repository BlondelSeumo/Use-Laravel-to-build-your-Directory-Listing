@extends('layouts.app')
@section('head')

@endsection
@section('content')
    @include($view)
@endsection

@section('footer')
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script>

    </script>
@endsection
