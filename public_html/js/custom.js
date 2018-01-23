/*global jQuery:false */
jQuery(document).ready(function ($) {
    "use strict";


    //add some elements with animate effect

    $(".big-cta").hover(
        function () {
            $('.cta a').addClass("animated shake");
        },
        function () {
            $('.cta a').removeClass("animated shake");
        }
    );
    $(".box").hover(
        function () {
            $(this).find('.icon').addClass("animated fadeInDown");
            $(this).find('p').addClass("animated fadeInUp");
        },
        function () {
            $(this).find('.icon').removeClass("animated fadeInDown");
            $(this).find('p').removeClass("animated fadeInUp");
        }
    );


    $('.accordion').on('show', function (e) {

        $(e.target).prev('.accordion-heading').find('.accordion-toggle').addClass('active');
        $(e.target).prev('.accordion-heading').find('.accordion-toggle i').removeClass('icon-plus');
        $(e.target).prev('.accordion-heading').find('.accordion-toggle i').addClass('icon-minus');
    });

    $('.accordion').on('hide', function (e) {
        $(this).find('.accordion-toggle').not($(e.target)).removeClass('active');
        $(this).find('.accordion-toggle i').not($(e.target)).removeClass('icon-minus');
        $(this).find('.accordion-toggle i').not($(e.target)).addClass('icon-plus');
    });


    //register/login form
    $(function () {
        $('.button-checkbox').each(function () {

            // Settings
            var $widget = $(this),
                $button = $widget.find('button'),
                $checkbox = $widget.find('input:checkbox'),
                color = $button.data('color'),
                settings = {
                    on: {
                        icon: 'glyphicon glyphicon-check'
                    },
                    off: {
                        icon: 'glyphicon glyphicon-unchecked'
                    }
                };

            // Event Handlers
            $button.on('click', function () {
                $checkbox.prop('checked', !$checkbox.is(':checked'));
                $checkbox.triggerHandler('change');
                updateDisplay();
            });
            $checkbox.on('change', function () {
                updateDisplay();
            });

            // Actions
            function updateDisplay() {
                var isChecked = $checkbox.is(':checked');

                // Set the button's state
                $button.data('state', (isChecked) ? "on" : "off");

                // Set the button's icon
                $button.find('.state-icon')
                    .removeClass()
                    .addClass('state-icon ' + settings[$button.data('state')].icon);

                // Update the button's color
                if (isChecked) {
                    $button
                        .removeClass('btn-default')
                        .addClass('btn-' + color + ' active');
                }
                else {
                    $button
                        .removeClass('btn-' + color + ' active')
                        .addClass('btn-default');
                }
            }

            // Initialization
            function init() {

                updateDisplay();

                // Inject the icon if applicable
                if ($button.find('.state-icon').length == 0) {
                    $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
                }
            }

            init();
        });
    });


    // tooltip
    $('.social-network li a, .options_box .color a').tooltip();


    //stats
    jQuery('.appear').appear();
    var runOnce = true;
    jQuery(".stats").on("appear", function (data) {
        var counters = {};
        var i = 0;
        if (runOnce) {
            jQuery('.number').each(function () {
                counters[this.id] = $(this).html();
                i++;
            });
            jQuery.each(counters, function (i, val) {
                //console.log(i + ' - ' +val);
                jQuery({countNum: 0}).animate({countNum: val}, {
                    duration: 3000,
                    easing: 'linear',
                    step: function () {
                        jQuery('#' + i).text(Math.floor(this.countNum));
                    }
                });
            });
            runOnce = false;
        }
    });
    //scroll to top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });
    $('.scrollup').click(function () {
        $("html, body").animate({scrollTop: 0}, 1000);
        return false;
    });


    //search
    new UISearch(document.getElementById('sb-search'));
});
/**
 *Tawk.to api scrip
 */
var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
(function () {
    var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/5a048cb4198bd56b8c03a3c0/default';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
})();
setTimeout(function () {
    $(".myAlert-top").hide();
}, 10000);
$('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var recipient = button.data('name'); // Extract info from data-* attributes
    var product_id = button.data('id');
    console.log(recipient);
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('.modal-title').text('Update no. of kgs for ' + recipient);
    modal.find('#product_id').val(product_id)
});