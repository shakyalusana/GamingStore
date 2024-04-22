<?php 

    function adminLogin(){
        session_start();
        if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
           redirect('index.php');
        }
    }

    function redirect($url){
        echo "<script>window.location.href='$url';</script>";
       
        
        exit;
    }

?>