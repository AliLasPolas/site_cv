<?php require_once'include/header.php'; ?>
<style type="text/css">
	.user-row {
    margin-bottom: 14px;
	}

	.user-row:last-child {
	    margin-bottom: 0;
	}

	.dropdown-user {
	    margin: 13px 0;
	    padding: 5px;
	    height: 100%;
	}

	.dropdown-user:hover {
	    cursor: pointer;
	}

	.table-user-information > tbody > tr {
	    border-top: 1px solid rgb(221, 221, 221);
	}

	.table-user-information > tbody > tr:first-child {
	    border-top: 0;
	}


	.table-user-information > tbody > tr > td {
	    border-top: 0;
	}
	.toppad
	{margin-top:20px;
	}

</style>
<?php 
if (!isset($_SESSION['membre'])) {
	header('Location: index_admin.php');
}
else{
		$titres = $pdoCV->query("SELECT * FROM titres_cv WHERE utilisateur_id = '".$_SESSION['membre']['utilisateur_id']."' ");
		$titres = $titres->fetch();
		$profil = $pdoCV->query("SELECT * FROM utilisateurs WHERE utilisateur_id = '".$_SESSION['membre']['utilisateur_id']."' ");
		$profil = $profil->fetch();
		// var_dump($profil);
}
if ($_POST) {
	// var_dump($_FILES);
	// echo "<hr>";
	// var_dump($_POST);
	foreach ($_POST as $key => $value) {
		$_POST[$key] = addslashes($_POST[$key]);
	}
	$modification = $pdoCV->query("UPDATE `utilisateurs` SET `statut`='".$_SESSION['membre']['statut']."',`prenom`='".$_POST['prenom']."',`nom`='".$_POST['nom']."',`email`='".$_POST['email']."',`telephone`='".$_POST['telephone']."',`mdp`='".$_POST['mdp']."',`pseudo`='".$_POST['pseudo']."',`lien_avatar`='".$_FILES['lien_avatar']['name']."',`date_naissance`='".$_POST['date_naissance']."',`sexe`='".$_POST['sexe']."',`etat_civil`='".$_POST['etat_civil']."',`adresse`='".$_POST['adresse']."',`code_postal`='".$_POST['code_postal']."',`ville`='".$_POST['ville']."',`pays`='".$_POST['pays']."',`utilisateur_id`='".$_SESSION['membre']['utilisateur_id']."' WHERE utilisateur_id = '".$_SESSION['membre']['utilisateur_id']."' ");
		copy($_FILES['lien_avatar']['tmp_name'], 'asset/img/'.$_FILES['lien_avatar']['name']);
	$nouvelle_session = $pdoCV->query("SELECT * FROM utilisateurs WHERE utilisateur_id = ".$_SESSION['membre']['utilisateur_id']." ");
	$nouvelle_session = $nouvelle_session->fetch();
	foreach ($nouvelle_session as $key => $value) {
		$_SESSION['membre'][$key] = $nouvelle_session[$key];
	}
	header('Location: /site_cv/admin/profil.php');
}
if (!$_GET) {
		echo "<h1>Page de profil</h1>";
		echo "Connecté en tant que : " . $_SESSION['membre']['pseudo'];
		echo '<div class="container profil">
	      <div class="row">
	        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2 toppad" >
	   
	   
	          <div class="panel panel-info">
	            <div class="panel-heading">
	              <h3 class="panel-title">'. $_SESSION["membre"]["etat_civil"]. ' '. $_SESSION["membre"]["prenom"] . ' ' . $_SESSION["membre"]["nom"].'</h3>
	            </div>
	            <div class="panel-body">
	              <div class="row">
	                <div class="col-md-3 col-lg-3 " align="center"> <img alt="avatar" src="../admin/asset/img/'.$_SESSION['membre']['lien_avatar'].'" class="img-circle img-responsive"> </div>
	                <div class=" col-md-9 col-lg-9 "> 
	                  <table class="table table-user-information">
	                    <tbody>
	                      <tr>
	                        <td>Pseudo :</td>
	                        <td>'.$_SESSION["membre"]["prenom"].'</td>
	                      </tr>
	                      <tr>
	                        <td> Statut </td>
	                        <td>'; 
	                        if ($_SESSION["membre"]["statut"] == 1) {echo "Admin";}
	                        else{
	                        	echo "Utilisateur";
	                        }
	                        ; echo '</td>
	                      </tr>
	                      <tr>
	                        <td>Date de naissance</td>
	                        <td>'.$_SESSION["membre"]["date_naissance"].'</td>
	                      </tr>
	                   	<tr>
	                        <td>Sexe</td>
	                        <td>'.$_SESSION["membre"]["sexe"].'</td>
	                      </tr>
	                        <tr>
	                        <td>Adresse</td>
	                        <td>'.$_SESSION["membre"]["adresse"] . '   ' . $_SESSION["membre"]["ville"] . ' ' . $_SESSION["membre"]["code_postal"] . '  ' .$_SESSION["membre"]["pays"] .'</td>
	                      </tr>
	                      <tr>
	                        <td>Email</td>
	                        <td><a href="mailto:'.$_SESSION["membre"]["email"] . '">'.$_SESSION["membre"]["email"] . '</a></td>
	                      </tr>
  	                      <tr>
	                        <td>Téléphone:</td>
	                        <td>'.$_SESSION["membre"]["telephone"].'</td>
	                      </tr>	                      
	                    </tbody>
	                  </table>
 	                </div>
	              </div>
	            </div>
	                 <div class="panel-footer">
	                        <a data-original-title="Contacter l\'administrateur" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
	                        <span class="pull-right">
	                            <a href="profil.php?action=edit" data-original-title="Éditer l\'utilisateur" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
	                            <a data-original-title="Supprimer le profil" data-toggle="tooltip" type="button" id="supprimer" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
	                        </span>
	                    </div>
	          </div>
	        </div>
	      </div>
	    </div>';
}

elseif ($_GET['action'] == 'edit'){
	echo '<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2 toppad" >
		<form method="post" enctype="multipart/form-data">

		  <div class="form-group">
			<label for="pseudo">Pseudo</label>  
			<input class="form-control"  type="text" name="pseudo" id="pseudo" value="'.$_SESSION["membre"]["pseudo"].'" placeholder="Pseudonyme">  
		</div>

		  <div class="form-group">
			<label for="prenom">Prenom</label>  
			<input class="form-control"  type="text" name="prenom" id="prenom" value="'.$_SESSION["membre"]["prenom"].'" placeholder="Prénom">  
		</div>

		  <div class="form-group">
			<label for="nom">Nom</label>  
			<input class="form-control"  type="text" name="nom" id="nom" value="'.$_SESSION["membre"]["nom"].'" placeholder="Nom">  
		</div>

		  <div class="form-group">
			<label for="email">Email</label>  
			<input class="form-control"  type="email" name="email" id="email" value="'.$_SESSION["membre"]["email"].'" placeholder="Adresse Mail">  
		</div>

		  <div class="form-group">
			<label for="telephone">Téléphone</label>  
			<input class="form-control"  type="text" name="telephone" id="telephone" value="'.$_SESSION["membre"]["telephone"].'" placeholder="Numéro de téléphone">  
		</div>

		  <div class="form-group">
			<label for="mdp">Mot de passe</label>  
			<input class="form-control"  type="password" name="mdp" id="pseudo" value="'.$_SESSION["membre"]["mdp"].'" placeholder="Mot de passe">  
		</div>

		  <div class="form-group">
			<label for="lien_avatar">Avatar</label>
			<input class="form-control"  type="file" name="lien_avatar" id="lien_avatar" value="'.$_SESSION["membre"]["lien_avatar"].'" placeholder="Avatar">  
		</div>

		  <div class="form-group">
			<label for="date_naissance">Date de naissance</label> 
			<input class="form-control"  type="text" name="date_naissance" id="date_naissance" value="'.$_SESSION["membre"]["date_naissance"].'" placeholder="Date de naissance de l\'utilisateur">  
		</div>

		  <div class="form-group">
			<label for="sexe">Sexe</label> 
			<select name="sexe">
				<option value="Homme">Homme</option>
				<option value="Femme">Femme</option>
				<option value="Autre">Autre</option>
			</select>
		</div>
		  <div class="form-group">
			<label for="etat_civil">État civil</label> 
			<select name="etat_civil">
				<option value="M.">M.</option>
				<option value="Mme">Mme</option>
				<option value="Autre">Autre</option>
			</select>
		</div>


		  <div class="form-group">
			<label for="adresse">Adresse</label> 
			<input class="form-control"  type="text" name="adresse" id="adresse" value="'.$_SESSION["membre"]["adresse"].'" placeholder="Adresse postale">  
		</div>
			


		  <div class="form-group">
			<label for="code_postal">Code postal</label> 
			<input class="form-control"  type="text" name="code_postal" id="code_postal" value="'.$_SESSION["membre"]["code_postal"].'" placeholder="Code postal">  
		</div>
				


		  <div class="form-group">
			<label for="ville">Ville</label> 
			<input class="form-control"  type="text" name="ville" id="ville" value="'.$_SESSION["membre"]["ville"].'" placeholder="Ville">  
		</div>
			


		  <div class="form-group">
			<label for="pays">Pays</label> 
			<input class="form-control"  type="text" name="pays" id="pays" value="'.$_SESSION["membre"]["pays"].'" placeholder="Pays">  
		</div>



		<button type="submit" class="btn btn-primary">Submit</button>
			

		</form>
	</div>
</div>'

;
}


?>

<span class="hidden" id="hidden_id"><?php echo $_SESSION['membre']['utilisateur_id']; ?></span>
<?php require_once'include/footer.php'; ?>
<script type="text/javascript">
$(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('#supprimer').on("click",function(e){
    	e.preventDefault();
    	$.ajax({
    		url: 'delete.php',
			type : 'POST',
			data : {
				table : 'utilisateurs',
				valeurs : $('#hidden_id').text(),
				supprimer_user : 'true'
			}
    	});
    	window.location.replace("/site_cv/admin/index_admin.php?action=deconnexion");
    });


});
</script>