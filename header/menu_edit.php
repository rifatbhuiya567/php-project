<?php 
    require '../dashboard-header.php';
    require '../db.php';

    $id = $_GET['id'];

    $m_select = "SELECT * FROM main_menu WHERE id = $id";
    $m_select_res = mysqli_query($db_connect, $m_select);
    $m_select_assoc = mysqli_fetch_assoc($m_select_res);
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
                        <h3>Edit menu :</h3>
                    </div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['update'])) { ?>
                            <div class="alert alert-success">
                                <?=$_SESSION['update']?>
                            </div>
                        <?php } unset($_SESSION['update']) ?>
                        <form action="menu_edit_post.php" method="POST">
                            <div class="mb-3">
                                <input type="hidden" name="id" value="<?=$m_select_assoc['id'] ?>">
                                <input type="text" name="name" class="form-control" value="<?=$m_select_assoc['menu_name'] ?>">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="s_id" class="form-control" value="<?=$m_select_assoc['sec_id'] ?>">
                            </div>
                            <button type="submit" class="w-100 btn btn-primary">Update Now</button>
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