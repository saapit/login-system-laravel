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
            <img src="{{ $siswa->getAvatar() }}" class="img-circle" alt="Avatar" width="90" height="90">
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
    <div class="panel-profile">
        <div class="profile-info">
            <h4 class="heading">Detail</h4>
            <ul class="list-unstyled list-justify">
                <li>Age<span>{{ $siswa->age }}</span></li>
                <li>Gender<span>{{ $siswa->gender }}</span></li>
                <li>Religion<span>{{ $siswa->religion }}</span></li>
                <li>Address<span>{{ $siswa->address }}</span></li>
            </ul>
        </div>

            <div class="text-center"><a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-primary">Edit Profile</a></div>
    <!-- END PROFILE DETAIL -->
</div>
{{-- END PANEL --}}
</div>
<!-- END LEFT COLUMN -->

<!-- RIGHT COLUMN -->
{{-- TABLE MATA PELAJARAN --}}
<div class="profile-right">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Nilai
        </button>

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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="/siswa/{{ $siswa->id}}/addnilai" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="mapel">Mata Pelajaran</label>
                    <select class="form-control" id="mapel" name="mapel">
                    @foreach ($matapelajaran as $mp)
                        <option value="{{ $mp->id }}">{{ $mp->name }}</option>
                    @endforeach
                    </select>
                </div>
            <div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
            <label for="value">Value</label>
            <input type="text" class="form-control" id="value" aria-describedby="emailHelp" placeholder="value" name="value" value="{{old('value')}}">
            @if($errors->has('value'))
            <span class="help-block">
                {{$errors->first('value')}}
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

{{-- ambil dari website highcharts --}}
@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chartValue', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Laporan Nilai Siswa'
    },
    xAxis: {
        // cara nak view kan json !!..!!
        categories: {!!json_encode($categories)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Value'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Value',
        data: {!!json_encode($data)!!}
    }]
});
</script>
@stop
