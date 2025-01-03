<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('config.php'); ?>
<?php require_once('inc/header.php') ?>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <?php require_once('inc/topBarNav.php') ?>

        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'portal';  ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pt-5" style="min-height: 567.854px;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mt-3 mb-5">
                        <div class="col">
                            <h1 class="m-0 text-center">Welcome to Online Learning System</h1>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container">
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
            <!-- /.content -->
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
                            <button type="button" class="primary-button w-80" id='confirm' onclick="">Continue</button>
                            <button type="button" class="default-button w-80" data-dismiss="modal">Close</button>
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
                            <button type="button" class="primary-button" id='submit'
                                onclick="$('#uni_modal form').submit()">Save</button>
                            <button type="button" class="default-button" data-dismiss="modal">Cancel</button>
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