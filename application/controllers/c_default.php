<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Contrôleur par défaut de l'application
 * Si aucune spécification de contrôleur n'est précisée dans l'URL du navigateur
 * c'est le contrôleur par défaut qui sera invoqué. Son rôle est :
 * 		+ d'orienter vers le bon contrôleur selon la situation
 * 		+ de traiter le retour du formulaire de connexion 
*/
class C_default extends CI_Controller {

	/**
	 * Fonctionnalité par défaut du contrôleur. 
	 * Vérifie l'existence d'une connexion :
	 * Soit elle existe et on redirige vers le contrôleur de VISITEUR, 
	 * soit elle n'existe pas et on envoie la vue de connexion
	*/
	public function index() {
		$this->load->model ( 'authentif' );
		$this->load->model ( 'dataAccess' );
		$login = $this->input->post ( 'login' );
		$mdp = $this->input->post ( 'mdp' );
		
		if (! $this->authentif->estConnecte ()) {
			$data = array ();
			$this->templates->load ( 't_connexion', 'v_connexion', $data );
		} else {
			$this->load->helper ( 'url' );
			
			
			$compt = $this->dataAccess->getProfilVisiteur($login, $mdp);
			$compt = $compt['prof'];
			if ( $compt == 1){
				redirect ( '/c_visiteur/' );
			}
			else {
				redirect ('/c_comptable/' );
			}
		}
	}

	
	/**
	 * Traite le retour du formulaire de connexion afin de connecter l'utilisateur
	 * s'il est reconnu
	 */
	public function connecter() { // TODO : conrôler que l'obtention des données postées ne rend pas d'erreurs
		$this->load->model ( 'authentif' );
		
		$login = $this->input->post ( 'login' );
		$mdp = $this->input->post ( 'mdp' );
		$idProfil = $this->input->post ( 'idProfil' );
		$authUser = $this->authentif->authentifier ( $login, $mdp );
		$profil = $this->authentif->authentifier ( $login, $mdp );
		
		if (empty ( $authUser )) {
			$data = array (
					'erreur' => 'Login ou mot de passe incorrect' 
			);
			$this->templates->load ( 't_connexion', 'v_connexion', $data );
		} else {
			$this->authentif->connecter ( $authUser ['id'], $authUser ['nom'], $authUser ['prenom'] );
			$this->index ();
		}
	}
}


