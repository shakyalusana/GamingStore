<?php
session_start();

unset($_SESSION['cart']);
echo 'Cart cleared successfully';
?>
