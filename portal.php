<style>
.portial-icon {
    font-size: 5rem;
    height: 8.5rem;
    width: 8.5rem;
    align-items: center;
    justify-content: center;
    display: flex;
    border: 4px solid #fffafadb;
    color: #ffffffb8;
}

.portal-link {
    color: unset;
}

.portal-link:hover {
    color: #0088cc;
}

.widget-user .widget-user-image {
    position: absolute;
    top: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    margin: unset;
    left: unset;
}

.portal-link .card:hover {
    color: unset;
    position: relative;
    top: -3px;
    box-shadow: 0 9px #0201010d;
}

.nav-link {
    color: aliceblue;
    text-decoration: none;
}

.nav-link:hover {
    color: black;
}

.navbar-brand {
    color: azure;
    font-size: 27px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}

.navbar-brand:hover {
    color: antiquewhite;
}

.btn {
    border: 1px solid green;
    border-radius: 40px;
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

.section_our_solution {
    margin: 0 180px;
}

.section_our_solution .row {
    align-items: center;
}

/* code */
.user-card-wrapper .user-card {
    width: 100%;
    height: 265px;
    background: #fff;
    box-shadow: 0 2px 4px 0 rgba(136, 144, 195, 0.2),
        0 5px 15px 0 rgba(37, 44, 97, 0.15);
    border-radius: 15px;
    padding: 10px 16px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.user-card-title h3 {
    font-size: 24px;
    font-weight: 700;
    margin-top: 10px;
    margin-bottom: 10px;
}

.user-card-body p {
    font-size: 16px;
    font-weight: 400;
    margin: 0;
}
</style>

<body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <div class="section_our_solution">
        <div class="row">
            <div class="col-4">
                <a href="<?php echo base_url . 'admin' ?>" class="portal-link">
                    <div class="user-card-wrapper">
                        <div class="user-card">
                            <div class="user-icon">
                                <img src="images/admin.png" alt="admin user">
                            </div>
                            <div class="user-card-title">
                                <h3>Admin</h3>
                            </div>
                            <div class="user-card-body">
                                <p>
                                    Click to Login Admin side.
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4">
                <a href="<?php echo base_url . 'faculty' ?>" class="portal-link">
                    <div class="user-card-wrapper">
                        <div class="user-card">
                            <div class="user-icon">
                                <img src="images/faculty.png" alt="faculty user">
                            </div>
                            <div class="user-card-title">
                                <h3>Faculty</h3>
                            </div>
                            <div class="user-card-body">
                                <p>
                                    Click to Login Faculty side.
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4">
                <a href="<?php echo base_url . 'student' ?>" class="portal-link">
                    <div class="user-card-wrapper">
                        <div class="user-card">
                            <div class="user-icon">
                                <img src="images/student.png" alt="student user">
                            </div>
                            <div class="user-card-title">
                                <h3>Student</h3>
                            </div>
                            <div class="user-card-body">
                                <p>
                                    Click to Login Student side.
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>