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
     <i class="fa fa-search" aria-hidden="true"></i>
   </div>
   <?php
}

//Social
function ins_socials_template(){
  $socials = get_field('header_socials','options');
  if(!empty($socials)):
    ?>
    <div class="header-socials">
        <div class="wrap">
            <?php foreach ($socials as $key => $social) {
                ?> <a href="<?php echo $social['link']; ?>" target="_blank"><i class="fa <?php echo $social['icon']; ?>" aria-hidden="true"></i></a> <?php
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
        <form class="search-form" method="get" action="<?php echo get_site_url(); ?>" role="search" itemprop="potentialAction" itemscope="" itemtype="https://schema.org/SearchAction">
          <input class="search-form-input" type="search" name="s" id="searchform" value="<?php echo isset($_GET['s']) ? $_GET['s'] : ''; ?>" itemprop="query-input" placeholder="Search for lorem ipsum and more">
          <button type="submit" name="button"><i class="fa fa-search" aria-hidden="true"></i></button>
          <meta content="<?php echo get_site_url(); ?>/?s={s}" itemprop="target">
        </form>
        <?php echo ins_load_template_filter(); ?>
      </div>
  </div>
  <?php
}

function ins_load_template_filter(){
  ?>
  <div class="template-filter-form">
      <div class="__filter-suggestion">

        <div class="load-suggestion">
          Suggestions:
          <div class="list-suggestions">
            <a href="#">lorem ipsum</a>,
            <a href="#">dolor semet</a>,
            <a href="#">sed it embaco</a>
          </div>
        </div>

        <div class="btn-filter">
          <i class="fa fa-caret-right" aria-hidden="true"></i>
          Filters
        </div>

      </div>
      <div class="__filter-options">

      </div>
  </div>
  <?php
}
