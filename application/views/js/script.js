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
			console.log( ">>", col, targetHeight );
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
	
	initialize: function( anElement ){
		this.element = anElement;
		this.imageContainer = anElement.getElement( ".images" );
		this.pane = anElement.getElement('.pane');
		this.images = this.imageContainer.getElements( ".galleryImage" );
		this.prevLink = this.element.getElement( ".slideshowPrev" );
		this.nextLink = this.element.getElement( ".slideshowNext" );
		if( this.images.length < 2 ){
			this.prevLink.setStyle( "display", "none" );
			this.nextLink.setStyle( "display", "none" );
			return;
		}else{
			this.prevLink.fade( 'hide' ); 
		}
		var width = 0;
		if( window.getSize().x > 799 ){
			this.images.each( function( anImage, anIndex ){
				width += anImage.getSize().x + parseInt( anImage.getStyle( "marginLeft" ) );
			}, this );
			this.imageContainer.setStyle( "width", width + "px" );
			
		}else{
			this.prevLink.setStyle( "display", "none" );
			this.nextLink.setStyle( "display", "none" );
			
		}
		this.activeImage = this.images[ this.imageIndex ];
		this.activeImage.fade( "in" );
		this.prevLink.getElement("a").set( "morph", { duration: 700, onComplete: function(){ console.log( "prevLink morph" ) } } );
		this.nextLink.getElement("a").set( "morph", { duration: 700, onComplete: function(){ console.log( "nextLink morph" ) } } );
		// this.prevLink.addEvent( "mouseenter", this.fadeButton.bindWithEvent( this, [ this.prevLink, 'in' ] ) );
		// this.nextLink.addEvent( "mouseenter", this.fadeButton.bindWithEvent( this, [ this.nextLink, 'in' ] ) );
		// this.prevLink.addEvent( "mouseleave", this.fadeButton.bindWithEvent( this, [ this.prevLink, 'out' ] ) );
		// this.nextLink.addEvent( "mouseleave", this.fadeButton.bindWithEvent( this, [ this.nextLink, 'out' ] ) );
		this.prevLink.addEvent( "mousedown", this.startScroll.bindWithEvent( this, -1 ) );
		this.nextLink.addEvent( "mousedown", this.startScroll.bindWithEvent( this, 1 ) );
		this.prevLink.addEvent( "mouseup", this.endScroll.bindWithEvent( this ) );
		this.nextLink.addEvent( "mouseup", this.endScroll.bindWithEvent( this ) );
		this.prevLink.addEvent( "click", this.endScroll.bindWithEvent( this ) );
		this.nextLink.addEvent( "click", this.endScroll.bindWithEvent( this ) );
		this.scroll = new Fx.Scroll( this.pane );
	},
	
	fadeButton: function( e, button, direction ){
		e.preventDefault();
		if( direction == "out" ){
			button.getElement( "a" ).morph( { "opacity": .75 } );
		}else{
			button.getElement( "a" ).morph( { "opacity": 1 } );
		}
	},
		
	previousImage: function( e ){
		mop.util.stopEvent( e );
		this.imageIndex--;
		if( this.imageIndex < 0 ) this.imageIndex = this.images.length -1 ;
 		this.activeImage = this.images[ this.imageIndex ];
		this.scroll.toElement( this.images[ this.imageIndex ] );
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
		console.log( this.pane.getScroll().x, this.pane.getScrollSize().x - window.getSize().x, this.pane.getScroll().x > this.pane.getScrollSize().x - window.getSize().x );

		if( this.pane.getScroll().x + increment > this.pane.getScrollSize().x - window.getSize().x ){
			console.log( 'hide nextlink' );
			console.log( this.nextLink, this.nextLink.getStyle("opacity") );

			if( this.nextLink.getStyle("opacity") == 1 ){
				console.log( this.nextLink, this.nextLink.getStyle("opacity") );
				this.nextLink.fade( 'out' );
			}
			
		} else if ( this.pane.getScroll().x == 0 ){
				if( this.prevLink.getStyle("opacity") == 1 ) this.prevLink.fade( 'out' );
		}else{
			this.nextLink.fade('in');
			this.prevLink.fade('in');
		}
		
		this.scroll.set( destination, 0 );
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
