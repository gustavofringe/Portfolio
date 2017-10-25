<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 19/10/17
 * Time: 14:48
 */

use App\Model;

class Contact extends Model
{

    public $fillable = [
        //form contact
        'lastname' => [
            'rule' => '([a-zA-Z-]+)',
            'message' => 'Votre nom est incorrect'
        ],
        'firstname' => [
            'rule' => '([a-zA-Z-]+)',
            'message' => 'Votre prénom est incorrect'
        ],
        'email' => [
            'rule'=>'email',
            'message' => 'Email incorrect'
        ],
        'phone' => [
            'rule' => '([0-9]+)',
            'message' => 'Numéro de téléphone incorrect(ne doit contenir que des chiffres)'
        ],
        'society' => [
            'rule' => '([a-zA-Z-\s]+)',
            'message' => 'Ne doit contenir que des caractères alphabnumérique et des tirets'
        ],
        'msg' => [
            'rule' => 'sanitize',
        ]
    ];
}
