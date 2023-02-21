@if (session()->has('success'))
<div class="alert alert-success text-center" role="alert">
    {{ session('success') }}
</div>
@elseif (session()->has('deleted'))
<div class="alert alert-warning text-center" role="alert">
    {{ session('deleted') }}
</div>
@endif

