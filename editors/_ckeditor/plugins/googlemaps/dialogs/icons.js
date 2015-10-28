

CKEDITOR.dialog.add( 'googlemapsIcons', function( editor )
{
	var MarkerColors = ['green', 'purple', 'yellow', 'blue', 'orange', 'red'],
		columns = MarkerColors.length,
		images = [],
		dialog;

	for (var i=0; i<columns; i++ )
	{
		var name=MarkerColors[i];
		images.push({name:name, src:'//maps.gstatic.com/mapfiles/ms/micons/' + name + '-dot.png'} );
	}

	var icons = editor.config.googleMaps_Icons;
	if (icons)
	{
		for(name in icons)
		{
			var icon = icons[ name ];
			images.push( {name:name, src:icon.marker.image} );
		}
		columns = Math.min( 10, images.length );
	}

	/**
	 * Simulate "this" of a dialog for non-dialog events.
	 * @type {CKEDITOR.dialog}
	 */
	var onClick = function( evt )
	{
		var target = evt.data.getTarget(),
			targetName = target.getName();

		if ( targetName == 'a' )
			target = target.getChild( 0 );
		else if ( targetName != 'img' )
			return;

		var name = target.getAttribute( 'data-name' );

		dialog.onSelect( name );

		dialog.hide();
		evt.data.preventDefault();
	};

	var onKeydown = CKEDITOR.tools.addFunction( function( ev, element )
	{
		ev = new CKEDITOR.dom.event( ev );
		element = new CKEDITOR.dom.element( element );
		var relative, nodeToMove;

		var keystroke = ev.getKeystroke();
		var rtl = editor.lang.dir == 'rtl';
		switch ( keystroke )
		{
			// UP-ARROW
			case 38 :
				// relative is TR
				if ( ( relative = element.getParent().getParent().getPrevious() ) )
				{
					nodeToMove = relative.getChild( [element.getParent().getIndex(), 0] );
					nodeToMove.focus();
				}
				ev.preventDefault();
				break;
			// DOWN-ARROW
			case 40 :
				// relative is TR
				if ( ( relative = element.getParent().getParent().getNext() ) )
				{
					nodeToMove = relative.getChild( [element.getParent().getIndex(), 0] );
					if ( nodeToMove )
						nodeToMove.focus();
				}
				ev.preventDefault();
				break;
			// ENTER
			// SPACE
			case 32 :
				onClick( { data: ev } );
				ev.preventDefault();
				break;

			// RIGHT-ARROW
			case rtl ? 37 : 39 :
			// TAB
			case 9 :
				// relative is TD
				if ( ( relative = element.getParent().getNext() ) )
				{
					nodeToMove = relative.getChild( 0 );
					nodeToMove.focus();
					ev.preventDefault(true);
				}
				// relative is TR
				else if ( ( relative = element.getParent().getParent().getNext() ) )
				{
					nodeToMove = relative.getChild( [0, 0] );
					if ( nodeToMove )
						nodeToMove.focus();
					ev.preventDefault(true);
				}
				break;

			// LEFT-ARROW
			case rtl ? 39 : 37 :
			// SHIFT + TAB
			case CKEDITOR.SHIFT + 9 :
				// relative is TD
				if ( ( relative = element.getParent().getPrevious() ) )
				{
					nodeToMove = relative.getChild( 0 );
					nodeToMove.focus();
					ev.preventDefault(true);
				}
				// relative is TR
				else if ( ( relative = element.getParent().getParent().getPrevious() ) )
				{
					nodeToMove = relative.getLast().getChild( 0 );
					nodeToMove.focus();
					ev.preventDefault(true);
				}
				break;
			default :
				// Do not stop not handled events.
				return;
		}
	});

	// Build the HTML for the images table.
	var html =
	[
		'<div>' +
		'<table style="width:100%;height:100%" cellspacing="2" cellpadding="2"',
		CKEDITOR.env.ie && CKEDITOR.env.quirks ? ' style="position:absolute;"' : '',
		'><tbody>'
	];

	for ( i = 0 ; i < columns ; i++ )
	{
		if ( i % columns === 0 )
			html.push( '<tr>' );

		var image = images[ i ];
		html.push(
			'<td class="cke_centered" style="vertical-align: middle;">' +
				'<a href="javascript:void(0)"',
					' class="cke_hand" tabindex="-1" onkeydown="CKEDITOR.tools.callFunction( ', onKeydown, ', event, this );">',
					'<img class="cke_hand" ' +
						' src="', image.src , '"',
						' data-name="', image.name, '"',
						// IE BUG: Below is a workaround to an IE image loading bug to ensure the image sizes are correct.
						( CKEDITOR.env.ie ? ' onload="this.setAttribute(\'width\', 2); this.removeAttribute(\'width\');" ' : '' ),
					'>' +
				'</a>',
 			'</td>' );

		if ( i % columns == columns - 1 )
			html.push( '</tr>' );
	}

	if ( i < columns - 1 )
	{
		for ( ; i < columns - 1 ; i++ )
			html.push( '<td></td>' );
		html.push( '</tr>' );
	}

	html.push( '</tbody></table></div>' );

	var imagesSelector =
	{
		type : 'html',
		html : html.join( '' ),
		onLoad : function( event )
		{
			dialog = event.sender;
		},
		focus : function()
 		{
			var size = images.length,
				i;
			for ( i = 0 ; i < size ; i++ )
			{
				// fixme src o name?
				if (images[i].name == dialog.initialName)
					break;
			}
			var initialImage = this.getElement().getElementsByTag( 'a' ).getItem( i );
			initialImage.focus();
 		},
		onClick : onClick,
		style : 'width: 100%; border-collapse: separate;'
	};

	return {
		title : editor.lang.googlemaps.selectIcon,
		minWidth : 270,
		minHeight : 60,
		contents : [
			{
				id : 'Info',
				label : '',
				title : '',
				expand : true,
				padding : 0,
				elements : [
						imagesSelector
					]
			}
		],
		buttons : [ CKEDITOR.dialog.cancelButton ]
	};
} );
