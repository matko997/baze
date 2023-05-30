@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <h2 class="card-title mb-4">Uredi dio</h2>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('carParts.update',$carPart->id)}}" class="form-control mx-auto border-0"
                          style="background-color: transparent" method="POST">
                        @csrf
                        @method('PATCH')
                        <label for="name" class="form-label">Naziv</label>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Unesite naziv dijela"
                               value="{{old('name', $carPart->name)}}">
                        @error('name')
                        <p class="text-danger small mt-1">{{$message}}</p>
                        @enderror<br>

                        <label for="purchasePrice" class="form-label">Nabavna cijena</label>
                        <input type="text" class="form-control" id="purchasePrice" name="purchasePrice"
                               placeholder="Unesite nabavnu cijenu"
                               value="{{old('purchasePrice', $carPart->purchasePrice)}}">
                        @error('purchasePrice')
                        <p class="text-danger small mt-1">{{$message}}</p>
                        @enderror<br>

                        <label for="sellingPrice" class="form-label">Prodajna cijena</label>
                        <input type="text" class="form-control" id="sellingPrice" name="sellingPrice"
                               placeholder="Unesite prodajnu cijenu"
                               value="{{old('sellingPrice', $carPart->sellingPrice)}}">
                        @error('sellingPrice')
                        <p class="text-danger small mt-1">{{$message}}</p>
                        @enderror<br>
                        <button type="submit" class="btn btn-primary mt-2">Uredi</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
