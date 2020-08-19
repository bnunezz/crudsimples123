<?php
//atribuir namespace por causa do composer
namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController{

    public function index(){

        $this->paginate = [
            'limit' => 20,
            'order' => [
                "Users.id" => 'asc',
            ]
        ];
        
        $usuarios = $this->paginate($this->Users);
        
        $this->set(compact('usuarios'));
    }

    public function view($id = null){
        $usuario = $this->Users->get($id);
        $this->set(['usuario' => $usuario]);
    }

    public function add(){
        //instanciando new entity para manipular os dados
        $user = $this->Users->newEntity();
        if($this->request->is('post')){
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if($this->Users->save($user)){
                $this->Flash->success(__('Usuário cadastrado com sucesso!'));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->success(__('Erro: Usuário não foi cadastrado!'));

            }
        }

        //enviando para a view
        $this->set(compact('user'));
    }

    public function edit($id = null){
        $user = $this->Users->get($id);//get pois vira da url

        if($this->request->is(['post', 'put'])){
            $user = $this->Users->patchEntity($user, $this->request->getData());

           if ($this->Users->save($user)){
               $this->Flash->success('Usuário editado!');
               return $this->redirect(['action' => 'index']);
           }else{
                $this->Flash->error('Usuário não foi editado!');
           }

        }

        $this->set(compact('user'));//enviando para a view
    }

    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if($this->Users->delete($user)){
            $this->Flash->success('O usuário foi apagado!');
        }else{
            $this->Flash->error(('O usuário não foi apagado!'));
            
        }
        return $this->redirect(['action' => 'index']);
    }
}