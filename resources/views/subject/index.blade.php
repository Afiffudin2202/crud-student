@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Subject</h1>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
        <div class="row">
            <div class="col-sm-12  col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-sm btn-primary"
                            onclick="window.location='{{ url('subjects/create') }}' ">
                            Create New Data
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Id Subject</th>
                                        <th>Subject Name</th>
                                        <th>Departmen</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subjects as $subject)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $subject->id_subject }}</td>
                                            <td>{{ $subject->name }}</td>
                                            <td>{{ $subject->department }}</td>
                                            <td class="d-flex justify-content-center gap-3">
                                                <button type="submit" class="btn border-0 btn-sm"
                                                    onclick="window.location='{{ url('subjects/' .$subject->id. '/edit') }}'"><i
                                                        class="fa-solid fa-pen-to-square fs-4 text-warning"></i></button>
                                                <form action="{{ url('subjects/' . $subject->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn border-0 btn-sm"
                                                        onclick="return confirm('are You sure ?')"><i
                                                            class="fa-solid fa-trash fs-4 text-danger"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $subjects->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
