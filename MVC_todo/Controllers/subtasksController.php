<?php

class subtasksController extends Controller
{
    function index()
    {
        // check authorization
        session_start();
        if ($_SESSION['valid'] != true or $_SESSION['type'] != 'admin_session') {
            header("Location: " . WEBROOT . "login/admin");
        }

        require(ROOT . 'Models/Subtask.php');

        $subtask = new Subtask();

        $d['subtasks'] = $subtask->showAllSubtasks();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        // check authorization
        session_start();
        if ($_SESSION['valid'] != true or $_SESSION['type'] != 'admin_session') {
            header("Location: " . WEBROOT . "login/admin");
        }

        if (isset($_POST['title'])) {
            require(ROOT . 'Models/Subtask.php');

            $subtask = new Subtask();

            if ($subtask->create($_POST['title'], $_POST['description'], $_POST['task_id'])) {
                header("Location: " . WEBROOT . "subtasks/index");
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

        require(ROOT . 'Models/Task.php');

        $task = new Task();

        $d["tasks"] = $task->filterByTitle($q);
        $this->layout = 'json';
        $this->set($d);
        $this->render('livesearch');
    }

    function edit($id)
    {
        // check authorization
        session_start();
        if ($_SESSION['valid'] != true or $_SESSION['type'] != 'admin_session') {
            header("Location: " . WEBROOT . "login/admin");
        }

        require(ROOT . 'Models/Subtask.php');

        $subtask = new Subtask();

        $d['subtask'] = $subtask->showSubtask($id);

        if (isset($_POST['title'])) {
            if ($subtask->edit($id, $_POST['title'], $_POST['description'], $_POST['task_id'])) {
                header("Location: " . WEBROOT . "subtasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        // check authorization
        session_start();
        if ($_SESSION['valid'] != true or $_SESSION['type'] != 'admin_session') {
            header("Location: " . WEBROOT . "login/admin");
        }

        require(ROOT . 'Models/Subtask.php');

        $subtask = new Subtask();
        if ($subtask->delete($id)) {
            header("Location: " . WEBROOT . "subtasks/index");
        }
    }
}
