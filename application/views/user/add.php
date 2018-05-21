<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Header -->
<?php $this->load->view('templates/header');?>

        <div class="container">

			<div class="row">
				<div class="col"><h1>Manage Users</h1></div>
			</div>
			
        	<div class="row">
        		<?php $this->load->view('templates/sidebar');?>
        		<div class="col col-md-10">
        			<form method="post" action="">
        				<div class="form-group">
        					<label for="InputEmail">Email</label> 
        					<input type="text" value="<?php echo set_value('email'); ?>"
        						name="email" class="form-control" id="InputEmail"
        						placeholder="Email" required>
                            <?php echo form_error('email'); ?>
                        </div>
                        <div class="form-group">
        					<label for="InputFullname">Full Name</label> 
        					<input type="text" value="<?php echo set_value('fullname'); ?>"
        						name="fullname" class="form-control" id="InputFullname"
        						placeholder="Full name" required>
                            <?php echo form_error('fullname'); ?>
                        </div>
        				<div class="form-group">
        					<label for="InputUsername">Username</label> 
        					<input type="text"
        						name="username" value="<?php echo set_value('username'); ?>"
        						class="form-control" id="InputUsername"
        						placeholder="Username" required>
                            <?php echo form_error('username'); ?> 
                        </div>
        				<div class="form-group">
        					<label for="InputPassword">Password</label> 
        					<input type="text" value="<?php echo set_value('password'); ?>"
        						name="password" class="form-control" id="InputPassword"
        						placeholder="Password" required>
                            <?php echo form_error('password'); ?>
                        </div>
                        <div class="form-group">
        					<label for="InputRole">Role</label>
        					<select name="role" id="InputRole" class="form-control" required>
        						<option value="user" <?php echo set_value('role') == 'user' ? 'selected' : ''?>>User</option>
        						<option value="admin" <?php echo set_value('role') == 'admin' ? 'selected' : ''?>>Admin</option>
        					</select>
                            <?php echo form_error('role'); ?>
                        </div>
                        <div class="form-group">
        					<label for="InputStatus">Status</label>
        					<select name="status" id="InputStatus" class="form-control" required>
        						<option value="INACTIVE" <?php echo set_value('status') == 'inactive' ? 'selected' : ''?>>Inactive</option>
        						<option value="ACTIVE" <?php echo set_value('status') == 'active' ? 'selected' : ''?>>Active</option>
        					</select>
                            <?php echo form_error('status'); ?>
                        </div>
                        
        				<button type="submit" class="btn btn-primary">Submit</button>
        			</form>
        		</div>
        	</div>
        	
		</div>

<!-- Footer -->
<?php $this->load->view('templates/footer');?>

