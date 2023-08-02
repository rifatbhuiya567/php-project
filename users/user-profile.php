<?php 
    require '../dashboard-header.php';

    require '../db.php';
?>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Profile Info Update</h2>
                    </div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['update'])) { ?>
                            <div class="alert alert-success">
                                <?=$_SESSION['update'];?>
                            </div>
                        <?php } unset($_SESSION['update']); ?>
                        <form action="user-info-update.php" method="POST">
                            <div class="mb-3">
                                <input type="hidden" name="user_id" class="form-control" value="<?=$select_user_assoc['id'];?>">
                                <input type="text" name="name" class="form-control" value="<?=$select_user_assoc['name'];?>">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="old_pass" class="form-control" placeholder="Current Password!" style="border-color: <?= (isset($_SESSION['incorrect_pass']) ? 'red' : '' ); ?>;">
                                <?php if(isset($_SESSION['incorrect_pass'])) { ?>
                                    <div class="alert alert-danger mt-1">
                                        <?=$_SESSION['incorrect_pass'];?>
                                    </div>
                                <?php } unset($_SESSION['incorrect_pass']); ?>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="pass" class="form-control" placeholder="New Password!">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="con_pass" class="form-control" placeholder="Confirm New Password!">
                                <?php if(isset($_SESSION['match_pass'])) { ?>
                                    <div class="alert alert-danger mt-1">
                                        <?=$_SESSION['match_pass'];?>
                                    </div>
                                <?php } unset($_SESSION['match_pass']); ?>
                            </div>
                            <div class="mb-3 w-100">
                                <button type="submit" class="btn btn-primary w-100">Update Info</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Profile Photo Update</h2>
                    </div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['extension_err'])) { ?>
                            <div class="alert alert-warning">
                                <?= $_SESSION['extension_err']; ?>
                            </div>
                        <?php } unset($_SESSION['extension_err']); ?>

                        <?php if(isset($_SESSION['size_err'])) { ?>
                            <div class="alert alert-warning">
                                <?= $_SESSION['size_err']; ?>
                            </div>
                        <?php } unset($_SESSION['size_err']); ?>

                        <?php if(isset($_SESSION['photo_update'])) { ?>
                            <div class="alert alert-success">
                                <?= $_SESSION['photo_update']; ?>
                            </div>
                        <?php } unset($_SESSION['photo_update']); ?>
                        <form action="user-photo-update.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="file" name="user_photo" class="form-control">
                            </div>
                            <div class="mb-3 w-100">
                                <button type="submit" class="btn btn-primary w-100">Update Photo</button>
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