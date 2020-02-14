<?php

namespace App\Models;


use Konekt\Address\Models\Address as BaseAddress;
use Vanilo\Contracts\Address as AddressContract;
use Vanilo\Support\Traits\AddressModel;

final class Address extends BaseAddress implements AddressContract
{
    use AddressModel;
}
