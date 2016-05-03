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

    <h1><? echo($title); ?></h1>

    <blockquote>
    <?
    $item = field_get_items('node', $node, 'field_header');
    $body = field_view_value('node', $node, 'field_header', $item[0]);
    echo render($body);
    ?>
    </blockquote>
</div>

<div class="content-right-wrap">
  <?php
  $block = module_invoke('sharethis_extras', 'block_view', 'sharethis_extras_block');
  print render($block['content']);
  ?>
</div>

<div style="clear:both"></div>

<?
$item_body = field_get_items('node', $node, 'body');
$body = field_view_value('node', $node, 'body', $item_body[0]);

$item_right_column = field_get_items('node', $node, 'field_right_column');
$right_column = field_view_value('node', $node, 'field_right_column', $item_right_column[0]);
?>

<? if(
  strlen(trim($body["#markup"])) > 0 &&
  strlen(trim($right_column["#markup"])) == 0
) { ?>

  <div class="programs-content-left full-width">
    <? echo render($body); ?>
  </div>

<? } else if(strlen(trim($body["#markup"])) > 0) { ?>

  <div class="programs-content-left">
    <? echo render($body); ?>
  </div>

  <div class="programs-content-right">
    <? echo render($right_column); ?>
  </div>

<? } ?>

<div style="clear:both"></div>

<?
// if the page is the MSD building page, we want to put some special "related items" in there.
if ($node->nid == 451):
?>
  <div class="programs-module">
    <a class="dollhouse" href="#" data-featherlight="#japaneseroom">
      <iframe id="scann3d-player-vid" src="https://api.scann3d.com.au/players/scann3d/japaneseroom/?noplayer&nosplash" frameborder="0" allowfullscreen="" mozallowfullscreen="true" webkitallowfullscreen="true" onmousewheel=""></iframe>
    </a>
    <h2>
      <a href="#" data-featherlight="#japaneseroom">
        Walk through the Japanese Room in 3D
      </a>
    </h2>
    <p></p>
    <p>A contemporary interpretation of traditional Japanese interior design, we've had the MSD's Japanese Room scanned in 3D. Step inside for the virtual experience.</p>
    <p></p>
    <div class="read-more-wrapper">
      <a href="#" class="proj-more" data-featherlight="#japaneseroom">
        Step inside
      </a>
    </div>
  </div>

  <div class="programs-module">
    <a class="dollhouse" href="#" data-featherlight="#msdlecture">
      <iframe id="scann3d-player-vid" src="https://api.scann3d.com.au/players/scann3d/msdlecture/?noplayer&nosplash" frameborder="0" allowfullscreen="" mozallowfullscreen="true" webkitallowfullscreen="true" onmousewheel=""></iframe>
    </a>
    <h2>
      <a href="#" data-featherlight="#msdlecture">
        Walk through the B117 Lecture Theatre in 3D
      </a>
    </h2>
    <p></p>
    <p>We've had the B117 Lecture Theatre scanned in 3D, now you can step inside for the virtual experience. </p>
    <p></p>
    <div class="read-more-wrapper">
      <a href="#" class="proj-more" data-featherlight="#msdlecture">
        Step inside
      </a>
    </div>
  </div>

  <div class="programs-module">
    <a class="dollhouse" href="#" data-featherlight="#msdlibrary">
      <iframe id="scann3d-player-vid" src="https://api.scann3d.com.au/players/scann3d/msdlibrary/?noplayer&nosplash" frameborder="0" allowfullscreen="" mozallowfullscreen="true" webkitallowfullscreen="true" onmousewheel=""></iframe>
    </a>
    <h2>
      <a href="#" data-featherlight="#msdlibrary">
        Walk through the MSD Library in 3D
      </a>
    </h2>
    <p></p>
    <p>We've had the MSD Library scanned in 3D, now you can step inside for the virtual experience.</p>
    <p></p>
    <div class="read-more-wrapper">
      <a href="#" class="proj-more" data-featherlight="#msdlibrary">
        Step inside
      </a>
    </div>
  </div>

  <div class="programs-module">
    <a class="dollhouse" href="#" data-featherlight="#msdshowcase">
      <iframe id="scann3d-player-vid" src="https://api.scann3d.com.au/players/scann3d/msdshowcase/?noplayer&nosplash" frameborder="0" allowfullscreen="" mozallowfullscreen="true" webkitallowfullscreen="true" onmousewheel=""></iframe>
    </a>
    <h2>
      <a href="#" data-featherlight="#msdshowcase">
        Walk through the Student Showcase in 3D
      </a>
    </h2>
    <p></p>
    <p>Step inside to experience student work in 3D</p>
    <p></p>
    <div class="read-more-wrapper">
      <a href="#" class="proj-more" data-featherlight="#msdshowcase">
        Step inside
      </a>
    </div>
  </div>

  <div id="japaneseroom" class="featherlight modal"><iframe src="https://api.scann3d.com.au/players/scann3d/japaneseroom/?autoplay"></iframe></div>
  <div id="msdlecture" class="featherlight modal"><iframe src="https://api.scann3d.com.au/players/scann3d/msdlecture/?autoplay"></iframe></div>
  <div id="msdlibrary" class="featherlight modal"><iframe src="https://api.scann3d.com.au/players/scann3d/msdlibrary/?autoplay"></iframe></div>
  <div id="msdshowcase" class="featherlight modal"><iframe src="https://api.scann3d.com.au/players/scann3d/msdshowcase/?autoplay"></iframe></div>
<? endif; ?>

<?
// Load the related items
$related_items = array();
if(array_key_exists("field_related_items", $content)) {
  $related_items = $content["field_related_items"]["#items"];
}

foreach($related_items as $key => $item) {

  $node = $item["entity"];

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

    <p>
    <?
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
      ?>
      </p>

    <div class='read-more-wrapper'>
        <? echo render($link); ?>
    </div>

    </div>

 <? } ?>

  <div style="clear:both"></div>

</div>

<script type="text/javascript">
jQuery(function($) {
    $('.programs-content-left, .programs-content-right').matchHeight();
    $('.programs-module').matchHeight();
    $('.programs-module h2').matchHeight();
});
</script>

<script src="//code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="https://scann3d.s3.amazonaws.com/propertyfiles/featherlight.min.js"></script>
