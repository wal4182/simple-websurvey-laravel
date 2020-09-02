@extends('layouts.app')
@section('content')
<div class="container">
  <h3 class="text-center py-3">Riwayat Survey</h3>
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
