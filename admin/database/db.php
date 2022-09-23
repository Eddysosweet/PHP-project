<?php
    class Database{
        private $server = 'localhost';
        private $username = 'root';
        private $password = '';
        private $database = 'unica';

        private $conn = NULL;

        //kết nối cơ sở dữ liệu
        public function connect(){
            $this->conn = new mysqli($this->server,$this->username,$this->password,$this->database);
            if($this->conn){
                mysqli_query($this->conn,"SET NAMES 'utf8'");
            }else{
                echo "kết nối thất bại";
            }
            return $this->conn;
        }

        // Teachers
        public function getListTeachers(){
            $sql = "SELECT * FROM  teachers ";
            $result = mysqli_query($this->connect(),$sql);
            return $result;
        }

        public function listpageTeachers($start,$limit){
            $sql = "SELECT * FROM  teachers LIMIT $start,$limit";
            $result = mysqli_query($this->connect(),$sql);
            return $result;
        }

        public function Add(){
            if(isset($_POST['add']) && $_FILES['avatar']['name']){
                $url = '../img/'. time() .$_FILES['avatar']['name'];
                move_uploaded_file($_FILES['avatar']['tmp_name'],$url);
                $name = $_POST['name'];

                $sql = "INSERT INTO teachers (name,avatar) VALUES ('$name','$url')";
                if($this->connect()->query($sql)){
                    header("location:../admin/listTeachers.php");
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
                    header("location:../admin/listTeachers.php");
                }else{
                    echo "lỗi";
                }
            }
        }

        public function delete($id){
            $sql = "DELETE FROM teachers WHERE id = $id";
            mysqli_query($this->connect(),$sql);
            header("location:../listTeachers.php");
        }

        //login
        public function login(){
            if(isset($_POST['login']) && $_POST['username'] = !'' && $_POST['password'] = !'' ){
                
                $email = $_POST['email'];
                $password = $_POST['passwords'];

                $sql = "SELECT * FROM admin WHERE username = '$email' and password = '$password' ";
                $result = mysqli_query($this->connect(),$sql);

                if(mysqli_num_rows($result) == 1){
                    $_SESSION['myEmail'] = $email;
                    header("location:../admin/admin.php");
                }else{
                   
                }
            }
        }

        // listCourses
        public function listCourses(){
            $sql = "SELECT * FROM courses";
            $result = mysqli_query($this->connect(),$sql);
            return $result;
        }
        public function EditIDCourses($id){
            $sql = "SELECT * FROM  courses WHERE id = $id";
            $result = mysqli_query($this->connect(),$sql);
            $array = mysqli_fetch_assoc($result);
            return $array;
        }

        public function listpageCoursess($start,$limit){
            $sql = "SELECT * FROM  courses LIMIT $start,$limit";
            $result = mysqli_query($this->connect(),$sql);
            return $result;
        }

        public function Addcourses(){
            if(isset($_POST['add']) && $_FILES['avatar']['name']){
                $url = '../img/'. time() .$_FILES['avatar']['name'];
                move_uploaded_file($_FILES['avatar']['tmp_name'],$url);
                $name = $_POST['name'];
                $time = $_POST['time'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $sql = "INSERT INTO courses (name,image,price,description,time) VALUES ('$name','$url','$price','$description','$time')";
                if($this->connect()->query($sql)){
                    header("location:../admin/listCourses.php");
                }else{
                    echo "lỗi";
                }
            }
        }
        
        function currency_format($number, $suffix = 'đ') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }

        public function editcourses($id){
            if(isset($_POST['edit']) && $_FILES['avatar']['name']){
                $url = '../img/'. time() .$_FILES['avatar']['name'];
                move_uploaded_file($_FILES['avatar']['tmp_name'],$url);
                $name = $_POST['name'];
                $time = $_POST['time'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $sql = "UPDATE courses SET name ='$name',image='$url',price='$price',description='$description',time='$time' WHERE id = '$id'";
                if($this->connect()->query($sql)){
                    header("location:../listCourses.php");
                }else{
                    echo "lỗi";
                }
            }
        }

        public function deleteCourses($id){
            $sql = "DELETE FROM courses WHERE id = $id";
            mysqli_query($this->connect(),$sql);
            header("location:../listCourses.php");
        }
    }

?>