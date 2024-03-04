@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <h3 class="text-center my-3">Edit Measurement</h3>
        <form action="{{route('measurements.update', $measurement->id)}}" class="px-5" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="weight_kg" class="form-label">Weight Kg</label>
                <input type="text" class="form-control text-dark @error('weight_kg') is-invalid @enderror" id="weight_kg" name="weight_kg" value="{{old('weight_kg', $measurement->weight_kg)}}">
                <small>The value has to be a number.</small>
                @error('weight_kg')
                <div class='invalid-feedback'>{{ $message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fat_percentage" class="form-label">Fat %</label>
                <input type="text" class="form-control @error('fat_percentage') is-invalid @enderror" id="fat_percentage" name="fat_percentage" value="{{old('fat_percentage', $measurement->fat_percentage)}}">
                <small>The value has to be a number.</small>
                @error('fat_percentage')
                <div class='invalid-feedback'>{{ $message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="blood_pressure" class="form-label">Blood pressure</label>
                <input type="text" class="form-control @error('blood_pressure') is-invalid @enderror" id="blood_pressure" name="blood_pressure" value="{{old('blood_pressure', $measurement->blood_pressure)}}">
                <small>The value has to be a number.</small>
                @error('blood_pressure')
                <div class='invalid-feedback'>{{ $message}}</div>
                @enderror
            </div>
            <input type="hidden" class="form-control" id="client_id" name="client_id" value="{{old('client_id', $measurement->client_id)}}">
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection