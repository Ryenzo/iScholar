<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $email = $phone = $address = "";
$errorMessage = $successMessage = "";
$uploadDir = "uploads/";

// Reusable file upload function
function uploadFile($inputName, $uploadDir) {
  if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] == 0) {
    $filename = basename($_FILES[$inputName]['name']);
    $targetPath = $uploadDir . time() . "_" . uniqid() . "_" . $filename;
    if (!is_dir($uploadDir)) {
      mkdir($uploadDir, 0777, true);
    }
    if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $targetPath)) {
      return $targetPath;
    }
  }
  return null;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"] ?? "";
  $email = $_POST["email"] ?? "";
  $phone = $_POST["phone"] ?? "";
  $address = $_POST["address"] ?? "";

  $applicationFormPath   = uploadFile('application_form', $uploadDir);
  $form9Path             = uploadFile('form9', $uploadDir);
  $rankingCertPath       = uploadFile('cert_ranking', $uploadDir);
  $birthCertPath         = uploadFile('psa_birth_cert', $uploadDir);
  $passportPicPath       = uploadFile('passport_pic', $uploadDir);
  $registrationFormPath  = uploadFile('reg_form', $uploadDir);

  // $status = "Pending"; // Remove if 'status' column does not exist

  do {
    if (empty($name) || empty($email) || empty($phone) || empty($address)) {
      $errorMessage = "All fields are required.";
      break;
    }

    $sql = "INSERT INTO grants
      (name, email, phone, address, application_form, form9, cert_ranking, psa_birth_cert, passport_pic, reg_form)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
      $errorMessage = "Prepare failed: " . $conn->error;
      break;
    }

    $stmt->bind_param(
      "ssssssssss",
      $name,
      $email,
      $phone,
      $address,
      $applicationFormPath,
      $form9Path,
      $rankingCertPath,
      $birthCertPath,
      $passportPicPath,
      $registrationFormPath
    );

    if (!$stmt->execute()) {
      $errorMessage = "Execute failed: " . $stmt->error;
      break;
    }

    $successMessage = "Scholarship application submitted successfully!";
    header("Location: scholarship.html");
    exit;

  } while (false);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SDCAPortal - Student Portal</title>
  <link rel="stylesheet" href="personal_info.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding-top: 70px; /* Space for fixed navbar */
    }

    .sidebar {
      position: fixed;
      top: 55px; /* Height of navbar */
      left: 0;
      width: 250px;
      height: 100%;
      background-color: #222;
      color: white;
      padding: 20px;
      overflow-y: auto;
    }

    .main-content {
      margin-left: 250px; /* Space for fixed sidebar */
      padding: 30px;
    }

    .profile {
      text-align: center;
      margin-bottom: 30px;
    }

    .profile .avatar {
      width: 80px;
      height: 80px;
      background-color: #6c757d;
      border-radius: 50%;
      margin: 0 auto 10px;
    }

    .profile h2 {
      font-size: 1.2rem;
      font-weight: bold;
    }

    .student-id-badge {
      background-color: #dc3545;
      font-size: 0.8rem;
      padding: 5px 10px;
      border-radius: 20px;
      display: inline-block;
      margin-top: 5px;
    }

    .side-menu a {
      display: block;
      color: #f8f9fa;
      text-decoration: none;
      padding: 10px 0;
      font-weight: 500;
    }

    .side-menu a:hover {
      color:rgb(253, 13, 13);
      padding-left: 5px;
      transition: all 0.3s ease;
    }

    .card-announcement {
      background: white;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    iframe {
      width: 100%;
      height: 300px;
      border: none;
      border-radius: 10px;
      margin-top: 10px;
    }

    .footer {
      background-color: #222;
      color: #aaa;
      text-align: center;
      padding: 15px;
      font-size: 0.9rem;
      margin-top: 30px;
    }

    @media (max-width: 768px) {
      .sidebar {
        position: relative;
        width: 100%;
        top: 0;
        height: auto;
      }

      .main-content {
        margin-left: 0;
      }
    }
  </style>

<!-- Navbar (same as before) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SDCAPortal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="#">Payment Instructions</a></li>
        <li class="nav-item"><a class="nav-link" href="https://stdominiccollege.edu.ph/SDCAPayment/">Pay Now</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Features</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Feature 1</a></li>
            <li><a class="dropdown-item" href="#">Feature 2</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Evaluation</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Evaluation 1</a></li>
            <li><a class="dropdown-item" href="#">Evaluation 2</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="#">Profile Settings</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Sidebar (same as before) -->
<aside class="sidebar">
  <div class="profile">
    <div class="avatar"></div>
    <h2>Mac Laurenz Cultura</h2>
    <div class="student-id-badge">Student ID: 202300995</div>
  </div>
  <nav class="side-menu">
    <a href="scholarship.html">Scholarship</a>
  </nav>
</aside>
 
<!-- Main Content -->
<div class="main-content">
  <?php
  if (!empty($errorMessage)) {
      echo "<div class='alert alert-danger'>$errorMessage</div>";
  }
  
  ?>


  <h1 class="mb-4 text-center fw-bold" style="color:#dc3545;">Gregdom Scholarship</h1>
  <div class="card-announcement mb-4 shadow-sm text-center">
    <h2 class="h5 mb-2 fw-semibold"><i class="bi bi-megaphone-fill text-danger"></i> Announcement</h2>
    <p class="mb-0">Welcome to the scholarship section. Here you can find all the information related to scholarships.</p>
  </div>
  <div class="card p-4 mx-auto shadow" style="max-width: 1000px;">
    <h3 class="mb-3 text-center text-primary fw-semibold"><i class="bi bi-pencil-square"></i> Application Form</h3>
    <form method="POST" enctype="multipart/form-data" autocomplete="off">
    <div class="row">
      <!-- Personal Info Column -->
      <div class="col-md-6 border-end">
        <h5 class="fw-bold mb-3 text-danger">Personal Information</h5>
        <div class="mb-3">
        <label class="form-label fw-semibold" for="name1">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter name" value="<?php echo $name; ?>">
        </div>
        <div class="mb-3">
        <label class="form-label fw-semibold" for="name2">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $email; ?>">
        </div>
        <div class="mb-3">
        <label class="form-label fw-semibold" for="name3">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone number" value="<?php echo $phone; ?>">
        </div>
        <div class="mb-3">
        <label class="form-label fw-semibold" for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="<?php echo $address; ?>">
        </div>
      </div>
      <!-- Uploads Column -->
    <div class="col-md-6">
      <h5 class="fw-bold mb-3 text-danger">Upload Requirements</h5>
      <div class="mb-3">
        <label class="form-label" for="application_form">Scholarship application form</label>
        <input type="file" class="form-control" id="application_form" name="application_form" accept=".pdf" >
      </div>
      <div class="mb-3">
        <label class="form-label" for="form9">Photocopy of Form 9</label>
        <input type="file" class="form-control" id="form9" name="form9" accept=".pdf,.jpg,.jpeg,.png">
      </div>
      <div class="mb-3">
        <label class="form-label" for="cert_ranking">Certification of Ranking</label>
        <input type="file" class="form-control" id="cert_ranking" name="cert_ranking" accept=".pdf,.jpg,.jpeg,.png">
      </div>
      <div class="mb-3">
        <label class="form-label" for="psa_birth_cert">Photocopy of Applicant’s PSA/Birth certificate</label>
        <input type="file" class="form-control" id="psa_birth_cert" name="psa_birth_cert" accept=".pdf,.jpg,.jpeg,.png">
      </div>
      <div class="mb-3">
        <label class="form-label" for="passport_pic">Latest passport size picture</label>
        <input type="file" class="form-control" id="passport_pic" name="passport_pic" accept=".jpg,.jpeg,.png">
      </div>
      <div class="mb-3">
        <label class="form-label" for="reg_form">Photocopy of Registration Form</label>
        <input type="file" class="form-control" id="reg_form" name="reg_form" accept=".pdf,.jpg,.jpeg,.png">
      </div>
    </div>
      <?php
      if (!empty($successMessage)) {
          echo "<div class='alert alert-success'>$successMessage</div>";
      }
      ?>
      <div class="d-grid mt-4">
        <button type="submit" class="btn btn-danger fw-bold"><i class="bi bi-send"></i> Submit</button>
      </div>
    </form>
  </div>
<!-- Improved Custom CSS for Gregdom Scholarship Form -->
<style>
/* Main Content Styling */
.main-content {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 6px 32px rgba(0,0,0,0.09);
  padding: 48px 24px 36px 24px;
  margin-top: 18px;
  min-height: 80vh;
}

/* Announcement Card */
.card-announcement {
  border-left: 6px solid #dc3545;
  background: #fff5f5;
  border-radius: 10px;
  box-shadow: 0 2px 8px rgba(220,53,69,0.07);
}

/* Card Styling */
.card {
  border-radius: 14px;
  border: none;
  box-shadow: 0 2px 12px rgba(0,0,0,0.07);
  background: #fafbfc;
}

.card h3 {
  letter-spacing: 1px;
  font-size: 1.4rem;
}

.card form label {
  color: #222;
  font-size: 1rem;
  margin-bottom: 4px;
}

.card form input[type="text"],
.card form input[type="email"],
.card form input[type="file"] {
  border-radius: 8px;
  border: 1px solid #ced4da;
  transition: border-color 0.2s, box-shadow 0.2s;
  font-size: 0.98rem;
  padding: 8px 12px;
  background: #f8f9fa;
}

.card form input[type="text"]:focus,
.card form input[type="email"]:focus,
.card form input[type="file"]:focus {
  border-color: #dc3545;
  box-shadow: 0 0 0 0.18rem rgba(220,53,69,.12);
  background: #fff;
}

.card form .btn-danger {
  background: linear-gradient(90deg, #dc3545 60%, #ff6f61 100%);
  border: none;
  font-size: 1.12rem;
  padding: 12px 0;
  border-radius: 8px;
  transition: background 0.2s, box-shadow 0.2s;
  box-shadow: 0 2px 8px rgba(220,53,69,0.08);
}

.card form .btn-danger:hover, .card form .btn-danger:focus {
  background: linear-gradient(90deg, #ff6f61 60%, #dc3545 100%);
  box-shadow: 0 4px 16px rgba(220,53,69,0.13);
}

.card form .form-label {
  font-weight: 500;
}

.card form .mb-3 {
  margin-bottom: 1.1rem !important;
}

/* Section Headings */
.fw-bold, .fw-semibold {
  letter-spacing: 0.5px;
}

/* Responsive Design */
@media (max-width: 991px) {
  .main-content {
    padding: 20px 5px;
  }
  .card {
    padding: 18px 6px !important;
  }
}

@media (max-width: 768px) {
  .main-content {
    padding: 10px 2px;
  }
  .card {
    padding: 10px 2px !important;
  }
  .border-end {
    border-right: none !important;
    border-bottom: 1px solid #eee;
    margin-bottom: 20px;
  }
  .row {
    flex-direction: column;
  }
}

/* File Input Customization */
input[type="file"]::-webkit-file-upload-button {
  background: #dc3545;
  color: #fff;
  border: none;
  border-radius: 6px;
  padding: 6px 16px;
  font-weight: 500;
  cursor: pointer;
  transition: background 0.2s;
}
input[type="file"]:hover::-webkit-file-upload-button {
  background: #ff6f61;
}
input[type="file"]::file-selector-button {
  background: #dc3545;
  color: #fff;
  border: none;
  border-radius: 6px;
  padding: 6px 16px;
  font-weight: 500;
  cursor: pointer;
  transition: background 0.2s;
}
input[type="file"]:hover::file-selector-button {
  background: #ff6f61;
}

/* Remove number input arrows for phone */
input[type="text"][name="name3"]::-webkit-outer-spin-button,
input[type="text"][name="name3"]::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
input[type="text"][name="name3"] {
  -moz-appearance: textfield;
}

/* Error Message Styling (for future validation) */
.form-error {
  color: #dc3545;
  font-size: 0.95rem;
  margin-top: 2px;
  margin-bottom: 4px;
  display: none;
}
</style>

</body>
</html>
