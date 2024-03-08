@extends('layouts.admin')
@section('content')
<div class="container d-flex justify-content-center flex-column client-index py-3">
    @include('partials.session_message')
    <a class="p-2 fs-1 fw-bold text-right text-decoration-none text-info" href="{{route('clients.create')}}" role="button">
        <i class="fa-solid fa-plus text-success" aria-hidden="true"></i>
        <span class="text-dark">Add client</span>
    </a>
    <div class="table-responsive my-4">
        <table class="table table-striped table-success table-hover">
            <thead>
                <tr class="clients">
                    <th scope="col">Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Length</th>
                    <th scope="col">Date of birth</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clients as $client)
                <tr class="clients">
                    <td scope="row">{{$client->first_name}}</td>
                    <td scope="row">{{$client->last_name}}</td>
                    <td scope="row">{{$client->email}}</td>
                    <td scope="row">{{$client->length_cm}} cm</td>
                    <td scope="row">{{date('d-m-Y', strtotime($client->date_of_birth))}}</td>
                    <td>
                        <div class="d-flex align-items-center justify-content-between h-100">
                            <a href="{{route('clients.show', $client->id)}}">
                                <i class="fa-solid fa-eye text-primary" aria-hidden="true"></i>
                            </a>
                            <a href="{{route('clients.edit', $client->id)}}">
                                <i class="fa-solid fa-pencil text-warning" aria-hidden="true"></i>
                            </a>
                            <a type="button" class="" data-bs-toggle="modal" data-bs-target="#modalId-{{$client->id}}">
                                <i class="fa-solid fa-trash-can text-danger"></i>
                            </a>


                            <!-- Modal -->
                            <div class="modal fade" id="modalId-{{$client->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="dialog">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-end">
                                            <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark text-center py-3">
                                            Sei sicuro di eliminare {{$client->first_name . ' ' . $client->last_name}}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Chiudi</button>
                                            <form action="{{route('clients.destroy', $client)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-success" type="submit">Conferma</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="">
                    <td scope="row">Sorry, no clients found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $clients->links() }}
</div>
@endsection