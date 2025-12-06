<?php
//Connect to database
require __DIR__ . '/db.php';

//Delete all tasks from database and UI

mysqli_query($mysqli, "DELETE FROM tasks");

header('Location: index.php');
exit;
