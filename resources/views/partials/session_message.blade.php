@if(session('message'))
<div class="alert alert-info d-flex justify-content-between px-3 align-items-center" role="alert">
    <span>
        <strong>
            <i class="fa-solid fa-thumbs-up fa-shake fa-lg me-2"></i>
        </strong> {{session('message')}}
    </span>
    <div class="close_message fs-4 fw-bold">X</div>
</div>
@endif