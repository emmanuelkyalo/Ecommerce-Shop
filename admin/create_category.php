<?php
session_start();
if ($_SESSION["admin"] == "") {
    ?>

    <script type = "text/javascript">
        window.location = "login.php";

    </script>
    <?php
}
include 'header.php';
include 'databaseconnect.php';


$query = "select * from categories";
$res = mysqli_query($conn, $query);
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <?php include 'navbar.php'; ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="home.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Add Product</li>
            </ol>
            <div class="row">
                <div class="col-12">
                

                        <table class="table table-striped">
    <thead>
      <tr>
        <th>Category</th>
        <th>Remove</th>
      
      </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_array($res)) { ?>
                                           
  

                                            
      <tr>
        <td><?php echo $row["category_name"]; ?></td>
        <td><a href="delete_category.php?category_id=<?php echo $row["category_id"]; ?>">Delete</td></a>
       
      </tr>
     <?php }
     
     
     
     
     
     ?>
    </tbody>
  </table>    <form action="new_category.php" method="post" enctype="multipart/form-data">
      New Category <input type="text" name="new_category" > 
          <input type="submit" name="submit"value="Create" class="btn btn-primary"> 

                        </form>  
                    
                    
                    
                    
                    <br><br>
                        

                </div>
            </div>
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright © Urban Feet 2018</small>
                </div>
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin.min.js"></script>
    </div>
</body>

</html>
