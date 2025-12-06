<?php
//Connect to database
require __DIR__ . '/db.php';

//Run a query to get all tasks from the database (newest)
$task_result_set = mysqli_query(

    $mysqli,
    "SELECT id, title, is_done FROM tasks ORDER BY id DESC"

);

//Store all rows of data in a php array fopr later use
$task_rows = [];
while ($task_row = mysqli_fetch_assoc($task_result_set)) {
    //convert is_done to integer (0 or 1 instead of "0" or "1")
    $task_row["is_done"] = (int)$task_row["is_done"];
    $task_rows[] = $task_row;
}

//Count totals for the todo tracker
$total_task_count = count($task_rows);
$completed_task_count = 0;
foreach ($task_rows as $task) {
    if ($task["is_done"] === 1) {
        $completed_task_count++;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3c85196208.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Todo App</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="todo-tracker">
                <div class="task-tracker-text">
                    <h2>Tasks Completed</h2>
                    <p class="completed-sub-heading">Keep it up</p>
                </div>
                <div class="task-counter">
                    <?php echo $completed_task_count; ?> <span class="spacer">/</span> <?php echo $total_task_count; ?>
                </div>
            </div>
            <form action="add.php" method="POST" class="task-form">
                <input type="text" name="task_title" class="task-input" placeholder="Your next task is..." required>
                <button class="submit-btn" type="submit"><i class="fa-solid fa-plus fa-rotate-90 fa-2xl"></i></button>
            </form>
            <ul class="task-list">
                <!-- Check if any tasks have been created -->
                <?php if (empty($task_rows)): ?>

                    <li class="task-item">
                        <div class="li-text">Add a task to get started</div>
                    </li>
                <?php else: ?>
                    <?php foreach ($task_rows as $task): ?>
                        <li class="task-item">
                            <!-- Add done class if check mark has been clicked -->
                            <div class="li-text <?php echo $task['is_done'] ? 'done' : '' ?>">
                                <?php echo $task['title']; ?>
                            </div>
                            <div class="task-icons">
                                <!-- Add logic for check button to cross out completed tasks -->
                                <form action="toggle.php" method="POST" class="inline-form">
                                    <!-- Toggle check button -->
                                    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                    <button type="submit" class="icon-btn" title="Task Completed">
                                        <i class="fa-solid fa-circle-check fa-2xl"></i>
                                    </button>
                                </form>
                                <!-- Delete Button -->
                                <form action="delete.php" method="POST" class="inline-form">
                                    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                    <button type="submit" class="icon-btn" title="Delete Task">
                                        <i class="fa-solid fa-trash fa-2xl"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php endif ?>
            </ul>
            <form id="clear-form" action="clear.php" method="POST">
                <button class="clear-all-btn" type="submit">Clear All Tasks</button>
            </form>
        </div>
    </main>

    <script src="app.js"></script>
</body>

</html>