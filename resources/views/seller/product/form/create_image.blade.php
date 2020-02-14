<div class="card card-accent-success">
    <div class="card-header">{{ __('Images') }}</div>
    <div class="card-body">
        <div class="p-2">
            {{ Form::file('images[]', ['multiple', 'class' => 'form-control-file']) }}
        </div>
        @if ($errors->has('images'))
            <div class="invalid-feedback">{{ $errors->first('images') }}</div>
        @endif
    </div>
</div>
