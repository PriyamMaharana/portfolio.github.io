<?php
  require('../includes/db.php');
  error_reporting(0);
  if(!isset($_SESSION['isUserLoggedIn'])) {
    header('location:login.php');
  }
 
  $query = "SELECT * FROM skills,languages,home,section_control,social_media,about,user_info,footer_details";
  $run = mysqli_query($db, $query);
  $data = mysqli_fetch_array($run);

  include("../includes/header.php");
  include("../includes/navbar.php");
  include("../includes/sidenav.php");
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <h4 class="m-0 text-muted">Manage Site</h4>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <?php 
                      if(isset($_SESSION['status'])){ 
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey ! </strong>Your&nbsp;<?php echo $_SESSION['status'];?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                        unset($_SESSION['status']);
                      }
                    ?>
                </div><!-- /.col -->
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Home section start -->
            <?php if(isset($_GET['homesection'])) {  ?>
            <div class="card card-secondary">
                <div class="card-header">
                    <h5 class="m-0"><b>H O M E </b></h5>
                </div>
                <form method="post" action="../includes/main.php">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label for="title">Portfolio Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="<?=$data['title']?>" required>
                                </div>
                            </div>
                            <div class="col-lg-4 ">
                                <div class="form-group ml-5">
                                    <div class="custom-control custom-switch ">
                                        <input type="checkbox" class="custom-control-input" name="icons"
                                            id="customSwitch1" <?php if($data['showicons']){ echo "checked"; }?>>
                                        <label class="custom-control-label" for="customSwitch1">&nbsp;&nbsp;SHOW
                                            &nbsp;ICONS</label>
                                    </div>
                                </div>
                                <div class="form-group ml-5">
                                    <div class="custom-control custom-switch ">
                                        <input type="checkbox" class="custom-control-input" name="nav"
                                            id="customSwitch2" <?php if($data['shownav']){ echo "checked"; }?>>
                                        <label class="custom-control-label" for="customSwitch2">&nbsp;&nbsp;SHOW
                                            &nbsp;NAVIGATION</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-secondary btn-lg" name="update-home" id="update-home"
                            value="UPDATE HOME">
                    </div>
                </form>
            </div>
            <!-- home section end -->

            <!-- about section start -->
            <?php } else if(isset($_GET['aboutsection'])) { ?>
            <div class="content mb-5">
                <div class="container-fluid">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h5 class="m-0"><b>A B O U T &nbsp;&nbsp;U S</b></h5>
                        </div>
                        <form method="post" action="../includes/main.php" role="form" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <label for="abouttitle">About Title</label>
                                            <input type="text" class="form-control" name="abouttitle" id="abouttitle"
                                                value="<?=$data['about_title']?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="aboutsubtitle">About Subtitle</label>
                                            <textarea class="form-control" rows="2" name="aboutsubtitle"
                                                id="aboutsubtitle" required><?=$data['about_subtitle']?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" rows="4" name="description" id="description"
                                                required><?=$data['about_description']?></textarea>
                                        </div>
                                        <div class="form-group ">
                                            <label for="aboutpic">About Image</label>
                                            <input type="file" class="form-control " name="aboutpic" id="aboutpic"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group ml-5">
                                            <img src="../img/<?=$data['profile_pic']?>" class="col-7">
                                        </div>
                                        <hr class="ml-5"><br>
                                        <div class="form-group ml-5">
                                            <div class="custom-control custom-switch ">
                                                <input type="checkbox" class="custom-control-input" name="counter"
                                                    id="customSwitch1"
                                                    <?php if($data['show_counter']){ echo "checked"; }?>>
                                                <label class="custom-control-label" for="customSwitch1">&nbsp;&nbsp;SHOW
                                                    &nbsp;COUNTER</label>
                                            </div>
                                        </div>
                                        <div class="form-group ml-5">
                                            <div class="custom-control custom-switch ">
                                                <input type="checkbox" class="custom-control-input" name="interest"
                                                    id="customSwitch2"
                                                    <?php if($data['show_interest']){ echo "checked"; }?>>
                                                <label class="custom-control-label" for="customSwitch2">&nbsp;&nbsp;SHOW
                                                    &nbsp;INTEREST</label>
                                            </div>
                                        </div>
                                        <div class="form-group ml-5">
                                            <div class="custom-control custom-switch ">
                                                <input type="checkbox" class="custom-control-input" name="testimonial"
                                                    id="customSwitch3"
                                                    <?php if($data['show_testimonial']){ echo "checked"; }?>>
                                                <label class="custom-control-label" for="customSwitch3">&nbsp;&nbsp;SHOW
                                                    &nbsp;TESTIMONIAL</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" class="btn btn-secondary " name="update-about" id="update-about"
                                    value="UPDATE &nbsp;ABOUT &nbsp; US">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- about - skills -->
            <div class="content mb-5 ">
                <div class="container-fluid">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h5 class="m-0"><b>S K I L L S</b></h5>
                        </div>
                        <form method="post" action="../includes/main.php">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class=" form-group mt-3">
                                            <label for="skillname">Skill Name</label>
                                            <input type="text" class="form-control" name="skillname" id="skillname"
                                                placeholder="Enter progarming skills here.." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="skilllevel">Skill Level</label>
                                            <input type="range" class="form-control" name="skilllevel" id="skilllevel"
                                                value="">
                                        </div>
                                        <div class="form-group mt-5">
                                            <input type="submit" class="btn btn-secondary btn-lg btn-block"
                                                name="add-skills" id="update-skills" value="ADD SKILLS">
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-7">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 100px">Skill Name</th>
                                                    <th style="width: 180px">Skill Level</th>
                                                    <th style="width: 20px">Label</th>
                                                    <th style="width: 30px">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $q = "SELECT * FROM skills";
                                                    $r = mysqli_query($db,$q);
                                                    while($d = mysqli_fetch_array($r)) {
                                                ?>
                                                <tr>
                                                    <td><?=$d['skill_name']?></td>
                                                    <td>
                                                        <div class=" progress progress-xs mt-2">
                                                            <div class="progress-bar bg-warning"
                                                                style="width: <?=$d['skill_level']?>%">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5><span class="badge bg-primary"><?=$d['skill_level']?>%</span>
                                                        </h5>
                                                    </td>
                                                    <td>
                                                        <center>
                                                        <a href="#">
                                                            <!-- <i class="fa fa-trash" aria-hidden="true" style="color: #DC3545;"></i> -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                                            </svg>
                                                        </a>
                                                        <a href="../includes/delete/deleteSkills.php?id=<?=$d['id']?>" class="ml-4">
                                                            <i class="fa fa-trash fa-sm " aria-hidden="true"
                                                            style="color: #DC3545;"></i>
                                                        </a>
                                                        </center>
                                                    </td>

                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- about - skill  end -->

            <!-- about-language  -->
            <div class="content mb-5">
                <div class="container-fluid">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h5 class="m-0"><b>L A N G U A G E S</b></h5>
                        </div>
                        <form method="post" action="../includes/main.php">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 100px">Language Name</th>
                                                    <th style="width: 180px">Language Level</th>
                                                    <th style="width: 20px">Label</th>
                                                    <th style="width: 30px">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $q = "SELECT * FROM languages";
                                                $r = mysqli_query($db,$q);
                                                while($d = mysqli_fetch_array($r)) {
                                                ?>
                                                <tr>
                                                    <td><?=$d['lang_name']?></td>
                                                    <td>
                                                        <div class=" progress progress-xs mt-2">
                                                            <div class="progress-bar bg-warning" style="width: <?=$d['lang_level']?>%">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5><span class="badge bg-primary"><?=$d['lang_level']?>%</span></h5>
                                                    </td>
                                                    <td>
                                                        <center>
                                                        <a href="#">
                                                            <!-- <i class="fa fa-trash" aria-hidden="true" style="color: #DC3545;"></i> -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                                            </svg>
                                                        </a>
                                                        <a href="../includes/delete/deleteLang.php?id=<?=$d['id']?>" class="ml-4">
                                                            <i class="fa fa-trash fa-sm " aria-hidden="true" style="color: #DC3545;"></i>
                                                        </a>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-4">
                                        <div class=" form-group mt-3">
                                            <label for="langname">Language Name</label>
                                            <input type="text" class="form-control" name="langname" id="langname"
                                                placeholder="Enter language here.." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="langlevel">Language Level</label>
                                            <input type="range" class="form-control" name="langlevel" id="langlevel"
                                                value="">
                                        </div>
                                        <div class="form-group mt-5">
                                            <input type="submit" class="btn btn-secondary btn-lg btn-block" name="add-lang"
                                                id="update-skills" value="ADD LANGUAGE">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- about-language end -->
            
            <!-- interest -->
            <div class="content mb-5">
                <div class="container-fluid">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h5 class="m-0"><b>I N T E R E S T</b></h5>
                        </div>
                        <form method="post" action="../includes/main.php">
                            <div class="card-body">
                                <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="icontitle">Interest OR Likes</label>
                                        <input type="text" class="form-control" name="icontitle" id="icontitle" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="iconpicker">Select Icon</label>
                                        <input type="text" class="form-control iconpicker" name="iconpicker" id="iconpicker"
                                            aria-label="Icone Picker" aria-describedby="basic-addon1" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="iconcolor">Select Icon Color</label>
                                        <select class="form-control" name="iconcolor" id="iconcolor">
                                            <option> </option>
                                            <option>Red</option>
                                            <option>Orange</option>
                                            <option>Yellow</option>
                                            <option>Green</option>
                                            <option>Blue</option>
                                            <option>Indigo</option>
                                            <option>Violet</option>
                                            <option>Cyan</option>
                                            <option>Crimson</option>
                                        </select>
                                    </div> 
                                    <div class="form-group mt-5">
                                        <input type="submit" class="btn btn-secondary btn-lg btn-block" name="add-interest"
                                                id="add-interest" value="ADD INTEREST">
                                    </div>                                   
                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-7">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 230px">Interest OR Likes</th>
                                                    <th style="width: 110px">Icon</th>
                                                    <th style="width: 110px">Icon Color</th>
                                                    <th style="width: 40px">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $q = "SELECT * FROM interest";
                                                $r = mysqli_query($db,$q);
                                                while($d = mysqli_fetch_array($r)) {
                                                ?>
                                                <tr>
                                                    <td><?=$d['title']?></td>
                                                    <td>
                                                        <h3><i class="<?=$d['icon']?>" aria-hidden="true" style="color: <?=$d['icon_color']?>"></i></h3>
                                                    </td>
                                                    <td><?=$d['icon_color']?></td>
                                                    <td>
                                                        <center>
                                                        <a href="#">
                                                            <!-- <i class="fa fa-trash" aria-hidden="true" style="color: #DC3545;"></i> -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                                            </svg>
                                                        </a>
                                                        <a href="../includes/delete/deleteInterest.php?id=<?=$d['id']?>" class="ml-4">
                                                            <i class="fa fa-trash fa-sm " aria-hidden="true" style="color: #DC3545;"></i>
                                                        </a>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- interest end -->

            <!-- testimonial -->
            <div class="content mb-5">
                <div class="container-fluid">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h5 class="m-0"><b>T E S T I M O N I A L</b></h5>
                        </div>
                        <div class="card-body table-responsive" style="height: 300px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 150px">Name</th>
                                        <th style="width: 150px">Job Title</th>
                                        <th style="width: 400px">Alumni Quots</th>
                                        <th style="width: 100px">Image</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $q = "SELECT * FROM testimonial";
                                            $r = mysqli_query($db,$q);
                                            while($d = mysqli_fetch_array($r)) {
                                        ?>
                                        <tr>
                                            <td><?=$d['name']?></td>
                                            <td><?=$d['job_title']?></td>
                                            <td><?=$d['quot']?></td>
                                            <td>
                                                <img src="../img/<?=$d['alumni_pic']?>" class="col-12">
                                            </td>
                                            <td>
                                                <center>
                                                <a href="#">
                                                    <!-- <i class="fa fa-trash" aria-hidden="true" style="color: #DC3545;"></i> -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                                    </svg>
                                                </a>
                                                <a href="../includes/delete/deleteTestimonial.php?id=<?=$d['id']?>" class="ml-4">
                                                    <i class="fa fa-trash" aria-hidden="true" style="color: #DC3545;"></i>
                                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                    </svg> -->
                                                </a>
                                                
                                                </center>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                        </div>
                        <br><hr>
                        <form method="post" action="../includes/main.php" role="form" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Alumni Name</label>
                                            <input type="text" class="form-control" name="name" id="name" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jobtitle">Alumni Job Title</label>
                                            <input type="text" class="form-control" name="jobtitle" id="jobtitle" value=""
                                                required>
                                        </div>
                                        <div class="form-group ">
                                            <label for="alumniimg">Alumni Image</label>
                                            <input type="file" class="form-control " name="alumniimg" id="alumniimg"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="quots">Alumni Quots</label>
                                            <textarea class="form-control" rows="8" name="quots" id="quots"
                                                placeholder="Enter your comments here.." required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-secondary " name="add-testi" id="add-testi"
                                    value="ADD TESSTIMONIAL">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- testimonial end  -->


            <!-- about section end -->

            <!-- resume section -->
            <?php } else if(isset($_GET['resumesection'])) {  ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h5 class="card-title"><b>R E S U M E</b></h5>                            
                        </div>
                        <form method="post" action="../includes/main.php">
                            <div class="card-body">
                                <div class="row">
                                    <div class="table-responsive" style="height: 360px;">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th style="width: 150px">Education / Work Title</th>
                                                    <th style="width: 90px">Time</th>
                                                    <th style="width: 120px">Organization</th>
                                                    <th style="width: 100px">Location</th>                                                    
                                                    <th style="width: 400px">About Experience</th>
                                                    <th style="width: 40px">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php 
                                                        $q = "SELECT * FROM resume";
                                                        $r = mysqli_query($db,$q);
                                                        while($d = mysqli_fetch_array($r)) {
                                                    ?>
                                                    <tr>
                                                        <td><?=$d['title']?></td>
                                                        <td><?=$d['time_from']?> - <?=$d['time_to']?></td>
                                                        <td><?=$d['organization']?></td>
                                                        <td><?=$d['location']?></td>
                                                        <td><?=$d['about_exp']?></td>
                                                        <td>
                                                            <center>
                                                            <a href="#">
                                                                <!-- <i class="fa fa-trash" aria-hidden="true" style="color: #DC3545;"></i> -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                                                </svg>
                                                            </a>
                                                            <a href="../includes/delete/deleteResume.php?id=<?=$d['id']?>" class="ml-4">
                                                                <i class="fa fa-trash" aria-hidden="true" style="color: #DC3545;"></i>
                                                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                                </svg> -->
                                                            </a>                                                        
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr><br><br>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="type">Select Type</label>
                                            <select class="form-control" name="type" id="type">
                                                <option> </option>
                                                <option>Education</option>
                                                <option>Professional</option>
                                            </select>
                                        </div>
                                        <div class="form-group ">
                                            <label for="title">Degree / Certificates / Designation</label>
                                            <input type="text" class="form-control" name="title" id="title" value=""
                                                required>
                                        </div>
                                        <div class="form-group ">
                                            <label for="organization">Organization / Institute / Company</label>
                                            <input type="text" class="form-control" name="organization" id="organization"
                                                value="" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 ">
                                        <div class="form-group ">
                                            <label for="location">Location</label>
                                            <input type="text" class="form-control" name="location" id="location" value=""
                                                required>
                                        </div>
                                        <div class="form-group ">
                                            <label for="datepicker1">Year From</label>
                                            <input type="text" class="form-control" name="datepicker1" id="datepicker1" />
                                        </div>
                                        <div class="form-group ">
                                            <label for="datepicker2">Year To</label>
                                            <input type="text" class="form-control" name="datepicker2" id="datepicker2" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="aboutexp">About Experience</label>
                                            <textarea class="form-control" rows="8" name="aboutexp" id="aboutexp"
                                                required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-secondary " name="add-resume" id="add-resume"
                                    value="ADD RESUME">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- section controls -->


            <!-- User Info  -->
            <?php } else if(isset($_GET['user-infosection'])) { ?>  
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h5 class="card-title">U S E R &nbsp;&nbsp;I N F O</h5>
                            </div>
                            <form method="post" action="../includes/main.php">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 form-group ">
                                            <label for="name">Full Name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                value="<?=$data['name']?>" required>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" id="username"
                                                value="<?=$data['username']?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 form-group">
                                            <label for="email">Email ID</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                value="<?=$data['email']?>" required>
                                        </div>
                                    </div>   
                                    <div class="row">
                                        <div class="col-lg-6 form-group">
                                            <label for="pwd">Password</label>
                                            <input type="password" class="form-control" name="pwd" id="pwd"
                                                value="" required>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <label for="cnfpwd">Confirm Password</label>
                                            <input type="password" class="form-control" name="cnfpwd" id="cnfpwd" 
                                                value="" >
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary " name="update-user-user" id="update-user"
                                        value="UPDATE">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h5 class="card-title">A D D R E S S &nbsp;&nbsp;I N F O</h5>
                            </div>
                            <form method="post" action="../includes/main.php">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 form-group ">
                                            <label for="name">City</label>
                                            <input type="text" class="form-control" name="city" id="city"
                                                value="<?=$data['city']?>" required>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <label for="state">State</label>
                                            <input type="text" class="form-control" name="state" id="state"
                                                value="<?=$data['state']?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 form-group">
                                            <label for="street">Locality / Street</label>
                                            <input type="text" class="form-control" name="street" id="street"
                                                value="<?=$data['street']?>" required>
                                        </div>
                                    </div>   
                                    <div class="row">
                                        <div class="col-lg-6 form-group">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control" name="country" id="country"
                                                value="<?=$data['country']?>" required>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <label for="pwd">Postal Code</label>
                                            <input type="text" class="form-control" name="pincode" id="pincode"
                                                value="<?=$data['pincode']?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary " name="update-user-address" id="update-user"
                                        value="UPDATE">
                                </div>
                            </form>
                        </div>
                    </div>                
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h5 class="card-title">P E R S O N A L &nbsp;&nbsp;I N F O</h5>
                            </div>
                            <form method="post" action="../includes/main.php" role="form" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-6 form-group ">
                                                    <label for="dob">Date Of Birth</label>
                                                    <input type="text" class="form-control" name="dob" id="dob" 
                                                        value="<?=$data['birthday']?>" >
                                                </div>
                                                <div class="col-lg-6 form-group">
                                                    <label for="age">Age</label>
                                                    <input type="text" class="form-control" name="age" id="age"
                                                        value="<?=$data['age']?>" >
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 form-group ">
                                                    <label for="mobile">Mobile No.</label>
                                                    <input type="text" class="form-control" name="mobile" id="mobile" 
                                                        value="<?=$data['mobile']?>" >
                                                </div>
                                                <div class="col-lg-6 form-group">
                                                    <label for="degree">Degree / Certificate</label>
                                                    <input type="text" class="form-control" name="degree" id="degree"
                                                        value="<?=$data['degree']?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 form-group ">
                                                    <label for="website">Website</label>
                                                    <input type="text" class="form-control" name="website" id="website" value="<?=$data['website']?>">
                                                </div>
                                                <div class="col-lg-12 form-group mt-1">
                                                    <label for="userpic">User Image</label>
                                                    <input type="file" class="form-control" name="userpic" id="userpic" value="<?=$data['user_pic']?>">
                                                </div>      
                                                <div class=" col-lg-12 form-group mt-5 ml-4">
                                                <div class="custom-control custom-switch custom-switch-on-success">
                                                    <input type="checkbox" class="custom-control-input" name="freelancer"
                                                        id="freelancer" <?php if($data['freelance']){ echo "checked"; }?>>
                                                    <label class="custom-control-label" for="freelancer">&nbsp;&nbsp;FREELANCE AVAILABLE NOW</label>
                                                </div>
                                            </div>                                   
                                            </div>  
                                                                                
                                        </div> 
                                        <div class="col-lg-6">
                                            <center>
                                            <img src="../img/<?=$data['user_pic']?>" class="col-8" >
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary " name="update-user-personal" id="update-user"
                                        value="UPDATE">
                                </div>
                            </form>
                        </div>
                    </div>
                <div>   
                

            <!-- User Info ends  -->            
            <?php } else { ?>
                
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h5 class="card-title"><b>S H O W - H I D E &nbsp;&nbsp;M E N U</b></h5>
                        <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="../includes/main.php">
                            <div class="row">
                                <div class="col-lg-4 ">
                                    <div class="form-group ml-5">
                                        <div class="custom-control custom-switch custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" name="home"
                                                id="customSwitch1" <?php if($data['home_section']){ echo "checked"; }?>>
                                            <label class="custom-control-label" for="customSwitch1">&nbsp;&nbsp;HOME
                                                &nbsp;SECTION</label>
                                        </div>
                                    </div>
                                    <div class="form-group ml-5">
                                        <div class="custom-control custom-switch custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" name="about"
                                                id="customSwitch2" <?php if($data['about_section']){ echo "checked"; }?>>
                                            <label class="custom-control-label" for="customSwitch2">&nbsp;&nbsp;ABOUT
                                                &nbsp;SECTION</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group ml-5">
                                        <div class="custom-control custom-switch custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" name="resume"
                                                id="customSwitch3" <?php if($data['resume_section']){ echo "checked"; }?>>
                                            <label class="custom-control-label" for="customSwitch3">&nbsp;&nbsp;RESUME
                                                &nbsp;SECTION</label>
                                        </div>
                                    </div>
                                    <div class="form-group ml-5">
                                        <div class="custom-control custom-switch custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" name="services"
                                                id="customSwitch4" <?php if($data['service_section']){ echo "checked"; }?>>
                                            <label class="custom-control-label" for="customSwitch4">&nbsp;&nbsp;SERVICES
                                                &nbsp;SECTION</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group ml-5">
                                        <div class="custom-control custom-switch custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" name="portfolio"
                                                id="customSwitch5"
                                                <?php if($data['portfolio_section']){ echo "checked"; }?>>
                                            <label class="custom-control-label" for="customSwitch5">&nbsp;&nbsp;PORTFOLIO
                                                &nbsp;SECTION</label>
                                        </div>
                                    </div>
                                    <div class="form-group ml-5">
                                        <div class="custom-control custom-switch custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" name="contact"
                                                id="customSwitch6" <?php if($data['contact_section']){ echo "checked"; }?>>
                                            <label class="custom-control-label" for="customSwitch6">&nbsp;&nbsp;CONTACT
                                                &nbsp;SECTION</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 ml-5 p-1">
                                    <input type="submit" class="btn btn-success" name="update-section" id="update-section"
                                        value="Save Changes">
                                </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="card ">
                        <div class="card-header">
                            <h5 class="card-title"><b>S K I L L S</b></h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 220px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Skill Name</th>
                                        <th>Skill Level</th>
                                        <th style="width: 90px">Label</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $q = "SELECT * FROM skills";
                                        $r = mysqli_query($db,$q);
                                        while($d = mysqli_fetch_array($r)) {
                                    ?>
                                    <tr>
                                        <td><?=$d['skill_name']?></td>
                                        <td>
                                            <div class=" progress progress-xs mt-2">
                                                <div class="progress-bar bg-warning" style="width: <?=$d['skill_level']?>%">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5><span class="badge bg-primary"><?=$d['skill_level']?>%</span></h5>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="card ">
                        <div class="card-header">
                            <h5 class="card-title"><b>L A N G U A G E S</b></h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 220px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>    
                                        <th>Language Name</th>
                                        <th>Language Level</th>
                                        <th style="width: 90px">Label</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $q = "SELECT * FROM languages";
                                            $r = mysqli_query($db,$q);
                                            while($d = mysqli_fetch_array($r)) {
                                        ?>
                                        <tr>
                                            <td><?=$d['lang_name']?></td>
                                            <td>
                                                <div class=" progress progress-xs mt-2">
                                                    <div class="progress-bar bg-warning" style="width: <?=$d['lang_level']?>%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5><span class="badge bg-primary"><?=$d['lang_level']?>%</span></h5>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><b>T E S T I M O N I A L</b></h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive" style="height: 420px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 180px">Name</th>
                                        <th style="width: 180px">Job Title</th>
                                        <th style="width: 450px">Alumni Quots</th>
                                        <th >Image</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php 
                                            $q = "SELECT * FROM testimonial";
                                            $r = mysqli_query($db,$q);
                                            while($d = mysqli_fetch_array($r)) {
                                        ?>
                                        <tr>
                                            <td><?=$d['name']?></td>
                                            <td><?=$d['job_title']?></td>
                                            <td><?=$d['quot']?></td>
                                            <td>
                                                <img src="../img/<?=$d['alumni_pic']?>" class="col-8">
                                            </td>
                                        </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>                        
                    </div>
                </div> 
            </div>

        </div>
        <?php }?>
    </section>
</div>


<?php
  include("../includes/scripts.php");
  include("../includes/footer.php");
?>