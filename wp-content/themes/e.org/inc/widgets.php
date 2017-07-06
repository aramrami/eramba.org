<?php
class Eramba_Widget_Latest_News extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'latest-news', // Base ID
			'Eramba: ' . __('Latest News', 'eramba'), // Name
			array( 'description' => __( 'Display latest news with thumbnails.', 'eramba' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		if (!isset($instance['show_img'])) {
			$instance['show_img'] = false;
		}

		$args_query = array(
			'post_type' => 'post',
			'posts_per_page' => (int) $instance['number'],
			'post_status' => 'publish',
			'orderby' => 'date'
		);
		$posts = new WP_Query( $args_query );
		?>
		<?php if ( $posts->have_posts() ) : ?>
			<ul class="list-unstyled">
				<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

					<li class="widget-latest-post-item">
						<div class="row">
							<?php
							$class = 'col-xs-8';
							if (!$instance['show_img']) {
								$class = 'col-xs-12';
							}
							?>

							<?php if ($instance['show_img']) : ?>
								<div class="col-xs-4">
									<div class="latest-post-image">
										<?php if ( has_post_thumbnail() ) : ?>
											<a href="<?php the_permalink(); ?>" class="">
												<?php the_post_thumbnail( 'widget-thumb', array( 'class' => 'img-responsive' ) ); ?>
											</a>
										<?php else : ?>
											<a href="<?php the_permalink(); ?>" class="no-image">
												<img src="<?php echo THEME_IMG . 'widget-latest-post-blank.jpg'; ?>" class='img-responsive' />
											</a>
										<?php endif; ?>
									</div>
								</div>
							<?php endif; ?>
							<div class="<?php echo $class; ?>">
								<div class="latest-post-info">
									<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
									<p class="latest-post-date"><?php echo get_the_date( 'F j, Y' ); ?></p>
								</div>
							</div>
						</div>
					</li>

				<?php endwhile; ?>
			</ul>
		<?php else : ?>
			<p><?php _e( 'No posts found.', 'eramba' ); ?>
		<?php endif; ?>

		<?php wp_reset_postdata();
		
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		}
		else {
			$title = __( 'Latest News', 'eramba' );
		}
		$number = isset( $instance['number'] ) ? $instance['number'] : 3;
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'eramba' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'eramba' ); ?></label> 
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="2" />
		</p>
		<p>
			<input id="<?php echo $this->get_field_id('show_img'); ?>" name="<?php echo $this->get_field_name('show_img'); ?>" type="checkbox" <?php checked(isset($instance['show_img']) ? $instance['show_img'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('show_img'); ?>"><?php _e('Show image thumbnail', 'eramba'); ?></label>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';
		$instance['show_img'] = isset($new_instance['show_img']);

		return $instance;
	}

} // class Eramba_Widget_Latest_News


class Eramba_Widget_Table_Of_Contents extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'table-of-contents', // Base ID
			'Eramba: ' . __('Table Of Contents', 'eramba'), // Name
			array( 'description' => __( 'Generate page overview.', 'eramba' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		?>
		<nav  id="table-of-contents" class="table-of-contents" role="navigation">
		</nav>
		<div class="text-center">
			<a href="<?php echo get_page_link(DOC_PAGE_ID); ?>" class="btn btn-default">
				<?php _e('Go to Documentation', 'eramba'); ?>
			</a>
		</div>
		
		<?php echo $args['after_widget'];

		wp_enqueue_script( 'eramba-table-of-contents', THEME_JS . 'toc.js', array( 'jquery' ) );
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		}
		else {
			$title = __( 'Contents', 'eramba' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'eramba' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class Eramba_Widget_Latest_News



class WP_Widget_Video extends WP_Widget {
	
	function WP_Widget_Video() {
		$widget_ops = array(
			'classname' => 'video-widget',
			'description' => __( 'Embeds vimeo and youtube videos', 'eramba' )
		);
		
		$control_ops = array(
			'id_base' => 'video-widget'
		);
		
		@$this->WP_Widget( 'video-widget', 'Eramba: ' . __( 'Video', 'eramba' ), $widget_ops, $control_ops );
	}
	
	function form($instance) {
		$defaults = array('title' => __( 'Video', 'eramba' ), 'video_type' => '', 'video' => '');
		$instance = wp_parse_args( (array) $instance, $defaults );
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'eramba' ) ?></label>
			<input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?> " value="<?php echo $instance['title'] ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('video_type'); ?>"><?php _e( 'Video Type:', 'eramba' ) ?></label>
			<select id="<?php echo $this->get_field_id('video_type'); ?>" name="<?php echo $this->get_field_name('video_type'); ?>" class="widefat">
				<option value=""><?php _e( 'Select Video Type', 'eramba' ); ?></option>
				<option value="Youtube"<?php if ($instance['video_type'] == 'Youtube') { echo ' selected="selected"'; } ?>><?php _e( 'Youtube', 'eramba' ); ?></option>
				<option value="Vimeo"<?php if ($instance['video_type'] == 'Vimeo') { echo ' selected="selected"'; } ?>><?php _e( 'Vimeo', 'eramba' ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('video'); ?>"><?php _e( 'Video ID:', 'eramba' ) ?></label>
			<input type="text" name="<?php echo $this->get_field_name('video') ?>" id="<?php echo $this->get_field_id('video') ?> " value="<?php echo $instance['video'] ?>" class="widefat">
		</p>
		
<?php
	}
	
	// used when the user saves their widget options
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['video_type'] = $new_instance['video_type'];
		$instance['video'] = $new_instance['video'];
		
		return $instance;
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = $instance['title'];
		$video_type = $instance['video_type'];
		$video = $instance['video'];
		
		$out = '<div class="video-wrapper">';
		
		if ($video_type == 'Youtube') {
			$out .= '<iframe src="http://www.youtube.com/embed/'.$video.'" style="display:block;width:100%;border:0;" height="250"></iframe>';
		}
		else if ($video_type == 'Vimeo') {
			$out .= '<iframe src="http://player.vimeo.com/video/'.$video.'?title=0&amp;byline=0&amp;portrait=0" height="250" style="display:block;width:100%;border:0;"></iframe>';
		}
		
		$out .= '</div>';
		
		echo $before_widget;
		if ( $title )
			echo $before_title.$title.$after_title;
		
		echo $out;
		echo $after_widget;
	}

}