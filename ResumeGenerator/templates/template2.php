<?php
include_once __DIR__.'/../config.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit;
}
$id=$_GET['id'];
$user_id=$_SESSION['id'];
$sql = "SELECT * FROM resumes WHERE user_id = $user_id and id = $id"; // assuming you want to fetch the resume with id 1
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $resume = $result->fetch_assoc();
} else {
    echo "No resume found";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Another Professional Resume</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background-color: #f7f7f7;
        }
        .resume {
            background-color: #fff;
            padding: 20px;
            margin: 10px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
        }
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .header img {
            max-width: 100px;
            border-radius: 10%;
            float: left;
            margin-right: 20px;
            background-size: contain;
        }
        .header .name {
            font-size: 28px;
            font-weight: bold;
        }
        .header .contact-info {
            text-align: right;
            font-size: 14px;
        }
        .main-content {
            padding: 20px 0;
        }
        .section {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        .section:last-child {
            border-bottom: none;
        }
        .section h2 {
            font-size: 18px;
            margin-bottom: 10px;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 5px;
        }
        .section p, .section ul {
            margin: 5px 0;
            font-size: 14px;
        }
        .section ul {
            list-style: none;
            padding: 0;
        }
        .section ul li {
            margin-bottom: 5px;
        }
        @media print {
            body {
                margin: 0;
                align-items: center;
                justify-content: center;
                display: flex;
                color: #000;
                background-color: #fff;
                zoom: 80%;
            }
            .resume {
                width: 100%;
                padding: 20px;
                margin-right: 20px;
                margin: 0;
                box-shadow: none;
            }
            .resume .header img {
                max-width: 100px;
                margin-right: 10px;
            }
            .print-btn {
                display: none;
            }
        }
    </style>
</head>
<body>
<div class="resume">
    <div class="header">
        <?php if (!empty($resume['photo'])): ?>
            <img src="../profileImg/<?php echo $resume['photo']; ?>" alt="Profile Picture">
        <?php else: ?>
        <?php endif; ?>
        <div class="name"><?php echo $resume['name']; ?></div>
        <div class="contact-info">
            <p><i class="fas fa-envelope"></i> <?php echo $resume['email']; ?></p>
            <p><i class="fas fa-phone"></i> <?php echo $resume['phone']; ?></p>
            <p><i class="fas fa-map-marker-alt"></i> <?php echo $resume['address']; ?></p>
        </div>
    </div>
    <div class="main-content">
        <?php if (!empty($resume['about_me'])): ?>
            <div class="section">
                <h2><i class="fas fa-user"></i> About Me</h2>
                <p><?php echo $resume['about_me']; ?></p>
            </div>
        <?php endif; ?>
        <div class="section">
    <h2><i class="fas fa-briefcase"></i> Experience</h2>
<?php
            $experiences = explode('/', $resume['experience']);
            foreach ($experiences as $experience) {
                echo "<li style='list-style-type:none;'>&nbsp;" . trim($experience) . "&nbsp;</li>";
            }
            ?>
</div>
        <div class="section">
    <h2><i class="fas fa-graduation-cap"></i> Education</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Institute/School</th>
                <th>Course/Class</th>
                <th>Passing Year</th>
                <th>Marks</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $resume['institute_name']; ?></td>
                <td><?php echo $resume['institute_course']; ?></td>
                <td><?php echo $resume['passing_year']; ?></td>
                <td><?php echo $resume['institute_marks']; ?></td>
                <td><?php echo $resume['institute_address']; ?></td>
            </tr>
            <tr>
                <td><?php echo $resume['school_name_12th']; ?></td>
                <td>12th</td>
                <td><?php echo $resume['passing_year_12th']; ?></td>
                <td><?php echo $resume['marks_12th']; ?></td>
                <td><?php echo $resume['school_address_12th']; ?></td>
            </tr>
            <tr>
                <td><?php echo $resume['school_name_10th']; ?></td>
                <td>10th</td>
                <td><?php echo $resume['passing_year_10th']; ?></td>
                <td><?php echo $resume['marks_10th']; ?></td>
                <td><?php echo $resume['school_address_10th']; ?></td>
            </tr>
        </tbody>
    </table>
</div>
        <div class="section">
            <h2><i class="fas fa-tools"></i> Skills</h2>
            <ul>
                <?php
                $skills = explode(',', $resume['skills']);
                foreach ($skills as $skill) {
                    echo "<li>" . trim($skill) . "</li>";
                }
                ?>
            </ul>
        </div>
        <?php if (!empty($resume['projects'])): ?>
            <div class="section">
                <h2><i class="fas fa-project-diagram"></i> Projects</h2>
                <p><?php echo $resume['projects']; ?></p>
            </div>
        <?php endif; ?>
        <?php if (!empty($resume['certifications'])): ?>
            <div class="section">
                <h2><i class="fas fa-certificate"></i> Certifications</h2>
                <p><?php echo $resume['certifications']; ?></p>
            </div>
        <?php endif; ?>
        <?php if (!empty($resume['languages'])): ?>
            <div class="section">
                <h2><i class="fas fa-language"></i> Languages</h2>
                <p><?php echo $resume['languages']; ?></p>
            </div>
        <?php endif; ?>
        <?php if (!empty($resume['interests'])): ?>
            <div class="section">
                <h2><i class="fas fa-heart"></i> Interests</h2>
                <p><?php echo $resume['interests']; ?></p>
            </div>
        <?php endif; ?>
        <div class="section">
            <h2><i class="fas fa-user-friends"></i> Personal Details</h2>
            <ul>
                <li><strong>Father's Name:</strong> <?php echo $resume['fathers_name']; ?></li>
                <li><strong>Marital Status:</strong> <?php echo $resume['martial_status']; ?></li>
                <li><strong>Nationality:</strong> <?php echo $resume['nationality']; ?></li>
                <li><strong>Gender:</strong> <?php echo $resume['gender']; ?></li>
            </ul>
            </div>
<?php if (!empty($resume['references'])): ?>
    <div class="section">
        <h2><i class="fas fa-user-friends"></i> References</h2>
        <p><?php echo $resume['references']; ?></p>
    </div>
<?php endif; ?>
</div>
<div class="print-btn">
<button onclick="window.print()" class="btn btn-primary print-btn">Print Resume</button>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
