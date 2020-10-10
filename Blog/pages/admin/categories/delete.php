<?php
$categoryTable = App::getInstance()->getTable('Category');
if (!empty($_POST)){
    $resultat = $categoryTable->delete($_POST['id']);
    header('Location: admin.php?p=categories.index');
}
