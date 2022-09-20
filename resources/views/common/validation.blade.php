@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger">
    {{ session()->get('error') }}
</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger">
    Whoops! Something went wrong<br>
     @foreach ($errors->all() as $error)
                {{ $error }}<br>
     @endforeach
    </div>
@endif