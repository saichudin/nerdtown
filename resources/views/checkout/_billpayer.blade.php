<h3>Bill To</h3>
<hr>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::text('billpayer[firstname]', null, [
                    'class' => 'form-control' . ($errors->has('billpayer.firstname') ? ' is-invalid' : ''),
                    'placeholder' => __('First name')
                ])
            }}

            @if ($errors->has('billpayer.firstname'))
                <div class="invalid-feedback">{{ $errors->first('billpayer.firstname') }}</div>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {{ Form::text('billpayer[lastname]', null, [
                    'class' => 'form-control' . ($errors->has('billpayer.lastname') ? ' is-invalid' : ''),
                    'placeholder' => __('Last name')
                ])
            }}

            @if ($errors->has('billpayer.lastname'))
                <div class="invalid-feedback">{{ $errors->first('billpayer.lastname') }}</div>
            @endif
        </div>
    </div>

</div>

@include('checkout._billing_address', ['address' => $billpayer->getBillingAddress()])
