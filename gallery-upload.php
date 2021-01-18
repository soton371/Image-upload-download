<?php

if(isset($_POST['submit'])){

    $upload_file = $_FILES['picture'];
    
    $file_name = uniqid().$upload_file['name'];
    $file_tmp_name = $upload_file['tmp_name'];

    $caught_ext = explode(".", $file_name);
    $extension = end($caught_ext);
    $allow_ext = array('jpg','jpeg','png');

    if(in_array($extension, $allow_ext)){
        
        include_once "database.php";
        $sql = "SELECT * FROM gallery;";
        $stmt = mysqli_stmt_init($connect);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "SQL stmt not prepared";

        }else{
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            $row_count = mysqli_num_rows($result);
            $set_pic_order = $row_count + 1;

            $sql = "INSERT INTO gallery(imgFullNameGallery, orderGallery) VALUES(?, ?);";
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "SQL stmt not prepared";
    
            }else{
                mysqli_stmt_bind_param($stmt, "ss", $file_name, $set_pic_order);
                mysqli_stmt_execute($stmt);

                move_uploaded_file($file_tmp_name, '../store/'.$file_name);

                header("Location: ../../index.php?upload=success");
            }
        }
    }else{
        echo "you can only (jpg, jpeg, phn) file upload";
        exit();
    }



}