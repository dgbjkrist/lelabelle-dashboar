<?php
  session_start();
  include 'config.php';

  $username = '';
  $password = '';
  $errors = array();


  if (isset($_POST['login'])) {
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    // validation du fomulaire
    if(empty($username)){
      echo '<script language="Javascript">';
      echo 'alert("Username obligatoire")';
    //  echo 'document.location.replace("../pages/login.php")'; // -->
      echo ' </script>';
      //array_push($errors, "Le telephone est obligatoire");
    }

    if (empty($password)) {
      echo '<script language="Javascript">';
      echo 'alert("Password obligatoire")';
  //    echo 'document.location.replace("../pages/login.php")'; // -->
      echo ' </script>';
      //array_push($errors, "Le mot de passe est obligatoire");
    }


    // verification s'il n'y a pas d'erreur

    if (count($errors)==0) {
      // cryptage du mot de passe
      $password = md5($password);
      // verification si l'utilisateur a un compte
      // requete
      $query = "SELECT * FROM admin WHERE username='$username' AND mdp='$password' LIMIT 1";
      // execution de la requete
      $results = mysqli_query($conn,$query);


      // voir l'etats de requete

      if (mysqli_num_rows($results) == 1) {
        // stocker le retour de la requete dans un tableau
        $array = $results -> fetch_assoc();
        $_SESSION['logged_in'] = true;
        $_SESSION['logged_id'] = $array['idadmin'];
        
        $_SESSION['username'] = $array['username'];
        $_SESSION['password'] = $array['mdp'];
        $_SESSION['email'] = $array['email'];


        // redirection de l'utilisateur
         echo '<script language="Javascript">';
         echo 'document.location.replace("../index.php")'; // -->
         echo ' </script>';
      } else {
        // redirection de l'utilisateur
         echo '<script language="Javascript">';
         echo 'document.location.replace("../pages/login.php")'; // -->
         echo ' </script>';
        //array_push($errors, "Numero ou Password incorrect, Reessayez");
      }
    }
    mysqli_close($conn);
  }

?>
