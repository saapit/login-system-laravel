@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Top 5 Siswa</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>RANGKING</th>
                                    <th>NAME</th>
                                    <th>AVG SCORE</th></tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- guna global supaya boleh dipanggil dimana-mana / using custom helper / composer dumpautoload --}}
                                    @foreach ( top5() as $s)
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->fullname() }}</td>
                                    <td>{{ $s->avgvalue }}</td></tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="lnr lnr-user"></i></span>
                    <p>
                        <span class="number">{{ totalSiswa() }}</span>
                        <span class="title">Total Siswa</span>
                    </p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-user"></i></span>
                    <p>
                        <span class="number">{{ totalGuru() }}</span>
                        <span class="title">Total Guru</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@stop
