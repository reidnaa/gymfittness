<?php

function gymfitness_classes_list($number= -1){ ?>
  <ul class="classes-list">
    <?php
        $args = array(
            'post_type' => "gymfitness_classes",
            'posts_per_page' => $number
        );
        /// use WP_QUERY and append the reults into $classes
        $classes = new WP_Query($args);

        while($classes->have_posts()): $classes->the_post();
    ?>

        <li class="gym-class card gradient">
            <?php the_post_thumbnail('mediumSize');?>

            <div class="card-content">
                <a href="<?php  the_permalink() ?>" ><h3><?php the_title(); ?></h3></a>
                <p ><?php the_field('class_days'); ?> - 
                <?php the_field('start_time');?> to <?php the_field('end_time');?></p>
            </div>
        </li>

    <?php endwhile; wp_reset_postdata(); ?>
  </ul>

    <?php }


function gymfitness_instructors_list(){?>
    <ul class="instructor-list">
                <?php
                    $args = array(
                        'post_type' => 'instructors',
                        'posts_per_page' => 20
                    );
                   
                    $instructors = new WP_Query($args);
                    
                    while($instructors->have_posts()): $instructors->the_post(); ?>

                    <li class="instructor">
                        <?php the_post_thumbnail('mediumSize');?>
                        <div class="content text-center">
                            <h3><?php the_title();?></h3>
                            <?php the_content();?>

                            <div class="specialty">
                                <?php $specialty = get_field('specialty');
                                
                                foreach($specialty as $single):?>


                                <span class="tag"><?php echo $single; ?></span>

                                <?php endforeach;?>
                            </div>
                        </div>
                    </li>

                    <?php endwhile; wp_reset_postdata();
                ?>
            </ul>
<?php }
?>