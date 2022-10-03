<?php
require_once 'DB.php';
require_once 'ICRUD.php';

class CourseDAL extends DB implements ICRUD
{
    public function __construct()
    {
        parent::__construct();//chạy các lệnh trong constructor của cha
        $this->setTableName("course");
    }

    public function getList()
    {
        $sql = "SELECT *,course.name as course_name,course.id as course_id,teacher.name as teacher_name FROM $this->tableName LEFT JOIN teacher ON course.teacher_id = teacher.id";
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
        $prp = $this->pdo->prepare("INSERT INTO $this->tableName(name,image,teacher_id,price,description,time) VALUES(:name,:image,:teacher_id,:price,:description,:time)");
        $prp->bindParam(':name', $data['name']);
        $prp->bindParam(':image', $data['image']);
        $prp->bindParam(':teacher_id', $data['teacher_id']);
        $prp->bindParam(':price', $data['price']);
        $prp->bindParam(':description', $data['description']);
        $prp->bindParam(':time', $data['time']);
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
        $prp = $this->pdo->prepare("UPDATE $this->tableName SET name=:name,image=:image,teacher_id=:teacher_id,price=:price,description=:description, time=:time WHERE id=$id");
        $prp->bindParam(':name', $data['name']);
        $prp->bindParam(':image', $data['image']);
        $prp->bindParam(':teacher_id', $data['teacher_id']);
        $prp->bindParam(':price', $data['price']);
        $prp->bindParam(':description', $data['description']);
        $prp->bindParam(':time', $data['time']);
        try {
            $prp->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }//U
    public function getListByTeacherId($id)
    {
        $sql = "SELECT count(*) FROM $this->tableName WHERE teacher_id=$id";
        $rs = $this->pdo->query($sql)->fetchColumn();
        return $rs;
    }
    public function countCourse()
    {
        $sql = "SELECT COUNT(*) FROM $this->tableName";
        $rs = $this->pdo->query($sql)->fetchColumn();
        return $rs;
    }
    public function getListByPage($id,$so)
    {
        $sql = "SELECT * FROM $this->tableName LIMIT $id,$so";
        $rs = $this->pdo->query($sql);
        return $rs->fetchAll(PDO::FETCH_OBJ);
    }
}

?>