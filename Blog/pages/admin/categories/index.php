<?php
$categories = App::getInstance()->getTable('Category')->all();
?>

<h1>Administrer les catégories</h1>

<p>
    <a href="?p=categories.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
        <?php foreach($categories as $categorie): ?>
            <tr>
                <td><?= $categorie->id; ?></td>
                <td><?= $categorie->titre ;?></td>
                <td>
                    <a href="?p=categories.edit&id=<?= $categorie->id; ?>" class="btn btn-primary">Modifier</a>
                    <form method="post" action="?p=categories.delete" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $categorie->id ?>">
                        <button type="submit" class="btn btn-danger">Effacer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>