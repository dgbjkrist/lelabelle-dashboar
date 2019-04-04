<?php
    include 'config.php';
?>

  <form  action="" method="post">
      <section >
    numero du client: <input type="text" name="tel" required>
    <button class="btn " type="submit" name = "montant" value="25000">25 000 </button>
    <button class="btn btn-primary" type="submit" name = "montant" value="30000">30 000 </button>
    <button class="btn btn-warning" type="submit" name = "montant" value="50000">50 000 </button>
    <button class="btn btn-success" type="submit" name = "montant" value="100000">100 000 </button>
</section>
</form>

<?php
  if(isset($_POST['montant']) ){
      $montant = addslashes($_POST ['montant']);
      $code ='LB'.uniqid();
      $tel =addslashes($_POST['tel']);
      $registerdate=date('d-m-y');

    //crediter compte du client
      $result=mysqli_query($conn,"SELECT * FROM user WHERE tel='$tel' ");


      while($tbuser = mysqli_fetch_assoc($result)) {
          $credit= $tbuser['solde'];
          $usernom = $tbuser['nom'];
          $userprenom = $tbuser['prenom'];
          $controlNumber = $tbuser['tel'];

          if ($tel == $controlNumber) {
            mysqli_query($conn, "INSERT INTO bons (code,montant,editdate) VALUES ('$code','$montant','$registerdate')");

            $valeurbon = 0;
             $getBons = mysqli_query($conn,"SELECT montant FROM bons WHERE code='$code'");
             while($comp = mysqli_fetch_assoc($getBons)){
                $valeurbon = $comp['montant'];
             }
              $credit=$credit+$valeurbon;
              $UpdateQuery ="UPDATE user SET solde ='$credit' WHERE tel='$tel' ";
              $conn->query($UpdateQuery);
                $emetteur = "lelabelle GROUP";
                $recepteur = $usernom." ".$userprenom;
                $objet = "Achat de BON";
                $sms = "Votre compte a ete recharger de <b>".$montant."</b> le ".$datepost." <br>Merci pour votre fidelite ";
                $dateposte = date('D, d m Y H:m:s');
                $statut = 1;
                $number = $controlNumber;

              mysqli_query($conn, "INSERT INTO message (emetteur,recepteur,objet,sms,dateposte,statut, usertel) VALUES ('$emetteur','$recepteur','$objet','$sms','$dateposte','$statut','$number')");
              //insertion dans la table infos
                //mysqli_query($conn, "INSERT INTO bons (code,montant,editdate) VALUES ('$code','$montant','$registerdate')");
                echo "<font color = 'green'> <br>";
                echo   "Vous avez recharger le compte de <B>".$usernom.' '.$userprenom."</B>,<br>";
                echo " Ayant pour numero :<B> +225 ".$tel."</B>.<br>";
                echo " MONTANT : <B>".$montant."F CFA </B>.<br> ";
                echo "DATE : <B>".$registerdate."</B> .<br>";
                echo "</font>";
                echo "<br>";

        }else {
          echo "<font color = 'red'>";
          echo "<B> NUMERO INVALIDE</B>";
          echo "</font>";
          echo "<br>";
      }

          }

        }



  ?>
