{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brands</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body> --}}

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ispis svih brendova</h4>
                        @if(Auth::check())
                        @if (Auth::user()->role == 'userCRUD')
                        <a href="{{route('brand.create')}}" class="btn btn-primary">Unesite podatke</a>
                        @else
                        <a href="{{route('cr.brand.create')}}" class="btn btn-primary">Unesite podatke</a>
                        @endif
                        @endif
                    </div>
                    <div class="card-body">
                    <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Ime brenda</th>
                                <th>Brend aktivan</th>
                                <th>Brend status</th>
                                <th>Uredi</th>
                                <th>Obrisi</th>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                <tr>
                                    <td>{{$brand->id}}</td>
                                    <td>{{$brand->brand_name}}</td>
                                    <td>{{$brand->brand_active}}</td>
                                    <td>{{$brand->brand_status}}</td>
                                    @if(Auth::check())
                                    @if (Auth::user()->role == 'userCRUD')
                                    <td><a href="{{route('brand.edit',['brand' =>$brand])}}" class="btn btn-warning">Uredi</a></td>
                                    @endif
                                    @if (Auth::user()->role == 'userCRUD')
                                   <td>
                                    {{-- <form action ="{{route('brand.destroy',['brand' => $brand ])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Izbrisi</button> --}}
                                    <a href="{{route('brand.destroy',['brand' =>$brand])}}" class="btn btn-danger">Izbrisi</a>
                                    </td>
                                    @endif
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
  </body>
</html> --}}