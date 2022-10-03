<?php
require_once 'DB.php';

class OrderDetailDAL extends DB
{
    public function __construct()
    {
        parent::__construct();//chạy các lệnh trong constructor của cha
        $this->setTableName("order_detail");
    }

    public function getListByOrderId($id)
    {
        $sql = "SELECT * FROM $this->tableName WHERE order_id= $id";
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

    public function addOne($course_id,$name,$image,$time,$order_id,$price,$description)
    {
        $prp = $this->pdo->prepare("INSERT INTO $this->tableName(course_id,name,image,time, order_id,price,description) VALUES(:course_id,:name,:image,:time,:order_id,:price,:description)");
        $prp->bindParam(':course_id', $course_id);
        $prp->bindParam(':name', $name);
        $prp->bindParam(':image', $image);
        $prp->bindParam(':time', $time);
        $prp->bindParam(':order_id', $order_id);
        $prp->bindParam(':price', $price);
        $prp->bindParam(':description', $description);
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
    public function checkId($id, $order_id)
    {
        $prp = $this->pdo->prepare("SELECT count(*) FROM $this->tableName WHERE course_id=:course_id AND cart_id=:order_id");
        $prp->bindParam(':course_id', $id);
        $prp->bindParam(':cart_id', $order_id);
        $prp->execute();
        $rs = $prp->fetchColumn();
        return $rs;
    }

}

?>