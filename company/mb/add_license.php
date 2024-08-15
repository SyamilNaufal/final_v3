<?php
include '../../functions/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $license_number = $_POST['license_number'];
    $description = $_POST['description'];
    $supplier = $_POST['supplier'];
    $renewal_date = $_POST['renewal_date'];
    $expired_date = $_POST['exp_date'];
    $update_date = $_POST['update_date'];
    $update_by = $_POST['update_by'];
    $remark = $_POST['remark'];
    
    $query = "INSERT INTO mb_licenses (license_number, description, supplier, renewal_date, exp_date,
     update_date, update_by, remark) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sss', $license_number, $supplier, $expired_date);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
    $conn->close();
}
?>

<!--?php

include '../../functions/db.php';
include 'function.php';


// Add License section
echo '<section id="home" class="section light-background">';
echo '<div class="container section-title" data-aos="fade-up">';
echo '<h2>Home</h2>';
echo '<br>';
echo '<div data-aos="fade-up" data-aos-delay="100">';
echo '<button class="btn btn-primary btn-sm bg-success border-success" type="button" data-toggle="modal" data-target="#modal-add-license">Add License</button>';
echo '</div></div></section>';

echo '
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
                <form action="add_license.php" method="post">
                    <div class="form-group">
                        <label for="license_number">License Number</label>
                        <input type="text" class="form-control" id="license_number" name="license_number" required>
                    </div>
                    <div class="form-group">
                        <label for="supplier">Supplier</label>
                        <input type="text" class="form-control" id="supplier" name="supplier" required>
                    </div>
                    <div class="form-group">
                        <label for="expired_date">Expiry Date</label>
                        <input type="date" class="form-control" id="expired_date" name="expired_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add License</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>';
?-->