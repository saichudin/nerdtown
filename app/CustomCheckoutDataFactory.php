<?php

namespace App;

use Vanilo\Checkout\Contracts\CheckoutDataFactory;
use Vanilo\Contracts\Address;
use Vanilo\Contracts\Billpayer;
use Vanilo\Order\Models\Billpayer as BillpayerModel;
use App\Models\Address as AddressModel;

final class CustomCheckoutDataFactory implements CheckoutDataFactory
{
    public function createBillpayer(): Billpayer
    {
        $billPayer = new BillpayerModel();
        $billPayer->address = new AddressModel();

        return $billPayer;
    }

    public function createShippingAddress(): Address
    {
        return new AddressModel();
    }
}
