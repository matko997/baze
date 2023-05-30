@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Uredi servisni nalog</h2>
        </div>
    </div>

    <div class="row">
        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('serviceOrders.update', $serviceOrder->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="startDate" class="form-label">Datum pocetka</label>
                        <input type="date" class="form-control" id="startDate" name="startDate"
                               value="{{ $serviceOrder->startDate }}">
                    </div>

                    <div class="mb-3">
                        <label for="finishDate" class="form-label">Datum zavrsetka</label>
                        <input type="date" class="form-control" id="finishDate" name="finishDate"
                               value="{{ $serviceOrder->finishDate }}">
                    </div>

                    <div class="mb-3">
                        <label for="carParts" class="form-label">Ugradeni dijelovi</label>
                        <select multiple class="form-control" id="carParts" name="carParts[]">
                            @foreach($carParts as $carPart)
                            <option value="{{ $carPart->id }}"
                                    @if(in_array($carPart->id, $serviceOrder->carParts->pluck('id')->toArray())) selected @endif>{{ $carPart->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="comment" class="form-label">Komentar</label>
                        <textarea class="form-control" id="comment" name="comment"
                                  rows="3">{{ $serviceOrder->comment }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="chassisNumber" class="form-label">Broj sasije automobila</label>
                        <input type="text" class="form-control" id="chassisNumber" name="chassisNumber"
                               value="{{ $serviceOrder->cars->chassisNumber }}" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary">Uredi</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
