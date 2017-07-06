/**
 * Update select2
 * Used for static & dynamic added elements (when clone)
 */
jQuery( document ).ready( function ( $ )
{	
	$( ':input.rwmb-select-advanced' ).each( rwmb_update_select_advanced );
	$( '.rwmb-input' ).on( 'clone', ':input.rwmb-select-advanced', rwmb_update_select_advanced );
	
	function rwmb_update_select_advanced()
	{
		var $this = $( this ),
			options = $this.data( 'options' );
		$this.siblings('.select2-container').remove();

		if ( typeof options.is_fontawesome_field != 'undefined' && options.is_fontawesome_field == true ) {
			var customFormat = {
				formatResult: function(item) {
					if ( typeof item.id == 'undefined' ) {
						return item.text;
					} else {
						return '<i style="width: 20px;display: inline-block; font-size: 1.2em;" class="fa fa-' + item.id + '"></i> ' + item.text;
					}
				}
			}
			$.extend( options, customFormat );
		}

		$this.select2( options );
	}
} );