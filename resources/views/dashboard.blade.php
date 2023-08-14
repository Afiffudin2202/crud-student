@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row mb-3 gap-2">
        <div class="col-lg-2 col-sm-6 col-md-3 gap-2">
            <div class="card text-center py-3 rounded-0">
                <p>Student</p>
                <h3>{{ $student }}</h3>  
            </div>
        </div>
        <div class="col-lg-2 col-sm-6 col-md-3 gap-2">
            <div class="card text-center py-3 rounded-0">
                <p>Subject</p>
                <h3>{{ $subject }}</h3>
              
            </div>
        </div>
    </div>
    <div class="card text-center">
        <div class="card-body">
            <h1>Welcome Admin</h1>
        </div>
    </div>
@endsection
