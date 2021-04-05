<?php

class accountController extends Controller
{
    function admin()
    {
        // default layout for admin
        $this->layout = 'default';
        $this->render('admin');
    }

    function employee()
    {
        // employee laoyout for employee
        $this->layout = 'employee';
        $this->render('employee');
    }
}
