<?php get_header(); ?>
<div id = 'primary' class = "content-area">
    <main id = "main" class = 'site-main' role = 'main'>
    <?php while(have_posts()): the_post(); ?>
            <header class = "entry-header">
                <?php the_title('<h1 class= "entry-title">','</h1>'); ?>
            </header>    
        <?php the_content(); ?>
    <?php endwhile; ?>




    </main>
</div>
<?php get_footer(); ?>