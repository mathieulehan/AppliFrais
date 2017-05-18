<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ContrÃ´leur par défaut de l'application
 * Si aucune spécification de contrÃ´leur n'est précisée dans l'URL du navigateur
 * c'est le contrÃ´leur par défaut qui sera invoqué. Son rÃ´le est :
 * 		+ d'orienter vers le bon contrÃ´leur selon la situation
 * 		+ de traiter le retour du formulaire de connexion 
*/
class C_default extends CI_Controller {

	/**
	 * Fonctionnalité par défaut du contrÃ´leur. 
	 * Vérifie l'existence d'une connexion :
	 * Soit elle existe et on redirige vers le contrÃ´leur de VISITEUR, 
	 * soit elle n'existe pas et on envoie la vue de connexion
	*/
	public function index()
	{
		$this->load->model('authentif');
		$this->load->model('dataAccess');
		
		if (!$this->authentif->estConnecte()) 
		{
			$data = array();
			$this->templates->load('t_connexion', 'v_connexion', $data);
		}
		else
		{
			$login = $this->input->post('login');
			$mdp = $this->input->post('mdp');
			$compt=$this->dataAccess->getCompVisiteur($login, $mdp);
			
			$this->load->helper('url');
			$compt = $compt['comp'];
			if($compt==0){
				redirect('/c_visiteur/');
			}
			else if($compt==1){
				redirect('/c_comptable/');
			}
		}
	}
	
	/**
	 * Traite le retour du formulaire de connexion afin de connecter l'utilisateur
	 * s'il est reconnu
	*/
	public function connecter () 
	{	// TODO : conrÃ´ler que l'obtention des données postées ne rend pas d'erreurs 

		$this->load->model('authentif');
		
		$login = $this->input->post('login');
		$mdp = $this->input->post('mdp');
		
		$authUser = $this->authentif->authentifier($login, $mdp);

		if(empty($authUser))
		{
			$data = array('erreur'=>'Login ou mot de passe incorrect');
			$this->templates->load('t_connexion', 'v_connexion', $data);
		}
		else
		{
			$this->authentif->connecter($authUser['id'], $authUser['nom'], $authUser['prenom']);
			$this->index();
		}
	}
	
}
