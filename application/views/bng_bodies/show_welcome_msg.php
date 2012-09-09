
<div class="wrapper col6">
  <div id="footer">
      <?php   echo validation_errors();?>
     <div id="welcome_msg">

      <h2><br/>মেসেজ</h2>
      
    <div id='chobi'>
    <?php if(isset($images)&&count($images)): foreach($images as $image): ?>
    <img src="<?php echo $image['thumb_url']; ?> " />
    <?php endforeach; endif;?>
    </div>
    <div id='porichoy'>
    
    <h1><?php echo $firstname." ".$lastname;?></h1>
    <p><?php echo $designation;?></p>
	</div>
   
    <div id='msg'>
    
    <p><?php echo $message;?></p>
    
    </div>

     
    </div>
   
   
   </div>

        <br class="clear" />

  </div>
</div>
