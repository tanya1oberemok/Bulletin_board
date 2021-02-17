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

        <div class="card-header" ></div>
        <div class="card d-flex flex-column p-5">
             <form action="{{ route('edit-info', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-2 my-3">
                    <div class="input-group col-md-6 flex-row justify-content-start my-3">
                        <label class="input-group-text" id="name">First name</label>
                        <input type="text" class="form-control" name="name" aria-label="first_name" value="@if($user->name != null){{$user->name}} @endif" >
                    </div>

                    <div class="input-group col-md flex-row-6 justify-content-end my-3">
                        <label class="input-group-text" id="last_name">Last name</label>
                        <input type="text" class="form-control" name="last_name" aria-label="last_name" value="@if($user->last_name != null){{$user->last_name}} @endif" >
                    </div>

                    <div class="input-group col-md-6 flex-row justify-content-start my-3">
                        <label class="input-group-text" id="email">Email</label>
                        <input type="email" class="form-control" name="email" aria-label="email" value="@if($user->email != null){{$user->email}} @endif" >
                    </div>

                    <div class="input-group col-md-6 flex-row justify-content-start my-3">
                        <label class="input-group-text" id="age">Age</label>
                        <input type="text" class="form-control" name="age" aria-label="age" value="@if($user->age != null){{$user->age}} @endif" >
                    </div>

                    <div class="input-group col-md-6 flex-row justify-content-start my-3">
                        <label class="input-group-text" id="gender">Gender</label>
                        <input type="text" class="form-control" name="gender" aria-label="gender" value="@if($user->gender != null){{$user->gender}} @endif" >
                    </div>

                    <div class="input-group col-md-6 flex-row justify-content-start my-3">
                        <label class="input-group-text" id="phone_number">Phone number</label>
                        <input type="text" class="form-control" name="phone_number" aria-label="phone_number" value="@if($user->phone_number != null){{$user->phone_number}} @endif" >
                    </div>

                    <div class="input-group col-md-12 flex-row justify-content-center my-3">
                        <label class="input-group-text" id="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" >@if($user->address != null){{$user->address}} @endif</textarea>
                    </div>

                    <div class="input-group col-md-12 flex-row justify-content-center my-3">
                        <input class="form-control" id="image" name="photo" type="file">
                    </div>
                </div>

                <div class="d-flex justify-content-md-end my-3">
                    <button class="btn btn-outline-success" type="submit">Save</button>
                </div>
            </form>
        </div>

</div>
@endsection
