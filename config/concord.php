<?php

return [
    'modules' => [
       \Vanilo\Product\Providers\ModuleServiceProvider::class => [
           'migrations' => true
       ],
        \Vanilo\Cart\Providers\ModuleServiceProvider::class => [
            'migrations' => true
        ],
        \Vanilo\Checkout\Providers\ModuleServiceProvider::class => [
            'migrations' => true
        ],
        \Konekt\Address\Providers\ModuleServiceProvider::class => [
            'migrations' => true,
        ],
        \Vanilo\Order\Providers\ModuleServiceProvider::class => [
            'migrations' => true,
        ]
    ]
];
