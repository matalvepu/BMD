<div class="wrapper col6">
  <div id="footer">
      <?php   echo validation_errors();?>
          <div id="login">

      <h2><br/>Login !</h2>
       <?php
      
        
	echo form_open('adminArea/welcome/validate_credentials');
        echo '<fieldset><div class="fl_left">';
        echo "<label>User Id</label>";
	echo form_input('mail', '');
        echo "<label>Password</label>";
	echo form_password('pass', '');
        echo '</div>';
        echo '<div class="fl_right">';
        $attributes2 = array('name' =>'submit','value' => '>','id' => 'login_go');
	echo form_submit($attributes2);
        echo "</div></fieldset>";
	echo form_close();

	?>
     
    </div>

        <br class="clear" />

  </div>
</div>


