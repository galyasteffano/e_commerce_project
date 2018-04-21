<?php

    function login($user){
        session_regenerate_id();
        $_SESSION['user_id']=$user['user_id'];
        $_SESSION['last_login']=time(); #help "expire someone after certain time
        $_SESSION['username']=$user['email'];
        return true;
    }
    function admin_login($admin){
        session_regenerate_id();
        $_SESSION['admin_id']=$admin['admin_id'];
        $_SESSION['last_login']=time(); #help "expire someone after certain time
        $_SESSION['username']=$admin['username'];
        return true;
    }
    function admin_log_out(){
        unset($_SESSION['admin_id']);
        unset($_SESSION['last_login']);
        unset($_SESSION['username']);
        return true;
    }
    function log_out(){
        unset($_SESSION['user_id']);
        unset($_SESSION['last_login']);
        unset($_SESSION['username']);
        return true;
    }
    function logged_in(){
        return isset($_SESSION['user_id']);
    }
    function admin_logged_in(){
        return isset($_SESSION['admin_id']);
    }
    function require_login(){
        if(!logged_in()){
            redirect_to(url_for('pages/account/login.php'));
        }
        else{}
    }

    function require_admin_login(){
        if(!admin_logged_in()){
            redirect_to(url_for('admin/index.php'));
        }
        else{}
    }
?>
