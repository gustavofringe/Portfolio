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

    protected $fillable = [

        'name' => [
            'rule' => 'preg',
            'cond' => '([a-zA-Z0-9-]+)',
            'message' => 'Ne doit comporter que des caractères alphanumérique'
        ],
        'sentence' => [
            'rule' => 'notEmpty',
            'message' => 'Ce champ doit être rempli'
        ],
        'image' => [
            'rule' => 'img',
            'cond' => ['jpg', 'png', 'svg'],
            'message' => 'Uniquement des fichiers avec les extensions: jpg,png,svg'
        ]

    ];
}
