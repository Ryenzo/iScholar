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
<main class="dashboard">
  <div class="container my-5">
    <h2 class="mb-4 text-center fw-bold" style="color:#222;">List of Scholars</h2>
    <div class="table-responsive shadow rounded" style="background: #fff;">
      <table class="table table-hover align-middle mb-0 activity-table">
        <thead class="table-dark">
          <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Created At</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "students";

        $conn = new mysqli($host, $user, $password, $database);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);

        if (!$result) {
          die("Query failed: " . $conn->error);
        }

        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td class='text-center fw-semibold'>" . htmlspecialchars($row['id']) . "</td>";
          echo "<td>" . htmlspecialchars($row['name']) . "</td>";
          echo "<td>" . htmlspecialchars($row['email']) . "</td>";
          echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
          echo "<td>" . htmlspecialchars($row['address']) . "</td>";
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

<!-- Toggle Dropdown Script -->
<script>
  function toggleDropdown() {
    const dropdown = document.getElementById("registrationDropdown");
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
  }
</script>

</body>
</html>
