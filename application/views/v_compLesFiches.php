<?php
$this->load->helper ( 'url' );
?>
<div id="contenu">
	<h2>Liste des fiches de frais</h2>
	 	
	<?php if(!empty($notify)) echo '<p id="notify" >'.$notify.'</p>';?>
	 
	<table class="listeLegere">
		<thead>
			<tr>
				<th>Mois</th>
				<th>Utilisateur</th>
				<th>Montant</th>
				<th>Date modif.</th>
				<th colspan="4">Actions</th>
			</tr>
		</thead>
		<tbody>
          
		<?php
		foreach ( $lesFiches as $uneFiche ) {
			$modLink = '';
			$signeLink = '';
			
			if ($uneFiche ['id'] == 'CL') {
				$signeLink = anchor ( 'c_comptable/validerFiche/' . $uneFiche ['mois'] . '/' . $uneFiche ['idv'], 'valider', 'title="Signer la fiche"  onclick="return confirm(\'Voulez-vous vraiment valider cette fiche ?\');"' );
				$refusLink = anchor ( 'c_comptable/refusFicheCom/' . $uneFiche ['mois'] . '/' . $uneFiche ['idv'], 'refuser', 'title="Refuser la fiche"  onclick="return confirm(\'Voulez-vous vraiment refuser cette fiche ?\');"' );
				echo '<tr>
					<td class="date">' . anchor ( 'c_comptable/voirFiche/' . $uneFiche ['mois'] . '/' . $uneFiche ['idv'], $uneFiche ['mois'], 'title="Consulter la fiche"' ) . '</td>
					<td class="libelle">' . $uneFiche ['nom'] . '</td>
					<td class="montant">' . $uneFiche ['montantValide'] . '</td>
					<td class="date">' . $uneFiche ['dateModif'] . '</td>
					<td class="action">' . $signeLink . '</td>
					<td class="action">' . $refusLink . '</td>
					<td class="action">' . anchor ( 'c_comptable/modCompFiche/' . $uneFiche ['mois'] . '/' . $uneFiche ['idv'], "Modifier", 'title="Modifier la fiche"' ) . '</td>
				</tr>';
			}
		}
		?>	  
		</tbody>
	</table>

</div>
