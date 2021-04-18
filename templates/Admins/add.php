<?= $this->Form->create($modEntity, ['url' => ['controller' => 'Admins', 'action' => 'add']])?>

<?= $this->Form->control('name', [
    'label' => 'Nom',
    'class' => 'form-control'
])?>

<?= $this->Form->control('description', [
    'type' => 'text',
    'label' => 'Description',
    'class' => 'form-control'
])?>

<?= $this->Form->control('price', [
    'type' => 'decimal',
    'label' => 'Prix',
    'class' => 'form-control'
])?>

<?= $this->Form->button('Valider', [
    'type' => 'submit',
    'escapeTitle' => false,
    'class' => 'btn btn-primary'
]);?>

<?= $this->Form->end(); ?>