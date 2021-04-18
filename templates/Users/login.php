<?php
$this->assign('title', 'Page de login');
$this->layout = 'mini';
?>

<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign In</h5>
                    <?= $this->Form->create() ?>
                    <fieldset>
                        <legend><?= __('Please enter your email and password') ?></legend>
                        <?= $this->Form->control('email', ['required' => true, 'class' => 'form-control']) ?>
                        <?= $this->Form->control('password', ['required' => true, 'class' => 'form-control']) ?>
                    </fieldset>
                    <?= $this->Form->submit(__('Login'), ['class' => 'btn btn-primary']); ?>
                    <?= $this->Form->end() ?>

                    <?= $this->Html->link("Add admin (admin@admin.fr admin)", ['controller' => 'Users', 'action' => 'addAdmin']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
