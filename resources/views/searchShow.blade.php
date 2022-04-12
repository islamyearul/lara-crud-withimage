@extends('layout')
@section('title')
    <h3>Result</h3>
@endsection
@section('content')
<div class="content">
    <div class="row">
        
            <h4 class="page-title text-center">Zinith Software</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                @if (session('success'))
                    <h3 class="alert alert-success">{{ session('success') }}</h3>
                    {{-- <input type="hidden" id="smsinfo" value="{{ session('success') }}"> --}}
                    {{-- <input type="hidden" id="smsinfo" value="{{ session('success') }}"> --}}
                  
                @endif
                <table id="datatable" class="table table-striped table-bordered custom-table mb-0 " style="width:100%">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Gander</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Class</th>
                            <th>Education Year</th>
                            <th>Photo</th>
                            <th>Address</th>                                  
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Students as $Student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $Student->name }}</td>
                                <td>{{ $Student->gender }}</td>
                                <td>{{ $Student->email }}</td>
                                <td>{{ $Student->mobile }}</td>
                                <td>{{ $Student->class }}</td>
                                <td>{{ $Student->education_year }}</td>
                                <td><img src="{{ asset('storage/images/Students'). '/' . $Student->photo }}" alt="" style="width: 80px"></td>
                                <td>{{ $Student->address }}</td> 
                                <td> <a class="btn btn-info" href="{{ URL::to('/edit-student'.  '/' . $Student->id ) }}">Edit</a></td>                                                 
                                <td><a class="btn btn-danger" href="{{ URL::to('/delete-student' . '/' . $Student->id) }}">Delete</a></td>                                                 
                                
                            </tr>
                        @endforeach
                    </tbody>
                   
                </table>
            </div>
        </div>
    </div>
</div>
@endsection