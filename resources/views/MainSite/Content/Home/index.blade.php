@extends('MainSite.Content.index')
@section('content')
    <style>
        .top-4-videos {
            background: #dbf7e2
        }
    </style>

    <section class="top-4-videos">
        <div class="container">
            <h3>
                TOP 4 Videos
            </h3>
            <div class="container">

                <div class="row">
                    @foreach ($topFour as $key => $item)
                    @include('MainSite.Common.videoCard', ['item' => $item])
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
