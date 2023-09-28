<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ongkir | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/styles.css">    

</head>
  <body>

<div class="navbarr">
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-transparent rounded-bottom" >
        <div class="cont">
          <a class="navbar-brand text-light" href="/ongkir">Cek Ongkir</a>
          <a class="nav-link text-light badge bg-dark ms-2" href="/blog">Berita</a>
          <a class="nav-link text-light badge bg-dark ms-2 " href="/about">Contact</a>
          <a class="nav-link text-light badge bg-dark ms-2" href="https://github.com/dullls">GitHub</a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
           

            <ul class="navbar-nav ms-auto ">
            @auth
            
            <li class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle text-light" href="/dashboard" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu ">
                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-clipboard-data"></i> Dashboard</a></li>
                <li><hr class="dropdown-divider "></li>
                <li>
                  <form action="/logout" method="POST">
                    @csrf
                  <button type="submit" class="dropdown-item">
                    <i class="bi bi-x-octagon"></i> Logout</button>
                  </form>
              </ul>
            </li>
            @else
                  
            @endauth
            </ul>

          </div>
        </div>
      </nav>

</div>

    <div id="stars"></div>
<div id="stars2"></div>
<div id="stars3"></div>

<div class="container w-75" data-aos="fade-up"
data-aos-duration="2500">

    <h2 class="text-center mt-4 pt-3">Cek Tarif</h2>

    <div class="part">
        <form action="/ongkir" method="post">
            @csrf
            <div>

<label for="origin" class="mb-2">Asal Kota</label>
<select class="form-control selectpicker" name="origin" id="origin" data-live-search="true" required>
    <option selected>Pilih Asal Kota</option>
    @foreach ($cities as $city)
        <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
    @endforeach
</select>

</div>

<label for="destination" class="mt-3">Kota Tujuan</label>
<select class="form-control selectpicker" name="destination" id="destination" data-live-search="true" required>
    <option selected>Pilih Kota Tujuan</option>
    @foreach ($cities as $city)
        <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
    @endforeach
</select>

</div>
            

            <div class="mt-3">
                <label for="weight" class="mb-2">Berat Paket</label>
                <input type="number" name="weight" id="weight" class="form-control" placeholder="Satuan (Gram)" required>
            </div>

            <div class="mt-3">
                <label for="courier" class="mb-2">Expedisi</label>
                <select name="courier" id="courier" class="form-select" aria-label="Default select example" required>
                    <option selected>Pilih Kurir</option>
                    <option value="jne">JNE</option>
                    <option value="pos">POS</option>
                    <option value="tiki">TIKI</option>
                </select>
            </div>

            <div class="mt-3 pb-3">
                <input type="submit" name="cekOngkir" class="btnn mt-3 ">
            </div>

        </form>
    </div>
    {{-- <div class="mt-5 text-center">
        @if ($ongkir != '')
            <h2>Rincian Ongkir</h2>

            <h5>
                <div>
                    Asal Kota: {{ $ongkir['origin_details']['city_name'] }}
                </div>
                <div>
                    Kota Tujuan: {{ $ongkir['destination_details']['city_name'] }}
                </div>
                <div>
                    Berat: {{ $ongkir['query']['weight'] }}
                </div>
            </h5>

            @foreach ($ongkir['results'] as $item)
                <div>
                    <label for="name">Nama Ekspedisi: {{ $item['name'] }}</label>
                    @foreach ($item['costs'] as $cost)
                        <div>
                            <label class="mt-3" for="service">Service: {{ $cost['service'] }}</label>
                            @foreach ($cost['cost'] as $harga )
                                <div>
                                    <label for="harga">
                                        Harga: {{ $harga['value'] }} (estimasi: {{ $harga['etd'] }} hari)
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
      </div> --}}
</div>

  
  
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
    </script>
  </body>
</html>