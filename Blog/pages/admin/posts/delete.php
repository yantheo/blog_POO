<?php
$postTable = App::getInstance()->getTable('Post');
if (!empty($_POST)){
    $resultat = $postTable->delete($_POST['id']);
    header('Location: admin.php');
}
