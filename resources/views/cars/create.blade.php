@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <h2 class="card-title mb-4">Dodaj novi automobil</h2>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('cars.store')}}" class="form-control mx-auto border-0"
                          style="background-color: transparent" method="POST">
                        @csrf
                        <label for="chassisNumber" class="form-label">Broj sasije</label>
                        <input type="text" class="form-control" id="chassisNumber" name="chassisNumber"
                               placeholder="Unesite broj sasije" value="{{old('chassisNumber')}}">
                        @error('chassisNumber')
                        <p class="text-danger small mt-1">{{$message}}</p>
                        @enderror<br>

                        <label for="yearOfManufacture" class="form-label">Godiste</label>
                        <input type="number" class="form-control" id="year" name="yearOfManufacture" min="1800" max="2023"
                               placeholder="Unesite godiste" value="{{old('year')}}">
                        @error('year')
                        <p class="text-danger small mt-1">{{$message}}</p>
                        @enderror<br>

                        <label for="mileage" class="form-label">Kilometraza</label>
                        <input type="number" class="form-control" id="mileage" name="mileage" min="0"
                               placeholder="Unesite kilometrazu" value="{{old('mileage')}}">
                        @error('mileage')
                        <p class="text-danger small mt-1">{{$message}}</p>
                        @enderror<br>

                        <label for="colour" class="form-label">Boja</label>
                        <input type="text" class="form-control" id="colour" name="colour" placeholder="Unesite boju"
                               value="{{old('colour')}}">
                        @error('colour')
                        <p class="text-danger small mt-1">{{$message}}</p>
                        @enderror<br>
                        <button type="submit" class="btn btn-primary mt-2">Dodaj</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
