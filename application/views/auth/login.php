<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Header -->
<?php $this->load->view('templates/header');?>

        <div class="container">
        
            <h1>User Login</h1>
            <div id="infoMessage"><?php echo @$info;?></div>
        
            <form method="post" action="">
                <div class="form-group">
                    <label for="InputUsername">Username</label> 
                    <input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control" id="InputUsername" placeholder="Enter username" required>
                    <?php echo form_error('username'); ?> 
                </div>
                <div class="form-group">
                    <label for="InputPassword1">Password</label> 
                    <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password" required>
                    <?php echo form_error('password'); ?>
                </div>
                <div class="form-check">
                    <label class="form-check-label">Forgot password? <a href="/forgot-password">Retrieve</a> from here</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

<!-- Footer -->
<?php $this->load->view('templates/footer');?>

