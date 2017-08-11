<div class="random-testimonial <?php esc_attr_e( $div_class ); ?>"
     data-testimonials='<?php echo $testimonials; ?>'>
    <div class="content">
        <div class="contain small">
            <div class="random--testimonial__header">
				<?php echo wp_kses_post( $title ); ?>
            </div>
            <div class="testimonial">
                <p class="attribution"></p>
            </div>
        </div>
    </div>
</div>
