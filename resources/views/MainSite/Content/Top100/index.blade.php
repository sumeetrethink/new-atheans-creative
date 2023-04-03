@extends('MainSite.Content.index')
@section('content')

<section class="top-4-videos">
    <div class="container">
        <h3>
            TOP 100 Videos based on global votings
        </h3>
        <div class="container">
            <div class="row">
                @foreach ($videos as $key => $item)
                    @include('MainSite.Common.videoCard', ['item' => $item])
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection