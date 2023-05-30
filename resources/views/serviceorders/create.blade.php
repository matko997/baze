@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <h2 class="card-title mb-4">Dodaj novi servisni nalog</h2>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('serviceOrders.store')}}" class="form-control mx-auto border-0"
                          method="POST" style="background-color: transparent">
                        @csrf
                        <div class="mb-3">
                            <label for="carParts" class="form-label">Odaberite dijelove</label>
                            <select multiple class="form-control" id="carParts" name="carParts[]">
                                @foreach($carParts as $carPart)
                                <option value="{{ $carPart->id }}">{{ $carPart->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="doctor">Broj sasije automobila</label>
                        <select class="form-select" name="carId" id="carId" required>
                            <option value="">Odaberite broj sasije automobila</option>
                            @foreach($cars as $car)
                            <option value="{{ $car->id }}"> {{ $car->chassisNumber }}</option>
                            @endforeach
                        </select>
                        <label for="startDate" class="form-label">Datum pocetka</label>
                        <input type="date" class="form-control" id="startDate" name="startDate">
                        <label for="finishDate" class="form-label">Datum zavrsetka</label>
                        <input type="date" class="form-control" id="finishDate" name="finishDate">
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3" maxlength="80"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2" id="checkBtn">Dodaj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
