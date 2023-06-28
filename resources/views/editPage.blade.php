@extends('master')

@section('content')
    <div class="container">
        <form action="{{route('posts#updateData',$data['id'])}}" method="POST" enctype="multipart/form-data">
            @csrf

        <div class="row">

            <div class="col-5">
                <div class="my-4">
                    <label class="mb-2 fs-5" for="">Post Title</label>
                    <input type="text" class="form-control @error('postTitle') is-invalid @enderror" name="postTitle" id="" value="{{$data['title']}}">
                    @error('postTitle')
                        <small class="invalid-feedback">{{$message}}</small>
                    @enderror
                </div>

                <div class=" mb-4">
                    <label class="mb-2 fs-5" for="">Post Price</label>
                    <input type="number" class="form-control @error('postPrice') is-invalid @enderror" name="postPrice" id="" value="{{$data['price']}}">
                    @error('postPrice')
                        <small class="invalid-feedback">{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="mb-2 fs-5" for="">Post Rating</label>
                    <input type="number" class="form-control @error('postRating') is-invalid @enderror" name="postRating" id="" value="{{$data['rating']}}">
                    @error('postRating')
                        <small class="invalid-feedback">{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="mb-2 fs-5" for="">City</label>
                    <input type="text" class="form-control @error('postCity') is-invalid @enderror" name="postCity" id=""value="{{$data['city']}}">
                    @error('postCity')
                        <small class="invalid-feedback">{{$message}}</small>
                    @enderror
                </div>



            </div>

            <div class="col d-flex flex-column justify-content-center align-items-center px-5">
                <div class="row ">
                    @if ($data['image']==null)
                        <img src="{{asset('storage/image_not_found.png')}}" class="img-thumbnail" alt="">
                    @else
                        <img src="{{asset('storage/'.$data['image'])}}" alt="" class="img-thumbnail">
                    @endif
                </div>
                <div class="row mt-5">
                    <div class="offset-1 col-10 mt-auto">
                        <div class="input-group">
                            <input type="file" name="postImage" id="" class="form-control">
                        </div>
                    </div>
                </div>
            </div>


        </div>


            <div class="mb-4">
                <label class="mb-2 fs-5" for="">Post Description</label>
                <textarea name="postDescription" class="form-control @error('postDescription') is-invalid @enderror" id="" cols="30" rows="5">{{$data['description']}}</textarea>
                @error('postDescription')
                    <small class="invalid-feedback">{{$message}}</small>
                @enderror
            </div>

            <div class=" d-flex justify-content-between mb-4">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-arrows-rotate me-2"></i>Update</button>
                <a href="{{route('posts#mainPage')}}" class="btn btn-secondary"><i class="fa-solid fa-angle-left me-2"></i>Back</a>
            </div>
        </form>
    </div>
@endsection
