{{-- @extends folder-name/master.blade.php --}}
@extends('layouts.master')

@section('content')

    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                    <div class="panel">
                        <div class="panel-body">
                            <h1 class="panel-title">Edit Data Siswa</h1>
                            <br>
                            <form action="/siswa/{{ $siswa->id }}/update" method="POST" enctype="multipart/form-data">
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
                                    <textarea class="form-control" id="address" rows="3" name="address" >{{ $siswa->address}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="address">Avatar</label>
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                                    <button type="submit" class="btn btn-warning pull-right">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop







