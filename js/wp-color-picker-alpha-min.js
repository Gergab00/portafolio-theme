/**!
 * wp-color-picker-alpha
 *
 * Overwrite Automattic Iris for enabled Alpha Channel in wpColorPicker
 * Only run in input and is defined data alpha in true
 *
 * Version: 2.1.4
 * https://github.com/kallookoo/wp-color-picker-alpha
 * Licensed under the GPLv2 license or later.
 */
! ( function ( t ) {
	if ( ! t.wp.wpColorPicker.prototype._hasAlpha ) {
		var o =
				'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAIAAAHnlligAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAHJJREFUeNpi+P///4EDBxiAGMgCCCAGFB5AADGCRBgYDh48CCRZIJS9vT2QBAggFBkmBiSAogxFBiCAoHogAKIKAlBUYTELAiAmEtABEECk20G6BOmuIl0CIMBQ/IEMkO0myiSSraaaBhZcbkUOs0HuBwDplz5uFJ3Z4gAAAABJRU5ErkJggg==',
			r = '<div class="wp-picker-holder" />',
			e = '<div class="wp-picker-container" />',
			a = '<input type="button" class="button button-small" />',
			i =
				'<button type="button" class="button wp-color-result" aria-expanded="false"><span class="wp-color-result-text"></span></button>',
			l = ! 1;
		if ( 'undefined' != typeof wpColorPickerL10n ) {
			( l = void 0 !== wpColorPickerL10n.current ) &&
				( i = '<a tabindex="0" class="wp-color-result" />' );
			var n = wpColorPickerL10n.defaultLabel,
				s = wpColorPickerL10n.pick,
				p = wpColorPickerL10n.defaultString,
				c = wpColorPickerL10n.defaultAriaLabel,
				d = wpColorPickerL10n.clear,
				g = wpColorPickerL10n.clearAriaLabel;
		} else {
			var h = wp.i18n.__;
			( n = h( 'Color value' ) ),
				( s = h( 'Select Color' ) ),
				( p = h( 'Default' ) ),
				( c = h( 'Select default color' ) ),
				( d = h( 'Clear' ) ),
				( g = h( 'Clear color' ) );
		}
		( Color.fn.toString = function () {
			if ( this._alpha < 1 )
				return this.toCSS( 'rgba', this._alpha ).replace( /\s+/g, '' );
			var t = parseInt( this._color, 10 ).toString( 16 );
			return this.error
				? ''
				: ( t.length < 6 && ( t = ( '00000' + t ).substr( -6 ) ),
				  '#' + t );
		} ),
			t.widget( 'wp.wpColorPicker', t.wp.wpColorPicker, {
				_hasAlpha: ! 0,
				_create: function () {
					if ( t.support.iris ) {
						var h = this,
							u = h.element;
						if (
							( t.extend( h.options, u.data() ),
							'hue' === h.options.type )
						)
							return h._createHueOnly();
						( h.close = t.proxy( h.close, h ) ),
							( h.initialValue = u.val() ),
							u.addClass( 'wp-color-picker' ),
							l
								? ( u.hide().wrap( e ),
								  ( h.wrap = u.parent() ),
								  ( h.toggler = t( i )
										.insertBefore( u )
										.css( {
											backgroundColor: h.initialValue,
										} )
										.attr( 'title', s )
										.attr(
											'data-current',
											wpColorPickerL10n.current
										) ),
								  ( h.pickerContainer =
										t( r ).insertAfter( u ) ),
								  ( h.button = t( a ).addClass( 'hidden' ) ) )
								: ( u.parent( 'label' ).length ||
										( u.wrap( '<label></label>' ),
										( h.wrappingLabelText = t(
											'<span class="screen-reader-text"></span>'
										)
											.insertBefore( u )
											.text( n ) ) ),
								  ( h.wrappingLabel = u.parent() ),
								  h.wrappingLabel.wrap( e ),
								  ( h.wrap = h.wrappingLabel.parent() ),
								  ( h.toggler = t( i )
										.insertBefore( h.wrappingLabel )
										.css( {
											backgroundColor: h.initialValue,
										} ) ),
								  h.toggler
										.find( '.wp-color-result-text' )
										.text( s ),
								  ( h.pickerContainer = t( r ).insertAfter(
										h.wrappingLabel
								  ) ),
								  ( h.button = t( a ) ) ),
							h.options.defaultColor
								? ( h.button
										.addClass( 'wp-picker-default' )
										.val( p ),
								  l || h.button.attr( 'aria-label', c ) )
								: ( h.button
										.addClass( 'wp-picker-clear' )
										.val( d ),
								  l || h.button.attr( 'aria-label', g ) ),
							l
								? u
										.wrap(
											'<span class="wp-picker-input-wrap" />'
										)
										.after( h.button )
								: ( h.wrappingLabel
										.wrap(
											'<span class="wp-picker-input-wrap hidden" />'
										)
										.after( h.button ),
								  ( h.inputWrapper = u.closest(
										'.wp-picker-input-wrap'
								  ) ) ),
							u.iris( {
								target: h.pickerContainer,
								hide: h.options.hide,
								width: h.options.width,
								mode: h.options.mode,
								palettes: h.options.palettes,
								change: function ( r, e ) {
									h.options.alpha
										? ( h.toggler.css( {
												'background-image':
													'url(' + o + ')',
										  } ),
										  l
												? h.toggler.html(
														'<span class="color-alpha" />'
												  )
												: ( h.toggler.css( {
														position: 'relative',
												  } ),
												  0 ==
														h.toggler.find(
															'span.color-alpha'
														).length &&
														h.toggler.append(
															'<span class="color-alpha" />'
														) ),
										  h.toggler
												.find( 'span.color-alpha' )
												.css( {
													width: '30px',
													height: '100%',
													position: 'absolute',
													top: 0,
													left: 0,
													'border-top-left-radius':
														'2px',
													'border-bottom-left-radius':
														'2px',
													background:
														e.color.toString(),
												} ) )
										: h.toggler.css( {
												backgroundColor:
													e.color.toString(),
										  } ),
										t.isFunction( h.options.change ) &&
											h.options.change.call( this, r, e );
								},
							} ),
							u.val( h.initialValue ),
							h._addListeners(),
							h.options.hide || h.toggler.click();
					}
				},
				_addListeners: function () {
					var o = this;
					o.wrap.on( 'click.wpcolorpicker', function ( t ) {
						t.stopPropagation();
					} ),
						o.toggler.click( function () {
							o.toggler.hasClass( 'wp-picker-open' )
								? o.close()
								: o.open();
						} ),
						o.element.on( 'change', function ( r ) {
							( '' === t( this ).val() ||
								o.element.hasClass( 'iris-error' ) ) &&
								( o.options.alpha
									? ( l && o.toggler.removeAttr( 'style' ),
									  o.toggler
											.find( 'span.color-alpha' )
											.css( 'backgroundColor', '' ) )
									: o.toggler.css( 'backgroundColor', '' ),
								t.isFunction( o.options.clear ) &&
									o.options.clear.call( this, r ) );
						} ),
						o.button.on( 'click', function ( r ) {
							t( this ).hasClass( 'wp-picker-clear' )
								? ( o.element.val( '' ),
								  o.options.alpha
										? ( l &&
												o.toggler.removeAttr( 'style' ),
										  o.toggler
												.find( 'span.color-alpha' )
												.css( 'backgroundColor', '' ) )
										: o.toggler.css(
												'backgroundColor',
												''
										  ),
								  t.isFunction( o.options.clear ) &&
										o.options.clear.call( this, r ),
								  o.element.trigger( 'change' ) )
								: t( this ).hasClass( 'wp-picker-default' ) &&
								  o.element
										.val( o.options.defaultColor )
										.change();
						} );
				},
			} ),
			t.widget( 'a8c.iris', t.a8c.iris, {
				_create: function () {
					if (
						( this._super(),
						( this.options.alpha =
							this.element.data( 'alpha' ) || ! 1 ),
						this.element.is( ':input' ) ||
							( this.options.alpha = ! 1 ),
						void 0 !== this.options.alpha && this.options.alpha )
					) {
						var o = this,
							r = o.element,
							e = t(
								'<div class="iris-strip iris-slider iris-alpha-slider"><div class="iris-slider-offset iris-slider-offset-alpha"></div></div>'
							).appendTo( o.picker.find( '.iris-picker-inner' ) ),
							a = e.find( '.iris-slider-offset-alpha' ),
							i = { aContainer: e, aSlider: a };
						void 0 !== r.data( 'custom-width' )
							? ( o.options.customWidth =
									parseInt( r.data( 'custom-width' ) ) || 0 )
							: ( o.options.customWidth = 100 ),
							( o.options.defaultWidth = r.width() ),
							( o._color._alpha < 1 ||
								-1 != o._color.toString().indexOf( 'rgb' ) ) &&
								r.width(
									parseInt(
										o.options.defaultWidth +
											o.options.customWidth
									)
								),
							t.each( i, function ( t, r ) {
								o.controls[ t ] = r;
							} ),
							o.controls.square.css( { 'margin-right': '0' } );
						var l =
								o.picker.width() -
								o.controls.square.width() -
								20,
							n = l / 6,
							s = l / 2 - n;
						t.each( [ 'aContainer', 'strip' ], function ( t, r ) {
							o.controls[ r ]
								.width( s )
								.css( { 'margin-left': n + 'px' } );
						} ),
							o._initControls(),
							o._change();
					}
				},
				_initControls: function () {
					if ( ( this._super(), this.options.alpha ) ) {
						var t = this;
						t.controls.aSlider.slider( {
							orientation: 'vertical',
							min: 0,
							max: 100,
							step: 1,
							value: parseInt( 100 * t._color._alpha ),
							slide: function ( o, r ) {
								( t._color._alpha = parseFloat(
									r.value / 100
								) ),
									t._change.apply( t, arguments );
							},
						} );
					}
				},
				_change: function () {
					this._super();
					var t = this,
						r = t.element;
					if ( this.options.alpha ) {
						var e = t.controls,
							a = parseInt( 100 * t._color._alpha ),
							i = t._color.toRgb(),
							l = [
								'rgb(' + i.r + ',' + i.g + ',' + i.b + ') 0%',
								'rgba(' +
									i.r +
									',' +
									i.g +
									',' +
									i.b +
									', 0) 100%',
							],
							n = t.options.defaultWidth,
							s = t.options.customWidth,
							p = t.picker
								.closest( '.wp-picker-container' )
								.find( '.wp-color-result' );
						e.aContainer.css( {
							background:
								'linear-gradient(to bottom, ' +
								l.join( ', ' ) +
								'), url(' +
								o +
								')',
						} ),
							p.hasClass( 'wp-picker-open' ) &&
								( e.aSlider.slider( 'value', a ),
								t._color._alpha < 1
									? ( e.strip.attr(
											'style',
											e.strip
												.attr( 'style' )
												.replace(
													/rgba\(([0-9]+,)(\s+)?([0-9]+,)(\s+)?([0-9]+)(,(\s+)?[0-9\.]+)\)/g,
													'rgb($1$3$5)'
												)
									  ),
									  r.width( parseInt( n + s ) ) )
									: r.width( n ) );
					}
					( r.data( 'reset-alpha' ) || ! 1 ) &&
						t.picker
							.find( '.iris-palette-container' )
							.on( 'click.palette', '.iris-palette', function () {
								( t._color._alpha = 1 ),
									( t.active = 'external' ),
									t._change();
							} ),
						r.trigger( 'change' );
				},
				_addInputListeners: function ( t ) {
					var o = this,
						r = function ( r ) {
							var e = new Color( t.val() ),
								a = t.val();
							t.removeClass( 'iris-error' ),
								e.error
									? '' !== a && t.addClass( 'iris-error' )
									: e.toString() !== o._color.toString() &&
									  ( ( 'keyup' === r.type &&
											a.match( /^[0-9a-fA-F]{3}$/ ) ) ||
											o._setOption(
												'color',
												e.toString()
											) );
						};
					t.on( 'change', r ).on( 'keyup', o._debounce( r, 100 ) ),
						o.options.hide &&
							t.on( 'focus', function () {
								o.show();
							} );
				},
			} );
	}
} )( jQuery ),
	jQuery( document ).ready( function ( t ) {
		t( '.color-picker' ).wpColorPicker();
	} );
