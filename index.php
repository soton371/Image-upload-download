
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/responsive/responsive.css">

    <!-- for bootstrap4 css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>


<body>
    
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="assets/includes/gallery-upload.php" method="POST" enctype="multipart/form-data">
                        <h2>today’s special moments.</h2>

                        <input type="file" name='picture' accept="image/*"><br>
                        <input type="submit" value="UPLOAD IMAGE" name="submit" class="btn btn-info">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="image_show">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center my-4">
                <h2>Photos Gallery</h2>
                </div>
            </div>
            <div class="row">
                 
                <?php
                    include_once "assets/includes/database.php";

                    $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
                    $stmt = mysqli_stmt_init($connect);

                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        echo "SQL not prepares";

                    }else{
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        while($row = mysqli_fetch_assoc($result)){
                            echo '<div class="col-sm-6 col-md-4 p-2 p-sm-2 p-md-3">
                                    <div class="img_box">
                                        <a href="assets/store/'.$row["imgFullNameGallery"].'">
                                            <div style="background-image: url(assets/store/'.$row["imgFullNameGallery"].');"></div>
                                        </a>
                                    </div>
                                    </div>';
                        }
                    }
                    
                ?>
                   
            </div>
        </div>
    </div>
       


<!-- for bootstrap4 css -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>