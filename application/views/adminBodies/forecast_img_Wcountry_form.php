<div class="wrapper col6">
  <div id="footer">
      <?php   echo validation_errors();?>
       <div id="welcome_msg">
<?php echo form_open_multipart('adminArea/forecast_img_Wcountry_upload/uploadfile');  ?>

<p><?php  if(isset($msg)) echo $msg;  ?></p>
</br>

 <p>
	<?php
      echo form_label('Date', 'date');
     $data = array(
                  'name'        => 'date',
                  'id'          => 'datepicker',
                             );
    echo form_input($data,set_value('date'));
    ?>
</p> 
</br> 
<p>
    <?php echo form_label('Whole Country', 'wholecountry') ?>
    <?php echo form_upload('wholecountry') ?>
</p>
</br>
<p><?php echo form_submit('submit', 'Upload!') ?></p>
<?php form_close() ?>
</p>  
       
       
       
       </div>
</div>
 <br class="clear" />

</div>

       
       
       
       
       
       
       
       
       
       
       
       
       
       
       