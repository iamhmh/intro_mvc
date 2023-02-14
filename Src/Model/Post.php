<?php
class Post extends Model
{
    var $validate = [
        'name' => [
            'rule' => 'notEmpty',
            'message' => 'Vous devez préciser un titre'
        ],
        'slug' => [
            'rule' => '([a-z0-9\-]+)', //regex pour avoir toutes les lettres, tous els chiffres, ainsi que les -, et ca peut etre répété plusieurs fois (via le +)
            'message' => 'L\'url n\'est pas valide',
        ],
    ];
}