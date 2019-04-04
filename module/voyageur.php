<?php
    include 'config.php';
?>
<br><br>
  <div class="container">
  <center>ENREGESTREMENT</center>
  <form  action="" method="post">
      <section >
      <br><br>
   
   NOM: <input type="text" placeholder="Enter noms" name="nom" required>
   <br><br>
  PRENOMS:<input type="text" placeholder="Enter prenoms" name="prenom" required>
  <br><br>
  DATE DE NAISSANCE:<input type="date"  name="datenaiss" required>
  <br><br>
  SEXE:
  <br><br>
<input type="radio" name="sexe" value="👦"> masculin<br>
<input type="radio" name="sexe" value="👧"> feminin<br>
<br><br>
NUMERO TEL:<input type="text" placeholder="Enter numero " name="tel" required>
<br><br>
EMAIL:<input type="email" placeholder="Enter email " name="email" required>
<br><br>
MOT DE PASS:<input type="password"name="mdp" required>
<br><br>
    <button type="ok" name = "valider">AJOUTER </button>
    <button class="cancelbtn" type="reset" name = "reset">ANNULER </button>
    <br><br>
</section>
</form>
<?php
  if(isset($_POST['valider'])){
      $nom = addslashes($_POST ['nom']);
      $prenom = addslashes($_POST ['prenom']);
      $datenaiss = addslashes($_POST ['datenaiss']);
      $sexe = addslashes($_POST ['sexe']);
      $tel = addslashes($_POST ['tel']);
      $email = addslashes($_POST ['email']);
      $mdp = md5($_POST ['mdp']);
    
    //insertion dans la table infos
      mysqli_query($conn, "INSERT INTO user (nom,prenom,datenaiss,sexe,tel,email,mdp)
       VALUES ('$nom','$prenom','$datenaiss','$sexe','$tel','$email','$mdp')");
      echo "<font color = 'green'>";
      echo "noms: ".$nom." prenoms: ".$prenom." sexe: ".$sexe."  ".$email.", a bien ete enregistre";
      echo "</font>";
      echo "<br>";      
       }     
      else{
          echo"Aucun enregistrement";
          echo "<br><br><br>";

      } 
  ?>
