@if (count($errors) > 0)
    <div class="alert alert-danger">
    	<p>Corrige los siguientes errores:</p>
        <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('message'))
        <div class="alert alert-success">
        {{ session()->get('message') }}
        </div>
@endif
@if(session()->has('advertencia'))
        <div class="alert alert-warning">
        {{ session()->get('advertencia') }}
        </div>
@endif