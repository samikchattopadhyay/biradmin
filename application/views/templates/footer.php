<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
        
        <!-- JavaScript files-->
        <?php 
        if (isset($js) && count($js)) {
            assets('js', $js);
        }
        ?>
    </body>
</html>