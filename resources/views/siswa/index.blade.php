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
                                    <th>ACTION</th>
                                </tr>
                            </thead>
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
                                    <td><a href="/siswa/{{ $ds->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="/siswas/{{ $ds->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Adakah mahu didelete data ini?')">Delete</a>
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

@stop


