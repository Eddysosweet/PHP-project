<?php
require_once 'DB.php';

class CartDAL extends DB
{
    public function __construct()
    {
        parent::__construct();//chạy các lệnh trong constructor của cha
        $this->setTableName("cart");
    }

    public function getList()
    {
        $sql = "SELECT * FROM $this->tableName";
        $rs = $this->pdo->query($sql);
        return $rs->fetchAll(PDO::FETCH_OBJ);
    }

    public function getOneByUserID($id)
    {
        $sql = "SELECT * FROM $this->tableName WHERE user_id=$id";
        $rs = $this->pdo->query($sql);
        $rs->setFetchMode(PDO::FETCH_OBJ);
        return $rs->fetch();
    }//R - one

    public function addOne($user_id)
    {
        $prp = $this->pdo->prepare("INSERT INTO $this->tableName(user_id) VALUES(:user_id)");
        $prp->bindParam(':user_id', $user_id);
        try {
            $prp->execute();
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }//C

    public function deleteOne($id)
    {

        try {
            //code...
            $this->pdo->query("DELETE FROM $this->tableName WHERE id=$id");
        } catch (\Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }

    }//D

    public function check($user_id)
    {
        $prp = $this->pdo->query("SELECT count(*) FROM $this->tableName WHERE user_id= $user_id");
        $rs = $prp->fetchColumn();
        return $rs;
    }
    public function resetTable()
    {
        try {
            //code...
            $this->pdo->query("TRUNCATE TABLE $this->tableName");
        } catch (\Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
}

?>