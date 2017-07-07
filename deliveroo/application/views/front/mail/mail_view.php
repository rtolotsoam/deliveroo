<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	body{
		font-family:Arial, Helvetica; 
		font-size: 12px;
	}

</style>
</head>
	<body>
		<strong>
			Bonjour <?php echo ucfirst(strtolower($prenom)); ?>
		</strong>
		<br/><br/>
		<p>
			<?php
			if(isset($statut) && $statut == '1'){
			?>

				Votre compte a été créer pour utiliser l'outil d'aide à l'agent DELIVEROO.

			<?php
			}else if(isset($statut) && $statut == '0'){
			?>	

				Votre compte a été créer pour utiliser l'outil d'aide à l'agent DELIVEROO.
				</p>
				<p>Mais il n'est pas encore activé, veuillez aviser votre N+1 pour l'activer.

			<?php
			}else if(isset($statut) && $statut == 'mail_renseigne'){
			?>

				Merci d'avoir renseigner votre adresse E-mail, pour utiliser l'outil d'aide à l'agent DELIVEROO.

			<?php
			}else if(isset($statut) && $statut == 'modif_pass_mail'){
			?>

				Merci d'avoir renseigner votre adresse E-mail et votre mot de passe est modifier, pour utiliser l'outil d'aide à l'agent DELIVEROO.

			<?php
			}
			?>
		</p>
		<p>
			Ci-joint les détails
		</p>
		<h4>
			Information sur votre compte : 
		</h4>
		<ol>
			<li>Matricule : <?php echo $matricule; ?></li>
			<li>Mot de passe : <?php echo $pass; ?></li>
			<li>Lien : <a href="http://aide-agent.vivetic.com:8888/deliveroo">http://aide-agent.vivetic.com:8888/deliveroo</a></li>
		</ol>
		<p>Cordialement,</p>
		<p>
			<h4>
				ADMIN 
				<br/>
				<span style="color: #35B8B2;">
					ADMINISTRATION DELIVEROO
				</span>
			</h4>
			<img src="cid:logo_mail" alt="deliveroo" width="193" height="51" border="0" />
		</p>

	</body>
</html>