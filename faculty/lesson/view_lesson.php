<?php if ($_settings->chk_flashdata('success')) : ?>
<script>
alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
</script>
<?php endif; ?>
<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
if (!empty($id)) {
    $qry = $conn->query("SELECT l.*,CONCAT(f.firstname,' ',f.middlename,' ',f.lastname) as fname, CONCAT(s.subject_code,' - ',s.description) as subj FROM lessons l inner join faculty f on f.faculty_id = l.faculty_id inner join subjects s on s.id = l.subject_id where l.id = $id");
    foreach ($qry->fetch_array() as $k => $v) {
        if (!is_numeric($k)) {
            $$k = $v;
        }
    }
    $description = stripslashes($description);
}
?>
<style>
#carousel_holder {
    display: inline-flex;
    justify-content: center;
    background: #2f2e2e;
}

#lesson_slides {
    width: calc(50%);
}

.carousel-control-prev {
    left: calc(-30%);
}

.carousel-control-next {
    right: calc(-30%);
}

.pdf_viewer {
    width: 100%;
    height: 80vh;
}

video.note-video-clip {
    width: 100%;
    height: 62vh;
    background: #000000d9;
    object-fit: contain;
}
</style>
<div class="card card-outline card-primary w-fluid">
    <div class="card-header">
        <h3 class="card-title"><?php echo isset($title) ? $title : '' ?></h3>
        <div class="card-tools">
            <a class="primary-link edit_lesson" href="./?page=lesson/manage_lesson&id=<?php echo $id ?>"><i
                    class="fa fa-refresh"></i> Edit Lesson</a>
        </div>
    </div>
    <div class="card-body">
        <div class="w-100">
            <div class="col-md-12">
                <span class="truncate float-right"
                    style="max-width:calc(50%);font-size:13px !important;font-weight:bold">Subject:
                    <?php echo $subj ?></span>
            </div>
        </div>
        <br>
        <br>
        <div class="container-fluid">
            <h5>Description</h5>
            <hr>
            <div>
                <?php
                $pdf_pattern  = "<iframe src='" . base_url . "faculty/file_uploads/view_pdf.php?path=$2' class='pdf_viewer' title='PDF Viewer'></iframe>";
                echo (preg_replace("/(\[pdf_view\spath\s=\s+)([a-zA-Z0-9\/.]+)(\])/", $pdf_pattern, html_entity_decode($description)));
                ?>
            </div>
            <hr>
            <section>
                <div class="w-100">
                    <h5>This is visible to:</h5>
                    <hr>
                    <?php
                    $class = $conn->query("SELECT cs.*,d.department,CONCAT(co.course,' ',c.level,'-',c.section) as class,s.subject_code,s.description FROM class_subjects_faculty cs inner join class c on c.id = cs.class_id inner join subjects s on s.id = cs.subject_id inner join department d on d.id = c.department_id inner join course co on co.id = c.course_id where cs.faculty_id = '{$faculty_id}' and cs.academic_year_id = '{$academic_year_id}' and cs.class_id in (SELECT class_id FROM lesson_class where lesson_id = $id ) group by cs.class_id ");
                    while ($row = $class->fetch_assoc()) :
                    ?>
                    <span class="badge badge-primary m-1" style="font-size:12px"><?php echo $row['class'] ?></span>
                    <?php endwhile; ?>
                </div>
            </section>
            <hr>
            <div class="w-100">
                <div class="col-md-12">
                    <span class="float-right"><b>Prepared By: </b><?php echo $fname ?></span>
                </div>
            </div>
        </div>
    </div>
</div>