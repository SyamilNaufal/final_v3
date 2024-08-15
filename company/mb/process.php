<?php
include '../../functions/db.php';
// include 'crud.php';

// Tambah Lesen
if (isset($_POST['add_license'])) {
    $license_number = $_POST['license_number'];
    $description = $_POST['description'];
    $supplier = $_POST['supplier'];
    $renewal_date = $_POST['renewal_date'];
    $expired_date = $_POST['exp_date'];
    $update_date = $_POST['update_date'];
    $update_by = $_POST['update_by'];
    $remark = $_POST['remark'];

    $query = "INSERT INTO mb_licenses (license_number, description, supplier, renewal_date, exp_date, update_date, update_by, remark) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssssss', $license_number, $description, $supplier, $renewal_date, $expired_date, $update_date, $update_by, $remark);

    if ($stmt->execute()) {
        echo '<script>alert("License Successfully Added!");</script>';
        echo '<script>window.location.href = "function.php";</script>';
    } else {
        echo '<script>alert("License Addition Failed!");</script>';
        echo '<script>window.location.href = "function.php";</script>';
    }
}

// Kemaskini Lesen
if (isset($_POST['update_license'])) {
    $id = $_POST['id'];
    $license_number = $_POST['license_number'];
    $description = $_POST['description'];
    $supplier = $_POST['supplier'];
    $renewal_date = $_POST['renewal_date'];
    $expired_date = $_POST['exp_date'];
    $update_date = $_POST['update_date'];
    $update_by = $_POST['update_by'];
    $remark = $_POST['remark'];

    // Ambil data lesen lama
    $old_license_query = "SELECT * FROM mb_licenses WHERE id = ?";
    $old_stmt = $conn->prepare($old_license_query);
    $old_stmt->bind_param('i', $id);
    $old_stmt->execute();
    $old_license = $old_stmt->get_result()->fetch_assoc();

    // Masukkan data lama ke dalam sejarah
    $history_query = "INSERT INTO mb_license_history (license_id, license_number, description, supplier, renewal_date, exp_date, update_date, update_by, remark) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $history_stmt = $conn->prepare($history_query);
    if ($history_stmt) {
        $history_stmt->bind_param('issssssss', $id, $old_license['license_number'], $old_license['description'], $old_license['supplier'], $old_license['renewal_date'], $old_license['exp_date'], $old_license['update_date'], $old_license['update_by'], $old_license['remark']);
        $history_stmt->execute();


    // Kemaskini data lesen
    $update_query = "UPDATE mb_licenses SET license_number = ?, description = ?, supplier = ?, renewal_date = ?, exp_date = ?, update_date = ?, update_by = ?, remark = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param('ssssssssi', $license_number, $description, $supplier, $renewal_date, $expired_date, $update_date, $update_by, $remark, $id);

    if ($update_stmt->execute()) {
        echo '<script>alert("License Successfully Updated!");</script>';
        echo '<script>window.location.href = "function.php";</script>';
    } else {
        echo '<script>alert("License Update Failed!");</script>';
        echo '<script>window.location.href = "function.php";</script>';
    }
}}

// Padam Lesen
if (isset($_POST['delete_license'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM mb_licenses WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo '<script>alert("License Successfully Deleted!");</script>';
        echo '<script>window.location.href = "function.php";</script>';
    } else {
        echo '<script>alert("License Deletion Failed!");</script>';
        echo '<script>window.location.href = "function.php";</script>';
    }
}

// Tambah Sejarah
if (isset($_POST['add_history'])) {
    $license_id = $_POST['license_id'];
    $renewal_date = $_POST['renewal_date'];
    $update_date = $_POST['update_date'];
    $update_by = $_POST['update_by'];
    $remark = $_POST['remark'];

    $query = "INSERT INTO mb_history (license_id, renewal_date, update_date, update_by, remark) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('issss', $license_id, $renewal_date, $update_date, $update_by, $remark);

    if ($stmt->execute()) {
        echo '<script>alert("History Successfully Added!");</script>';
        echo '<script>window.location.href = "function.php";</script>';
    } else {
        echo '<script>alert("History Addition Failed!");</script>';
        echo '<script>window.location.href = "function.php";</script>';
    }
}

// Kemaskini Sejarah
if (isset($_POST['update_history'])) {
    $id = $_POST['id'];
    $license_id = $_POST['license_id'];
    $renewal_date = $_POST['renewal_date'];
    $update_date = $_POST['update_date'];
    $update_by = $_POST['update_by'];
    $remark = $_POST['remark'];

    $query = "UPDATE mb_history SET license_id = ?, renewal_date = ?, update_date = ?, update_by = ?, remark = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('issssi', $license_id, $renewal_date, $update_date, $update_by, $remark, $id);

    if ($stmt->execute()) {
        echo '<script>alert("History Successfully Updated!");</script>';
        echo '<script>window.location.href = "function.php";</script>';
    } else {
        echo '<script>alert("History Update Failed!");</script>';
        echo '<script>window.location.href = "function.php";</script>';
    }
}

// Padam Sejarah
if (isset($_POST['delete_history'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM mb_history WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo '<script>alert("History Successfully Deleted!");</script>';
        echo '<script>window.location.href = "function.php";</script>';
    } else {
        echo '<script>alert("History Deletion Failed!");</script>';
        echo '<script>window.location.href = "function.php";</script>';
    }
}
?>
