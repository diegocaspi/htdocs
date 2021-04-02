<?php

class LoginController extends Controller
{
    function admin()
    {
        session_start();
        // unsetting all session props
        unset($_SESSION['valid']);
        unset($_SESSION['user']);
        unset($_SESSION['type']);
        unset($_SESSION['user_id']);

        require(ROOT . 'Models/Admin.php');
        $admin = new Admin();

        if (isset($_POST['email']) and isset($_POST['password'])) {
            if ($res = $admin->login($_POST['email'], $_POST['password'])) {
                // settings up all session variables
                $_SESSION['valid'] = true;
                $_SESSION['type'] = 'admin_session';
                $_SESSION['user'] = $res['name'] . ' ' . $res['surname'];
                $_SESSION['user_id'] = $res['id'];
                // redirect to admin home page
                header("Location: " . WEBROOT . "home/admin");
            }
        }

        $this->layout = 'login';
        $this->render('admin');
    }

    function employee()
    {
        session_start();
        // unsetting all session props
        unset($_SESSION['valid']);
        unset($_SESSION['user']);
        unset($_SESSION['type']);
        unset($_SESSION['user_id']);

        require(ROOT . 'Models/Employee.php');
        $employee = new Employee();

        if (isset($_POST['email']) and isset($_POST['password'])) {
            if ($res = $employee->login($_POST['email'], $_POST['password'])) {
                // settings up all session variables
                $_SESSION['valid'] = true;
                $_SESSION['type'] = 'employee_session';
                $_SESSION['user'] = $res['name'] . ' ' . $res['surname'];
                $_SESSION['user_id'] = $res['id'];
                // redirect to employee home page
                header("Location: " . WEBROOT . "home/employee");
            }
        }

        $this->layout = 'login';
        $this->render('employee');
    }
}
