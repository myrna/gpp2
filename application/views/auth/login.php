<div id="content" class="admin">
<div id="login_form">
    <h2>Administrative Login</h2>
    
	<p>Please log in with your email address and password below.</p>
	
	<div id="infoMessage"><?php echo $message;?></div>
	
    <?php echo form_open("auth/login");
    	
    echo form_label('Email:', 'email', array('class' => 'strong'));
    echo form_input(array('email' => 'email', 'tabindex' => '2', 'id' => 'email', 'title' => 'Please enter your email address'), 'email',
            'onClick="this.value=\'\'"; onblur="this.value=!this.value?\'email\':this.value;"');
    echo '</p><p>';
    echo form_label('Password:', 'password', array('class' => 'strong'));
    echo form_password(array('name' => 'password', 'tabindex' => '2', 'id' => 'Password', 'title' => 'Please enter your Password'), 'Password',
            'onClick="this.value=\'\'"; onblur="this.value=!this.value?\'Password\':this.value;"');
    echo '</p>';
     echo "<span class='formcheck'>"; ?>
     <label for="remember">Remember Me:</label>
     <?php echo form_checkbox('remember', '1', TRUE);
        echo "</span>";
    echo form_submit('submit', 'Login');
    echo form_close();   ?>

      <p class="note"><a href="/auth/forgot_password">Reset Password</a></p>
</div><!-- end form -->
</div><!-- end content -->
