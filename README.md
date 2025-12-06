# Full Stack Todo App

A simple and clean todo list application built with PHP, MySQL, and vanilla JavaScript.

## Features

- ✅ Add new tasks
- ✅ Mark tasks as complete/incomplete
- ✅ Delete individual tasks
- ✅ Clear all tasks at once
- ✅ Track completion progress
- ✅ Responsive design

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Icons**: Font Awesome
- **Fonts**: Google Fonts (Lato)

## Setup Instructions

### Prerequisites
- MAMP (or XAMPP/WAMP)
- PHP 7.4+
- MySQL

### Installation

1. Clone this repository to your MAMP htdocs folder: git clone https://github.com/Dean2424/Full-Stack-ToDo-App.git
2. Start MAMP and ensure MySQL is running on port 8889

3. Create the database:
- Open phpMyAdmin (http://localhost:8888/phpMyAdmin/)
- Create a new database named `full_stack_todo_app`
- Import the SQL schema or create a `tasks` table with columns: `id`, `title`, `is_done`

4. Configure database connection in `db.php`:
```php
define('DB_HOST', 'localhost:8889');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'full_stack_todo_app');

5. Access the app at http://localhost:8888/Full-stack-todo-app/

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    is_done TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

License
MIT License ``````
