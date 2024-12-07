<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to bottom, #6a11cb, #2575fc);
      height: 100vh;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0;
    }
    .welcome-container {
      text-align: center;
    }
    .login-btn {
      position: absolute;
      top: 20px;
      right: 20px;
    }
  </style>
</head>
<body>
  <!-- Login Button -->
  <a href="login" class="btn btn-light login-btn">Login</a>

  <!-- Welcome Content -->
  <div class="welcome-container">
    <h1 class="display-4 fw-bold">Welcome to Our Platform</h1>
    <p class="lead">Your journey starts here. Explore, connect, and achieve!</p>
    <a href="#explore" class="btn btn-primary btn-lg">Explore Now</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
