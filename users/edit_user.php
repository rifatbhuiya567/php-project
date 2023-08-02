<?php 
    require '../dashboard-header.php';
    require '../db.php';

    $id = $_GET['id'];
    $select_id = "SELECT * FROM re_users WHERE id = $id";
    $select_id_res = mysqli_query($db_connect, $select_id);
    $id_assoc = mysqli_fetch_assoc($select_id_res);
?>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
		<div class="row justify-content-center">
            <?php if($select_user_assoc['role'] == 1) { ?>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit user :</h2>
                    </div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['update_suc'])) { ?>
                            <div class="alert alert-success">
                                <?=$_SESSION['update_suc'];?>
                            </div>
                        <?php } unset($_SESSION['update_suc']); ?>
                        <form action="edit_process.php" method="POST">
                            <div class="mb-3">
                                <div class="d-flex align-items-center" style="gap: 20px;">
                                    <div class="w-50 d-flex justify-content-between align-items-center">
                                        <p class="text-primary"><b>Current Role :</b></p>
                                        <?php if($id_assoc['role'] == 2) { 
                                          echo "<span class='badge badge-success'>Admin</span>";
                                        }elseif($id_assoc['role'] == 3) {
                                            echo  "<span class='badge badge-primary'>Moderator</span>";
                                        }elseif($id_assoc['role'] == 4) {
                                            echo  "<span class='badge badge-primary'>Editor</span>";
                                        }else {
                                            echo  "<span class='badge badge-danger'>Not assign</span>";
                                        } ?>
                                    </div>
                                    <div class="w-50 d-flex justify-content-between align-items-center">
                                        <p class="text-primary"><b>Change Role :</b></p>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-info light sharp" data-toggle="dropdown" aria-expanded="false">
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                            </button>
                                            <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 0px, 0px);">
                                                <a class="dropdown-item" href="edit_admin_role.php?id=<?=$id_assoc['id']?>">Admin</a>
                                                <a class="dropdown-item" href="edit_moderator_role.php?id=<?=$id_assoc['id']?>">Moderator</a>
                                                <a class="dropdown-item" href="edit_editor_role.php?id=<?=$id_assoc['id']?>">Editor</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="e_name">Name</label>
                                <input type="text" name="name" id="e_name" class="form-control" value="<?=$id_assoc['name']?>">
                                <input type="hidden" name="user_id" value="<?=$id_assoc['id']?>">
                            </div>
                            <div class="mb-3">
                                <label for="e_email">Email</label>
                                <input type="email" name="email" id="e_email" class="form-control" value="<?=$id_assoc['email']?>">
                            </div>
                            <div class="mb-3">
                                <label for="e_password">Password</label>
                                <input type="password" name="password" id="e_password" class="form-control" placeholder="Password!">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="w-100 btn btn-primary">Edit User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php }else { ?>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4>Only <span class="text-primary">Super Admin</span> can </h4>
                    </div>
                </div>
            </div>
            <?php } ?>
		</div>
    </div>
</div>
<!--**********************************
     Content body end
***********************************-->
<?php 
    require '../dashboard-footer.php';
?>