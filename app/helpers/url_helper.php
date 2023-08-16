<?php
    // Simple page redirect

    function redirect($page) {
        //header('location:' . URLROOT . '/users/login');\
        header('location:' . URLROOT . '/' . $page);
    }