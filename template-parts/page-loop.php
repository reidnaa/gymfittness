<?php while (have_posts()): the_post(); ?>

                <h1 class="text-center text-primary"><?php the_title(); ?></h1>
            
                <?php if (has_post_thumbnail()): 
                    the_post_thumbnail('blog', array('class' => 'featured-image')); 
                endif;
                
                if(get_post_type() === 'gymfitness_classes'): ?> 
                    <p class="content-class"><?php the_field('class_days'); ?> - 
                <?php the_field('start_time');?> to <?php the_field('end_time');?></p>
           
                <?php endif;
                ?>
                
                <?php the_content(); ?>
            
<?php endwhile?>