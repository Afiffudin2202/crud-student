@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Subject</h1>
    </div>
    <form action="{{ url('subjects') }}" method="post" class="col-lg-8">
        @csrf
        <div class="mb-3">
            <label for="id_subject" class="form-label">Id Subject</label>
            <input type="text" class="form-control form-control-sm @error('id_subject') is-invalid @enderror"
                id="id_subject" name="id_subject" value="{{ old('id_subject') }}">
            @error('id_subject')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name Subject</label>
            <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name"
                name="name" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" class="form-control form-control-sm @error('department') is-invalid @enderror"
                id="department" name="department" value="{{ old('department') }}">
            @error('department')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <button class="btn btn-sm btn-primary" type="submit">Save</button>
        </div>
    </form>
@endsection
