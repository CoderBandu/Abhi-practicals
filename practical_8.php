<?php
session_start();
$database = [
    ['username' => 'Abhishek', 'password' => '@b#!$#3K'],
];
$message = '';

function authenticate($username, $password) {
    global $database;
    foreach ($database as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            return true;
        }
    }
    return false;
}

if (isset($_POST['action']) && $_POST['action'] == 'sign-in') {
    $username = $_POST['userName'];
    $password = $_POST['userPass'];

    # authenticate
    if (authenticate($username, $password)) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        $message = "Welcome back, $username!!!";
    } else {
        $message = "Invalid username or password.";
    }
}

// Sign out logic
if (isset($_GET['action']) && $_GET['action'] == 'signout') {
    unset($_SESSION['username']); 
    session_destroy(); 
    $message = 'You have been signed out.';
    
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Practical 8</title>
  <style>
    body {
      height: 100vh;
      display: flex;
      align-items: center;
      flex-direction: column;
      justify-content: center;
      font-family: 'Arial', sans-serif;
      background: linear-gradient(to bottom, #BFD8D2 50%, #DEEDE6);
    }

    form {
      width: 320px;
      padding: 20px;
      position: relative;
      border-radius: 10px;
      background: #d2d1d144;
      backdrop-filter: blur(5px);
      border: solid 2px #4F6D7A;
      box-shadow: 0 8px 16px #ffffff40;
      display: <?php echo isset($_SESSION['username']) ? 'none': 'block';
      ?>;
    }

    .inputs {
      padding: 10px;
      margin: 20px 0;
      border-radius: 5px;
      background: rgba(255, 255, 255, 0.5);
    }

    .inputs input {
      height: 30px;
      border: none;
      outline: none;
      font-size: 16px;
      color: #4F6D7A;
      padding-left: 10px;
      background: transparent;
      width: calc(100% - 50px);
      border-bottom: solid 2px #4F6D7A;
    }

    .h1 {
      top: -50px;
      position: relative;
    }

    .h1,.bandu {
      width: 40%;
      margin: auto;
      color: #4F6D7A;
      font-size: 24px;
      text-align: center;
      padding: 15px 50px;
      border-radius: 25px;
      background: #79f1f1;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    img {
      height: 25px;
      padding-right: 10px;
    }

    button {
      border: none;
      margin: 20px 0;
      color: white;
      cursor: pointer;
      font-size: 16px;
      border-radius: 5px;
      padding: 10px 20px;
      background: #4F6D7A;
      transition: background 0.3s ease;
    }

    button:hover {
      background: #6A8A82;
    }

    .show {
      display: flex;
      margin-top: 10px;
      align-items: center;
      justify-content: center;
    }

    .show input[type="checkbox"] {
      margin-right: 5px;
    }

    .show span {
      color: #4F6D7A;
      font-size: 14px;
    }

    form::before {
      width: 90%;
      content: "";
      height: 20px;
      bottom: -60px;
      filter: blur(10px);
      border-radius: 50%;
      position: absolute;
      background: #4F6D7A4d;
    }

    .message {
      bottom: 50px;
      color: #6b7208;
      position: fixed;
      padding: 0 100px;
      font-weight: bold;
      background: #f3ff55;
    }

    .hidden {
      display: none;
    }

    a {
      text-decoration: none;
    }

    .bandu {
      display: <?php echo !isset($_SESSION['username']) ? 'none': 'block';?>;
    }
  </style>
</head>

<body>

  <form method="post" class="<?php echo isset($_SESSION['username']) ? 'hidden' : ''; ?>">
    <h1 class="h1">🌟 SIGN IN 🌟</h1>
    <div class="inputs">
      <img src="/images/profil.png" alt="User Icon">
      <input type="text" name="userName" id="user" placeholder="Username">
    </div>
    <div class="inputs">
      <img src="/images/padlock.png" alt="Password Icon">
      <input type="password" name="userPass" id="password" placeholder="Password">
    </div>
    <div class="show">
      <input type="checkbox" id="show"><span>Show Password</span>
    </div>
    <input type="hidden" name="action" value="sign-in">
    <button type="submit">LOGIN</button>

  </form>

  <a href="?action=signout">
    <h1 class="bandu  <?php echo !isset($_SESSION['username']) ? 'hidden' : ''; ?>">🌟 SIGN OUT 🌟</h1>
  </a>

  <div class="message">
    <?php if (!empty($message)): ?>
    <p><?php echo $message; ?></p>
    <?php endif; ?>
  </div>

  <script>
    document.querySelector("#show").addEventListener("click", () => {
      const pass = document.getElementById("password");
      pass.type = pass.type === "password" ? "text" : "password";
    });
  </script>
</body>

</html>