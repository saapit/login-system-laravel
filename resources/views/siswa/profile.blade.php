@extends('layouts.master')

@section('content')

<div class="main">

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
<div class="panel panel-profile">
<div class="clearfix">
<!-- LEFT COLUMN -->
<div class="profile-left">

    <!-- PROFILE HEADER -->
    <div class="profile-header">
        <div class="overlay"></div>
        <div class="profile-main">
            <img src="{{ $siswa->getAvatar() }}" class="img-circle" alt="Avatar" style="max-width:95px; max-height:95px">
            <h3 class="name">{{ $siswa->first_name }}</h3>
            <span class="online-status status-available">Available</span>
        </div>
        <div class="profile-stat">
            <div class="row">
                <div class="col-md-4 stat-item">
                    {{ $siswa->mapel->count() }} <span>Mata Pelajaran</span>
                </div>
                <div class="col-md-4 stat-item">
                    15 <span>Awards</span>
                </div>
                <div class="col-md-4 stat-item">
                    2174 <span>Points</span>
                </div>
            </div>
        </div>
    </div>
    <!-- END PROFILE HEADER -->

    <!-- PROFILE DETAIL -->
    <div class="profile-detail">
        <div class="profile-info">
            <h4 class="heading">Detail</h4>
            <ul class="list-unstyled list-justify">
                <li>Age<span>{{ $siswa->age }}</span></li>
                <li>Gender<span>{{ $siswa->gender }}</span></li>
                <li>Religion<span>{{ $siswa->religion }}</span></li>
                <li>Address<span>{{ $siswa->address }}</span></li>
            </ul>

            <div class="text-center"><a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-primary">Edit Profile</a></div>
        </div>
    </div>
    <!-- END PROFILE DETAIL -->
</div>
<!-- END LEFT COLUMN -->

<!-- RIGHT COLUMN -->
{{-- TABLE MATA PELAJARAN --}}
<div class="profile-right">

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Mata Pelajaran</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr><th>CODE</th><th>NAME</th><th>SEMESTER</th><th>VALUE</th></tr>
                </thead>
                <tbody>
                    @foreach($siswa->mapel as $mapel)
                    <tr><td>{{ $mapel->code }}</td>
                        <td>{{ $mapel->name }}</td>
                        <td>{{ $mapel->semester }}</td>
                        <td>{{ $mapel->pivot->value }}</td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- END TABLE MATA PELAJARAN --}}

<!-- END RIGHT COLUMN -->
</div>
</div>

        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
@stop
