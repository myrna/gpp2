<?php
function login_control()
	{
		if (!$this->ion_auth->logged_in())
		{
			//show link to login page
                    <p><a href="<?php echo site_url('auth/login'); ?>">Login</a> |
                    <a href="<?php echo site_url('auth/create_user'); ?>">Register</a></p>;
                    	}

		else
		{
                    //allow user to log out
			<p><?php echo anchor('logout', 'Logout'); ?></p>
		}
	}

?>
