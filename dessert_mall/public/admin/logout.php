<?php
    require_once('../../private/initialize.php');
    admin_log_out();
    redirect_to(url_for('admin/index.php'));
?>
