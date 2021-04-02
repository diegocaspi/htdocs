<?php

class accountController extends Controller
{
    function admin()
    {
        $this->render('admin');
    }

    function employee()
    {
        $this->render('employee');
    }
}
