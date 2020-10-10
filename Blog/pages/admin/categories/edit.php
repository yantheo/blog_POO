<?php
$categoryTable = App::getInstance()->getTable('Category');
if (!empty($_POST)){
    $resultat = $categoryTable->update($_GET['id'], [
        'titre' => $_POST['titre']
    ]);
    if($resultat){
        ?>
        <div class="alert alert-success">La catégorie a bien été mis à jour</div>
        <?php
    };
}

$category = $categoryTable->find($_GET['id']);
$form = new Core\HTML\BootstrapForm($category);
?>
<form method="post">
    <?= $form->input('titre', 'Titre de la catégorie');?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
