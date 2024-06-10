<?php
include 'config.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
} 
$results_per_page = 5;
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);
$row=mysqli_fetch_assoc($result);
$userId=$row['id'];
$query = "SELECT * FROM resumes WHERE user_id=$userId AND status=1";
$result_count = mysqli_num_rows(mysqli_query($conn, $query));
$total_pages = ceil($result_count / $results_per_page);
$this_page_first_result = ($page - 1) * $results_per_page;
$query .= " LIMIT $this_page_first_result, $results_per_page";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>View Information</title>
    <style>
        .fw-b{
            font-weight: 900;
        }
        body{
            background-image: url('./image/view.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            background-position: center;
        }
        .page-item.active .page-link {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #fff;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-info ">
  <div class="container">
    <a class="navbar-brand text-light fw-b" href="#">Resume Generator</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto ">
        <li class="nav-item">
          <a class="nav-link fw-b" aria-current="page" href="./dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-b" href="./addInformation.php">Add Details</a>
        </li>
        <li class="nav-item">
            <a class="active btn btn-outline-danger fw-b" href="./viewInformation.php?page=1">View Information</a>
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
<h1 class="text-center bg-warning fw-b my-3">View Information</h1>
    <div class="container">
        <div class="col-md-12">
    <div class="table table-responsive">
    <?php
                if(mysqli_num_rows($result)>=1){
                    ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Job Role</th>
                    <th>Photo</th>
                    <th>Resume Template</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $number=1;
                while($resumes = mysqli_fetch_assoc($result)){
                    $id=$resumes['id'];
                echo "
                <tr>
                    <td>".$number."</td>
                    <td>".$resumes['name']."</td>
                    <td>".$resumes['email']."</td>
                    <td>".$resumes['phone']."</td>
                    <td>".$resumes['job_title']."</td>
                    <td><img src='./profileImg/".$resumes['photo']."' width='100px'></td>
                    <td class='text-center my-3'><a href='./templates/template1.php?id=$id' target='_blank' class='btn btn-warning m-3'><i class='fa-solid fa-1'></i></a>|<a href='./templates/template2.php?id=$id' target='_blank' class='btn btn-warning m-3'><i class='fa-solid fa-2'></i></a>|<a href='./templates/template3.php?id=$id' target='_blank' class='btn btn-warning m-3'><i class='fa-solid fa-3'></i></a></td>
                </tr>";
                $number++;
                }
            }else{
                echo "<p class='text-center my-3 alert alert-danger'>0 Records Founds</p>";
            }
                ?>
            </tbody>
        </table>
    </div>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php for ($page=1; $page<=$total_pages; $page++): ?>
            <?php if (!isset($_GET['page'])){ ?>
                <li class="page-item"><a class="page-link" href="viewInformation.php?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
                <?php } elseif ($page == $_GET['page']){ ?>
                <li class="page-item active"><a class="page-link" href="viewInformation.php?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
            <?php } else{ ?>
                <li class="page-item"><a class="page-link" href="viewInformation.php?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
                <?php } ?>
        <?php endfor; ?>
    </ul>
</nav>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
