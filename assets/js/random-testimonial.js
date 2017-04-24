jQuery(function ($) {
    // Get all image URLs from the parent UL data attribute (already added in JSON format)
    var $data = $('.testimonial_block').data('testimonials');
    var $child = $('.testimonial_block .testimonial');
    var data_count = $($data).length;
    var child_count = $($child).length;

    if (data_count >= child_count) {
        $child.each(function (index) {
            /**
             * Get random value from array.
             *
             * @link http://stackoverflow.com/a/4550514
             */
            var rand = $data[Math.floor(Math.random() * $data.length)];

            /**
             * Remove rand from array so it can't be shown again.
             *
             * @link http://stackoverflow.com/a/3596141
             */
            //$data.splice($.inArray(rand, $data), 1);

            var $this = $(this);

            if(rand['content']) {
                var content = rand['content'];
                $this.prepend(content);
            }

            if (rand['name']) {
                $this.find('.attribution').text(rand['name']);
            }
        });
    }
});
