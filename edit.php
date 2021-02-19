<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Practical</title>
  </head>
  <body>
    <div class="text-center my-4">
      <h1>Update Your Details...</h1>  
    </div>
    <div class="container my-5">
       <?php

              include 'Model.php';
              $model = new Model();
              $id = $_REQUEST['id'];
              $row = $model->edit($id);

              if (isset($_POST['update'])) {

                  if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['country'])){

                      if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['country']) ){

                        $data['id'] = $id;
                        $data['fname'] = $_POST['fname'];
                        $data['lname'] = $_POST['lname'];
                        $data['address'] = $_POST['address'];
                        $data['city']= $_POST['city'];
                        $data['country'] = $_POST['country'];
                    

                        $update = $model->update($data);

                        if($update){
                          echo "<script>alert('record update successfully');</script>";
                          echo "<script>window.location.href = 'index.php';</script>";
                        }else{
                          echo "<script>alert('record update failed');</script>";
                          echo "<script>window.location.href = 'index.php';</script>";
                        }

                  }
                }
              }

          ?>
       <form action="" method="post">
  <div class="mb-3">
    <label  class="form-label">First_name</label>
    <input type="text" name="fname" class="form-control" id="fname" value="<?php echo $row['fname']; ?>">
  </div>
  <div class="mb-3">
    <label  class="form-label">Last_name</label>
    <input type="text" name="lname" class="form-control" id="lname" value="<?php echo $row['lname']; ?>">
  </div>
  <div class="mb-3">
    <label  class="form-label">Address</label>
    <input type="text" name="address" class="form-control" id="address" value="<?php echo $row['address']; ?>">
  </div>
  <div class="mb-3">
    <label  class="form-label">City</label>
    <input type="text" class="form-control" name="city" id="city" value="<?php echo $row['city']; ?>">
  </div>
  <div class="mb-3">
    <label  class="form-label">Country</label>
    <input type="text" class="form-control" name="country" id="country" value="<?php echo $row['country']; ?>">
  </div>
  
  <button type="submit" class="btn btn-primary" name="update">Update</button>
</form>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>