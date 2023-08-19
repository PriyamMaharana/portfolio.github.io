<?php

    require_once('../db.php');
    
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $query = "DELETE FROM languages WHERE id=$id";
        if(mysqli_query($db,$query))
        {
                $_SESSION['status'] = "Data Deleted !";
                //echo "<script>alert('Save Changes Successfull')</script>";            
                header('location:../../admin/index.php?aboutsection=true');
        }
    }

    
?>