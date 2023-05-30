@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="float-md-start">Automobili</h2>
            <a class="btn btn-sm btn-success float-md-end" href="{{route('cars.create')}}" role="button">Dodaj</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="card mt-4">
                <div class="card-body">
                    <table class="table mt-5">
                        <thead>
                        <tr>
                            <th scope="col">Broj sasije</th>
                            <th scope="col">Godina proizvodnje</th>
                            <th scope="col">Kilometraza</th>
                            <th scope="col">Boja</th>
                            <th scope="col">Akcije</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cars as $car)
                        <tr>
                            <th scope="row">{{$car->chassisNumber }}</th>
                            <td>{{$car->yearOfManufacture}}</td>
                            <td>{{$car->mileage}}</td>
                            <td>{{$car->colour}}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{route('cars.edit',$car->id)}}"
                                   role="button">Uredi</a>
                                <button type="button" class="btn btn-sm btn-danger"
                                        onclick="event.preventDefault(); document.getElementById('delete-car-{{$car->id}}').submit()">
                                    Obrisi
                                </button>
                                <form id="delete-car-{{$car->id}}"
                                      action="{{route('cars.destroy',$car->id)}}" method="POST"
                                      style="display: none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$cars->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
