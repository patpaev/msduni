<div class="content-black-wrap"><!--black wrap start-->

<div class="content-banner"></div>

<div class="content-left-wrap">

	<?php
	$breadcrumb = drupal_get_breadcrumb();
	if ($breadcrumb): ?>
		<div class="thecrumb">
			<div id="breadcrumb"><?php print theme('breadcrumb', array('breadcrumb'=>$breadcrumb)); ?></div>
		</div>
	<?php endif; ?>

	<h1><? echo $title; ?></h1>

	<blockquote>
	<?
	$item = field_get_items('node', $node, 'body');
	$body = field_view_value('node', $node, 'body', $item[0]);
	echo render($body);
	?>
	</blockquote>

</div>

<?
// Load the subpage nodes, limit to maximum of 3 subpages.
$subpage_items = $content["field_subpages"]["#items"];
$num_tabs = sizeof($subpage_items);
$tab_class = '';

if($num_tabs > 3) {
	$subpage_items = array_slice($subpage_items, 0, 4);	
	$tab_class = 'ui-4-tabs';
}

?>

<div id="tabs">

<ul class="<?= $tab_class ?>"><!--
<? foreach($subpage_items as $key => $subpage): ?>

	<?
	$subpage_node = $subpage["entity"];

	$item = field_get_items('node', $subpage_node, 'field_listing_image');
	$image = field_view_value('node', $subpage_node, 'field_listing_image', $item[0],
		array(
        	'type' => 'image',
	        'settings' => array(
	          'image_style' => 'tabbed_page_image'
	        )
		)
	);
?>
	--><li>    
		<a href="#tabs-<? echo ($key+1); ?>">
			<?php if($image['#item']): ?>
			  <?php print render($image); ?>
      <?php else: ?>
        <img src="<?php echo('/'.path_to_theme().'/images/listing-default.jpg'); ?>" width="319" height="244" alt="" />
      <?php endif; ?>
			<span><? echo check_plain($subpage["entity"]->title); ?></span>
		</a>
	</li><!--
<? endforeach; ?>
--></ul>

<? foreach($subpage_items as $key => $subpage):

	$subpage_node = $subpage["entity"];
	
	// Load the related items
  $related_items = array();
  if(array_key_exists("field_related_items", $subpage_node)) {
      $related_item_id_targets = $subpage_node->field_related_items['und'];
      $related_item_ids = array_map(function($i){ return($i['target_id']); }, $related_item_id_targets);
      $related_items = node_load_multiple($related_item_ids);
  }
?>

<div id="tabs-<? echo ($key+1); ?>" class="<?php echo(sizeof($related_items) ? 'with-related-items': ''); ?>">

	<table class='tab-content-wrapper'>
  	<tr>
    	<td class='tabbed-content-left-wrap'>
      	<div>
        	<?php if ($logged_in) : ?>
          	<div class="tabs">
          		<?php print "<ul><li><a href='/node/".$subpage_node->nid."/edit'>Edit</a></li></ul>"; ?>
          	</div>
        	<?php endif; ?>
        
        	<?php
          	$item = field_get_items('node', $subpage_node, 'body');
          	$body = field_view_value('node', $subpage_node, 'body', $item[0]);
          	echo render($body);
        	?>
        </div>
      </td>

  	<?php if (!sizeof($related_items)):
    	$right_column = "";
    
    	// First determine if these is a right column on this specific subpage node
    	$item = field_get_items('node', $subpage_node, 'field_right_column');
    	if($item) {
    		$right_column = field_view_value('node', $subpage_node, 'field_right_column', $item[0]);
    	} else {
    		// Otherwise use the global right column for this tabbed page if one exists
    		$item = field_get_items('node', $node, 'field_right_column');
    		if($item) {
    			$right_column = field_view_value('node', $node, 'field_right_column', $item[0]);
    		}
    	}
    
    	if(is_array($right_column)): ?>
      	<td>
      		<div class='tabbed-content-right-wrap'>
      			<? echo render($right_column); ?>
      		</div>
      	</td>
    	<? endif; ?>
    <? endif; ?>
  	</tr>
  </table>


<!-- start related items -->

<?
foreach($related_items as $key => $item):
  $node = $item;
  
  if($node->type == "landing_page_item") {

    $item = field_get_items('node', $node, 'field_link');
    $link = field_view_value('node', $node, 'field_link', $item[0]);
    $url = $link["#element"]["url"];

  } else if(
    $node->type == "page" ||
    $node->type == "event" ||
    $node->type == "news" ||
    $node->type == "tabbed_page"

  ) {

    $url = url('node/' . $node->nid, array('absolute' => TRUE));
    $options = array(
      'attributes' => array(
        'class' => array('proj-more'),
      ),
    );
    $link = l("Read More", $url, $options);

  }
  ?>
  <div class="programs-module">

    <?
    if($node->type == "landing_page_item") {
      $item = field_get_items('node', $node, 'field_image');

      if ($item == NULL) {
        $image = NULL;
      } else {
        $image = field_view_value('node', $node, 'field_image', $item[0],
          array(
            'type' => 'image',
            'settings' => array(
              'image_style' => 'landing_page_item_image'
            )
          )
        );
      }
    } else if(
      $node->type == "page" ||
      $node->type == "event" ||
      $node->type == "news" ||
      $node->type == "tabbed_page"
    ) {
      $item = field_get_items('node', $node, 'field_listing_image');
      $image = field_view_value('node', $node, 'field_listing_image', $item[0],
        array(
          'type' => 'image',
          'settings' => array(
            'image_style' => 'landing_page_item_image'
          )
        )
      );
    }
    ?>

    <? if($image): ?> <a href='<? echo $url; ?>'><? print render($image); endif; ?></a>

    <h2><a href='<? echo $url; ?>'><? echo strtoupper($node->title); ?></a></h2>

    <? if($node->type == 'event'): ?>
      <p><strong> <?
        $item = field_get_items( 'node', $node, 'field_dates' );
        $start = $item[0]['value'];
        $end = $item[0]['value2'];
        $UTC = new DateTimeZone( 'UTC' );
        $user_timezone = drupal_get_user_timezone();
        $start_time = new DateTime( $start, $UTC );
        $start_time->setTimezone( new DateTimeZone($user_timezone) );
        $end_time = new DateTime( $end, $UTC );
        $end_time->setTimezone( new DateTimeZone($user_timezone) );

        if ( $start_time->format('Y') == $end_time->format('Y')  ) {

          if ( $start_time->format('m') == $end_time->format('m')  ) {

              if ( $start_time->format('d') == $end_time->format('d')  ) {

                if ( $start_time->format('i') == $end_time->format('i') && $start_time->format('H') == $end_time->format('H') ) {

                  echo ( $start_time->format('g:ia, ') );

                } else {
                  echo ( $start_time->format('g:ia') );
                  echo ( ' to ' );
                  echo ( $end_time->format('g:ia, ') );
                }

                echo ( $start_time->format('l j ') );

              } else {
                echo ( $start_time->format('g:ia, l j') );
                echo ( ' to ' );
                echo ( $end_time->format('g:ia, l j ') );
              }

            echo ( $start_time->format('F ') );

          } else {
            echo ( $start_time->format('g:ia, l j F') );
            echo ( ' to ' );
            echo ( $end_time->format('g:ia, l j F ') );
          }

          echo ( $start_time->format('Y') );

        } else {
          echo ( $start_time->format('g:ia, l j F Y') );
          echo ( ' to ' );
          echo ( $end_time->format('g:ia, l j F Y') );
        }
        ?>
      </strong></p>
    <? endif; ?>

    <p><?
      if($node->type == "landing_page_item") {
          $item = field_get_items('node', $node, 'body');
          $body = field_view_value('node', $node, 'body', $item[0]);
          echo render($body);
        } else if(
        $node->type == "page" ||
        $node->type == "event" ||
        $node->type == "news" ||
        $node->type == "tabbed_page"
      ) {
          $item = field_get_items('node', $node, 'body');
          $teaser = field_view_value('node', $node, 'body', $item[0], 'teaser');
          echo render($teaser);
        }
      ?></p>

    <div class='read-more-wrapper'><? echo render($link); ?></div>

    </div>

<? endforeach; ?>


<!-- end related items -->
  <div style="clear:both"></div>

</div>

<? endforeach; ?>

</div>

<div style="clear:both"></div>

</div>


<script type="text/javascript">

var tabEls = document.querySelectorAll('.with-related-items');

for(i=0; i<tabEls.length; i++) {
  var target = tabEls[i];
      
  var observer = new MutationObserver(function(mutations) {
    jQuery(function($) {
      $('.programs-module').matchHeight();
      $('.programs-module h2').matchHeight();
    });
    
/*
    mutations.forEach(function(mutationRecord) {
      console.log('style changed!');
    });    
*/

  });

  observer.observe(target, { attributes : true, attributeFilter : ['style'] });
  
}


  console.log('matching height!');



jQuery(function($) {
	$( "#tabs" ).tabs();
});
</script>
