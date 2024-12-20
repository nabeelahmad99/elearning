<div class="card card-outline card-primary w-fluid">
    <div class="card-header">
        <h3 class="card-title">Lessons</h3>
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
				$student_id = $_settings->userdata('student_id');
				$class_id = $conn->query("SELECT * FROM student_class where academic_year_id = {$academic_year_id} and student_id = '{$student_id}' ");
				if ($class_id->num_rows > 0) :
					$class_id = $class_id->fetch_array()['class_id'];
					$qry = $conn->query("SELECT l.*,s.subject_code FROM lessons l inner join subjects s on s.id = l.subject_id where l.academic_year_id = '{$academic_year_id}' and l.id in (SELECT lesson_id from lesson_class where class_id = '{$class_id}') ");
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
                        <div class="btn-group">
                            <button type="button"
                                class="default-dropdown dropdown-toggle dropdown-hover dropdown-icon my-2"
                                data-toggle="dropdown" aria-expanded="false">
                                Action
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item action_load"
                                    href="./?page=lesson/view_lesson&id=<?php echo $row['id'] ?>">View Lesson</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
    $('table').dataTable();
})
</script>