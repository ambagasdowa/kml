/*
* jQuery easyShare plugin
* Update on 04 april 2017
* Version 1.2
* moded version
* Licensed under GPL <http://en.wikipedia.org/wiki/GNU_General_Public_License>
* Copyright (c) 2008, St?hane Litou <contact@mushtitude.com>
* All rights reserved.
*
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

(function($){
$.fn.easyPaginate = function (options) {
    var defaults = {
        paginateElement: 'li',
        hashPage: 'page',
        elementsPerPage: 10,
        effect: 'default',
        slideOffset: 200,
        firstButton: true,
        firstButtonText: '<<',
        lastButton: true,
        lastButtonText: '>>',
        prevButton: true,
        prevButtonText: '<',
        nextButton: true,
        nextButtonText: '>',
        headerTable:'head',
        complete:null
    }

    return this.each (function (instance) {

        var plugin = {};
        plugin.el = $(this);
        plugin.el.addClass('easyPaginateList');

        plugin.settings = {
            pages: 0,
            objElements: Object,
            currentPage: 1
        }

        // NOTE addition
                // NOTE filter-controls
                console.log($('#details').attr('data-control'));
                // NOTE addition
                filter = 'all';
                $('#details').on('click',function(ev) {
  									ev.preventDefault();
  									if ($(this).attr('data-control') == undefined) {
  										// NOTE means the firts time  ? ? or maybe navigating
  										$(this).attr('data-control','1');
  										document.getElementById("details").text = "Detalle"
  									}
  									if ($(this).attr('data-control') == '0') {
                      $("#tableFilter tbody tr").show();
                      $("#tableFilter").find(".hideme").show();
                      $("#tableFilter tbody tr[id^='resume-filtered']").each(function(index,element){
                        $(this).hide();
                      });
  										$(this).attr('data-control','1');
  										document.getElementById("details").text = "Totales"
  									} else {
  										$("#tableFilter tbody tr").hide();
                      if (filter === 'all') {
                          var warOfTheClones =  plugin.settings.objElements.clone();
                          var filtered = warOfTheClones.filter(function(index){
                              return $(this).attr('id') === 'resume_footer';
                          }).show();
                          //NOTE  console.log(filtered);
                          filtered.each(function(index,element){
                            $(this).attr('id','resume-filtered');
                            $(this).find(".hideme").hide();
                            $("#tableFilter").find(".hideme").hide();
  										    });
                          console.log(filtered);
                          $("#tableFilter tbody").append(filtered);
                          console.log($("#tableFilter tbody tr"));
                      } else {
  										// NOTE can show the object
  										    $("#tableFilter tbody tr[id^='resume_footer']").each(function(index,element){
  												  $(this).show();
  										    });
                      }
  										document.getElementById("details").text = "Detalle"
  										$(this).attr('data-control','0');
  									}
  							});
                // NOTE Work from hir TODO
                finder = $("#tableFilter tbody tr");
                console.log('At init ... ');
                // headther = $("#tableFilter thead").clone();
                console.log(plugin.settings.headerTable);

  							$('#kwd_search').keyup(function() {
// TODO check the appended
                  var numbers = Math.ceil(plugin.settings.objElements.length / plugin.settings.elementsPerPage);

                  if(numbers > 1 ) {
                    $("#tableFilter tbody tr").hide();
                  }
  								var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
  										reg = RegExp(val, 'i'),
  										text;
                    finder.show().filter(function(index){
                    text = $(this).text().replace(/\s+/g, ' ');
                    return !reg.test(text);
                  }).hide();

                  if ( numbers > 1 ){
                    if ( $.isFunction( plugin.settings.complete ) ) {
                        plugin.settings.complete.call(this);
                        console.log('completeInsidehtmlNav');
                    }
                    $("#tableFilter thead").append(plugin.settings.headerTable);
                    $("#tableFilter tbody").append(finder);
                  }
  							});
                // NOTE addition
                // NOTE detail section

        var getNbOfPages = function() {
          var numPages = Math.ceil(plugin.settings.objElements.length / plugin.settings.elementsPerPage);
          console.log(numPages);
            return Math.ceil(plugin.settings.objElements.length / plugin.settings.elementsPerPage);
        };

        var displayNav = function() {

            htmlNav = '<div class="easyPaginateNav">';
            htmlNav += '<nav aria-label="Page navigation"><ul class="pagination">';
            if(plugin.settings.firstButton) {
                htmlNav += '<li><a href="#'+plugin.settings.hashPage+':1" title="First page" rel="1" class="first">'+plugin.settings.firstButtonText+'</a></li>';
                // console.log(plugin.settings.firstButtonText);
            }

            if(plugin.settings.prevButton) {
                htmlNav += '<li><a href="" title="Previous" rel="" class="prev">'+plugin.settings.prevButtonText+'</a></li>';
            }

            for(i = 1;i <= plugin.settings.pages;i++) {
                htmlNav += '<li><a href="#'+plugin.settings.hashPage+':'+i+'" title="Page '+i+'" rel="'+i+'" class="page">'+i+'</a></li>';
            };

            if(plugin.settings.nextButton) {
                htmlNav += '<li><a href="" title="Next" rel="" class="next">'+plugin.settings.nextButtonText+'</a></li>';
                // console.log('nextbtn');
                // console.log(plugin.settings.nextButtonText);
            }

            if(plugin.settings.lastButton) {
                htmlNav += '<li><a href="#'+plugin.settings.hashPage+':'+plugin.settings.pages+'" title="Last page" rel="'+plugin.settings.pages+'" class="last">'+plugin.settings.lastButtonText+'</a></li>';
            }

            htmlNav += '</ul></nav>';
            htmlNav += '</div>';

            plugin.nav = $(htmlNav);
            plugin.nav.css({
                'width': plugin.el.width()
            });
            plugin.el.after(plugin.nav);

            var elSelector = '#' + plugin.el.get(0).id + ' + ';
            console.log(elSelector);
            $(elSelector + ' .easyPaginateNav a.page,'
                + elSelector + ' .easyPaginateNav a.first,'
                + elSelector + ' .easyPaginateNav a.last').on('click', function(e) {
                e.preventDefault();
                displayPage($(this).attr('rel'));
            });

            $(elSelector + ' .easyPaginateNav a.prev').on('click', function(e) {
                e.preventDefault();
                page = plugin.settings.currentPage > 1 ? parseInt(plugin.settings.currentPage) - 1:1;
                displayPage(page);
            });

            $(elSelector + ' .easyPaginateNav a.next').on('click', function(e) {
                e.preventDefault();
                page = plugin.settings.currentPage < plugin.settings.pages?parseInt(plugin.settings.currentPage) + 1:plugin.settings.pages;
                console.log(page);
                displayPage(page);
            });

            // NOTE addition
                        // if ( $.isFunction( plugin.settings.complete ) ) {
                        //     plugin.settings.complete.call(this);
                        //     console.log('completeInsidePluginDisplayNav');
                        // }
            // NOTE addition

        };

        var displayPage = function(page, forceEffect) {
          // console.log('inFunction page ' + page + ' plug ' + plugin.settings.currentPage);
            if(plugin.settings.currentPage != page) {
              console.log(' inside != after = page ' + page + ' plug ' + plugin.settings.currentPage);
              console.log('details ==> ' + $(this).attr('data-control'));
                if (plugin.settings.currentPage === undefined && page == 1) {
                  pagecheck = 0;
                } else {
                  pagecheck = 1;
                }
                plugin.settings.currentPage = parseInt(page);
                // NOTE ADDITION
                                document.getElementById("details").text = "Totales"
                                $("#tableFilter").find(".hideme").show();
                                // for some reason we need execute a query on button
                                // console.log('before setting page ' + page + ' plug ' + plugin.settings.currentPage);
                                console.log('details =Z ' + $(this).attr('data-control'));
                                console.log('pagecheck');
                                console.log(pagecheck);
                                if (pagecheck == 1 ) {
                                  // document.getElementById("details").click();
                                }

                // NOTE ADDITION

                console.log('page in ');
                // NOTE Work form hir to Search pluging implementation
                // console.log(typeof(plugin.settings.objElements));
                // console.log('before-at-end -plugin.settings.objElements')
                // console.log(plugin.settings.objElements);
                // console.log('after-plugin.settings.objElements')

                offsetStart = (page - 1) * plugin.settings.elementsPerPage;
                console.log('offsetStart :' + offsetStart);

                offsetEnd = page * plugin.settings.elementsPerPage;
                console.log('offsetEnd :' + offsetEnd);


                if(typeof(forceEffect) != 'undefined') {
                    eval("transition_"+forceEffect+"("+offsetStart+", "+offsetEnd+")");
                }else {
                    eval("transition_"+plugin.settings.effect+"("+offsetStart+", "+offsetEnd+")");
                }

                console.log('page first => ' + page);
                console.log('plugin.settings.pages => ' + plugin.settings.pages);

                plugin.nav.find('.current').removeClass('current');
                plugin.nav.find('a.page:eq('+(page - 1)+')').addClass('current');

                // addition
                // NOTE fix the pager when is in the first page
                if (page == 1) {
                  plugin.nav.find('.first').addClass('current');
                  plugin.nav.find('.prev').addClass('current');
                } else {
                  plugin.nav.find('.first').removeClass('current');
                  plugin.nav.find('.prev').removeClass('current');
                }

                // NOTE fix the pager when is in the last page
                if (page == plugin.settings.pages) {
                  plugin.nav.find('.last').addClass('current');
                  plugin.nav.find('.next').addClass('current');
                } else {
                  plugin.nav.find('.last').removeClass('current');
                  plugin.nav.find('.next').removeClass('current');
                }

                switch(plugin.settings.currentPage) {
                    case 1:
                        $('.easyPaginateNav a', plugin).removeClass('disabled');
                        $('.easyPaginateNav a.first, .easyPaginateNav a.prev', plugin).addClass('disabled');
                        break;
                    case plugin.settings.pages:
                        $('.easyPaginateNav a', plugin).removeClass('disabled');
                        $('.easyPaginateNav a.last, .easyPaginateNav a.next', plugin).addClass('disabled');
                        break;
                    default:
                        $('.easyPaginateNav a', plugin).removeClass('disabled');
                        break;
                }
            }
// NOTE addition
            if ( $.isFunction( plugin.settings.complete ) ) {
                plugin.settings.complete.call(this);
                // console.log(this);
                console.log('completeInsidePluginDisplayPage');
            }
// NOTE addition
        };

        var transition_default = function(offsetStart, offsetEnd) {
            plugin.currentElements.hide();
            plugin.currentElements = plugin.settings.objElements.slice(offsetStart, offsetEnd).clone();
            plugin.el.html(plugin.currentElements);
            plugin.currentElements.show();
        };

        var transition_fade = function(offsetStart, offsetEnd) {
            plugin.currentElements.fadeOut();
            plugin.currentElements = plugin.settings.objElements.slice(offsetStart, offsetEnd).clone();
            plugin.el.html(plugin.currentElements);
            plugin.currentElements.fadeIn();
        };

        var transition_slide = function(offsetStart, offsetEnd) {
            plugin.currentElements.animate({
                'margin-left': plugin.settings.slideOffset * -1,
                'opacity': 0
            }, function() {
                $(this).remove();
            });

            plugin.currentElements = plugin.settings.objElements.slice(offsetStart, offsetEnd).clone();
            plugin.currentElements.css({
                'margin-left': plugin.settings.slideOffset,
                'display': 'block',
                'opacity': 0,
                'min-width': plugin.el.width() / 2
            });
            plugin.el.html(plugin.currentElements);
            plugin.currentElements.animate({
                'margin-left': 0,
                'opacity': 1
            });
        };

        var transition_climb = function(offsetStart, offsetEnd) {
            plugin.currentElements.each(function(i) {
                var $objThis = $(this);
                setTimeout(function() {
                    $objThis.animate({
                        'margin-left': plugin.settings.slideOffset * -1,
                        'opacity': 0
                    }, function() {
                        $(this).remove();
                    });
                }, i * 200);
            });

            plugin.currentElements = plugin.settings.objElements.slice(offsetStart, offsetEnd).clone();
            plugin.currentElements.css({
                'margin-left': plugin.settings.slideOffset,
                'display': 'block',
                'opacity': 0,
                'min-width': plugin.el.width() / 2
            });
            plugin.el.html(plugin.currentElements);
            plugin.currentElements.each(function(i) {
                var $objThis = $(this);
                setTimeout(function() {
                    $objThis.animate({
                        'margin-left': 0,
                        'opacity': 1
                    });
                }, i * 200);
            });
        };

        plugin.settings = $.extend({}, defaults, options);

        plugin.currentElements = $([]);
        plugin.settings.objElements = plugin.el.find(plugin.settings.paginateElement);

        plugin.settings.pages = getNbOfPages();
        if(plugin.settings.pages > 1) {
            plugin.el.html();
            console.log('inside if plugin '+ plugin.settings.pages);
            // Here we go
            displayNav();

            page = 1;
            if(document.location.hash.indexOf('#'+plugin.settings.hashPage+':') != -1) {
                page = parseInt(document.location.hash.replace('#'+plugin.settings.hashPage+':', ''));
                if(page.length <= 0 || page < 1 || page > plugin.settings.pages) {
                    page = 1;
                }
            }

            displayPage(page, 'default');
        }
    });
};
})(jQuery);
