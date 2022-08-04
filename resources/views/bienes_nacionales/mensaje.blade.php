@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissable" data-dismiss="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    	<p>Corrige los siguientes errores:</p>
        <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('message'))
        <div class="alert alert-success alert-dismissable" data-dismiss="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session()->get('message') }}
        </div>
@endif
@if(session()->has('advertencia'))
        <div class="alert alert-warning" data-dismiss="alert" >
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session()->get('advertencia') }}
        </div>
@endif