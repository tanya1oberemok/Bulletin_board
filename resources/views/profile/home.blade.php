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
        <div class="col-md-12">
                <div class="card-header">
                    <a href="{{ url('edit-info', $user->id) }}" class="btn btn-outline-info">Edit information</a>
                </div>
                <div class="card d-flex flex-row p-5">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body col-sm-3">
                        <img src="{{ asset('/images/' . $user->photo)}}" height="250px">
                    </div>

                    <div class="card-body flex-column">
                        <div class="input-group col-md-12  my-3">
                            <label class="input-group-text" for="last_name"> Last name: </label>
                            <div class="p-2 bd-highlight" id="last_name">{{ $user->last_name }}</div>
                        </div>

                        <div class="input-group col-md-12  my-3">
                            <label class="input-group-text" for="last_name"> First name: </label>
                            <div class="p-2 bd-highlight" id="name">{{ $user->name }}</div>
                        </div>

                        <div class="input-group col-md-12  my-3">
                            <label class="input-group-text" for="last_name"> Email: </label>
                            <div class="p-2 bd-highlight" id="email">{{ $user->email }}</div>
                        </div>

                        <div class="input-group col-md-12  my-3" >
                            <label class="input-group-text" for="last_name"> Age: </label>
                            <div class="p-2 bd-highlight" id="age"> {{ $user->age }}</div>
                        </div>

                        <div class="input-group col-md-12  my-3">
                            <label class="input-group-text" for="last_name"> Gender: </label>
                            <div class="p-2 bd-highlight" id="gender">{{ $user->gender }}</div>
                        </div>

                        <div class="input-group col-md-12  my-3">
                            <label class="input-group-text" for="last_name"> Address: </label>
                            <div class="p-2 bd-highlight" id="address">{{ $user->address }}</div>
                        </div>

                        <div class="input-group col-md-12  my-3">
                            <label class="input-group-text" for="last_name"> Phone number: </label>
                            <div class="p-2 bd-highlight" id="phone_number">{{ $user->phone_number }}</div>
                        </div>

                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
