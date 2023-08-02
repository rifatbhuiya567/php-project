<?php 
    require '../dashboard-header.php';
    require '../db.php';

    $h_select = "SELECT * FROM hero_area";
    $h_select_res = mysqli_query($db_connect, $h_select);
    $h_select_assoc = mysqli_fetch_assoc($h_select_res);
?>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
		<div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Hero area content :</h3>
                    </div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['updated'])) { ?>
                            <div class="alert alert-success">
                                <?=$_SESSION['updated']?>
                            </div>
                        <?php } unset($_SESSION['updated']) ?>
                        <form action="hero_area_post.php" method="POST" enctype="multipart/form-data">
                            <div class="d-flex">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Sub Title :</label>
                                        <input type="text" name="sub_title" class="form-control" value="<?=$h_select_assoc['sub_title']?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Title :</label>
                                        <input type="text" name="title" class="form-control" value="<?=$h_select_assoc['title']?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Paragraph :</label>
                                        <textarea name="paragraph" cols="30" rows="4" class="form-control"><?=$h_select_assoc['paragraph']?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Action Name :</label>
                                        <input type="text" name="action_name" class="form-control" value="<?=$h_select_assoc['action_name']?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Action Link :</label>
                                        <input type="text" name="action_link" class="form-control" value="<?=$h_select_assoc['action_link']?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Image :</label>
                                        <input class="form-control" type="file" name="banner_image" onchange="document.getElementById('banner_image').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    <div class="mb-3">
                                        <img style="width: 80%; height: 440px; object-fit: cover; object-position: center;" id="banner_image" src="../uploads/banner_image/<?=$h_select_assoc['image']?>" alt="">
                                    </div>
                                </div>
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