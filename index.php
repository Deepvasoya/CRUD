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
    <h1>Enter Your Details Here</h1>
  </div>
  <div class="container my-5">
    <?php

    include 'Model.php';
    $model = new Model();
    $insert = $model->insert();


    ?>
    <form action="" method="post">
      <div class="mb-3">
        <label class="form-label">First_name</label>
        <input type="text" name="fname" class="form-control" id="name">
      </div>
      <div class="mb-3">
        <label class="form-label">Last_name</label>
        <input type="text" name="lname" class="form-control" id="lname">
      </div>
      <div class="mb-3">
        <label class="form-label">Address</label>
        <input type="text" name="address" id="address" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">City</label>
        <input type="text" class="form-control" name="city" id="city">
      </div>
      <div class="mb-3">
        <label class="form-label">Country</label>
        <input type="text" class="form-control" name="country" id="country">
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>

  <div class="container my-4">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">First_name</th>
          <th scope="col">Last_name</th>
          <th scope="col">Address</th>
          <th scope="col">City</th>
          <th scope="col">Country</th>
          <th scope="col">Operation</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $model = new Model();
        $rows = $model->fetch();
        $i = 1;
        if (!empty($rows)) {
          foreach ($rows as $row) {
        ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $row['fname']; ?></td>
              <td><?php echo $row['lname']; ?></td>
              <td><?php echo $row['address']; ?></td>
              <td><?php echo $row['city']; ?></td>
              <td><?php echo $row['country']; ?></td>
              <td>
                <a href="delete.php?id=<?php echo $row['id']; ?>" type="button" class="btn btn-danger">Delete</a>
                <a href="edit.php?id=<?php echo $row['id']; ?>" type="button" class="btn btn-success">Edit</a>
              </td>
            </tr>
        <?php
          }
        } else {
          echo "no data";
        }

        ?>
      </tbody>
    </table>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>