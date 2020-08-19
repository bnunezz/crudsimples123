<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

use Cake\Auth\DefaultPasswordHasher;//habilita criptografia da senha.

class User extends Entity{

    public $_accessible = [//permiti acesso dos campos da DB.
        'id' => true,
        'name' => true,
        'email' => true,
        'username' => true,
        'password' => true,
        'created' => true,
        'modified' => true,
    ];

    protected function _setPassword($password){
        if(strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}