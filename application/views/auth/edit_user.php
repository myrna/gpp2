<div id="content" class="admin">
<div id="register_form" class="register">

	<h2>Edit User</h2>
	<p>Please enter information below.</p>

	<div id="infoMessage"><?php echo $message;?></div>
<!-- following will be moved to a model where it belongs :) -->
     <?php
        $this->db->select('email');
        $this->db->where('id', $this->uri->segment(3));
        $query1 = $this->db->get('users');
        foreach($query1->result() as $row)
        {
            $email = $row->email;
        }

        $this->db->select();
        $this->db->where('id', $this->uri->segment(3));
        $query2 = $this->db->get('meta');
        foreach($query2->result() as $row)
        {
            $firstName = $row->first_name;
            $lastName = $row->last_name;
            $company = $row->company;
            $phone1 = $row->phone1;
            $phone1 = $row->phone2;
            $phone1 = $row->phone3;
        }

     ?>
	
    <?php echo form_open("auth/edit_user/".$this->uri->segment(3));?>
      <p>First Name:<br />
      <?php echo form_input($firstName);?>
      </p>
      
      <p>Last Name:<br />
      <?php echo form_input($lastName);?>
      </p>
      
      <p>Company Name:<br />
      <?php echo form_input($company);?>
      </p>
      
      <p>Email:<br />
      <?php echo form_input($email);?>
      </p>
      
      <p>Phone:<br />
      <?php echo form_input($phone1);?>-<?php echo form_input($phone2);?>-<?php echo form_input($phone3);?>
      </p>
      
      <p>
      	<input type=checkbox name="reset_password"> <label for="reset_password">Reset Password</label>
      </p>
      
      <?php echo form_hidden('id', $this->uri->segment(3)); ?>
      <p><?php echo form_submit('submit', 'Update');?></p>

      
    <?php echo form_close();?>

</div>
</div>
