<?php


namespace Core\Database;
use \PDO;


class MysqlDatabase extends Database
{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;


    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO()
    {
        if($this->pdo === null)
        {
            $pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host , $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
            return $pdo;
        }
        return $this->pdo;

    }

    public function query($statement, $class_name = null, $one = false)
    {
        $requete = $this->getPDO()->query($statement);
        if(
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ){
            return $requete;
        }
        if ($class_name === null)
        {
            $requete->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $requete->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one)
        {
            $datas = $requete->fetch();
        }
        else {
            $datas = $requete->fetchAll();
        }
        return $datas;
    }

    public function prepare($statement, $values, $class_name = null, $one = false)
    {
        $requete = $this->getPDO()->prepare($statement);
        $resultat = $requete->execute($values);
        if(
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ){
            return $resultat;
        }
        if ($class_name === null)
        {
            $requete->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $requete->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one)
        {
            $datas = $requete->fetch();
        }
        else {
            $datas = $requete->fetchAll();
        }
        return $datas;
    }

    public function lastInsertId(){
        return $this->getPDO()->lastInsertId();
    }

}