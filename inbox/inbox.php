<?php 
    require '../dashboard-header.php';
    require '../db.php';

    $select_msg = "SELECT * FROM messages";
    $select_msg_res = mysqli_query($db_connect, $select_msg);
?>
<style>
    .mes {
        position: relative;
        top: 0;
        left: 0;
    }

    .message {
        position: absolute;
        top: 50%;
        left: 8px;
        right: 2rem;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        transform: translateY(-50%);
    }
</style>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Message List:</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-info text-center">
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th class="w-50">Message</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($select_msg_res as $sl=>$message) { ?>
                                <tr class="bg-<?=(($message['status'] == 0)?'light':'')?>" title="<?=(($message['status'] == 0)?'unread':'read')?>">
                                    <td><?=$sl+1?></td>
                                    <td><b><?=$message['name']?></b></td>
                                    <td class="mes">
                                        <p class="message"><?=$message['message']?></p>
                                    </td>
                                    <td><?=$message['time']?></td>
                                    <td>
                                        <div class="d-flex justify-content-center" style="gap: 4px;">
                                            <a href="message_view.php?id=<?=$message['id']?>" class="btn btn-primary shadow btn-xs sharp">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger shadow btn-xs sharp">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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