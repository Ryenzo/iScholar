<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>SDCAPortal - Student Portal</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding-top: 70px;
    }

    .sidebar {
      position: fixed;
      top: 55px;
      left: 0;
      width: 250px;
      height: 100%;
      background-color: #222;
      color: white;
      padding: 20px;
      overflow-y: auto;
    }

    .dashboard {
      margin-left: 250px;
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
      color: rgb(253, 13, 13);
      padding-left: 5px;
      transition: all 0.3s ease;
    }

    .dropdown-section {
      margin-top: 15px;
    }

    .student-registration {
      background-color: #2a2a2a;
      border-radius: 8px;
      padding: 10px;
    }

    .student-registration .dropdown-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      cursor: pointer;
      color: #fff;
      font-weight: bold;
    }

    .student-registration .dropdown-content {
      display: none;
      margin-top: 10px;
    }

    .student-registration .dropdown-content a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 5px 0;
    }

    .student-registration .dropdown-content a:hover {
      text-decoration: underline;
    }

    .badge {
      background-color: red;
      color: white;
      padding: 2px 8px;
      font-size: 12px;
      border-radius: 12px;
      margin-left: 8px;
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

    .dashboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .user-avatar {
      background-color: #6c757d;
      color: white;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
    }

    .dashboard-stats {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .stat-card {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .activity-table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 10px;
      overflow: hidden;
    }

    .activity-table th,
    .activity-table td {
      padding: 12px 15px;
      border-bottom: 1px solid #ddd;
    }

    .status {
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: bold;
    }

    .status-active {
      background-color: #28a745;
      color: white;
    }

    .status-pending {
      background-color: #ffc107;
      color: black;
    }

    .btn-edit,
    .btn-delete {
      padding: 6px 10px;
      border: none;
      border-radius: 5px;
      font-size: 0.8rem;
    }

    .btn-edit {
      background-color: #007bff;
      color: white;
    }

    .btn-delete {
      background-color: #dc3545;
      color: white;
    }

    @media (max-width: 768px) {
      .sidebar {
        position: relative;
        width: 100%;
        top: 0;
        height: auto;
      }

      .dashboard {
        margin-left: 0;
      }
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Navbar -->
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

<!-- Sidebar -->
<aside class="sidebar">
  <div class="profile">
    <div class="avatar"></div>
    <h2>Admin</h2>
    <div class="student-id-badge">Student ID: 202300995</div>
  </div>
  <nav class="side-menu">
    <a href="dashboard.php" class="active">System Admin Dashboard</a>

    <div class="dropdown-section student-registration">
      <div class="dropdown-header" onclick="toggleDropdown()">
        <span>Student Registration</span>
        <span>&#x25BC;</span>
      </div>
      <div class="dropdown-content" id="registrationDropdown">
        <a href="pending_req.php">Pending Requests <span class="badge">0</span></a>
        <a href="approved_acc.php">Approved Accounts</a>
      </div>
    </div>

    <a href="set_schedule.html">Set Schedule</a>
  </nav>
</aside>

<!-- Main Content -->
<main class="dashboard">
  <div class="container my-5">

    <!-- 1. Gregdom Scholarship -->
    <h2 class="mb-4 text-center fw-bold" style="color:#222;">Gregdom Scholarship</h2>
    <div class="table-responsive shadow rounded mb-5" style="background: #fff;">
      <table class="table table-hover align-middle mb-0 activity-table">
        <thead class="table-dark">
          <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Attachments</th>
            <th scope="col">Created At</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Gregdom Scholarship
          $host = "localhost";
          $user = "root";
          $password = "";
          $database = "students";
          $conn = new mysqli($host, $user, $password, $database);

          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT * FROM gregdom ORDER BY created_at ASC";
          $result = $conn->query($sql);

          if ($result) {
            while ($row = $result->fetch_assoc()) {
              $id = htmlspecialchars($row['id']);
              $name = htmlspecialchars($row['name']);
              echo "<tr>";
              echo "<td class='text-center fw-semibold'>{$id}</td>";
              echo "<td>" . htmlspecialchars($row['name']) . "</td>";
              echo "<td>" . htmlspecialchars($row['email']) . "</td>";
              echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
              echo "<td>" . htmlspecialchars($row['address']) . "</td>";

              // Attachments with modal
              echo "<td>
                      <button class='btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#attachmentsModalGregdom{$id}'>
                        View Attachments
                      </button>
                      <div class='modal fade' id='attachmentsModalGregdom{$id}' tabindex='-1' aria-labelledby='attachmentsModalLabelGregdom{$id}' aria-hidden='true'>
                        <div class='modal-dialog modal-dialog-centered modal-lg'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title' id='attachmentsModalLabelGregdom{$id}'>Attachments - {$name}</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                              <ul class='list-group list-group-flush'>";
              $attachments = [
                'application_form' => 'Application Form',
                'letter' => 'Letter',
                'form9' => 'Form 9',
                'ranking_cert' => 'Ranking Certificate',
                'good_moral' => 'Good Moral',
                'passport_pic' => 'Passport Picture'
              ];
              $hasFiles = false;
              foreach ($attachments as $field => $label) {
                if (!empty($row[$field])) {
                  $fileUrl = htmlspecialchars($row[$field]);
                  echo "<li class='list-group-item'>
                          <a href='{$fileUrl}' target='_blank'>
                            <i class='bi bi-file-earmark-text'></i> {$label}
                          </a>
                        </li>";
                  $hasFiles = true;
                }
              }
              if (!$hasFiles) {
                echo "<li class='list-group-item text-muted'>No attachments found.</li>";
              }
              echo "           </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>";

echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
echo "<td class='text-center' id='row-" . $row['id'] . "'>
        <button class='btn btn-success btn-sm me-1 accept-btn' data-id='" . $row['id'] . "'>
          <i class='bi bi-check-circle'></i> Accept
        </button>
        <a class='btn btn-danger btn-sm' href='/scholarship/decline_acc.php?id=" . urlencode($row['id']) . "'>
          <i class='bi bi-x-circle'></i> Decline
        </a>
      </td>";
echo "</tr>";

              }
              } else {
              echo "<tr><td colspan='8' class='text-center text-danger'>No records found.</td></tr>";
              }
              $conn->close();
          ?>
        </tbody>
      </table>
    </div>

    <!-- 2. Faculty/Staff Educational Benefits -->
    <h2 class="mb-4 text-center fw-bold" style="color:#222;">Faculty/Staff Educational Benefits</h2>
    <div class="table-responsive shadow rounded mb-5" style="background: #fff;">
      <table class="table table-hover align-middle mb-0 activity-table">
        <thead class="table-dark">
          <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Attachments</th>
            <th scope="col">Created At</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
        // Faculty/Staff Educational Benefits
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "students";
        $conn = new mysqli($host, $user, $password, $database);
        if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
        $sql = "SELECT * FROM faculty ORDER BY created_at ASC";
        $result = $conn->query($sql);
        if ($result) {
          while ($row = $result->fetch_assoc()) {
            $id = htmlspecialchars($row['id']);
            $name = htmlspecialchars($row['name']);
            echo "<tr>";
            echo "<td class='text-center fw-semibold'>{$id}</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
            // Attachments with modal
            echo "<td>
                    <button class='btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#attachmentsModalFaculty{$id}'>
                      View Attachments
                    </button>
                    <div class='modal fade' id='attachmentsModalFaculty{$id}' tabindex='-1' aria-labelledby='attachmentsModalLabelFaculty{$id}' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered modal-lg'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='attachmentsModalLabelFaculty{$id}'>Attachments - {$name}</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                          </div>
                          <div class='modal-body'>
                            <ul class='list-group list-group-flush'>";
            $attachments = [
              'application_form' => 'Application Form',
              'letter' => 'Letter',
              'faculty_id' => 'Faculty ID',
              'good_moral' => 'Good Moral',
              'passport_pic' => 'Passport Picture'
            ];
            $hasFiles = false;
            foreach ($attachments as $field => $label) {
              if (!empty($row[$field])) {
                $fileUrl = htmlspecialchars($row[$field]);
                echo "<li class='list-group-item'>
                        <a href='{$fileUrl}' target='_blank'>
                          <i class='bi bi-file-earmark-text'></i> {$label}
                        </a>
                      </li>";
                $hasFiles = true;
              }
            }
            if (!$hasFiles) {
              echo "<li class='list-group-item text-muted'>No attachments found.</li>";
            }
            echo "           </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>";
            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "<td class='text-center'>
                    <a class='btn btn-success btn-sm me-1' href='/scholarship/approve_acc.php?id=" . urlencode($row['id']) . "'>
                      <i class='bi bi-check-circle'></i> Accept
                    </a>
                    <a class='btn btn-danger btn-sm' href='/scholarship/decline_acc.php?id=" . urlencode($row['id']) . "'>
                      <i class='bi bi-x-circle'></i> Decline
                    </a>
                  </td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='8' class='text-center text-danger'>No records found.</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
      </table>
    </div>

    <!-- 3. Campus Leaders/Journalists Benefits -->
    <h2 class="mb-4 text-center fw-bold" style="color:#222;">Campus Leaders/Journalists Benefits</h2>
    <div class="table-responsive shadow rounded mb-5" style="background: #fff;">
      <table class="table table-hover align-middle mb-0 activity-table">
        <thead class="table-dark">
          <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Attachments</th>
            <th scope="col">Created At</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
        // Campus Leaders/Journalists Benefits
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "students";
        $conn = new mysqli($host, $user, $password, $database);
        if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
        $sql = "SELECT * FROM campus_leaders ORDER BY created_at ASC";
        $result = $conn->query($sql);
        if ($result) {
          while ($row = $result->fetch_assoc()) {
            $id = htmlspecialchars($row['id']);
            $name = htmlspecialchars($row['name']);
            echo "<tr>";
            echo "<td class='text-center fw-semibold'>{$id}</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
            // Attachments with modal
            echo "<td>
                    <button class='btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#attachmentsModalLeaders{$id}'>
                      View Attachments
                    </button>
                    <div class='modal fade' id='attachmentsModalLeaders{$id}' tabindex='-1' aria-labelledby='attachmentsModalLabelLeaders{$id}' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered modal-lg'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='attachmentsModalLabelLeaders{$id}'>Attachments - {$name}</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                          </div>
                          <div class='modal-body'>
                            <ul class='list-group list-group-flush'>";
            $attachments = [
              'application_form' => 'Application Form',
              'letter' => 'Letter',
              'leadership_cert' => 'Leadership Certificate',
              'good_moral' => 'Good Moral',
              'passport_pic' => 'Passport Picture'
            ];
            $hasFiles = false;
            foreach ($attachments as $field => $label) {
              if (!empty($row[$field])) {
                $fileUrl = htmlspecialchars($row[$field]);
                echo "<li class='list-group-item'>
                        <a href='{$fileUrl}' target='_blank'>
                          <i class='bi bi-file-earmark-text'></i> {$label}
                        </a>
                      </li>";
                $hasFiles = true;
              }
            }
            if (!$hasFiles) {
              echo "<li class='list-group-item text-muted'>No attachments found.</li>";
            }
            echo "           </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>";
            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "<td class='text-center'>
                    <a class='btn btn-success btn-sm me-1' href='/scholarship/approve_acc.php?id=" . urlencode($row['id']) . "'>
                      <i class='bi bi-check-circle'></i> Accept
                    </a>
                    <a class='btn btn-danger btn-sm' href='/scholarship/decline_acc.php?id=" . urlencode($row['id']) . "'>
                      <i class='bi bi-x-circle'></i> Decline
                    </a>
                  </td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='8' class='text-center text-danger'>No records found.</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
      </table>
    </div>

    <!-- 4. Pandemic Assistance Discounts -->
    <h2 class="mb-4 text-center fw-bold" style="color:#222;">Pandemic Assistance Discounts</h2>
    <div class="table-responsive shadow rounded mb-5" style="background: #fff;">
      <table class="table table-hover align-middle mb-0 activity-table">
        <thead class="table-dark">
          <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Attachments</th>
            <th scope="col">Created At</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
        // Pandemic Assistance Discounts
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "students";
        $conn = new mysqli($host, $user, $password, $database);
        if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
        $sql = "SELECT * FROM pandemic_assistance ORDER BY created_at DESC";
        $result = $conn->query($sql);
        if ($result) {
          while ($row = $result->fetch_assoc()) {
            $id = htmlspecialchars($row['id']);
            $name = htmlspecialchars($row['name']);
            echo "<tr>";
            echo "<td class='text-center fw-semibold'>{$id}</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
            // Attachments with modal
            echo "<td>
                    <button class='btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#attachmentsModalPandemic{$id}'>
                      View Attachments
                    </button>
                    <div class='modal fade' id='attachmentsModalPandemic{$id}' tabindex='-1' aria-labelledby='attachmentsModalLabelPandemic{$id}' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered modal-lg'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='attachmentsModalLabelPandemic{$id}'>Attachments - {$name}</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                          </div>
                          <div class='modal-body'>
                            <ul class='list-group list-group-flush'>";
            $attachments = [
              'application_form' => 'Application Form',
              'letter' => 'Letter',
              'discount_cert' => 'Discount Certificate',
              'good_moral' => 'Good Moral',
              'passport_pic' => 'Passport Picture'
            ];
            $hasFiles = false;
            foreach ($attachments as $field => $label) {
              if (!empty($row[$field])) {
                $fileUrl = htmlspecialchars($row[$field]);
                echo "<li class='list-group-item'>
                        <a href='{$fileUrl}' target='_blank'>
                          <i class='bi bi-file-earmark-text'></i> {$label}
                        </a>
                      </li>";
                $hasFiles = true;
              }
            }
            if (!$hasFiles) {
              echo "<li class='list-group-item text-muted'>No attachments found.</li>";
            }
            echo "           </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>";
            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "<td class='text-center'>
                    <a class='btn btn-success btn-sm me-1' href='/scholarship/approve_acc.php?id=" . urlencode($row['id']) . "'>
                      <i class='bi bi-check-circle'></i> Accept
                    </a>
                    <a class='btn btn-danger btn-sm' href='/scholarship/decline_acc.php?id=" . urlencode($row['id']) . "'>
                      <i class='bi bi-x-circle'></i> Decline
                    </a>
                  </td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='8' class='text-center text-danger'>No records found.</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
      </table>
    </div>

    <!-- 5. Academic Honors -->
    <h2 class="mb-4 text-center fw-bold" style="color:#222;">Academic Honors</h2>
    <div class="table-responsive shadow rounded mb-5" style="background: #fff;">
      <table class="table table-hover align-middle mb-0 activity-table">
        <thead class="table-dark">
          <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Attachments</th>
            <th scope="col">Created At</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
        // Academic Honors
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "students";
        $conn = new mysqli($host, $user, $password, $database);
        if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
        $sql = "SELECT * FROM academic_honors ORDER BY created_at DESC";
        $result = $conn->query($sql);
        if ($result) {
          while ($row = $result->fetch_assoc()) {
            $id = htmlspecialchars($row['id']);
            $name = htmlspecialchars($row['name']);
            echo "<tr>";
            echo "<td class='text-center fw-semibold'>{$id}</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
            // Attachments with modal
            echo "<td>
                    <button class='btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#attachmentsModalHonors{$id}'>
                      View Attachments
                    </button>
                    <div class='modal fade' id='attachmentsModalHonors{$id}' tabindex='-1' aria-labelledby='attachmentsModalLabelHonors{$id}' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered modal-lg'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='attachmentsModalLabelHonors{$id}'>Attachments - {$name}</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                          </div>
                          <div class='modal-body'>
                            <ul class='list-group list-group-flush'>";
            $attachments = [
              'application_form' => 'Application Form',
              'letter' => 'Letter',
              'honor_cert' => 'Honor Certificate',
              'good_moral' => 'Good Moral',
              'passport_pic' => 'Passport Picture'
            ];
            $hasFiles = false;
            foreach ($attachments as $field => $label) {
              if (!empty($row[$field])) {
                $fileUrl = htmlspecialchars($row[$field]);
                echo "<li class='list-group-item'>
                        <a href='{$fileUrl}' target='_blank'>
                          <i class='bi bi-file-earmark-text'></i> {$label}
                        </a>
                      </li>";
                $hasFiles = true;
              }
            }
            if (!$hasFiles) {
              echo "<li class='list-group-item text-muted'>No attachments found.</li>";
            }
            echo "           </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>";
            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "<td class='text-center'>
                    <a class='btn btn-success btn-sm me-1' href='/scholarship/approve_acc.php?id=" . urlencode($row['id']) . "'>
                      <i class='bi bi-check-circle'></i> Accept
                    </a>
                    <a class='btn btn-danger btn-sm' href='/scholarship/decline_acc.php?id=" . urlencode($row['id']) . "'>
                      <i class='bi bi-x-circle'></i> Decline
                    </a>
                  </td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='8' class='text-center text-danger'>No records found.</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
      </table>
    </div>

    <!-- 6. Grants-In-Aide for Families -->
    <h2 class="mb-4 text-center fw-bold" style="color:#222;">Grants-In-Aide for Families</h2>
    <div class="table-responsive shadow rounded mb-5" style="background: #fff;">
      <table class="table table-hover align-middle mb-0 activity-table">
        <thead class="table-dark">
          <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Attachments</th>
            <th scope="col">Created At</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
        // Grants-In-Aide for Families
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "students";
        $conn = new mysqli($host, $user, $password, $database);
        if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
        $sql = "SELECT * FROM grants ORDER BY created_at DESC";
        $result = $conn->query($sql);
        if ($result) {
          while ($row = $result->fetch_assoc()) {
            $id = htmlspecialchars($row['id']);
            $name = htmlspecialchars($row['name']);
            echo "<tr>";
            echo "<td class='text-center fw-semibold'>{$id}</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
            // Attachments with modal
            echo "<td>
                    <button class='btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#attachmentsModalGrants{$id}'>
                      View Attachments
                    </button>
                    <div class='modal fade' id='attachmentsModalGrants{$id}' tabindex='-1' aria-labelledby='attachmentsModalLabelGrants{$id}' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered modal-lg'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='attachmentsModalLabelGrants{$id}'>Attachments - {$name}</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                          </div>
                          <div class='modal-body'>
                            <ul class='list-group list-group-flush'>";
            $attachments = [
              'application_form' => 'Application Form',
              'letter' => 'Letter',
              'family_cert' => 'Family Certificate',
              'good_moral' => 'Good Moral',
              'passport_pic' => 'Passport Picture'
            ];
            $hasFiles = false;
            foreach ($attachments as $field => $label) {
              if (!empty($row[$field])) {
                $fileUrl = htmlspecialchars($row[$field]);
                echo "<li class='list-group-item'>
                        <a href='{$fileUrl}' target='_blank'>
                          <i class='bi bi-file-earmark-text'></i> {$label}
                        </a>
                      </li>";
                $hasFiles = true;
              }
            }
            if (!$hasFiles) {
              echo "<li class='list-group-item text-muted'>No attachments found.</li>";
            }
            echo "           </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>";
            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "<td class='text-center'>
                    <a class='btn btn-success btn-sm me-1' href='/scholarship/approve_acc.php?id=" . urlencode($row['id']) . "'>
                      <i class='bi bi-check-circle'></i> Accept
                    </a>
                    <a class='btn btn-danger btn-sm' href='/scholarship/decline_acc.php?id=" . urlencode($row['id']) . "'>
                      <i class='bi bi-x-circle'></i> Decline
                    </a>
                  </td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='8' class='text-center text-danger'>No records found.</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
      </table>
    </div>

    <!-- 7. Student Athletes’ Benefits -->
    <h2 class="mb-4 text-center fw-bold" style="color:#222;">Student Athletes’ Benefits</h2>
    <div class="table-responsive shadow rounded mb-5" style="background: #fff;">
      <table class="table table-hover align-middle mb-0 activity-table">
        <thead class="table-dark">
          <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Attachments</th>
            <th scope="col">Created At</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
        // Student Athletes’ Benefits
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "students";
        $conn = new mysqli($host, $user, $password, $database);
        if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
        $sql = "SELECT * FROM student_athletes ORDER BY created_at DESC";
        $result = $conn->query($sql);
        if ($result) {
          while ($row = $result->fetch_assoc()) {
            $id = htmlspecialchars($row['id']);
            $name = htmlspecialchars($row['name']);
            echo "<tr>";
            echo "<td class='text-center fw-semibold'>{$id}</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
            // Attachments with modal
            echo "<td>
                    <button class='btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#attachmentsModalAthletes{$id}'>
                      View Attachments
                    </button>
                    <div class='modal fade' id='attachmentsModalAthletes{$id}' tabindex='-1' aria-labelledby='attachmentsModalLabelAthletes{$id}' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered modal-lg'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='attachmentsModalLabelAthletes{$id}'>Attachments - {$name}</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                          </div>
                          <div class='modal-body'>
                            <ul class='list-group list-group-flush'>";
            $attachments = [
              'application_form' => 'Application Form',
              'letter' => 'Letter',
              'athlete_cert' => 'Athlete Certificate',
              'good_moral' => 'Good Moral',
              'passport_pic' => 'Passport Picture'
            ];
            $hasFiles = false;
            foreach ($attachments as $field => $label) {
              if (!empty($row[$field])) {
                $fileUrl = htmlspecialchars($row[$field]);
                echo "<li class='list-group-item'>
                        <a href='{$fileUrl}' target='_blank'>
                          <i class='bi bi-file-earmark-text'></i> {$label}
                        </a>
                      </li>";
                $hasFiles = true;
              }
            }
            if (!$hasFiles) {
              echo "<li class='list-group-item text-muted'>No attachments found.</li>";
            }
            echo "           </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>";
            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "<td class='text-center'>
                    <a class='btn btn-success btn-sm me-1' href='/scholarship/approve_acc.php?id=" . urlencode($row['id']) . "'>
                      <i class='bi bi-check-circle'></i> Accept
                    </a>
                    <a class='btn btn-danger btn-sm' href='/scholarship/decline_acc.php?id=" . urlencode($row['id']) . "'>
                      <i class='bi bi-x-circle'></i> Decline
                    </a>
                  </td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='8' class='text-center text-danger'>No records found.</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
      </table>
    </div>

    <!-- 8. Guro Mo, Sagot Ko -->
    <h2 class="mb-4 text-center fw-bold" style="color:#222;">Guro Mo, Sagot Ko</h2>
    <div class="table-responsive shadow rounded mb-5" style="background: #fff;">
      <table class="table table-hover align-middle mb-0 activity-table">
        <thead class="table-dark">
          <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Attachments</th>
            <th scope="col">Created At</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
        // Guro Mo, Sagot Ko
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "students";
        $conn = new mysqli($host, $user, $password, $database);
        if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
        $sql = "SELECT * FROM guro_mo ORDER BY created_at ASC";
        $result = $conn->query($sql);
        if ($result) {
          while ($row = $result->fetch_assoc()) {
            $id = htmlspecialchars($row['id']);
            $name = htmlspecialchars($row['name']);
            echo "<tr>";
            echo "<td class='text-center fw-semibold'>{$id}</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
            // Attachments with modal
            echo "<td>
                    <button class='btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#attachmentsModalGuro{$id}'>
                      View Attachments
                    </button>
                    <div class='modal fade' id='attachmentsModalGuro{$id}' tabindex='-1' aria-labelledby='attachmentsModalLabelGuro{$id}' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered modal-lg'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='attachmentsModalLabelGuro{$id}'>Attachments - {$name}</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                          </div>
                          <div class='modal-body'>
                            <ul class='list-group list-group-flush'>";
            $attachments = [
              'application_form' => 'Application Form',
              'letter' => 'Letter',
              'guro_cert' => 'Guro Certificate',
              'good_moral' => 'Good Moral',
              'passport_pic' => 'Passport Picture'
            ];
            $hasFiles = false;
            foreach ($attachments as $field => $label) {
              if (!empty($row[$field])) {
                $fileUrl = htmlspecialchars($row[$field]);
                echo "<li class='list-group-item'>
                        <a href='{$fileUrl}' target='_blank'>
                          <i class='bi bi-file-earmark-text'></i> {$label}
                        </a>
                      </li>";
                $hasFiles = true;
              }
            }
            if (!$hasFiles) {
              echo "<li class='list-group-item text-muted'>No attachments found.</li>";
            }
            echo "           </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>";
            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "<td class='text-center'>
                    <a class='btn btn-success btn-sm me-1' href='/scholarship/approve_acc.php?id=" . urlencode($row['id']) . "'>
                      <i class='bi bi-check-circle'></i> Accept
                    </a>
                    <a class='btn btn-danger btn-sm' href='/scholarship/decline_acc.php?id=" . urlencode($row['id']) . "'>
                      <i class='bi bi-x-circle'></i> Decline
                    </a>
                  </td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='8' class='text-center text-danger'>No records found.</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
  .table thead th {
    vertical-align: middle;
    font-size: 1rem;
    letter-spacing: 0.5px;
  }
  .table tbody tr:hover {
    background-color: #f8f9fa;
    transition: background 0.2s;
  }
  .btn-success.btn-sm, .btn-danger.btn-sm {
    font-size: 0.85rem;
    padding: 4px 12px;
    border-radius: 20px;
    font-weight: 500;
    box-shadow: 0 1px 2px rgba(0,0,0,0.04);
    transition: background 0.2s, color 0.2s;
  }
  .btn-success.btn-sm:hover {
    background: #218838;
    color: #fff;
  }
  .btn-danger.btn-sm:hover {
    background: #c82333;
    color: #fff;
  }
  @media (max-width: 768px) {
    .table-responsive {
      font-size: 0.95rem;
    }
    .dashboard {
      padding: 10px;
    }
    .container.my-5 {
      margin-top: 1.5rem !important;
      margin-bottom: 1.5rem !important;
    }
  }
</style>

<!-- Footer -->
<footer class="footer mt-auto">
  This is the pre-alpha version of the Student Portal. Some features may be unstable and some data might not be complete.
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  $(document).ready(function () {
    $('.accept-btn').click(function () {
      const id = $(this).data('id');
      const button = $(this);

      $.ajax({
        url: 'http://localhost/Scholarship/auth/approved_acc.php',
        type: 'GET',
        data: { id: id },
        success: function (response) {
          // Hide the accept button on success
          button.fadeOut();
          // Optional: Show a confirmation message or redirect
          // You can also move the row to a different table if needed
        },
        error: function () {
          alert('An error occurred. Please try again.');
        }
      });
    });
  });
</script>


<!-- Toggle Dropdown Script -->
<script>
  function toggleDropdown() {
    const dropdown = document.getElementById("registrationDropdown");
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
  }
</script>

</body>
</html>
