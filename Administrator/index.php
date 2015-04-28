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
    </head>
    <body class="">
            
            <div class="containter-fluid">
               <main-Menudir></main-Menudir> 
            </div>
            
            
            <!-- Cointent area... -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div ng-view></div>
                    </div>
                </div>  
                
            </div>      
        
        <script src="js/components/angular.min.js"></script>
        <script src="js/components/jquery-1.11.2.min.js"></script>
        <script src="js/components/angular-route.min.js"></script> 
        <script src="js/components/bootstrap.min.js"></script>
        <!--derictives-->

        <!--apps-->
        <script src="js/app/mainApp.js"></script>
    
    </body>
</html>
