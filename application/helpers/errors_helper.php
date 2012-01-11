<?php
// make sure the function doesn't already exist
// You don’t want to mistakenly override an existing function
if ( ! function_exists('error_404'))
{
	function page_not_found()
	{

		// get instance of CI, so can use the CI library
		$CI =& get_instance();

		// ensure 404 header is set
		// otherwise the browser will not see it as a 404 page
		header("HTTP/1.1 404 Not Found");

		// load the view
		$this->template->set('thispage','Page Not Found');
                $this->template->set('title','Page Not Found | Great Plant Picks');
                $this->template->load('template','errors/error_404');
	}
}