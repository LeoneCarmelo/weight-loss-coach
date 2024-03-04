@extends('layouts.admin')
@section('content')
<div class="container p-5">
  <div class="row">
    <h2 class="text-center">Add client</h2>
    <div class="d-flex justify-content-center">
      <form action="{{route('clients.store')}}" method="post" class="my-4 d-flex flex-column w-100" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="first_name" class="form-label">Name</label>
          <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" aria-describedby="helpIdtitle" required>
        </div>
        <div class="mb-3">
          <label for="last_name" class="form-label">Last Name</label>
          <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" aria-describedby="helpIdtitle" required>
        </div>
        <div class="mb-3">
          <label for="date_of_birth" class="form-label">Date of Birth</label>
          <input type="date" name="date_of_birth" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" aria-describedby="helpIdtitle" required>
        </div>
        <div class="mb-3">
          <label for="length_cm" class="form-label">Length (cm)</label>
          <input type="text" name="length_cm" id="length_cm" class="form-control @error('length_cm') is-invalid @enderror" aria-describedby="helpIdtitle" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" aria-describedby="helpIdtitle" required>
        </div>
        <div class="mb-3">
          <label for="photo" class="form-label">Photo</label>
          <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" aria-describedby="helpIdtitle">
        </div>
        <button type="submit" value="Save" class="btn btn-success my-4 w-25 text-light fw-bold align-self-end">Save</button>
      </form>
    </div>
  </div>
</div>
@endsection