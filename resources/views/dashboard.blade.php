   @extends('layouts.admin')
   @section('content')
   <div class="py-12">
       <div class="container">
           <div class="row pt-5">
               <nav class="w-25 d-flex flex-column">
                   <a class="p-3 bg-dark rounded-3 text-light mb-2 d-flex align-items-center justify-content-around text-decoration-none" href="{{route('clients.index')}}">
                       <span>Clients</span>
                       <i class="fa-solid fa-users"></i>
                   </a>
               </nav>
           </div>
       </div>
   </div>

   @endsection