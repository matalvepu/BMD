<div class="wrapper col6">
  <div id="footer">
      <?php   echo validation_errors();
   //   if(isset($msg)) echo "<br/>".$msg;?>
       <div id="welcome_msg">
	<?php



 if(!isset($date))$date=date('m/d/Y');


echo form_open('forecast/submit',array('id' => 'myForm'));
  echo form_label('Region', 'division'); ?>
           &nbsp;
  <?php $options = array(
                  'WholeCountry' => 'Whole Country',
                  'Dhaka'  => 'Dhaka',
                  'Chittagong'    => 'Chittagong',
                  'Barisal'   => 'Barisal',
                  'Khulna' => 'Khulna',
                  'Rajshahi'=>'Rajshahi',
                  'Rangpur'=>'Rangpur',
                  'Sylhet'=>'Sylhet'
                );
	echo form_dropdown('division', $options, 'WholeCountry','id ="division" '); ?>
           <br/>
           <br/>
<?php
  echo form_label('Date (Month/Date/Year) ', 'date');
 $data = array(
              'name'        => 'date',
              'id'          => 'datepicker',
                         );
echo form_input($data,$date);
?>
           <br/>
<?php echo form_submit('submit', 'Click Here To See Forecast') ?>
<?php echo form_close() ?>

</div>
 <br class="clear" />
 </div>
