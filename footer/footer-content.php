<?php 
    require '../dashboard-header.php';
    require '../db.php';

    $c_select = "SELECT * FROM footer_contents";
    $c_select_res = mysqli_query($db_connect, $c_select);
    $c_select_assoc = mysqli_fetch_assoc($c_select_res);

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
                        <h3>Footer Content :</h3>
                    </div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['updated'])) { ?>
                            <div class="alert alert-success">
                                <?=$_SESSION['updated']?>
                            </div>
                        <?php } unset($_SESSION['updated']) ?>
                        <form action="content_post.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Brand Name :</label>
                                <input type="text" name="brand_name" class="form-control" value="<?=$c_select_assoc['brand_name']?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Copyright :</label>
                                <textarea name="copyright" class="form-control" cols="30" rows="4"><?=$c_select_assoc['copyright']?></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="w-100 btn btn-primary">Update Content</button>
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