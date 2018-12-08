<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shorturl extends CI_Controller {
	/*
     * ======================================================================================================
     * Shorten Controller :
     * ======================================================================================================
     * This controller controls URL shorten related operations.
     * 
     * Functions in this controller are :
     * 1. constructor
     * 2. index
     * 3. get_shorty
	 * 4. error_404
	 *
	 * ======================================================================================================
     * Function Name : 
     * __constrct ()
     * 
     * Function Description : 
     * > This function creates a constructor for Shorten controller.
     * 
     * @params : 
     * none
     * =======================================================================================================
     */
		public function __construct()
	 {
	  parent::__construct();
	  $this->load->model('short_url_model');//load the model which deals with data for short URLs
	 } 
	 
   /* =======================================================================================================
   * Function Name : 
   * index()
   * 
   * Function Description : 
   * > called by default
   * > Display list of short URL if exist. 
   * 
   * @params : 
   * none
   * ======================================================================================================
   */
    public function index()
    {

        $data=array(); //data to be sent to the view‚

        if($this->input->post('url'))//did the user post a URL to be shorten?
        {
            $frequent_used_url=$this->short_url_model->frequent_used_url();//store the URL and get back the shorten URL
            $short_url=$this->short_url_model->store_long_url();//store the URL and get back the shorten URL
			if($frequent_used_url)
			{
				$data['frequent'] =  $frequent_used_url;
			}
			
            if($short_url)
            {
                $data['short_url']=$short_url;
            }
            else //there was an error
            {
                $data['error']=validation_errors();

            }
        }else{
			$frequent_used_url=$this->short_url_model->frequent_used_url();
			if($frequent_used_url)
			{
				$data['frequent'] =  $frequent_used_url;
			}
		}

       	$this->load->view('templates/header', $data);//load the header template
        $this->load->view('display_short_url', $data);//load the single view display_short_url and send any data to it
	$this->load->view('templates/footer', $data);//load the footer template
    }

   /* =======================================================================================================
   * Function Name : 
   * get_shorty()
   * 
   * Function Description : 
   * > This function is called by the routes file using the 404_override‚
   * > direct the user to the long URL.
   * 
   * @params : 
   * none
   * ======================================================================================================
   */
    public function get_shorty()
    {
        $shorty=$this->uri->segment(1);//get the segment the user requested;
        redirect($this->short_url_model->get_long_url($shorty));//direct the user to the long URL 
    }

	/* =======================================================================================================
	* Function Name : 
	* error_404()
	* 
	* Function Description : 
	* > A little error for when users enter an invalid short URL
	* > direct the user to the long URL.
	* 
	* @params : 
	* none
	* ======================================================================================================
	*/
    public function error_404()
    {
        $data['error']='Whoops cannot find that URL!';
        $this->load->view('get_url', $data);
    }

}
