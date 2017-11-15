<?php
include('application/controllers/upload.php');

class MemberUpload extends Upload
{

	public function __construct() {
		parent::__construct();
		$this->load->model('member_model');
	}

	public function uploadProfilePicture() {
		$config = $this->setPictureConfiguration();
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('Input_picture')) {
			$message = $this->upload->display_errors();

		} else {
			$data = $this->upload->data();

			$this->member_model->update($this->session->userdata('email'), array('Mphoto' => $data['file_name']));
			$this->session->set_userdata('photo', $data['file_name']);

			$message = array();
			array_push($message, $data['file_name']);
		}
		$data = array(
			'messages' => $message,
			'backUrl'  => base_url('member/editProfilePicture'),
			'multiple' => 0,
		);
		$this->load->view('template/success', $data);
	}

	private function setPictureConfiguration() {
		$uploadDir = 'resources/uploads/profilePictures';
		$allowedTypes = 'gif|jpg|png';
		$fileName = $this->session->userdata('username');

		return $this->setConfiguration($uploadDir, $allowedTypes, $fileName);
	}
}
