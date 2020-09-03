@extends('layouts.app')
@section('title')
<title>Foodnesia | Riwayat Survey</title>
@endsection
@section('content')
<div class="container">
  <h3 class="text-center py-3">Riwayat Survey</h3>
  <h5>Info User</h5>
  <table>
    <tr>
      <td>Nama User</td>
      <td>:</td>
      <td>{{Auth::user()->name}}</td>
    </tr>
    <tr>
      <td>Email</td>
      <td>:</td>
      <td>{{Auth::user()->email}}</td>
    </tr>
  </table>
  <div class="mb-4"></div>
  <div class="table">
    <table class="table table-bordered">
      <tr class="text-center">
        <th>No</th>
        <th>Tanggal Survey</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jenis-Kelamin</th>
        <th>Rating Pelayanan</th>
        <th>Makanan Favorit</th>
        <th>Minuman Favorit</th>
        <th>Recommended</th>
        <th>Kritik & Saran</th>
      </tr>
      @foreach($surveys as $survey)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ date('d-M-Y', strtotime($survey->created_at)) }}</td>
        <td>{{ $survey->name }}</td>
        <td>{{ $survey->email }}</td>
        <td>{{ $survey->gender }}</td>
        <td>{{ $survey->service_rate }}</td>
        <td>{{ $survey->fav_food }}</td>
        <td>{{ $survey->fav_drink }}</td>
        <td>{{ $survey->recommended }}</td>
        <td>{{ $survey->suggestion }}</td>
      </tr>
      @endforeach
    </table>
  </div>
  {{ $surveys->links() }}
</div>
@endsection
