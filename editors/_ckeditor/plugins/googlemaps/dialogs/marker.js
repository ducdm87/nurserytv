﻿
CKEDITOR.dialog.add( 'googlemapsMarker', function( editor )
{
	var numbering = function( id ){ return id + CKEDITOR.tools.getNextNumber(); },
		markerIcon = numbering( 'markerIcon' ),
		GMapTexts = numbering( 'GMapTexts' ),
		googleMaps_Icons = editor.config.googleMaps_Icons,
		markerImage;

	function getIcon( color )
	{
		var data = googleMaps_Icons && googleMaps_Icons[ color ];
		if (!data)
			return "//maps.gstatic.com/mapfiles/ms/micons/" + color + "-dot.png";
		// fixme...
		return data.marker.image;
	}

	return {
		title : editor.lang.googlemaps.markerProperties,
		minWidth : 310,
		minHeight : 240,

		buttons : [ {
				type : 'button',
				id : 'deleteMarker',
				label : editor.lang.googlemaps.deleteMarker,
				onClick : function( evt )
				{
					var dialog = evt.sender.getDialog();
					dialog.onRemoveMarker();
					dialog.hide();
				}
		}, CKEDITOR.dialog.okButton, CKEDITOR.dialog.cancelButton ],

		onLoad: function(evt)
		{
			this.setValues = function( data ) { this.definition.setValues.call(this, data); };
			this.getValues = function() { return this.definition.getValues.call(this); };
			this.setValues( {title:'tooltip', maxWidth: 200, text: 'Write your text', color: 'red'});

			// We have to destroy the internal CKEditor instance when this dialog is destroyed:
			this.destroy = CKEDITOR.tools.override( this.destroy, function( original )
				{
					return function()
					{
						CKEDITOR.instances[ GMapTexts ].destroy();
						original.call( this );
					};
				} );

		},
		setValues : function(data)
		{
			var control = this.getContentElement( 'Info', 'txtTooltip');
			control.setValue( data.title );
			control.setInitValue();
			control = this.getContentElement( 'Info', 'txtWidth');
			control.setValue( data.maxWidth );
			control.setInitValue();

			var instance = CKEDITOR.instances[ GMapTexts ];
			if (instance)
				instance.setData( data.text );
			else
				document.getElementById( GMapTexts ).value = data.text;

			markerImage = data.color;
			document.getElementById( markerIcon ).src = getIcon( markerImage );
		},

		getValues : function()
		{
			return {
				title: this.getValueOf( 'Info', 'txtTooltip'),
				maxWidth: this.getValueOf( 'Info', 'txtWidth'),
				text: CKEDITOR.instances[ GMapTexts ].getData(),
				color: markerImage
			};
		},

		contents : [
			{
				id : 'Info',
				elements :
				[
					{
						type : 'hbox',
						widths : [ '160px', '68px; padding-right:2px', '30px', '60px', '10px' ],
						children :
						[
							{
								id : 'txtTooltip',
								type : 'text',
									widths: ['70px', '90px'],
								width : '80px',
								labelLayout : 'horizontal',
								label : editor.lang.googlemaps.tooltip
							},
							{
								id : 'txtWidth',
								type : 'text',
									widths: ['40px', '24px'],
								width : '24px',
								labelLayout : 'horizontal',
								label : editor.lang.googlemaps.width
							},
							{
								type : 'html',
								html : '<div>px</div>'
							},
							{
								type : 'html',
								onClick : function (evt)
									{
										var target = evt.data.getTarget(),
											targetName = target.getName();

										if (targetName == 'img')
										{
											editor.openNestedDialog( 'googlemapsIcons', function(dialog)
												{
													dialog.initialName = markerImage;
													dialog.onSelect = function( name ) { markerImage= name; document.getElementById( markerIcon ).src = getIcon( markerImage );};
												}, null);
										}
									},
								html : '<div><label style="float:left">' + editor.lang.googlemaps.markerIcon + '</label><img id="' + markerIcon + '" class="cke_hand"></div>'
							},
							{ // Padding at the right
								type : 'html',
								html : '<div> </div>'
							}
						]
					},
					{
						type : 'html',
						onLoad : function() {
							var removePlugins = "elementspath,resize,googlemaps";
							// we have to remove any plugin that was removed in the main instance.
							var removed = editor.config.removePlugins;
							if (removed)
								removePlugins += "," + removed;

							// Copy all the configuration options
							var config = CKEDITOR.tools.clone( editor.config );
							config.customConfig = '';
							config.width = "300px";
							config.height = 140;
							config.toolbar = [["Bold", "Italic", "Link", "Image"], ["Undo", "Redo"]];
							config.removePlugins = removePlugins;
							config.toolbarCanCollapse = false;
							CKEDITOR.replace( GMapTexts, config);
						},
						html : '<textarea id="' + GMapTexts + '"></textarea>'
					}
				]
			}
		]
	};
} );
