
<div class="wrapper col6">
  <div id="footer">
      <?php   echo validation_errors();?>
      
          <div id="welcome_msg">

      <h2><br/>Welcome Msg !</h2>

<?php  

if(!isset($firstname))$firstname=NULL;
if(!isset($lastname))$lastname=NULL;
if(!isset($designation))$designation=NULL;
if(!isset($message))$message=NULL;

echo form_open_multipart('adminArea/welcome_msg/insert_msg');

 

echo "নামের প্রথম অংশ(Firstname):";
echo form_input('firstname',set_value('firstname',$firstname));


echo "নামের শেষ অংশ(Lastname):";
echo form_input('lastname',set_value('lastname',$lastname)); 

echo  "পদবী(Designation):";
echo form_input('designation',set_value('designation',$designation)); 
echo "মেসেজঃ"; 
echo form_textarea('message',set_value('message',$message));
?>
<br/><br/><br/>
<b><?php echo "নতুন ছবি আপলোড করতে চাইলে নতুন করে ছবি সিলেক্ট করুন অন্যথায় ছবি সিলেক্ট করার প্রয়োজন নেই";
?></b>

<?php
echo form_upload('userfile');
echo form_submit('upload','Upload');
echo form_close();

?>
 </div>

        <br class="clear" />

  </div>
</div>

