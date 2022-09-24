<?php
require_once 'DB.php';
require_once 'ICRUD.php';

class TeacherDAL extends DB implements ICRUD
{
    public function __construct()
    {
        parent::__construct();//chạy các lệnh trong constructor của cha
        $this->setTableName("teacher");
    }

    public function getList()
    {
        $sql = "SELECT * FROM $this->tableName";
        $rs = $this->pdo->query($sql);
        return $rs->fetchAll(PDO::FETCH_OBJ);
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM $this->tableName WHERE id=$id";
        $rs = $this->pdo->query($sql);
        $rs->setFetchMode(PDO::FETCH_OBJ);
        return $rs->fetch();
    }//R - one

    public function addOne($data)
    {
        $prp = $this->pdo->prepare("INSERT INTO $this->tableName(name,avatar,degree) VALUES(:name,:image,:degree)");
        $prp->bindParam(':name', $data['name']);
        $prp->bindParam(':image', $data['image']);
        $prp->bindParam(':degree', $data['degree']);
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

    public function updateOne($id, $data)
    {
        $prp = $this->pdo->prepare("UPDATE $this->tableName SET name=:name,avatar=:image, degree=:degree WHERE id=$id");
        $prp->bindParam(':name', $data['name']);
        $prp->bindParam(':image', $data['image']);
        $prp->bindParam(':degree', $data['degree']);
        try {
            $prp->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }//U
}

?>