    <?php

      include 'config.php';

       // quand le formulaire est soumis
        $query = mysqli_query($conn, "SELECT * FROM user ");
        $rows = mysqli_num_rows($query);

        if($rows!=0){
            ?>
            <div class="container-fluid">
              <div class="row">

              <table class="table table-striped table-bordered" width=100px>
                  <thead>
                    <tr>

                      <th>NOM ET PRENOM</th>
                      <th>NE LE</th>
                      <th>SEXE</th>
                      <th>SOLDE</th>
                      <th>NUMERO</th>
                      <th>EMAIL</th>
                      <th>INSCRIRE LE</th>
                    </tr>
                  </thead>
            <?php
        while($array = mysqli_fetch_assoc($query)) {
        //$iduser = $array['iduser'];
        $nom = $array['nom'];
        $prenom = $array['prenom'];
        $datenaiss = $array['datenaiss'];
        $sexe = $array['sexe'];
        $solde = $array['solde'];
        $phone = $array['tel'];
        $email = $array['email'];
        $date_inscription = $array['date_create'];


          echo "
                  <tr>

                    <td>".$nom." ".$prenom."</td>
                    <td>".$datenaiss."</td>
                    <td>".$sexe."</td>
                    <td>".$solde."</td>
                    <td>".$phone."</td>
                    <td>".$email."</td>
                    <td>".$date_inscription."</td>
                  </tr>
                ";
        }

    }
    ?>
      </table>
    </div>
  </div>
    <?php
        mysqli_close($conn);
    ?>
