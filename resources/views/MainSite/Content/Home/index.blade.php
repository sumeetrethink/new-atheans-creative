@extends('MainSite.Content.index')
@section('content')
    <style>
        .top-4-videos {
            background: #dbf7e2
        }
    </style>
    @include('MainSite.Common.top4Videos');
@endsection
