<footer class="site-footer">
    <div class="site-footer__container">
        <p class="site-footer__copyright">
            <?php 
                $text = "© " . date('Y') . " " . get_bloginfo('name') . esc_html__(". All rights reserved.", "case-studies-theme");
                echo esc_html($text);
            ?>
        </p>
        <div class="site-footer__navigation-container">
            <nav class="site-footer__navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => false,
                    'menu_class' => 'site-footer__menu',
                ));
                ?>
            </nav>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>