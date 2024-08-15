<?php
// include 'crud.php';
include 'home.php';
include '../../functions/db.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM mb_licenses";
$result = $conn->query($query);
?>
<section id="content" class="section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>View License</h2>
        <br>
        <div data-aos="fade-up" data-aos-delay="100">
            <table class="table">
                <thead>
                    <tr>
                        <th>License ID</th>
                        <th>License Number</th>
                        <th>Description</th>
                        <th>Supplier</th>
                        <th>Expired Date</th>
                        <th>Days to Expired</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) {
                        $exp_date = new DateTime($row['exp_date']);
                        $today = new DateTime();
                        $interval = $today->diff($exp_date);
                        $days_until_expired = $interval->format('%a');
                        $is_expired = $exp_date < $today;
                        $exp_status_class = $is_expired ? 'text-danger' : 'text-success';
                        $exp_status_symbol = $is_expired ? '-' : '+';
                    ?>
                        <tr>
                            <th scope="row"><?= $row['id'] ?></th>
                            <td><?= $row['license_number'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <td><?= $row['supplier'] ?></td>
                            <td class="<?= $exp_status_class ?>"><?= $row['exp_date'] ?></td>
                            <td class="<?= $exp_status_class ?>"><?= $exp_status_symbol ?> <?= $days_until_expired ?> days</td>
                            <td class="d-flex justify-content-around align-items-center flex-wrap">
                                <button class="btn btn-secondary m-1" data-toggle="modal" data-bss-tooltip="" type="button" data-target="#modal-view-license-<?= $row['id'] ?>" title="View License">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-info m-1" data-toggle="modal" data-bss-tooltip="" type="button" data-target="#modal-update-license-<?= $row['id'] ?>" title="Update License">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn btn-danger m-1" data-toggle="modal" data-bss-tooltip="" type="button" data-target="#modal-delete-license-<?= $row['id'] ?>" title="Delete License">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <button class="btn btn-primary m-1" data-toggle="modal" data-bss-tooltip="" type="button" onclick="loadHistory(<?= $row['id'] ?>)" title="View History">
                                    <i class="fas fa-history"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Modals (View, Update, Delete) for each row can be included here -->
                        <!-- View Modal -->
                        <div class="modal fade" id="modal-view-license-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">View License</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>License Number: <?= $row['license_number'] ?></p>
                                        <p>Description: <?= $row['description'] ?></p>
                                        <p>Supplier: <?= $row['supplier'] ?></p>
                                        <p>Renewal Date: <?= $row['renewal_date'] ?></p>
                                        <p>Expired Date: <?= $row['exp_date'] ?></p>
                                        <p class="<?= $exp_status_class ?>">Days of Expired: <?= $exp_status_symbol ?> <?= $days_until_expired ?> days</p>
                                        <p>Update Date: <?= $row['update_date'] ?></p>
                                        <p>Update By: <?= $row['update_by'] ?></p>
                                        <p>Remark: <?= $row['remark'] ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="loadHistory(<?= $row['id'] ?>)">History</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Update Modal -->
                        <div class="modal fade" id="modal-update-license-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update License</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="process.php" method="post">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            <div class="form-group">
                                                <label for="license_number">License Number</label>
                                                <input type="text" class="form-control" id="license_number" name="license_number" value="<?= $row['license_number'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <input type="text" class="form-control" id="description" name="description" value="<?= $row['description'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="supplier">Supplier</label>
                                                <input type="text" class="form-control" id="supplier" name="supplier" value="<?= $row['supplier'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="renewal_date">Renewal Date</label>
                                                <input type="date" class="form-control" id="renewal_date" name="renewal_date" value="<?= $row['renewal_date'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exp_date">Expired Date</label>
                                                <input type="date" class="form-control" id="exp_date" name="exp_date" value="<?= $row['exp_date'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="update_date">Update Date</label>
                                                <input type="date" class="form-control" id="update_date" name="update_date" value="<?= $row['update_date'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="update_by">Update By</label>
                                                <input type="text" class="form-control" id="update_by" name="update_by" value="<?= $row['update_by'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="remark">Remark</label>
                                                <input type="text" class="form-control" id="remark" name="remark" value="<?= $row['remark'] ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <input type="submit" name="update_license" value="Update License" class="btn btn-primary bg-success border-success"></input>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="modal-delete-license-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete License</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this license?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="process.php" method="post">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <input type="submit" value="Delete" name="delete_license" class="btn btn-primary bg-danger"></input>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </tbody>
            </table>
            <a href="#" class="btn btn-primary btn-sm bg-success border-success" data-toggle="modal" data-target="#modal-add-license">
                Add License <i class="fas fa-plus-circle"></i>
            </a>
        </div>
    </div>
</section>
<div id="history-section"></div>
<!-- Modal for Add License -->
<div class="modal fade" id="modal-add-license" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add License</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="process.php" method="post">
                    <div class="form-group">
                        <label for="license_number">License Number</label>
                        <input type="text" class="form-control" id="license_number" name="license_number" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <div class="form-group">
                        <label for="supplier">Supplier</label>
                        <input type="text" class="form-control" id="supplier" name="supplier" required>
                    </div>
                    <div class="form-group">
                        <label for="renewal_date">Renewal Date</label>
                        <input type="date" class="form-control" id="renewal_date" name="renewal_date" required>
                    </div>
                    <div class="form-group">
                        <label for="exp_date">Expired Date</label>
                        <input type="date" class="form-control" id="exp_date" name="exp_date" required>
                    </div>
                    <div class="form-group">
                        <label for="update_date">Update Date</label>
                        <input type="date" class="form-control" id="update_date" name="update_date" required>
                    </div>
                    <div class="form-group">
                        <label for="update_by">Update By</label>
                        <input type="text" class="form-control" id="update_by" name="update_by" required>
                    </div>
                    <div class="form-group">
                        <label for="remark">Remark</label>
                        <input type="text" class="form-control" id="remark" name="remark" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="add_license" value="Add License" class="btn btn-primary bg-success border-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- <script>
    function loadHistory(id) {
        fetch(`../../functions/load_history.php?id=${id}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('history').innerHTML = data;
            });
    }
</script> -->
<script>
    function loadHistory(id) {
        fetch(`load_history.php?id=${id}`)
            .then(response => response.text())
            .then(data => {
                const historySection = document.getElementById('history-section');
                historySection.innerHTML = `
                    <section class="section dark-background">
                        <div class="container section-title" data-aos="fade-up">
                            <h2>History for License ID ${id}</h2>
                            <br>
                            <div data-aos="fade-up" data-aos-delay="100">
                                ${data}
                            </div>
                        </div>
                    </section>
                `;
            });
    }
</script>
