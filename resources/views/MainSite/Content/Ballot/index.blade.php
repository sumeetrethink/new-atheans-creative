@extends('MainSite.Content.index')
@section('content')
    <section class="top-4-videos">
        <div class="container">
            <h3>
                Your liked videos
            </h3>
            <div class="container">
                <div class="row">
                    @if ($selected_for_votes)
                        @include('MainSite.Common.videoCard', ['item' => $selected_for_votes])
                    @endif
                </div>
            </div>
            @if (!$selected_for_votes)
                <h5 class="text-center">You dont have any voted videos</h5>
            @endif
        </div>
    </section>
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
                            
                        <input type="hidden" name="video" value="{{$encryptedId}}">
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

@endsection
