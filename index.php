<!doctype html>
<html class="no-js" lang="" ng-app="mainApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
		<link rel="icon" href="favicon.ico">
        <link rel="stylesheet" href="css/Components/bootstrap.min.css">
		<link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">


        <link href="components/slider/slick/slick-carousel/slick/slick.css" rel="stylesheet" />	
        <link href="components/slider/slick/slick-carousel/slick/slick-theme.css" rel="stylesheet" />	
        
        <link href="components/SocialSideBar/css/social.css" rel="stylesheet" />	
        
        <script src="js/components/modernizr-2.8.3.min.js"></script>
    </head>
    <body class="pagebg">

		<!--whole page directive-->
       <div id="wrap">
 			<wrapper-Main></wrapper-Main>
		</div>
            
        <script src="js/components/angular.min.js"></script>
        <script src="js/components/jquery-1.11.2.min.js"></script>
        <script src="js/components/angular-route.min.js"></script>
        <script src="js/components/angular-animate.min.js"></script>       
        <script src="js/components/bootstrap.min.js"></script>
        <!--boilerplate part-->
        <script src="js/plugins.js"></script>

		<!--other components-->
		<script src="components/slider/slick/slick-carousel/slick/slick.min.js"></script>
		<script src="components/slider/slick/angular-slick/dist/slick.min.js"></script>

		<script src="components/SocialSideBar/js/socialbars.js"></script>
		
		<!-- meine API (für php) -->
		<!-- <script src="js/APIadapter.js"></script> -->
		
        <!--ANGULAR: main app file-->
        <script src="js/apps/mainapp.js"></script>
        <!--routes-->
 		<script src="js/apps/routes.js"></script>
        <!--pages-->
        <script src="templates/pages/theband/thebandcontroller.js"></script>      
		<script src="templates/pages/home/homecontroller.js"></script>      	
		<!--footer-->
		<script src="templates/footer/footer.js"></script>
		<!--menus sidebars etc.-->
		<script src="templates/menus/sidebar/sidebar.js"></script>
		<script src="templates/menus/mainmenu/menuController.js"></script>
	
			
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script> -->
    </body>
</html>
