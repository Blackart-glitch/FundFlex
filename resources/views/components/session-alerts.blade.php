@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" tabindex="-1" role="alert">
        <strong>Failed!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (session('success'))
    <div class="alert alert-success alert-dismissible fade show" tabindex="-1" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" tabindex="-1" role="alert">
        <strong>Warning!</strong> {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
