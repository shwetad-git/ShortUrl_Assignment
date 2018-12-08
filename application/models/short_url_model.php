<?php
/*
     * ======================================================================================================
     * short_url_model :  
     * ======================================================================================================
     * This model does database related operations.
     * 
     * Functions in this model are : 
     * 1. frequent_used_url
     * 2. store_long_url
     * 3. get_long_url
 */

class Short_url_model extends CI_Model {

	/*
	* will retrieve frequent visited link data
	* @param none
	* @return Array 
	*/
	function frequent_used_url()
    {	
		$this->db->select("long_url,count,id");
		$this->db->from('urls');		 
		$this->db->where("count >=",1);
		$this->db->or_where('count',0); 
		$this->db->order_by("id", "desc");	
		$this->db->limit(100);		 
		$query = $this->db->get();		
		return $query->result_array();
	}
	
	/*
	* Validates long URL and store in database
	* @param none
	* @return int 
	*/
    function store_long_url() //function will store long url in database
    {
		$this->form_validation->set_rules('url', 'Url', 'trim|required|min_length[5]|max_length[250]|valid_url_format');
    	if($this->form_validation->run())
    	{
			$this->db->select("long_url,count,id");
			$this->db->from('urls');
			$this->db->where("long_url =",$this->input->post('url'));
			$query = $this->db->get();			
			if($query->num_rows() < 1) {
			$url_details =array(
			'long_url' => $this->input->post('url'),
      		);
    		$this->db->insert('urls',$url_details );
			return str_replace('=','-', base64_encode($this->db->insert_id()));
			}
			return 1;
    	}
    }

	/*
	* get long url from short url
	* @param none
	* @return long url 
	*/
    function get_long_url($shorty='')
    {
    	$query=$this->db->get_where('urls', array('id'=> base64_decode(str_replace('-','=', $shorty))));		
		foreach($query->result_array() as $hitCount){			
			  
				$this->db->set('count',$hitCount['count']+1,false);
				$this->db->where('long_url',$hitCount['long_url']);
				$this->db->update('urls');
			
		}		
    	if($query->num_rows()>0)
    	{
			
    		foreach ($query->result() as $row)
			{
			    return $row->long_url;
			}
    	}
    	return '/error_404';
    }

 }
