<html>


<head>



<style>
body
{
background-color:#d0e4fe;
}
h1
{
color:orange;
text-align:center;
}
p
{
background:#ffffff;
font-family:"Times New Roman";
font-size:25px;
}
</style>

</head>
<body>
<?php

if($this->session->flashdata('alert_success'))
{

       echo $this->session->flashdata('alert_success');



}


?>
<p>
Hello fellows how r u doing guys?????/
</p>

<form id="dash" name="dash" action="/come1/logout" method="post"> 
<input type = "submit" id="logout" name="logout" value="sign-out">
  </form>

</body>
</html>
