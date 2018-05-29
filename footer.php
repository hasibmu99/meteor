<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright-text">
                        <?php
                            $allowed_html =  array(
                                'a' => array(
                                    'href'  => array(),
                                    'target'=> array(),

                                ),
                            );
                        
                        ?>
                        <p>
                            Copyright &copy; 2017 <?=wp_kses(cs_get_option('footer_cpt'), $allowed_html); ?> 
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="social-icons">
                        <ul>
                             
                            <?php
                                $social_icons =  cs_get_option('social_icons');
                                
                                foreach($social_icons as $icon):
                                //    echo '<pre>', var_dump($icon),'</pre>';    
                            ?>
                            
                            <li>
                                <a href = "<?=$icon['social_icon_link'];?>"><i class = "<?=$icon['social_icon'] ?>"></i></a>
                            </li>
                                <?php endforeach; ?>
                        
                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>