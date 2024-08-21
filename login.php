<?php
session_start();

if (isset($_SESSION['account'])) {
  $type_compte = $_SESSION['account']['type_compte']; 
  switch ($type_compte) {
    case 'admin':
      header('Location: index.php');
      break;
    case 'rh':
      header('Location: liste_conge.php');
      break;
    case 'employe':
      header('Location: conge.php');
      break;
    default:
      header('Location: index.php'); 
      break;
  }
}

if (isset($_POST['email'])) {
  include("connexion.php");
  $password = addslashes($_POST['password']);
  $sql = "SELECT * FROM `accounts` WHERE `email`= '$_POST[email]' and `password`=md5('$password')";
  $res = $conn->query($sql);
  if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    unset($row['password']);
    $_SESSION['account'] = $row;

    $type_compte = $row['type_compte'];
    switch ($type_compte) {
      case 'admin':
        header('Location: index.php');
        break;
      case 'rh':
        header('Location: liste_conge.php');
        break;
      case 'employe':
        header('Location: conge.php');
        break;
      default:
        header('Location: index.php'); 
        break;
    }
  } else {
    header('Location: login.php');
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Connexion</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    .center {
      text-align: center;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Connexion</div>
          <div class="card-body">
            <?php if (isset($error)) { ?>
              <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php } ?>
            <form action="login.php" method="post">
              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" name="email" required placeholder="Veuillez saisir votre email">
              </div>
              <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" name="password" required placeholder="Veuillez saisir votre mot de passe">
              </div>
              <div class="center">
                <button type="submit" class="btn btn-primary">Se connecter</button>
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>