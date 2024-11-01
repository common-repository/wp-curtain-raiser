(function($) {
    $(document).ready(function() {
        var curtainOpen = false;

        $(".rope").click(function() {
            $(this).blur();
            if (!curtainOpen) {
                openCurtain(this);
            } else {
                closeCurtain(this);
            }
            return false;
        });

        function openCurtain(rope) {
            $(rope).stop().animate({ top: '0px' }, { queue: false, duration: 350, easing: 'easeOutBounce' });
            $(".leftcurtain, .rightcurtain").stop().animate({ width: '0px' }, 2000);
            curtainOpen = true;
        }

        function closeCurtain(rope) {
            $(rope).stop().animate({ top: '-40px' }, { queue: false, duration: 350, easing: 'easeOutBounce' });
            $(".leftcurtain").stop().animate({ width: '50%' }, 2000);
            $(".rightcurtain").stop().animate({ width: '50%' }, 2000); // Adjusted to 50% for consistency
            curtainOpen = false;
        }

    });
})(jQuery);
