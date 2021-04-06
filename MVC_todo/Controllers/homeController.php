<?php

class homeController extends Controller
{
    function admin()
    {
        session_start();
        if ($_SESSION['valid'] != true or $_SESSION['type'] != 'admin_session') {
            header("Location: " . WEBROOT . "login/admin");
        }

        $d['username'] = $_SESSION['user'];
        require(ROOT . 'Models/Employee.php');
        require(ROOT . 'Models/Task.php');
        require(ROOT . 'Models/Subtask.php');

        // load necessary data
        $employee = new Employee();
        $task = new Task();
        $subtask = new Subtask();

        $d['employees_count'] = $employee->count()[0];
        $d['subtasks_count'] = $subtask->count()[0];
        $d['tasks_count'] = $task->count()[0];

        $this->set($d);
        $this->render('admin');
    }

    function employee()
    {
        session_start();
        if ($_SESSION['valid'] != true or $_SESSION['type'] != 'employee_session') {
            header("Location: " . WEBROOT . "login/admin");
        }

        $d['username'] = $_SESSION['user'];

        require(ROOT . 'Models/Task.php');
        $task = new Task();

        // load necessary data
        $d['tasks'] = $task->getAllEmployeeTasks($_SESSION['user_id']);

        $this->layout = 'employee';
        $this->set($d);
        $this->render('employee');
    }
}
