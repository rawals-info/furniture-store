<?php
/**
 * The main template file
 * 
 * @package FurnitureStylo
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php if (is_home() && !is_front_page()) : ?>
        <header class="page-header">
            <div class="container">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </div>
        </header>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php if (have_posts()) : ?>
                    <div class="posts-grid">
                        <?php while (have_posts()) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('large'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="post-content">
                                    <header class="entry-header">
                                        <h2 class="entry-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                        <div class="entry-meta">
                                            <span class="posted-on">
                                                <i class="fas fa-calendar"></i>
                                                <?php echo get_the_date(); ?>
                                            </span>
                                            <span class="byline">
                                                <i class="fas fa-user"></i>
                                                <?php the_author(); ?>
                                            </span>
                                        </div>
                                    </header>
                                    
                                    <div class="entry-content">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    
                                    <footer class="entry-footer">
                                        <a href="<?php the_permalink(); ?>" class="read-more">
                                            Read More <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </footer>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                    
                    <?php
                    // Pagination
                    the_posts_pagination(array(
                        'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                        'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                    ));
                    ?>
                    
                <?php else : ?>
                    <div class="no-posts">
                        <h2>Nothing Found</h2>
                        <p>It seems we can't find what you're looking for.</p>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="col-lg-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
