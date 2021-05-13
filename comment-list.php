<?php
include_once 'config.php';

$link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

$sql = "SELECT * FROM tbl_comment ORDER BY parent_comment_id asc, comment_id asc";

$result = mysqli_query($link, $sql);
$record_set = array();
while ($row = mysqli_fetch_assoc($result)) {
    array_push($record_set, $row);
}
mysqli_free_result($result);

mysqli_close($link);
echo json_encode($record_set);
?>
