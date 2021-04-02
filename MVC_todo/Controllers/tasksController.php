<?php
class tasksController extends Controller
{
    function index()
    {
        session_start();
        if ($_SESSION['valid'] != true or $_SESSION['type'] != 'admin_session') {
            header("Location: " . WEBROOT . "login/admin");
        }

        require(ROOT . 'Models/Task.php');

        $tasks = new Task();

        $d['tasks'] = $tasks->showAllTasks();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        session_start();
        if ($_SESSION['valid'] != true or $_SESSION['type'] != 'admin_session') {
            header("Location: " . WEBROOT . "login/admin");
        }

        if (isset($_POST["title"]))
        {
            require(ROOT . 'Models/Task.php');

            $task= new Task();

            if ($task->create($_POST["title"], $_POST["description"], $_POST['employee_id']))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function livesearch($q)
    {
        session_start();
        if ($_SESSION['valid'] != true or $_SESSION['type'] != 'admin_session') {
            header("Location: " . WEBROOT . "login/admin");
        }

        require(ROOT . 'Models/Employee.php');

        $employee = new Employee();

        $d["employees"] = $employee->filterBySurname($q);
        $this->layout = 'json';
        $this->set($d);
        $this->render('livesearch');
    }

    function edit($id)
    {
        session_start();
        if ($_SESSION['valid'] != true or $_SESSION['type'] != 'admin_session') {
            header("Location: " . WEBROOT . "login/admin");
        }

        require(ROOT . 'Models/Task.php');
        $task= new Task();

        $d["task"] = $task->showTask($id);

        if (isset($_POST["title"]))
        {
            if ($task->edit($id, $_POST["title"], $_POST["description"], $_POST["employee_id"]))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        session_start();
        if ($_SESSION['valid'] != true or $_SESSION['type'] != 'admin_session') {
            header("Location: " . WEBROOT . "login/admin");
        }
        
        require(ROOT . 'Models/Task.php');

        $task = new Task();
        if ($task->delete($id))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>