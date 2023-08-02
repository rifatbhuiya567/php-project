<?php 
    require '../dashboard-header.php';
    require '../db.php';

    $menu = "SELECT * FROM main_menu";
    $menu_res = mysqli_query($db_connect, $menu);
?>

<style>
    table tbody tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    table tbody tr:nth-child(even):hover {
        background-color: #f2f2f2;
        transition: all ease .5s;
    }

    
</style>

<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
		<div class="row">
        <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Menu List :</h3>
                    </div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['delete'] )) { ?>
                            <div class="alert alert-success">
                                <?=$_SESSION['delete'] ?>
                            </div>
                        <?php } unset($_SESSION['delete'] ) ?>
                        <table class="table table-bordered text-center">
                            <thead class="table-info">
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Sec. Id</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($menu_res as $sl => $menus) { ?>
                                <tr>
                                    <td><?=$sl+1?></td>
                                    <td><?=$menus['menu_name']?></td>
                                    <td><?=$menus['sec_id']?></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="menu_edit.php?id=<?=$menus['id']?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="menu_delete.php?id=<?=$menus['id']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Menu :</h3>
                    </div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['menu_err'])) { ?>
                            <div class="alert alert-danger">
                                <?=$_SESSION['menu_err']?>
                            </div>
                        <?php } unset($_SESSION['menu_err']) ?>

                        <?php if(isset($_SESSION['menu_succ'])) { ?>
                            <div class="alert alert-success">
                                <?=$_SESSION['menu_succ']?>
                            </div>
                        <?php } unset($_SESSION['menu_succ']) ?>

                        <form action="main_menu_post.php" method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="name" placeholder="Menu name!">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="id" placeholder="Section id!">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Add Menu</button>
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