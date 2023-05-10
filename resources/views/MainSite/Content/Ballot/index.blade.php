@extends('MainSite.Content.index')
@section('content')
    @if ($selected_for_votes)
        <section class="top-4-videos">
            <div class="container">
                <h3>
                    Your video for vote
                </h3>
                <div class="container">
                    <div class="row">

                        @include('MainSite.Common.videoCard', ['item' => $selected_for_votes])

                    </div>
                </div>

            </div>
        </section>
    @endif
    @if ($selected_for_votes)
        <div style="background: #fff;padding:20px 0px">
            <div class="container" style="margin-bottom: 20px">
                <h2 style="font-weight: bolder">Polling Questions</h2>
                <div class="box-allvideo">
                    <form method="POST" action="{{ url('/ballot/questions') }}">
                        @csrf
                        @php
                            $encryptedId = Crypt::encryptString($selected_for_votes->id);
                        @endphp

                        <input type="hidden" name="video" value="{{ $encryptedId }}">
                        @foreach ($polling_questions as $key => $item)
                            <p style="padding-top: 15px">{{ $key + 1 }}) {{ $item->title }}</p>
                            <div style="display: flex;margin-left:20px">
                                <label style="padding-right:15px">
                                    <input type="radio" name="{{ $item->id }}" value="Strongy Agree">
                                    Strongly Agree
                                </label>

                                <label style="padding-right:15px">
                                    <input type="radio" name="{{ $item->id }}" value="Agree">
                                    Agree
                                </label>
                                <label style="padding-right:15px">
                                    <input type="radio" name="{{ $item->id }}" value="Neutral">
                                    Neutral
                                </label>

                                <label style="padding-right:15px">
                                    <input type="radio" name="{{ $item->id }}" value="Disagree">
                                    Disagree
                                </label>
                                <label style="padding-right:15px">
                                    <input type="radio" name="{{ $item->id }}" value="Strongly Disagree">
                                    Strongly Disagree
                                </label>


                            </div>
                        @endforeach


                        <button type="submit"
                            style="border: 1px solid black;padding:5px 10px;margin-top:10px;border-radius:5px">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
    {{-- liked videos --}}

    <section class="container mt-4 mb-4 pb-4">
        <h3>
            Your liked videos
        </h3>
        <div class="row mt-4 pt-4 mb-4">
            @forelse  ($topLikedVideos as $item)
                @include('MainSite.Common.videoCard', ['item' => $item])
            @empty
                <p class="text-center">No videos found.</p>
            @endforelse
        </div>
    </section>

    {{-- voted videos --}}

    <section class="container mt-4">
        <h3 class="mt-4">
            Your voted videos
        </h3>
        <div class="row  mt-4 pt-4 mb-4">
            @forelse ($votedVidoes as $item)
                @include('MainSite.Common.videoCard', ['item' => $item])
            @empty
                <p class="text-center">No videos found.</p>
            @endforelse
        </div>
    </section>
    {{-- history section --}}
    <section class="container mt-4 mb-4 pb-4">
        <h3 class="mt-4">
            Your History
        </h3>
        <div class="row mt-4 pt-4 mb-4">
            @forelse ($history as $item)
                @include('MainSite.Common.videoCard', ['item' => $item])
            @empty
                <p class="text-center">No videos found.</p>
            @endforelse
        </div>
    </section>

@endsection
