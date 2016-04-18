<?php

class SN_Admin {
	public function __construct() {
		$this->add_actions();
		$this->add_filters();
	}
/**
	 * Set the filters like add the sources after the post.
	 */
	private function add_filters() {}

	private function add_actions() {
		add_action( 'admin_head', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_bar_menu', array( $this, 'sweet_notifications' ), 999 );
	}

	public function sweet_notifications( $wp_admin_bar ) {
		$args = array(
			'id'    => 'sweet_notifications',
			'title' => 'Notifications',
			'meta'  => array( 
				'class' => 'sn-button ab-top-secondary',
				'html' => $this->notification_window()
			)
		);

		$wp_admin_bar->add_node( $args );
	}

	/**
	 * The types of styling the user can choose from for the sources listing.
	 */
	public function enqueue_scripts() {
		wp_enqueue_style( 'sn-notifications', plugins_url( '../assets/css/admin.min.css', __FILE__ ) );
	}

	/**
	 * The notifications dropdown demo content.
	 * 
	 * Main prefix for child elements - sw
	 */
	private function notification_window() {
		$output = "<div class='sweet-notifications sn sn-wrapper'>";
		$output .= $this->notification_message( 'notice', 'Example heading text', 'Example body text' );
		$output .= $this->notification_message( 'success', 'Another example for notification', 'Example body text' );
		$output .= $this->notification_message( 'error', 'Example heading text', 'This one has longer content text to display how it would look.' );
		$output .= $this->notification_footer();
		$output .= "</div>"; // Closing div for the notification window

		return $output;
	}

	/**
	 * Mark all notifications as completed or close the window
	 */
	private function notification_footer() {
		$output = "<footer class='sn-footer'>";
		$output .= "<button class='sn-close-window button'>Close</button>";
		$output .= "<button class='sn-close-all button button-primary'>Clear all</button>";
		$output .= "</footer>";

		return $output;
	}

	/**
	 * Single notification window (demo)
	 */
	private function notification_message( $type = 'wp', $title = 'Notification', $message = 'message' ) {
		$type = esc_html( $type );
		$title = esc_html( $title );
		$message = esc_html( $message );

		$output = "<div class='sn-notification sw-type-{$type}'>";
		
		// Close icon
		$output .= "<span class='sn-delete-notification dashicons dashicons-no'></span>";

		// Icon
		$output .= "<div class='sn-notification-icon-wrapper'>";
		$output .= "<span class='sn-notification-icon'>";
		$output .= "<span class='dashicons dashicons-wordpress'></span>";
		$output .= "</span>"; // End notification icon
		$output .= "</div>"; // End notification icon
		
		// Content
		$output .= "<div class='sn-notification-body'>";
		$output .= "<h3 class='sn-notification-title'>{$title}</h3>";
		$output .= "<p class='sn-notification-message'>{$message}</p>";
		$output .= "</div>"; // End notification body

		$output .= "</div>"; // End notification item

		return $output;
	}

}
