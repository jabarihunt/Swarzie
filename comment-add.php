<?php
//require_once ("user.php");
include_once 'config.php';

$link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

$commentId = isset($_POST['comment_id']) ? $_POST['comment_id'] : "";
$comment = isset($_POST['comment']) ? $_POST['comment'] : "";
$commentSenderName = isset($_POST['name']) ? $_POST['name'] : "";
$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO tbl_comment(parent_comment_id,comment,comment_sender_name,date) VALUES ('" . $commentId . "','" . $comment . "','" . $commentSenderName . "','" . $date . "')";

$result = mysqli_query($link, $sql);

if (! $result) {
    $result = mysqli_error($link);
}
echo $result;
?>
