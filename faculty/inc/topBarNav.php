<!-- Navbar -->
<style>
.navbar-nav .nav-link {
    color: black;
    font-size: 14px;
}
</style>
<!-- Navbar -->



<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top bg-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo base_url ?>"
                class="nav-link"><?php echo (!isMobileDevice()) ? $_settings->info('name') : $_settings->info('short_name'); ?></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item ms-3">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-list"> List</i></a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="javascript:void(0)"
                onclick="location.replace('<?php echo base_url . '/classes/Login.php?f=flogout' ?>')" role="button">
                <i class="fas fa-sign-out-alt">Sign out</i>
            </a>
        </li>
    </ul>
    <!-- Right navbar links -->
</nav>
<!-- /.navbar -->