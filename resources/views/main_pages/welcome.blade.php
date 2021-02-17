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

        <div class="justify-content-center d-flex">
            <div class="col-12">
                <div class="card-header"></div>

                <div class="card p-5">
                    <div class="row">
                        @foreach($bulletins as $bulletin)
                            <div class="card mr-4 mb-5" style="width: 18rem;">
                                <img src="{{ asset('/bulletins/' . $bulletin->logo) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$bulletin->name}}</h5>
                                    <p class="card-text" style="width: 10rem;">{{$bulletin->meta_info}}</p>
                                    <p class="card-text text-truncate" style="width: 10rem;">{{$bulletin->description}}</p>
                                    <div class="d-flex flex-row">
                                        <a href="{{ url('show', $bulletin->id) }}" class="btn btn-outline-primary mr-5">See more...</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if ($bulletins->lastPage() > 1)
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ ($bulletins->currentPage() == 1) ? ' disabled' : '' }}">
                                        <a class="page-link" href="{{ $bulletins->url(1) }}">Previous</a>
                                    </li>

                                    @for ($i = 1; $i <= $bulletins->lastPage(); $i++)
                                     <li class="page-item {{ ($bulletins->currentPage() == $i) ? ' active' : '' }}">
                                         <a class="page-link" href="{{ $bulletins->url($i) }}">{{ $i }}</a>
                                     </li>
                                    @endfor

                                    <li class="page-item {{ ($bulletins->currentPage() == $bulletins->lastPage()) ? ' disabled' : '' }}">
                                        <a class="page-link" href="{{ $bulletins->url($bulletins->currentPage()+1) }}">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
