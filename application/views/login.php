<html>
<head>
 </head>



<body bgcolor="orange">
       <div id="wrapper">
              <h2>Register Now </h2>
              
              <div id="form-container">
                     <form id="register" name="register" action="come1/index" method="post">
                           


                                    <div class="row">
                                   <label for="firstname" >firstname &rarr;</label>
                                   <input type="text" id="firstname" name="firstname" class="reg-input tiny" autocomplete="off" tabindex="1">
                                   
                            </div>
</br>
                             <div class="row">
                                   <label for="lastname">lastname &rarr;</label>
                                   <input type="text" id="lastname" name="lastname" class="reg-input tiny" autocomplete="off" tabindex="1">
                                   </br>
                            </div>
 </br>


                            <div class="row">
                                   <label for="username">Username &rarr;</label>
                                   <input type="text" id="username" name="username" class="reg-input tiny" autocomplete="off" tabindex="1">
                                   <div class="note"><span id="note-username">Minimum of 3 characters to a max of 20.</span></div>
                            </div>
                           

                            </br>
                            <div class="row">
                                   <label for="email">E-mail Address &rarr;</label>
                                   <input type="email" id="email" name="email" class="reg-input" autocomplete="off" tabindex="2">
                                   <div class="note"><span id="note-email">Share a working e-mail address where we may contact you.</span></div>
                            </div>
                             </br>
                           
                            
                            <div class="row">
                                   <label for="password">Choose a Password &rarr;</label>
                                   <input type="password" id="password" name="password" class="reg-input tiny" autocomplete="off" tabindex="4">
                                   <div class="note"><span id="note-password">Make sure you'll remember it! Should be at least 6 chars long.</span></div>
                            </div>
                             </br>
                                                       
                            <input type="submit" value="Sign Up!" name="submit" id="submit" class="sub-btn" tabindex="10">
                     </form>
              </div>
       </div>

</body>
</html>