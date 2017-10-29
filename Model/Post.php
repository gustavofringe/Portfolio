<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 19/10/17
 * Time: 09:43
 */

use App\Model;


class Post extends Model
{

    public $fillable = [

        'name'=>[
            'rule'=>'preg',
            'cond'=>'([a-zA-Z-]+)',
            'message'=>'pasbon!'
        ],
        'sentence'=>[
            'rule'=>'notEmpty',
            'message'=>'pasbon!!!'
        ],
        'image'=>[
            'rule'=>'img',
            'cond'=>['jpg','png','svg'],
            'message'=>'Uniquement des fichiers avec les extensions: jpg,png,svg'
        ]


    ];
}
