<div class="wrapper col3">
  <div id="intro">
    <div class="fl_left">
      <div id='linkchobi'>
        <?php if(isset($images)&&count($images)): foreach($images as $image): ?>
        <img src="<?php echo $image['thumb_url']; ?> " />
        <?php endforeach; endif;?>
      </div>
      <div id='linkporichoy'>
      <h1><?php echo $firstname." ".$lastname;?></h1>
      <h1><?php echo $designation;?></h1>
      </div>
      <div id='linkmsg'>
      <p><?php echo substr($message,0,690).".....";?></p>
      <p class="readmore"><a href="<?php echo base_url()."index.php/adminArea/welcome_msg/show_welcomemsg"?>">বিস্তারিত &raquo;</a></p>
      </div>
      
      
      
    </div>
    <div class="fl_right" id="fadeshow1"></div>
    <br class="clear" />
  </div>
</div>
<div class="wrapper col4">
  
</div>
<div class="wrapper col5">
  <div id="container">
    <div id="content">
		<h1>বাংলাদেশের কৃষি আবহাওয়া তথ্য সার্ভিস<h1>
		<p>বাংলাদেশের কৃষি আবহাওয়া তথ্য সার্ভিসের বাংলা সাইটে আপনাদের শুভেচ্ছা ও স্বাগতম</p>
    </div>
    
    <br class="clear" />
  </div>
</div>
