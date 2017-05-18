<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ContrÃ´leur du module VISITEUR de l'application
 */
class C_comptable extends CI_Controller {

	/**
	 * Aiguillage des demandes faites au contrÃ´leur
	 * La fonction _remap est une fonctionnalité offerte par CI destinée Ã  remplacer
	 * le comportement habituel de la fonction index. GrÃ¢ce Ã  _remap, on dispose
	 * d'une fonction unique capable d'accepter un nombre variable de paramÃ¨tres.
	 *
	 * @param $action : l'action demandée par le visiteur
	 * @param $params : les éventuels paramÃ¨tres transmis pour la réalisation de cette action
	 */
	public function _remap($action, $params = array())
	{
		// chargement du modÃ¨le d'authentification
		$this->load->model('authentif');

		// contrÃ´le de la bonne authentification de l'utilisateur
		if (!$this->authentif->estConnecte())
		{
			// l'utilisateur n'est pas authentifié, on envoie la vue de connexion
			$data = array();
			$this->templates->load('t_connexion', 'v_connexion', $data);
		}
		else
		{
			// Aiguillage selon l'action demandée
			// CI a traité l'URL au préalable de sorte Ã  toujours renvoyer l'action "index"
			// mÃªme lorsqu'aucune action n'est exprimée
			if ($action == 'index')				// index demandé : on active la fonction accueil du modÃ¨le visiteur
			{
				$this->load->model('a_comptable');

				// on n'est pas en mode "modification d'une fiche"
				$this->session->unset_userdata('mois');

				$this->a_comptable->accueil();
			}
			elseif ($action == 'lesFiches')		// mesFiches demandé : on active la fonction mesFiches du modÃ¨le visiteur
			{
				$this->load->model('a_comptable');

				// on n'est pas en mode "modification d'une fiche"
				$this->session->unset_userdata('mois');

				$idVisiteur = $this->session->userdata('idUser');
				$this->a_comptable->lesFiches($idVisiteur);
			}
			elseif ($action == 'lesSuivi')		// mesFiches demandé : on active la fonction mesFiches du modÃ¨le visiteur
			{
				$this->load->model('a_comptable');

				// on n'est pas en mode "modification d'une fiche"
				$this->session->unset_userdata('mois');

				$idVisiteur = $this->session->userdata('idUser');
				$this->a_comptable->lesSuivi($idVisiteur);
			}
			elseif ($action == 'deconnecter')	// deconnecter demandé : on active la fonction deconnecter du modÃ¨le authentif
			{
				$this->load->model('authentif');
				$this->authentif->deconnecter();
			}
			elseif ($action == 'voirFiche')		// voirFiche demandé : on active la fonction voirFiche du modÃ¨le authentif
			{	// TODO : contrÃ´ler la validité du second paramÃ¨tre (mois de la fiche Ã  consulter)

				$this->load->model('a_comptable');

				// obtention du mois de la fiche Ã  modifier qui doit avoir été transmis
				// en second paramÃ¨tre
				$mois = $params[0];
				// mémorisation du mode modification en cours
				// on mémorise le mois de la fiche en cours de modification
				$this->session->set_userdata('mois', $mois);
				// obtention de l'id utilisateur courant
				$idVisiteur = $this->session->userdata('idUser');

				$this->a_comptable->voirFiche($idVisiteur, $mois);
			}
			elseif ($action == 'modCompFiche')		// modFiche demandé : on active la fonction modFiche du modÃ¨le authentif
			{	// TODO : contrÃ´ler la validité du second paramÃ¨tre (mois de la fiche Ã  modifier)

				$this->load->model('a_comptable');

				// obtention du mois de la fiche Ã  modifier qui doit avoir été transmis
				// en second paramÃ¨tre
				$mois = $params[0];
				// mémorisation du mode modification en cours
				// on mémorise le mois de la fiche en cours de modification
				$this->session->set_userdata('mois', $mois);
				// obtention de l'id utilisateur courant
				$idVisiteur = $params[1];

				$this->a_comptable->modCompFiche($idVisiteur, $mois);
			}
			elseif ($action == 'signeFiche') 	// signeFiche demandé : on active la fonction signeFiche du modÃ¨le visiteur ...
			{	// TODO : contrÃ´ler la validité du second paramÃ¨tre (mois de la fiche Ã  modifier)
				$this->load->model('a_comptable');

				// obtention du mois de la fiche Ã  signer qui doit avoir été transmis
				// en second paramÃ¨tre
				$mois = $params[0];
				// obtention de l'id utilisateur courant et du mois concerné
				$idVisiteur = $this->session->userdata('idUser');
				$this->a_comptable->signeFiche($idVisiteur, $mois);

				// ... et on revient Ã  mesFiches
				$this->a_comptable->lesFiches($idVisiteur, "La fiche $mois a été signée. <br/>Pensez Ã  envoyer vos justificatifs afin qu'elle soit traitée par le service comptable rapidement.");
			}
			elseif ($action == 'mpFiche') 	// signeFiche demandé : on active la fonction signeFiche du modÃ¨le visiteur ...
			{	// TODO : contrÃ´ler la validité du second paramÃ¨tre (mois de la fiche Ã  modifier)
			$this->load->model('a_comptable');

			// obtention du mois de la fiche Ã  signer qui doit avoir été transmis
			// en second paramÃ¨tre
			$mois = $params[0];
			// obtention de l'id utilisateur courant et du mois concerné
			$idVisiteur = $params[1];
			$this->a_comptable->mpFiche($idVisiteur, $mois);

			// ... et on revient Ã  mesFiches
			$this->a_comptable->lesSuivi($idVisiteur, "La fiche $mois a été signée. <br/>Pensez Ã  envoyer vos justificatifs afin qu'elle soit traitée par le service comptable rapidement.");
			}
			elseif ($action == 'rembourserFiche') 	// signeFiche demandé : on active la fonction signeFiche du modÃ¨le visiteur ...
			{	// TODO : contrÃ´ler la validité du second paramÃ¨tre (mois de la fiche Ã  modifier)
			$this->load->model('a_comptable');

			// obtention du mois de la fiche Ã  signer qui doit avoir été transmis
			// en second paramÃ¨tre
			$mois = $params[0];
			// obtention de l'id utilisateur courant et du mois concerné
			$idVisiteur = $params[1];
			$this->a_comptable->rembourserFiche($idVisiteur, $mois);

			// ... et on revient Ã  mesFiches
			$this->a_comptable->lesSuivi($idVisiteur, "La fiche $mois a été signée. <br/>Pensez Ã  envoyer vos justificatifs afin qu'elle soit traitée par le service comptable rapidement.");
			}


			elseif ($action == 'refusFiche'){
			                $this->load->model('a_comptable');

			                // obtention du mois de la fiche Ã  signer qui doit avoir Ã©tÃ© transmis
			                // en second paramÃ¨tre
			                // obtention de l'id utilisateur courant et du mois concernÃ©

			                        $idUtilisateur = $this->input->post('idUtilisateur');
			                        $mois = $this->input->post('mois');
			                        $commentaire =  $this->input->post('comment');

			                $this->a_comptable->refusFiche($idUtilisateur,$mois,$commentaire);
							$idVisiteur = $this->session->userdata('idUser');
			                $this->a_comptable->lesFiches($idVisiteur,"La fiche $mois a été refusée");
			                // ... et on revient Ã  mesFiches
			            }

	        elseif ($action == 'refusFicheCom'){
	            $this->load->model('a_comptable');

	            $mois = $params[0];
	            // obtention de l'id utilisateur courant et du mois concernÃ©
	            $idVisiteur = $params[1]        ;
	            $this->a_comptable->refusFicheCom($idVisiteur, $mois);

	        }

			elseif ($action == 'validerFiche') 	// signeFiche demandé : on active la fonction signeFiche du modÃ¨le visiteur ...
			{	// TODO : contrÃ´ler la validité du second paramÃ¨tre (mois de la fiche Ã  modifier)
			$this->load->model('a_comptable');

			// obtention du mois de la fiche Ã  signer qui doit avoir été transmis
			// en second paramÃ¨tre
			$mois = $params[0];
			// obtention de l'id utilisateur courant et du mois concerné
			$idVisiteur = $params[1];
			$this->a_comptable->validerFiche($idVisiteur, $mois);

			// ... et on revient Ã  mesFiches
			$this->a_comptable->lesFiches($idVisiteur, "La fiche $mois est validée.");
			}
			elseif ($action == 'voirFiche') 	// signeFiche demandé : on active la fonction signeFiche du modÃ¨le visiteur ...
			{	// TODO : contrÃ´ler la validité du second paramÃ¨tre (mois de la fiche Ã  modifier)
			$this->load->model('a_comptable');

			// obtention du mois de la fiche Ã  signer qui doit avoir été transmis
			// en second paramÃ¨tre
			$mois = $params[0];
			// obtention de l'id utilisateur courant et du mois concerné
			$idVisiteur = $params[1];
			$this->a_comptable->validerFiche($idVisiteur, $mois);

			// ... et on revient Ã  mesFiches
			$this->a_comptable->voirCompFiche($idVisiteur, "La fiche $mois est validée.");
			}
			elseif ($action == 'majForfait') // majFraisForfait demandé : on active la fonction majFraisForfait du modÃ¨le visiteur ...
			{	// TODO : conrÃ´ler que l'obtention des données postées ne rend pas d'erreurs
				// TODO : dans la dynamique de l'application, contrÃ´ler que l'on vient bien de modFiche

				$this->load->model('a_comptable');

				// obtention de l'id du visiteur et du mois concerné
				$idVisiteur = $params[0];
				$mois = $this->session->userdata('mois');

				// obtention des données postées
				$lesFrais = $this->input->post('lesFrais');

				$this->a_comptable->majForfait($idVisiteur, $mois, $lesFrais);

				// ... et on revient en modification de la fiche
				$this->a_comptable->modCompFiche($idVisiteur, $mois, 'Modification(s) des éléments forfaitisés enregistrée(s) ...');
			}
			elseif ($action == 'ajouteFrais') // ajouteLigneFrais demandé : on active la fonction ajouteLigneFrais du modÃ¨le visiteur ...
			{	// TODO : conrÃ´ler que l'obtention des données postées ne rend pas d'erreurs
				// TODO : dans la dynamique de l'application, contrÃ´ler que l'on vient bien de modFiche

				$this->load->model('a_comptable');

				// obtention de l'id du visiteur et du mois concerné
				$idVisiteur = $this->session->userdata('idUser');
				$mois = $this->session->userdata('mois');

				// obtention des données postées
				$uneLigne = array(
						'dateFrais' => $this->input->post('dateFrais'),
						'libelle' => $this->input->post('libelle'),
						'montant' => $this->input->post('montant')
				);

				$this->a_comptable->ajouteFrais($idVisiteur, $mois, $uneLigne);

				// ... et on revient en modification de la fiche
				$this->a_comptable->modFiche($idVisiteur, $mois, 'Ligne "Hors forfait" ajoutée ...');
			}
			elseif ($action == 'supprFrais') // suppprLigneFrais demandé : on active la fonction suppprLigneFrais du modÃ¨le visiteur ...
			{	// TODO : contrÃ´ler la validité du second paramÃ¨tre (mois de la fiche Ã  modifier)
				// TODO : dans la dynamique de l'application, contrÃ´ler que l'on vient bien de modFiche

				$this->load->model('a_comptable');

				// obtention de l'id du visiteur et du mois concerné
				$idVisiteur = $this->session->userdata('idUser');
				$mois = $this->session->userdata('mois');

				// Quel est l'id de la ligne Ã  supprimer : doit avoir été transmis en second paramÃ¨tre
				$idLigneFrais = $params[0];
				$this->a_comptable->supprLigneFrais($idVisiteur, $mois, $idLigneFrais);

				// ... et on revient en modification de la fiche
				$this->a_comptable->modFiche($idVisiteur, $mois, 'Ligne "Hors forfait" supprimée ...');
			}
			else								// dans tous les autres cas, on envoie la vue par défaut pour l'erreur 404
			{
				show_404();
			}
		}
	}
}
