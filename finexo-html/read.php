<?php
include 'config.php';

$sql = "SELECT * FROM modules ";
$filterGrade = isset($_GET['filterGrade']) ? $_GET['filterGrade'] : '';

if ($filterGrade != '') {
    $sql .= " WHERE grade='$filterGrade'";
}
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['moduleName'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "<td>" . $row['grade'] . "</td>";
        echo "<td><a href='uploads/" . $row['pdfFile'] . "' target='_blank'>" . $row['pdfFile'] . "</a></td>";
        echo "<td><a href='update.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No records found</td></tr>";
}
?>
