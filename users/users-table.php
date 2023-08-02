<?php
    require '../dashboard-header.php';

    require '../db.php';

    $user = "SELECT * FROM re_users WHERE id != '$user_id'";
    $user_list_result = mysqli_query($db_connect, $user);
?>

<style>
    .user-table tbody tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    .user-table tbody tr:nth-child(even):hover {
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
                        <h3>Users List :</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center user-table">
                            <thead>
                                <tr class="table-info">
                                    <th>SL</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>Role</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($user_list_result as $key => $user) { ?>
                                <tr>
                                    <td>
                                        <?=($key + 1)?>
                                    </td>
                                    <td>
                                        <?=$user['name']?>
                                    </td>
                                    <td>
                                        <span style="word-break: break-all;"><?=$user['email']?></span>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center" style="gap: 6px;">
                                            <div>
                                                <?php if($user['role'] == 1) {
                                                    echo "<span class='badge badge-success'>S. Admin</span>";
                                                }elseif($user['role'] == 2) {
                                                    echo "<span class='badge badge-success'>Admin</span>";
                                                }elseif($user['role'] == 3) {
                                                    echo "<span class='badge badge-primary'>Moderator</span>";
                                                }elseif($user['role'] == 4) {
                                                    echo "<span class='badge badge-primary'>Editor</span>";
                                                }else {
                                                    echo "<span class='badge badge-danger'>Not assign</span>";
                                                }?>
                                            </div>
                                            <div class="dropdown" style="display: <?=(($user['role'] == 0) ? '' : 'none')?>;">
                                                    <button type="button" class="btn btn-info light sharp" data-toggle="dropdown" aria-expanded="false">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                                        <a class="dropdown-item" href="role_admin.php?id=<?=$user['id']?>">Admin</a>
                                                        <a class="dropdown-item" href="role_moderator.php?id=<?=$user['id']?>">Moderator</a>
                                                        <a class="dropdown-item" href="role_editor.php?id=<?=$user['id']?>">Editor</a>
                                                    </div>
                                                </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="edit_user.php?id=<?=$user['id'];?>" class="btn btn-primary shadow btn-xs sharp mr-1" ><i class="fa fa-pencil"></i></a>
                                            <a href="delete_user.php?id=<?=$user['id'];?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
                <form action="register-post.php" method="POST">
                    <div class="card">
                        <div class="card-header">
                            <h3>Register Form :</h3>
                        </div>
                        <?php if(isset($_SESSION['re_success'])) { ?>
                            <div class="alert alert-success">
                                <?= $_SESSION['re_success']; ?>
                            </div>
                        <?php } unset($_SESSION['re_success']); ?>
                        <div class="form-inner card-body">
                            <div class="mt-1">
                                <label for="form_name" class="label">
                                    Name <span>*</span>
                                </label>
                                <input class="input border-change" type="text" id="form_name" placeholder="Enter your name!" name="reg_name" style="border-color: <?= (isset($_SESSION['name_err']) ? 'red' : "" ); ?>" value="<?= (isset($_SESSION['old_name']) ? $_SESSION['old_name'] : "" );?>">
                                <?php if(isset($_SESSION['name_err'])) { ?>
                                    <div class="error-text">
                                        <?= $_SESSION['name_err']; ?>
                                    </div>
                                <?php } unset($_SESSION['name_err']); ?>
                            </div>
                            <div class="mt-1">
                                <label for="form_email" class="label mt-2">
                                    Email <span>*</span>
                                </label>
                                <input class="input border-change" type="text" id="form_email" placeholder="Enter your email!" name="reg_email" style="border-color: <?= (isset($_SESSION['email_err']) ? 'red' : "" ); ?>" value="<?= (isset($_SESSION['old_email']) ? $_SESSION['old_email'] : "" );?>">
                                <?php if(isset($_SESSION['email_err'])) { ?>
                                    <div class="error-text">
                                        <?= $_SESSION['email_err']; ?>
                                    </div>
                                <?php } unset($_SESSION['email_err']); ?>
                            </div>
                            <div class="mt-1 p-field">
                                <label for="form_pass" class="label mt-2">
                                    Password <span>*</span>
                                </label>
                                <input class="input border-change" type="password" id="form_pass" placeholder="Enter your password!" name="reg_pass" style="border-color: <?= (isset($_SESSION['pass_err']) ? 'red' : "" ); ?>" value="<?= (isset($_SESSION['old_pass']) ? $_SESSION['old_pass'] : "" );?>">
                                <?php if(isset($_SESSION['pass_err'])) { ?>
                                    <div class="error-text">
                                        <?= $_SESSION['pass_err']; ?>
                                    </div>
                                <?php } unset($_SESSION['pass_err']); ?>
                                <i class="fa-regular fa-eye" id="psh"></i>
                            </div>
                            <div class="mt-1 p-field">
                                <label for="form_con_pass" class="label mt-2">
                                    Confirm Password <span>*</span>
                                </label>
                                <input class="input border-change" type="password" id="form_con_pass" placeholder="Confirm your password!" name="reg_con_pass" style="border-color: <?= (isset($_SESSION['con_pass_err']) ? 'red' : '' ); ?>" value="<?= (isset($_SESSION['old_conf_pass']) ? $_SESSION['old_conf_pass'] : ''); ?>">
                                <?php if(isset($_SESSION['con_pass_err'])) { ?>
                                    <div class="error-text">
                                        <?= $_SESSION['con_pass_err']; ?>
                                    </div>
                                <?php } unset($_SESSION['con_pass_err']); ?>
                                <i class="fa-regular fa-eye" id="psh2"></i>
                            </div>
                            <div class="d-flex">
                                <div class="">
                                    <h5 class="label mt-2">
                                        Gender <span>*</span>
                                    </h5>
                                    <div class="gen d-flex align-items-center">
                                        <input id="male" type="radio" name="gender" value="male"
                                        <?php 
                                            if(isset($_SESSION['old_gen'])) { 
                                                if($_SESSION['old_gen'] == 'male') {
                                                    echo 'checked';
                                                }else {
                                                    echo '';
                                                }
                                            } 
                                        ?>>
                                        <label for="male">
                                            Male <span></span>
                                        </label>
                                    </div>
                                    <div class="gen d-flex align-items-center">
                                        <input id="female" type="radio" name="gender" value="female"
                                        <?php 
                                            if(isset($_SESSION['old_gen'])) { 
                                                if($_SESSION['old_gen'] == 'female') {
                                                    echo 'checked';
                                                }else {
                                                    echo '';
                                                }
                                            }
                                        ?>>
                                        <label for="female">
                                            Female <span></span>
                                        </label>
                                    </div>
                                    <div class="gen d-flex align-items-center">
                                        <input id="others" type="radio" name="gender" value="others"
                                        <?php 
                                            if(isset($_SESSION['old_gen'])) { 
                                                if($_SESSION['old_gen'] == 'others') {
                                                    echo 'checked';
                                                }else {
                                                    echo '';
                                                }
                                            } 
                                        ?>>
                                        <label for="others">
                                            Others <span></span>
                                        </label>
                                    </div>
                                    <?php if(isset($_SESSION['gen_err'])) { ?>
                                        <div class="error-text">
                                            <?= $_SESSION['gen_err'];?>
                                        </div>
                                    <?php } unset($_SESSION['gen_err']); ?>
                                </div>
                                <!-- <div class="two">
                                    <h5 class="label mt-2">
                                    Choice <span>*</span>
                                    </h5>
                                    <div class="cho d-flex align-items-center">
                                        <input id="football" type="checkbox" name="choice" value="football"
                                        <?php 
                                            if(isset($_SESSION['old_check'])) {
                                                if($_SESSION['old_check'] == 'football' ) {
                                                    echo 'checked';
                                                }else {
                                                    echo '';
                                                }
                                            }
                                        ?>>
                                        <label for="football">
                                            Football <span></span>
                                        </label>
                                    </div>
                                    <div class="cho d-flex align-items-center">
                                        <input id="PUBG" type="checkbox" name="choice" value="pubg"
                                        <?php 
                                            if(isset($_SESSION['old_check'])) {
                                                if($_SESSION['old_check'] == 'pubg' ) {
                                                    echo 'checked';
                                                }else {
                                                    echo '';
                                                }
                                            }
                                        ?>>
                                        <label for="PUBG">
                                            PUBG <span></span>
                                        </label>
                                    </div>
                                    <div class="cho d-flex align-items-center">
                                        <input id="freefire" type="checkbox"  name="choice" value="freefire"
                                        <?php 
                                            if(isset($_SESSION['old_check'])) {
                                                if($_SESSION['old_check'] == 'freefire' ) {
                                                    echo 'checked';
                                                }else {
                                                    echo '';
                                                }
                                            }
                                        ?>>
                                        <label for="freefire" >
                                            FreeFire <span></span>
                                        </label>
                                    </div>
                                    <div class="cho d-flex align-items-center">
                                        <input id="coc" type="checkbox" name="choice" value="coc"
                                        <?php 
                                            if(isset($_SESSION['old_check'])) {
                                                if($_SESSION['old_check'] == 'coc' ) {
                                                    echo 'checked';
                                                }else {
                                                    echo '';
                                                }
                                            }
                                        ?>>
                                        <label for="coc">
                                            COC <span></span>
                                        </label>
                                    </div>
                                    <?php if(isset($_SESSION['choice_err'])) { ?>
                                        <div class="error-text">
                                            <?= $_SESSION['choice_err']; ?>
                                        </div>
                                    <?php } unset($_SESSION['choice_err']); ?>
                                </div>
                                <div class="three">
                                    <h5 class="label mt-2">
                                    Select <span>*</span>
                                    </h5>
                                    <select id="device_select" name="device" style="border-color: <?= ( isset($_SESSION['select_err']) ? 'red' : ''); ?>">
                                        <option value="<?= (isset($_SESSION['old_select']) ? $_SESSION['old_select'] : ''); ?>">Select an option</option>
                                        <option value="car"
                                        <?php
                                            if(isset($_SESSION['old_select'])) {
                                                if($_SESSION['old_select'] == 'car') {
                                                    echo 'selected';
                                                }else {
                                                    echo '';
                                                }
                                            }
                                        ?>>Car</option>
                                        <option value="mobile"  
                                        <?php
                                            if(isset($_SESSION['old_select'])) {
                                                if($_SESSION['old_select'] == 'mobile') {
                                                    echo 'selected';
                                                }else {
                                                    echo '';
                                                }
                                            }
                                        ?>>Mobile</option>
                                        <option value="bike"
                                        <?php
                                            if(isset($_SESSION['old_select'])) {
                                                if($_SESSION['old_select'] == 'bike') {
                                                    echo 'selected';
                                                }else {
                                                    echo '';
                                                }
                                            }
                                        ?>>Bike</option>
                                    </select>
                                    <?php if(isset($_SESSION['select_err'])) { ?>
                                        <div class="error-text">
                                            <?= $_SESSION['select_err']; ?>
                                        </div>
                                    <?php } unset($_SESSION['select_err']); ?>
                                </div> -->
                            </div>
                            <div class="submit-btn">
                                <button type="submit">Register Now</button>
                            </div>
                        </div>
                    </div>
                </form>
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
    unset($_SESSION['old_name']);
    unset($_SESSION['old_email']);
    unset($_SESSION['old_pass']);
    unset($_SESSION['old_conf_pass']);
    unset($_SESSION['old_gen']);
    unset($_SESSION['old_check']);
    unset($_SESSION['old_select']);
?>