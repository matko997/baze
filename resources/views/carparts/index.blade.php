@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="float-md-start">Dijelovi</h2>
            <a class="btn btn-sm btn-success float-md-end" href="{{route('carParts.create')}}" role="button">Dodaj</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="card mt-4">
                <div class="card-body">
                    <table class="table mt-5">
                        <thead>
                        <tr>
                            <th scope="col">Naziv dijela</th>
                            <th scope="col">Nabavna cijena</th>
                            <th scope="col">Prodajna cijena</th>
                            <th scope="col">Akcije</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carParts as $carPart)
                        <tr>
                            <th scope="row">{{$carPart->name }}</th>
                            <td>{{$carPart->purchasePrice}}</td>
                            <td>{{$carPart->sellingPrice}}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{route('carParts.edit',$carPart->id)}}"
                                   role="button">Uredi</a>
                                <button type="button" class="btn btn-sm btn-danger"
                                        onclick="event.preventDefault(); document.getElementById('delete-carPart-{{$carPart->id}}').submit()">
                                    Obrisi
                                </button>
                                <form id="delete-carPart-{{$carPart->id}}"
                                      action="{{route('carParts.destroy',$carPart->id)}}" method="POST"
                                      style="display: none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$carParts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
