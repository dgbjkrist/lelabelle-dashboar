
<form action="" methode="POST">
code du ticket: <input type="text" name="codetk" required>
<input class="btn btn-primary" type="submit" value="verifier" name="verifier">
</form>

<?php
include 'config.php';

    if (isset($_POST['verifier']) && isset($_POST['codetk'])) {
        $codeticket =addslashes($_post['codetk']);

        $verif=mysqli_query($conn,"SELECT * FROM trajet WHERE ticket='$codeticket'");

      while($tbticket = mysqli_fetch_assoc($verif)) {
          $ticket = $tbticket['ticket'];
          $tkprix = $tbticket['montant'];
          $userid = $tbticket['iduser'];
      }
      $tkprix = 0;
       $getPrix = mysqli_query($conn,"SELECT montant FROM trajet WHERE ticket='$codeticket'");
       while($tik = mysqli_fetch_assoc($getPrix)){
          $tkprix = $tik['montant'];
       }
      // $credit=$credit-$tkprix;
      // $UpdateQuery ="UPDATE user SET solde ='$credit' WHERE iduser='$userid' ";
      // $conn->query($UpdateQuery);

      echo "<font color = 'green'>";
      echo   $userid.' '.$codeticket;
      echo "<B>Vous avez ete debite de: ".$tkprix." F CFA, suite a l'achat de votre ticket/B>";
      echo "</font>";
      echo "<br>";
    }
?>
