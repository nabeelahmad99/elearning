<?php if ($_settings->chk_flashdata('success')) : ?>
<script>
alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
</script>
<?php endif; ?>
<div class="card card-outline cardprimary w-fluid">
    <div class="card-header">
        <h3 class="card-title">Course List</h3>
        <div class="card-tools">
            <a class="primary-link new_course" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover table-compact table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Course</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
				$i = 1;
				$qry = $conn->query("SELECT * FROM course order by course asc");
				while ($row = $qry->fetch_assoc()) :
				?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row['course'] ?></td>
                    <td><span class="truncate"><?php echo $row['description'] ?></span></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button"
                                class="default-dropdown dropdown-toggle dropdown-hover dropdown-icon my-2"
                                data-toggle="dropdown" aria-expanded="false">
                                Action
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
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

<script>
$(document).ready(function() {
    $('.new_course').click(function() {
        uni_modal("New Course", "./course/manage_course.php")
    })
    $('.action_edit').click(function() {
        uni_modal("Edit Course", "./course/manage_course.php?id=" + $(this).attr('data-id'));
    })
    $('.action_delete').click(function() {
        _conf("Are you sure to delete Course?", "delete_course", [$(this).attr('data-id')])
    })
    $('table th,table td').addClass('px-1 py-0 align-middle')
    $('table').dataTable();
})

function delete_course($id) {
    start_loader()
    $.ajax({
        url: _base_url_ + 'classes/Master.php?f=delete_course',
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