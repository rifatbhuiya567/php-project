<?php
    require '../../dashboard-header.php';
    require '../../db.php';

    $select_portfolio = "SELECT * FROM portfolios";
    $select_portfolio_res = mysqli_query($db_connect, $select_portfolio);
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
                        <h3>Portfolio List :</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead class="table-info">
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($select_portfolio_res as $sl => $portfolio) { ?>
                                <tr>
                                    <td><?=$sl+1?></td>
                                    <td><?=$portfolio['title']?></td>
                                    <td><?=$portfolio['sub_title']?></td>
                                    <td>
                                        <img src="../../uploads/portfolios/<?=$portfolio['image']?>" width="100" alt=""/>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger del-btn" data-link="portfolio_delete.php?id=<?=$portfolio['id']?>">Delete</button>
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
                        <h3>Add Portfolios</h3>
                    </div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['submit'])) { ?>
                            <div class="alert alert-success"><?=$_SESSION['submit']?></div>
                        <?php } unset($_SESSION['submit']) ?>
                        <form action="portfolio_post.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="text" name="title" placeholder="Title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="sub_title" placeholder="Sub Title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="file" name="image" class="form-control">
                            </div>
                            <button class="btn btn-primary w-100" type="submit">Add Portfolio</button>
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
<?php if(isset($_SESSION['minimum'])) { ?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['minimum']?>',
        })
    </script>
<?php } unset($_SESSION['minimum']) ?>
<script>
    $(".del-btn").click(function(){
        var link = $(this).attr("data-link");

        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
            }
        })
    });
</script>
<?php if(isset($_SESSION['delete'])) { ?>
    <script>
        Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        '<?=$_SESSION['delete']?>'
        )
    </script>
<?php } unset($_SESSION['delete']) ?>