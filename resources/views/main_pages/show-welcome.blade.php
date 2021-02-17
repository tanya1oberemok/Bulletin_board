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
                    <form action="{{ route('rating', $bulletin->id)}}" method="POST" id="addStar">
                        @csrf

                        <div class="rating-area">
                            <input class="star" type="submit" id="star-5" name="star" value="5" >
                            <label for="star-5" title="Оценка «5»" @if ($bulletin->averageRating() >= 5) style="color: gold;  text-shadow: 1px 1px goldenrod;" @endif ></label>
                            <input class="star" type="submit" id="star-4" name="star" value="4" >
                            <label for="star-4" title="Оценка «4»" @if ($bulletin->averageRating() >= 4) style="color: gold;  text-shadow: 1px 1px goldenrod;" @endif></label>
                            <input class="star" type="submit" id="star-3" name="star" value="3">
                            <label for="star-3" title="Оценка «3»" @if ($bulletin->averageRating() >= 3) style="color: gold;  text-shadow: 1px 1px goldenrod;" @endif></label>
                            <input class="star" type="submit" id="star-2" name="star" value="2">
                            <label for="star-2" title="Оценка «2»" @if ($bulletin->averageRating() >= 2) style="color: gold;  text-shadow: 1px 1px goldenrod;" @endif></label>
                            <input class="star" type="submit" id="star-1" name="star" value="1" >
                            <label for="star-1" title="Оценка «1»" @if ($bulletin->averageRating() >= 1) style="color: gold;  text-shadow: 1px 1px goldenrod;" @endif></label>
                        </div>
                    </form>

                </div>
                <div class="card d-flex flex-column p-5">
                    <div class="card-body col-sm-3">
                        <img src="{{ asset('/bulletins/' . $bulletin->logo)}}" height="250px">
                    </div>

                    <div class="row g-2 my-3">
                        <div class="input-group col-md-6 flex-row justify-content-start my-3">
                            <label class="input-group-text" id="name">Title</label>
                            <p class="form-control"  aria-label="first_name" >@if($bulletin->name){{$bulletin->name}} @endif</p>
                        </div>

                        <div class="input-group col-md flex-row-6 justify-content-end my-3">
                            <label class="input-group-text" id="meta_info">Meta information</label>
                            <p type="text" class="form-control" name="meta_info">@if($bulletin->meta_info){{$bulletin->meta_info}} @endif</p>
                        </div>

                        <div class="input-group col-md-12 flex-row justify-content-center my-3">
                            <label class="input-group-text" for="description">Description</label>
                            <p class="form-control" id="description" >@if($bulletin->description){{$bulletin->description}} @endif</p>
                        </div>
                    </div>
                </div>


                <div class="card-header"></div>
                <div class="card d-flex flex-column p-5">

                    <form action="{{ route('show', $bulletin->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="input-group col-md-12 flex-row justify-content-center my-3">
                            <label class="input-group-text" for="author" >Author</label>
                            <input class="form-control" type="text" id="author" name="author" value=" @if(Auth::user()) {{Auth::user()->name}} @endif">
                        </div>

                        <div class="input-group col-md-12 flex-row justify-content-center my-3">
                            <label class="input-group-text" id="description">Comment</label>
                            <textarea class="form-control" id="description" name="description" rows="3" ></textarea>
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
