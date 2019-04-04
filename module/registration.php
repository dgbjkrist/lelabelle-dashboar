<?php
  session_start();
  include 'config.php';
  // declaration des variables
  $username = '';
  $email = '';
  $password = '';


  // tableau d'erreur
  $errors = array();

  // quand le formulaire est soumis
  if (isset($_POST['ajouter'])) {
    $username = addslashes($_POST['username']);
    $email = addslashes($_POST['email']);
    $password = $_POST['password'];



    // validation du formulaire
    if (empty($username)) {
      echo '<script language="Javascript">';
      //echo 'alert("Le champ username est obligatoire")';
    echo 'document.location.replace("../pages/register.php")'; // -->
      echo ' </script>';
      //array_push($errors,"Le champ username est obligatoire");
    }
    /*
    if (empty($prenom)) {
      array_push($errors,"Le champ prenom est obligatoire");
    }

    if (empty($datenaiss)) {
      array_push($errors,"Le champ date de naissance est obligatoire");
    }

    if (empty($telephone)) {
      array_push($errors,"Le champ telephone est obligatoire");
    }
    */
    if (empty($email)) {
      echo '<script language="Javascript">';
    //  echo 'alert("Le champ email est obligatoire")';
     echo 'document.location.replace("../pages/register.php")'; // -->
      echo ' </script>';
    //  array_push($errors,"Le champ email est obligatoire");
    }
    if (empty($password)) {
      echo '<script language="Javascript">';
    //  echo 'alert("Le mot de passe est obligatoire")';
     echo 'document.location.replace("../pages/register.php")'; // -->
      echo ' </script>';
      //array_push($errors,"Le mot de passe est obligatoire");
    }
    /*
    if (empty($passwordconfirm)) {
      array_push($errors,"La confirmation du mot de passe est obligatoire");
    }

    if ($password != $passwordconfirm) {
      array_push($errors,"Echec de confirmation du Password");
    }*/


    // verification si l'utlisateur a deja un compte
    // requete
    $user_check_query = "SELECT * FROM admin WHERE username='$username' LIMIT 1";
    // execution de la requete
    $user_check_result = mysqli_query($conn,$user_check_query);
    // recuperation du retour de la requete
    $user = mysqli_fetch_assoc($user_check_result);

    if ($user) {

      // si le numero de telephone existe deja
      if ($user['username']===$username) {

      echo '<script language="Javascript">';
      echo 'document.location.replace("../pages/register.php")'; // -->
      echo ' </script>';
      }
      // redirection de l'utilisateur

    }else {
      if (count($errors) == 0) {
        if (!empty($username) AND !empty($email) AND !empty($password)) {
          //cryptage du mot de passe
          $password = md5($password);


          // execution de la requete
          mysqli_query($conn,"INSERT INTO admin (username,email,mdp) VALUES ('$username','$email','$password')");


          // redirection de l'utilisateur
           echo '<script language="Javascript">';
           echo 'document.location.replace("../index.php")'; // -->
           echo ' </script>';
        }

    }


    // verification du tableau d'erreur

    }

    // close database
    mysqli_close($conn);
  }
?>
