<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= $this->Html->css("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css", ["integrity" => "sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN", "crossorigin" => "anonymous"]); ?>
    <?= $this->Html->css([
        "main",
        "bootstrap.min.css"
    ]); ?>

    <title>
        <?= $this->fetch('title'); ?>
    </title>
</head>

<body>

<?= $this->Flash->render(); ?>

<?= $this->fetch('content'); ?>

<?= $this->Html->script([
    "jquery.min.js",
    "bootstrap.bundle.min"
]); ?>
<body>
</html>
