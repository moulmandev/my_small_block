<?= $this->Form->create(null, ['url' => ['controller' => 'Admins', 'action' => 'add']])?>

<?= $this->Form->control('name', [
    'label' => 'Nom',
    'class' => 'form-control'
])?>