<script type ="text/javascript">
function submitform()
{
    //document.forms["myform"].submit();
    //alert("HELLO");
var index = myForm.elements["division"].selectedIndex;
var division = myForm.elements["division"].options[index].value ;

var date = myForm.elements['date'].value;

var path_part1= "<?php echo base_url()."Forecast_img/";?>";
path_part1 += division;
path_part1 += "/";
path_part1 += division;

var path_part2 = (date.replace("/", "")).replace("/", "");
path_part2 += ".jpg";
var path_middle1 = "_day_1_";
var path_middle2 = "_day_2_";
var path_middle3 = "_day_3_";


document.getElementById('day1').src= path_part1 +  path_middle1 + path_part2;
document.getElementById('day2').src= path_part1 +  path_middle2 + path_part2;
document.getElementById('day3').src= path_part1 +  path_middle3 + path_part2;


document.getElementById('d1').src= path_part1 +  path_middle1 + path_part2;

var imgsrc = path_part1 +  path_middle1 + path_part2;
var img = new Image();

img.onerror = function (evt){
	this.src = "<?php echo base_url()."Forecast_img/";?>"+"default.JPG";
}


img.src = imgsrc;
//alert(date);
//alert(division.concat("/",division,"_day_1_") + (date.replace("/", "")).replace("/", ""));
//alert(path_part1 +  path_middle1 + path_part2 );
}

function ImgError(source){
  
}
</script>
<div class="wrapper col6">
  <div id="footer">
      <?php   echo validation_errors();?>
       <div id="welcome_msg">

	<?php

/*
<form id="myform" action="submit-form.php">
Search: <input type='text' name='query'>
<a href="javascript: submitform()">Submit</a>
</form>*/

 if(!isset($date))$date=date('m/d/Y');


echo form_open('',array('id' => 'myForm'));
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
<?php echo form_button('submit', 'Click Here To See Forecast' , 'onclick="submitform()"') ?>
<?php echo form_close() ?>



<p class="day1">
    <a class="fimg" id="d1" src="" href=""> <img id ="day1" src=""  onerror="ImgError(this);" width="200" height="200" alt="BLA" /> </a>
        Day 1
</p>


<p class="day2">
<a class="fimg"> <img id ="day2" src=""  onerror="ImgError(this);" width="200" height="200" /> </a>
        Day 2
</p>


<p class="day3">
<a class="fimg"> <img id ="day3" src=""  onerror="ImgError(this);" width="200" height="200" /> </a>
        Day 3
</p>



</div>
 <br class="clear" />
 </div>
