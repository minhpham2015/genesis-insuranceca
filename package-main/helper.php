<?php
use ScssPhp\ScssPhp\Compiler;

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
     <img src="<?php echo PJ_URI ?>assets/images/SearchIcon.svg" alt="">
   </div>
   <?php
}

function share_page_button(){
    $active = get_field('show_or_hidden_button_share_page_ins');
    $ctaShare = get_field('cta_popus_share_page', 'option');
    $headingPopup = get_field('heading_popus_share_page', 'option');
    $headingLinkCurrent= get_field('heading_page_link_current', 'option');
    if ($active) { ?>
        <div id="insuranceca-share-page" class="bt-share-page">
            <div class="cta-share">
                share
                <?php if ($ctaShare['name'] or $ctaShare['icon']): ?>
                        <?php if ($ctaShare['name']): ?>
                            <span> <?php echo $ctaShare['name'] ?> </span>
                        <?php endif; ?>
                        <?php if ($ctaShare['icon']): ?>
                            <img src="<?php echo $ctaShare['icon'] ?>" alt="icon-share">
                        <?php endif; ?>
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

add_filter('essb4_templates', 'essb_mytemplate_initialze');
