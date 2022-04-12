@extends('layout')
@section('title')
    <h3>Add Students</h3>
@endsection
@section('content')
<div class="content">
    <div class="row">
        
        <h4 class="page-title text-center">Add Student</h4>
</div>
    <div class="row">


                @if (session('success'))
                    <h3 class="alert alert-success">{{ session('success') }}</h3>
                    {{-- <input type="hidden" id="smsinfo" value="{{ session('success') }}"> --}}
                    {{-- <input type="hidden" id="smsinfo" value="{{ session('success') }}"> --}}
                  
                @endif
                <form action="{{ route('store-student') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Name</label>
                            <input class="form-control" name="name" type="text" required>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Phone</label>
                            <input class="form-control" name="mobile" type="number" required>
                            @error('mobile')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                           
                        </div>
                    </div>   
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Class</label>
                            <input class="form-control" name="class" type="text" required>
                            @error('class')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Education Year</label>
                            <select name="education_year" id=""  class="form-control" required>
                                <option value="" selected disabled>--Select Year--</option>
                                <option value="2022"> 2022 </option>
                                <option value="2023"> 2023 </option>
                                <option value="2024"> 2024 </option>
                                <option value="2025"> 2025 </option>
                                <option value="2026"> 2026 </option>
                                <option value="2027"> 2027 </option>
                                
                            </select>     
                            @error('education_year')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                           
                        </div>
                    </div>                     
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Email </label>
                            <input class="form-control" name="email" type="email" required>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Gender</label>
                            <div class="form-control">
                                <input name="gender" type="radio" value="male"> &nbsp; Male &nbsp;
                                <input name="gender" type="radio" value="female"> &nbsp; Female
                            </div>
                            @error('gender')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Photo</label>
                            <input class="form-control" name="photo" type="file">
                            @error('photo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Address</label>
                            <textarea  class="form-control" name="address" id="" cols="30" rows="3" required></textarea>
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="m-t-20 text-center my-5">
                        <button type="submit" class="btn btn-primary submit-btn">Add Students</button>
                    </div>
                </form>
    </div>
</div>
@endsection