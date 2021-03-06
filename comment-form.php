  
	
	<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>

		<p><?php printf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'p2'), site_url( '/wp-login.php?redirect_to=' . urlencode( get_permalink() ) ) ) ?></p>
    
	<?php else : // current user is allowed to comment ?>
    
 	   <form id="commentform" action="<?php echo site_url( 'wp-comments-post.php' ) ?>" method="post" name="commentform">
	        <div class="form">
  	          <b>
              	<?php if ( is_user_logged_in() ) : ?>
              		<?php printf( __( '<a href="%1$s">%2$s</a>', 'p2' ), site_url( '/wp-admin/profile.php' ), p2_get_user_identity() ); ?> 
              	<?php endif; ?>
  	          </b>
	            <textarea id="comment" class="expand50-100" name="comment" cols ="45" rows="3"></textarea>
	        </div>
	
	        <label class="post-error" for="comment" id="commenttext_error"></label>
	
	        <?php if ( !is_user_logged_in() ) : ?>
		
		        <table>
		        	<tr>
		        		<td>
		        			<label for="author"><?php _e('Name <em>(required)</em>', 'p2'); ?></label>
		        			<div class="form"><input id="author" name="author" type="text" value="<?php esc_attr_e( $comment_author ); ?>" /></div>
		        		</td>
		        		<td>
		        			<label for="email"><?php _e('Email <em>(required)</em>', 'p2'); ?></label>
		        			<div class="form"><input id="email" name="email" type="text" value="<?php esc_attr_e( $comment_author_email ); ?>"  /></div>
		        		</td>
		        		<td class="last-child">
		        			<label for="url"><?php _e('Web Site', 'p2'); ?></label>
		        			<div class="form"><input id="url" name="url" type="text" value="<?php esc_attr_e( $comment_author_url ); ?>"  /></div>
		        		</td>
		        	</tr>
		        </table>
				
	        <?php endif; // if user_ID ?>
			<?php do_action( 'comment_form' ); ?>
	
	        <div>
	            <input id="comment-submit" name="submit" type="submit" value="<?php esc_attr_e( 'Reply', 'p2' ); ?>" />
	            <?php echo cancel_comment_reply_link('Cancel') ?>
	            <?php comment_id_fields() ?>&nbsp;
	            
				<span class="progress">
	                <img src="<?php echo str_replace( WP_CONTENT_DIR, content_url(), locate_template( array( 'i/indicator.gif' ) ) ) ?>" alt="<?php esc_attr_e( 'Loading...', 'p2' ); ?>" title="<?php esc_attr_e( 'Loading...', 'p2' ); ?>" />
	            </span>
	        </div>
	
		</form>
	
	<?php endif; // comment registration ?>