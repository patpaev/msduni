
  <div class="blk" style="background-color:#1F1F1F">
    <div class="social-media-wrap">
      <ul class="social-medias">
        <li class="facebook"><a href="https://www.facebook.com/msdsocial" class="facebook">Like us on Facebook</a></li>
        <li class="instagram"><a href="https://instagram.com/msdsocial/" class="instagram">Follow us on Instagram</a></li>
        <li class="twitter"><a href="https://twitter.com/msdsocial" class="twitter">Follow us on Twitter</a></li>
        <li class="youtube"><a href="https://www.youtube.com/user/ABPUnimelb" class="youtube">Watch us on Youtube</a></li>
        <li class="pintererst"><a href="https://au.pinterest.com/msdsocial/" class="pinterest">Pin us on Pinterest</a></li>
      </ul>
      <ul class="hashtag">
        <li>#msdsocial</li>
      </ul>
    </div>
  </div>
  
  
  <div class="blk" style="background-color:#292929">
  <div class="footer-links-wrap">
    <div class="double-clmn">
    
      <div style="min-height:190px; margin-top:36px">
        <?php
        $block = block_load('msd2014', 'footer_left_column');
        $build = _block_get_renderable_array(_block_render_blocks(array($block)));
        print drupal_render($build);
        ?>
      </div>
        
      <div class="fine-txt">
        <?php
        $block = block_load('msd2014', 'footer_site_ownership');
        $build = _block_get_renderable_array(_block_render_blocks(array($block)));
        print drupal_render($build);
        ?>
      </div>
     
    </div>
    
    <div class="single-clmn">
    
      <div style="min-height:190px; margin-top:36px">
        <?php
        $block = block_load('msd2014', 'footer_center_column');
        $build = _block_get_renderable_array(_block_render_blocks(array($block)));
        print drupal_render($build);
        ?>
      </div>
      
    <div class="fine-txt">
      We acknowledge that the Parkville campus<br>
        is located on Wurundjeri land.
      </div>
    
    </div>
    
    <div class="single-clmn single-clmn-wide right-column">
    <div class="box">
      <?php
      $block = block_load('msd2014', 'footer_right_column');
      $build = _block_get_renderable_array(_block_render_blocks(array($block)));
      print drupal_render($build);
      ?> 
  </div>
  <div class="box footer-enews-subscribe">
      <?php
      $block = block_load('msd2014', 'footer_subscribe_enews');
      $build = _block_get_renderable_array(_block_render_blocks(array($block)));
      print drupal_render($build);
      ?> 
  </div>
    </div>

  
  </div> 
  
  
  <div style="clear:both; height:50px"></div> 
  </div>

  <a href="#" class="scrollToTop"></a>
  
