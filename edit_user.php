<?php
require_once 'config.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $user = $conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $role = $conn->real_escape_string($_POST['role']);
    $conn->query("UPDATE users SET name='$name', email='$email', role='$role' WHERE id=$id");
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="container py-5">
  <h2>Edit User</h2>
  <form method="POST">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
    <div class="mb-3">
      <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($user['name']); ?>" required>
    </div>
    <div class="mb-3">
      <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
    </div>
    <div class="mb-3">
      <select name="role" class="form-control" required>
        <option value="admin" <?php if($user['role']=='admin') echo 'selected'; ?>>Admin</option>
        <option value="user" <?php if($user['role']=='user') echo 'selected'; ?>>User</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
    <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
  </form>
</body>
</html>