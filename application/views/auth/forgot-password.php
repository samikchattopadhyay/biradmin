<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Header -->
<?php $this->load->view('templates/header');?>

        <div class="container">
        
            <h1>Forgot password</h1>
            <div id="infoMessage"><?php echo @$info;?></div>
        
            <form method="post" action="">
                <div class="form-group">
                    <label for="InputEmail">Email</label> 
                    <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" id="InputEmail" placeholder="Enter email" required>
                    <?php echo form_error('email'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

<!-- Footer -->
<?php $this->load->view('templates/footer');?>