@extends('layouts.master')
@section('content')

<div class="main">

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif
<div class="panel panel-profile">
<div class="clearfix">
<!-- LEFT COLUMN -->
<div class="profile-left">

    <!-- PROFILE HEADER -->
    <div class="profile-header">
        <div class="overlay"></div>
        <div class="profile-main">
            <img src="" class="img-circle" alt="Avatar" width="90" height="90">
            <h3 class="name">{{ $guru->name }}</h3>
            <span class="online-status status-available">Available</span>
        </div>
    </div>
    <!-- END PROFILE HEADER -->
</div>
{{-- END PANEL --}}
</div>
<!-- END LEFT COLUMN -->

<!-- RIGHT COLUMN -->
{{-- TABLE MATA PELAJARAN --}}
<div class="profile-right">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Mata Pelajaran yang diajar oleh Cikgu {{ $guru->name }}</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>SEMESTER</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guru->mapel as $mapel)
                    <tr>
                        <td>{{ $mapel->name }}</td>
                        <td>{{ $mapel->semester }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="panel">
        <div id="chartValue">

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

{{-- ambil dari website highcharts --}}
@section('footer')

@stop
