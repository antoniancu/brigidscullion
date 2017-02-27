var $ = jQuery.noConflict();
$(document).ready(function () {
	$(".panel-heading").click(function(){
		$(".panel-body").toggle("slow");
	});

    $('.property-listing').syncHeight(); 
        $('.half-width').syncHeight();
	

	$(window).resize(function(){
		if($(window).width() < 500){
		
		$('.property-listing').unSyncHeight();
		$('.half-width').unSyncHeight();
		}
		else{

		$('.property-listing').syncHeight(); 
		$('.half-width').syncHeight();
		}

	});
	$('.articles-new-second').hide();
        $('#readmore').click(function() {
            $('.articles-new-second').slideDown(300);
            $(this).hide();
             $('#less').show(); 
        });
        $('#less').click(function() {
            $('.articles-new-second').slideUp(300);
            $(this).hide();
            $('#readmore').show(); 
        });

        $('.service_content_second').hide();
        $('#readmore_service').click(function() {
            $('.service_content_second').slideDown(300);
            $(this).hide();
             $('#less_service').show(); 
        });
        $('#less_service').click(function() {
            $('.service_content_second').slideUp(300);
            $(this).hide();
            $('#readmore_service').show(); 
        });

        $('.property_content_second').hide();
        $('#readmore_property').click(function() {
            $('.property_content_second').slideDown(300);
            $(this).hide();
             $('#less_property').show(); 
        });
        $('#less_property').click(function() {
            $('.property_content_second').slideUp(300);
            $(this).hide();
            $('#readmore_property').show(); 
        });


  
    fields = ['phone_number']

     $.each( fields, function (index, value) {
        $('input.'+value).formance('format_'+value)
                         //.addClass('form-control')
                         //.wrap('<div class=\'form-group\' />')
                         .parent()
                            .append('<label class=\'control-label\'></label>');

        //$('input.'+value).on('keyup change blur', function (value) {
         
          
            return function (event) {
                $this = $(this);
              
                if ($this.formance('validate_'+value)) {
                    $this.parent()
                            .removeClass('has-success has-error')
                            .addClass('has-success')
                            .children(':last')
                                .text('');
                } else {
                    $this.parent()
                            .removeClass('has-success has-error')
                            .addClass('has-error')
                            .children(':last')
                                .text('Invalid Phone Number');
                }
            }
        //}(value));
     });

 
});

$(document).ready(function () {
    /* Header Nav 
    ==================================*/
    $('.navbar-collapse').flexMenu({ responsivePattern: 'toggle'});
});

(function($) {

  /*
   *  new_map
   *
   *  This function will render a Google Map onto the selected jQuery element
   *
   *  @type	function
   *  @date	8/11/2013
   *  @since	4.3.0
   *
   *  @param	$el (jQuery element)
   *  @return	n/a
   */

  function new_map( $el ) {

    // var
    var $markers = $el.find('.marker');


    // vars
    var args = {
      zoom		: 16,
      center		: new google.maps.LatLng(0, 0),
      mapTypeId	: google.maps.MapTypeId.ROADMAP
    };


    // create map
    var map = new google.maps.Map( $el[0], args);


    // add a markers reference
    map.markers = [];


    // add markers
    $markers.each(function(){

      add_marker( $(this), map );

    });


    // center map
    center_map( map );


    // return
    return map;

  }

  /*
   *  add_marker
   *
   *  This function will add a marker to the selected Google Map
   *
   *  @type	function
   *  @date	8/11/2013
   *  @since	4.3.0
   *
   *  @param	$marker (jQuery element)
   *  @param	map (Google Map object)
   *  @return	n/a
   */

  function add_marker( $marker, map ) {

    // var
    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

    // create marker
    var marker = new google.maps.Marker({
      position	: latlng,
      map			: map
    });

    // add to array
    map.markers.push( marker );

    // if marker contains HTML, add it to an infoWindow
    if( $marker.html() )
    {
      // create info window
      var infowindow = new google.maps.InfoWindow({
        content		: $marker.html()
      });

      // show info window when marker is clicked
      google.maps.event.addListener(marker, 'click', function() {

        infowindow.open( map, marker );

      });
    }

  }

  /*
   *  center_map
   *
   *  This function will center the map, showing all markers attached to this map
   *
   *  @type	function
   *  @date	8/11/2013
   *  @since	4.3.0
   *
   *  @param	map (Google Map object)
   *  @return	n/a
   */

  function center_map( map ) {

    // vars
    var bounds = new google.maps.LatLngBounds();

    // loop through all markers and create bounds
    $.each( map.markers, function( i, marker ){

      var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

      bounds.extend( latlng );

    });

    // only 1 marker?
    if( map.markers.length == 1 )
    {
      // set center of map
      map.setCenter( bounds.getCenter() );
      map.setZoom( 16 );
    }
    else
    {
      // fit to bounds
      map.fitBounds( bounds );
    }

  }

  /*
   *  document ready
   *
   *  This function will render each map when the document is ready (page has loaded)
   *
   *  @type	function
   *  @date	8/11/2013
   *  @since	5.0.0
   *
   *  @param	n/a
   *  @return	n/a
   */
// global var
  var map = null;

  $(document).ready(function(){
    $('.acf-map').each(function(){

      // create map
      map = new_map( $(this) );

    });

  });

})(jQuery);
