<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ongkir | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
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

<div class="navbar ">
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
data-aos-duration="3000">

    <div class="mt-3 content-center pt-3 pb-3">
        @if ($ongkir != '')
            <h4 class="text-center mb-3">Rincian Ongkir</h4>
    
            
            <div class="container">
                <div class="row">
                  <div class="col">
                    Pengiriman:
                    <div>{{ $ongkir['origin_details']['city_name'] }} - {{ $ongkir['destination_details']['city_name'] }}</div>
                  </div>
                </div>

                    <div class="row mt-3">
                      <div class="col">
                        Berat Paket:
                        <div>{{ $ongkir['query']['weight'] }} Gram</div>
                      </div>
                    </div>
    
            @foreach ($ongkir['results'] as $item)
                <div>
                    <div class="row mt-3">
                        <div class="col">
                            Nama Ekpedisi:
                            <div>{{ $item['name'] }}</div>
                        </div>
                    </div>
                    <hr><hr>
                    @foreach ($item['costs'] as $cost)
                        <div>
                            <div class="row mt-3">
                            <div for="service">Service: {{ $cost['service'] }}</div>
                            <hr>
                            @foreach ($cost['cost'] as $harga )
                                <div>
                                    <div for="harga">
                                        Harga:  Rp. {{ $harga['value'] }} 
                                        <div>Estimasi: {{ $harga['etd'] }} hari</div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        </div>
                    @endforeach
                
            @endforeach
        @endif
      </div>
    </div>
    <div class="mt-3 pb-3">
        <button class="btnn mt-3" ><a href="/ongkir" class="text-decoration-none">Cek Ongkir Lainnya</a></button>
    </div>
</div>

  
  
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
    </script>
  </body>
</html>



