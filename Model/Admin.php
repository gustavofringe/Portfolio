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

    protected $fillable = [
        'username' => [
            'rule' => 'notEmpty',
            'message' => 'pasbon'
        ],
        'password' => [
            'rule' => 'notEmpty',
            'message' => 'nonval'
        ],
        'image' => [
            'rule' => 'img',
            'cond' => ['jpg', 'png', 'svg'],
            'message' => 'Uniquement des fichiers avec les extensions: jpg,png,svg'
        ]
    ];

}
