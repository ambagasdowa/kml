

require.config({
    baseUrl: './',
    paths: {
		'jquery': webroot + "js/devoops/jquery/jquery.min",
		'bootstrap': webroot + "js/devoops/bootstrap/bootstrap.min",
		'sparkline': webroot + "js/devoops/sparkline/jquery.sparkline.min",
		'raphael': webroot + "js/devoops/raphael/raphael-min",
		'morris': webroot + "js/devoops/morris/morris",
		'fancybox': webroot + "js/devoops/fancybox/jquery.fancybox.pack",
		'isotope':webroot + "js/devoops/isotope/isotope.pkgd",
		'jquery-ui': webroot + "js/devoops/jquery-ui/jquery-ui",
		'waypoints': webroot + "js/devoops/waypoints/jquery.waypoints.min",
		'moment': webroot + "js/devoops/moment/moment.min",
		'fullcalendar': webroot + "js/devoops/fullcalendar/fullcalendar.min",
		'owl': webroot + "js/devoops/owl/owl.carousel.min"

    },
    shim: {
        'bootstrap': ['jquery']
    },
    map: {
        '*': {
            'jquery': 'jQueryNoConflict'
        },
        'jQueryNoConflict': {
            'jquery': 'jquery'
        }
    }
});
define('jQueryNoConflict', ['jquery'], function ($) {
    return $.noConflict();
});

// define('jQueryNoConflict',['jquery'], function (JQuery) {
//     return JQuery.noConflict( true );
// });

if (Prototype.BrowserFeatures.ElementExtensions) {
    require(['jquery', 'bootstrap'], function ($) {
        // Fix incompatibilities between BootStrap and Prototype
        var disablePrototypeJS = function (method, pluginsToDisable) {
                var handler = function (event) {  
                    event.target[method] = undefined;
                    setTimeout(function () {
                        delete event.target[method];
                    }, 0);
                };
                pluginsToDisable.each(function (plugin) { 
                    $(window).on(method + '.bs.' + plugin, handler); 
                });
            },
            pluginsToDisable = ['collapse', 'dropdown', 'modal', 'tooltip', 'popover', 'tab'];
        disablePrototypeJS('show', pluginsToDisable);
        disablePrototypeJS('hide', pluginsToDisable);
    });
}
