jQuery(function ($) {
    var $data = $('.random-testimonial').data('testimonials');
    var $child = $('.random-testimonial__body');
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
                // var content = rand['content'];
                // $this.prepend(content);

                $this.find('.random-testimonial__content').prepend(rand['content']);
            }

            if (rand['name']) {
                if (rand['byline']) {
                    rand['name'] = rand['name'] + ',';
                }

                $this.find('.random-testimonial__name').prepend(rand['name']);
            }

            if (rand['byline']) {

                $this.find('.random-testimonial__byline').text(rand['byline']);
            }
        });
    }
});
