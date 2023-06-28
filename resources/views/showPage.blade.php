@extends('master')

@section('content')

    <div class="container my-5">
        <div class="row p-1">
            <div class="col-8 offset-2 p-1">

                <div class="header-container">
                    <h1 class="text-start">{{$data['title']}}</h1>
                </div>

                <hr>

                <div class="row">
                    <div class="col-4">
                        @if ($data['image']==null)
                            <img src="{{asset('storage/image_not_found.png')}}" alt="something" class="img-thumbnail">
                        @else
                            <img src="{{asset('storage/'.$data['image'])}}" alt="" class="img-thumbnail">
                        @endif
                    </div>
                    <div class="col-8 d-flex flex-column ">

                        <div class="">
                            <p class="">
                                {{$data['description']}}
                            </p>
                        </div>

                        <div class=" mt-auto">
                            <div class="btn border border rounded">
                                <i class="fa-solid fa-money-bill me-1" style="color: green"></i>{{$data['price']}}
                            </div>
                            <div class="btn border border rounded">
                                <i class="fa-solid fa-location-arrow me-1" style="color: red"></i>{{$data['city']}}
                            </div>
                            <div class="btn border border rounded">
                                <i class="fa-solid fa-star me-1" style="color: gold"></i>{{$data['rating']}}
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <a href="{{route('posts#mainPage')}}" class="float-start btn btn-secondary"><i class="fa-solid fa-angle-left me-1"></i>Back</a>

                <div class="row">
                </div>

            </div>
        </div>
    </div>

@endsection
