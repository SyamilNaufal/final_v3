<?php

// INCLUDE CONFIG
include 'db.php';

function trimmer($string) {
    // Replace non-breaking spaces and other whitespace characters with a regular space
    $string = preg_replace('/\s+/', ' ', $string);
    // Trim the string to remove leading and trailing whitespace
    return trim($string);
}

function capEachWord($string) 
{
    $string = strtolower($string);
    $string = ucwords($string);
    return trimmer($string);
}

function createLicense($conn, $table, $user_id, $license_number, $supplier, $expired_date) {
    $sql = "INSERT INTO {$table}_licenses (user_id, license_number, supplier, expired_date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $user_id, $license_number, $supplier, $expired_date);
    if ($stmt->execute()) { 
        echo "New license added successfully";
        return true;
    } else {
        echo "Error: " . $stmt->error;
        return false;
    }
}

function createHistory($conn, $table, $license_id, $renewal_date, $update_date, $update_by, $remark) {
    $sql = "INSERT INTO {$table}_history (license_id, renewal_date, update_date, update_by, remark) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $license_id, $renewal_date, $update_date, $update_by, $remark);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// READ
function getLicenses($conn, $table) {
    $sql = "SELECT * FROM {$table}_licenses";
    $result = $conn->query($sql);
    $licenses = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $licenses[] = $row;
        }
    }
    return $licenses;
}

function getLicenseById($conn, $table, $id) {
    $sql = "SELECT * FROM {$table}_licenses WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getHistories($conn, $table) {
    $sql = "SELECT * FROM {$table}_history";
    $result = $conn->query($sql);
    $histories = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $histories[] = $row;
        }
    }
    return $histories;
}

function getHistoryById($conn, $table, $id) {
    $sql = "SELECT * FROM {$table}_history WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// UPDATE
function updateLicense($conn, $table, $id, $user_id, $license_number, $supplier, $expired_date) {
    $sql = "UPDATE {$table}_licenses SET user_id = ?, license_number = ?, supplier = ?, expired_date = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssi", $user_id, $license_number, $supplier, $expired_date, $id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function updateHistory($conn, $table, $id, $license_id, $renewal_date, $update_date, $update_by, $remark) {
    $sql = "UPDATE {$table}_history SET license_id = ?, renewal_date = ?, update_date = ?, update_by = ?, remark = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssi", $license_id, $renewal_date, $update_date, $update_by, $remark, $id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// DELETE
function deleteLicense($conn, $table, $id) {
    $sql = "DELETE FROM {$table}_licenses WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function deleteHistory($conn, $table, $id) {
    $sql = "DELETE FROM {$table}_history WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Example Usage

// // Create a new license
// if (createLicense($conn, 'dsa', 2, 'LN-003', 'New Supplier', '2024-09-10')) {
//     echo "License created successfully.<br>";
// } else {
//     echo "Error creating license.<br>";
// }

// // Get all licenses
// $licenses = getLicenses($conn, 'dsa');
// foreach ($licenses as $license) {
//     echo "ID: " . $license['id'] . " - License Number: " . $license['license_number'] . "<br>";
// }

// // Get a specific license by ID
// $license = getLicenseById($conn, 'dsa', 1);
// echo "License Number: " . $license['license_number'] . "<br>";

// // Update a license
// if (updateLicense($conn, 'dsa', 1, 1, 'LN-001-UPDATED', 'Updated Supplier', '2024-12-31')) {
//     echo "License updated successfully.<br>";
// } else {
//     echo "Error updating license.<br>";
// }

// // Delete a license
// if (deleteLicense($conn, 'dsa', 3)) {
//     echo "License deleted successfully.<br>";
// } else {
//     echo "Error deleting license.<br>";
// }

// // Create a new history entry
// if (createHistory($conn, 'dsa', 1, '2024-10-01', '2024-10-01', 'admin', 'Renewed license')) {
//     echo "History created successfully.<br>";
// } else {
//     echo "Error creating history.<br>";
// }

// // Get all histories
// $histories = getHistories($conn, 'dsa');
// foreach ($histories as $history) {
//     echo "ID: " . $history['id'] . " - Remark: " . $history['remark'] . "<br>";
// }

// // Get a specific history by ID
// $history = getHistoryById($conn, 'dsa', 1);
// echo "Remark: " . $history['remark'] . "<br>";

// // Update a history entry
// if (updateHistory($conn, 'dsa', 1, 1, '2024-10-15', '2024-10-15', 'admin', 'Updated remark')) {
//     echo "History updated successfully.<br>";
// } else {
//     echo "Error updating history.<br>";
// }

// // Delete a history entry
// if (deleteHistory($conn, 'dsa', 1)) {
//     echo "History deleted successfully.<br>";
// } else {
//     echo "Error deleting history.<br>";
// }

$conn->close();
?>
