<div class="wrapper col4">

</div>
<div class="wrapper col5">
  <div id="container">
    <div id="content_fullwidth">

      <h2>Bangladesh Map</h2>
     <p> </p>
      <div id="map">
          <?php showIndicator('Dhaka','Dhaka');?>
          <?php showIndicator('Khulna','Khulna');?>
          <?php showIndicator('Rajshahi','Rajshahi');?>
          <?php showIndicator('Rangpur','Rangpur');?>
          <?php showIndicator('Sylhet','Sylhet');?>
          <?php showIndicator('Barisal','Barisal');?>
          <?php showIndicator('Chittagong','Chittagong');?>
      </div>
    </div>

    <br class="clear" />
  </div>
</div>
<?php
function showIndicator($submitClass,$value)
{
   
    echo form_open('comparison');
    $data = array(
              'class'          => $submitClass
        );
    echo form_submit($data);
    echo form_hidden('division',$submitClass);
    echo form_close();
}
?>