<script type="text/javascript" src="storage/js/jquery.min.js"></script>
    <script src="storage/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="storage/plugins/swiper/js/swiper-bundle.min9ed2.js?v=1736487372"></script>

    <script src="storage/plugins/ui/library.js"></script>
    <script src="storage/plugins/ui/ui.js"></script>
    <script src="storage/plugins/ui/en.js"></script>
    <script type="text/javascript" src="storage/plugins/aos/aos.js"></script>
    <script>
        ELEMENT.locale(ELEMENT.lang.en);
        $(document).ready(function () {
            AOS.init();
        });
    </script>

    <script type="text/javascript" src="storage/js/owl.carousel.min9ed2.js?v=1736487372"></script>
    <script type="text/javascript" src="storage/js/tools.min9ed2.js?v=1736487372"></script>
    <script type="text/javascript" src="storage/js/revolution.min9ed2.js?v=1736487372"></script>
    <script type="text/javascript" src="storage/js/wow9ed2.js?v=1736487372"></script>
    <script type="text/javascript" src="storage/js/forall9ed2.js?v=1736487372"></script>
    <script type="text/javascript" src="storage/js/waypoints.min9ed2.js?v=1736487372"></script>
    <script type="text/javascript" src="storage/js/countup9ed2.js?v=1736487372"></script>
    <script type="text/javascript" src="storage/js/main.min9ed2.js?v=1736487372"></script>
    <script type="text/javascript" src="storage/js/app.min9ed2.js?v=1736487372"></script>
    <script>
        $(document).ready(function () {
            var setREVStartSize = function () {
                var tpopt = new Object();
                tpopt.startwidth = 1648;
                tpopt.startheight = 700;
                tpopt.container = jQuery("#rev_slider_8_1");
                tpopt.fullScreen = "off";
                tpopt.forceFullWidth = "off";

                tpopt.container.closest(".rev_slider_wrapper").css({ height: tpopt.container.height() });
                tpopt.width = parseInt(tpopt.container.width(), 0);
                tpopt.height = parseInt(tpopt.container.height(), 0);
                tpopt.bw = tpopt.width / tpopt.startwidth;
                tpopt.bh = tpopt.height / tpopt.startheight;
                if (tpopt.bh > tpopt.bw) tpopt.bh = tpopt.bw;
                if (tpopt.bh < tpopt.bw) tpopt.bw = tpopt.bh;
                if (tpopt.bw < tpopt.bh) tpopt.bh = tpopt.bw;
                if (tpopt.bh > 1) {
                    tpopt.bw = 1;
                    tpopt.bh = 1;
                }
                if (tpopt.bw > 1) {
                    tpopt.bw = 1;
                    tpopt.bh = 1;
                }
                tpopt.height = Math.round(tpopt.startheight * (tpopt.width / tpopt.startwidth));
                if (tpopt.height > tpopt.startheight && tpopt.autoHeight != "on") tpopt.height = tpopt.startheight;
                if (tpopt.fullScreen == "on") {
                    tpopt.height = tpopt.bw * tpopt.startheight;
                    var cow = tpopt.container.parent().width();
                    var coh = jQuery(window).height();
                    if (tpopt.fullScreenOffsetContainer != undefined) {
                        try {
                            var offcontainers = tpopt.fullScreenOffsetContainer.split(",");
                            jQuery.each(offcontainers, function (e, t) {
                                coh = coh - jQuery(t).outerHeight(true);
                                if (coh < tpopt.minFullScreenHeight) coh = tpopt.minFullScreenHeight;
                            });
                        } catch (e) { }
                    }
                    tpopt.container.parent().height(coh);
                    tpopt.container.height(coh);
                    tpopt.container.closest(".rev_slider_wrapper").height(coh);
                    tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);
                    tpopt.container.css({ height: "100%" });
                    tpopt.height = coh;
                } else {
                    tpopt.container.height(tpopt.height);
                    tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);
                    tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);
                }
            };

            /* CALL PLACEHOLDER */
            setREVStartSize();

            var tpj = jQuery;
            tpj.noConflict();
            var revapi8;

            tpj(document).ready(function () {
                if (tpj("#rev_slider_8_1").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_8_1");
                } else {
                    revapi8 = tpj("#rev_slider_8_1").show().revolution({
                        dottedOverlay: "none",
                        delay: 9000,
                        startwidth: 1648,
                        startheight: 700,
                        hideThumbs: 200,

                        thumbWidth: 100,
                        thumbHeight: 50,
                        thumbAmount: 5,

                        simplifyAll: "off",

                        navigationType: "bullet",
                        navigationArrows: "solo",
                        navigationStyle: "round",

                        touchenabled: "on",
                        onHoverStop: "on",
                        nextSlideOnWindowFocus: "off",

                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        drag_block_vertical: false,

                        keyboardNavigation: "off",

                        navigationHAlign: "center",
                        navigationVAlign: "bottom",
                        navigationHOffset: 0,
                        navigationVOffset: 20,

                        soloArrowLeftHalign: "left",
                        soloArrowLeftValign: "center",
                        soloArrowLeftHOffset: 20,
                        soloArrowLeftVOffset: 0,

                        soloArrowRightHalign: "right",
                        soloArrowRightValign: "center",
                        soloArrowRightHOffset: 20,
                        soloArrowRightVOffset: 0,

                        shadow: 2,
                        fullWidth: "on",
                        fullScreen: "off",

                        spinner: "spinner0",

                        stopLoop: "off",
                        stopAfterLoops: -1,
                        stopAtSlide: -1,

                        shuffle: "off",

                        autoHeight: "off",
                        forceFullWidth: "off",

                        hideThumbsOnMobile: "off",
                        hideNavDelayOnMobile: 1500,
                        hideBulletsOnMobile: "off",
                        hideArrowsOnMobile: "off",
                        hideThumbsUnderResolution: 0,

                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        startWithSlide: 0,
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            (function ($) {
                $('[data-toggle="counter-up"]').counterUp({
                    delay: 1,
                    time: 500,
                });
            })(jQuery);
        });
    </script>
    <script>
        $(document).ready(function () {
            var owl = jQuery("#1728441874_67");
            owl.owlCarousel({
                items: 4,
                itemsDesktop: [1024, 4],
                itemsDesktopSmall: [991, 3],
                itemsTablet: [768, 2],
                itemsMobile: [480, 1],
                pagination: true,
                autoPlay: 5000,
                lazyLoad: true,
                afterAction: function (el) {
                    jQuery("#1728441874_67").show();
                },
            });
            jQuery(".next_1728441874_67").click(function () {
                owl.trigger("owl.next");
            });
            jQuery(".prev_1728441874_67").click(function () {
                owl.trigger("owl.prev");
            });
        });
    </script>

    <script>
    </script>