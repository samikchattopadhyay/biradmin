<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Header -->
<?php $this->load->view('templates/header');?>

        <div class="container">
        
            <h1>Reset password</h1>
            <div id="infoMessage"><?php echo @$info;?></div>
        
            <form method="post" action="">
                <div class="form-group">
                    <label for="InputPassword1">New Password</label> 
                    <input type="password" name="new_password" value="<?php echo set_value('new_password'); ?>" class="form-control" id="InputPassword1" placeholder="New Password" required>
                    <?php echo form_error('new_password'); ?>
                </div>
                <div class="form-group">
                    <label for="InputPassword2">Confirm Password</label> 
                    <input type="password" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" class="form-control" id="InputPassword2" placeholder="Confirm Password" required>
                    <?php echo form_error('confirm_password'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

<!-- Footer -->
<?php $this->load->view('templates/footer');?>

