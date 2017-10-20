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
    public function __construct()
    {
    }

    public $fillable = [
        'title'=>[
            'rule'=>'([A-Za-z0-9\s])',
            'message'=>'Votre titre ne doit contenir que des charactères alphanumérique'
        ],
        'url'=>[
            'rule'=>'([a-z0-9])',
            'message'=>'url incorrect! ne doit pas contenir d\'espace ni majuscule'
        ]
    ];
}
