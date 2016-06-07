
<!DOCTYPE html>
<html>
<head>
	<link rel = "stylesheet" type = "text/css" 
   href = "<?php echo base_url(); ?>css/style.css">
	
	<link rel = "stylesheet" type = "text/css" 
         href = "<?php echo base_url(); ?>css/style.css"> 

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/menu_dropdown_1.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	
    <script type = 'text/javascript' src = "<?php echo base_url(); 
         ?>js/map.js"></script> 

	<script type="text/javascript" src="<?php echo base_url(); 
         ?>js/focus_menu.js"></script>

	<script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>

	<title>Home Page</title>
</head>
<body>
	<div id="header"><a href="welcome"><img id="logoHome" src="<?php echo base_url(); ?>imagini/recomap.png" alt="RecoMap"></a>
		<a class="ghost-button" href="<?php echo site_url('login') ?>">Log In</a>

 	    <!-- <a class="ghost-button" href="log_out.php">Sign out</a> -->
		<div class="dropdown">
		  <button class="dropbtn">Menu</button>
		  <div class="dropdown-content">
		  	<a href="resurse">Manager resurse</a>
		  	
		  	<a href="admin/personale">Personale</a>
		  	<a href="admin/favorite">Favourite Locations</a>
		  	
		    <!-- <a href="adauga_locatie.html">Add Location</a> -->
		    <a href="admin/add_personalres">Add Location</a>
		    
		 <!--    <a href="search.html">Search</a>
		    <a href="choose.html">Choose category</a>
		    <a href="detalii.html">Show added locations</a>
		    <a href="traseu.html">Show route</a> -->
		  </div>
		</div>
	</div>
    <div id="map"></div>

	<div id="map"></div>
</body>
</html>