<?php
include '../../functions/db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $query = "SELECT * FROM mb_license_history WHERE license_id = $id";
    $result = $conn->query($query);
    
    if ($result === false) {
        die("Query failed: " . $conn->error);
    }
    
    echo '<table class="table">';
    echo '<thead><tr><th>License ID</th><th>License Number</th><th>Supplier</th><th>Renewal Date</th><th>Expired Date</th><th>Update Date</th><th>Update By</th><th>Remark</th><th>Date Change</th></tr></thead>';
    echo '<tbody>';
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['license_id'] . '</td>';
        echo '<td>' . $row['license_number'] . '</td>';
        echo '<td>' . $row['supplier'] . '</td>';
        echo '<td>' . $row['renewal_date'] . '</td>';
        echo '<td>' . $row['exp_date'] . '</td>';
        echo '<td>' . $row['update_date'] . '</td>';
        echo '<td>' . $row['update_by'] . '</td>';
        echo '<td>' . $row['remark'] . '</td>';
        echo '<td>' . $row['changed_at'] .'</td>';
        echo '</tr>';
    }
    
    echo '</tbody></table>';
}
?>
