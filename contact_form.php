<html>
   <head>
      <title>Contact Form</title>
      <style>
   body {
      background-image: linear-gradient(to right, #fddb92, #d1fdff);
   }

   form {
      width: 500px;
      margin: 50px auto;
      padding: 20px;
      border: 1px solid #ccc;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   }

   label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
   }

   input[type="text"],
   input[type="email"],
   input[type="tel"],
   textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      font-size: 16px;
   }

   input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      font-size: 16px;
      border: none;
      cursor: pointer;
   }

   input[type="submit"]:hover {
      background-color: #3e8e41;
   }

        form {
           width: 500px;
           margin: 50px auto;
           padding: 20px;
           border: 1px solid #ccc;
        }
     
        label {
           display: block;
           margin-bottom: 10px;
           font-weight: bold;
        }
     
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
           width: 100%;
           padding: 10px;
           margin-bottom: 20px;
           border: 1px solid #ccc;
           font-size: 16px;
        }
     
        input[type="submit"] {
           width: 100%;
           padding: 10px;
           background-color: #4CAF50;
           color: white;
           font-size: 16px;
           border: none;
           cursor: pointer;
        }
     
        input[type="submit"]:hover {
           background-color: #3e8e41;
        }
     </style>
     
   </head>
   <body>
      <?php include 'submit.php'?>
      <?php
      if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['token_response'])){
         $url='https://www.google.com/recaptcha/api/siteverify';
         $secret='6LdLUm0kAAAAAP5XBlWk_IInW2UFRxE5b9_ILuiN';
         $recaptcha_response= $_POST['token_response'];
         $request=file_get_contents($url.'?secret='.$secret.'&response= '.$recaptcha_response);
         $response=json_encode($request);
         if($response==true && $response>= 0.5){
            echo'<script language="javascript">';
            echo'alert("Thank you for submitting")';
            echo'</script>';
            echo"<script>setTimeout(\"location.href='contact_form.php';\",00);</script>";
         }else{
            echo'<script language="javascript">';
            echo'alert("Error")';
            echo'</script>';
            echo"<script>setTimeout(\"location.href='contact_form.php';\",00);</script>";

         }
      }
      ?>
      <form action="" method="post">
         <input type="hidden" id="token_response" name="token_response">
         <label for="first_name">First Name:</label>
         <input type="text" id="first_name" name="first_name" required>

         <label for="last_name">Last Name:</label>
         <input type="text" id="last_name" name="last_name" required>

         <label for="email">Email Address:</label>
         <input type="email" id="email" name="email" required>

         <label for="phone">Phone Number (With country code):</label>
         <input type="tel" id="phone" name="phone" required>

         <label for="gender">Gender:</label>
         <input type="radio" id="male" name="gender" value="male" required>Male
         <input type="radio" id="female" name="gender" value="female" required>Female<br><br>

         <label for="country">Country of Residence:</label>
         <select id="country" name="country" required>
            <option value="">Select a country</option>
            <option value="IN">India</option>
            <option value="AF">Afghanistan</option>
            <option value="US">America</option>
            <option value="PK">Pakistan</option>
            <option value="CN">China</option>
         </select><br><br>

         <label for="additional_info">Additional Information:</label>
         <textarea id="additional_info" name="additional_info"></textarea><br>

         <div class="g-recaptcha" data-sitekey="your-site-key"></div>
         <script src="https://www.google.com/recaptcha/api.js?render=6LdLUm0kAAAAAMUqrFOlmZByb10he00suVpnCR6L"></script>
         <script>
        grecaptcha.ready(function() {
          grecaptcha.execute('6LdLUm0kAAAAAMUqrFOlmZByb10he00suVpnCR6L', {action: 'submit'}).then(function(token) {
              // Add your logic to submit to your backend server here.
              var response=document.getElementById('token_response');
              response.value = token;
          });
        });
  </script>


         <input type="submit" value="Submit">
      </form>
   </body>
</html>
