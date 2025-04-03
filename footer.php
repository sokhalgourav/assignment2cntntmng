<footer>    
            <section class="top-footer">
                <div class="first-widget"></div>
                    <a href="<?php echo_esc(home_url()); ?>">
                       <?php dynamic_sidebar('footer-widget-area-one'); ?> 
                <div class="second-widget"></div>
                    <?php dynamic_sidebar('footer-widget-area-two'); ?> 
                <div class="third-widget"></div>
                    <?php dynamic_sidebar('footer-widget-area-three'); ?> 
                <div class="fourth-widget"></div>    
                    <?php dynamic_sidebar('footer-widget-area-four'); ?> 
        </footer>
    </body>
</html>