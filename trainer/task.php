<?php include 'layout/session.php'; ?>
<?php include 'layout/header.php'; ?>

<?php $page = "task";
include 'layout/sidebar.php'; ?>
<?php include 'layout/menu.php'; ?>

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Member Task List</h3>
        <p class="text-subtitle text-muted">Dashboard / Task List</p>
    </div>
    <?php
    if (isset($_SESSION['error'])) {
        echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4 class ='text-white'> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4 class ='text-white'> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
        unset($_SESSION['success']);
    }
    ?>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Task List</h4>
            </div>
            <div class="card-body">


                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id = $_GET['id'];
                        $query = "SELECT * FROM `todo` WHERE user_id = '$id' AND (task_status = 'On Going' OR task_status = 'Pending')";
                        $result = $conn->query($query);
                        $count = 1;
                        while ($row = $result->fetch_assoc()):
                        ?>
                            <tr>
                                <td><?= $count++ ?></td>
                                <td><?= htmlspecialchars($row['title']) ?></td>
                                <td><?= htmlspecialchars($row['description']) ?></td>
                                <td><span class="badge bg-warning"><?= $row['task_status'] ?></span></td>
                                <td>
                                    <!-- View Task Button -->
                                    <button class="btn btn-primary btn-sm view-task" data-id="<?= $row['id'] ?>"
                                        data-title="<?= htmlspecialchars($row['title']) ?>"
                                        data-description="<?= htmlspecialchars($row['description']) ?>"
                                        data-start="<?= $row['start_datetime'] ?>"
                                        data-end="<?= $row['end_datetime'] ?>">View</button>

                                    <!-- Delete Task Form (No AJAX) -->
                                    <form action="action/delete_task.php" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this task?');">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- Modal for Task Details -->
<div class="modal fade" id="event-details-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title mx-auto">Workout Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <dl>
                    <dt class="text-muted">Title</dt>
                    <dd id="modal-title" class="fw-bold fs-5"></dd>
                    <dt class="text-muted">Description</dt>
                    <dd id="modal-description"></dd>
                    <dt class="text-muted">Start</dt>
                    <dd id="modal-start"></dd>
                    <dt class="text-muted">End</dt>
                    <dd id="modal-end"></dd>
                </dl>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // View Task Button Click Event
        $('.view-task').click(function() {
            let title = $(this).data('title');
            let description = $(this).data('description');
            let start = $(this).data('start');
            let end = $(this).data('end');

            // Set data in modal
            $('#modal-title').text(title);
            $('#modal-description').text(description);
            $('#modal-start').text(start ? new Date(start).toLocaleString() : "N/A");
            $('#modal-end').text(end ? new Date(end).toLocaleString() : "N/A");

            // Show Modal
            $('#event-details-modal').modal('show');
        });
    });
</script>

<?php include 'layout/footer.php'; ?>