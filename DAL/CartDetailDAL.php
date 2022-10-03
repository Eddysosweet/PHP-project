<?php
require_once 'DB.php';

class CartDetailDAL extends DB
{
    public function __construct()
    {
        parent::__construct();//chạy các lệnh trong constructor của cha
        $this->setTableName("cart_detail");
    }

    public function getListByCartId($id)
    {
        $sql = "SELECT * FROM cart_detail WHERE cart_id= $id";
        $rs = $this->pdo->query($sql);
        $rs->setFetchMode(PDO::FETCH_OBJ);
        return $rs->fetchAll();
    }
    public function getOne($id)
    {
        $sql = "SELECT * FROM $this->tableName WHERE id=$id";
        $rs = $this->pdo->query($sql);
        $rs->setFetchMode(PDO::FETCH_OBJ);
        return $rs->fetch();
    }//R - one

    public function addOne($course_id,$cart_id)
    {
        $prp = $this->pdo->prepare("INSERT INTO $this->tableName(course_id, cart_id) VALUES(:course_id,:cart_id)");
        $prp->bindParam(':course_id', $course_id);
        $prp->bindParam(':cart_id', $cart_id);
        try{
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

    }
    public function checkId($id, $cart_id)
    {
        $prp = $this->pdo->prepare("SELECT count(*) FROM $this->tableName WHERE course_id=:course_id AND cart_id=:cart_id");
        $prp->bindParam(':course_id', $id);
        $prp->bindParam(':cart_id', $cart_id);
        $prp->execute();
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