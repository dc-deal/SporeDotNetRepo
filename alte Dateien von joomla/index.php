<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<!doctype html>
<html>
	<head>
	        <?php
	      $this->setGenerator('');
	        ?>
	        <jdoc:include type="head" />
	        
	        <link type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" rel="stylesheet" >
			<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/html5.js" type="text/javascript"></script>
			<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/modernizr.js" type="text/javascript"></script>
	    </head>
	
	<?php
	  $itemid = JRequest::getVar('Itemid');
	  $menu = &JSite::getMenu();
	  $active = $menu->getItem($itemid);
	  $params = $menu->getParams( $active->id );
	  $pageclass = $params->get( 'pageclass_sfx' );
	?>
	
	<body class="page_bg <?php if($pageclass): echo $pageclass; endif;?>">
	
	
		<header id="header">   
	 		<nav id="main-navigation">
				<jdoc:include type="modules" name="top-navigation" style="xhtml" />	    
	    	</nav>   			
	     	<a href="<?php echo $this->baseurl ?>index.php">
		        <div id="headersporelogo">          </div>
		    </a>			
		</header>
		<div id="footer">
			<p>
				<jdoc:include type="modules" name="footerMenu" style="xhtml" /></p>
		</div>
		<div id="mittelteil">
		    <div id="banner">
		    	<jdoc:include type="modules" name="banner" style="xhtml" />
		    </div>
			<?php
			if ($menu->getActive() !== $menu->getDefault()) {
				echo '<div id="section_wrapper">';
			} else {
				echo '<div id="section_wrapper_Frontpage">';
			}
			?>
		    	<div id="sidebarright">
						<jdoc:include type="modules" name="sidebarright" style="xhtml" />
						<p></p>
				</div>
				<div id="content">
		 		  	 <article id="artikeltext">
				        <jdoc:include type="message" />		
		           		<?php
						if ($menu->getActive() !== $menu->getDefault()) {
						   echo '<jdoc:include type="component" />';
						}
						?>
		    		</article>
				</div>  
		    	<div id="sidebarleft">
						<jdoc:include type="modules" name="sidebarleft" style="xhtml" />
						<p></p>
				</div>
			</div>
			<div id="wrapper-newschests">
				<?php
				if ($menu->getActive() == $menu->getDefault()) {
					echo '<ul id="navi">';
					echo '  <li class="NewsChest"><jdoc:include type="modules" name="NewsChest1" style="xhtml" /></li>';
					echo '  <li class="NewsChest"><jdoc:include type="modules" name="NewsChest2" style="xhtml" /></li>';
					echo '  <li class="NewsChest"><jdoc:include type="modules" name="NewsChest3" style="xhtml" /></li>';
					echo '  <li class="NewsChest"><jdoc:include type="modules" name="NewsChest4" style="xhtml" /></li>';
					echo '</ul>';
				}
				?>
			</div>
		</div>
	</body>
</html>
