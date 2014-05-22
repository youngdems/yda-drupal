<?php
/**
 * @file
 * Porto's theme implementation to display a single Drupal page.
 */
?>

<div class="body">
  <header>
    <div class="container">

      <?php if (isset($page['branding'])) : ?>
	      <?php print render($page['branding']); ?>
	    <?php endif; ?>
    
      <?php if ($logo): ?>
        <div class="logo">
		      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
		        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
		      </a>
        </div>
	    <?php endif; ?>
	    
	    <?php if ($site_name || $site_slogan): ?>
	      <div id="name-and-slogan"<?php if ($disable_site_name && $disable_site_slogan) { print ' class="hidden"'; } ?>>
	
	        <?php if ($site_name): ?>
	          <?php if ($title): ?>
	            <div id="site-name"<?php if ($disable_site_name) { print ' class="hidden"'; } ?>>
		            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
		          </div>
	          <?php else: /* Use h1 when the content title is empty */ ?>
		          <h1 id="site-name"<?php if ($disable_site_name) { print ' class="hidden"'; } ?>>
		            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
		          </h1>
	          <?php endif; ?>
	        <?php endif; ?>
	
	        <?php if ($site_slogan): ?>
	          <div id="site-slogan"<?php if ( ($disable_site_slogan ) ) { print ' class="hidden"'; } if ( (!$disable_site_slogan ) AND ($disable_site_name) ) { print ' class="slogan-no-name"'; } ?>>
	            <?php print $site_slogan; ?>
	          </div>
	        <?php endif; ?>
	
	      </div> <!-- /#name-and-slogan -->
	    <?php endif; ?>

      <!-- /branding --> 
      <div id="header-top">
        <?php print render($page['header_top']); ?>
      </div>
      <?php print render($page['header_icons']); ?>
      <nav>
        <?php print render($page['header_menu']); ?>
      </nav>
      
    </div>  
	</header>
	
	<div role="main" class="main container">
	
	  <?php if ( ($breadcrumb) AND (!drupal_is_front_page()) ): ?>
	  <section class="page-top breadcrumb-wrap">
		  <div class="container">
		    <?php if (theme_get_setting('breadcrumbs') == '1'): ?>
				<div class="row">
					<div class="span12">
						<div id="breadcrumbs"><?php print $breadcrumb; ?> </div>	
					</div>
				</div>
				<?php endif; ?>
				<div class="row">
					<div class="span12">
						<h1><?php print drupal_get_title(); ?></h1>
					</div>
				</div>
			</div>
		</section>
	  <?php endif; ?>
	  
	  <?php print render($page['before_content']); ?>
	  <div id="content" class="content full">
	    <div class="container">
	      <div class="row">
	      
			    <?php if ( ($page['sidebar_left']) ) : ?>
				  <aside id="sidebar-left">
					  <div class="<?php if ($page['sidebar_right']) { echo "span3";} else { echo "span3"; } ?>">
					    <div id="sticky-sidebar">
					    <?php print render($page['sidebar_left']); ?>
					    </div>
					  </div>
				  </aside>
				  <?php endif; ?>
			
					<div class="<?php if ( ($page['sidebar_right']) AND ($page['sidebar_left']) ) { echo "span6";} elseif ( ($page['sidebar_right']) OR ($page['sidebar_left']) ) {  echo "span8"; }  else { echo "span12"; } ?>">
					  
					  <?php print $messages; ?>
					  
			     	<?php if ($tabs = render($tabs)): ?>
						  <div id="drupal_tabs" class="tabs ">
						    <?php print render($tabs); ?>
						  </div>
					  <?php endif; ?>
			      <?php print render($page['help']); ?>
			      <?php if ($action_links): ?>
			        <ul class="action-links">
			          <?php print render($action_links); ?>
			        </ul>
			      <?php endif; ?>
			
					  <?php if (isset($page['content'])) { print render($page['content']); } ?>
					</div>
			  
				  <?php if ( ($page['sidebar_right']) ) : ?>
				  <div class="<?php if ($page['sidebar_left']) { echo "span4";} else { echo "span4"; } ?>">
				    <?php print render($page['sidebar_right']); ?>
				  </div>
				  <?php endif; ?>
			    
			  </div>
	    </div>  
	  </div>  
 
		 
	  
	</div>

  <?php print render($page['after_content']); ?>
<?php
//Ross Smith 2014-05-19
//Moved footer outside of "body" div
?>	
</div>
<footer>
  <div class="container">
    <div class="row">
    
      <?php if (theme_get_setting('ribbon') == '1'): ?>
			<div class="footer-ribon">
				<span><?php echo t("%string", array('%string' => theme_get_setting('ribbon_text')) );?></span>
			</div>
      <?php endif; ?>
		  
	    <div class="span3">
	      <?php if (isset($page['footer_1'])) : ?>
			    <?php print render($page['footer_1']); ?>
			  <?php endif; ?>
	    </div>
	    
	    <div class="span3">
	      <?php if (isset($page['footer_2'])) : ?>
			    <?php print render($page['footer_2']); ?>
			  <?php endif; ?>
	    </div>
	    
	    <div class="span4">
	      <?php if (isset($page['footer_3'])) : ?>
			    <?php print render($page['footer_3']); ?>
			  <?php endif; ?>
	    </div>
	    
	    <div class="span2">
	      <?php if (isset($page['footer_4'])) : ?>
			    <?php print render($page['footer_4']); ?>
			  <?php endif; ?>
	    </div>
		    
		</div>  
  </div>	

  <div class="footer-copyright">  
    <div class="container">
      <div class="row">
		    <div class="span6">
		    
				  <?php if (isset($page['footer_bottom_left'])) : ?>
				    <?php print render($page['footer_bottom_left']); ?>
				  <?php endif; ?>
		  
		    </div>
		    <div class="span6">
		    
				  <?php if (isset($page['footer_bottom_right'])) : ?>
				    <?php print render($page['footer_bottom_right']); ?>
				  <?php endif; ?>
		  
		    </div>
      </div>  
    </div>
  </div>  
</footer>