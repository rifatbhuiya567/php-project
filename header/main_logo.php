<?php 
    require '../dashboard-header.php';

    $select = "SELECT * FROM main_logos";
    $select_res = mysqli_query($db_connect, $select);
    $select_assoc = mysqli_fetch_assoc($select_res); 
?>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
		<div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Main Logo Update :</h3>
                    </div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['tl_error'])) { ?>
                            <div class="alert alert-danger">
                                <?=$_SESSION['tl_error']?>
                            </div>
                        <?php } unset($_SESSION['tl_error']); ?>
                        
                        <?php if(isset($_SESSION['tls_error'])) { ?>
                            <div class="alert alert-warning">
                                <?=$_SESSION['tls_error']?>
                            </div>
                        <?php } unset($_SESSION['tls_error']); ?>

                        <?php if(isset($_SESSION['tl_success'])) { ?>
                            <div class="alert alert-success">
                                <?=$_SESSION['tl_success']?>
                            </div>
                        <?php } unset($_SESSION['tl_success']); ?>
                        
                        <form action="main_logo_post.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="file" class="form-control" name="main_logo" onchange="document.getElementById('main_logo').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="mb-3">
                                <img id="main_logo" width="200" src="../uploads/logos/<?=$select_assoc['main_logo']?>" alt="logo"/>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="w-100 btn btn-primary">Update Logo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		</div>
    </div>
</div>
<!--**********************************
     Content body end
***********************************-->
<?php 
    require '../dashboard-footer.php';
?>