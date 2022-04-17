@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main-body">

            <!-- Breadcrumb -->

            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-sm-12 mb-10">
                    <div class="card">
                        <div class="col-md-1 rounded ujang">

                            <form action="{{route('ujang')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input id="cam" type="file" name="image" onchange="form.submit()" style="display:none;">
                                <label for="cam" id="popupcam">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                                    </svg>
                                </label>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="">



                                <div><p><img onclick="document.getElementById('popupcam').style.display='block';"  onmouseover="document.getElementById('popupcam').style.display='none';" src="{{asset('/storage/images/'.Auth::user()->pp)}}" class="poto rounded img-responsive" width="150px" height="150px" style="float:left; margin:0 25px 4px 0;"><h1 class="text-peduli">PEDULI DIRI</h1></p>
                                    <div class="col-md-1 rounded ujang">

                                        <form action="{{route('ujang')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input id="cam" type="file" name="image" onchange="form.submit()" style="display:none;">
                                            <label for="cam" id="popupcam">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                    <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                                                </svg>
                                            </label>
                                        </form>
                                    </div>

                                    <div class="mt-3">
                                        <h4 class="nama">{{ Auth::user()->name }}</h4>

                                        <p class="text-secondary mb-1">NIK : {{ Auth::user()->nik }}</p>

                                        <p class="text-secondary mb-1">Tanggal Lahir : {{Carbon\Carbon::parse(Auth::user()->tanggal)->format('d-m-Y')}}</p>

                                    </div>
                                    {{-- BREADCRUMB --}}

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2 align-items-center text-center">




                        <div class="card mb-3 flex-column align-items-center text-center">
                            <div class="container-fluid">
                                <div class="card-header">

                                    <nav class="navbar navbar-light bg-light justify-content-between">
                                        <a class="navbar-brand">Catatan Perjalanan </a>

                                        <form class="form-inline" action="{{route('cari')}}" method="GET">
                                          <input class="form-control mr-sm-3" onchange="form.submit()" name="cari" id="cari" type="search" placeholder="Cari Berdasarkan Tanggal" aria-label="Search">

                                        </form>
                                    </nav>
                                </div>

                                <div class="tebel" style="height: 230px !important; overflow:scroll;">
                                    <table class="table table-borderless table-hover">
                                        <thead>
                                            <tr>

                                                <th scope="col">Lokasi</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Jam</th>
                                                <th scope="col">Suhu Tubuh</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(Route::current()->getName() == 'cari')
                                            @foreach ($tes as $tebel)

                                                <tr>
                                                    <td>{{$tebel->lokasi}}</td>
                                                    <td>{{Carbon\Carbon::parse($tebel->tanggal)->format('d-m-Y')}}</td>
                                                    <td>{{$tebel->jam}}</td>
                                                    <td>{{$tebel->suhu}}</td>
                                                </tr>
                                            @endforeach

                                        @else

                                            @foreach ($tes->history as $tebel)
                                                <tr>
                                                    <td>{{$tebel->lokasi}}</td>
                                                    <td>{{Carbon\Carbon::parse($tebel->tanggal)->format('d-m-Y')}}</td>
                                                    <td>{{$tebel->jam}}</td>
                                                    <td>{{$tebel->suhu}}</td>
                                                </tr>
                                            @endforeach

                                        @endif




                                        </tbody>
                                      </table>
                                </div>
                            </div>



                    </div>


                    <button onclick="document.getElementById('popupform').style.display='block';" class="btn btn-primary btn-lg active" aria-pressed="true">Tambah</button>



                </div>
            </div>

        </div>
    </div>
    <script>
        document.addEventListener('keydown', function(event){
            if(event.key === "Escape"){
                document.getElementById('popupform').style.display='none';
            }
        });
    </script>
    <div class="col-md-8 popupform" id="popupform">
        <div class="card shadow-lg rounded">
            <div class="card-header">{{ __('Tambah Perjalanan') }}
                <button onclick="document.getElementById('popupform').style.display='none';" type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <form enctype="multipart/form-data" class="bg-white shadow-sm p-3"
                action="{{route('history.store')}}" method="POST">
                @csrf
                <input type="text" name="user_id" id="user_id" value="{{Auth::user()->id}}" style="display: none">
                <div class="row mb-3">
                    <label for="lokasi" class="col-md-4 col-form-label text-md-end">{{ __('Lokasi') }}</label>

                    <div class="col-md-6">
                        <input id="lokasi" type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ old('lokasi') }}" required autocomplete="lokasi" autofocus>

                        @error('lokasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="jam" class="col-md-4 col-form-label text-md-end">{{ __('jam') }}</label>

                    <div class="col-md-6">
                        <input id="jam" type="time" class="form-control @error('jam') is-invalid @enderror" name="jam" value="{{ old('jam') }}" required autocomplete="jam" autofocus>

                        @error('jam')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="birthdate" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Lahir') }}</label>

                    <div class="col-md-6">
                        <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="tanggal" value="{{ old('birthdate') }}" required autocomplete="birthdate" autofocus>

                        @error('birthdate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="suhu" class="col-md-4 col-form-label text-md-end">{{ __('Suhu Tubuh') }}</label>

                    <div class="col-md-6">
                        <input id="suhu" type="number" class="form-control @error('suhu') is-invalid @enderror" name="suhu" value="{{ old('suhu') }}" required autocomplete="suhu" autofocus>

                        @error('suhu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <input class="btn btn-primary" type="submit" value="Simpan" />
            </form>
        </div>
    </div>
@endsection
