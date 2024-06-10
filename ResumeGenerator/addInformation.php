<?php
include_once __DIR__.'/config.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['id'];
    $name = $_POST['name'];
    $experience = $_POST['experience'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $job_title = $_POST['job_title'];
    $about_me = $_POST['about_me'];
    $institute_course = $_POST['institute_course'];
    $institute_name = $_POST['institute_name'];
    $passing_year = $_POST['passing_year'];
    $institute_marks = $_POST['institute_marks'];
    $institute_address = $_POST['institute_address'];
    $school_name_12th = $_POST['school_name_12th'];
    $passing_year_12th = $_POST['passing_year_12th'];
    $board_12th = $_POST['board_12th'];
    $marks_12th = $_POST['marks_12th'];
    $school_address_12th = $_POST['school_address_12th'];
    $school_name_10th = $_POST['school_name_10th'];
    $passing_year_10th = $_POST['passing_year_10th'];
    $board_10th = $_POST['board_10th'];
    $marks_10th = $_POST['marks_10th'];
    $school_address_10th = $_POST['school_address_10th'];
    $skills = $_POST['skills'];
    $languages = $_POST['languages'];
    $interests = $_POST['interests'];
    $fathers_name = $_POST['fathers_name'];
    $martial_status = $_POST['martial_status'];
    $nationality = $_POST['nationality'];
    $gender = $_POST['gender'];
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = basename($_FILES['photo']['name']);
        $uploadDir = __DIR__ . '/profileImg/';
        $uploadFile = $uploadDir . $photo;
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
            echo "Photo uploaded successfully.";
        } else {
            echo "Error uploading photo.";
            exit;
        }
    } else {
        echo "No photo uploaded or upload error.";
        exit;
    }
    $name = $conn->real_escape_string($name);
    $photo = $conn->real_escape_string($photo);
    $experience = $conn->real_escape_string($experience);
    $dob = $conn->real_escape_string($dob);
    $address = $conn->real_escape_string($address);
    $phone = $conn->real_escape_string($phone);
    $email = $conn->real_escape_string($email);
    $job_title = $conn->real_escape_string($job_title);
    $about_me = $conn->real_escape_string($about_me);
    $institute_course = $conn->real_escape_string($institute_course);
    $institute_name = $conn->real_escape_string($institute_name);
    $passing_year = $conn->real_escape_string($passing_year);
    $institute_marks = $conn->real_escape_string($institute_marks);
    $institute_address = $conn->real_escape_string($institute_address);
    $school_name_12th = $conn->real_escape_string($school_name_12th);
    $passing_year_12th = $conn->real_escape_string($passing_year_12th);
    $board_12th = $conn->real_escape_string($board_12th);
    $marks_12th = $conn->real_escape_string($marks_12th);
    $school_address_12th = $conn->real_escape_string($school_address_12th);
    $school_name_10th = $conn->real_escape_string($school_name_10th);
    $passing_year_10th = $conn->real_escape_string($passing_year_10th);
    $board_10th = $conn->real_escape_string($board_10th);
    $marks_10th = $conn->real_escape_string($marks_10th);
    $school_address_10th = $conn->real_escape_string($school_address_10th);
    $skills = $conn->real_escape_string($skills);
    $languages = $conn->real_escape_string($languages);
    $interests = $conn->real_escape_string($interests);
    $fathers_name = $conn->real_escape_string($fathers_name);
    $martial_status = $conn->real_escape_string($martial_status);
    $nationality = $conn->real_escape_string($nationality);
    $gender = $conn->real_escape_string($gender);
    $sql = "INSERT INTO resumes (user_id, name, photo, experience, dob, address, phone, email, job_title, about_me, institute_course, institute_name, passing_year, institute_marks, institute_address, school_name_12th, passing_year_12th, board_12th, marks_12th, school_address_12th, school_name_10th, passing_year_10th, board_10th, marks_10th, school_address_10th, skills, languages, interests, fathers_name, martial_status, nationality, gender) 
            VALUES ('$user_id','$name', '$photo', '$experience', '$dob', '$address', '$phone', '$email', '$job_title', '$about_me', '$institute_course', '$institute_name', '$passing_year', '$institute_marks', '$institute_address', '$school_name_12th', '$passing_year_12th', '$board_12th', '$marks_12th', '$school_address_12th', '$school_name_10th', '$passing_year_10th', '$board_10th', '$marks_10th', '$school_address_10th', '$skills', '$languages', '$interests', '$fathers_name', '$martial_status', '$nationality', '$gender')";
    if ($conn->query($sql) === TRUE) {
        header("Location: viewInformation.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Resume Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .fw-b{
            font-weight: 900;
        }
        body{
            background-image: url('./image/add4.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            background-position: center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-info">
  <div class="container">
    <a class="navbar-brand text-light fw-b" href="#">Resume Generator</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link fw-b" aria-current="page" href="./dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="active btn btn-outline-danger fw-b" href="./addInformation.php">Add Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-b" href="./viewInformation.php?page=1">View Information</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-b" href="./editInformation.php?page=1">Edit Information</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-b" href="./deleteInformation.php?page=1">Delete Information</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="./logout.php" class="btn btn-danger">Log Out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container">
        <h1 class="mt-5 mb-4 fw-b">Insert Resume Data</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-md-6">
                    <label for="photo" class="form-label">Photo:</label>
                    <input type="file" class="form-control" id="photo" name="photo" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="experience" class="form-label">Experience:</label>
                <textarea class="form-control" id="experience" name="experience" placeholder="<?php echo "If You have to go to next line then add /
example :- Software Engineer | ABC Tech Solutions | 2018 - Present / - Developed and maintained scalable web applications using technologies like React, Node.js, and MongoDB." ;?>" required></textarea>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="dob" class="form-label">Date of Birth:</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label">Address:</label>
                    <textarea class="form-control" id="address" name="address" required></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="job_title" class="form-label">Job Title:</label>
                <input type="text" class="form-control" id="job_title" name="job_title">
            </div>
            <div class="mb-3">
                <label for="about_me" class="form-label">About Me:</label>
                <textarea class="form-control" id="about_me" name="about_me" required></textarea>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="institute_course" class="form-label">Institute Course:</label>
                    <input type="text" class="form-control" id="institute_course" name="institute_course">
                </div>
                <div class="col-md-6">
                    <label for="institute_name" class="form-label">Institute Name:</label>
                    <input type="text" class="form-control" id="institute_name" name="institute_name">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="passing_year" class="form-label">Passing Year:</label>
                    <input type="number" class="form-control" id="passing_year" name="passing_year" length="4">
                </div>
                <div class="col-md-6">
                    <label for="institute_marks" class="form-label">Institute Marks:</label>
                    <input type="number" class="form-control" id="institute_marks" name="institute_marks" step="0.01">
                </div>
            </div>
            <div class="mb-3">
                <label for="institute_address" class="form-label">Institute Address:</label>
                <textarea class="form-control" id="institute_address" name="institute_address"></textarea>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="school_name_12th" class="form-label">12th School Name:</label>
                    <input type="text" class="form-control" id="school_name_12th" name="school_name_12th">
                </div>
                <div class="col-md-6">
                    <label for="passing_year_12th" class="form-label">12th Passing Year:</label>
                    <input type="number" class="form-control" id="passing_year_12th" name="passing_year_12th">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="board_12th" class="form-label">12th Board:</label>
                    <input type="text" class="form-control" id="board_12th" name="board_12th">
                </div>
                <div class="col-md-6">
                    <label for="marks_12th" class="form-label">12th Marks:</label>
                    <input type="number" class="form-control" id="marks_12th" name="marks_12th" step="0.01">
                </div>
            </div>
            <div class="mb-3">
                <label for="school_address_12th" class="form-label">12th School Address:</label>
                <textarea class="form-control" id="school_address_12th" name="school_address_12th"></textarea>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="school_name_10th" class="form-label">10th School Name:</label>
                    <input type="text" class="form-control" id="school_name_10th" name="school_name_10th">
                </div>
                <div class="col-md-6">
                    <label for="passing_year_10th" class="form-label">10th Passing Year:</label>
                    <input type="number" class="form-control" id="passing_year_10th" name="passing_year_10th">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="board_10th" class="form-label">10th Board:</label>
                    <input type="text" class="form-control" id="board_10th" name="board_10th">
                </div>
                <div class="col-md-6">
                    <label for="marks_10th" class="form-label">10th Marks:</label>
                    <input type="number" class="form-control" id="marks_10th" name="marks_10th" step="0.01">
                </div>
            </div>
            <div class="mb-3">
                <label for="school_address_10th" class="form-label">10th School Address:</label>
                <textarea class="form-control" id="school_address_10th" name="school_address_10th"></textarea>
            </div>
            <div class="mb-3">
                <label for="skills" class="form-label">Skills:</label>
                <input type="text" class="form-control" id="skills" name="skills">
            </div>
            <div class="mb-3">
                <label for="languages" class="form-label">Languages:</label>
                <input type="text" class="form-control" id="languages" name="languages">
            </div>
            <div class="mb-3">
                <label for="interests" class="form-label">Interests:</label>
                <input type="text" class="form-control" id="interests" name="interests">
            </div>
            <div class="mb-3">
                <label for="fathers_name" class="form-label">Father's Name:</label>
                <input type="text" class="form-control" id="fathers_name" name="fathers_name" required>
            </div>
            <div class="mb-3">
                <label for="martial_status" class="form-label">Marital Status:</label>
                <input type="text" class="form-control" id="martial_status" name="martial_status" required>
            </div> 
            <div class="mb-3">
                <label for="nationality" class="form-label">Nationality:</label>
                <input type="text" class="form-control" id="nationality" name="nationality" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>