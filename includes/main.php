<?php
    require("../includes/db.php");

    if(isset($_POST['update-section']))
    {
        $home = $_POST['home'] ?? 0;
        $about = $_POST['about'] ?? 0;
        $resume = $_POST['resume'] ?? 0;
        $services = $_POST['services'] ?? 0;
        $portfolio = $_POST['portfolio'] ?? 0;
        $contact = $_POST['contact'] ?? 0;

        $query = "UPDATE section_control SET home_section='$home', about_section='$about', resume_section='$resume',
            service_section='$services', portfolio_section='$portfolio', contact_section='$contact' WHERE id=1";
        $run = mysqli_query($db,$query);
        if($run)
        {
            $_SESSION['status'] = "Save Changes Successfully.";
            //echo "<script>alert('Save Changes Successfull')</script>";            
            header('location:../admin/index.php');
        }
    }

    if(isset($_POST['update-home']))
    {
        $title = $_POST['title'];
        $icons = $_POST['icons'] ?? 0; 
        $nav = $_POST['nav'] ?? 0;

        $query = "UPDATE home SET title='$title', shownav='$nav', showicons='$icons' WHERE id=1";
        $run = mysqli_query($db,$query);
        if($run)
        {
            $_SESSION['status'] = "Settings Updated Successfully.";
            //echo "<script>alert('Save Changes Successfull')</script>";            
            header('location:../admin/index.php?homesection=true');
        }
    }

    if(isset($_POST['update-about']))
    {
       
        $title = $_POST['abouttitle'];
        $subtitle = $_POST['aboutsubtitle']; 
        $description = $_POST['description'];
        $count = $_POST['counter'] ?? 0;
        $interest = $_POST['interest'] ?? 0;
        $testimonial = $_POST['testimonial'] ?? 0;

        $imgname = time().$_FILES['aboutpic']['name'];
        $imgtmp = $_FILES['aboutpic']['tmp_name'];

        //checking file extension
        $imgext = explode('.',$imgname);
        $imgcheck = strtolower(end($imgext));
        $imgextstore = array('png', 'jpeg', 'jpg');

        if(in_array($imgcheck, $imgextstore))
        {
            $q = "SELECT * FROM about WHERE id=1";
            $r = mysqli_query($db,$q);
            $d = mysqli_fetch_array($r);
            $imgname = $d['profile_pic'];
        }

        move_uploaded_file($imgtmp,"../img/$imgname");
                
            $query = "UPDATE about SET about_title='$title', about_subtitle='$subtitle', about_description='$description', profile_pic='$imgname',
                show_counter='$count', show_interest='$interest', show_testimonial='$testimonial' WHERE id=1";
            $run = mysqli_query($db,$query);
            if($run)
            {
                $_SESSION['status'] = "About Page Updated Successfully.";
                //echo "<script>alert('Save Changes Successfull')</script>";            
                header('location:../admin/index.php?aboutsection=true');
                
                // print_r($_POST);
                // echo "<br><br>";
                // print_r($_FILES);
            }     
               
    }

    if(isset($_POST['add-skills']))
    {
        $skillname = $_POST['skillname'];
        $skilllevel = $_POST['skilllevel'];

        $query = "INSERT INTO skills(skill_name, skill_level) VALUES('$skillname', '$skilllevel')";       
        if(mysqli_query($db,$query))
        {
                $_SESSION['status'] = "Skills Added Successfully";
                //echo "<script>alert('Save Changes Successfull')</script>";            
                header('location:../admin/index.php?aboutsection=true');

        }
    }

    if(isset($_POST['add-lang']))
    {
        $langname = $_POST['langname'];
        $langlevel = $_POST['langlevel'];

        $query = "INSERT INTO languages(lang_name, lang_level) VALUES('$langname', '$langlevel')";       
        if(mysqli_query($db,$query))
        {
                $_SESSION['status'] = "Languages Added Successfully";
                //echo "<script>alert('Save Changes Successfull')</script>";            
                header('location:../admin/index.php?aboutsection=true');

        }
    }


    if(isset($_POST['add-testi']))
    {
        $name = $_POST['name'];
        $jobtitle = $_POST['jobtitle'];
        $quots = $_POST['quots'];        
        
        $imgname = time().$_FILES['alumniimg']['name'];
        $imgtmp = $_FILES['alumniimg']['tmp_name'];

        //checking file extension
        $imgext = explode('.',$imgname);
        $imgcheck = strtolower(end($imgext));
        $imgextstore = array('png', 'jpeg', 'jpg');

        if(in_array($imgcheck, $imgextstore))
        {
            move_uploaded_file($imgtmp,"../img/$imgname");

            $sql = "INSERT INTO testimonial(quot,name,job_title,alumni_pic)
                VALUES('$quots', '$name', '$jobtitle', '$imgname')";
                
            if(mysqli_query($db,$sql))
            {
                $_SESSION['status'] = "Testimonial Added Successfully";
                //echo "<script>alert('Save Changes Successfull')</script>";            
                header('location:../admin/index.php?aboutsection=true');
            }

            // $imgdestination = '../img/'.$imgname;
            // move_uploaded_file($imgtmp,"$imgdestination");

            // $sql = "INSERT INTO testimonial(quot,name,job_title,alumni_pic)
            //     VALUES('$quots', '$name', '$jobtitle', '$imgdestination')";

            // if(mysqli_query($db,$sql))
            // {
            //     $_SESSION['status'] = "Testimonial Added Successfully";
            //     //echo "<script>alert('Save Changes Successfull')</script>";            
            //     header('location:../admin/index.php?aboutsection=true');
            // }
            
        }

    }


    if(isset($_POST['add-interest']))
    {
        $interest = $_POST['icontitle'];
        $iconpicker = $_POST['iconpicker'];
        $iconcolor = $_POST['iconcolor'];

        $query = "INSERT INTO interest(title, icon, icon_color) VALUES('$interest', '$iconpicker', '$iconcolor')";       
        if(mysqli_query($db,$query))
        {
                $_SESSION['status'] = "Interest - Hobby Added Successfully";
                //echo "<script>alert('Save Changes Successfull')</script>";            
                header('location:../admin/index.php?aboutsection=true');

        }
    }


    if(isset($_POST['add-resume']))
    {
        $type = strtolower($_POST['type']);
        $title = $_POST['title'];
        $time_from = $_POST['datepicker1'];
        $time_to = $_POST['datepicker2'];
        $organization = $_POST['organization'];
        $location = $_POST['location'];
        $about_exp = $_POST['aboutexp'];

        $query = "INSERT INTO resume(type,title,time_from,time_to,organization,location,about_exp) 
            VALUES('$type','$title','$time_from','$time_to','$organization','$location','$about_exp')";       
        if(mysqli_query($db,$query))
        {
                $_SESSION['status'] = "Resume Data Added Successfully";
                //echo "<script>alert('Save Changes Successfull')</script>";            
                header('location:../admin/index.php?resumesection=true');

        }
    }


    if(isset($_POST['update-user-user']))
    {
        $name = $_POST['name'];
        $username = $_POST['username']; 
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $cnfpwd = $_POST['cnfpwd'];


        if($pwd == $cnfpwd)
        {
            $query = "UPDATE user_info SET name='$name', username='$username', email='$email', password='$cnfpwd' WHERE id=1";
            $run = mysqli_query($db,$query);
            if($run)
            {
                $_SESSION['status'] = "User - User Info Updated Successfully.";
                //echo "<script>alert('Save Changes Successfull')</script>";            
                header('location:../admin/index.php?user-infosection=true');
            }
        }
        else
        {
                $_SESSION['status'] = "Password And Confirm Password didn't match";
                echo "<script>alert('Password And Confirm Password didn't match')</script>";            
                header('location:../admin/index.php?user-infosection=true');
        }

        
    }
    

    if(isset($_POST['update-user-address']))
    {
        $city = $_POST['city'];
        $state = $_POST['state']; 
        $country = $_POST['country'];
        $street = $_POST['street'];
        $pincode = $_POST['pincode'];

        $query = "UPDATE user_info SET city='$city', state='$state', country='$country', street='$street', pincode='$pincode' WHERE id=1";
        $run = mysqli_query($db,$query);
        if($run)
        {
            $_SESSION['status'] = "Address - User Info Updated Successfully.";
            //echo "<script>alert('Save Changes Successfull')</script>";            
            header('location:../admin/index.php?user-infosection=true');
        }
    }


    if(isset($_POST['update-user-personal']))
    {
        print_r($_POST);
        print_r($_FILES);
        $birthday = $_POST['dob'];
        $age = $_POST['age']; 
        $mobile = $_POST['mobile'];
        $degree = $_POST['degree'];
        $website = $_POST['website'];
        $freelancer = $_POST['freelancer'] ?? 0;

        $imgname = time().$_FILES['userpic']['name'];
        $imgtmp = $_FILES['userpic']['tmp_name'];

        //checking file extension
        $imgext = explode('.',$imgname);
        $imgcheck = strtolower(end($imgext));
        $imgextstore = array('png', 'jpeg', 'jpg');

        if(in_array($imgcheck, $imgextstore))
        {
            $q = "SELECT * FROM user_info WHERE id=1";
            $r = mysqli_query($db,$q);
            $d = mysqli_fetch_array($r);
            $imgname = $d['user_pic'];
        }

        move_uploaded_file($imgtmp,"../img/$imgname");
                
            $query = "UPDATE user_info SET birthday='$birthday', age='$age', mobile='$mobile', user_pic='$imgname',
                degree='$degree', website='$website', freelance='$freelancer' WHERE id=1";
            $run = mysqli_query($db,$query);
            if($run)
            {
                // $_SESSION['status'] = "Personal - User Info Updated Successfully.";
                // //echo "<script>alert('Save Changes Successfull')</script>";            
                // header('location:../admin/index.php?user-infosection=true');
                print_r($_POST);
                echo "<br><br>";
                print_r($_FILES);
            }     
               
    }

?>