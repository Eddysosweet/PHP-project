<?php
    class Database{
        private $server = 'localhost';
        private $usename = 'root';
        private $password = '';
        private $database = 'unica';

        private $conn = NULL;

        //kết nối cơ sở dữ liệu
        public function connect(){
            $this->conn = new mysqli($this->server,$this->usename,$this->password,$this->database);
            if($this->conn){
                mysqli_query($this->conn,"SET NAMES 'utf8'");
            }else{
                echo "kết nối thất bại";
            }
            return $this->conn;
        }

        // Teachers
        public function getListTeachers(){
            $sql = "SELECT * FROM  teachers";
            $result = mysqli_query($this->connect(),$sql);
            return $result;
        }

        public function Add(){
            if(isset($_POST['add'])){
                $avatar = $_FILES['avatar']['name'];
                $avatar_name = $_FILES['avatar']['tmp_name'];
                $name = $_POST['name'];

                $sql = "INSERT INTO teachers (name,avatar) VALUES ('$name',$avatar)";
                if($this->connect()->query($sql)){
                    header("location:http://localhost/php-project/admin/home/listTeachers.php");
                }else{
                    echo "lỗi";
                }
            }
        }

        public function EditIDTeachers($id){
            $sql = "SELECT * FROM  teachers WHERE id = $id";
            $result = mysqli_query($this->connect(),$sql);
            $array = mysqli_fetch_assoc($result);
            return $array;
        }

        public function edit($id){
            if(isset($_POST['edit']) && $_FILES['avatar']['name']){
                $avatar = $_FILES['avatar']['name'];
                $avatar_name = $_FILES['avatar']['tmp_name'];
                $name = $_POST['name'];

                $sql = "UPDATE teachers set name = '$name',avatar = '$avatar' WHERE id = $id";
                move_uploaded_file($avatar_name,'img/'.$avatar);
                if($this->connect()->query($sql)){
                    header("location:http://localhost/php-project/admin/home/listTeachers.php");
                }else{
                    echo "lỗi";
                }
            }
        }

        public function delete($id){
            $sql = "DELETE FROM teachers WHERE id = $id";
            mysqli_query($this->connect(),$sql);
            header("location:http://localhost/php-project/admin/home/listTeachers.php");
        }
    }

?>