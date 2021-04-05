<?php
//ini_set('display_errors', 1);

use Config\PHPMailer\MyCustomMailer;
require(ROOT . 'Config/PHPMailer/MyCustomMailer.php');

class employeesController extends Controller
{
    function index()
    {
        session_start();
        if ($_SESSION['valid'] != true) {
            header("Location: " . WEBROOT . "login/admin");
        }

        require(ROOT . 'Models/Employee.php');

        $employee = new Employee();

        $d['employees'] = $employee->showAllEmployees();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        session_start();
        if ($_SESSION['valid'] != true or $_SESSION['type'] != 'admin_session') {
            header("Location: " . WEBROOT . "login/admin");
        }
        if (isset($_POST["name"]) and isset($_POST["surname"]) and isset($_POST['email'])) {

            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                // failed email validation
                $d['name'] = $_POST["name"];
                $d['surname'] = $_POST["surname"];
                $d['email_err'] = '*Invalid email format';
                $this->set($d);
            } else {
                require(ROOT . 'Models/Employee.php');

                $employee = new Employee();
                $gen = $employee->create($_POST["name"], $_POST["surname"], $_POST["email"]);

                if ($gen != false) {
                    // send email
                    try {
                        $mailer = new MyCustomMailer();
                        $to_name = $_POST['surname'] . ' ' . $_POST['name'];
                        $send = $mailer->sendSecurityCodeEmail($_POST["email"], $to_name, $gen);

                        if ($send) {
                            // if message has been sent correctly navigate to employees index page
                            header("Location: " . WEBROOT . "employees/index");
                        } else {
                            // if an error occured during email sending show an error banner
                            echo '<script>alert("Unable to send email")</script>';
                        }
                    } catch (Exception $e) {
                        echo '<script>alert("' . $e . '")</script>';
                    }
                } else {
                    // if an error occured show an alert
                    echo '<script>alert("User already exist or an error occured!")</script>';
                }
            }
        }
        $this->render("create");
    }

    function edit($id)
    {
        session_start();
        if ($_SESSION['valid'] != true or $_SESSION['type'] != 'admin_session') {
            header("Location: " . WEBROOT . "login/admin");
        }

        require(ROOT . 'Models/Employee.php');
        $employee = new Employee();

        $d['employee'] = $employee->showEmployee($id);

        if (isset($_POST["name"]) and isset($_POST["surname"]) and isset($_POST['email'])) {

            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $d['email_err'] = '*Invalid email format';
            } else {
                if ($employee->edit($id, $_POST["name"], $_POST["surname"], $_POST["email"])) {
                    header("Location: " . WEBROOT . "employees/index");
                }
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

        require(ROOT . 'Models/Employee.php');

        $employee = new Employee();
        if ($employee->delete($id)) {
            header("Location: " . WEBROOT . "employees/index");
        }
    }
}
