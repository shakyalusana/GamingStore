<?php 
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'store';

    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    function filteration($data){
        foreach($data as $key => $value){
            $data[$key]=trim($value);
            $data[$key]=stripslashes($value);
            $data[$key]=htmlspecialchars($value);
            $data[$key]=strip_tags($value);


        }
        return $data;
    }
    define('UPLOAD_IMAGE_PATH',$_SERVER['DOCUMENT_ROOT'].'/projects/carrental/admin/images/');
    define('ABOUT_FOLDER','/');

    function selectAll($table){
        $con=$GLOBALS['con'];
        $res=mysqli_query($con,"SELECT * FROM $table");
        return $res;
    }

    function deleteImage($image,$folder){
        if(unlink(UPLOAD_IMAGE_PATH.$folder.$image)){
            return true;
        }else{
            return false;
        }
    }
    
    function select($sql,$values,$datatypes){
        $con=$GLOBALS['con'];
        if($stmt=mysqli_prepare($con,$sql)){
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);  //...= splat operator
            if(mysqli_stmt_execute($stmt)){
                $res=mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }else{
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Select");
            }
        }else{
            die("Query cannot be prepared - Select");
        }
    }
    function update($sql, $values, $datatypes){
        $con = $GLOBALS['con'];
        if ($stmt = mysqli_prepare($con, $sql)) {
            // Prepare an array with $values to be unpacked
            $bind_params = array_merge([$stmt, $datatypes], $values);
            // Use the splat operator before $bind_params
            mysqli_stmt_bind_param(...$bind_params);
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            } else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Update");
            }
        } else {
            die("Query cannot be prepared - Update");
        }
    }
    
    function delete($sql, $values, $datatypes){
        $con = $GLOBALS['con'];
        if ($stmt = mysqli_prepare($con, $sql)) {
            // Prepare an array with $values to be unpacked
            $bind_params = array_merge([$stmt, $datatypes], $values);
            // Use the splat operator before $bind_params
            mysqli_stmt_bind_param(...$bind_params);
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            } else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Delete");
            }
        } else {
            die("Query cannot be prepared - Delete");
        }
    }

    function insert($sql, $values, $datatypes){
        $con = $GLOBALS['con'];
        if ($stmt = mysqli_prepare($con, $sql)) {
            // Use the splat operator before $values
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            } else {
                mysqli_stmt_close($stmt);
                die("Query execution failed: " . mysqli_error($con));
            }
        } else {
            die("Query preparation failed: " . mysqli_error($con));
        }
    }
    
    function uploadImage($image,$folder){
        $valid_mime=['image/jpeg','image/png','image/webp'];
        $img_mime=$image['type'];
        if(!in_array($img_mime,$valid_mime)){
            return'inv_img';//invalid image mime or format
        }elseif(($image['size']/(1024*1024))>2){
            return 'inv_size'; //invalid size greater than 2mb
        }else{
            $ext=pathinfo($image['name'],PATHINFO_EXTENSION);
            $rname='IMG_'.random_int(11111,99999).".$ext";

            $img_path=UPLOAD_IMAGE_PATH.$folder.$rname;
            if(move_uploaded_file($image['tmp_name'],$img_path)){
                return $rname;
            }else{
                echo 'failed to upload image';
            }
        }
    }
?>