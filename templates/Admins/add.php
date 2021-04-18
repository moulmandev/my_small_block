<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">AJOUTER UN MOD</h1>
    </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">

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

            <?= $this->Form->control('picture', [
                'type' => 'text',
                'label' => 'Url de l\'image',
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

        </div>
    </div>
</div>




