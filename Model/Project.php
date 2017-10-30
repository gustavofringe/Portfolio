<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 30/10/17
 * Time: 13:15
 */
use App\Model;
class Project extends Model
{
    protected $fillable = [
        'title' => [
            'rule' => 'sanitize'
        ],
        'url' => [
            'rule' => 'preg',
            'cond' => '([a-z0-9]+)',
            'message' => 'Ne doit pas contenir d\'espaces ni majuscules'
        ],
        'folder' => [
            'rule' => 'preg',
            'cond' => '([a-z]+)',
            'message' => 'Ne doit contenir que des minuscules sans espaces'
        ],
        'subtitle' => [
            'rule' => 'sanitize'
        ],
        'techno' => [
            'rule' => 'sanitize'
        ],
        'link' => [
            'rule' => 'url',
            'message' => 'Url non valide'
        ],
        'content' => [
            'rule' => 'sanitize'
        ]
    ];
}
