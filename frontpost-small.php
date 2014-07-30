            <a href="<?php the_permalink(); ?>">
                <div class="article">
                   <?php if (has_post_thumbnail()) { the_post_thumbnail( 'front-page-standard', array('class' => "article-thumb") ); }   else {echo '<img class="front-page-standard article-thumb" src="'.get_template_directory_uri().'/img/placeholder.png" />';} ?> 
                        <div class="article-info">
                            <h3 class="article-title"><?php the_title(); ?></h3>
                            <p class="article-description"><?php $myExcerpt = excerpt('32'); $tags = array("<p>", "</p>"); $myExcerpt = str_replace($tags, "", $myExcerpt); echo $myExcerpt; //seriously fuck wordpress and its errant tags ?></p></a>
                            <div class="article-meta">
                                    <div class="comment-num"><a href="#auth"><a href="<?php comments_link(); ?>"><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></a></a></div>
                                    <div class="author">By <?php the_author_posts_link(); ?></div>
                            </div>
                        </div>
                    </div>
                </a>

            <hr/>