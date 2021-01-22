@extends('layout.master')

{{-- simpan content dalam section --}}
@section('content')
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{-- display flash message --}}
            {{session('success')}}
        </div>
        @endif
        <div class="row">
            <div class="col-6">
                <h1>Data Siswa</h1>
            </div>
            <div class="col-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data Siswa
                </button>

            </div>
            {{-- check data masuk ke tak
            {{ dd($data_siswa) }} --}}

            {{-- Looping to tunjuk value from database--}}
            <table class="table table-hover">
                <tr>
                    <th>NO</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>GENDER</th>
                    <th>AGE</th>
                    <th>RELIGION</th>
                    <th>ADDRESS</th>
                    <th>ACTION</th>
                </tr>
                {{-- using blade template --}}
                @foreach ($data_siswa as $ds)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ds->first_name }}</td>
                    <td>{{ $ds->last_name }}</td>
                    <td>{{ $ds->gender }}</td>
                    <td>{{ $ds->age }}</td>
                    <td>{{ $ds->religion }}</td>
                    <td>{{ $ds->address }}</td>
                    {{-- href->guna blade template untuk catch dynamic id --}}
                    <td><a href="/siswa/{{ $ds->id }}/edit" class="btn btn-warning btn-sm">Edit</a></td>
                </tr>
                @endforeach
            </table>
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
            <form action="/siswa/create" method="post">
                @csrf
                <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="fname" aria-describedby="emailHelp" placeholder="First Name" name="first_name">
                </div>
                <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="lname" aria-describedby="emailHelp" placeholder="Last Name" name="last_name">
                </div>
                <div class="form-group">
                    <label for="gender">Select Gender</label>
                        <select class="form-control" id="gender" name="gender">
                        <option value="L">Lelaki</option>
                        <option value="P">Perempuan</option>
                        </select>
                </div>
                <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" aria-describedby="emailHelp" placeholder="Age" name="age">
                </div>
                <div class="form-group">
                <label for="religion">Religion</label>
                <input type="text" class="form-control" id="religion" aria-describedby="emailHelp" placeholder="Religion" name="religion">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" rows="3" name="address"></textarea>
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

@endsection
