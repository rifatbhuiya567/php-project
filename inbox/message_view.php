<?php
    require '../db.php';

    $id = $_GET['id'];

    $update = "UPDATE messages SET status=1 WHERE id=$id";
    mysqli_query($db_connect, $update);

    require '../dashboard-header.php';

    $select_mess = "SELECT * FROM messages WHERE id=$id";
    $select_mess_res = mysqli_query($db_connect, $select_mess);
    $select_mess_assoc = mysqli_fetch_assoc($select_mess_res);
?>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    <p>Inbox / <b>Read</b></p>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="right-box-padding">
                            <div class="read-content">
                                <div class="media pt-3 d-sm-flex d-block justify-content-between">
                                    <div class="clearfix mb-3 d-flex">
                                        <div class="media-body">
                                            <h5 class="text-primary mb-0 mt-1">From, <b><?=$select_mess_assoc['name']?></b></h5>
                                        </div>
                                    </div>
                                    <div class="clearfix mb-3">
                                        <a href="/myphpproject/inbox/inbox.php" class="btn btn-primary px-3 light"><i class="fa fa-reply"></i>
                                        <a href="javascript:void()" class="btn btn-primary px-3 light ml-2"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                                <hr>
                                <div class="media mb-2 mt-3">
                                    <div class="media-body"><span class="pull-right"><?=$select_mess_assoc['created_at']?></span>
                                        <h5 class="my-1 text-primary">Message created at</h5>
                                        <p class="read-content-email">
                                            To: Me, <?=$select_mess_assoc['email']?></p>
                                    </div>
                                </div>
                                <div class="read-content-body">
                                    <h5 class="mb-4">Hi <?=$select_user_assoc['name']?>,</h5>
                                    <p class="mb-2"><?=$select_mess_assoc['message']?></p>
                                    <h5 class="pt-3">Kind Regards,</h5>
                                    <p><?=$select_mess_assoc['name']?></p>
                                </div>
                            </div>
                        </div>
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
