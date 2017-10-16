<?php
namespace App;
class Conf{
    static $databases = [
        'default' =>[
            'host'      =>'127.0.0.1',
            'database'  =>'portfolio',
            'login'     =>'root',
            'password'  =>'root'
        ],
        'distrib' =>[
            'host'      =>'',
            'database'  =>'',
            'login'     =>'',
            'password'  =>''
        ]
    ];
}
