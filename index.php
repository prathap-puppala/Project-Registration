<?php
session_start();
@include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Project Registration</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/message_default.css" type="text/css" />
<script src="js/Jquery.js"></script>
<script src="js/plus950.js"></script>
<script src="js/message.js"></script>
</head>

<body class="login">
<!-- header starts here -->
<div id="cse-Bar">
  <div id="cse-Frame">
    <div id="logo"> <a href="">CSIIITN</a> </div>
    
         
        <div id="header-main-right">
          <div id="header-main-nav" style="margin-top:20px;">
 <h4 style="color:#fff;">     <?php 
      if(isset($_SESSION["userid"])){echo "Welcome ".$_SESSION['userid']. ", <a style='text-decoration:none;color:yellow;' href='logout.php'>Logout</a>";}else{echo "Welcome Guest";} 
      ?></h4>
              </div>
          </div>
      </div>
</div>
<!-- header ends here -->
<div id="loadi">
<div class="loginbox radius">
<h2 style="color:#141823; text-align:center;">Welcome to Project Registration</h2>
	<div class="loginboxinner radius">
    	<div class="loginheader">
    		
    	</div><!--loginheader-->
        
        <div class="loginform">
			
                	<?php if(!isset($_SESSION["userid"])){ ?>
                	<br>
                <h4 class="title" style="color:red;">Please Login to Continue</h5>
        	<form id="login" method="post">
				<table border="0">
			<tr><td style="padding-left:50px;">
                 <p style="font-size:14px;" class="title">University ID</p></td><td>&nbsp;</td><td> <input type="text" id="uid" maxlength="7" class="radius mini" />
            </td></tr>
        	<tr><td  style="padding-left:50px;">
                 <p style="font-size:14px;" class="title">Password</p></td><td>&nbsp;</td><td> <input type="password" id="passwd"   class="radius mini" />
            </td></tr>
        <tr><td>&nbsp;</td><td colspan="3"><p>
                	<a class="button" class="radius title" onclick="login()" name="client_login" style="width:180px;padding:7px;">Sign in</a>
                </p>
                </td></tr>
                
                </table>
            </form>
            <?php } 
            else
            {
			?>
			<table id="customers">
				<th>Area</th><th>Status</th>
			<?php
			$que=mysql_query("SELECT * FROM submits WHERE stuid='".mysql_real_escape_string($_SESSION['userid'])."'");
			if(mysql_num_rows($que)>=1)
			{
			$fe=mysql_fetch_array(mysql_query("SELECT * FROM submits WHERE stuid='".mysql_real_escape_string($_SESSION['userid'])."'"));
			echo "<tr><td>".$fe['area']."</td><td>";
			?>
			<a class='my-button medium orange' style='cursor:pointer;text-decoration:none;' onclick='dhtmlx.alert({type:"alert-error", title:"PROJECT REGISTRATION", text:"Already Submitted"})'>Submitted</a>
			<?php
			echo "</td></tr>";
			}
			else
			{
			?>
			<tr><td>
			<?php
		$que=mysql_query("SELECT DISTINCT sno,area FROM areas");
		echo "<select id='facval' onchange='shwfac(this.value)' style='width:100%;padding:7px;'>";
		while($q=mysql_fetch_array($que))
		{
		echo "<option value='".$q['sno']."'>".$q['area']."</option>";	
		}
		echo "</select><span id='fac'></span>";	
			?>
			</td>
		<?php
		echo "<td  id='".$q['sno']."' class='sb'><a class='my-button medium green' style='cursor:pointer;text-decoration:none;' onclick=sub()>Submit</a></td></tr>";	
	
	?>
		</tr>
			<?php
		}
		?>
			</table>
			<?php	
			}
            ?>
            
        </div><!--loginform-->
    </div><!--loginboxinner-->
</div><!--loginbox-->



</div>


<p style="font-size:12px;">
  <center><br>
    <a href="javascript:void(0);" style="text-decoration:none;">Prathap Puppala,N130950</a>
  </center>
</p>

</body>

</html>
