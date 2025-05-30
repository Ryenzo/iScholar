<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SDCAPortal - Student Portal</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

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
<div class="dashboard">
  <!-- Header Section -->
  <header class="dashboard-header">
    <h1 class="dashboard-title">Dashboard Overview</h1>
    <div class="user-info">
    </div>
  </header>

  <!-- Stats Section -->
<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "students";
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Total users (sum of users in all relevant tables)
$totalGregdom = $conn->query("SELECT COUNT(*) FROM gregdom")->fetch_row()[0];
$totalFaculty = $conn->query("SELECT COUNT(*) FROM faculty")->fetch_row()[0];
$totalCampusLeaders = $conn->query("SELECT COUNT(*) FROM campus_leaders")->fetch_row()[0];
$totalAcademicHonors = $conn->query("SELECT COUNT(*) FROM academic_honors")->fetch_row()[0];
$totalPandemicAssistance = $conn->query("SELECT COUNT(*) FROM pandemic_assistance")->fetch_row()[0];
$totalGrant = $conn->query("SELECT COUNT(*) FROM grants")->fetch_row()[0];
$totalStudentAthletes = $conn->query("SELECT COUNT(*) FROM student_athletes")->fetch_row()[0];
$totalGuroMo = $conn->query("SELECT COUNT(*) FROM guro_mo")->fetch_row()[0];

$totalUsers = $totalGregdom + $totalFaculty + $totalCampusLeaders + $totalAcademicHonors + $totalPandemicAssistance + $totalGrant + $totalStudentAthletes + $totalGuroMo;

// Pending requests (real-time: count only rows with status 'pending')
// Only run the query if the table has a 'status' column, otherwise set to 0
function countPending($conn, $table) {
  $result = $conn->query("SHOW COLUMNS FROM `$table` LIKE 'status'");
  if ($result && $result->num_rows > 0) {
    $row = $conn->query("SELECT COUNT(*) FROM `$table` WHERE status = 'pending'");
    if ($row) {
      return $row->fetch_row()[0];
    }
  }
  return 0;
}

$pendingGregdom = countPending($conn, "gregdom");
$pendingFaculty = countPending($conn, "faculty");
$pendingCampusLeaders = countPending($conn, "campus_leaders");
$pendingAcademicHonors = countPending($conn, "academic_honors");
$pendingPandemicAssistance = countPending($conn, "pandemic_assistance");
$pendingGrant = countPending($conn, "grants");
$pendingStudentAthletes = countPending($conn, "student_athletes");
$pendingGuroMo = countPending($conn, "guro_mo");

$pendingRequests = $pendingGregdom + $pendingFaculty + $pendingCampusLeaders + $pendingAcademicHonors + $pendingPandemicAssistance + $pendingGrant + $pendingStudentAthletes + $pendingGuroMo;

// Active sessions and system health are placeholders
$activeSessions = 0; // You can implement your own logic
$systemHealth = "100%";
?>

  <!-- Stats Section -->
  <section class="dashboard-stats admin-stats">
    <div class="stat-card admin-stat-card">
      <h3>Total Users</h3>
      <div class="stat-value"><?php echo $totalUsers; ?></div>
    </div>
    <div class="stat-card admin-stat-card">
      <h3>Active Sessions</h3>
      <div class="stat-value"><?php echo $activeSessions; ?></div>
    </div>
    <div class="stat-card">
      <h3>Pending Requests</h3>
      <div class="stat-value"><?php echo $pendingRequests; ?></div>
    </div>
    <div class="stat-card">
      <h3>System Health</h3>
      <div class="stat-value"><?php echo $systemHealth; ?></div>
    </div>
  </section>

<!-- ...rest of your dashboard... -->

  <!-- Recent Activity Table -->
  <?php

require_once 'config.php';

// Fetch all users for the table
$users = $conn->query("SELECT * FROM users");
?>
<!-- ...existing HTML above... -->

<!-- Add User Form -->
<form method="POST" action="add_user.php" class="mb-4 admin-add-user-form">
  <div class="row g-2">
    <div class="col"><input type="text" name="name" class="form-control" placeholder="Name" required></div>
    <div class="col"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
    <div class="col"><input type="password" name="password" class="form-control" placeholder="Password" required></div>
    <div class="col">
      <select name="role" class="form-control" required>
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-success">Add User</button>
    </div>
  </div>
</form>

<!-- Recent Activity Table -->
<section class="dashboard-activity">
  <h2 class="section-title">Recent Activity</h2>
  <table class="activity-table admin-activity-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Only show users with role 'admin'
      $admins = $conn->query("SELECT * FROM users WHERE role = 'admin'");
      while ($user = $admins->fetch_assoc()): ?>
      <tr>
        <td>#<?php echo htmlspecialchars($user['id']); ?></td>
        <td><?php echo htmlspecialchars($user['name']); ?></td>
        <td><?php echo htmlspecialchars($user['email']); ?></td>
        <td>
          <span class="status status-active">Active</span>
        </td>
        <td>
          <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="btn btn-edit btn-sm">Edit</a>
          <a href="delete_user.php?id=<?php echo $user['id']; ?>" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</section>
<?php $conn->close(); ?>
<style>
/* Admin Dashboard Custom Styles */
.admin-stats .stat-card {
  border-left: 5px solid #007bff;
  transition: box-shadow 0.2s;
  box-shadow: 0 2px 8px rgba(0,0,0,0.04);
  position: relative;
}
.admin-stats .stat-card.admin-stat-card {
  border-left-color: #28a745;
}
.admin-stats .stat-card:nth-child(3) {
  border-left-color: #ffc107;
}
.admin-stats .stat-card:nth-child(4) {
  border-left-color: #17a2b8;
}
.stat-card h3 {
  font-size: 1.1rem;
  color: #444;
  margin-bottom: 8px;
}
.stat-value {
  font-size: 2.2rem;
  font-weight: bold;
  color: #222;
  margin-bottom: 0;
}
.admin-add-user-form {
  background: #fff;
  border-radius: 10px;
  padding: 18px 20px 10px 20px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
  margin-bottom: 30px;
  border-left: 4px solid #007bff;
}
.admin-add-user-form input,
.admin-add-user-form select {
  border-radius: 6px;
  border: 1px solid #ced4da;
  font-size: 1rem;
}
.admin-add-user-form .btn-success {
  padding: 8px 18px;
  font-size: 1rem;
  border-radius: 6px;
}
.dashboard-activity {
  margin-top: 30px;
}
.section-title {
  font-size: 1.3rem;
  font-weight: 600;
  color: #333;
  margin-bottom: 18px;
}
.admin-activity-table {
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}
.admin-activity-table th {
  background: #343a40;
  color: #fff;
  font-weight: 500;
  border-bottom: 2px solid #007bff;
}
.admin-activity-table td {
  background: #f9f9f9;
  color: #222;
}
.admin-activity-table tr:nth-child(even) td {
  background: #f1f3f5;
}
.admin-activity-table tr:hover td {
  background: #e9ecef;
  transition: background 0.2s;
}
.btn-edit {
  background: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  padding: 5px 12px;
  margin-right: 4px;
  transition: background 0.2s;
}
.btn-edit:hover {
  background: #0056b3;
}
.btn-delete {
  background: #dc3545;
  color: #fff;
  border: none;
  border-radius: 4px;
  padding: 5px 12px;
  transition: background 0.2s;
}
.btn-delete:hover {
  background: #a71d2a;
}
@media (max-width: 992px) {
  .admin-add-user-form .row > .col,
  .admin-add-user-form .row > .col-auto {
    flex: 0 0 100%;
    max-width: 100%;
    margin-bottom: 10px;
  }
  .admin-add-user-form .row {
    flex-direction: column;
  }
}
 </style>

<!-- Footer -->
<footer class="footer mt-auto fixed-bottom">
  This is the pre-alpha version of the Student Portal. Some features may be unstable and some data might not be complete.
</footer>
<style>
  .footer.fixed-bottom {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    z-index: 1030;
    margin-top: 0;
    border-top: 1px solid #333;
  }
</style>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Toggle Dropdown Script -->
<script>
  function toggleDropdown() {
    const dropdown = document.getElementById("registrationDropdown");
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
  }
</script>

</body>
</html>
