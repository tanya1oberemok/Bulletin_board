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
            <div class="card-header"></div>

            <div class="card d-flex flex-column p-5">
                <form action="{{ route('create-bulletin') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-2 my-3">
                        <div class="input-group col-md-6 flex-row justify-content-start my-3">
                            <label class="input-group-text" id="name">Title</label>
                            <input type="text" class="form-control" name="name" aria-label="first_name" >
                        </div>

                        <div class="input-group col-md flex-row-6 justify-content-end my-3">
                            <label class="input-group-text" id="meta_info">Meta information</label>
                            <input type="text" class="form-control" name="meta_info" aria-label="meta_info" >
                        </div>

                        <div class="input-group col-md-12 flex-row justify-content-center my-3">
                            <label class="input-group-text" id="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" ></textarea>
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
        </div>
    </div>
@endsection
