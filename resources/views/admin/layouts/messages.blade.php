@if (session()->has('success'))
<div class="alert alert-success text-center" role="alert">
    {{ session('success') }}
</div>
@elseif (session()->has('deleted'))
<div class="alert alert-warning text-center" role="alert">
    {{ session('deleted') }}
</div>
@endif

@if ($errors->has('email') || $errors->has('password'))
    <div class="alert alert-danger">
        These credentials do not match our records.
    </div>
@endif

