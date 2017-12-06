<?php
  // get username
   $user = $_GET['u'];
?>
<html>
<head>
   <title>Chatbox</Title>
   <link rel="stylesheet" type="text/css" href="style.css">
   <script src="jquery-3.2.1.min.js"></script>
   <script>
              $(document).ready(function() {
                 $("#message").keyup(function(e){
                  console.log($("#message").val());
                   var name = $("#user").val();
                   var message = $("#message").val();
                   var keyVals = {name:name,message:message};
                  if(e.keyCode==13){
                    $.ajax({
                      type:'POST',
                      url:'insertMessage.php',
                      dataType: 'json',
                      data:keyVals,
                      success: function(data){
                        $("#message").val(""); 
                      },
                      error: function(data){
                        console.log("This is a failure");
                      }
                    }); 
                  }   
                });

                setInterval(function(){
                  $.ajax({
                      type:'POST',
                      url:'displayMessages.php',
                      success: function(data){
                        document.getElementById("messages_holder").innerHTML = data;     
                      },
                      error: function(data){
                        console.log("This is a failure");
                      }
                    });
                },1000);  

              });
            </script>
</head>
<body>

   <div class='chatContainer'>
     <div class='chatHeader'>
       <h3>welcome <?php echo ucwords($user); ?></h3>
      </div>
          <div class='chatmessages' id="messages_holder">
            
          </div>
          <div class='chatbottom'>
             
              <center>
             <input type='hidden' id='user' value='<?php echo $user; ?>' />
             <input type='text' id='message' value='' placeholder='type your message' />
             </center> 
		<p align="right" color="red">  
</p>
            
           </div>
<FORM METHOD="post" action="chat.php?u=<?php echo $user;?>" ENCTYPE="multipart/form-data">
<input type="hidden" value="<?php echo $user;?>"/> 
Attach: <INPUT TYPE="file" NAME="doc" MAXLENGTH=50 ALLOW="text/*" > 
<input type="submit" name="upload" value="Upload">
</FORM>
<?php
if(isset($_POST['upload'])){
  $con = mysqli_connect("localhost","root","","chatapp");
  if(mysqli_connect_errno())
  {
    die('Could not connect to database');
  }else{
    $file = "docs/".basename($_FILES['doc']['name']);
    $upload = 1;
    if (file_exists($file)) {
        echo "Sorry, file already exists.";
        $upload = 0;
    }
    if ($_FILES["doc"]["size"] > 13000000) {
        echo "Sorry, your file is too large.";
        $upload = 0;
    }
    if($upload==1){
      if (move_uploaded_file($_FILES["doc"]["tmp_name"], $file)) {

          $path = "File Uploaded: <a href=\'$file\'>Click Here</a>";
          $sql = "INSERT INTO messages (name,body) VALUES ('$user','$path')";
          $query = mysqli_query($con,$sql);
          if(!$query){
              echo 'Query Error: '.mysqli_error($con);
          }
      } else {
          echo "<font size='1' color='#878787'>Sorry, there was an error uploading your file.</font>";
      }
    }
  }
}
?>
</div>  
</body>
</html>
     
   

  