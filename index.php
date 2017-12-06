<html>
<head>
   <title>Chatbox</Title>
   <link rel="stylesheet" type="text/css" href="style.css">
   <script src="code.jquery.com/jquery-1.11.0.min.js"></script>
   <script src="javascript/CHAT.js"></script>
     
</head>
<body>

   <div class='chatContainer'>
     <div class='chatHeader'>
       <h3>Please enter your name!</h3>
      </div>
          <div class='chatbottom'>
             <form action='chat.php' method="get">
              <center>
             <input type='text' name='u' placeholder='Enter your name here' required />
             </center> 
		<p align="right" color="red">  
             <input type='submit' name='submit' value='Ok!'/>
</p>
            </form>
           </div>
</div>  
</body>
</html>
     
   

  