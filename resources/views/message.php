<html>
   <head>
      <title>Ajax Example</title>
      <meta name="crsf_token" content="{{ csrf_token() }}" />
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
      </script>
      
      <script>
         function getMessage() {
            $.ajax({
               type:'POST',
               url:'/getmsg',
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                  $("#msg").html(data.msg);
               }
            });
         }
      </script>
   </head>
   
   <body>
      <div id = 'msg'>This message will be replaced using Ajax. 
         Click the button to replace the message.</div>
      <?php
         //echo Form::button('Replace Message',['onClick'=>'getMessage()']);

         echo "<button onclick='getMessage()'>sdfsdf</button>";
      ?>
   </body>

</html>