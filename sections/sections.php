<?php
    require '../dashboard-header.php';
?>

<style>
    i {
        font-size: 24px;
    }

    h4 {
        font-weight: 700;
    }
</style>

<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <a href="/myphpproject/sections/expertise/expertise.php" class="d-flex justify-content-between align-items-center">
                            <i class="fa-solid fa-bolt"></i>
                            <h4>Expertise</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <a href="" class="d-flex justify-content-between align-items-center">
                            <i class="fa-solid fa-gear"></i>
                            <h4>Services</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <a href="/myphpproject/sections/portfolios/portfolio.php" class="d-flex justify-content-between align-items-center">
                            <i class="fa-brands fa-creative-commons-nd"></i>
                            <h4>Portfolios</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <a href="" class="d-flex justify-content-between align-items-center">
                            <i class="fa-regular fa-newspaper"></i>
                            <h4>Testimonials</h4>
                        </a>
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