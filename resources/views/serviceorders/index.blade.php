@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="float-md-start">Servisni nalozi</h2>
            <a class="btn btn-sm btn-success float-md-end" href="{{route('serviceOrders.create')}}"
               role="button">Dodaj</a>
        </div>
    </div>

    <div class="row">
        <div class="card mt-4">
            <div class="card-body">
                <table class="table mt-5">
                    <thead>
                    <tr>
                        <th scope="col">Datum primitka</th>
                        <th scope="col">Datum zavrsetka</th>
                        <th scope="col">Ugradeni dijelovi</th>
                        <th scope="col">Komentar</th>
                        <th scope="col">Ukupna cijena</th>
                        <th scope="col">Broj sasije automobila</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($serviceOrders as $serviceOrder)
                    <tr>
                        <td>{{ Carbon\Carbon::parse($serviceOrder->startDate)->format('d-m-Y') }}</td>
                        <td>{{ Carbon\Carbon::parse($serviceOrder->finishDate)->format('d-m-Y') }}</td>
                        <td>
                            @foreach($serviceOrder->carParts as $carPart)
                            {{ $carPart->name }}
                            @endforeach
                        </td>
                        <td>{{$serviceOrder->comment}}</td>
                        <td>{{$serviceOrder->totalPrice}}</td>
                        <td>{{$serviceOrder->cars->chassisNumber}}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{route('serviceOrders.edit',$serviceOrder->id)}}"
                               role="button">Uredi</a>
                            <button type="button" class="btn btn-sm btn-danger"
                                    onclick="event.preventDefault(); document.getElementById('delete-serviceOrder-{{$serviceOrder->id}}').submit()">
                                Delete
                            </button>
                            <form id="delete-serviceOrder-{{$serviceOrder->id}}"
                                  action="{{route('serviceOrders.destroy',$serviceOrder->id)}}" method="POST"
                                  style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$serviceOrders->links()}}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
