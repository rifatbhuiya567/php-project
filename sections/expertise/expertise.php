<?php
    require '../../dashboard-header.php';
    require '../../db.php';

    $select_ex = "SELECT * FROM expertise";
    $select_ex_res = mysqli_query($db_connect, $select_ex);
?>
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
                        <h3>Expertise List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead class="table-info">
                                <tr>
                                    <th>SL</th>
                                    <th>Topic</th>
                                    <th>Percentage</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($select_ex_res as $sl => $ex_res_value) { ?>
                                <tr>
                                    <td><?=$sl + 1?></td>
                                    <td><?=$ex_res_value['topic']?></td>
                                    <td><?=$ex_res_value['percentage']?></td>
                                    <td>
                                        <a href="ex_status.php?id=<?=$ex_res_value['id']?>" class="btn btn-<?=($ex_res_value['status'] == 0 ? 'light' : 'success')?>"><?=($ex_res_value['status'] == 0 ? 'Off' : 'On')?></a>
                                    </td>
                                    <td>
                                        <a href="ex_delete.php?id=<?=$ex_res_value['id']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
                        <h3>Add Expertise</h3>
                    </div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['added'])) { ?>
                            <div class="alert alert-success"><?=$_SESSION['added']?></div>
                        <?php } unset($_SESSION['added']) ?>

                        <?php if(isset($_SESSION['empty'])) { ?>
                            <div class="alert alert-danger"><?=$_SESSION['empty']?></div>
                        <?php } unset($_SESSION['empty']) ?>

                        <form action="expertise_post.php" method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="topic" placeholder="Topic Name">
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" name="percentage" placeholder="Percentage">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="w-100 btn btn-primary">Add Expertise</button>
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
    require '../../dashboard-footer.php';
?>
<?php if(isset($_SESSION['max'])) { ?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['max']?>',
        })
    </script>
<?php }  unset($_SESSION['max']) ?>

<?php if(isset($_SESSION['min'])) { ?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['min']?>',
        })
    </script>
<?php }  unset($_SESSION['min']) ?>

<?php if(isset($_SESSION['delete'])) { ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '<?=$_SESSION['delete']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php }  unset($_SESSION['delete']) ?>

<?php if(isset($_SESSION['do_not'])) { ?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['do_not']?>',
        })
    </script>
<?php }  unset($_SESSION['do_not']) ?>

