<div id="field_{{ $id }}"{!! Html::classes(['form-group', 'has-error' => $hasErrors]) !!}>
    <label for="{{ $id }}" class="control-label">
        {{ $label }}
    </label>

    @if ($required)
        <span class="f_req">*</span>
    @endif

    <div class="controls">
        {!! $input !!}
        @foreach ($errors as $error)
            <label id="-error" class="error" for="">{{ $error }}</label>
            {{-- <p class="help-block">{{ $error }}</p> --}}
        @endforeach
    </div>
</div>
