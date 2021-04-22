<div class="col-sm-4">
    <h2>Porteria</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Inicio</a>
        </li>

        @if(isset($section))
            <li>
                <a href="{{ url('security') }}">Portería</a>
            </li>
            <li class="active">{{ $section }}</li>
        @else
            <li class="active">Portería</li>
        @endif
    </ol>
</div>
<div class="col-sm-8">
    
</div>