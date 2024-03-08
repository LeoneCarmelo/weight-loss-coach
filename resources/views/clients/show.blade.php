@extends('layouts.admin')
@section('content')
<div class="container p-5">
    <div class="row p-3 row-cols-2">
        @include('partials.session_message')
        <!-- Details -->
        <div class="col">
            <h3 class="text-center">Client Details</h3>
            <hr class="">
            <div class="card flex-row justify-content-around align-items-center pt-3 border-0">
                <div class="details mb-5">
                    <ul class="list-unstyled">
                        <li><strong>Name: </strong>{{$client->first_name}}</li>
                        <li><strong>Last Name: </strong>{{$client->last_name}}</li>
                        <li><strong>Date of birth: </strong>{{$client->date_of_birth}}</li>
                        <li><strong>Email address: </strong>{{$client->email}}</li>
                        <li><strong>Length in cm: </strong>{{$client->length_cm}}</li>
                    </ul>
                </div>
                <div class="card-img text-end mb-5 w-50">
                    <img src="{{$client->photo}}" alt="Client Photo">
                    <span>{{$client->photo ? '' : 'No photo added'}}</span>
                </div>
            </div>
        </div>
        <!-- Measurements -->
        <div class="col flex-column align-items-center">
            <h3 class="text-center">Clients Measurements</h3>
            <hr>
            @include('partials.validation_errors')
            <div class="table-responsive pt-3 px-1">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Weight KG</th>
                            <th scope="col">Fat Percentage</th>
                            <th scope="col">Blood Pressure</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($measurements as $measurement)
                        <tr>
                            <td class="">
                                <span>{{$measurement->weight_kg ? $measurement->weight_kg . ' Kg' : ''}}</span>
                            </td>
                            <td class="">
                                <span>{{$measurement->fat_percentage ? $measurement->fat_percentage . ' %' : ''}}</span>
                            </td>
                            <td class="">
                                <span>{{$measurement->blood_pressure ? $measurement->blood_pressure . ' mmHg' : ''}}</span>
                            </td>
                            <td>
                                <span>{{$measurement->updated_at->format('d-m-Y H:i:s')}}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-between h-100">
                                    <a href="{{route('measurements.edit', $measurement->id)}}">
                                        <i class="fa-solid fa-pencil text-warning" aria-hidden="true"></i>
                                    </a>
                                    <a type="button" class="" data-bs-toggle="modal" data-bs-target="#modalId-{{$measurement->id}}">
                                        <i class="fa-solid fa-trash-can text-danger"></i>
                                    </a>


                                    <!-- Modal -->
                                    <div class="modal fade" id="modalId-{{$measurement->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="dialog">
                                            <div class="modal-content">
                                                <div class="modal-header justify-content-end">
                                                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-dark">
                                                    Are you sure to remove the measurement n {{$measurement->id}} ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                    <form action="{{route('measurements.destroy', $measurement)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-outline-success" type="submit">Delete</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            </form>
                        </tr>
                        @empty
                        <tr>
                            <td>
                                <span>No MEasurement</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Form Add Measurements -->
    <div class="row p-3">
        <div class="col col-6 ms-auto">
            <form action="{{route('measurements.store')}}" method="post" class="d-flex bg-form gap-3 p-3 my-3 rounded-3">
                @csrf
                <td>
                    <div class="d-flex flex-column gap-2">
                        <label for="weight_kg" class="text-light text-center">Weight Kg</label>
                        <input type="text" name="weight_kg" class="form-control @error('date_of_birth') is-invalid @enderror">
                    </div>
                </td>
                <td>
                    <div class="d-flex flex-column gap-2">
                        <label for="fat_percentage" class="text-light text-center">Fat Percentage</label>
                        <input type="text" name="fat_percentage" class="form-control @error('date_of_birth') is-invalid @enderror">
                    </div>
                </td>
                <td>
                    <div class="d-flex flex-column gap-2">
                        <label for="blood_pressure" class="text-light text-center">Blood Pressure</label>
                        <input type="text" name="blood_pressure" class="form-control @error('date_of_birth') is-invalid @enderror">
                    </div>
                </td>
                <input type="hidden" name="client_id" value="{{$client->id}}">
                <td>
                    <input type="submit" value="Add Measurement" class="btn btn-success">
                </td>
            </form>
        </div>
    </div>



</div>
@endsection