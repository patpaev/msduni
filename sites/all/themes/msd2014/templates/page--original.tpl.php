<div id="page" class="wrapper <?php print !empty($show_grid) ? 'show-grid' : '' ?>">
    <!-- Header Area -->
    <div class="header">
        <div class="hgroup">
            <?php if ($linked_parent_site_name): ?><p><?php print $linked_parent_site_name ?></p><?php endif; ?>
            <?php if ($linked_site_name): ?><h1 id="site-name"><?php print $linked_site_name; ?></h1><?php endif; ?>
      	</div>
      	
      	<?php print !empty($page['byline']) ? render($page['byline']) : "<hr />"; ?>
    </div>
		
    <?php if ($header_menu) { ?>
        <div id="top-menu">
            <?php print render($header_menu); ?>
        </div>	
    <?php } ?>
        
    <div class="col-8 main-block">
	<!-- Banner Area - For the home page only -->
	<?php if ($is_front && $page['banner']): ?>
            <?php print render($page['banner']); ?>
   	<?php endif; ?>
      
        <!-- Main Content Area -->    
        <div class="main <?php print $page['aside'] || $navigation_menu || $page['navigation'] ? 'col-6' : 'col-8' ?> first" id="main-content" role="main">    	
            <?php if ($logged_in) : ?>
                <div class="tabs">
                    <?php print "<ul>" . drupal_render($tabs['#primary']) . "</ul>"; ?>
                    <?php print "<ul>" . drupal_render($tabs['#secondary']) . "</ul>"; ?>
                </div>

                <?php print $messages; ?>
            <?php endif; ?>

            <?php if (!$is_front && $title): ?>
                <h1 class="title" id="page-title"><?php print $title; ?></h1>
            <?php endif; ?>

            <?php print render($page['content']); ?>
        </div> 	

        <!-- RHS Area, includes Navigation and Aside -->
        <? if ($is_front) { ?>
            <?php if ($page['aside']) { ?>
                <div class="aside col-2 last">    
                    <?php print !empty($page['aside']) ? render($page['aside']) : ""; ?>
                </div>
            <?php } ?>
            
        <? } else { ?>
            <?php if ($page['aside'] || $navigation_menu || $page['navigation']) { ?>
                <div class="col-2 last">
                    <?php if ($navigation_menu || $page['navigation']) { ?>
                        <div class="nav first" role="navigation">
                            <?php if ($navigation_menu) { ?>                        
                                <?php print render($navigation_menu); ?>
                            <?php } else { ?>
                                <?php print render($page['navigation']); ?>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if ($page['aside']) { ?>
                        <div class="aside <?php print $asideIsFirst ? 'first' : '' ?>" role="complementary">    
                            <?php print render($page['aside']); ?>
                        </div>
                    <?php } ?>                
                </div>        
            <?php } ?>
        <? } ?>
        <hr />            
    </div>  
</div>
       	
<!-- Footer Area -->
<div class="footer">
    <div id="local" class="wrapper">
        <?php if ($site_name): ?>
            <p class="footertitle"><?php print $site_name ?></p>
        <?php endif; ?>

        <div id="org-details" class="col-2">      		
            <?php if ($address): ?>
                        <!--<p><strong>The Faculty of Bar</strong></p>-->
                <p class="location"><?php print $address ?></p>
            <?php endif; ?>
        </div>

        <ul class="col-2">
            <?php if ($phone): ?><li><strong>Phone:</strong> <?php print $phone ?></li><?php endif; ?>
            <?php if ($fax): ?><li><strong>Fax:</strong> <?php print $fax ?></li><?php endif; ?>
            <?php if ($email): ?><li><strong>Email:</strong> <a href="mailto:<?php print $email ?>"><?php print $email ?></a></li><?php endif; ?>
            <li class="social">
                <?php if ($facebook_url): ?><a class="facebook" href="<?php print $facebook_url ?>">Facebook</a><?php endif; ?>
                <?php if ($twitter_url): ?><a class="twitter" href="<?php print $twitter_url ?>">Twitter</a><?php endif; ?>
            </li>
        </ul>

        <ul class="col-2">
            <?php if ($authoriser): ?><li><strong>Authoriser:</strong><br><?php print $authoriser ?></li><?php endif; ?>
            <?php if ($maintainer): ?><li><strong>Maintainer:</strong><br><?php print $maintainer ?></li><?php endif; ?>
        </ul>

        <ul class="col-2">
            <?php if ($date_created): ?><li><strong>Date created:</strong><br><?php print $date_created ?></li><?php endif; ?>
            <?php if ($date_modified): ?><li><strong>Last modified:</strong><br><?php print $date_modified ?></li><?php endif; ?>      		
        </ul>
        <hr />
    </div>
</div>
