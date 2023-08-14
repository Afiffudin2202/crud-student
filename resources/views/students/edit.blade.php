@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Student</h1>
    </div>
    <form action="{{ url('students/'.$student->id) }}" method="post" class="w-50">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" class="form-control form-control-sm @error('name') is-invalid @enderror"
                name="name" value="{{ old('name', $student->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email"
                class="form-control form-control-sm @error('email')
                is-invalid
            @enderror"
                name="email" value="{{ old('email', $student->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" id="gender" class="form-select form-select-sm" >
                <option selected>Choose gender</option>
                <option value="M" {{ (old('gender', $student->gender) == 'M') ? 'selected' : ''  }}>Male</option>
                <option value="F" {{ (old('gender', $student->gender) == 'F') ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea  name="address" id="address" cols="30" rows="10" class="form-control form-control-sm @error('address')
                is-invalid
            @enderror" >{{ $student->address }}</textarea>
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control form-cotrol-sm @error('phone')
                is-invalid
            @enderror" value="{{ old('phone', $student->phone) }}">
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
        </div>
    </form>
@endsection
