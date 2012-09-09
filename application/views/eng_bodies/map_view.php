<div class="wrapper col4">

</div>
<div class="wrapper col5">
  <div id="container">
    <div id="content_fullwidth">

      <h2>Bangladesh Map</h2>
     <p> </p>
      <div id="map">
          <?php showIndicator('EDhaka','Dhaka');?>
          <?php showIndicator('EKhulna','Khulna');?>
          <?php showIndicator('ERajshahi','Rajshahi');?>
          <?php showIndicator('ERangpur','Rangpur');?>
          <?php showIndicator('ESylhet','Sylhet');?>
          <?php showIndicator('EBarisal','Barisal');?>
          <?php showIndicator('EChittagong','Chittagong');?>
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
    echo form_hidden('division',$value);
    echo form_close();
}
?>