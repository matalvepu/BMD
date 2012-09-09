<div class="wrapper col6">
  <div id="footer">
      
       <div id="welcome_msg">

<?php
if(isset($wc) && $wc==TRUE)
{
    if($nf==TRUE)
    {
         //echo "NO IMAGE";
         noImage("WHOLE COUNTRY IMAGE");
    }
    else
        draw('day1',base_url().$path ,"TITLE WHOLE COUNTRY","WHOLECOUNTRY IMAGE");
}
else
{
    if(isset($nf) && $nf==TRUE)
    {
            noImage("Forecast");
    }
    else
    {
        draw('day1',base_url().$path1 ,"TITLE 1","Day1 Image");
        draw('day2',base_url().$path2 ,"TITLE 2","Day2 Image");
        draw('day3',base_url().$path3 ,"TITLE 3","Day3 Image");
    }
}

prevLink();
?>

<?php
function prevLink()
{
    echo "<p>Go back to <br/> ".anchor('forecast','Forecast')." </p>";
}
function noImage($str)
{
    echo "<p>$str not found</p>";
}
//$day == ID
function draw($day,$path,$title,$text)
{
    echo "<p class=\"$day\">";
    echo "<a class= \"group1\" href=\"$path\" title=\"$title\">";
    echo "<img id =\"$day\" src=\"$path\"  width=\"200\" height=\"200\"  /> </a>";
    echo "<br/>$text</p>";
}
?>

</div>
 <br class="clear" />
 </div>
