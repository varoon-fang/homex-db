<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class profile extends CI_Controller {

	function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
			redirect('admin/dashboard');
			exit;
		}
		$this->load->model("backend/profile_model");
		$this->data['meta_title'] = 'profile';
	  	$this->data['footer_title'] = '2013 &copy; RGB7 Team.';
	}
    function index() {
    	$id = $this->session->userdata['logged_in']['id'];

    	$sql="select * from admin where admin_id='$id' ";
			$rs=$this->db->query($sql);

			if($this->db->query($sql)->num_rows()!=1){
				echo "<script>alert('ไม่พบข้อมูล')</script>";
				echo "<script>window.location.href='". base_url() ."admin/dashboard'</script>";
			}

				$data['rs_management']=$rs->row_array();


		$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/profile/edit', $data);
    	$this->load->view('admin/components/tail');
    }


public function update($id)
     {
		$post = new profile_model();
        if ($post->update_data($id)) {
            redirect("admin/profile");
        }

     }// end function edit

public function backup()
	{
    	$this->load->dbutil();

	        $prefs = array(
	                'format'      => 'zip',
	                'filename'    => 'my_db_backup.sql'
	              );


	        $backup =& $this->dbutil->backup($prefs);

	        $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
	        $save = '_backup/'.$db_name;

	        $this->load->helper('file');
	        write_file($save, $backup);


	        $this->load->helper('download');
	        force_download($db_name, $backup);


    }  // end backup

}// end class