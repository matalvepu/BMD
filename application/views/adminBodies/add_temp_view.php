<div class="wrapper col4">

</div>
<div class="wrapper col5">
  <div id="container">
    <div id="content">

      <h2>Upload Temperature (তাপমাত্রা আপলোড করুন)</h2>
      <p>গতকালের সর্বোচ্চ ও সর্বনিম্ন তাপমাত্রা আপলোড করতে তারিখ ও বিভাগ বাছুন এবং সর্বোচ্চ ও সর্বনিম্ন তাপমাত্রার ঘরগুলোতে তাপমত্রা প্রবেশ করুন। সবশেসে আপলোড বাটনটিতে ক্লিক করে ডাটা সেভ করুন</p>
      <?php echo form_open('adminArea/addTemp/submit',array('id' => 'myForm')); ?>
      <p> তারিখ: <input type="text" id="datepicker" size="30" name="date"/></p>
       <?php $options = array(
                  'Dhaka'  => 'ঢাকা',
                  'Chittagong'    => 'Chittagong',
                  'Barisal'   => 'Barisal',
                  'Khulna' => 'Khulna',
                  'Rajshahi'=>'Rajshahi',
                  'Rangpur'=>'Rangpur',
                  'Sylhet'=>'Sylhet'
                );
	echo "বিভাগ : ".form_dropdown('division', $options, 'Dhaka','id ="division" ');
        ?>
      <p> সর্বোচ্চ তাপমাত্রা : <input type="text" size="30" name="max"/></p>
      <p> সর্বনিম্ন তাপমাত্রা : <input type="text" size="30" name ="min"/></p>
      <?php
         echo '<br/>';
        echo form_submit('submit', 'আপলোড');
       
        echo form_close();
        ?>
      </div>
    </div>

    <br class="clear" />
  </div>
</div>
