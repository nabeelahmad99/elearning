<style>
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
    right: -5px;
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
    font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
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
<?php if ($_settings->chk_flashdata('success')) : ?>
<script>
alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
</script>
<?php endif; ?>
<div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <div class="card-tools">
                <a class="primary-link new_student" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table tabe-hover table-striped" id="list">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Avatar</th>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Current Class</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $qry = $conn->query("SELECT *,CONCAT(firstname,' ', middlename,' ',lastname) as name FROM students order by CONCAT(firstname,' ', middlename,' ',lastname) asc ");
                    while ($row = $qry->fetch_assoc()) :

                        $class = $conn->query("SELECT sc.*, d.department, CONCAT(co.course, ' ', c.level, '-',c.section) as class FROM student_class sc inner join class c on c.id = sc.class_id inner join department d on d.id = c.department_id inner join course co on co.id = c.course_id  where sc.academic_year_id = '" . $_settings->userdata('academic_id') . "' and student_id = '{$row['student_id']}' ");
                        $class = $class->num_rows > 0 ? $class->fetch_array()['class'] : "Not yet set."
                    ?>
                    <tr>
                        <th class="text-center"><?php echo $i++ ?></th>
                        <td>
                            <center><img src="<?php echo validate_image($row['avatar']) ?>" alt=""
                                    class="img-thumbnail border-rounded" width="75px" height="75px"
                                    style="object-fit: cover;"></center>
                        </td>
                        <td><b><?php echo $row['student_id'] ?></b></td>
                        <td><b><?php echo ucwords($row['lastname'] . ", " . $row['firstname'] . ' ' . $row['middlename']) ?></b>
                        </td>
                        <td><b><?php echo $class ?></b></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button"
                                    class="default-dropdown dropdown-toggle dropdown-hover dropdown-icon"
                                    data-toggle="dropdown" aria-expanded="false">
                                    Action
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item action_class" href="javascript:void(0)"
                                        data-id="<?php echo $row['student_id'] ?>">Update Class</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item action_edit" href="javascript:void(0)"
                                        data-id="<?php echo $row['id'] ?>">Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item action_delete" href="javascript:void(0)"
                                        data-id="<?php echo $row['id'] ?>">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.new_student').click(function() {
        uni_modal("New Student", "./students/manage.php", 'mid-large')
    })
    $('.action_edit').click(function() {
        uni_modal("Manage Student", "./students/manage.php?id=" + $(this).attr('data-id'), 'mid-large')
    })
    $('.action_class').click(function() {
        uni_modal("Update Student Class", "./students/manage_class.php?student_id=" + $(this).attr(
            'data-id'), 'mid-large')
    })
    $('.view_student').click(function() {
        uni_modal("Person's CTS Card", "./students/card.php?id=" + $(this).attr('data-id'))
    })
    $('.action_delete').click(function() {
        _conf("Are you sure to delete this Student?", "delete_student", [$(this).attr('data-id')])
    })
    $('table th,table td').addClass('px-1 py-0 align-middle')
    $('#list').dataTable()
})

function delete_student($id) {
    start_loader()
    $.ajax({
        url: _base_url_ + 'classes/Master.php?f=delete_student',
        method: 'POST',
        data: {
            id: $id
        },
        success: function(resp) {
            if (resp == 1) {
                location.reload()
            }
        }
    })
}
</script>