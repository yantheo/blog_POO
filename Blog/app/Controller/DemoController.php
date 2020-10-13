<?php

namespace App\Controller;

//use Core\Database\QueryBuilder;

class DemoController extends AppController{

    public function index(){
        require ROOT . '/Query.php';
        //$query = new QueryBuilder();
        echo \Query::select('id', 'titre', 'contenu')
            ->from('articles', 'Post')
            ->where('Post.category_id = 1')
            ->where('Post.date > NOW()');
    }
}


