<?php 

namespace App\Model\Table;

use Cake\Auth\ORM\Query;//incluindo contrutor de Querys para criar consultas na DB.

use Cake\ORM\RulesChecker;//inclui ruleschecker para regras serem aplicadas antes que os dados sejam salvos.

use Cake\ORM\Table;//Table oferece acesso a tabelas do DB.

use Cake\Validation\Validator;

class UsersTable extends Table{
    public function initialize(array $config){
        
        parent::initialize($config);//parent para utilizar da classe pai.
        $this->table('users');//instanciando o tables. tabela users

        $this->addBehavior('Timestamp');
    }

    public function validationDefault(\Cake\Validation\Validator $validator){//para obrigar o preenchimmento no cadastro.
        $validator
        ->integer('id')//primeiro campo
        ->allowEmpty('id', 'create');//pode ser vazia e deve ser criada.

        $validator
        ->requirePresence('name')//obrigatorio requerer name.
        ->notEmpty('name');

        $validator
        ->requirePresence('email', 'create')//obrigatorio requerer name.
        ->notEmpty('email');

        $validator
        ->requirePresence('username', 'create')//obrigatorio requerer name.
        ->notEmpty('username');

        $validator
        ->requirePresence('password', 'create')//obrigatorio requerer name.
        ->notEmpty('password');

        return $validator;
    }

    public function buildRules(\Cake\ORM\RulesChecker $rules){//para deixar campo unico 
        $rules->add($rules->isUnique(['email'], 'Este e-mail já está cadastrado!'));
        $rules->add($rules->isUnique(['username'], 'Este usuário já está cadastrado!'));
        return $rules;
    }
}