@extends('layouts.admin')
@section('content')
<div class="container p-5">
    <div class="row">
        <h2 class="text-center">Edit Client</h2>
        <div class="d-flex justify-content-center">
            <form action="{{route('clients.update', $client->id)}}" method="post" class="my-4 d-flex flex-column w-100" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="first_name" class="form-label">Name</label>
                    <input type="text" name="first_name" id="first_name" value="{{old('first_name', $client->first_name)}}" class="form-control @error('first_name') is-invalid @enderror" aria-describedby="helpIdtitle" required>
                    <small>Type your name</small>
                    @error('first_name')
                    <div class='invalid-feedback'>{{ $message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last_name" value="{{old('last_name', $client->last_name)}}" class="form-control @error('last_name') is-invalid @enderror" aria-describedby="helpIdtitle" required>
                    <small>Type your last name</small>
                    @error('last_name')
                    <div class='invalid-feedback'>{{ $message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" value="{{old('date_of_birth', $client->date_of_birth)}}" class="form-control @error('date_of_birth') is-invalid @enderror" aria-describedby="helpIdtitle" required>
                    <small>Insert your date of birth</small>
                    @error('date_of_birth')
                    <div class='invalid-feedback'>{{ $message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="length_cm" class="form-label">Length (cm)</label>
                    <input type="text" name="length_cm" id="length_cm" value="{{old('length_cm', $client->length_cm)}}" class="form-control @error('length_cm') is-invalid @enderror" aria-describedby="helpIdtitle" required>
                    <small>Type your email</small>
                    @error('email')
                    <div class='invalid-feedback'>{{ $message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" value="{{old('email', $client->email)}}" class="form-control @error('email') is-invalid @enderror" aria-describedby="helpIdtitle" required>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <div class="d-flex justify-content-between">
                        <div class="w-75">
                            <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" aria-describedby="helpIdtitle">
                            <small>Upload your photo</small>
                            @error('photo')
                            <div class='invalid-feedback'>{{ $message}}</div>
                            @enderror
                        </div>
                        <div class="image">
                            @if (Str::startsWith($client->photo, 'http'))
                            <img src="{{ $client->photo }}" alt="Client Photo">
                            @else
                            <img src="{{ asset('storage/' . $client->photo) }}" alt="Client Photo">
                            @endif
                            <!--   <img src="{{old('photo', $client->photo)}}" alt="" width="100" class=""> -->
                        </div>
                    </div>
                </div>
                <button type="submit" value="Save" class="btn btn-success my-4 w-25 text-light fw-bold align-self-end">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection