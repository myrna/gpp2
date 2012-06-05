<?php

/**
 * Contact GPP
 * @subpackage	Controllers
 * @category		Controllers
 
 */

class Donate extends CI_Controller
{

	public function index()

	{
            $this->template->set('thispage','Donate');
            $this->template->set('title','Donate | Great Plant Picks');
            $this->template->load('template','donate');
	}
        
        function download($file)

        {
            $this->load->helper('download');

            $file_name='GPP_donation_form.pdf';
             $file_path=realpath(APPPATH . '../downloads/'.$file_name);

                header('Content-Description: File Transfer');
                header('Content-Type: image/png');
                header('Content-Disposition: attachment; filename='.$file_name);
                header('Content-Transfer-Encoding: base64');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file_path));
                ob_clean();
                flush();
                readfile($file_path);
                exit;

            redirect("donate/");
        }

        function download_menu($file)

        {
            $this->load->helper('download');

            $file_name='Sunset_Dinner_Menu.pdf';
             $file_path=realpath(APPPATH . '../downloads/'.$file_name);

                header('Content-Description: File Transfer');
                header('Content-Type: image/png');
                header('Content-Disposition: attachment; filename='.$file_name);
                header('Content-Transfer-Encoding: base64');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file_path));
                ob_clean();
                flush();
                readfile($file_path);
                exit;

            redirect("donate/");
        }
        
        public function thankyou()

        {
            $this->template->set('thispage','Thank You');
            $this->template->set('title','Thank You for Your Contribution | Great Plant Picks');
            $this->template->load('template','donate/thankyou');
        }

}

/* End of file donate.php */
/* Location: ./application/controllers/donate.php */