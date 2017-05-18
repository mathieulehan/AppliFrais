<?php
$this->load->helper ( 'url' );
?>

<div id="contenu">
	<h2>Modifier la fiche frais du mois <?php echo $numMois."-".$numAnnee; ?></h2>
					
	<?php
	
	if (! empty ( $notify ))
		echo '<p id="notify" >' . $notify . '</p>';
	?>
	 
	<form method="post"
		action="<?php echo base_url("c_comptable/majForfait/".$util);?>">
		<div class="corpsForm">

			<fieldset>
				<legend>Eléments forfaitisés</legend>
				<?php
				foreach ( $lesFraisForfait as $unFrais ) {
					if ($unFrais ['idfrais'] != "NUI" && $unFrais ['idfrais'] != "REP") { // Pour retiré les nuitée Hotel et le nbr de repas
						$idFrais = $unFrais ['idfrais'];
						$libelle = $unFrais ['libelle'];
						$quantite = $unFrais ['quantite'];
						
						echo '<p>
							<label for="' . $idFrais . '">' . $libelle . '</label>
							<input type="text" id="' . $idFrais . '" name="lesFrais[' . $idFrais . ']" size="10" maxlength="5" value="' . $quantite . '" />
						</p>
						';
					}
				}
				?>
			</fieldset>
		</div>
		<div class="piedForm">
			<p>
				<input id="ok" type="submit" value="Enregistrer" size="20" /> <input
					id="annuler" type="reset" value="Effacer" size="20" />
			</p>
		</div>
	</form>
</div>
