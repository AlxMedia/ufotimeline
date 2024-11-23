<?php $format = get_post_format(); ?>
<?php $archive_year  = get_the_time('Y'); ?>
<?php $archive_month = get_the_time('m'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('type-entry-outer'); ?>>

    <div class="type-entry">

        <div class="type-entry-hoverline"></div>

        <a href="<?php the_permalink(); ?>" class="type-entry-clickable"></a>

        <h3 class="type-entry-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
            <?php if (has_excerpt()) : ?>
                <span class="type-entry-excerpt">
                    <?php if (has_category('quotes')) : ?> 
                        <i class="fas fa-briefcase"></i>
                    <?php elseif (has_category('books-documents')) : ?> 
                        <i class="fas fa-book"></i>
                    <?php else : ?>
                        <i class="fas fa-external-link-alt"></i>
                    <?php endif; ?>
                    <?php echo get_the_excerpt(); ?>
                </span>
            <?php endif; ?>
        </h3>

        <?php if (has_post_thumbnail()) : ?>
            <div class="type-entry-thumbnail">
                <a href="<?php the_permalink(); ?>" aria-label="Read More">
                    <?php if (has_category('quotes')) : ?>
                        <i class="fas fa-quote-left"></i>
                    <?php endif; ?>
                    <?php the_post_thumbnail('ufotimeline-small'); ?>
                </a>
            </div>
        <?php else : ?>    
            <div class="type-entry-thumbnail-empty">
                <a href="<?php the_permalink(); ?>" aria-label="Read More">
                    <?php if (has_category('uncategorized')) : ?><i class="fas fa-plus"></i><?php endif; ?>
                    <?php if (has_category('news')) : ?><i class="fas fa-newspaper"></i><?php endif; ?>
                    <?php if (has_category('documentaries')) : ?><i class="fas fa-film"></i><?php endif; ?>
                    <?php if (has_category('famous-cases')) : ?><i class="fas fa-star"></i><?php endif; ?>
                    <?php if (has_category('sightings')) : ?><i class="fas fa-eye"></i><?php endif; ?>
                    <?php if (has_category('books-documents')) : ?><i class="fas fa-book"></i><?php endif; ?>
                    <?php if (has_category('spotlight')) : ?><i class="fas fa-fire"></i><?php endif; ?>
                    <?php if (has_category('quotes')) : ?><i class="fas fa-quote-left"></i><?php endif; ?>
                </a>
            </div>
        <?php endif; ?>

        <?php if (!is_old_post(4)) : ?>
            <div class="pulsating-circle"></div>
            <div class="pulse-new">New</div>
        <?php endif; ?>

        <div class="type-entry-bottom mobile-bottom group">

            <?php if (has_category('quotes') && $quote_value = get_post_meta(get_the_ID(), 'quote', true)) : ?>
                <div class="type-entry-quote">
                    <div class="type-entry-quote-inner">
                        <p><?php echo esc_html($quote_value); ?></p>
                    </div>
                </div>
                <div class="clear"></div>
            <?php endif; ?>

            <button class="type-entry-expand-btn" title="Share"><i class="fas fa-share"></i></button>

            <div class="type-entry-date">
                <a href="<?php echo get_month_link($archive_year, $archive_month); ?>" title="Archive for <?php the_time('F Y'); ?>">
                    <i class="fas fa-clock"></i><?php the_time('M d'); ?>
                </a>
            </div>

            <?php if (has_category()) : ?>
                <div class="type-entry-category group">
                    <?php
                    // Kategori ID'si 5 olanları hariç tut
                    $categories = get_the_category();
                    foreach ($categories as $category) {
                        if ($category->term_id != 5) {
                            echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a> ';
                        }
                    }
                    ?>
                </div>
            <?php endif; ?>

            <?php $extra_value = get_post_meta(get_the_ID(), 'extra', true); ?>
            <?php if ($extra_value) : ?>
                <button class="type-entry-extra-btn" title="Additional Information">
                    <div class="type-entry-extra-btn-curve"></div>
                    <div class="type-entry-extra-btn-bg"></div>
                    <i class="fas fa-info-circle"></i>
                </button>
            <?php endif; ?>

            <?php if (comments_open()) : ?>
                <?php $number = get_comments_number($post->ID); if ($number > 0) : ?>
                    <a class="type-entry-comments" href="<?php comments_link(); ?>">
                        <i class="fas fa-comment"></i><span><?php comments_number('0', '1', '%'); ?></span>
                    </a>
                <?php endif; ?>
            <?php endif; ?>

        </div>

    </div>

    <?php if ($extra_value) : ?>
        <div class="type-entry-extra-expand">
            <div class="type-entry-extra-expand-inner">
                <p><?php echo esc_html($extra_value); ?></p>
            </div>
        </div>
    <?php endif; ?>

    <div class="type-entry-expand">
        <div class="type-entry-expand-inner group">

            <ul class="entry-share group">
                <li class="entry-share-x"><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?> - UFO Timeline" title="Share on X"><i class="fab fa-x-twitter"></i></a></li>
                <li class="entry-share-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" title="Share on Facebook"><i class="fab fa-facebook"></i></a></li>
                <li class="entry-share-reddit"><a href="https://reddit.com/submit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" title="Share on Reddit"><i class="fab fa-reddit"></i></a></li>
                <li class="entry-share-pinterest"><a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=&description=<?php the_title(); ?>" title="Share on Pinterest"><i class="fab fa-pinterest"></i></a></li>
                <li class="entry-share-linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" title="Share on Linkedin"><i class="fab fa-linkedin"></i></a></li>
            </ul>

        </div>
    </div>

</article>
