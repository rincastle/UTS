
<?php 
    session_start();
    if($_SESSION['role']!= 'admin'){
        session_destroy();
        header('Location:index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Lihat Product</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="./css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Tugas Rindi</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="admin.php">Home</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 active" href="product.php">Lihat Product</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="create.php">Input Product</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <a class="btn btn-danger" href="./backend/logout.php">Log Out</a>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <h1>Data produk</h1>
    <table class="table">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Nama produk</th>
                <th>harga</th>
                <th>gambar produk</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require './config/db.php';
                $base_url = "http://localhost/UTS_Rindi";

                $products = mysqli_query($db_connect,"SELECT * FROM products");
                $no = 1;

                while($row = mysqli_fetch_assoc($products)) {
            ?>
                <tr>
                    <td><?=$no++;?></td>
                    <td><?=$row['name'];?></td>
                    <td><?=$row['price'];?></td>
                    <!-- <td><img src="<?=$row['image'];?>" width="100"></td> -->
                    <td><a href="<?php echo $base_url ?><?=$row['image'];?>" class="btn btn-info" target="_blank">Lihat</a></td>
                    <td>
                        
                        <!-- <a href="./backend/edit.php?id=<?=$row['id'];?>">Edit</a> -->
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit</button>
                        <a href="./backend/delete.php?id=<?=$row['id'];?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form method="post" enctype="multipart/form-data" action="./backend/edit.php">
    <h2>Edit Data</h2>
  <div class="mb-3">
    <label for="Name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="Name" aria-describedby="emailHelp" required >
  </div>
  <div class="mb-3">
    <label for="Price" class="form-label">Price</label>
    <input type="number" name="price" class="form-control" id="Price" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="Image" class="form-label">Image</label>
    <input type="file" name="image" class="form-control" id="Image" aria-describedby="emailHelp" required>
  </div>
  <a class="btn btn-danger" href="product.php">Cancel</a>
  <input type="submit" name="update" class="btn btn-primary" value="Edit">
</form>
      </div>
    </div>
  </div>
</div>
    
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
