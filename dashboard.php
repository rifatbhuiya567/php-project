<?php
    require 'dashboard-header.php';
?>
<style>
    .color {
        font-weight: 600;
        color: dodgerblue;
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
                        <h2>Hello,
                            <span class="color">
                                <?php 
                                    if($select_user_assoc['gender'] == 'male') { 
                                        echo "MR ".$select_user_assoc['name'];
                                    }elseif($select_user_assoc['gender'] == 'female') { 
                                        echo "MS ".$select_user_assoc['name'];
                                    }else { 
                                        echo $select_user_assoc['name']; 
                                    } 
                                ?> 
                            </span>
                            - Welcome to Dashboard
                        </h2>
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
    require 'dashboard-footer.php';
?>