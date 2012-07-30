Function.implement({ 
    bindWithEvent: function(bind, args){ 
        var self = this; 
        if (args != null) args = Array.from(args); 
        return function(event){ 
            return self.apply(bind, (args == null) ? arguments : [event].concat(args));
        }
    }
});

lattice = {};
lattice.util = {};

lattice.util.stopEvent = function( e ){
	if( e && e.stop ){
		e.stop();
	}else if( e ){
		e.returnValue = false;
	}
}

lattice.util.getValueFromClassName = function( key, aClassName ){
	if(!aClassName) return false;
	var classNames = aClassName.split( " " );
	var result = null;
	classNames.each( function( className ){
		if( className.indexOf( key ) == 0 ) result = className.split("-")[1];
	});
	return result;	
}

jcacciola = {};

jcacciola.Application = new Class({

	slideshows: [],	

	initialize: function(){

		if( $('footer').getCoordinates().top + $('footer').getSize().y < window.getSize().y ){
			$( 'footer' ).setStyles({
				'position' : 'fixed',
				'bottom' : 0
			});
			// $( 'wrapper' ).setStyles({
			// 	'padding-bottom' : '8em'
			// });			
		}
		
		
		// Mobile Platforms
		if( Browser.Platform.ios || Browser.Platform.android || Browser.Platform.webos ) this.isMobile = true;
		if( this.isMobile ) this.artistsNav.getElement('a').addEvent( 'click', this.showSubmenu.bindWithEvent( this, this.artistsNav ) );
		// Are we in a gallery view?
		if( document.id("gallery") ) var slideshow = new jcacciola.Gallery( document.id("gallery") );
		// Are we in exhibitions listing
		if( $('exhibitions' ) ) this.resizeExhibitions( $('exhibitions' ).getElements('li.exhibition') );
		if( $('newsItems') ) this.resizeNewsItems();
		
		this.artistsNav = $('artistsNav');

		if( $('representedArtists') ){
			$('representedArtists').getElements("a").each( function( alink ){
				alink.addEvent( 'mouseover', this.showPreview.bindWithEvent( this, [ $('artistListing').getElement('.preview'), alink.get( "data-previewsrc" ) ] ) );
			}, this );			
			$('representedArtists').addEvent( 'mouseleave', this.hidePreview.bindWithEvent( this, $('artistListing').getElement('.preview') ) );
		}

		if( $('worksAvailArtists') ){
			$('worksAvailArtists').getElements("a").each( function( alink ){
				alink.addEvent( 'mouseover', this.showPreview.bindWithEvent( this, [ $('artistListing').getElement('.preview'), alink.get( "data-previewsrc" ) ] ) );
			}, this );			
			$('worksAvailArtists').addEvent( 'mouseleave', this.hidePreview.bindWithEvent( this, $('artistListing').getElement('.preview') ) );
		}

	},	
	
	showPreview: function( e, prevelement, src ){
		e.preventDefault();
		prevelement.empty();
		prevelement.setStyle('visibility','visible');
		prevelement.spin();
		this.imgAsset = new Asset.image( src, {  onload: function(img){ 
			prevelement.empty();
			prevelement.grab( img );
		}});
	},
	
	hidePreview: function(e, prevelement ){
		e.preventDefault();
		prevelement.setStyle('visibility','hidden');
	},

	showSubmenu: function( e ){
		if( !this.isMobile ) e.preventDefault();
		this.artistsNav.addClass('active');
		$(document.body).addEvent('click', this.hideSubmenu.bindWithEvent( this, this.artistsNav ) );
	},

	hideSubmenu: function( e ){
		if( !e.target || !$(e.target).getParents().contains( this.artistsNav ) ) { 
		   this.artistsNav.removeClass('active');
	  }
	},
	
	resizeExhibitions: function( exhibitions ){
		var count = 0;
		var moduloCount = 3;
		var targetHeight = 0;
		this.row = [];
		exhibitions.each( function( anExhibition, i ){
			var col = ( i%moduloCount );
			if( anExhibition.getSize().y > targetHeight ) targetHeight = anExhibition.getCoordinates().height;
			this.row.include( anExhibition );
			this.row.each( function( aColItem ){
				aColItem.setStyle( 'height', targetHeight );
			});
			if( col == moduloCount - 1 ){
				this.row = [];
				targetHeight = 0;
			}
	  }, this );
	},
	
	resizeNewsItems: function(){
		var container = $('newsItems');
		// loop through each grouping, make a consistent size.
		var lg = container.getElements( '.large' );
		var md = container.getElements( '.medium' );
		var sm = container.getElements( '.small' );
		var h = 0;
		lg.each( function( item ){
			itemH = item.getSize().y;
			h = ( itemH > h )? itemH : h;
		});
		lg.each( function( item ){
			item.setStyle( 'height', h );
		});
		var h = 0;
		md.each( function( item ){
			itemH = item.getSize().y;
			h = ( itemH > h )? itemH : h;
		});
		md.each( function( item ){
			item.setStyle( 'height', h );
		});

		var h = 0;
		sm.each( function( item ){
			itemH = item.getSize().y;
			h = ( itemH > h )? itemH : h;
		});
		sm.each( function( item ){
			item.setStyle( 'height', h );
		});	
	}
	
});

jcacciola.Gallery = new Class({
	
	element: null,
	prevLink: null,
	nextLink: null,	
	imageContainer: null,
	imageIndex: 0,
	scroll: null,
	activeImage: null,
	scrollIncrement: 10,
	rightPadding: 24,
	
	initialize: function( anElement ){
		
		this.element = anElement;
		this.imageContainer = anElement.getElement( ".images" );
		this.pane = anElement.getElement('.pane');
		this.images = this.imageContainer.getElements( ".galleryImage" );
		this.prevLink = this.element.getElement( ".slideshowPrev" );
		this.nextLink = this.element.getElement( ".slideshowNext" );
		this.prevLink.fade('hide');
		this.nextLink.fade('hide');

		window.addEvent( 'resize', this.resizeGallery.bind( this ) );
		this.resizeGallery();

		// Mobile Platforms
		if( Browser.Platform.ios || Browser.Platform.android || Browser.Platform.webos ){

			$('footer').setStyle('position', 'static');
			window.addEvent( 'orientationchange', this.resizeGallery.bind( this ) );

			if( this.pane.getElement('div.image').getSize().x > window.getSize().x ){
				this.prevLink.addEvent( "touchstart", this.startScroll.bindWithEvent( this, -1 ) );
				this.nextLink.addEvent( "touchstart", this.startScroll.bindWithEvent( this, 1 ) );
				this.prevLink.addEvent( "touchend", this.endScroll.bindWithEvent( this ) );
				this.nextLink.addEvent( "touchend", this.endScroll.bindWithEvent( this ) );					
			}
			
		}else{

			console.log( "!!!", this.pane.getSize().x, window.getSize().x, this.pane.getElement('div.images').getSize().x );

			if( this.pane.getElement('div.images').getSize().x > window.getSize().x ){
				this.prevLink.addEvent( "mousedown", this.startScroll.bindWithEvent( this, -1 ) );
				this.nextLink.addEvent( "mousedown", this.startScroll.bindWithEvent( this, 1 ) );
				this.prevLink.addEvent( "mouseup", this.endScroll.bindWithEvent( this ) );
				this.nextLink.addEvent( "mouseup", this.endScroll.bindWithEvent( this ) );					
			}else{
				this.imageContainer.setStyle("marginRight", "auto" );
				this.imageContainer.setStyle("marginLeft", "auto" );
				this.prevLink.addClass('hidden');
				this.nextLink.addClass('hidden');
			}
		}
	},
	
	resizeGallery:  function(){
				var width, winx;
				width = 0;
				winx = window.getSize().x;
				this.images.each( function( anImage, anIndex ){
					width += anImage.getSize().x + parseInt( anImage.getStyle( "marginLeft" ) );
				}, this );
				this.scroll = new Fx.Scroll( this.pane );
				this.pane.setStyle( 'width', winx );

				// Mobile Platforms
				if( Browser.Platform.ios || Browser.Platform.android || Browser.Platform.webos ){
					this.pane.setStyle( 'width', winx );
					var pane = this.pane;
					window.addEvent( 'resize', function(){
						pane.setStyle( 'width', window.getSize().x );
					});
				}

				if( winx > width + 24 && width + 24 > (winx - 960) * .5 + 960 ){
					this.imageContainer.setStyle('width', width );
					this.imageContainer.setStyle("paddingLeft", 0);
					this.imageContainer.setStyle("paddingRight", this.rightPadding );
					this.imageContainer.setStyle("marginRight", "auto" );
					this.imageContainer.setStyle("marginLeft", "auto" );
					this.prevLink.fade( 'hide' ); 
					this.nextLink.fade( 'hide' ); 
					return;
				}else{
					this.imageContainer.setStyle( "width", width );
					// this.imageContainer.setStyle("paddingLeft", "12em");
					this.imageContainer.setStyle("paddingRight", this.rightPadding );
					this.imageContainer.setStyle("marginRight", "0" );
					this.imageContainer.setStyle("marginLeft", "0" );
					this.prevLink.fade( 'hide' );
					this.nextLink.setStyle( 'right', 0 );
					this.nextLink.fade( 'in' );
				}

				this.prevLink.getElement("a").set( "morph", { duration: 500 } );
				this.nextLink.getElement("a").set( "morph", { duration: 500 } );

	},
	
	startScroll: function( e, dir ){
		e.preventDefault();
		clearInterval( this.scrollInterval );
		this.scrollInterval = this.scrollDiv.periodical( 30, this, dir );
	},
	
	endScroll: function( e ){
		e.preventDefault();
		clearInterval( this.scrollInterval );
	},
	
	scrollDiv: function( dir ){
		var increment = ( this.scrollIncrement + 1 ) * dir;
		var destination = this.pane.getScroll().x + increment;
		if( this.pane.getScroll().x + increment > this.pane.getScrollSize().x - window.getSize().x ){
			if( this.nextLink.getStyle("opacity") == 1 ) this.nextLink.fade( 'out' );
		} else if ( this.pane.getScroll().x == 0 ){
				if( this.prevLink.getStyle("opacity") == 1 ) this.prevLink.fade( 'out' );
				if( this.pane.getElement('div.images').getSize().x < window.getSize().x ){
					this.nextLink.fade( 'out' );
				}

		}else{
			this.nextLink.fade('in');
			this.prevLink.fade('in');
		}
		
		if( dir != 0 ) this.scroll.set( destination, 0 );
	},
	
	previousImage: function( e ){
		mop.util.stopEvent( e );
		this.imageIndex--;
		if( this.imageIndex < 0 ) this.imageIndex = this.images.length -1 ;
 		this.activeImage = this.images[ this.imageIndex ];
		this.scroll.toElement( this.images[ this.imageIndex ] );
	},
	
	nextImage: function( e ){
		mop.util.stopEvent( e );
		this.imageIndex++;
		if( this.imageIndex > this.images.length - 1 ) this.imageIndex = 0
 		this.activeImage = this.images[ this.imageIndex ];
		this.scroll.toElement( this.images[ this.imageIndex ] );
	}
	
});

window.addEvent( "domready", function(){ jcacciola.app = new jcacciola.Application(); } );
