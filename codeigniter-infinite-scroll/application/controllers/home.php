<?php

	class HOME extends CI_Controller
	{



		function index()
		{

			$this->load->view('home');

		}

		function send_firstData()
		{
			if ($this->input->get('getPage') == "1")
			{
				$array= array();
				for ($i=0; $i <40 ; $i++) { 
					$array[$i]= $i .". data is : $i";
				
				}
				echo  json_encode($array,JSON_UNESCAPED_UNICODE);
			}
			
		}
		function sendData()
		{
			if ($this->input->get('getPageNumber') > 1)
			{
				if ($this->input->get('getPageNumber') <20) {
					for ($i = 0; $i < 5 ; $i++) { 
					$array[$i]= "new data!!!";
				
				}
				echo  json_encode($array,JSON_UNESCAPED_UNICODE);
				}
				else echo "end!!!";
				
				
			}

		}


	}

?>