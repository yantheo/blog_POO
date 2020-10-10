<?php
$postTable = App::getInstance()->getTable('Post');
if (!empty($_POST)){
    $resultat = $postTable->create([
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu'],
        'category_id' => $_POST['category_id'],
    ]);
    if($resultat){
        header('Location: admin.php?p=posts.edit&id=' . App::getInstance()->getDb()->lastInsertId());
    }
}

$categories = App::getInstance()->getTable('Category')->extractList('id', 'titre');
$form = new Core\HTML\BootstrapForm($_POST);
?>
<form method="post">
    <?= $form->input('titre', 'Titre de l\'article');?>
    <?= $form->input('contenu', 'Contenu de l\'article', ['type' => 'textarea']);?>
    <?= $form->select('category_id', 'Catégorie', $categories);?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
