<header id="header">
    <div id="globalheader">
        <div class="sitetitle pl-2 pl-xl-0 pt-2">
            <a class="w100 to_home" href="/" >
                <?php if (is_home() ): ?>
                    <h1 class="w100">
                        <?php if ( get_header_image() ) : ?>
                            <img src="<?php echo esc_url( get_header_image() ); ?>" alt="<?php echo get_option('profile_corporate_name'); ?>">
                        <?php else : ?>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sitetitle@2x.webp" alt="<?php echo get_option('profile_corporate_name'); ?>">
                        <?php endif; ?>
                    </h1>
                <?php else:?>
                    <span class="w100">
                        <?php if ( get_header_image() ) : ?>
                            <img src="<?php echo esc_url( get_header_image() ); ?>" alt="<?php echo get_option('profile_corporate_name'); ?>">
                        <?php else : ?>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sitetitle@2x.webp" alt="<?php echo get_option('profile_corporate_name'); ?>">
                        <?php endif; ?>
                    </span>
                <?php endif;?>
            </a>
        </div>

        <nav id="headnav" class="">
            <?php get_template_part( 'global-navi-menu' ); ?>
        </nav>
    </div>
</header>
