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
                            <form action="/siswas/{{ $siswa->id }}/update" method="post">
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
                                    <button type="submit" class="btn btn-warning pull-right">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Inputs</h3>
        </div>
        <div class="panel-body">
            <input type="text" class="form-control" placeholder="text field" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;"><br>
            <input type="password" class="form-control" value="asecret" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;"><br>
            <textarea class="form-control" placeholder="textarea" rows="4"></textarea><br>
            <select class="form-control">
                <option value="cheese">Cheese</option>
                <option value="tomatoes">Tomatoes</option>
                <option value="mozarella">Mozzarella</option>
                <option value="mushrooms">Mushrooms</option>
                <option value="pepperoni">Pepperoni</option>
                <option value="onions">Onions</option>
            </select><br>

            <label class="fancy-checkbox">
                <input type="checkbox">
                <span>Fancy Checkbox 1</span>
            </label>
            <label class="fancy-checkbox">
                <input type="checkbox">
                <span>Fancy Checkbox 2</span>
            </label>
            <label class="fancy-checkbox">
                <input type="checkbox">
                <span>Fancy Checkbox 3</span>
            </label><br>

            <label class="fancy-radio">
                <input name="gender" value="male" type="radio">
                <span><i></i>Male</span>
            </label>
            <label class="fancy-radio">
                <input name="gender" value="female" type="radio">
                <span><i></i>Female</span>
            </label>
        </div>
    </div> --}}

@stop
@section('content1')

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






