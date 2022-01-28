<div class="mb-3 d-flex justify-content-between">
    <h5 class="text-danger-4">
        {{ $titulo ?? '' }}
    </h5>

    @isset($btn)
        <a href="{{ $btn }}" class="btn btn-primary rounded-pill">
            Añadir
        </a>
    @endisset
</div>