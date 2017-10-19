<?php

use App\Model;


/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 17/10/17
 * Time: 11:55
 */


class Admin extends Model
{

    public $fillable = [
        'username' => [
            'rule' => 'notEmpty',
            'message' => 'pasbon'
        ],
        'password' => [
            'rule' => 'notEmpty',
            'message' => 'nonval'
        ]
    ];

}
