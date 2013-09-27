<?php
class Drop_list extends CI_Model{

	public $option_id = null;

	function __construc(){
		parent::__construc();
	}


	function getOptions(){
		$options = $this->db->select('*')
						->get('product_group')->result();

		$options_arr;

		$options_arr[''] = '-- เลือกหมวดหมู่ --';

		// Format for passing into form_dropdown function

		foreach ($options as $option) {
			$options_arr[$option->product_group_id] = $option->product_group_name;
		}

		return $options_arr;
	}

	function getSubOptions(){
		if(!is_null($this->option_id)){
			$this->db->select('*');
			$this->db->where('product_group', $this->option_id);
			$suboptions = $this->db->get('product_sub');

			// if there are suboptinos for this option...
			if($suboptions->num_rows() > 0){
				$suboptions_arr;

				// Format for passing into jQuery loop

				foreach ($suboptions->result() as $SubOption)
				{
					$suboptions_arr[$SubOption->product_sub_id] = $SubOption->product_sub_name;
				}

				return $suboptions_arr;
			}else{
				$suboptions_arr['0'] = '-- Please Select Option --';
				return $suboptions_arr;
			}
		}

		return;
	}



}
?>