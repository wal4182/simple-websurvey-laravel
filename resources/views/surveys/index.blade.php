@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey | Foodnesia</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,500,500i,600,600i,700,700i,900,900i"
      rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
      <div class="container">

        <a class="navbar-brand" href="#">Foodnesia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active" href="#">Home</a>
            <a class="nav-item nav-link" href="#">About</a>
            <a class="nav-item nav-link" href="#">Food</a>
            <a class="nav-item nav-link" href="#">Drink</a>
            <a class="nav-item nav-link" href="#">Contact</a>
          </div>

          <button type="button" class="btn btn-primary">Order</a></button>
        </div>
      </div>
    </nav>

    <div class="header">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center m-auto">
        <h1 id="title" class="text-center">Survey Form For food </h1>
        <p id="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui totam deleniti optio
          accusamus reiciendis neque id, incidunt consequuntur ea rem, facilis quae explicabo ex ratione quisquam
          facere voluptates a. Quaerat!</p>
      </div>
    </div>

    <div class="form">
      <div class="row">
        <div class="col-md-6">
          <div class="form-form">
            <h2 class="mb-30">GET IN TOUCH</h2>
            <ul class="contact-details">
              <li><span>23 Maguwo, Street</span></li>
              <li><span>Yogyakarta</span></li>
              <li><span>081912704287</span></li>
              <li><span>iskhoirulanam@gmail.com</span></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6">
          <form id="survey-form" action="{{ route('survey.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group contact-block1">
                  <label for="name-label" class="label">Nama</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Masukan Nama"
                    data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="email-label" class="label">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email"
                    data-rule="email" data-msg="Please enter a valid email" />
                </div>
              </div>
              <div class="col-lg-12">
                <label for="gender" class="label">Jenis Kelamin</label>
                <select class="custom-select custom-select-sm" id="dropdown" name="gender">
                  <option value="" disabled selected>-- Jenis Kelamin --</option>
                  <option value="Laki-Laki">Laki - laki </option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="number-label" class="label">Rate Pelayanan di Foodnesia (1-10)</label>
                  <input type="number" class="form-control" name="service_rate" pattern="[0-9]"
                    placeholder="Masukan Nilai" min="1" max="10">
                </div>
              </div>
              <div class="col-lg-12 mb-3">
                <label for="fav_food" class="label">Apa makanan favorit anda di Foodnesia?</label>
                @foreach($foods as $food)
                <div class="form-check">
                  <label><input class="form-check-input" type="checkbox" name="fav_food[]"
                      value="{{$food->food_name}}">{{$food->food_name}}</label>
                </div>
                @endforeach
              </div>
              <div class="col-lg-12 mb-3">
                <label for="fav_drink" class="label">Apa minuman favorit anda di Foodnesia?</label>
                @foreach($drinks as $drink)
                <div class="form-check">
                  <label><input class="form-check-input" type="checkbox" name="fav_drink[]"
                      value="{{$drink->drink_name}}">{{$drink->drink_name}}</label>
                </div>
                @endforeach
              </div>
              <div class="col-lg-12 mb-3">
                <label for="recommended" class="label">Apakah Anda akan merekomendasikan Foodnesia ke teman atau
                  keluarga
                  Anda?</label>
                <div class="form-check">
                  <label><input class="form-check-input" type="radio" name="recommended" id="recommended"
                      value="Ya">Ya</label>
                </div>
                <div class="form-check">
                  <label><input class="form-check-input" type="radio" name="recommended" id="recommended"
                      value="Tidak">Tidak</label>
                </div>
                <div class="form-check">
                  <label><input class="form-check-input" type="radio" name="recommended" id="recommended"
                      value="Tidak Yakin">Tidak Yakin</label>
                </div>
              </div class="col-lg-12">
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="suggestion" class="label"> Kritik Dan Saran</label>
                  <textarea class="form-control" name="suggestion" rows="6" data-rule="required"
                    data-msg="Please write something for us" placeholder="Masukan Kritik dan Saran"></textarea>
                </div>
              </div>
              <div class="col-lg-12">
                <input type="submit" id="submit" class="btn btn-defeault btn-send" value="Kirim">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- ======= Footer ======= -->
    <div id="footer" class="text-center">
      <div class="container">
        <div class="socials-media text-center">
          <ul class="list-unstyled">
            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
            <li><a href="#"><i class="ion-social-instagram"></i></a></li>
            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
            <li><a href="#"><i class="ion-social-tumblr"></i></a></li>
            <li><a href="#"><i class="ion-social-dribbble"></i></a></li>
          </ul>
        </div>
        <p>&copy; Copyrights Iskhoirul. All rights reserved.</p>
        <div class="credits">
          Designed by Iskhoirul Anam
        </div>
      </div>
    </div>
    <!-- End Footer -->
  </body>

</html>
@endsection
