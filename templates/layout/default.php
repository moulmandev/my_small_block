<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= $this->Html->css([
        "main",
        "bootstrap.min.css"
    ]); ?>

    <title>
        <?= $this->fetch('title'); ?>
    </title>
</head>

<body>
    <?= $this->element('front/navigation'); ?>

    <?= $this->element('front/header'); ?>

    <?= $this->Flash->render(); ?>

    <?= $this->fetch('content'); ?>

    <?= $this->element('front/footer'); ?>


    <?= $this->Html->script([
        "jquery.min.js",
        "bootstrap.bundle.min"
    ]); ?>
<body>
</html>
