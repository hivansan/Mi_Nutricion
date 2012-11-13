<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <?php 
    	$base_url= "http://localhost/integrate/application/views/templates/";
    ?>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?=$base_url?>css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?=$base_url?>css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?=$base_url?>css/layout.css" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Adamina' rel='stylesheet' type='text/css'>
    <script src="<?=$base_url?>js/jquery-1.6.3.min.js" type="text/javascript"></script>
    <script src="<?=$base_url?>js/cufon-yui.js" type="text/javascript"></script>
    <script src="<?=$base_url?>js/cufon-replace.js" type="text/javascript"></script>
    <script src="<?=$base_url?>js/Lobster_13_400.font.js" type="text/javascript"></script>
    <script src="<?=$base_url?>js/NewsGoth_BT_400.font.js" type="text/javascript"></script>
    <script src="<?=$base_url?>js/FF-cash.js" type="text/javascript"></script>
    <script src="<?=$base_url?>js/easyTooltip.js" type="text/javascript"></script>
	<script src="<?=$base_url?>js/script.js" type="text/javascript"></script>
    <script src="<?=$base_url?>js/bgSlider.js" type="text/javascript"></script>
    <script src="<?=$base_url?>js/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="<?=$base_url?>js/tms-0.3.js" type="text/javascript"></script>
    <script src="<?=$base_url?>js/tms_presets.js" type="text/javascript"></script>
	<!--[if lt IE 7]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
        	<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
	<![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
        <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
	<![endif]-->
</head>
<body id="page1">
	<div id="bgSlider"></div>
    <div class="bg_spinner"></div>
	<div class="extra">
        <!--==============================header=================================-->
        <header>
        	<div class="top-row">
            	<div class="main">
                	<div class="wrapper">
                        <h1><a href="index.html">mi</a></h1>
                        <ul class="pagination">
                            <li class="current"><a href="<?=$base_url?>images/bg-img1.jpg">1</a></li>
                            <li><a href="<?=$base_url?>images/bg-img2.jpg">2</a></li>
                            <li><a href="<?=$base_url?>images/bg-img3.jpg">3</a></li>
                        </ul>
                        <strong class="bg-text">Background:</strong>
                    </div>
        <!--==============================Form login=================================-->
        			
	                <?php
	                
	                	/*
						 * all_userdata()
						 *  - array -> user_data(id, username, permissions)
						 *  - session_id
						 *  - ip_address
						 *  - user_agent
						 *  - last_activity
						 *  - login_state
						 * 
						 * */
						if (isset($data)){
							if(isset($data['login_state'])){
			                	if ($data['login_state'] == FALSE){ //usuario está deslogeado
				                	echo form_open('users/verifylogin'); 
									echo validation_errors();
									
									echo " 
										<label for=\"username\">Username</label> 
										<input type=\"input\" name=\"username\" />
									
										<label for=\"password\">Password</label>
										<input type=\"password\" name=\"password\" />
										
										<input type=\"submit\" name=\"submit\" value=\"Login\" /> 
									
										</form>
									";
	                	
	                		
	                	
	                ?>
								<!-- <label for="username">Username</label> 
								<input type="input" name="username" />
							
								<label for="password">Password</label>
								<input type="password" name="password" />
								
								<input type="submit" name="submit" value="Login" /> 
							
								</form> -->
					
					<?php 
								} else { //usuario está loggeado
									echo $data['user_data']['username'];
								}
							} else {
								echo form_open('users/verifylogin'); 
								echo validation_errors();
								echo " 
									<label for=\"username\">Username</label> 
									<input type=\"input\" name=\"username\" />
								
									<label for=\"password\">Password</label>
									<input type=\"password\" name=\"password\" />
									
									<input type=\"submit\" name=\"submit\" value=\"Login\" /> 
								
									</form>
								";
					?>
								<!--<label for="username">Username</label> 
								<input type="input" name="username" />
							
								<label for="password">Password</label>
								<input type="password" name="password" />
								
								<input type="submit" name="submit" value="Login" /> 
							
								</form>-->
								
					<?php
							}
						}
					?>
        <!--==============================end login=================================-->            
                </div>
            </div>
            <div class="menu-row">
            	<div class="menu-border">
                	<div class="main">
                        <nav>
                            <ul class="menu">
                                <li><a href="index.html">Inicio</a></li>
                                <li><a href="http://localhost/integrate/index.php/pages/view/actividades">FASES</a></li>
                                <li><a href="http://localhost/integrate/index.php/pages/view/proyecto">Proyecto</a></li>
                                <li><a href="http://localhost/integrate/index.php/pages/view/integrantes">Integrantes</a></li>
                                <?php
                                if (isset($data)){
                                	if(isset($data['login_state'])){
		                				if ($data['login_state'] == TRUE){
		                		?>
                                <li><a href="http://localhost/integrate/index.php/users/logout">Logout</a></li>
								<?php
										}
									}
								}
								?>	
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
			<div class="ic"></div>
        </header>

