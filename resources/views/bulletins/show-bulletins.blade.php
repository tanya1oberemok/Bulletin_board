@extends('layouts.app')

@section('content')
    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="card-header">
                <div class="rating-area">
                    <input class="star" type="radio" id="star-5" name="star" value="5" >
                    <label for="star-5" title="Оценка «5»" @if ($bulletin->averageRating() >= 5) style="color: gold;  text-shadow: 1px 1px goldenrod; pointer-events:none;" @endif ></label>
                    <input class="star" type="radio" id="star-4" name="star" value="4" >
                    <label for="star-4" title="Оценка «4»" @if ($bulletin->averageRating() >= 4) style="color: gold;  text-shadow: 1px 1px goldenrod; pointer-events:none;" @endif></label>
                    <input class="star" type="radio" id="star-3" name="star" value="3">
                    <label for="star-3" title="Оценка «3»" @if ($bulletin->averageRating() >= 3) style="color: gold;  text-shadow: 1px 1px goldenrod; pointer-events:none;" @endif></label>
                    <input class="star" type="radio" id="star-2" name="star" value="2">
                    <label for="star-2" title="Оценка «2»" @if ($bulletin->averageRating() >= 2) style="color: gold;  text-shadow: 1px 1px goldenrod; pointer-events:none;" @endif></label>
                    <input class="star" type="radio" id="star-1" name="star" value="1" >
                    <label for="star-1" title="Оценка «1»" @if ($bulletin->averageRating() >= 1) style="color: gold;  text-shadow: 1px 1px goldenrod; pointer-events:none;" @endif></label>
                </div>
            </div>

            <div class="card d-flex flex-column p-5">
                <form action="{{ route('edit-bulletin', $bulletin->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body col-sm-3">
                        <img src="{{ asset('/bulletins/' . $bulletin->logo)}}" height="250px">
                    </div>

                    <div class="row g-2 my-3">
                        <div class="input-group col-md-6 flex-row justify-content-start my-3">
                            <label class="input-group-text" id="name">Title</label>
                            <input type="text" class="form-control" name="name" aria-label="first_name" value="@if($bulletin->name != null){{$bulletin->name}} @endif">
                        </div>

                        <div class="input-group col-md flex-row-6 justify-content-end my-3">
                            <label class="input-group-text" id="meta_info">Meta information</label>
                            <input type="text" class="form-control" name="meta_info" aria-label="meta_info" value="@if($bulletin->meta_info != null){{$bulletin->meta_info}} @endif">
                        </div>

                        <div class="input-group col-md-12 flex-row justify-content-center my-3">
                            <label class="input-group-text" id="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" >@if($bulletin->description != null){{$bulletin->description}} @endif</textarea>
                        </div>

                        <div class="input-group col-md-12 flex-row justify-content-center my-3">
                            <input class="form-control" id="image" name="logo" type="file">
                        </div>
                    </div>

                    <div class="d-flex justify-content-md-end my-3">
                        <button class="btn btn-outline-success" type="submit">Save</button>
                    </div>
                </form>

            </div>

            <div class="card-header"></div>
            <div class="card d-flex flex-column p-5">
                @foreach( $comments as $comment)
                    <div class="input-group col-md-12 flex-row justify-content-center my-3">
                        <label class="input-group-text" for="comment"> @if($comment->author) {{$comment->author}} @else Anonymous @endif</label>
                        <p class="form-control" id="comment" >@if($comment->description){{$comment->description}} @endif</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
