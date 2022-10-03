<?php
require_once 'DB.php';

class OrderDAL extends DB
{
    public function __construct()
    {
        parent::__construct();//chạy các lệnh trong constructor của cha
        $this->setTableName("orders");
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM $this->tableName WHERE id=$id";
        $rs = $this->pdo->query($sql);
        $rs->setFetchMode(PDO::FETCH_OBJ);
        return $rs->fetch();
    }
    public function getList()
    {
        $sql = "SELECT * FROM $this->tableName";
        $rs = $this->pdo->query($sql);
        return $rs->fetchAll(PDO::FETCH_OBJ);
    }

    public function getOneByDate($date)
    {
        $sql = "SELECT * FROM $this->tableName WHERE created_date=$date";
        $rs = $this->pdo->query($sql);
        $rs->setFetchMode(PDO::FETCH_OBJ);
        return $rs->fetch();
    }
    public function getListByUserId($user_id)
    {
        $sql = "SELECT * FROM $this->tableName WHERE user_id=$user_id";
        $rs = $this->pdo->query($sql);
        $rs->setFetchMode(PDO::FETCH_OBJ);
        return $rs->fetchAll();
    }

    public function addOne($created_date,$user_id,$sub_total)
    {
        $prp = $this->pdo->prepare("INSERT INTO $this->tableName(created_date,user_id,sub_total) VALUES(:created_date,:user_id,:sub_total)");
        $prp->bindParam(':created_date', $created_date);
        $prp->bindParam(':user_id', $user_id);
        $prp->bindParam(':sub_total', $sub_total);
        try {
            $prp->execute();
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }//C
    public  function cancelOrder($id){
        $this->pdo->query("UPDATE $this->tableName SET status = 2 WHERE id=$id");

    }
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
    public function updateOne($id,$status)
    {
        $prp = $this->pdo->prepare("UPDATE $this->tableName SET status=:status WHERE id=$id");
        $prp->bindParam(':status', $status);
        try {
            $prp->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }//U

    public function check($user_id)
    {
        $prp = $this->pdo->query("SELECT count(*) FROM $this->tableName WHERE user_id= $user_id");
        $rs = $prp->fetchColumn();
        return $rs;
    }
}

?>