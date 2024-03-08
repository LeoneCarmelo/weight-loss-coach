@if(session('message'))
<div class="alert alert-info d-flex justify-content-between gap-3 px-3 align-items-center position-absolute" role="alert">
    <span>
        <strong>
            <i class="fa-solid fa-thumbs-up fa-shake fa-lg me-2"></i>
        </strong> 
    </span>
    <span>{{session('message')}}</span>
    <div class="close_message fs-4 fw-bold">
        <i class="fa-solid fa-close" aria-hidden="true"></i>
    </div>
</div>
@endif