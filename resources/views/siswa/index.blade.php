@extends('layouts.master')

{{-- simpan content dalam section --}}
@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data Siswa</h3>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn right" data-toggle="modal"data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>

                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>FIRST NAME</th>
                                    <th>LAST NAME</th>
                                    <th>GENDER</th>
                                    <th>AGE</th>
                                    <th>RELIGION</th>
                                    <th>ADDRESS</th>
                                    <th>AVG VALUE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                                {{-- using blade template --}}
                                @foreach ($data_siswa as $ds)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="/siswa/{{ $ds->id }}/profile">{{ $ds->first_name }}</a></td>
                                    <td><a href="/siswa/{{ $ds->id }}/profile">{{ $ds->last_name }}</a></td>
                                    <td>{{ $ds->gender }}</td>
                                    <td>{{ $ds->age }}</td>
                                    <td>{{ $ds->religion }}</td>
                                    <td>{{ $ds->address }}</td>
                                    <td>{{ $ds->avgvalue() }}</td>
                                    {{-- href->guna blade template untuk catch dynamic id --}}
                                    <td><a href="/siswa/{{ $ds->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="/siswa/{{ $ds->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Adakah mahu didelete data ini?')">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {{-- enctype->multipart/form data untuk upload gambar --}}
                <form action="/siswa/create" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="fname" aria-describedby="emailHelp" placeholder="First Name" name="first_name" value="{{old('first_name')}}">
                    @if($errors->has('first_name'))
                    <span class="help-block">
                        {{$errors->first('first_name')}}
                    </span>
                    @endif
                    </div>
                    <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="lname" aria-describedby="emailHelp" placeholder="Last Name" name="last_name" value="{{old('last_name')}}">
                    @if($errors->has('last_name'))
                    <span class="help-block">
                        {{$errors->first('last_name')}}
                    </span>
                    @endif
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="last_name">Email</label>
                    <input type="email" class="form-control" id="lname" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{old('email')}}">
                    @if($errors->has('email'))
                    <span class="help-block">
                        {{$errors->first('email')}}
                    </span>
                    @endif
                    </div>

                    <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                        <label for="gender">Select Gender</label>
                            <select class="form-control" id="gender" name="gender">
                            <option value="L" {{(old('gender') == 'L') ? 'selected' : ' '}}>Lelaki</option>
                            <option value="P" {{(old('gender') == 'P') ? 'selected' : ' '}}>Perempuan</option>
                            </select>
                            @if($errors->has('gender'))
                            <span class="help-block">
                                {{$errors->first('gender')}}
                            </span>
                            @endif
                    </div>
                    <div class="form-group {{ $errors->has('age') ? 'has-error' : '' }}">
                    <label for="age">Age</label>
                    <input type="text" class="form-control" id="age" aria-describedby="emailHelp" placeholder="Age" name="age" value="{{old('age')}}">
                    @if($errors->has('age'))
                    <span class="help-block">
                        {{$errors->first('age')}}
                    </span>
                    @endif
                    </div>
                    <div class="form-group {{ $errors->has('religion') ? 'has-error' : '' }}">
                    <label for="religion">Religion</label>
                    <input type="text" class="form-control" id="religion" aria-describedby="emailHelp" placeholder="Religion" name="religion" value="{{old('religion')}}">
                    @if($errors->has('religion'))
                    <span class="help-block">
                        {{$errors->first('religion')}}
                    </span>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" rows="3" name="address">{{old('address')}}</textarea>
                    </div>
                    <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                        <label for="address">Avatar</label>
                        <input type="file" name="avatar" class="form-control">
                        @if($errors->has('avatar'))
                    <span class="help-block">
                        {{$errors->first('avatar')}}
                    </span>
                    @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
        </div>
    </div>
    </div>

@stop


