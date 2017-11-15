<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends MY_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('member_model');
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('url', 'form'));
		$this->load->database('default');
	}

	public function index($renderData = "") {
		$this->title = "iLink | Members";
		$this->keywords = "iLink, Cybershare, Group, UTEP";
		$folder = 'template';
		$members = $this->member_model->getVisibleMembers();
		sort($members);
		$this->data['members'] = $members;
		$this->load->model('website_model');
		foreach ($members as $member)
			$member->websites = $this->website_model->get_many_by('Musername_fk', $member->Musername);

		$this->_render('pages/members/membersListing', $renderData, $folder);
	}

	public function profile($username, $renderData = "") {
		$this->title = "iLink | Members";
		$this->keywords = "iLink, cybershare, group, utep";
		$folder = 'template';
		$this->data['member'] = $this->member_model->get_by('Musername', $username);

		$this->load->model('project_model');
		$this->load->model('project_participation_model');
		$participated_projects_pids = $this->project_participation_model->get_many_by('Musername_fk', $username);
		$participated_projects = array();
		foreach ($participated_projects_pids as $project)
			array_push($participated_projects, $this->project_model->get($project->Pid_fk));
		$this->data['participated_projects'] = $participated_projects;

		$this->load->model('event_model');
		$this->load->model('event_participation_model');
		$participated_events_pids = $this->event_participation_model->get_many_by('Musername_fk', $username);
		$participated_events = array();

		foreach ($participated_events_pids as $event)
			array_push($participated_events, $this->event_model->get($event->Eid_fk));
		$this->data['participated_events'] = $participated_events;

		$this->load->model('resource_model');
		$this->load->model('resource_participation_model');
		$participated_resources_pids = $this->resource_participation_model->get_many_by('Musername_fk', $username);
		$participated_resources = array();
		foreach ($participated_resources_pids as $resource)
			array_push($participated_resources, $this->resource_model->get($resource->Rid_fk));
		$this->data['participated_resources'] = $participated_resources;

		$this->load->model('website_model');
		$this->data['websites'] = $this->website_model->get_many_by('Musername_fk', $username);

		$this->_render('pages/members/profile', $renderData, $folder);
	}

}
