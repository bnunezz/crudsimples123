<div class="users index large-12 medium-12 columns content">
    <h3><?php echo 'Lista de Usuários'; ?></h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Açoes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario) : ?>
                <tr>
                    <td><?= $usuario->id; ?></td>
                    <td><?= $usuario->name; ?></td>
                    <td><?= $usuario->email; ?></td>
                    <td>
                        <?= $this->Html->link(('Ver'), ['action' => 'view', $usuario->id])?>
                        <?= $this->Html->link(('| Editar |'), ['action' => 'edit', $usuario->id])?>
                        <?= $this->Form->postLink(('Apagar'), ['action' => 'delete', $usuario->id], ['confirm' => 'Deseja apagar o usuário selecionado?',$usuario->id])?>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->Html->link(__('Cadastrar Usuário'), ['action' => 'add']) ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primeira'));?>
            <?= $this->Paginator->prev('< ' . __('Anterior'));?>
            <?= $this->Paginator->numbers();  ?>
            <?= $this->Paginator->next(__('Próxima' . ' >'));?>
            <?= $this->Paginator->last(__('Última' . ' >>'));?>
        </ul>
        <p>
            <?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrado {{current}} registro(s) do total de {{count}}')]);?>
        </p>
    </div>
</div>