# Random Testimonial

WordPress plugin which creates a testimonial post type and then shows one testimonial at random on your website.

NB. This plugin is aimed at developers and the random testimonial output must be added manually in your plugin or theme. The following is an example in a Genesis theme.

```php
if ( function_exists( 'NickDavis\RandomTestimonial\do_random_testimonial' ) ) {
		add_action( 'genesis_after_content_sidebar_wrap', 'NickDavis\RandomTestimonial\do_random_testimonial' );
	}
```
