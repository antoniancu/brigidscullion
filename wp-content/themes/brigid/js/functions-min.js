!function($){function t(){643>n.width()?(i.attr("aria-expanded","false"),r.attr("aria-expanded","false"),i.attr("aria-controls","primary-menu")):(i.removeAttr("aria-expanded"),r.removeAttr("aria-expanded"),i.removeAttr("aria-controls"))}var e=$("body"),n=$(window),a,i,r;if(a=$("#site-navigation"),i=a.find(".menu-toggle"),r=a.find(".nav-menu"),$(function(){if(e.is(".sidebar")){var t=$("#secondary .widget-area"),a=0===t.length?-40:t.height(),i=$("#tertiary .widget-area").height()-$("#content").height()-a;i>0&&n.innerWidth()>999&&$("#colophon").css("margin-top",i+"px")}}),function(){if(a&&i){if(!r||!r.children().length)return void i.hide();i.on("click.twentythirteen",function(){a.toggleClass("toggled-on"),a.hasClass("toggled-on")?($(this).attr("aria-expanded","true"),r.attr("aria-expanded","true")):($(this).attr("aria-expanded","false"),r.attr("aria-expanded","false"))}),"ontouchstart"in window&&r.find(".menu-item-has-children > a, .page_item_has_children > a").on("touchstart.twentythirteen",function(t){var e=$(this).parent("li");e.hasClass("focus")||(t.preventDefault(),e.toggleClass("focus"),e.siblings(".focus").removeClass("focus"))}),r.find("a").on("focus.twentythirteen blur.twentythirteen",function(){$(this).parents(".menu-item, .page_item").toggleClass("focus")})}}(),n.on("load.twentythirteen",t).on("resize.twentythirteen",function(){t()}),n.on("hashchange.twentythirteen",function(){var t=document.getElementById(location.hash.substring(1));t&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),$.isFunction($.fn.masonry)){var o=e.is(".sidebar")?228:245;$("#secondary .widget-area").masonry({itemSelector:".widget",columnWidth:o,gutterWidth:20,isRTL:e.is(".rtl")})}}(jQuery),jQuery(document).ready(function($){$(".slick-carousel").slick({prevArrow:'<button type="button" class="slick-prev"><</button>',nextArrow:'<button type="button" class="slick-next">></button>',centerMode:!0})});