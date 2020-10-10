<?php
$categoryTable = App::getInstance()->getTable('Category');
if (!empty($_POST)){
    $resultat = $categoryTable->create([
        'titre' => $_POST['titre']
    ]);
    if($resultat){
        header('Location: admin.php?p=categories.index');
    }
}

$form = new Core\HTML\BootstrapForm($_POST);
?>
<form method="post">
    <?= $form->input('titre', 'Titre de l\'article');?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
