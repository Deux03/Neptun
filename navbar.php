<?php
$username = isset($_COOKIE["username"]) ? $_COOKIE["username"] : null;
$name = isset($_COOKIE["name"]) ? $_COOKIE["name"] : null;
$isStudent = isset($_COOKIE["isStudent"]) ? $_COOKIE["isStudent"] : null;

?>
<nav class="navbar">
    <div class="container-fluid">
        <ul class="nav navbar-leftside">
            <?php
            if (!($username && $name && $isStudent)){
                echo '<li class="active"><a href="./index.php">Home</a></li>';
            } else {
                echo '<li class="active"><a href="./neptun_index.php">Home</a></li>';
                echo '<li><a href="./courses.php">Courses</a></li>';
                echo '<li><a href="./exams.php">Exams</a></li>';
                echo '<li><a href="./classrooms.php">Classrooms</a></li>';
                if($isStudent == "Student"){
                    echo '<li><a href="./your_exams.php">Your Exams</a></li>';
                    echo '<li><a href="./your_courses.php">Your Courses</a></li>';
                }
            }
            ?>
        </ul>
        <ul class="nav navbar-rightside">
            <?php
            if ($username && $name && $isStudent) {
            echo '<li><a href="./include/functionalities/logout_handler.php">Log out</a></li>';
            echo '<li><a href="./profile.php">Profile</a></li>';
            } else {
            echo '<li><a href="./register.php"><span class="glyphicon glyphicon-user"></span>Register</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>