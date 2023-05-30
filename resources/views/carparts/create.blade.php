@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <h2 class="card-title mb-4">Dodaj novi dio</h2>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('carParts.store')}}" class="form-control mx-auto border-0"
                          style="background-color: transparent" method="POST">
                        @csrf
                        <label for="name" class="form-label">Naziv</label>
                        <input type="text" class="form-control" id="name" name="name" required
                               placeholder="Unesite naziv dijela" value="{{old('name')}}">
                        @error('name')
                        <p class="text-danger small mt-1">{{$message}}</p>
                        @enderror<br>

                        <label for="purchasePrice" class="form-label">Nabavna cijena</label>
                        <input type="text" class="form-control" id="purchasePrice" name="purchasePrice" required
                               placeholder="Unesite nabavnu cijenu" pattern="[0-9]+(\.[0-9]{2})?"
                               value="{{old('purchasePrice')}}">
                        @error('purchasePrice')
                        <p class="text-danger small mt-1">{{$message}}</p>
                        @enderror<br>

                        <label for="sellingPrice" class="form-label">Prodajna cijena</label>
                        <input type="text" class="form-control" id="sellingPrice" name="sellingPrice" required
                               placeholder="Unesite prodajnu cijenu" pattern="[0-9]+(\.[0-9]{2})?"
                               value="{{old('sellingPrice')}}">
                        @error('sellingPrice')
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
