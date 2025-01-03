<div class="card card-outline card-primary w-fluid">
    <div class="card-header">
        <h3 class="card-title">Lessons</h3>
        <div class="card-tools">
            <a class="primary-link new_lesson" href="javascript:void(0)"><i class="fa fa-plus"></i> New Lesson</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover table-compact table-striped">
            <colgroup>
                <col width="5%">
                <col width="20%">
                <col width="20%">
                <col width="40%">
                <col width="15%">
            </colgroup>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
				$i = 1;
				$academic_year_id = $_settings->userdata('academic_id');
				$faculty_id = $_settings->userdata('faculty_id');

				$qry = $conn->query("SELECT l.*,s.subject_code FROM lessons l inner join subjects s on s.id = l.subject_id where l.academic_year_id = '{$academic_year_id}' and l.faculty_id = '{$faculty_id}' ");
				while ($row = $qry->fetch_assoc()) :
					$desc = html_entity_decode($row['description']);
					$desc = stripslashes($desc);
					$desc = strip_tags($desc);
				?>

                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['subject_code'] ?></td>
                    <td><span class="truncate"><?php echo $desc ?></span></td>
                    <td class="text-center">
                        <div class="btn-group dropdown">
                            <button type="button"
                                class="default-dropdown dropdown-toggle dropdown-hover dropdown-icon my-2"
                                data-toggle="dropdown" aria-expanded="false">
                                Action
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu w-auto" role="menu">
                                <a class="dropdown-item action_load"
                                    href="./?page=lesson/view_lesson&id=<?php echo $row['id'] ?>">View</a>
                                <div class="divider"></div>
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
    $('.new_lesson').click(function() {
        location.href = "./?page=lesson/manage_lesson";
    })
    $('.action_edit').click(function() {
        uni_modal("Edit lesson", "./lesson/manage_lesson.php?id=" + $(this).attr('data-id'));
    })

    $('.action_delete').click(function() {
        _conf("Are you sure to delete this lesson?", "delete_lesson", [$(this).attr('data-id')])
    })
    $('table th,table td').addClass('px-1 py-0 align-middle')
    $('table').dataTable();
})

function delete_lesson($id) {
    start_loader()
    $.ajax({
        url: _base_url_ + 'classes/Master.php?f=delete_lesson',
        method: 'POST',
        data: {
            id: $id
        },
        dataType: 'json',
        error: err => {
            console.log(err)
            alert_toast("An error occured.", 'error')
            end_loader()
        },
        success: function(resp) {
            if (resp.status == 'success') {
                location.reload()
            } else {
                console.log(resp)
                alert_toast("An error occured.", 'error')
            }
            end_loader()
        }
    })
}
</script>