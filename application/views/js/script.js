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
		if( document.id("gallery") ) var slideshow = new jcacciola.Gallery( document.id("gallery") );
		if( $$('.exhibition' ) ) this.resizeExhibitions( $$('li.exhibition') );
		this.artistsNav = $('artistsNav');
		// Mobile Platforms
		this.artistsPreviewNav = this.artistsNav.getElement('.artistsPreview');
		if( Browser.Platform.ios || Browser.Platform.android || Browser.Platform.webos ){
			this.artistsNav.getElement('a').addEvent( 'mouseover', function( e ){ e.preventDefault() }.bindWithEvent( this ) );
			this.artistsNav.getElement('a').addEvent( 'click', this.showSubmenu.bindWithEvent( this, this.artistsNav ) );
		}else{
			this.artistsNav.getElements(".subnav a").each( function( alink ){
				alink.addEvent( 'mouseover', this.showPreview.bindWithEvent( this, [ this.artistsPreviewNav, alink.get( "data-previewsrc" ) ] ) );
				alink.addEvent( 'mouseout', this.hidePreview.bindWithEvent( this, [ this.artistsPreviewNav, alink.get( "data-previewsrc" ) ] ) );
			}, this );
		}
		if( $('artistListing') ){
			$('artistListing').getElements("a").each( function( alink ){
				alink.addEvent( 'mouseover', this.showPreview.bindWithEvent( this, [ $('artistListing').getElement('.preview'), alink.get( "data-previewsrc" ) ] ) );
				alink.addEvent( 'mouseout', this.hidePreview.bindWithEvent( this, [ $('artistListing').getElement('.preview'), alink.get( "data-previewsrc" ) ] ) );
			}, this );			
		}

	},	
	
	showPreview: function( e, prevelement, src ){
		e.preventDefault();
		if( !prevelement.getElement('img') ){
			prevelement.grab( new Element( 'img' ) );
		}
		// prevelement.removeClass('hidden');
		prevelement.setStyle('visibility','visible');
		prevelement.getElement('img').set( 'src', src );
	},
	
	hidePreview: function(e, prevelement ){
		e.preventDefault();
		prevelement.setStyle('visibility','hidden');
		// prevelement.addClass('hidden');
	},
	
	showSubmenu: function( e ){
		e.preventDefault();
		this.artistsNav.addClass('active');
		$(document.body).addEvent('click', this.hideSubmenu.bindWithEvent( this, this.artistsNav ) );
	},
	
	hideSubmenu: function( e ){
		if( !e.target || !$(e.target).getParents().contains( this.artistsNav ) ) { 
		   this.artistsNav.removeClass('active'); //hide the menu! clicked outside!
	  }
	},
	
	resizeExhibitions: function( exhibitions ){
		var count = 0;
		var moduloCount = 3;
		var targetHeight = 0;
		var row = [];
		for( var i=0; i<exhibitions.length; i++ ){
			var anExhibition = exhibitions[i]
			var col = ( i%moduloCount );
			if( anExhibition.getDimensions().height > targetHeight ) targetHeight = anExhibition.getDimensions().height;
			row.push( anExhibition );
			if( col == moduloCount - 1 ){
				row.each( function( aColItem ){
					aColItem.setStyle( 'height', targetHeight );
				});
				var row = [];
				targetHeight = 0;
			}
	  };
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


		// Mobile Platforms
		if( Browser.Platform.ios || Browser.Platform.android || Browser.Platform.webos ){
			// this.swipe = new MooSwipe( this.pane, { 
			// 	onSwipeLeft: this.previousImage.bindWithEvent( this ),
			// 	onSwipeRight: this.nextImage.bindWithEvent( this )
			// });
			$('footer').setStyle('position', 'static');
			window.addEvent( 'orientationchange', this.resizeGallery.bind( this ) );
			// this.prevLink.setStyles( { "width":"45%", "height":"45%" } );
			// this.nextLink.setStyles( { "width":"45%", "height":"45%" } );
			this.prevLink.addEvent( "touchstart", this.startScroll.bindWithEvent( this, -1 ) );
			this.nextLink.addEvent( "touchstart", this.startScroll.bindWithEvent( this, 1 ) );
			this.prevLink.addEvent( "touchend", this.endScroll.bindWithEvent( this ) );
			this.nextLink.addEvent( "touchend", this.endScroll.bindWithEvent( this ) );					
		}else{
			this.prevLink.addEvent( "mousedown", this.startScroll.bindWithEvent( this, -1 ) );
			this.nextLink.addEvent( "mousedown", this.startScroll.bindWithEvent( this, 1 ) );
			this.prevLink.addEvent( "mouseup", this.endScroll.bindWithEvent( this ) );
			this.nextLink.addEvent( "mouseup", this.endScroll.bindWithEvent( this ) );					
		}
		window.addEvent( 'resize', this.resizeGallery.bind( this ) );
		this.resizeGallery();
	},
	
	resizeGallery:  function(){
				var width, winx;
				width = 0;
				winx = window.getSize().x;
				this.images.each( function( anImage, anIndex ){
					width += anImage.getSize().x + parseInt( anImage.getStyle( "marginLeft" ) );
				}, this );
				this.scroll = new Fx.Scroll( this.pane );
				// console.log( winx + " is greater than? ", width + parseInt( this.imageContainer.getComputedStyle('paddingLeft') ) + parseInt( this.imageContainer.getComputedStyle('paddingRight') ) );
				// console.log( winx + " is greater than? ", (winx - 960) * .5 + 960 );
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
					this.imageContainer.setStyle("paddingLeft", "12em");
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
