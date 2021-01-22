{{-- @extends folder-name/master.blade.php --}}
@extends('layout.master')

@section('content')

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{-- display flash message --}}
            {{session('success')}}
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <h1>Edit Data Siswa</h1>
            <form action="/siswa/{{ $siswa->id }}/update" method="post">
                {{-- @method('patch') --}}
                @csrf
                <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="fname" aria-describedby="emailHelp" placeholder="First Name" name="first_name" value="{{ $siswa->first_name }}">
                </div>
                <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="lname" aria-describedby="emailHelp" placeholder="Last Name" name="last_name" value="{{ $siswa->last_name }}">
                </div>
                <div class="form-group">
                    <label for="gender">Select Gender</label>
                        <select class="form-control" id="gender" name="gender">
                        <option value="L" @if($siswa->gender == 'L') selected @endif>Lelaki</option>
                        <option value="P" @if($siswa->gender == 'P') selected @endif>Perempuan</option>
                        </select>
                </div>
                <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" aria-describedby="emailHelp" placeholder="Age" name="age" value="{{ $siswa->age }}">
                </div>
                <div class="form-group">
                <label for="religion">Religion</label>
                <input type="text" class="form-control" id="religion" aria-describedby="emailHelp" placeholder="Religion" name="religion" value="{{ $siswa->religion }}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" rows="3" name="address" value="{{ $siswa->address }}">{{ $siswa->address}}</textarea>
                </div>
                <button type="submit" class="btn btn-warning float-right">Update</button>
            </form>
        </div>
        </div>

@endsection






