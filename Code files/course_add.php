<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portal";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST['submit'])) {
    $course_name = $_POST['course_name'];
    $course_code = $_POST['course_code'];
    $no_of_seats = $_POST['no_of_seats'];
    $no_of_faculties = $_POST['no_of_faculties'];
    $department= $_POST['department'];
    


    if(empty($course_name) || empty($course_code) || empty($no_of_seats) || empty($no_of_faculties) ||empty($department)){
        echo "Please fill all the fields";
    }
    else{
        $sql = "INSERT INTO course (course_name, course_code, no_of_seats, no_of_faculties,department) VALUES (:course_name, :course_code, :no_of_seats, :no_of_faculties,:department)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':course_name', $course_name);
        $stmt->bindParam(':course_code', $course_code);
        $stmt->bindParam(':no_of_seats', $no_of_seats);
        $stmt->bindParam(':department', $department);
        $stmt->bindParam(':no_of_faculties', $no_of_faculties);
        $stmt->execute();

        if ($stmt->rowCount()) {
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Course Added")';  
            echo '</script>'; 
            // header('location:courses.php') ;
        } else {
            echo "Failed to submit the form";
        }

    }

    
  }
}
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
$conn = null;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Course Form</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f1f1f1;
		}
		form {
			background-color: #fff;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
			max-width: 500px;
			margin: 0 auto;
		}
		label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
		}
		input[type="text"], input[type="number"], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
		}
		input[type="submit"] {
			background-color: orangered;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            display: block;
            margin: auto;
		}
		h1 {
			text-align: center;
			margin-top: 20px;
			margin-bottom: 40px;
			color: #333;
		}

	</style>
     <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>
<div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center py-4 px-xl-5">
            <div class="col-lg-3">
                    <h1 class="m-0" style="color:  #FF6600;">AcademySite</h1>
                </a>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Our Office</h6>
                        <small>Ahemdabad Rajkot highway, Gujarat</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-envelope text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">studemail Us</h6>
                        <small>academysite@example.com</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-phone text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Call Us</h6>
                        <small>+012 345 6789</small>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
            <a  class="btn btn-primary py-2 px-2 ml-auto d-none d-lg-block" href="admin_login.php">Login Admin</a>
                       
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0"><span class="text-primary">Academy</span>Site</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        
                        <div class="navbar-nav py-0">
                        <a href="index2.php" class="nav-item nav-link active">Home</a>
                            <a href="about.php" class="nav-item nav-link">About</a>
                            <a href="course_add.php" class="nav-item nav-link">Add Courses</a>
                            <a href="exam_add.php" class="nav-item nav-link">Add Exam Details</a>
                            <a href="result_add.php" class="nav-item nav-link">Add Result</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                            <a href="faculty_login.php" class="nav-item nav-link">Add Faculty</a>
                            </div>
                        <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="two-login.php">Login</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
   <br>
	<form method="POST">
		<h2>ADD COURSE FORM</h2>
		<label for="course_name">Course Name:</label>
		<input type="text" id="course_name" name="course_name" placeholder="Enter course name..">

        <label for="department">Department Name:</label>
		<input type="text" id="department" name="department" placeholder="Enter department name..">

        <label for="course_code">Course code:</label>
		<input type="number" id="course_code" name="course_code" placeholder="Enter course code..">

        <label for="no_of_seats">No of Seats:</label>
	<input type="number" id="no_of_seats" name="no_of_seats" placeholder="Enter no of seats..">

	<label for="no_of_faculties">No of Faculties:</label>
	<input type="number" id="no_of_faculties" name="no_of_faculties" placeholder="Enter no of faculties..">
    
    <br>
    
	<input type="submit" value="Submit" name="submit" style="background-color:orangered;">
</form>
</body>
</html>