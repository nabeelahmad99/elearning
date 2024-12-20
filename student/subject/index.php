<div class="card card-outline cardprimary w-fluid">
    <div class="card-header">
        <h3 class="card-title">My Class List</h3>
    </div>
    <div class="card-body">
        <table class="table table-hover table-compact table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Suject Code</th>
                    <th>Description</th>
                    <th>Faculty</th>
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
                    $qry = $conn->query("SELECT cs.*,d.department,CONCAT(co.course,' ',c.level,'-',c.section) as class,s.subject_code,s.description FROM class_subjects cs inner join class c on c.id = cs.class_id inner join subjects s on s.id = cs.subject_id inner join department d on d.id = c.department_id inner join course co on co.id = c.course_id where cs.class_id = '{$class_id}' and cs.academic_year_id = '{$academic_year_id}' ");
                    while ($row = $qry->fetch_assoc()) :
                        $fname = "Not yet set.";
                        $faculty = $conn->query("SELECT csf.*,CONCAT(f.firstname,' ',f.middlename,' ',f.lastname) as fname FROM `class_subjects_faculty` csf inner join faculty f on f.faculty_id = csf.faculty_id where csf.academic_year_id = '{$academic_year_id}' and csf.class_id='{$class_id}' and csf.subject_id = '{$row['subject_id']}' ");
                        $fname = $faculty->num_rows > 0 ? $faculty->fetch_array()['fname'] : $fname;
                ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row['subject_code'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                    <td><?php echo $fname ?></td>
                </tr>
                <?php endwhile; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.new_class').click(function() {
        uni_modal("New Class", "./class/manage_class.php")
    })
    $('.action_edit').click(function() {
        uni_modal("Edit Class", "./class/manage_class.php?id=" + $(this).attr('data-id'));
    })
    $('.action_load').click(function() {
        uni_modal("Load Class Subjects", "./class/load_subject.php?id=" + $(this).attr('data-id'));
    })
    $('.action_delete').click(function() {
        _conf("Are you sure to delete class?", "delete_class", [$(this).attr('data-id')])
    })
    $('table th,table td').addClass('px-1 py-0')
    $('table').dataTable();
})

function delete_class($id) {
    start_loader()
    $.ajax({
        url: _base_url_ + 'classes/Master.php?f=delete_class',
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