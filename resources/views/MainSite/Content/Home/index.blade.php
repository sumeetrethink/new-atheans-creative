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
                Top 4 Videos
            </h3>
            <div class="container">
                <div class="row">
                    @for($i = 0; $i < min($videos->count(), 4); $i++)
                        @include('MainSite.Common.videoCard', ['item' => $videos[$i]])
                    @endfor
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
            @for($i = 5; $i < $videos->count(); $i++)
                @include('MainSite.Common.videoCard', ['item' => $videos[$i]])
            @endfor
        </div>
    </section>

                        
@endsection
