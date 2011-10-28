<?php

/**
 * About GPP
 * @subpackage	Controllers
 * @category		Controllers
 
 */

class Press extends CI_Controller
{

	public function index()

	{
            $this->template->set('thispage','Press');
            $this->template->set('title','Press | Great Plant Picks');
            $this->template->load('template','press');
	}

        public function news()

	{
            $this->template->set('thispage','In The News');
            $this->template->set('title','In The News | Great Plant Picks');
            $this->template->load('template','press/news');
	}

        public function media()

	{
            $this->template->set('thispage','Media Contacts');
            $this->template->set('title','Media Contacts | Great Plant Picks');
            $this->template->load('template','press/media');
	}

        public function terms()

	{
            
            $this->template->set('thispage','Terms of Use');
            $this->template->set('title','Terms of Use | Great Plant Picks');
            $this->template->load('template','press/terms');
	}

        function download($file)

        {
            $this->load->helper('download');

            $file_name='gpp-logo-bw.png';
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

            redirect("press/terms/");
        }

        function download_color($file)

        {
            $this->load->helper('download');

            $file_name='gpp-logo-green-white.jpg';
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

            redirect("press/terms/");
        }
        
}

/* End of file press.php */
/* Location: ./application/controllers/press.php */