@extends('master')

@section('content')

    <div class="container py-3">

        <div class="row">

            <div class="col-5">

                @if(session('createSuccess'))
                    <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                        <strong>{{session('createSuccess')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('deleteSuccess'))
                    <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                        <strong>{{session('deleteSuccess')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('updateSuccess'))
                    <div class="alert alert-warning alert-dismissible fade show mb-2" role="alert">
                        <strong>{{session('updateSuccess')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="">
                    <form action="{{route('posts#mainPage')}}" method="GET">
                        @csrf
                        <div class="input-group my-4">
                            <select name="filterOption" id="" class="form-select">
                                <option value="filter" selected>Filter By</option>
                                <option value="city">City</option>
                                <option value="price">Price</option>
                                <option value="rating">Rating</option>
                                <option value="title">Title</option>
                            </select>
                            <input type="text" name="searchKey" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="button-addon2">
                            <button class="btn btn-dark" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass text-white"></i></button>
                        </div>
                    </form>
                </div>

                <form action="{{route('posts#inputData')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <hr>

                    <div class="input-group my-3">
                        <input type="text" class="form-control @error('postTitle') is-invalid @enderror" name="postTitle" id="" placeholder="Enter Post Title...">
                        @error('postTitle')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="number" class="form-control @error('postPrice') is-invalid @enderror" name="postPrice" id="" placeholder="Enter Post Price...">
                        @error('postPrice')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="number" class="form-control @error('postRating') is-invalid @enderror" name="postRating" id="" placeholder="Enter Post Rating...">
                        @error('postRating')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('postCity') is-invalid @enderror" name="postCity" id="" placeholder="Enter City...">
                        @error('postCity')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <textarea name="postDescription" class="form-control @error('postDescription') is-invalid @enderror" id="" cols="30" rows="5" placeholder="Enter Post Description"></textarea>
                        @error('postDescription')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="file" name="postImage" class="form-control @error('postImage') is-invalid @enderror" id="">
                        @error('postImage')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="btn-container d-flex mb-4 justify-content-between">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket me-2"></i>Create</button>
                        <a href="{{route('posts#mainPage')}}" class="btn btn-success text-white"><i class="fa-solid fa-rotate-left me-2 text-white"></i>Refresh</a>
                    </div>
                </form>
            </div>

            <div class="col-7">

                <div class="row mb-1">
                    <div class="col-5 offset-7">
                    </div>
                </div>

                <div class="data-container">

                    @foreach ($posts as $item)
                        <div class="row mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{$item->title}}</h5>
                                    <p class="card-text text-muted">{{Str::words($item->description,15,'...')}}</p>
                                    <div class=" d-flex justify-content-between">

                                        <div class="d-flex align-items-center">
                                            <span class="mx-2"><i class="fa-solid fa-money-bill me-1" style="color: green"></i>{{$item->price}}</span>
                                            <span class="mx-2"><i class="fa-solid fa-location-arrow me-1" style="color: red"></i>{{$item->city}}</span>
                                            <span class="mx-2"><i class="fa-solid fa-star me-1" style="color: gold"></i>{{$item->rating}}</span>
                                        </div>
                                        <div class="btn-group">
                                            <a href="{{route('posts#showData',$item->id)}}" class="mx-1 btn btn-info"><i class="fa-solid fa-eye text-white"></i></a>
                                            <a href="{{route('posts#editPage',$item->id)}}" class="mx-1 btn btn-warning"><i class="fa-solid fa-pen text-white"></i></a>
                                            <a href="{{route('posts#deleteData',$item->id)}}" class="mx-1 btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{$posts->appends(request()->query())->links()}}
            </div>

        </div>

    </div>

@endsection
