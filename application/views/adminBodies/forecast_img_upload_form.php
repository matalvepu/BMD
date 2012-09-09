<div class="wrapper col6">
  <div id="footer">
      <?php   echo validation_errors();?>
       <div id="welcome_msg">

      
<?php echo form_open_multipart('adminArea/forecast_img_upload/multiplefile');  ?>

<p><?php  if(isset($msg)) echo $msg;  ?></p>
</br>
<p>  
   
	<?php
  echo form_label('বিভাগ', 'division'); ?>
  </br>
  <?php $options = array(
                  'Dhaka'  => 'Dhaka',
                  'Chittagong'    => 'Chittagong',
                  'Barisal'   => 'Barisal',
                  'Khulna' => 'Khulna',
				  'Rajshahi'=>'Rajshahi',
				  'Rangpur'=>'Rangpur',
				  'Sylhet'=>'Sylhet'
                );
	echo form_dropdown('division', $options, 'Dhaka'); ?>
</p>    
    			
	</br></br>
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
    <?php echo form_label('Day 1', 'day1') ?>
    <?php echo form_upload('day1') ?>
</p>
<p>
    <?php echo form_label('Day 2', 'day2') ?>
    <?php echo form_upload('day2') ?>
</p>
<p>
    <?php echo form_label('Day 3', 'day3') ?>
    <?php echo form_upload('day3') ?>
</p>
</br>
<p><?php echo form_submit('submit', 'Upload them files!') ?></p>
<?php form_close() ?>

</div>
</div>
 <br class="clear" />

</div>
