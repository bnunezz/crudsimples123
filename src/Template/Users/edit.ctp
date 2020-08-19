<h1>Editar Usuário</h1>
<?php
echo $this->Form->create($user);//criando formulario

echo $this->Form->control('name');
echo $this->Form->control('email');
echo $this->Form->control('username');
echo $this->Form->control('password');

echo $this->Form->button('Salvar');

echo $this->Form->end();//terminando formulario