<style>
.page-title {
    font-size: 26px !important;
    font-weight: 700 !important;
    color: #004466 !important;
    margin: 10px 0 16px !important;
}

.card {
    background-color: #fff;
    border-radius: 10px;
    border: none;
    position: relative;
    margin-bottom: 30px;
    box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
}

.l-bg-cherry {
    background: linear-gradient(to right, #493240, #f09) !important;
    color: #fff;
}

.l-bg-blue-dark {
    background: linear-gradient(to right, #373b44, #4286f4) !important;
    color: #fff;
}

.l-bg-green-dark {
    background: linear-gradient(to right, #0a504a, #38ef7d) !important;
    color: #fff;
}

.l-bg-orange-dark {
    background: linear-gradient(to right, #a86008, #ffba56) !important;
    color: #fff;
}

.card .card-statistic-3 .card-icon-large .fas,
.card .card-statistic-3 .card-icon-large .far,
.card .card-statistic-3 .card-icon-large .fab,
.card .card-statistic-3 .card-icon-large .fal {
    font-size: 110px;
}

.card .card-statistic-3 .card-icon {
    text-align: center;
    line-height: 50px;
    margin-left: 15px;
    color: #000;
    position: absolute;
    right: 0px !important;
    top: 20px;
    opacity: 0.1;
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}

.l-bg-green {
    background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
    color: #fff;
}

.l-bg-orange {
    background: linear-gradient(to right, #f9900e, #ffba56) !important;
    color: #fff;
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}

.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
}
</style>
<?php require_once('../config.php'); ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>

<body class="layout-fixed layout-footer-fixed text-sm sidebar-mini control-sidebar-slide-open layout-navbar-fixed "
    data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" style="height: auto;">
    <div class="wrapper">
        <?php require_once('inc/topBarNav.php') ?>
        <?php require_once('inc/navigation.php') ?>

        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home';  ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 567.854px;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="page-title">
                                <?php
                                $_p = explode("/", $page);
                                echo (isset($_p[1])) ? ucwords(str_replace("_", " ", $_p[1])) : ucwords(str_replace("_", " ", $_p[0]));
                                ?>
                            </h1>
                        </div>
                    </div>
                    <!-- /.content-header -->
                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">
                            <?php
                            if (!file_exists($page . ".php") && !is_dir($page)) {
                                include '404.html';
                            } else {
                                if (is_dir($page))
                                    include $page . '/index.php';
                                else
                                    include $page . '.php';
                            }
                            ?>
                        </div>
                    </section>

                    <div class="modal fade" id="confirm_modal" role='dialog'>
                        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirmation</h5>
                                </div>
                                <div class="modal-body">
                                    <div id="delete_content"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="primary-button w-110" id='confirm'
                                        onclick="">Continue</button>
                                    <button type="button" class="default-button w-110"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="uni_modal" role='dialog'>
                        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"></h5>
                                </div>
                                <div class="modal-body">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="primary-button w-80" id='submit'
                                        onclick="$('#uni_modal form').submit()">Save</button>
                                    <button type="button" class="default-button w-80"
                                        data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="uni_modal_right" role='dialog'>
                        <div class="modal-dialog modal-full-height  modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="fa fa-arrow-right"></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="viewer_modal" role='dialog'>
                        <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content">
                                <button type="button" class="btn-close" data-dismiss="modal"><span
                                        class="fa fa-times"></span></button>
                                <img src="" alt="">
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.content-wrapper -->
                <?php require_once('inc/footer.php') ?>
</body>

</html>