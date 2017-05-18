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
			
			if ($uneFiche ['id'] == 'VA') {
				$signeLink = anchor ( 'c_comptable/mpFiche/' . $uneFiche ['mois'] . '/' . $uneFiche ['idv'], 'Mettre en paiement', 'title="Mettre en paiement la fiche"  onclick="return confirm(\'Voulez-vous vraiment mettre en paiement cette fiche ?\');"' );
				echo '<tr>
					<td class="date">' . anchor ( 'c_comptable/voirFiche/' . $uneFiche ['mois'] . '/' . $uneFiche ['idv'], $uneFiche ['mois'], 'title="Consulter la fiche"' ) . '</td>
					<td class="libelle">' . $uneFiche ['nom'] . '</td>
					<td class="montant">' . $uneFiche ['montantValide'] . '</td>
					<td class="date">' . $uneFiche ['dateModif'] . '</td>
					<td class="action">' . $signeLink . '</td>
					
					</tr>';
			}
		}
		?>	  
				</tbody>
	</table>
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
			
			if ($uneFiche ['id'] == 'MP') {
				$signeLink = anchor ( 'c_comptable/rembourserFiche/' . $uneFiche ['mois'] . '/' . $uneFiche ['idv'], 'Rembourser', 'title="rembourser la fiche"  onclick="return confirm(\'Voulez-vous vraiment rembourser cette fiche ?\');"' );
				echo '<tr>
					<td class="date">' . anchor ( 'c_comptable/voirFiche/' . $uneFiche ['mois'] . '/' . $uneFiche ['idv'], $uneFiche ['mois'], 'title="Consulter la fiche"' ) . '</td>
					<td class="libelle">' . $uneFiche ['nom'] . '</td>
					<td class="montant">' . $uneFiche ['montantValide'] . '</td>
					<td class="date">' . $uneFiche ['dateModif'] . '</td>
					<td class="action">' . $signeLink . '</td>
					
					</tr>';
			}
		}
		?>	  
		</tbody>
	</table>

</div>
