@extends('layouts.app')

@section('content')
    <script src="{{asset('admin/assets/js/swiper-element-bundle.js')}}"></script>
    <div class="container">
    <div class="justify-content-center custom-container">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
{{--                        <div>--}}
{{--                            @if($images !== null)--}}
{{--                            <swiper-container class="slider-wrap" autoplay="false" effect="coverflow" spaceBetween="0"  speed="1000" loop="true" slides-per-view="2">--}}
{{--                                <swiper-slide>--}}
{{--                                    @foreach($images as $image)--}}
{{--                                        <img class="slide" src="{{asset('storage/images') . '/' . $image->photo_path}}">--}}
{{--                                    @endforeach--}}
{{--                                </swiper-slide>--}}
{{--                            </swiper-container>--}}
{{--                            @endif--}}
{{--                        </div>--}}
    </div>
</div>
@endsection

