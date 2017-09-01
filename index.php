<?php
/**
 * The template for displaying the home/index page.
 * This template will also be called in any case where the Wordpress engine 
 * doesn't know which template to use (e.g. 404 error)
 */

get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="primary" class="row-fluid">
		<div id="content" role="main" class="span8 offset2">

			<?php if ( have_posts() ) : 
			// Do we have any posts in the databse that match our query?
			// In the case of the home page, this will call for the most recent posts 
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have some posts to show, start a loop that will display each one the same way
				?>

					<article class="post">
					
						<?php the_post_thumbnail('large'); //Get the thumbnail to this post. ?>

						<h1 class="title">
							<a href="<?php the_permalink(); // Get the link to this post ?>" title="<?php the_title(); ?>">
								<?php the_title(); // Show the title of the posts as a link ?>
							</a>
						</h1>
						<div class="post-meta">
							<?php the_time('m/d/Y'); // Display the time published ?> | 
							<?php if( comments_open() ) : // If we have comments open on this post, display a link and count of them ?>
								<span class="comments-link">
									<?php comments_popup_link( __( 'Comment', 'break' ), __( '1 Comment', 'break' ), __( '% Comments', 'break' ) ); 
									// Display the comment count with the applicable pluralization
									?>
								</span>
							<?php endif; ?>
						
						</div><!--/post-meta -->
						
						<div class="the-content">
							<?php the_content( 'Continue...' ); 
							// This call the main content of the post, the stuff in the main text box while composing.
							// This will wrap everything in p tags and show a link as 'Continue...' where/if the
							// author inserted a <!-- more --> link in the post body
							?>
							
							<?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
						</div><!-- the-content -->
		
						<div class="meta clearfix">
							<div class="category"><?php echo get_the_category_list(); // Display the categories this post belongs to, as links ?></div>
							<div class="tags"><?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?></div>
						</div><!-- Meta -->
						
					</article>

				<?php endwhile; // OK, let's stop the posts loop once we've exhausted our query/number of posts ?>
				
				<!-- pagintation -->
				<div id="pagination" class="clearfix">
					<div class="past-page"><?php previous_posts_link( 'newer' ); // Display a link to  newer posts, if there are any, with the text 'newer' ?></div>
					<div class="next-page"><?php next_posts_link( 'older' ); // Display a link to  older posts, if there are any, with the text 'older' ?></div>
				</div><!-- pagination -->


			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">Nothing has been posted like that yet</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) ?>
		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>