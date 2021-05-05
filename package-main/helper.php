<?php
use ScssPhp\ScssPhp\Compiler;
use Smalot\PdfParser\Parser;

if( ! function_exists( 'package_main_scss_compiler' ) ) {
    /**
     * Scss Compiler
     *
     * @param string $in
     * @param string $out
     * @param string $import_path
     * @param string $formatter (default: ScssPhp\ScssPhp\Formatter\Compressed)
     * @param boolean $source_map (SOURCE_MAP_INLINE)
     *
     * @return void
     */
    function package_main_scss_compiler( $scss_string, $out, $import_path = '', $formatter = 'ScssPhp\ScssPhp\Formatter\Compressed', $source_map = false ) {
				$scss = new Compiler();
        if( ! empty( $import_path ) ) $scss->setImportPaths( $import_path );
        if( ! empty( $formatter ) ) $scss->setFormatter( $formatter );
        if( true == $source_map ) $scss->setSourceMap( Compiler::SOURCE_MAP_INLINE );
        file_put_contents( $out, $scss->compile( $scss_string ) );
    }
}

//add SVG to allowed file uploads
function package_main_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}


//Search default
function header_top_right_widget() {
   ?>
   <div class="header-search">
     <i class="fa fa-search" aria-hidden="true"></i>
   </div>
   <?php
}

// popups share social
function share_page_button(){
    $active = get_field('show_or_hidden_button_share_page_ins');
    $ctaShare = get_field('cta_popus_share_page', 'option');
    $headingPopup = get_field('heading_popus_share_page', 'option');
    $headingLinkCurrent= get_field('heading_page_link_current', 'option');
    if ($active) { ?>
        <div id="insuranceca-share-page" class="bt-share-page">
            <div class="cta-share">
                <?php if ($ctaShare['name'] or $ctaShare['icon']): ?>
                        <?php if ($ctaShare['name']): ?>
                            <span> <?php echo $ctaShare['name'] ?> </span>
                        <?php endif; ?>
                        <?php if ($ctaShare['icon']): ?>
                            <img src="<?php echo $ctaShare['icon'] ?>" alt="icon-share">
                        <?php endif; ?>
                <?php else: ?>
                    <span>Share</span>
                <?php endif; ?>
            </div>
            <div class="content-share-page" style="display: none">
                <?php if ($headingPopup): ?>
                    <h2 class="title-popup"> <?php echo $headingPopup ?> </h2>
                <?php endif; ?>
                <div class="cta-close"></div>
                <?php echo do_shortcode('[easy-social-share counters=0 noaffiliate="no" sidebar="no"  float="no" postfloat="no" topbar="no" bottombar="no" point="no" mobilebar="no" mobilebuttons="no" mobilepoint="no"]');  ?>
                <div class="page-link-current">
                    <div class="__content-inner">
                        <?php if ($headingLinkCurrent): ?>
                            <h4> <?php echo $headingLinkCurrent ?> </h4>
                        <?php endif; ?>
                        <div class="item-page-link">
                            <?php
                            $idPage = get_the_ID();
                            $link_page_current = get_page_link($idPage);
                            ?>
                            <input type="text" id="link-page-current" name="" value="<?php echo $link_page_current; ?>">
                            <div class="meta-popups">
                                <img class="cta-copy" src="<?php echo PJ_URI;?>/assets/images/icon-copy.svg" alt="copy">
                                <span class="tooltip-popup"> copy url </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}


//Social
function ins_socials_template(){
  $socials = get_field('header_socials','options');
  if(!empty($socials)):
    ?>
    <div class="header-socials">
        <div class="wrap">
            <?php foreach ($socials as $key => $social) {
                ?> <a href="<?php echo $social['link']; ?>" target="_blank"> <img src="<?php echo $social['icon']; ?>" alt=""> </a> <?php
            } ?>
        </div>
    </div>
    <?php
  endif;
}

//Search
function insuranceca_search_default_template(){
  ?>
  <div id="ins_form_search" class="ins-search-form-default mfp-hide">
      <div class="top-search">
        <img src="<?php echo PJ_URI; ?>assets/images/logo-green.png" alt="">
      </div>
      <div class="template-search">
        <?php echo do_shortcode(get_field('search_nav','options')); ?>
      </div>
  </div>
  <?php
}

//Top footer
function insuranceca_footer_top_template($output){
  ob_start();
  $enable_footer_top = get_field('enable_footer_top','options');
  if($enable_footer_top):
    $logo_footer        = get_field('logo_footer','options');
    $description_footer = get_field('description_footer','options');
    $subscribe_footer   = get_field('subscribe_footer','options');
    $visit_footer   = get_field('visit_footer','options');
    ?>
    <div class="footer-top">
      <div class="wrap">
          <div class="footer-top--left">
            <?php if($logo_footer): ?>
              <img src="<?php echo $logo_footer; ?>" alt="">
            <?php endif; ?>
            <?php if($description_footer): ?>
              <div class="footer-description">
                  <?php echo $description_footer; ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="footer-top--right">
              <div class="item-info subscribe-footer">
                 <h3><?php echo $subscribe_footer['heading']; ?></h3>
                 <div class="des-footer">
                    <div class="__des">
                      <?php echo $subscribe_footer['description']; ?>
                    </div>
                    <div class="__btn">
                      <a href="<?php echo $subscribe_footer['button']['link']; ?>"><?php echo $subscribe_footer['button']['label']; ?><i class="fa fa-angle-right" ></i></a>
                    </div>
                 </div>
              </div>
              <div class="item-info visit-footer">
                 <h3><?php echo $visit_footer['heading']; ?></h3>
                 <div class="des-footer">
                    <div class="__des">
                      <?php echo $visit_footer['description']; ?>
                    </div>
                    <div class="__btn">
                      <a href="<?php echo $visit_footer['button']['link']; ?>"><?php echo $visit_footer['button']['label']; ?><i class="fa fa-angle-right" ></i></a>
                    </div>
                 </div>
              </div>
          </div>
      </div>
    </div>
    <?php
  endif;
  $footer_top = ob_get_clean();
  return $footer_top.$output;
}

// alert banner top page
function alert_banner_top(){
    $active_banner = get_field('show_or_hiden_alert_banner_top');
    $heading_banner = get_field('heading_alert_banner_insuranceca');
    $content_banner = get_field('content_alert_banner_insuranceca');
    if ($active_banner) { ?>
        <div id="bt-alert-banner-top" class="alert-banner-top">
            <div class="conatiner-alert-banner-top">
                <div class="meta-banner">
                    <?php if ($heading_banner): ?>
                        <h2 class="heading-banner"> <?php echo $heading_banner ?> </h2>
                    <?php endif; ?>
                    <?php if ($content_banner): ?>
                        <div class="content-banner"> <?php echo $content_banner ?>  </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="cta-close">
                <img src="<?php echo PJ_URI;?>/assets/images/icon-cancel-white.svg" alt="copy">
            </div>
        </div>
    <?php
    }
}

//Change default length text
function insuranceca_excerpt_length_text(){
  return 40;
}

//Save post
function acf_save_resources($post_id){
  if(get_post_type($post_id) != 'resources') return;
  $acf = $_POST['acf'];
  $old_val = get_field('upload_file',$post_id);
  $old_val2 = get_field('content_file',$post_id);
  $field1 = get_field_object('upload_file');
  $field2 = get_field_object('content_file');
  $key = $field1['key'];
  $file_id = $acf[$key];
  if($file_id != $old_val['ID']){
    if($file_id){
      $file = get_attached_file($file_id);
      $content = parsePDF($file);
      $_POST['acf'][$field2['key']] = $content;
    }else{
      $_POST['acf'][$field2['key']] = '';
    }
  }else{
    if($file_id && trim($old_val2) == ''){
      $file = get_attached_file($file_id);
      $content = parsePDF($file);
      $_POST['acf'][$field2['key']] = $content;
    }
  }
}

//Parser
function parsePDF($filename)
{
    //Parse pdf file and build necessary objects.
     $parser = new Parser();
     $pdf = $parser->parseFile($filename);
     $text = $pdf->getText();
     return $text;
}

//Style admin
add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
  echo '<style>div[data-name="content_file"]{display:none;}</style>';
}




// Add the custom columns order to the team post type:
add_filter( 'manage_team_posts_columns', 'set_custom_edit_team_columns' );
add_filter( 'manage_ins-faqs_posts_columns', 'set_custom_edit_team_columns' );
function set_custom_edit_team_columns($columns) {
    // unset( $columns['author'] );
    $columns['team_order'] = __( 'Order', 'your_text_domain' );
    return $columns;
}

// get data order columns
add_action( 'manage_team_posts_custom_column' , 'get_order_column', 10, 2 );
add_action( 'manage_ins-faqs_posts_custom_column' , 'get_order_column', 10, 2 );
function get_order_column( $column, $post_id ) {
    switch ( $column ) {

        case 'team_order' :

            // echo get_post_meta( $post_id , 'page-attributes' , true );

            $team = get_post($post_id);
            echo $team ->menu_order;

            break;

    }
}
