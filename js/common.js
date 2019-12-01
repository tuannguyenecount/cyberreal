//-----------//BREAK TEXT//-------------//
/*LETTERING*/
(function($){
	function injector(t, splitter, klass, after) {
		var a = t.text().split(splitter), inject = '';
		if (a.length) {
			$(a).each(function(i, item) {
				inject += '<span class="'+klass+(i+1)+'">'+item+'</span>'+after;
			});	
			t.empty().append(inject);
		}
	}
	var methods = {
		init : function() {
			return this.each(function() {
				injector($(this), '', 'char', '');
			});
		},

		words : function() {
			return this.each(function() {
				injector($(this), ' ', 'word', ' ');
			});
		},
		lines : function() {
			return this.each(function() {
				var r = "eefec303079ad17405c889e092e105b0";
				injector($(this).children("br").replaceWith(r).end(), r, 'line', '');
			});

		}
	};
	$.fn.lettering = function( method ) {
		if ( method && methods[method] ) {
			return methods[ method ].apply( this, [].slice.call( arguments, 1 ));
		} else if ( method === 'letters' || ! method ) {
			return methods.init.apply( this, [].slice.call( arguments, 0 ) );
		}
		$.error( 'Method ' +  method + ' does not exist on jQuery.lettering' );
		return this;
	};

})(jQuery);


//-----------//EASING//-------------//

(function($){$.easing['jswing'] = $.easing['swing'];

$.extend( $.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		return $.easing[$.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158; 
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - $.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return $.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return $.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});})(jQuery);

//-------------------//MOUSE WHELL//------------------------//

(function (factory) {
    if ( typeof define === 'function' && define.amd ) {
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        module.exports = factory;
    } else {
        factory(jQuery);
    }
}(function ($) {

    var toFix  = ['wheel', 'mousewheel', 'DOMMouseScroll', 'MozMousePixelScroll'],
        toBind = ( 'onwheel' in document || document.documentMode >= 9 ) ?
                    ['wheel'] : ['mousewheel', 'DomMouseScroll', 'MozMousePixelScroll'],
        slice  = Array.prototype.slice,
        nullLowestDeltaTimeout, lowestDelta;

    if ( $.event.fixHooks ) {
        for ( var i = toFix.length; i; ) {
            $.event.fixHooks[ toFix[--i] ] = $.event.mouseHooks;
        }
    }

    var special = $.event.special.mousewheel = {
        version: '3.1.9',

        setup: function() {
            if ( this.addEventListener ) {
                for ( var i = toBind.length; i; ) {
                    this.addEventListener( toBind[--i], handler, false );
                }
            } else {
                this.onmousewheel = handler;
            }
            $.data(this, 'mousewheel-line-height', special.getLineHeight(this));
            $.data(this, 'mousewheel-page-height', special.getPageHeight(this));
        },

        teardown: function() {
            if ( this.removeEventListener ) {
                for ( var i = toBind.length; i; ) {
                    this.removeEventListener( toBind[--i], handler, false );
                }
            } else {
                this.onmousewheel = null;
            }
        },

        getLineHeight: function(elem) {
            return parseInt($(elem)['offsetParent' in $.fn ? 'offsetParent' : 'parent']().css('fontSize'), 10);
        },

        getPageHeight: function(elem) {
            return $(elem).height();
        },

        settings: {
            adjustOldDeltas: true
        }
    };

    $.fn.extend({
        mousewheel: function(fn) {
            return fn ? this.bind('mousewheel', fn) : this.trigger('mousewheel');
        },

        unmousewheel: function(fn) {
            return this.unbind('mousewheel', fn);
        }
    });


    function handler(event) {
        var orgEvent   = event || window.event,
            args       = slice.call(arguments, 1),
            delta      = 0,
            deltaX     = 0,
            deltaY     = 0,
            absDelta   = 0;
        event = $.event.fix(orgEvent);
        event.type = 'mousewheel';
       
        if ( 'detail'      in orgEvent ) { deltaY = orgEvent.detail * -1;      }
        if ( 'wheelDelta'  in orgEvent ) { deltaY = orgEvent.wheelDelta;       }
        if ( 'wheelDeltaY' in orgEvent ) { deltaY = orgEvent.wheelDeltaY;      }
        if ( 'wheelDeltaX' in orgEvent ) { deltaX = orgEvent.wheelDeltaX * -1; }
   
        if ( 'axis' in orgEvent && orgEvent.axis === orgEvent.HORIZONTAL_AXIS ) {
            deltaX = deltaY * -1;
            deltaY = 0;
        }

     
        delta = deltaY === 0 ? deltaX : deltaY;
        
        if ( 'deltaY' in orgEvent ) {
            deltaY = orgEvent.deltaY * -1;
            delta  = deltaY;
        }
        if ( 'deltaX' in orgEvent ) {
            deltaX = orgEvent.deltaX;
            if ( deltaY === 0 ) { delta  = deltaX * -1; }
        }

      
        if ( deltaY === 0 && deltaX === 0 ) { return; }

        
        if ( orgEvent.deltaMode === 1 ) {
            var lineHeight = $.data(this, 'mousewheel-line-height');
            delta  *= lineHeight;
            deltaY *= lineHeight;
            deltaX *= lineHeight;
        } else if ( orgEvent.deltaMode === 2 ) {
            var pageHeight = $.data(this, 'mousewheel-page-height');
            delta  *= pageHeight;
            deltaY *= pageHeight;
            deltaX *= pageHeight;
        }

       
        absDelta = Math.max( Math.abs(deltaY), Math.abs(deltaX) );

        if ( !lowestDelta || absDelta < lowestDelta ) {
            lowestDelta = absDelta;
         
            if ( shouldAdjustOldDeltas(orgEvent, absDelta) ) {
                lowestDelta /= 40;
            }
        }
      
        if ( shouldAdjustOldDeltas(orgEvent, absDelta) ) {
            delta  /= 40;
            deltaX /= 40;
            deltaY /= 40;
        }

        delta  = Math[ delta  >= 1 ? 'floor' : 'ceil' ](delta  / lowestDelta);
        deltaX = Math[ deltaX >= 1 ? 'floor' : 'ceil' ](deltaX / lowestDelta);
        deltaY = Math[ deltaY >= 1 ? 'floor' : 'ceil' ](deltaY / lowestDelta);

       
        event.deltaX = deltaX;
        event.deltaY = deltaY;
        event.deltaFactor = lowestDelta;
        event.deltaMode = 0;

      
        args.unshift(event, delta, deltaX, deltaY);
      
        if (nullLowestDeltaTimeout) { clearTimeout(nullLowestDeltaTimeout); }
        nullLowestDeltaTimeout = setTimeout(nullLowestDelta, 200);

        return ($.event.dispatch || $.event.handle).apply(this, args);
    }

    function nullLowestDelta() {
        lowestDelta = null;
    }

    function shouldAdjustOldDeltas(orgEvent, absDelta) {
        return special.settings.adjustOldDeltas && orgEvent.type === 'mousewheel' && absDelta % 120 === 0;
    }

}));



//----------------//  DRAP SCROLL DEVICES //--------------------------//

(function ($){
  'use strict';
  var ACTIVE_CLASS = 'draptouch-active';
  if (!window.requestAnimationFrame){
    window.requestAnimationFrame = ( function (){
      return window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.oRequestAnimationFrame ||
        window.msRequestAnimationFrame ||
        function (callback,  element){
          window.setTimeout(callback, 1000 / 60);
        };

    }());

  }

  $.support = $.support || {};
  $.extend($.support, {
    touch: 'ontouchend' in document
  });
  var selectStart = function (){
    return false;
  };

  var DrapTouch = function (element, settings) {
    this.settings = settings;
    this.el       = element;
    this.$el      = $(element);

    this._initElements();

    return this;
  };

  DrapTouch.DATA_KEY = 'draptouch';
  DrapTouch.DEFAULTS = {
    cursor: '',
    decelerate: true,
    triggerHardware: true,
    threshold: 0,
    y: true,
    x: true,
    slowdown: 0.9,
    maxvelocity: 60,
    throttleFPS: 80,
    movingClass: {
      up: 'draptouch-moving-up',
      down: 'draptouch-moving-down',
      left: 'draptouch-moving-left',
      right: 'draptouch-moving-right'
    },
    deceleratingClass: {
      up: 'draptouch-decelerating-up',
      down: 'draptouch-decelerating-down',
      left: 'draptouch-decelerating-left',
      right: 'draptouch-decelerating-right'
    }
  };


  DrapTouch.prototype.start = function (options){
    this.settings = $.extend(this.settings, options);
    this.velocity = options.velocity || this.velocity;
    this.velocityY = options.velocityY || this.velocityY;
    this.settings.decelerate = false;
    this._move();
  };

  DrapTouch.prototype.end = function (){
    this.settings.decelerate = true;
  };

  DrapTouch.prototype.stop = function (){
    this.velocity = 0;
    this.velocityY = 0;
    this.settings.decelerate = true;
    if ($.isFunction(this.settings.stopped)){
      this.settings.stopped.call(this);
    }
  };

  DrapTouch.prototype.detach = function (){
    this._detachListeners();
    this.$el
      .removeClass(ACTIVE_CLASS)
      .css('cursor', '');
  };

  DrapTouch.prototype.attach = function (){
    if (this.$el.hasClass(ACTIVE_CLASS)) {
      return;
    }
    this._attachListeners(this.$el);
    this.$el
      .addClass(ACTIVE_CLASS)
      .css('cursor', this.settings.cursor);
  };


  DrapTouch.prototype._initElements = function (){
    this.$el.addClass(ACTIVE_CLASS);

    $.extend(this, {
      xpos: null,
      prevXPos: false,
      ypos: null,
      prevYPos: false,
      mouseDown: false,
      throttleTimeout: 1000 / this.settings.throttleFPS,
      lastMove: null,
      elementFocused: null
    });

    this.velocity = 0;
    this.velocityY = 0;

    $(document)
      .mouseup($.proxy(this._resetMouse, this))
      .click($.proxy(this._resetMouse, this));

    this._initEvents();

    this.$el.css('cursor', this.settings.cursor);

    if (this.settings.triggerHardware){
      this.$el.css({
        '-webkit-transform': 'translate3d(0,0,0)',
        '-webkit-perspective': '1000',
        '-webkit-backface-visibility': 'hidden'
      });
    }
  };

  DrapTouch.prototype._initEvents = function(){
    var self = this;
    this.settings.events = {
      touchStart: function (e){
        var touch;
        if (self._useTarget(e.target, e)){
          touch = e.originalEvent.touches[0];
          self.threshold = self._threshold(e.target, e);
          self._start(touch.clientX, touch.clientY);
          e.stopPropagation();
        }
      },
      touchMove: function (e){
        var touch;
        if (self.mouseDown){
          touch = e.originalEvent.touches[0];
          self._inputmove(touch.clientX, touch.clientY);
          if (e.preventDefault){
            e.preventDefault();
          }
        }
      },
      inputDown: function (e){
        if (self._useTarget(e.target, e)){
          self.threshold = self._threshold(e.target, e);
          self._start(e.clientX, e.clientY);
          self.elementFocused = e.target;
          if (e.target.nodeName === 'IMG'){
            e.preventDefault();
          }
          e.stopPropagation();
        }
      },
      inputEnd: function (e){
        if (self._useTarget(e.target, e)){
          self._end();
          self.elementFocused = null;
          if (e.preventDefault){
            e.preventDefault();
          }
        }
      },
      inputMove: function (e){
        if (self.mouseDown){
          self._inputmove(e.clientX, e.clientY);
          if (e.preventDefault){
            e.preventDefault();
          }
        }
      },
      scroll: function (e){
        if ($.isFunction(self.settings.moved)){
          self.settings.moved.call(self, self.settings);
        }
        if (e.preventDefault){
          e.preventDefault();
        }
      },
      inputClick: function (e){
        if (Math.abs(self.velocity) > 0){
          e.preventDefault();
          return false;
        }
      },

      dragStart: function (e){
        if (self._useTarget(e.target, e) && self.elementFocused){
          return false;
        }
      }
    };

    this._attachListeners(this.$el, this.settings);

  };

  DrapTouch.prototype._inputmove = function (clientX, clientY){
    var $this = this.$el;
    var el = this.el;

    if (!this.lastMove || new Date() > new Date(this.lastMove.getTime() + this.throttleTimeout)){
      this.lastMove = new Date();

      if (this.mouseDown && (this.xpos || this.ypos)){
        var movedX = (clientX - this.xpos);
        var movedY = (clientY - this.ypos);
        if(this.threshold > 0){
          var moved = Math.sqrt(movedX * movedX + movedY * movedY);
          if(this.threshold > moved){
            return;
          } else {
            this.threshold = 0;
          }
        }
        if (this.elementFocused){
          $(this.elementFocused).blur();
          this.elementFocused = null;
          $this.focus();
        }

        this.settings.decelerate = false;
        this.velocity = this.velocityY = 0;

        var scrollLeft = this.scrollLeft();
        var scrollTop = this.scrollTop();

        this.scrollLeft(this.settings.x ? scrollLeft - movedX : scrollLeft);
        this.scrollTop(this.settings.y ? scrollTop - movedY : scrollTop);

        this.prevXPos = this.xpos;
        this.prevYPos = this.ypos;
        this.xpos = clientX;
        this.ypos = clientY;

        this._calculateVelocities();
        this._setMoveClasses(this.settings.movingClass);

        if ($.isFunction(this.settings.moved)){
          this.settings.moved.call(this, this.settings);
        }
      }
    }
  };

  DrapTouch.prototype._calculateVelocities = function (){
    this.velocity = this._capVelocity(this.prevXPos - this.xpos, this.settings.maxvelocity);
    this.velocityY = this._capVelocity(this.prevYPos - this.ypos, this.settings.maxvelocity);
  };

  DrapTouch.prototype._end = function (){
    if (this.xpos && this.prevXPos && this.settings.decelerate === false){
      this.settings.decelerate = true;
      this._calculateVelocities();
      this.xpos = this.prevXPos = this.mouseDown = false;
      this._move();
    }
  };

  DrapTouch.prototype._useTarget = function (target, event){
    if ($.isFunction(this.settings.filterTarget)){
      return this.settings.filterTarget.call(this, target, event) !== false;
    }
    return true;
  };

  DrapTouch.prototype._threshold = function (target, event){
    if ($.isFunction(this.settings.threshold)){
      return this.settings.threshold.call(this, target, event);
    }
    return this.settings.threshold;
  };

  DrapTouch.prototype._start = function (clientX, clientY){
    this.mouseDown = true;
    this.velocity = this.prevXPos = 0;
    this.velocityY = this.prevYPos = 0;
    this.xpos = clientX;
    this.ypos = clientY;
  };

  DrapTouch.prototype._resetMouse = function (){
    this.xpos = false;
    this.ypos = false;
    this.mouseDown = false;
  };

  DrapTouch.prototype._decelerateVelocity = function (velocity, slowdown){
    return Math.floor(Math.abs(velocity)) === 0 ? 0 
	 : velocity * slowdown; 
  };

  DrapTouch.prototype._capVelocity = function (velocity, max){
    var newVelocity = velocity;
    if (velocity > 0){
      if (velocity > max){
        newVelocity = max;
      }
    } else {
      if (velocity < (0 - max)){
        newVelocity = (0 - max);
      }
    }
    return newVelocity;
  };

  DrapTouch.prototype._setMoveClasses = function (classes){
   
    var settings = this.settings;
    var $this = this.$el;

    $this.removeClass(settings.movingClass.up)
      .removeClass(settings.movingClass.down)
      .removeClass(settings.movingClass.left)
      .removeClass(settings.movingClass.right)
      .removeClass(settings.deceleratingClass.up)
      .removeClass(settings.deceleratingClass.down)
      .removeClass(settings.deceleratingClass.left)
      .removeClass(settings.deceleratingClass.right);

    if (this.velocity > 0){
      $this.addClass(classes.right);
    }
    if (this.velocity < 0){
      $this.addClass(classes.left);
    }
    if (this.velocityY > 0){
      $this.addClass(classes.down);
    }
    if (this.velocityY < 0){
      $this.addClass(classes.up);
    }

  };


  
  DrapTouch.prototype._move = function (){
    var $scroller = this.$el;
    var scroller = this.el;
    var self = this;
    var settings = self.settings;
    // set scrollLeft
    if (settings.x && scroller.scrollWidth > 0){
      this.scrollLeft(this.scrollLeft() + this.velocity);
      if (Math.abs(this.velocity) > 0){
        this.velocity = settings.decelerate ?
          self._decelerateVelocity(this.velocity, settings.slowdown) : this.velocity;
		 
      }
	  
    } else {
      this.velocity = 0;
    }
	
    // set scrollTop
    if (settings.y && scroller.scrollHeight > 0){
      this.scrollTop(this.scrollTop() + this.velocityY);
      if (Math.abs(this.velocityY) > 0){
        this.velocityY = settings.decelerate ?
          self._decelerateVelocity(this.velocityY, settings.slowdown) : this.velocityY;
      }
    } else {
      this.velocityY = 0;
    }

    self._setMoveClasses(settings.deceleratingClass);

    if ($.isFunction(settings.moved)){
      settings.moved.call(this, settings);
    }

    if (Math.abs(this.velocity) > 0 || Math.abs(this.velocityY) > 0){
      if (!this.moving) {
        this.moving = true;
        // tick for next movement
        window.requestAnimationFrame(function (){
          self.moving = false;
          self._move();
        });
      }
    } else {
      self.stop();
    }
  };

 
  DrapTouch.prototype._getScroller = function(){
    var $scroller = this.$el;
    if (this.$el.is('body') || this.$el.is('html')){
      $scroller = $(window);
    }
    return $scroller;
  };

  
  DrapTouch.prototype.scrollLeft = function(left){
    var $scroller = this._getScroller();
    if (typeof left === 'number'){
      $scroller.scrollLeft(left);
      this.settings.scrollLeft = left;
    } else {
      return $scroller.scrollLeft();
    }
  };
  DrapTouch.prototype.scrollTop = function(top){
    var $scroller = this._getScroller();
    if (typeof top === 'number'){
      $scroller.scrollTop(top);
      this.settings.scrollTop = top;
    } else {
      return $scroller.scrollTop();
    }
  };

  DrapTouch.prototype._attachListeners = function (){
    var $this = this.$el;
    var settings = this.settings;

    if ($.support.touch){
      $this
        .bind('touchstart', settings.events.touchStart)
        .bind('touchend', settings.events.inputEnd)
        .bind('touchmove', settings.events.touchMove);
    }
    
    $this
      .mousedown(settings.events.inputDown)
      .mouseup(settings.events.inputEnd)
      .mousemove(settings.events.inputMove);

    $this
      .click(settings.events.inputClick)
      .scroll(settings.events.scroll)
      .bind('selectstart', selectStart) 
      .bind('dragstart', settings.events.dragStart);
  };

  DrapTouch.prototype._detachListeners = function (){
    var $this = this.$el;
    var settings = this.settings;
    if ($.support.touch){
      $this
        .unbind('touchstart', settings.events.touchStart)
        .unbind('touchend', settings.events.inputEnd)
        .unbind('touchmove', settings.events.touchMove);
    }

    $this
      .unbind('mousedown', settings.events.inputDown)
      .unbind('mouseup', settings.events.inputEnd)
      .unbind('mousemove', settings.events.inputMove);

    $this
      .unbind('click', settings.events.inputClick)
      .unbind('scroll', settings.events.scroll)
      .unbind('selectstart', selectStart) 
      .unbind('dragstart', settings.events.dragStart);
  };

 
  $.DrapTouch = DrapTouch;

  $.fn.draptouch = function (option, callOptions) {
    return this.each(function () {
      var $this    = $(this);
      var instance = $this.data(DrapTouch.DATA_KEY);
      var options  = $.extend({}, DrapTouch.DEFAULTS, $this.data(), typeof option === 'object' && option);

      if (!instance) {
        $this.data(DrapTouch.DATA_KEY, (instance = new DrapTouch(this, options)));
      }

      if (typeof option === 'string') {
        instance[option](callOptions);
      }

    });
  };

}(window.jQuery || window.Zepto));


//----------------//  PINCHZOOM DEVICES //--------------------------//
(function (global, factory) {
    if (typeof define === "function" && define.amd) {
        define(['exports'], factory);
    } else if (typeof exports !== "undefined") {
        factory(exports);
    } else {
        var mod = {
            exports: {}
        };
        factory(mod.exports);
        global.PinchZoom = mod.exports;
    }
})(this, function (exports) {
    'use strict';

    Object.defineProperty(exports, "__esModule", {
        value: true
    });
  
    if (typeof Object.assign != 'function') {
        Object.defineProperty(Object, "assign", {
            value: function assign(target, varArgs) {
                if (target == null) {
                    throw new TypeError('Cannot convert undefined or null to object');
                }

                var to = Object(target);

                for (var index = 1; index < arguments.length; index++) {
                    var nextSource = arguments[index];

                    if (nextSource != null) {
                        for (var nextKey in nextSource) {
                            if (Object.prototype.hasOwnProperty.call(nextSource, nextKey)) {
                                to[nextKey] = nextSource[nextKey];
                            }
                        }
                    }
                }
                return to;
            },
            writable: true,
            configurable: true
        });
    }

    if (typeof Array.from != 'function') {
        Array.from = function (object) {
            return [].slice.call(object);
        };
    }

    var buildElement = function buildElement(str) {
        var tmp = document.implementation.createHTMLDocument('');
        tmp.body.innerHTML = str;
        return Array.from(tmp.body.children)[0];
    };

    var triggerEvent = function triggerEvent(el, name) {
        var event = document.createEvent('HTMLEvents');
        event.initEvent(name, true, false);
        el.dispatchEvent(event);
    };

    var definePinchZoom = function definePinchZoom() {
        
        var PinchZoom = function PinchZoom(el, options) {
            this.el = el;
            this.zoomFactor = 1;
            this.lastScale = 1;
            this.offset = {
                x: 0,
                y: 0
            };
            this.initialOffset = {
                x: 0,
                y: 0
            };
            this.options = Object.assign({}, this.defaults, options);
            this.setupMarkup();
            this.bindEvents();
            this.update();

            if (this.isImageLoaded(this.el)) {
                this.updateAspectRatio();
                this.setupInitialOffset();
            }

            this.enable();
        },
            sum = function sum(a, b) {
            return a + b;
        },
            isCloseTo = function isCloseTo(value, expected) {
            return value > expected - 0.01 && value < expected + 0.01;
        };

        PinchZoom.prototype = {

            defaults: {
                tapZoomFactor: 2,
                zoomOutFactor: 1.3,
                animationDuration: 300,
                maxZoom: 6,
                minZoom: 0.5,
                draggableUnzoomed: true,
                lockDragAxis: false,
                use2d: true,
                zoomStartEventName: 'pz_zoomstart',
                zoomUpdateEventName: 'pz_zoomupdate',
                zoomEndEventName: 'pz_zoomend',
                dragStartEventName: 'pz_dragstart',
                dragUpdateEventName: 'pz_dragupdate',
                dragEndEventName: 'pz_dragend',
                doubleTapEventName: 'pz_doubletap',
                verticalPadding: 0,
                horizontalPadding: 0
            },

           
            handleDragStart: function handleDragStart(event) {
                triggerEvent(this.el, this.options.dragStartEventName);
                this.stopAnimation();
                this.lastDragPosition = false;
                this.hasInteraction = true;
                this.handleDrag(event);
            },

            
            handleDrag: function handleDrag(event) {
                var touch = this.getTouches(event)[0];
                this.drag(touch, this.lastDragPosition);
                this.offset = this.sanitizeOffset(this.offset);
                this.lastDragPosition = touch;
            },

            handleDragEnd: function handleDragEnd() {
                triggerEvent(this.el, this.options.dragEndEventName);
                this.end();
            },

            
            handleZoomStart: function handleZoomStart(event) {
                triggerEvent(this.el, this.options.zoomStartEventName);
                this.stopAnimation();
                this.lastScale = 1;
                this.nthZoom = 0;
                this.lastZoomCenter = false;
                this.hasInteraction = true;
            },

           
            handleZoom: function handleZoom(event, newScale) {
                var touchCenter = this.getTouchCenter(this.getTouches(event)),
                    scale = newScale / this.lastScale;
                this.lastScale = newScale;

                this.nthZoom += 1;
                if (this.nthZoom > 3) {

                    this.scale(scale, touchCenter);
                    this.drag(touchCenter, this.lastZoomCenter);
                }
                this.lastZoomCenter = touchCenter;
            },

            handleZoomEnd: function handleZoomEnd() {
                triggerEvent(this.el, this.options.zoomEndEventName);
                this.end();
            },

            
            handleDoubleTap: function handleDoubleTap(event) {
                var center = this.getTouches(event)[0],
                    zoomFactor = this.zoomFactor > 1 ? 1 : this.options.tapZoomFactor,
                    startZoomFactor = this.zoomFactor,
                    updateProgress = function (progress) {
                    this.scaleTo(startZoomFactor + progress * (zoomFactor - startZoomFactor), center);
                }.bind(this);

                if (this.hasInteraction) {
                    return;
                }

                this.isDoubleTap = true;

                if (startZoomFactor > zoomFactor) {
                    center = this.getCurrentZoomCenter();
                }

                this.animate(this.options.animationDuration, updateProgress, this.swing);
                triggerEvent(this.el, this.options.doubleTapEventName);
            },

           
            computeInitialOffset: function computeInitialOffset() {
                this.initialOffset = {
                    x: -Math.abs(this.el.offsetWidth * this.getInitialZoomFactor() - this.container.offsetWidth) / 2,
                    y: -Math.abs(this.el.offsetHeight * this.getInitialZoomFactor() - this.container.offsetHeight) / 2
                };
            },

           
            isImageLoaded: function isImageLoaded(el) {
                if (el.nodeName === 'IMG') {
                    return el.complete && el.naturalHeight !== 0;
                } else {
                    return Array.from(el.querySelectorAll('img')).every(this.isImageLoaded);
                }
            },

            setupInitialOffset: function setupInitialOffset() {
                if (this._initialOffsetSetup) {
                    return;
                }

                this._initialOffsetSetup = true;

                this.computeInitialOffset();
                this.offset.x = this.initialOffset.x;
                this.offset.y = this.initialOffset.y;
            },

         
            sanitizeOffset: function sanitizeOffset(offset) {
                var elWidth = this.el.offsetWidth * this.getInitialZoomFactor() * this.zoomFactor;
                var elHeight = this.el.offsetHeight * this.getInitialZoomFactor() * this.zoomFactor;
                var maxX = elWidth - this.getContainerX() + this.options.horizontalPadding,
                    maxY = elHeight - this.getContainerY() + this.options.verticalPadding,
                    maxOffsetX = Math.max(maxX, 0),
                    maxOffsetY = Math.max(maxY, 0),
                    minOffsetX = Math.min(maxX, 0) - this.options.horizontalPadding,
                    minOffsetY = Math.min(maxY, 0) - this.options.verticalPadding;

                return {
                    x: Math.min(Math.max(offset.x, minOffsetX), maxOffsetX),
                    y: Math.min(Math.max(offset.y, minOffsetY), maxOffsetY)
                };
            },

            
            scaleTo: function scaleTo(zoomFactor, center) {
                this.scale(zoomFactor / this.zoomFactor, center);
            },

           
            scale: function scale(_scale, center) {
                _scale = this.scaleZoomFactor(_scale);
                this.addOffset({
                    x: (_scale - 1) * (center.x + this.offset.x),
                    y: (_scale - 1) * (center.y + this.offset.y)
                });
                triggerEvent(this.el, this.options.zoomUpdateEventName);
            },

           
            scaleZoomFactor: function scaleZoomFactor(scale) {
                var originalZoomFactor = this.zoomFactor;
                this.zoomFactor *= scale;
                this.zoomFactor = Math.min(this.options.maxZoom, Math.max(this.zoomFactor, this.options.minZoom));
                return this.zoomFactor / originalZoomFactor;
            },

          
            canDrag: function canDrag() {
                return this.options.draggableUnzoomed || !isCloseTo(this.zoomFactor, 1);
            },

           
            drag: function drag(center, lastCenter) {
                if (lastCenter) {
                    if (this.options.lockDragAxis) {
                        if (Math.abs(center.x - lastCenter.x) > Math.abs(center.y - lastCenter.y)) {
                            this.addOffset({
                                x: -(center.x - lastCenter.x),
                                y: 0
                            });
                        } else {
                            this.addOffset({
                                y: -(center.y - lastCenter.y),
                                x: 0
                            });
                        }
                    } else {
                        this.addOffset({
                            y: -(center.y - lastCenter.y),
                            x: -(center.x - lastCenter.x)
                        });
                    }
                    triggerEvent(this.el, this.options.dragUpdateEventName);
                }
            },

           
            getTouchCenter: function getTouchCenter(touches) {
                return this.getVectorAvg(touches);
            },

           
            getVectorAvg: function getVectorAvg(vectors) {
                return {
                    x: vectors.map(function (v) {
                        return v.x;
                    }).reduce(sum) / vectors.length,
                    y: vectors.map(function (v) {
                        return v.y;
                    }).reduce(sum) / vectors.length
                };
            },

           
            addOffset: function addOffset(offset) {
                this.offset = {
                    x: this.offset.x + offset.x,
                    y: this.offset.y + offset.y
                };
            },

            sanitize: function sanitize() {
                if (this.zoomFactor < this.options.zoomOutFactor) {
                    this.zoomOutAnimation();
                } else if (this.isInsaneOffset(this.offset)) {
                    this.sanitizeOffsetAnimation();
                }
            },

            
            isInsaneOffset: function isInsaneOffset(offset) {
                var sanitizedOffset = this.sanitizeOffset(offset);
                return sanitizedOffset.x !== offset.x || sanitizedOffset.y !== offset.y;
            },

            
            sanitizeOffsetAnimation: function sanitizeOffsetAnimation() {
                var targetOffset = this.sanitizeOffset(this.offset),
                    startOffset = {
                    x: this.offset.x,
                    y: this.offset.y
                },
                    updateProgress = function (progress) {
                    this.offset.x = startOffset.x + progress * (targetOffset.x - startOffset.x);
                    this.offset.y = startOffset.y + progress * (targetOffset.y - startOffset.y);
                    this.update();
                }.bind(this);

                this.animate(this.options.animationDuration, updateProgress, this.swing);
            },

            
            zoomOutAnimation: function zoomOutAnimation() {
                if (this.zoomFactor === 1) {
                    return;
                }

                var startZoomFactor = this.zoomFactor,
                    zoomFactor = 1,
                    center = this.getCurrentZoomCenter(),
                    updateProgress = function (progress) {
                    this.scaleTo(startZoomFactor + progress * (zoomFactor - startZoomFactor), center);
                }.bind(this);

                this.animate(this.options.animationDuration, updateProgress, this.swing);
            },

            
            updateAspectRatio: function updateAspectRatio() {
                this.setContainerY(this.container.parentElement.offsetHeight);
            },

           
            getInitialZoomFactor: function getInitialZoomFactor() {
                var xZoomFactor = this.container.offsetWidth / this.el.offsetWidth;
                var yZoomFactor = this.container.offsetHeight / this.el.offsetHeight;

                return Math.min(xZoomFactor, yZoomFactor);
            },

         
            getAspectRatio: function getAspectRatio() {
                return this.el.offsetWidth / this.el.offsetHeight;
            },

           
            getCurrentZoomCenter: function getCurrentZoomCenter() {
                var offsetLeft = this.offset.x - this.initialOffset.x;
                var centerX = -1 * this.offset.x - offsetLeft / (1 / this.zoomFactor - 1);

                var offsetTop = this.offset.y - this.initialOffset.y;
                var centerY = -1 * this.offset.y - offsetTop / (1 / this.zoomFactor - 1);

                return {
                    x: centerX,
                    y: centerY
                };
            },

           
            getTouches: function getTouches(event) {
                var rect = this.container.getBoundingClientRect();
                var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
                var scrollLeft = document.documentElement.scrollLeft || document.body.scrollLeft;
                var posTop = rect.top + scrollTop;
                var posLeft = rect.left + scrollLeft;

                return Array.prototype.slice.call(event.touches).map(function (touch) {
                    return {
                        x: touch.pageX - posLeft,
                        y: touch.pageY - posTop
                    };
                });
            },

           
            animate: function animate(duration, framefn, timefn, callback) {
                var startTime = new Date().getTime(),
                    renderFrame = function () {
                    if (!this.inAnimation) {
                        return;
                    }
                    var frameTime = new Date().getTime() - startTime,
                        progress = frameTime / duration;
                    if (frameTime >= duration) {
                        framefn(1);
                        if (callback) {
                            callback();
                        }
                        this.update();
                        this.stopAnimation();
                        this.update();
                    } else {
                        if (timefn) {
                            progress = timefn(progress);
                        }
                        framefn(progress);
                        this.update();
                        requestAnimationFrame(renderFrame);
                    }
                }.bind(this);
                this.inAnimation = true;
                requestAnimationFrame(renderFrame);
            },

           
            stopAnimation: function stopAnimation() {
                this.inAnimation = false;
            },

           
            swing: function swing(p) {
                return -Math.cos(p * Math.PI) / 2 + 0.5;
            },

            getContainerX: function getContainerX() {
                return this.container.offsetWidth;
            },

            getContainerY: function getContainerY() {
                return this.container.offsetHeight;
            },

            setContainerY: function setContainerY(y) {
                return this.container.style.height = y + 'px';
            },

            
            setupMarkup: function setupMarkup() {
           
			    this.container = buildElement('<div class="pinch-zoom-container"></div>');
			    this.el.parentNode.insertBefore(this.container, this.el);
                this.container.appendChild(this.el);
				this.container.style.overflow = 'hidden';
                this.container.style.position = 'relative';

                
                this.el.style.webkitTransformOrigin = '0% 0%';
                this.el.style.mozTransformOrigin = '0% 0%';
                this.el.style.msTransformOrigin = '0% 0%';
                this.el.style.oTransformOrigin = '0% 0%';
                this.el.style.transformOrigin = '0% 0%';

                this.el.style.position = 'absolute';
            },

            end: function end() {
                this.hasInteraction = false;
                this.sanitize();
                this.update();
            },

           
            bindEvents: function bindEvents() {
                var self = this;
                detectGestures(this.container, this);

                window.addEventListener('resize', this.update.bind(this));
                Array.from(this.el.querySelectorAll('img')).forEach(function (imgEl) {
                    imgEl.addEventListener('load', self.update.bind(self));
                });

                if (this.el.nodeName === 'IMG') {
                    this.el.addEventListener('load', this.update.bind(this));
                }
            },

            update: function update(event) {
                if (this.updatePlaned) {
                    return;
                }
                this.updatePlaned = true;

                window.setTimeout(function () {
                    this.updatePlaned = false;
                    this.updateAspectRatio();

                    if (event && event.type === 'resize') {
                        this.computeInitialOffset();
                    }

                    if (event && event.type === 'load') {
                        this.setupInitialOffset();
                    }

                    var zoomFactor = this.getInitialZoomFactor() * this.zoomFactor,
                        offsetX = -this.offset.x / zoomFactor,
                        offsetY = -this.offset.y / zoomFactor,
                        transform3d = 'scale3d(' + zoomFactor + ', ' + zoomFactor + ',1) ' + 'translate3d(' + offsetX + 'px,' + offsetY + 'px,0px)',
                        transform2d = 'scale(' + zoomFactor + ', ' + zoomFactor + ') ' + 'translate(' + offsetX + 'px,' + offsetY + 'px)',
                        removeClone = function () {
                        if (this.clone) {
                            this.clone.parentNode.removeChild(this.clone);
                            delete this.clone;
                        }
                    }.bind(this);

                  
                    if (!this.options.use2d || this.hasInteraction || this.inAnimation) {
                        this.is3d = true;
                        removeClone();

                        this.el.style.webkitTransform = transform3d;
                        this.el.style.mozTransform = transform2d;
                        this.el.style.msTransform = transform2d;
                        this.el.style.oTransform = transform2d;
                        this.el.style.transform = transform3d;
                    } else {
                       
                        if (this.is3d) {
                            this.clone = this.el.cloneNode(true);
                            this.clone.style.pointerEvents = 'none';
							this.clone.style.display = 'none';
                            this.container.appendChild(this.clone);
                            window.setTimeout(removeClone, 200);
                        }

                        this.el.style.webkitTransform = transform2d;
                        this.el.style.mozTransform = transform2d;
                        this.el.style.msTransform = transform2d;
                        this.el.style.oTransform = transform2d;
                        this.el.style.transform = transform2d;

                        this.is3d = false;
                    }
                }.bind(this), 0);
            },

            
            enable: function enable() {
                this.enabled = true;
            },

          
            disable: function disable() {
                this.enabled = false;
            }
        };

        var detectGestures = function detectGestures(el, target) {
            var interaction = null,
                fingers = 0,
                lastTouchStart = null,
                startTouches = null,
                setInteraction = function setInteraction(newInteraction, event) {
                if (interaction !== newInteraction) {

                    if (interaction && !newInteraction) {
                        switch (interaction) {
                            case "zoom":
                                target.handleZoomEnd(event);
                                break;
                            case 'drag':
                                target.handleDragEnd(event);
                                break;
                        }
                    }

                    switch (newInteraction) {
                        case 'zoom':
                            target.handleZoomStart(event);
                            break;
                        case 'drag':
                            target.handleDragStart(event);
                            break;
                    }
                }
                interaction = newInteraction;
            },
                updateInteraction = function updateInteraction(event) {
                if (fingers === 2) {
                    setInteraction('zoom');
                } else if (fingers === 1 && target.canDrag()) {
                    setInteraction('drag', event);
                } else {
                    setInteraction(null, event);
                }
            },
                targetTouches = function targetTouches(touches) {
                return Array.from(touches).map(function (touch) {
                    return {
                        x: touch.pageX,
                        y: touch.pageY
                    };
                });
            },
                getDistance = function getDistance(a, b) {
                var x, y;
                x = a.x - b.x;
                y = a.y - b.y;
                return Math.sqrt(x * x + y * y);
            },
                calculateScale = function calculateScale(startTouches, endTouches) {
                var startDistance = getDistance(startTouches[0], startTouches[1]),
                    endDistance = getDistance(endTouches[0], endTouches[1]);
                return endDistance / startDistance;
            },
                cancelEvent = function cancelEvent(event) {
                event.stopPropagation();
                event.preventDefault();
            },
                detectDoubleTap = function detectDoubleTap(event) {
                var time = new Date().getTime();

                if (fingers > 1) {
                    lastTouchStart = null;
                }

                if (time - lastTouchStart < 300) {
                    cancelEvent(event);

                    target.handleDoubleTap(event);
                    switch (interaction) {
                        case "zoom":
                            target.handleZoomEnd(event);
                            break;
                        case 'drag':
                            target.handleDragEnd(event);
                            break;
                    }
                } else {
                    target.isDoubleTap = false;
                }

                if (fingers === 1) {
                    lastTouchStart = time;
                }
            },
                firstMove = true;

            el.addEventListener('touchstart', function (event) {
                if (target.enabled) {
                    firstMove = true;
                    fingers = event.touches.length;
                    detectDoubleTap(event);
                }
            });

            el.addEventListener('touchmove', function (event) {
                if (target.enabled && !target.isDoubleTap) {
                    if (firstMove) {
                        updateInteraction(event);
                        if (interaction) {
                            cancelEvent(event);
                        }
                        startTouches = targetTouches(event.touches);
                    } else {
                        switch (interaction) {
                            case 'zoom':
                                target.handleZoom(event, calculateScale(startTouches, targetTouches(event.touches)));
                                break;
                            case 'drag':
                                target.handleDrag(event);
                                break;
                        }
                        if (interaction) {
                            cancelEvent(event);
                            target.update();
                        }
                    }

                    firstMove = false;
                }
            });

            el.addEventListener('touchend', function (event) {
                if (target.enabled) {
                    fingers = event.touches.length;
                    updateInteraction(event);
                }
            });
        };

        return PinchZoom;
    };

    var PinchZoom = definePinchZoom();

    exports.default = PinchZoom;
});


//----------------//  TOUCH DEVICES //--------------------------//

(function ($) {
	"use strict";
    $.attrFn = $.attrFn || {};
    var touchCapable = ('ontouchstart' in window),
	
        settings = {
            tap_pixel_range: 5,
            swipe_h_threshold: 50,
            swipe_v_threshold: 50,
            taphold_threshold: 750,
            doubletap_int: 500,

            touch_capable: touchCapable,
            orientation_support: ('orientation' in window && 'onorientationchange' in window),

            startevent:  (touchCapable) ? 'touchstart' : 'mousedown',
            endevent:    (touchCapable) ? 'touchend' : 'mouseup',
            moveevent:   (touchCapable) ? 'touchmove' : 'mousemove',
            tapevent:    (touchCapable) ? 'tap' : 'click',
            scrollevent: (touchCapable) ? 'touchmove' : 'scroll',

            hold_timer: null,
            tap_timer: null
        };
    
    // Convenience functions:
    $.isTouchCapable = function() { return settings.touch_capable; };
    $.getStartEvent  = function() { return settings.startevent;    };
    $.getEndEvent    = function() { return settings.endevent;      };
    $.getMoveEvent   = function() { return settings.moveevent;     };
    $.getTapEvent    = function() { return settings.tapevent;      };
    $.getScrollEvent = function() { return settings.scrollevent;   };
    
    // Add Event shortcuts:
    $.each(['tapstart', 'tapend', 'tapmove', 'tap', 'tap2', 'tap3', 'tap4', 'singletap', 'doubletap', 'taphold', 'swipe', 'swipeup', 'swiperight', 'swipedown', 'swipeleft', 'swipeend', 'scrollstart', 'scrollend', 'orientationchange'], function (i, name) {
        $.fn[name] = function (fn) {
            return fn ? this.on(name, fn) : this.trigger(name);
        };

        $.attrFn[name] = true;
    });

    // tapstart Event:
    $.event.special.tapstart = {
        setup: function () {
			
            var thisObject = this,
                $this = $(thisObject);
			
            $this.on(settings.startevent, function tapStartFunc(e) {
				
                $this.data('callee', tapStartFunc);
                if (e.which && e.which !== 1) {
                    return false;
                }

                var origEvent = e.originalEvent,
                    touchData = {
                        'position': {
                            'x': ((settings.touch_capable) ? origEvent.touches[0].screenX : e.screenX),
                            'y': (settings.touch_capable) ? origEvent.touches[0].screenY : e.screenY
                        },
                        'offset': {
                            'x': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageX - ($this.offset() ? $this.offset().left : 0)) : Math.round(e.pageX - ($this.offset() ? $this.offset().left : 0)),
                            'y': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageY - ($this.offset() ? $this.offset().top : 0)) : Math.round(e.pageY - ($this.offset() ? $this.offset().top : 0))
                        },
                        'time': Date.now(),
                        'target': e.target
                    };
				
                triggerCustomEvent(thisObject, 'tapstart', e, touchData);
                return true;
            });
        },

        remove: function () {
            $(this).off(settings.startevent, $(this).data.callee);
        }
    };
	
    // tapmove Event:
    $.event.special.tapmove = {
    	setup: function() {
            var thisObject = this,
            $this = $(thisObject);
    			
            $this.on(settings.moveevent, function tapMoveFunc(e) {
                $this.data('callee', tapMoveFunc);
    			
                var origEvent = e.originalEvent,
                    touchData = {
                        'position': {
                            'x': ((settings.touch_capable) ? origEvent.touches[0].screenX : e.screenX),
                            'y': (settings.touch_capable) ? origEvent.touches[0].screenY : e.screenY
                        },
                        'offset': {
                            'x': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageX - ($this.offset() ? $this.offset().left : 0)) : Math.round(e.pageX - ($this.offset() ? $this.offset().left : 0)),
							'y': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageY - ($this.offset() ? $this.offset().top : 0)) : Math.round(e.pageY - ($this.offset() ? $this.offset().top : 0))
                        },
                        'time': Date.now(),
                        'target': e.target
                    };
    				
                triggerCustomEvent(thisObject, 'tapmove', e, touchData);
                return true;
            });
        },
        remove: function() {
            $(this).off(settings.moveevent, $(this).data.callee);
        }
    };

    // tapend Event:
    $.event.special.tapend = {
        setup: function () {
            var thisObject = this,
                $this = $(thisObject);

            $this.on(settings.endevent, function tapEndFunc(e) {
                // Touch event data:
                $this.data('callee', tapEndFunc);

                var origEvent = e.originalEvent;
                var touchData = {
                    'position': {
                        'x': (settings.touch_capable) ? origEvent.changedTouches[0].screenX : e.screenX,
                        'y': (settings.touch_capable) ? origEvent.changedTouches[0].screenY : e.screenY
                    },
                    'offset': {
                        'x': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageX - ($this.offset() ? $this.offset().left : 0)) : Math.round(e.pageX - ($this.offset() ? $this.offset().left : 0)),
                        'y': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageY - ($this.offset() ? $this.offset().top : 0)) : Math.round(e.pageY - ($this.offset() ? $this.offset().top : 0))
                    },
                    'time': Date.now(),
                    'target': e.target
                };
                triggerCustomEvent(thisObject, 'tapend', e, touchData);
                return true;
            });
        },
        remove: function () {
            $(this).off(settings.endevent, $(this).data.callee);
        }
    };

    // taphold Event:
    $.event.special.taphold = {
        setup: function () {
            var thisObject = this,
                $this = $(thisObject),
                origTarget,
                start_pos = {
                    x: 0,
                    y: 0
                },
                end_x = 0,
                end_y = 0;

            $this.on(settings.startevent, function tapHoldFunc1(e) {
                if (e.which && e.which !== 1) {
                    return false;
                } else {
                    $this.data('tapheld', false);
                    origTarget = e.target;

                    var origEvent = e.originalEvent;
                    var start_time = Date.now(),
                        startPosition = {
                            'x': (settings.touch_capable) ? origEvent.touches[0].screenX : e.screenX,
                            'y': (settings.touch_capable) ? origEvent.touches[0].screenY : e.screenY
                        },
                        startOffset = {
                            'x': (settings.touch_capable) ? origEvent.touches[0].pageX - origEvent.touches[0].target.offsetLeft : e.offsetX,
                            'y': (settings.touch_capable) ? origEvent.touches[0].pageY - origEvent.touches[0].target.offsetTop : e.offsetY
                        };

                    start_pos.x = (e.originalEvent.targetTouches) ? e.originalEvent.targetTouches[0].pageX : e.pageX;
                    start_pos.y = (e.originalEvent.targetTouches) ? e.originalEvent.targetTouches[0].pageY : e.pageY;

                    end_x = start_pos.x;
                    end_y = start_pos.y;
                    
                    // Get the element's threshold:
                    
                    var ele_threshold = ($this.parent().data('threshold')) ? $this.parent().data('threshold') : $this.data('threshold'),
                        threshold = (typeof ele_threshold !== 'undefined' && ele_threshold !== false && parseInt(ele_threshold)) ? parseInt(ele_threshold) : settings.taphold_threshold; 

                    settings.hold_timer = window.setTimeout(function () {

                        var diff_x = (start_pos.x - end_x),
                            diff_y = (start_pos.y - end_y);

                        if (e.target == origTarget && ((start_pos.x == end_x && start_pos.y == end_y) || (diff_x >= -(settings.tap_pixel_range) && diff_x <= settings.tap_pixel_range && diff_y >= -(settings.tap_pixel_range) && diff_y <= settings.tap_pixel_range))) {
                            $this.data('tapheld', true);

                            var end_time = Date.now(),
                                endPosition = {
                                    'x': (settings.touch_capable) ? origEvent.touches[0].screenX : e.screenX,
                                    'y': (settings.touch_capable) ? origEvent.touches[0].screenY : e.screenY
                                },
                                endOffset = {
                                    'x': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageX - ($this.offset() ? $this.offset().left : 0)) : Math.round(e.pageX - ($this.offset() ? $this.offset().left : 0)),
									'y': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageY - ($this.offset() ? $this.offset().top : 0)) : Math.round(e.pageY - ($this.offset() ? $this.offset().top : 0))
                                };
                            var duration = end_time - start_time;

                            // Build the touch data:
                            var touchData = {
                                'startTime': start_time,
                                'endTime': end_time,
                                'startPosition': startPosition,
                                'startOffset': startOffset,
                                'endPosition': endPosition,
                                'endOffset': endOffset,
                                'duration': duration,
                                'target': e.target
                            };
                            $this.data('callee1', tapHoldFunc1);
                            triggerCustomEvent(thisObject, 'taphold', e, touchData);
                        }
                    }, threshold);

                    return true;
                }
            }).on(settings.endevent, function tapHoldFunc2() {
                $this.data('callee2', tapHoldFunc2);
                $this.data('tapheld', false);
                window.clearTimeout(settings.hold_timer);
            })
            .on(settings.moveevent, function tapHoldFunc3(e) {
                $this.data('callee3', tapHoldFunc3);
				
                end_x = (e.originalEvent.targetTouches) ? e.originalEvent.targetTouches[0].pageX : e.pageX;
                end_y = (e.originalEvent.targetTouches) ? e.originalEvent.targetTouches[0].pageY : e.pageY;
            });
        },

        remove: function () {
            $(this).off(settings.startevent, $(this).data.callee1).off(settings.endevent, $(this).data.callee2).off(settings.moveevent, $(this).data.callee3);
        }
    };

    // doubletap Event:
    $.event.special.doubletap = {
        setup: function () {
            var thisObject = this,
                $this = $(thisObject),
                origTarget,
                action,
                firstTap = null,
                origEvent,
				cooloff,
				cooling = false;

            $this.on(settings.startevent, function doubleTapFunc1(e) {
                if (e.which && e.which !== 1) {
                    return false;
                }
                
                $this.data('doubletapped', false);
                origTarget = e.target;
                $this.data('callee1', doubleTapFunc1);

                origEvent = e.originalEvent;
                if (!firstTap) {
                    firstTap = {
                        'position': {
                            'x': (settings.touch_capable) ? origEvent.touches[0].screenX : e.screenX,
                            'y': (settings.touch_capable) ? origEvent.touches[0].screenY : e.screenY
                        },
                        'offset': {
                            'x': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageX - ($this.offset() ? $this.offset().left : 0)) : Math.round(e.pageX - ($this.offset() ? $this.offset().left : 0)),
                            'y': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageY - ($this.offset() ? $this.offset().top : 0)) : Math.round(e.pageY - ($this.offset() ? $this.offset().top : 0))
                        },
                        'time': Date.now(),
                        'target': e.target,
                        'element': e.originalEvent.srcElement,
                        'index':   $(e.target).index()
                    };
                }

                return true;
            }).on(settings.endevent, function doubleTapFunc2(e) {
				
                var now = Date.now();
                var lastTouch = $this.data('lastTouch') || now + 1;
                var delta = now - lastTouch;
                window.clearTimeout(action);
                $this.data('callee2', doubleTapFunc2);

                if (delta < settings.doubletap_int && ($(e.target).index() == firstTap.index) && delta > 100) {
                    $this.data('doubletapped', true);
                    window.clearTimeout(settings.tap_timer);

                    // Now get the current event:
                    var lastTap = {
                        'position': {
                            'x': (settings.touch_capable) ? e.originalEvent.changedTouches[0].screenX : e.screenX,
                            'y': (settings.touch_capable) ? e.originalEvent.changedTouches[0].screenY : e.screenY
                        },
                        'offset': {
                            'x': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageX - ($this.offset() ? $this.offset().left : 0)) : Math.round(e.pageX - ($this.offset() ? $this.offset().left : 0)),
                            'y': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageY - ($this.offset() ? $this.offset().top : 0)) : Math.round(e.pageY - ($this.offset() ? $this.offset().top : 0))
                        },
                        'time': Date.now(),
                        'target': e.target,
                        'element': e.originalEvent.srcElement,
                        'index': $(e.target).index()
                    };

                    var touchData = {
                        'firstTap': firstTap,
                        'secondTap': lastTap,
                        'interval': lastTap.time - firstTap.time
                    };

                    if (!cooling) {
                    	triggerCustomEvent(thisObject, 'doubletap', e, touchData);
                        firstTap = null;
                    }
                    
                    cooling = true;
                    
                    cooloff = window.setTimeout(function () {
                    	cooling = false;
                    }, settings.doubletap_int);
					
                } else {
                    $this.data('lastTouch', now);
                    action = window.setTimeout(function () {
                        firstTap = null;
                        window.clearTimeout(action);
                    }, settings.doubletap_int, [e]);
                }
                $this.data('lastTouch', now);
            });



        },
        remove: function () {
            $(this).off(settings.startevent, $(this).data.callee1).off(settings.endevent, $(this).data.callee2);
        }
    };
    $.event.special.singletap = {
        setup: function () {
            var thisObject = this,
                $this = $(thisObject),
                origTarget = null,
                startTime = null,
                start_pos = {
                    x: 0,
                    y: 0
                };

            $this.on(settings.startevent, function singleTapFunc1(e) {
                if (e.which && e.which !== 1) {
                    return false;
                } else {
                    startTime = Date.now();
                    origTarget = e.target;
                    $this.data('callee1', singleTapFunc1);

                    start_pos.x = (e.originalEvent.targetTouches) ? e.originalEvent.targetTouches[0].pageX : e.pageX;
                    start_pos.y = (e.originalEvent.targetTouches) ? e.originalEvent.targetTouches[0].pageY : e.pageY;
                    
                    return true;
                }
            }).on(settings.endevent, function singleTapFunc2(e) {
                $this.data('callee2', singleTapFunc2);
                if (e.target == origTarget) {
                    
                    var end_pos_x = (e.originalEvent.changedTouches) ? e.originalEvent.changedTouches[0].pageX : e.pageX,
                        end_pos_y = (e.originalEvent.changedTouches) ? e.originalEvent.changedTouches[0].pageY : e.pageY;
                    settings.tap_timer = window.setTimeout(function () {
                        
                        var diff_x = (start_pos.x - end_pos_x), diff_y = (start_pos.y - end_pos_y);
                        
                        if(!$this.data('doubletapped') && !$this.data('tapheld') && (((start_pos.x == end_pos_x) && (start_pos.y == end_pos_y)) || (diff_x >= -(settings.tap_pixel_range) && diff_x <= settings.tap_pixel_range && diff_y >= -(settings.tap_pixel_range) && diff_y <= settings.tap_pixel_range))) {

                            var origEvent = e.originalEvent;
                            var touchData = {
                                'position': {
                                    'x': (settings.touch_capable) ? origEvent.changedTouches[0].screenX : e.screenX,
                                    'y': (settings.touch_capable) ? origEvent.changedTouches[0].screenY : e.screenY
                                },
                                'offset': {
                                    'x': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageX - ($this.offset() ? $this.offset().left : 0)) : Math.round(e.pageX - ($this.offset() ? $this.offset().left : 0)),
									'y': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageY - ($this.offset() ? $this.offset().top : 0)) : Math.round(e.pageY - ($this.offset() ? $this.offset().top : 0))
                                },
                                'time': Date.now(),
                                'target': e.target
                            };
                            
                            if((touchData.time - startTime) < settings.taphold_threshold)
                            {
                                triggerCustomEvent(thisObject, 'singletap', e, touchData);
                            }
                        }
                    }, settings.doubletap_int);
                }
            });
        },

        remove: function () {
            $(this).off(settings.startevent, $(this).data.callee1).off(settings.endevent, $(this).data.callee2);
        }
    };

    $.event.special.tap = {
        setup: function () {
            var thisObject = this,
                $this = $(thisObject),
                started = false,
                origTarget = null,
                start_time,
                start_pos = {
                    x: 0,
                    y: 0
                },
                touches;

            $this.on(settings.startevent, function tapFunc1(e) {
                $this.data('callee1', tapFunc1);

                if( e.which && e.which !== 1 )
				{
                    return false;
                }
				else
				{
                    started = true;
                    start_pos.x = (e.originalEvent.targetTouches) ? e.originalEvent.targetTouches[0].pageX : e.pageX;
                    start_pos.y = (e.originalEvent.targetTouches) ? e.originalEvent.targetTouches[0].pageY : e.pageY;
                    start_time = Date.now();
                    origTarget = e.target;
					
                    touches = (e.originalEvent.targetTouches) ? e.originalEvent.targetTouches : [ e ];
                    return true;
                }
            }).on(settings.endevent, function tapFunc2(e) {
                $this.data('callee2', tapFunc2);

                var end_x = (e.originalEvent.targetTouches) ? e.originalEvent.changedTouches[0].pageX : e.pageX,
                    end_y = (e.originalEvent.targetTouches) ? e.originalEvent.changedTouches[0].pageY : e.pageY,
                    diff_x = (start_pos.x - end_x),
                    diff_y = (start_pos.y - end_y),
                    eventName;
					
                if (origTarget == e.target && started && ((Date.now() - start_time) < settings.taphold_threshold) && ((start_pos.x == end_x && start_pos.y == end_y) || (diff_x >= -(settings.tap_pixel_range) && diff_x <= settings.tap_pixel_range && diff_y >= -(settings.tap_pixel_range) && diff_y <= settings.tap_pixel_range))) {
                    var origEvent = e.originalEvent;
                    var touchData = [ ];
					
                    for( var i = 0; i < touches.length; i++)
                    {
                        var touch = {
                            'position': {
                                'x': (settings.touch_capable) ? origEvent.changedTouches[i].screenX : e.screenX,
                                'y': (settings.touch_capable) ? origEvent.changedTouches[i].screenY : e.screenY
                            },
                            'offset': {
                                'x': (settings.touch_capable) ? Math.round(origEvent.changedTouches[i].pageX - ($this.offset() ? $this.offset().left : 0)) : Math.round(e.pageX - ($this.offset() ? $this.offset().left : 0)),
                                'y': (settings.touch_capable) ? Math.round(origEvent.changedTouches[i].pageY - ($this.offset() ? $this.offset().top : 0)) : Math.round(e.pageY - ($this.offset() ? $this.offset().top : 0))
                            },
                            'time': Date.now(),
                            'target': e.target
                        };
                    	
                        touchData.push( touch );
                    }
                    
                    triggerCustomEvent(thisObject, 'tap', e, touchData);
                }
            });
        },

        remove: function () {
            $(this).off(settings.startevent, $(this).data.callee1).off(settings.endevent, $(this).data.callee2);
        }
    };

    $.event.special.swipe = {
        setup: function () {
            var thisObject = this,
                $this = $(thisObject),
                started = false,
                hasSwiped = false,
                originalCoord = {
                    x: 0,
                    y: 0
                },
                finalCoord = {
                    x: 0,
                    y: 0
                },
                startEvnt;

            function touchStart(e) {
                $this = $(e.currentTarget);
                $this.data('callee1', touchStart);
                originalCoord.x = (e.originalEvent.targetTouches) ? e.originalEvent.targetTouches[0].pageX : e.pageX;
                originalCoord.y = (e.originalEvent.targetTouches) ? e.originalEvent.targetTouches[0].pageY : e.pageY;
                finalCoord.x = originalCoord.x;
                finalCoord.y = originalCoord.y;
                started = true;
                var origEvent = e.originalEvent;
                // Read event data into our startEvt:
                startEvnt = {
                    'position': {
                        'x': (settings.touch_capable) ? origEvent.touches[0].screenX : e.screenX,
                        'y': (settings.touch_capable) ? origEvent.touches[0].screenY : e.screenY
                    },
                    'offset': {
                        'x': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageX - ($this.offset() ? $this.offset().left : 0)) : Math.round(e.pageX - ($this.offset() ? $this.offset().left : 0)),
                        'y': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageY - ($this.offset() ? $this.offset().top : 0)) : Math.round(e.pageY - ($this.offset() ? $this.offset().top : 0))
                    },
                    'time': Date.now(),
                    'target': e.target
                };
            }

            function touchMove(e) {
                $this = $(e.currentTarget);
                $this.data('callee2', touchMove);
                finalCoord.x = (e.originalEvent.targetTouches) ? e.originalEvent.targetTouches[0].pageX : e.pageX;
                finalCoord.y = (e.originalEvent.targetTouches) ? e.originalEvent.targetTouches[0].pageY : e.pageY;
                var swipedir;
                var ele_x_threshold = ($this.parent().data('xthreshold')) ? $this.parent().data('xthreshold') : $this.data('xthreshold'),
                    ele_y_threshold = ($this.parent().data('ythreshold')) ? $this.parent().data('ythreshold') : $this.data('ythreshold'),
                    h_threshold = (typeof ele_x_threshold !== 'undefined' && ele_x_threshold !== false && parseInt(ele_x_threshold)) ? parseInt(ele_x_threshold) : settings.swipe_h_threshold,
                    v_threshold = (typeof ele_y_threshold !== 'undefined' && ele_y_threshold !== false && parseInt(ele_y_threshold)) ? parseInt(ele_y_threshold) : settings.swipe_v_threshold; 
                
                if (originalCoord.y > finalCoord.y && (originalCoord.y - finalCoord.y > v_threshold)) {
                    swipedir = 'swipeup';
                }
                if (originalCoord.x < finalCoord.x && (finalCoord.x - originalCoord.x > h_threshold)) {
                    swipedir = 'swiperight';
                }
                if (originalCoord.y < finalCoord.y && (finalCoord.y - originalCoord.y > v_threshold)) {
                    swipedir = 'swipedown';
                }
                if (originalCoord.x > finalCoord.x && (originalCoord.x - finalCoord.x > h_threshold)) {
                    swipedir = 'swipeleft';
                }
                if (swipedir != undefined && started) {
                    originalCoord.x = 0;
                    originalCoord.y = 0;
                    finalCoord.x = 0;
                    finalCoord.y = 0;
                    started = false;
                    var origEvent = e.originalEvent;
                    var endEvnt = {
                        'position': {
                            'x': (settings.touch_capable) ? origEvent.touches[0].screenX : e.screenX,
                            'y': (settings.touch_capable) ? origEvent.touches[0].screenY : e.screenY
                        },
                        'offset': {
                            'x': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageX - ($this.offset() ? $this.offset().left : 0)) : Math.round(e.pageX - ($this.offset() ? $this.offset().left : 0)),
                            'y': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageY - ($this.offset() ? $this.offset().top : 0)) : Math.round(e.pageY - ($this.offset() ? $this.offset().top : 0))
                        },
                        'time': Date.now(),
                        'target': e.target
                    };

                    var xAmount = Math.abs(startEvnt.position.x - endEvnt.position.x),
                        yAmount = Math.abs(startEvnt.position.y - endEvnt.position.y);

                    var touchData = {
                        'startEvnt': startEvnt,
                        'endEvnt': endEvnt,
                        'direction': swipedir.replace('swipe', ''),
                        'xAmount': xAmount,
                        'yAmount': yAmount,
                        'duration': endEvnt.time - startEvnt.time
                    };
                    hasSwiped = true;
                    $this.trigger('swipe', touchData).trigger(swipedir, touchData);
                }
            }

            function touchEnd(e) {
                $this = $(e.currentTarget);
                var swipedir = "";
                $this.data('callee3', touchEnd);
                if (hasSwiped) {
                    var ele_x_threshold = $this.data('xthreshold'),
                        ele_y_threshold = $this.data('ythreshold'),
                        h_threshold = (typeof ele_x_threshold !== 'undefined' && ele_x_threshold !== false && parseInt(ele_x_threshold)) ? parseInt(ele_x_threshold) : settings.swipe_h_threshold,
                        v_threshold = (typeof ele_y_threshold !== 'undefined' && ele_y_threshold !== false && parseInt(ele_y_threshold)) ? parseInt(ele_y_threshold) : settings.swipe_v_threshold;

                    var origEvent = e.originalEvent;
                    var endEvnt = {
                        'position': {
                            'x': (settings.touch_capable) ? origEvent.changedTouches[0].screenX : e.screenX,
                            'y': (settings.touch_capable) ? origEvent.changedTouches[0].screenY : e.screenY
                        },
                        'offset': {
                            'x': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageX - ($this.offset() ? $this.offset().left : 0)) : Math.round(e.pageX - ($this.offset() ? $this.offset().left : 0)),
                            'y': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageY - ($this.offset() ? $this.offset().top : 0)) : Math.round(e.pageY - ($this.offset() ? $this.offset().top : 0))
                        },
                        'time': Date.now(),
                        'target': e.target
                    };

                    if (startEvnt.position.y > endEvnt.position.y && (startEvnt.position.y - endEvnt.position.y > v_threshold)) {
                        swipedir = 'swipeup';
                    }
                    if (startEvnt.position.x < endEvnt.position.x && (endEvnt.position.x - startEvnt.position.x > h_threshold)) {
                        swipedir = 'swiperight';
                    }
                    if (startEvnt.position.y < endEvnt.position.y && (endEvnt.position.y - startEvnt.position.y > v_threshold)) {
                        swipedir = 'swipedown';
                    }
                    if (startEvnt.position.x > endEvnt.position.x && (startEvnt.position.x - endEvnt.position.x > h_threshold)) {
                        swipedir = 'swipeleft';
                    }

                    var xAmount = Math.abs(startEvnt.position.x - endEvnt.position.x),
                        yAmount = Math.abs(startEvnt.position.y - endEvnt.position.y);

                    var touchData = {
                        'startEvnt': startEvnt,
                        'endEvnt': endEvnt,
                        'direction': swipedir.replace('swipe', ''),
                        'xAmount': xAmount,
                        'yAmount': yAmount,
                        'duration': endEvnt.time - startEvnt.time
                    };
                    $this.trigger('swipeend', touchData);
                }

                started = false;
                hasSwiped = false;
            }

            $this.on(settings.startevent, touchStart);
            $this.on(settings.moveevent, touchMove);
            $this.on(settings.endevent, touchEnd);
        },

        remove: function () {
            $(this).off(settings.startevent, $(this).data.callee1).off(settings.moveevent, $(this).data.callee2).off(settings.endevent, $(this).data.callee3);
        }
    };

    $.event.special.scrollstart = {
        setup: function () {
            var thisObject = this,
                $this = $(thisObject),
                scrolling,
                timer;

            function trigger(event, state) {
                scrolling = state;
                triggerCustomEvent(thisObject, scrolling ? 'scrollstart' : 'scrollend', event);
            }

            $this.on(settings.scrollevent, function scrollFunc(event) {
                $this.data('callee', scrollFunc);

                if (!scrolling) {
                    trigger(event, true);
                }

                clearTimeout(timer);
                timer = setTimeout(function () {
                    trigger(event, false);
                }, 50);
            });
        },

        remove: function () {
            $(this).off(settings.scrollevent, $(this).data.callee);
        }
    };

    var win = $(window),
        special_event,
        get_orientation,
        last_orientation,
        initial_orientation_is_landscape,
        initial_orientation_is_default,
        portrait_map = {
            '0': true,
            '180': true
        };

    if (settings.orientation_support) {
        var ww = window.innerWidth || win.width(),
            wh = window.innerHeight || win.height(),
            landscape_threshold = 50;

        initial_orientation_is_landscape = ww > wh && (ww - wh) > landscape_threshold;
        initial_orientation_is_default = portrait_map[window.orientation];

        if ((initial_orientation_is_landscape && initial_orientation_is_default) || (!initial_orientation_is_landscape && !initial_orientation_is_default)) {
            portrait_map = {
                '-90': true,
                '90': true
            };
        }
    }

    $.event.special.orientationchange = special_event = {
        setup: function () {
           
            if (settings.orientation_support) {
                return false;
            }
            last_orientation = get_orientation();

            win.on('throttledresize', handler);
            return true;
        },
        teardown: function () {
            if (settings.orientation_support) {
                return false;

            }

            win.off('throttledresize', handler);
            return true;
        },
        add: function (handleObj) {
         
            var old_handler = handleObj.handler;

            handleObj.handler = function (event) {
                event.orientation = get_orientation();
                return old_handler.apply(this, arguments);
            };
        }
    };

    function handler() {
        var orientation = get_orientation();

        if (orientation !== last_orientation) {
            last_orientation = orientation;
            win.trigger("orientationchange");
        }
    }

    $.event.special.orientationchange.orientation = get_orientation = function () {
        var isPortrait = true,
            elem = document.documentElement;

        if (settings.orientation_support) {
            isPortrait = portrait_map[window.orientation];
        } else {
            isPortrait = elem && elem.clientWidth / elem.clientHeight < 1.1;
        }

        return isPortrait ? 'portrait' : 'landscape';
    };

    $.event.special.throttledresize = {
        setup: function () {
            $(this).on('resize', throttle_handler);
        },
        teardown: function () {
            $(this).off('resize', throttle_handler);
        }
    };

    var throttle = 250,
        throttle_handler = function () {
            curr = Date.now();
            diff = curr - lastCall;

            if (diff >= throttle) {
                lastCall = curr;
                $(this).trigger('throttledresize');

            } else {
                if (heldCall) {
                    window.clearTimeout(heldCall);
                }
                heldCall = window.setTimeout(handler, throttle - diff);
            }
        },
        lastCall = 0,
        heldCall,
        curr,
        diff;

    function triggerCustomEvent(obj, eventType, event, touchData) {
        var originalType = event.type;
        event.type = eventType;

        $.event.dispatch.call(obj, event, touchData);
        event.type = originalType;
    }

    $.each({
        scrollend: 'scrollstart',
        swipeup: 'swipe',
        swiperight: 'swipe',
        swipedown: 'swipe',
        swipeleft: 'swipe',
        swipeend: 'swipe',
        tap2: 'tap'
    }, function (e, srcE) {
        $.event.special[e] = {
            setup: function () {
                $(this).on(srcE, $.noop);
            }
        };
    });

}(jQuery));


/*---------------GET FULLSCREEEN-----------------*/
(function () {
	'use strict';
	var document = typeof window !== 'undefined' && typeof window.document !== 'undefined' ? window.document : {};
	var isCommonjs = typeof module !== 'undefined' && module.exports;
	var keyboardAllowed = typeof Element !== 'undefined' && 'ALLOW_KEYBOARD_INPUT' in Element;
	var fn = (function () {
		var val;
		var fnMap = [
			[
				'requestFullscreen',
				'exitFullscreen',
				'fullscreenElement',
				'fullscreenEnabled',
				'fullscreenchange',
				'fullscreenerror'
			],
			// New WebKit
			[
				'webkitRequestFullscreen',
				'webkitExitFullscreen',
				'webkitFullscreenElement',
				'webkitFullscreenEnabled',
				'webkitfullscreenchange',
				'webkitfullscreenerror'

			],
			// Old WebKit (Safari 5.1)
			[
				'webkitRequestFullScreen',
				'webkitCancelFullScreen',
				'webkitCurrentFullScreenElement',
				'webkitCancelFullScreen',
				'webkitfullscreenchange',
				'webkitfullscreenerror'

			],
			[
				'mozRequestFullScreen',
				'mozCancelFullScreen',
				'mozFullScreenElement',
				'mozFullScreenEnabled',
				'mozfullscreenchange',
				'mozfullscreenerror'
			],
			[
				'msRequestFullscreen',
				'msExitFullscreen',
				'msFullscreenElement',
				'msFullscreenEnabled',
				'MSFullscreenChange',
				'MSFullscreenError'
			]
		];

		var i = 0;
		var l = fnMap.length;
		var ret = {};

		for (; i < l; i++) {
			val = fnMap[i];
			if (val && val[1] in document) {
				for (i = 0; i < val.length; i++) {
					ret[fnMap[0][i]] = val[i];
				}
				return ret;
			}
		}

		return false;
	})();

	var eventNameMap = {
		change: fn.fullscreenchange,
		error: fn.fullscreenerror
	};

	var screenfull = {
		request: function (elem) {
			var request = fn.requestFullscreen;
			elem = elem || document.documentElement;
			if (/ Version\/5\.1(?:\.\d+)? Safari\//.test(navigator.userAgent)) {
				elem[request]();
			} else {
				elem[request](keyboardAllowed ? Element.ALLOW_KEYBOARD_INPUT : {});
			}
		},
		exit: function () {
			document[fn.exitFullscreen]();
		},
		toggle: function (elem) {
			if (this.isFullscreen) {
				this.exit();
			} else {
				this.request(elem);
			}
		},
		onchange: function (callback) {
			this.on('change', callback);
		},
		onerror: function (callback) {
			this.on('error', callback);
		},
		on: function (event, callback) {
			var eventName = eventNameMap[event];
			if (eventName) {
				document.addEventListener(eventName, callback, false);
			}
		},
		off: function (event, callback) {
			var eventName = eventNameMap[event];
			if (eventName) {
				document.removeEventListener(eventName, callback, false);
			}
		},
		raw: fn
	};

	if (!fn) {
		if (isCommonjs) {
			module.exports = false;
		} else {
			window.screenfull = false;
		}
		return;
	}

	Object.defineProperties(screenfull, {
		isFullscreen: {
			get: function () {
				return Boolean(document[fn.fullscreenElement]);
			}
		},
		element: {
			enumerable: true,
			get: function () {
				return document[fn.fullscreenElement];
			}
		},
		enabled: {
			enumerable: true,
			get: function () {
				return Boolean(document[fn.fullscreenEnabled]);
			}
		}
	});

	if (isCommonjs) {
		module.exports = screenfull;
	} else {
		window.screenfull = screenfull;
	}
})();
/*
 * LucidScroll
 * 
 * Created by Shikkediel (c) 2013-2019 ataredo.com
 * 
 * Version 3.4.3
 *
 * Requires jQuery 1.8.0+
 * Includes easing equations
 *
 */

(function($, nib) {

$.fn.impulse = function(options) {

	var set = $.extend({}, $.fn.impulse.default, options), gate = $(nib),
	vessel = this, object = $(set.target), area = {}, edge = [],
	fad = {}, entity, brink = [], outset = [], quit = [], morph,
	way, speed, destined = [], pour = 'requestAnimationFrame',
	use = $.extend({novel: pour in nib, turned: 0}, set);

	elementAnalysis();

	vessel.each(function(hit) {

		use = $.extend({}, use);

		$(this).data('impulse', use).on('mousewheel', function(act, info) {

			if (!use.keen && !act.mien) return;

			if (act.mien) {
			fad = $.extend({}, use, info);
			use.annul = fad.delay == true;
			var loom = act.mien;
			fad.fluid = false;
			}
			else {
			if (use.annul) return;
			fad = use;
			loom = act.originalEvent.deltaY;
			}

			loom = loom/Math.abs(loom);

			if (use.crux) {
			entity = $(this);
			brink[0] = edge[hit];
			}
			else {
			entity = object;
			brink = edge;
			}

			$.each({range: 'orbit', tempo: 'pace'}, function(slot, mate) {
			if (typeof fad[slot] === 'function') fad[mate] = fad[slot]();
			else fad[mate] = fad[slot];
			});

			if (loom != use.zeal || act.mien) use.turned = 1;
			else use.turned = Math.min(use.curb, use.turned+1);

			if (!fad.delay && fad.fluid && use.turned == 1) morph = 'curve';
			else morph = fad.effect;

			way = loom*fad.orbit*Math.pow(use.leap, use.turned-1);
			speed = fad.pace*Math.pow(use.sloth, use.turned-1) || 1;
			use.zeal = loom;

			entity.each(function(part) {
			outset[part] = $(this).scrollTop();
			destined[part] = outset[part]+way;
			quit[part] = onFringe(this, part, outset[part]);
			});

			use.waive = ceaseOperation();

			if (!way) speed = 1;
			if (use.novel) {
			if (use.motion) {
			cancelAnimationFrame(use.motion);
			use.initial = use.present;
			}
			else use.initial = Date.now();
			use.motion = nib[pour](streamCore);
			}
			else inciteSource();
		});

		this.addEventListener('wheel', function(tick) {

			if (!use.keen) return;
			if (use.annul) return denyRise(tick);
			else if (fad.delay == true && !use.waive) use.annul = true;
			if (!(use.waive && use.occur)) denyRise(tick);

		}, hasQuiet() ? {passive: false} : false);
	});

	$.easing['curve'] = $.easing['easeInOutSine'];

	gate.resize(function() {
	clearTimeout(use.bound);
	use.bound = setTimeout(detectOverflow, 100);
	});

	return this;

	function streamCore() {
	use.present = Date.now();
	var advance = Math.min(use.present-use.initial, speed)/speed,
	increase = $.easing[morph](advance);
	entity.each(function(key) {
	if (!quit[key]) {
	$(this).scrollTop(outset[key]+increase*way);
	checkLimits(this, key, advance);
	}
	});
	if (advance < 1 && !use.waive) use.motion = nib[pour](streamCore);
	else hindStage();
	}

	function inciteSource() {
	entity.each(function(beat) {
	if (!quit[beat]) {
	$(this).stop().animate({scrollTop: destined[beat]}, {
	duration: speed,
	easing: morph,
	progress: function(current, sequence) {
	checkLimits(this, beat, sequence);
	},
	complete: hindStage
	});
	}
	});
	}

	function checkLimits(essence, rank, factor) {
	if (100*factor >= fad.reset) use.turned = 0;
	if (onFringe(essence, rank)) {
	quit[rank] = true;
	if (!use.novel) $(essence).stop(true, true);
	use.waive = ceaseOperation();
	}
	}

	function onFringe(matter, cue, genesis) {
	var put = Math.round(genesis || $(matter).scrollTop()),
	above = destined[cue] < 0 && !put,
	below = destined[cue] > brink[cue] && put == brink[cue] && fad.orbit > 0;
	return above || below;
	}

	function ceaseOperation() {
	return quit.every(function(flag) {return flag});
	}

	function hindStage() {
	use.turned = use.annul = use.motion = 0;
	}

	function denyRise(jab) {
	jab.preventDefault();
	jab.stopPropagation();
	}

	function elementAnalysis() {
	var item = $();

	if (!object.length) {
	use.crux = true;
	object = vessel;
	}
	object.each(function() {
	if ($.zenith(this)) {
	if (!use.main) {
	if (use.novel) use.main = nib;
	else use.main = baseTag();
	item = item.add(use.main);
	}
	}
	else item = item.add(this);
	});
	use.target = object = item;
	object.each(function(zest) {
	if ($.zenith(this)) area[zest] = 'hub';
	else area[zest] = 'sub';
	});
	if (use.crux && use.main) vessel = object;
	detectOverflow();
	}

	function baseTag() {
	var origin = gate.scrollTop();
	//gate.scrollTop(1);
	if ($('html').scrollTop()) var root = 'html';
	else if ($('body').scrollTop()) root = 'body';
	else root = 'html, body';
	gate.scrollTop(origin);
	return root;
	}

	function detectOverflow() {
	object.each(function(peg) {
	if (area[peg] == 'hub') var teem = $(document).height()-gate.height();
	else teem = this.scrollHeight-$(this).height();
	edge[peg] = Math.round(teem);
	});
	}

	function hasQuiet() {
	var cold = false,
	hike = function() {};
	try {
	var aid = Object.defineProperty({}, 'passive', {
	get: function() {cold = true}
	});
	nib.addEventListener('test', hike, aid);
	nib.removeEventListener('test', hike, aid);
	} catch(e) {}
	return cold;
	}
};

$.zenith = function(sample) {

	var peak = [nib,document,'HTML','BODY'], facet;
	if (sample) return peak.indexOf(sample) > -1 || peak.indexOf(sample.tagName) > -1;
	$.each(peak, function(spot, detail) {
	facet = $(detail).data('impulse');
	if (facet) return false;
	});
	return facet;
};

$.fn.impulse.default = {

	target: '',
	range: 135,
	leap: 1.35,
	tempo: 500,
	sloth: 1.1,
	curb: 5,
	reset: 85,
	effect: 'easeOutSine',
	keen: true,
	delay: false,
	occur: true,
	fluid: true
};

$.fn.demit = function() {

	return this.each(function() {
	if ($.zenith(this)) var habit = $.zenith();
	else habit = $(this).data('impulse');
	if (habit) {
	if (habit.novel) cancelAnimationFrame(habit.motion);
	else habit.target.stop();
	habit.turned = habit.annul = habit.motion = 0;
	}
	});
};

$.fn.amend = function(gist) {

	return this.each(function() {
	if ($.zenith(this)) var quirk = $.zenith();
	else quirk = $(this).data('impulse');
	if (quirk) {
	$.each(gist, function(sign, rate) {
	if (sign in quirk) quirk[sign] = rate;
	});
	}
	});
};

$.fn.evoke = function(unit) {

	var lot = $.Event('mousewheel', {mien: true}), bulk;
	return this.each(function() {
	if ($.zenith(this)) {
	if (!bulk) {
	bulk = $.zenith();
	if (bulk) $(bulk.main).trigger(lot, unit);
	}
	}
	else $(this).trigger(lot, unit);
	});
};
}(jQuery, window));



// Based on easing equations from Robert Penner - robertpenner.com/easing
(function ($) {
    var b = {};
    $.each(['Quad', 'Cubic', 'Quart', 'Quint', 'Expo'], function (i, n) {
        b[n] = function (p) {
            return Math.pow(p, i + 2)
        }
    });
    $.extend(b, {
        Sine: function (p) {
            return 1 - Math.cos(p * Math.PI / 2)
        },
        Circ: function (p) {
            return 1 - Math.sqrt(1 - p * p)
        },
        Elastic: function (p) {
            return p === 0 || p === 1 ? p : -Math.pow(2, 8 * (p - 1)) * Math.sin(((p - 1) * 80 - 7.5) * Math.PI / 15)
        },
        Back: function (p) {
            return p * p * (3 * p - 2)
        },
        Bounce: function (p) {
            var f, h = 4;
            while (p < ((f = Math.pow(2, --h)) - 1) / 11) {}
            return (1 / Math.pow(4, 3 - h) - 7.5625 * Math.pow((f * 3 - 2) / 22 - p, 2))
        }
    });
    $.each(b, function (n, e) {
        $.easing['easeIn' + n] = e;
        $.easing['easeOut' + n] = function (p) {
            return 1 - e(1 - p)
        };
        $.easing['easeInOut' + n] = function (p) {
            return p < 0.5 ? e(p * 2) / 2 : 1 - e(p * -2 + 2) / 2
        }
    })
})(jQuery);


/*MAGNIFY*/
(function($) {
  $.fn.magnify = function(oOptions) {
    oOptions = $.extend({
      'src': '',
      'speed': 100,
      'timeout': -1,
      'touchBottomOffset': 0,
      'finalWidth': null,
      'finalHeight': null,
      'magnifiedWidth': null,
      'magnifiedHeight': null,
      'limitBounds': false,
      'mobileCloseEvent': 'touchstart',
      'afterLoad': function(){}
    }, oOptions);

    var $that = this, // Preserve scope
      $html = $('html'),

      init = function(el) {
        var $image = $(el),
          $anchor = $image.closest('a'),
          oDataAttr = {};

        for (var i in oOptions) {
          oDataAttr[i] = $image.attr('data-magnify-' + i.toLowerCase());
        }

        var sZoomSrc = oDataAttr['src'] || oOptions['src'] || $anchor.attr('href') || '';
        if (!sZoomSrc) return;

        var $container,
          $lens,
          nImageWidth,
          nImageHeight,
          nMagnifiedWidth,
          nMagnifiedHeight,
          nLensWidth,
          nLensHeight,
          nBoundX = 0,
          nBoundY = 0,
          nPosX, nPosY,     
          nX, nY,           
          oContainerOffset, 
          oImageOffset,    
          getOffset = function() {
            var o = $container.offset();
            oImageOffset = {
              'top': ($image.offset().top-o.top) + parseInt($image.css('border-top-width')) + parseInt($image.css('padding-top')),
              'left': ($image.offset().left-o.left) + parseInt($image.css('border-left-width')) + parseInt($image.css('padding-left'))
            };
            o.top += oImageOffset['top'];
            o.left += oImageOffset['left'];
            return o;
          },
          hideLens = function() {
            if ($lens.is(':visible')) $lens.fadeOut(oOptions['speed'], function() {
              $html.removeClass('magnifying').trigger('magnifyend'); // Reset overflow-x
            });
          },
          moveLens = function(e) {
            if (!nImageHeight) {
              refresh();
              return;
            }
            if (e) {
              e.preventDefault();
          
              nPosX = e.pageX || e.originalEvent.touches[0].pageX;
              nPosY = e.pageY || e.originalEvent.touches[0].pageY;
              $image.data('lastPos', {
                'x': nPosX,
                'y': nPosY
              });
            } else {
              nPosX = $image.data('lastPos').x;
              nPosY = $image.data('lastPos').y;
            }
          
            nX = nPosX - oContainerOffset['left'],
            nY = (nPosY - oContainerOffset['top']) - oOptions['touchBottomOffset'];
            if (!$lens.is(':animated')) {
              if (nX>nBoundX && nX<nImageWidth-nBoundX && nY>nBoundY && nY<nImageHeight-nBoundY) {
                if ($lens.is(':hidden')) {
                  $html.addClass('magnifying').trigger('magnifystart'); // Hide overflow-x while zooming
                  $lens.fadeIn(oOptions['speed']);
                }
              } else {
                hideLens();
              }
            }
            if ($lens.is(':visible')) {
              var sBgPos = '';
              if (nMagnifiedWidth && nMagnifiedHeight) {
              
                var nRatioX = -Math.round(nX/nImageWidth*nMagnifiedWidth-nLensWidth/2),
                  nRatioY = -Math.round(nY/nImageHeight*nMagnifiedHeight-nLensHeight/2);
                if (oOptions['limitBounds']) {
                  var nBoundRight = -Math.round((nImageWidth-nBoundX)/nImageWidth*nMagnifiedWidth-nLensWidth/2),
                    nBoundBottom = -Math.round((nImageHeight-nBoundY)/nImageHeight*nMagnifiedHeight-nLensHeight/2);
                  if (nRatioX>0) nRatioX = 0;
                  else if (nRatioX<nBoundRight) nRatioX = nBoundRight;
                  if (nRatioY>0) nRatioY = 0;
                  else if (nRatioY<nBoundBottom) nRatioY = nBoundBottom;
                }
                sBgPos = nRatioX + 'px ' + nRatioY + 'px';
              }
           
              $lens.css({
                'top': Math.round(nY-nLensHeight/2) + oImageOffset['top'] + 'px',
                'left': Math.round(nX-nLensWidth/2) + oImageOffset['left'] + 'px',
                'background-position': sBgPos
              });
            }
          };

        if (!isNaN(+oDataAttr['speed'])) oOptions['speed'] = +oDataAttr['speed'];
        if (!isNaN(+oDataAttr['timeout'])) oOptions['timeout'] = +oDataAttr['timeout'];
        if (!isNaN(+oDataAttr['finalWidth'])) oOptions['finalWidth'] = +oDataAttr['finalWidth'];
        if (!isNaN(+oDataAttr['finalHeight'])) oOptions['finalHeight'] = +oDataAttr['finalHeight'];
        if (!isNaN(+oDataAttr['magnifiedWidth'])) oOptions['magnifiedWidth'] = +oDataAttr['magnifiedWidth'];
        if (!isNaN(+oDataAttr['magnifiedHeight'])) oOptions['magnifiedHeight'] = +oDataAttr['magnifiedHeight'];
        if (oDataAttr['limitBounds']==='true') oOptions['limitBounds'] = true;
        if (typeof window[oDataAttr['afterLoad']]==='function') oOptions.afterLoad = window[oDataAttr['afterLoad']];

        if (/\b(Android|BlackBerry|IEMobile|iPad|iPhone|Mobile|Opera Mini)\b/.test(navigator.userAgent)) {
          if (!isNaN(+oDataAttr['touchBottomOffset'])) oOptions['touchBottomOffset'] = +oDataAttr['touchBottomOffset'];
        } else {
          oOptions['touchBottomOffset'] = 0;
        }
        $image.data('originalStyle', $image.attr('style'));
        var elZoomImage = new Image();
        $(elZoomImage).on({
          'load': function() {
         
            $image.css('display', 'block');
            if (!$image.parent('.magnify').length) {
              $image.wrap('<div class="magnify"></div>');
            }
            $container = $image.parent('.magnify');
            if ($image.prev('.magnify-lens').length) {
              $container.children('.magnify-lens').css('background-image', 'url(\'' + sZoomSrc + '\')');
            } else {
              $image.before('<div class="magnify-lens loading" style="background:url(\'' + sZoomSrc + '\') 0 0 no-repeat"></div>');
            }
            $lens = $container.children('.magnify-lens');
            $lens.removeClass('loading');
          
            nImageWidth = oOptions['finalWidth'] || $image.width();
            nImageHeight = oOptions['finalHeight'] || $image.height();
            nMagnifiedWidth = oOptions['magnifiedWidth'] || elZoomImage.width;
            nMagnifiedHeight = oOptions['magnifiedHeight'] || elZoomImage.height;
            nLensWidth = $lens.width();
            nLensHeight = $lens.height();
            oContainerOffset = getOffset();
          
            if (oOptions['limitBounds']) {
              nBoundX = (nLensWidth/2) / (nMagnifiedWidth/nImageWidth);
              nBoundY = (nLensHeight/2) / (nMagnifiedHeight/nImageHeight);
            }
            if (nMagnifiedWidth!==elZoomImage.width || nMagnifiedHeight!==elZoomImage.height) {
              $lens.css('background-size', nMagnifiedWidth + 'px ' + nMagnifiedHeight + 'px');
            }
            $image.data('zoomSize', {
              'width': nMagnifiedWidth,
              'height': nMagnifiedHeight
            });
            $container.data('mobileCloseEvent', oDataAttr['mobileCloseEvent'] || oOptions['mobileCloseEvent']);
            elZoomImage = null;
            oOptions.afterLoad();
        
            if ($lens.is(':visible')) moveLens();
            $container.off().on({
              'mousemove touchmove': moveLens,
              'mouseenter': function() {
                oContainerOffset = getOffset();
              },
              'mouseleave': hideLens
            });

            if (oOptions['timeout']>=0) {
              $container.on('touchend', function() {
                setTimeout(hideLens, oOptions['timeout']);
              });
            }
            $('body').not($container).on('touchstart', hideLens);
            var sUsemap = $image.attr('usemap');
            if (sUsemap) {
              var $map = $('map[name=' + sUsemap.slice(1) + ']');
              $image.after($map);
              $container.click(function(e) {
                if (e.clientX || e.clientY) {
                  $lens.hide();
                  var elPoint = document.elementFromPoint(
                      e.clientX || e.originalEvent.touches[0].clientX,
                      e.clientY || e.originalEvent.touches[0].clientY
                    );
                  if (elPoint.nodeName==='AREA') {
                    elPoint.click();
                  } else {
                  
                    $('area', $map).each(function() {
                      var a = $(this).attr('coords').split(',');
                      if (nX>=a[0] && nX<=a[2] && nY>=a[1] && nY<=a[3]) {
                        this.click();
                        return false;
                      }
                    });
                  }
                }
              });
            }

            if ($anchor.length) {
              $anchor.css('display', 'inline-block');
              if ($anchor.attr('href') && !(oDataAttr['src'] || oOptions['src'])) {
                $anchor.click(function(e) {
                  e.preventDefault();
                });
              }
            }

          },
          'error': function() {
            elZoomImage = null;
          }
        });

        elZoomImage.src = sZoomSrc;
      },
      nTimer = 0,
      refresh = function() {
        clearTimeout(nTimer);
        nTimer = setTimeout(function() {
          $that.destroy();
          $that.magnify(oOptions);
        }, 100);
      };

    this.destroy = function() {
      this.each(function() {
        var $this = $(this),
          $lens = $this.prev('div.magnify-lens'),
          sStyle = $this.data('originalStyle');
        if ($this.parent('div.magnify').length && $lens.length) {
          if (sStyle) $this.attr('style', sStyle);
          else $this.removeAttr('style');
          $this.unwrap();
          $lens.remove();
        }
      });
      $(window).off('resize', refresh);
      return $that;
    }
    $(window).resize(refresh);

    return this.each(function() {
      init(this);
    });

  };
}(jQuery));

/*MAGNIFY MOBILE*/
(function($) {
  if (!$.fn.magnify) return;
  $('<style>' +
    '.lens-mobile {' +
      'position:fixed;' +
      'top:0;' +
      'left:0;' +
      'width:100%;' +
      'height:100%;' +
      'background:#ccc;' +
      'display:none;' +
      'overflow:scroll;' +
      '-webkit-overflow-scrolling:touch;' +
      'z-index:9999;' +
    '}' +
    '.magnify-mobile>.close {' +
      'position:fixed;' +
      'top:10px;' +
      'right:10px;' +
      'width:32px;' +
      'height:32px;' +
      'background:#333;' +
      'border-radius:16px;' +
      'color:#fff;' +
      'display:inline-block;' +
      'font:normal bold 20px/32px sans-serif;' +
      'letter-spacing:0;' +
      'opacity:0.8;' +
      'text-align:center;' +
      'text-shadow:none;' +
      'z-index:9999;' +
    '}' +
    '@media only screen and (min-device-width:320px) and (max-device-width:773px) {' +
      '/* Assume QHD (1440 x 2560) is highest mobile resolution */' +
      '.lens-mobile { display:block; }' +
    '}' +
    '</style>').appendTo('head');
  $(window).on('load', function() {
	 if ($('#product-detail-page').length) {  
        $('body').append('<div class="magnify-mobile"><div class="lens-mobile"></div></div>');
	 }
	
    var $lensMobile = $('.lens-mobile');
    if ($lensMobile.is(':visible') && !!('ontouchstart' in window || (window.DocumentTouch && document instanceof DocumentTouch) || navigator.msMaxTouchPoints)) {
      var $magnify = $('.magnify'),
      $magnifyMobile = $('.magnify-mobile');
      $magnify.off();
      $magnifyMobile.hide().append('<i class="close">&times;</i>');
      $magnifyMobile.children('.close').on($magnify.data('mobileCloseEvent'), function() {
        $magnifyMobile.toggle();
      });
      $magnify.children('img').on({
        'touchend': function() {
          if ($(this).data('drag')) return;
          var oScrollOffset = $(this).data('scrollOffset');
          $magnifyMobile.toggle();
          $lensMobile.scrollLeft(oScrollOffset.x);
          $lensMobile.scrollTop(oScrollOffset.y);
        },
        'touchmove': function() {
          $(this).data('drag', true);
        },
        'touchstart': function(e) {
          $lensMobile.html('<img src="' + $(this).prev('.magnify-lens').css('background-image').replace(/url\(["']?|["']?\)/g, '') + '" alt="">');
          var $magnifyImage = $(this),
            oZoomSize = $magnifyImage.data('zoomSize'),
            nX = e.originalEvent.touches[0].pageX - $magnifyImage.offset().left,
            nXPct = nX / $magnifyImage.width(),
            nY = e.originalEvent.touches[0].pageY - $magnifyImage.offset().top,
            nYPct = nY / $magnifyImage.height();
          $magnifyImage.data('scrollOffset', {
            'x': (oZoomSize.width*nXPct)-(window.innerWidth/2),
            'y': (oZoomSize.height*nYPct)-(window.innerHeight/2)
          });
          $(this).data('drag', false);
        }
      });
    }
  });
}(jQuery));



  /*!
  * SELECT2 4.0.11
  * https://select2.github.io
  */
  ;(function (factory) {
  if (typeof define === 'function' && define.amd) {
  define(['jquery'], factory);
  } else if (typeof module === 'object' && module.exports) {
  module.exports = function (root, jQuery) {
  if (jQuery === undefined) {
  if (typeof window !== 'undefined') {
	jQuery = require('jquery');
  }
  else {
	jQuery = require('jquery')(root);
  }
  }
  factory(jQuery);
  return jQuery;
  };
  } else {
  factory(jQuery);
  }
  } (function (jQuery) {

  var S2 =(function () {

  if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd) {
  var S2 = jQuery.fn.select2.amd;
  }
  var S2;(function () { if (!S2 || !S2.requirejs) {
  if (!S2) { S2 = {}; } else { require = S2; }
  
  var requirejs, require, define;
  (function (undef) {
  var main, req, makeMap, handlers,
  defined = {},
  waiting = {},
  config = {},
  defining = {},
  hasOwn = Object.prototype.hasOwnProperty,
  aps = [].slice,
  jsSuffixRegExp = /\.js$/;
  
  function hasProp(obj, prop) {
  return hasOwn.call(obj, prop);
  }
  function normalize(name, baseName) {
  var nameParts, nameSegment, mapValue, foundMap, lastIndex,
	  foundI, foundStarMap, starI, i, j, part, normalizedBaseParts,
	  baseParts = baseName && baseName.split("/"),
	  map = config.map,
	  starMap = (map && map['*']) || {};
  if (name) {
	  name = name.split('/');
	  lastIndex = name.length - 1;
  
	  if (config.nodeIdCompat && jsSuffixRegExp.test(name[lastIndex])) {
		  name[lastIndex] = name[lastIndex].replace(jsSuffixRegExp, '');
	  }
	  if (name[0].charAt(0) === '.' && baseParts) {
		
		  normalizedBaseParts = baseParts.slice(0, baseParts.length - 1);
		  name = normalizedBaseParts.concat(name);
	  }
	  for (i = 0; i < name.length; i++) {
		  part = name[i];
		  if (part === '.') {
			  name.splice(i, 1);
			  i -= 1;
		  } else if (part === '..') {
			  if (i === 0 || (i === 1 && name[2] === '..') || name[i - 1] === '..') {
				  continue;
			  } else if (i > 0) {
				  name.splice(i - 1, 2);
				  i -= 2;
			  }
		  }
	  }
  
	  name = name.join('/');
  }
  
  if ((baseParts || starMap) && map) {
	  nameParts = name.split('/');
  
	  for (i = nameParts.length; i > 0; i -= 1) {
		  nameSegment = nameParts.slice(0, i).join("/");
  
		  if (baseParts) {
			
			  for (j = baseParts.length; j > 0; j -= 1) {
				  mapValue = map[baseParts.slice(0, j).join('/')];
  
				  if (mapValue) {
					  mapValue = mapValue[nameSegment];
					  if (mapValue) {
						  foundMap = mapValue;
						  foundI = i;
						  break;
					  }
				  }
			  }
		  }
  
		  if (foundMap) {
			  break;
		  }
		  if (!foundStarMap && starMap && starMap[nameSegment]) {
			  foundStarMap = starMap[nameSegment];
			  starI = i;
		  }
	  }
  
	  if (!foundMap && foundStarMap) {
		  foundMap = foundStarMap;
		  foundI = starI;
	  }
  
	  if (foundMap) {
		  nameParts.splice(0, foundI, foundMap);
		  name = nameParts.join('/');
	  }
  }
  
  return name;
  }
  
  function makeRequire(relName, forceSync) {
  return function () {
	  var args = aps.call(arguments, 0);
	  if (typeof args[0] !== 'string' && args.length === 1) {
		  args.push(null);
	  }
	  return req.apply(undef, args.concat([relName, forceSync]));
  };
  }
  
  function makeNormalize(relName) {
  return function (name) {
	  return normalize(name, relName);
  };
  }
  
  function makeLoad(depName) {
  return function (value) {
	  defined[depName] = value;
  };
  }
  
  function callDep(name) {
  if (hasProp(waiting, name)) {
	  var args = waiting[name];
	  delete waiting[name];
	  defining[name] = true;
	  main.apply(undef, args);
  }
  
  if (!hasProp(defined, name) && !hasProp(defining, name)) {
	  throw new Error('No ' + name);
  }
  return defined[name];
  }
  function splitPrefix(name) {
  var prefix,
	  index = name ? name.indexOf('!') : -1;
  if (index > -1) {
	  prefix = name.substring(0, index);
	  name = name.substring(index + 1, name.length);
  }
  return [prefix, name];
  }
  function makeRelParts(relName) {
  return relName ? splitPrefix(relName) : [];
  }
  makeMap = function (name, relParts) {
  var plugin,
	  parts = splitPrefix(name),
	  prefix = parts[0],
	  relResourceName = relParts[1];
  
  name = parts[1];
  
  if (prefix) {
	  prefix = normalize(prefix, relResourceName);
	  plugin = callDep(prefix);
  }
  if (prefix) {
	  if (plugin && plugin.normalize) {
		  name = plugin.normalize(name, makeNormalize(relResourceName));
	  } else {
		  name = normalize(name, relResourceName);
	  }
  } else {
	  name = normalize(name, relResourceName);
	  parts = splitPrefix(name);
	  prefix = parts[0];
	  name = parts[1];
	  if (prefix) {
		  plugin = callDep(prefix);
	  }
  }
  return {
	  f: prefix ? prefix + '!' + name : name, 
	  n: name,
	  pr: prefix,
	  p: plugin
  };
  };
  
  function makeConfig(name) {
  return function () {
	  return (config && config.config && config.config[name]) || {};
  };
  }
  
  handlers = {
  require: function (name) {
	  return makeRequire(name);
  },
  exports: function (name) {
	  var e = defined[name];
	  if (typeof e !== 'undefined') {
		  return e;
	  } else {
		  return (defined[name] = {});
	  }
  },
  module: function (name) {
	  return {
		  id: name,
		  uri: '',
		  exports: defined[name],
		  config: makeConfig(name)
	  };
  }
  };
  
  main = function (name, deps, callback, relName) {
  var cjsModule, depName, ret, map, i, relParts,
	  args = [],
	  callbackType = typeof callback,
	  usingExports;
  relName = relName || name;
  relParts = makeRelParts(relName);
  if (callbackType === 'undefined' || callbackType === 'function') {
	  deps = !deps.length && callback.length ? ['require', 'exports', 'module'] : deps;
	  for (i = 0; i < deps.length; i += 1) {
		  map = makeMap(deps[i], relParts);
		  depName = map.f;
		  if (depName === "require") {
			  args[i] = handlers.require(name);
		  } else if (depName === "exports") {
			  args[i] = handlers.exports(name);
			  usingExports = true;
		  } else if (depName === "module") {
			  cjsModule = args[i] = handlers.module(name);
		  } else if (hasProp(defined, depName) ||
					 hasProp(waiting, depName) ||
					 hasProp(defining, depName)) {
			  args[i] = callDep(depName);
		  } else if (map.p) {
			  map.p.load(map.n, makeRequire(relName, true), makeLoad(depName), {});
			  args[i] = defined[depName];
		  } else {
			  throw new Error(name + ' missing ' + depName);
		  }
	  }
  
	  ret = callback ? callback.apply(defined[name], args) : undefined;
  
	  if (name) {
		
		  if (cjsModule && cjsModule.exports !== undef &&
				  cjsModule.exports !== defined[name]) {
			  defined[name] = cjsModule.exports;
		  } else if (ret !== undef || !usingExports) {
			  defined[name] = ret;
		  }
	  }
  } else if (name) {
	  defined[name] = callback;
  }
  };
  
  requirejs = require = req = function (deps, callback, relName, forceSync, alt) {
  if (typeof deps === "string") {
	  if (handlers[deps]) {
		  return handlers[deps](callback);
	  }
	  return callDep(makeMap(deps, makeRelParts(callback)).f);
  } else if (!deps.splice) {
	  config = deps;
	  if (config.deps) {
		  req(config.deps, config.callback);
	  }
	  if (!callback) {
		  return;
	  }
  
	  if (callback.splice) {
		  deps = callback;
		  callback = relName;
		  relName = null;
	  } else {
		  deps = undef;
	  }
  }
  callback = callback || function () {};
  if (typeof relName === 'function') {
	  relName = forceSync;
	  forceSync = alt;
  }
  if (forceSync) {
	  main(undef, deps, callback, relName);
  } else {
	  setTimeout(function () {
		  main(undef, deps, callback, relName);
	  }, 4);
  }
  
  return req;
  };
  req.config = function (cfg) {
  return req(cfg);
  };
  requirejs._defined = defined;
  define = function (name, deps, callback) {
  if (typeof name !== 'string') {
	  throw new Error('See almond README: incorrect module build, no module name');
  }
  if (!deps.splice) {
	  callback = deps;
	  deps = [];
  }
  
  if (!hasProp(defined, name) && !hasProp(waiting, name)) {
	  waiting[name] = [name, deps, callback];
  }
  };
  
  define.amd = {
  jQuery: true
  };
  }());
  
  S2.requirejs = requirejs;S2.require = require;S2.define = define;
  }
  }());
  S2.define("almond", function(){});
  S2.define('jquery',[],function () {
  var _$ = jQuery || $;
  
  if (_$ == null && console && console.error) {
  console.error(
  'Select2: An instance of jQuery or a jQuery-compatible library was not ' +
  'found. Make sure that you are including jQuery before Select2 on your ' +
  'web page.'
  );
  }
  
  return _$;
  });
  
  S2.define('select2/utils',[
  'jquery'
  ], function ($) {
  var Utils = {};
  
  Utils.Extend = function (ChildClass, SuperClass) {
  var __hasProp = {}.hasOwnProperty;
  
  function BaseConstructor () {
  this.constructor = ChildClass;
  }
  
  for (var key in SuperClass) {
  if (__hasProp.call(SuperClass, key)) {
  ChildClass[key] = SuperClass[key];
  }
  }
  
  BaseConstructor.prototype = SuperClass.prototype;
  ChildClass.prototype = new BaseConstructor();
  ChildClass.__super__ = SuperClass.prototype;
  
  return ChildClass;
  };
  
  function getMethods (theClass) {
  var proto = theClass.prototype;
  
  var methods = [];
  
  for (var methodName in proto) {
  var m = proto[methodName];
  
  if (typeof m !== 'function') {
  continue;
  }
  
  if (methodName === 'constructor') {
  continue;
  }
  
  methods.push(methodName);
  }
  
  return methods;
  }
  
  Utils.Decorate = function (SuperClass, DecoratorClass) {
  var decoratedMethods = getMethods(DecoratorClass);
  var superMethods = getMethods(SuperClass);
  
  function DecoratedClass () {
  var unshift = Array.prototype.unshift;
  
  var argCount = DecoratorClass.prototype.constructor.length;
  
  var calledConstructor = SuperClass.prototype.constructor;
  
  if (argCount > 0) {
  unshift.call(arguments, SuperClass.prototype.constructor);
  
  calledConstructor = DecoratorClass.prototype.constructor;
  }
  
  calledConstructor.apply(this, arguments);
  }
  
  DecoratorClass.displayName = SuperClass.displayName;
  
  function ctr () {
  this.constructor = DecoratedClass;
  }
  
  DecoratedClass.prototype = new ctr();
  
  for (var m = 0; m < superMethods.length; m++) {
  var superMethod = superMethods[m];
  
  DecoratedClass.prototype[superMethod] =
  SuperClass.prototype[superMethod];
  }
  
  var calledMethod = function (methodName) {
  var originalMethod = function () {};
  
  if (methodName in DecoratedClass.prototype) {
  originalMethod = DecoratedClass.prototype[methodName];
  }
  
  var decoratedMethod = DecoratorClass.prototype[methodName];
  
  return function () {
  var unshift = Array.prototype.unshift;
  
  unshift.call(arguments, originalMethod);
  
  return decoratedMethod.apply(this, arguments);
  };
  };
  
  for (var d = 0; d < decoratedMethods.length; d++) {
  var decoratedMethod = decoratedMethods[d];
  
  DecoratedClass.prototype[decoratedMethod] = calledMethod(decoratedMethod);
  }
  
  return DecoratedClass;
  };
  
  var Observable = function () {
  this.listeners = {};
  };
  
  Observable.prototype.on = function (event, callback) {
  this.listeners = this.listeners || {};
  
  if (event in this.listeners) {
  this.listeners[event].push(callback);
  } else {
  this.listeners[event] = [callback];
  }
  };
  
  Observable.prototype.trigger = function (event) {
  var slice = Array.prototype.slice;
  var params = slice.call(arguments, 1);
  
  this.listeners = this.listeners || {};
  if (params == null) {
  params = [];
  }
  if (params.length === 0) {
  params.push({});
  }
  params[0]._type = event;
  
  if (event in this.listeners) {
  this.invoke(this.listeners[event], slice.call(arguments, 1));
  }
  
  if ('*' in this.listeners) {
  this.invoke(this.listeners['*'], arguments);
  }
  };
  
  Observable.prototype.invoke = function (listeners, params) {
  for (var i = 0, len = listeners.length; i < len; i++) {
  listeners[i].apply(this, params);
  }
  };
  
  Utils.Observable = Observable;
  
  Utils.generateChars = function (length) {
  var chars = '';
  
  for (var i = 0; i < length; i++) {
  var randomChar = Math.floor(Math.random() * 36);
  chars += randomChar.toString(36);
  }
  
  return chars;
  };
  
  Utils.bind = function (func, context) {
  return function () {
  func.apply(context, arguments);
  };
  };
  
  Utils._convertData = function (data) {
  for (var originalKey in data) {
  var keys = originalKey.split('-');
  
  var dataLevel = data;
  
  if (keys.length === 1) {
  continue;
  }
  
  for (var k = 0; k < keys.length; k++) {
  var key = keys[k];
  key = key.substring(0, 1).toLowerCase() + key.substring(1);
  
  if (!(key in dataLevel)) {
	dataLevel[key] = {};
  }
  
  if (k == keys.length - 1) {
	dataLevel[key] = data[originalKey];
  }
  
  dataLevel = dataLevel[key];
  }
  
  delete data[originalKey];
  }
  
  return data;
  };
  
  Utils.hasScroll = function (index, el) {
  var $el = $(el);
  var overflowX = el.style.overflowX;
  var overflowY = el.style.overflowY;
  if (overflowX === overflowY &&
  (overflowY === 'hidden' || overflowY === 'visible')) {
  return false;
  }
  
  if (overflowX === 'scroll' || overflowY === 'scroll') {
  return true;
  }
  
  return ($el.innerHeight() < el.scrollHeight ||
  $el.innerWidth() < el.scrollWidth);
  };
  
  Utils.escapeMarkup = function (markup) {
  var replaceMap = {
  '\\': '&#92;',
  '&': '&amp;',
  '<': '&lt;',
  '>': '&gt;',
  '"': '&quot;',
  '\'': '&#39;',
  '/': '&#47;'
  };
  if (typeof markup !== 'string') {
  return markup;
  }
  
  return String(markup).replace(/[&<>"'\/\\]/g, function (match) {
  return replaceMap[match];
  });
  };
  Utils.appendMany = function ($element, $nodes) {
  if ($.fn.jquery.substr(0, 3) === '1.7') {
  var $jqNodes = $();
  
  $.map($nodes, function (node) {
  $jqNodes = $jqNodes.add(node);
  });
  
  $nodes = $jqNodes;
  }
  
  $element.append($nodes);
  };
  Utils.__cache = {};
  
  var id = 0;
  Utils.GetUniqueElementId = function (element) {
  var select2Id = element.getAttribute('data-select2-id');
  if (select2Id == null) {
  if (element.id) {
  select2Id = element.id;
  element.setAttribute('data-select2-id', select2Id);
  } else {
  element.setAttribute('data-select2-id', ++id);
  select2Id = id.toString();
  }
  }
  return select2Id;
  };
  
  Utils.StoreData = function (element, name, value) {
  var id = Utils.GetUniqueElementId(element);
  if (!Utils.__cache[id]) {
  Utils.__cache[id] = {};
  }
  
  Utils.__cache[id][name] = value;
  };
  
  Utils.GetData = function (element, name) {
  var id = Utils.GetUniqueElementId(element);
  if (name) {
  if (Utils.__cache[id]) {
  if (Utils.__cache[id][name] != null) {
	return Utils.__cache[id][name];
  }
  return $(element).data(name);
  }
  return $(element).data(name); 
  } else {
  return Utils.__cache[id];
  }
  };
  
  Utils.RemoveData = function (element) {
  var id = Utils.GetUniqueElementId(element);
  if (Utils.__cache[id] != null) {
  delete Utils.__cache[id];
  }
  
  element.removeAttribute('data-select2-id');
  };
  
  return Utils;
  });
  
  S2.define('select2/results',[
  'jquery',
  './utils'
  ], function ($, Utils) {
  function Results ($element, options, dataAdapter) {
  this.$element = $element;
  this.data = dataAdapter;
  this.options = options;
  
  Results.__super__.constructor.call(this);
  }
  
  Utils.Extend(Results, Utils.Observable);
  
  Results.prototype.render = function () {
  var $results = $(
  '<ul class="select2-results__options" role="listbox"></ul>'
  );
  
  if (this.options.get('multiple')) {
  $results.attr('aria-multiselectable', 'true');
  }
  
  this.$results = $results;
  
  return $results;
  };
  
  Results.prototype.clear = function () {
  this.$results.empty();
  };
  
  Results.prototype.displayMessage = function (params) {
  var escapeMarkup = this.options.get('escapeMarkup');
  
  this.clear();
  this.hideLoading();
  
  var $message = $(
  '<li role="alert" aria-live="assertive"' +
  ' class="select2-results__option"></li>'
  );
  
  var message = this.options.get('translations').get(params.message);
  
  $message.append(
  escapeMarkup(
  message(params.args)
  )
  );
  
  $message[0].className += ' select2-results__message';
  
  this.$results.append($message);
  };
  
  Results.prototype.hideMessages = function () {
  this.$results.find('.select2-results__message').remove();
  };
  
  Results.prototype.append = function (data) {
  this.hideLoading();
  
  var $options = [];
  
  if (data.results == null || data.results.length === 0) {
  if (this.$results.children().length === 0) {
  this.trigger('results:message', {
	message: 'noResults'
  });
  }
  
  return;
  }
  
  data.results = this.sort(data.results);
  
  for (var d = 0; d < data.results.length; d++) {
  var item = data.results[d];
  
  var $option = this.option(item);
  
  $options.push($option);
  }
  
  this.$results.append($options);
  };
  
  Results.prototype.position = function ($results, $dropdown) {
  var $resultsContainer = $dropdown.find('.select2-results');
  $resultsContainer.append($results);
  };
  
  Results.prototype.sort = function (data) {
  var sorter = this.options.get('sorter');
  
  return sorter(data);
  };
  
  Results.prototype.highlightFirstItem = function () {
  var $options = this.$results
  .find('.select2-results__option[aria-selected]');
  
  var $selected = $options.filter('[aria-selected=true]');
  if ($selected.length > 0) {
  $selected.first().trigger('mouseenter');
  } else {
  $options.first().trigger('mouseenter');
  }
  
  this.ensureHighlightVisible();
  };
  
  Results.prototype.setClasses = function () {
  var self = this;
  
  this.data.current(function (selected) {
  var selectedIds = $.map(selected, function (s) {
  return s.id.toString();
  });
  
  var $options = self.$results
  .find('.select2-results__option[aria-selected]');
  
  $options.each(function () {
  var $option = $(this);
  
  var item = Utils.GetData(this, 'data');
  var id = '' + item.id;
  if ((item.element != null && item.element.selected) ||
	  (item.element == null && $.inArray(id, selectedIds) > -1)) {
	$option.attr('aria-selected', 'true');
  } else {
	$option.attr('aria-selected', 'false');
  }
  });
  
  });
  };
  
  Results.prototype.showLoading = function (params) {
  this.hideLoading();
  
  var loadingMore = this.options.get('translations').get('searching');
  
  var loading = {
  disabled: true,
  loading: true,
  text: loadingMore(params)
  };
  var $loading = this.option(loading);
  $loading.className += ' loading-results';
  
  this.$results.prepend($loading);
  };
  
  Results.prototype.hideLoading = function () {
  this.$results.find('.loading-results').remove();
  };
  
  Results.prototype.option = function (data) {
  var option = document.createElement('li');
  option.className = 'select2-results__option';
  
  var attrs = {
  'role': 'option',
  'aria-selected': 'false'
  };
  
  var matches = window.Element.prototype.matches ||
  window.Element.prototype.msMatchesSelector ||
  window.Element.prototype.webkitMatchesSelector;
  
  if ((data.element != null && matches.call(data.element, ':disabled')) ||
  (data.element == null && data.disabled)) {
  delete attrs['aria-selected'];
  attrs['aria-disabled'] = 'true';
  }
  
  if (data.id == null) {
  delete attrs['aria-selected'];
  }
  
  if (data._resultId != null) {
  option.id = data._resultId;
  }
  
  if (data.title) {
  option.title = data.title;
  }
  
  if (data.children) {
  attrs.role = 'group';
  attrs['aria-label'] = data.text;
  delete attrs['aria-selected'];
  }
  
  for (var attr in attrs) {
  var val = attrs[attr];
  
  option.setAttribute(attr, val);
  }
  
  if (data.children) {
  var $option = $(option);
  
  var label = document.createElement('strong');
  label.className = 'select2-results__group';
  
  var $label = $(label);
  this.template(data, label);
  
  var $children = [];
  
  for (var c = 0; c < data.children.length; c++) {
  var child = data.children[c];
  
  var $child = this.option(child);
  
  $children.push($child);
  }
  
  var $childrenContainer = $('<ul></ul>', {
  'class': 'select2-results__options select2-results__options--nested'
  });
  
  $childrenContainer.append($children);
  
  $option.append(label);
  $option.append($childrenContainer);
  } else {
  this.template(data, option);
  }
  
  Utils.StoreData(option, 'data', data);
  
  return option;
  };
  
  Results.prototype.bind = function (container, $container) {
  var self = this;
  
  var id = container.id + '-results';
  
  this.$results.attr('id', id);
  
  container.on('results:all', function (params) {
  self.clear();
  self.append(params.data);
  
  if (container.isOpen()) {
  self.setClasses();
  self.highlightFirstItem();
  }
  });
  
  container.on('results:append', function (params) {
  self.append(params.data);
  
  if (container.isOpen()) {
  self.setClasses();
  }
  });
  
  container.on('query', function (params) {
  self.hideMessages();
  self.showLoading(params);
  });
  
  container.on('select', function () {
  if (!container.isOpen()) {
  return;
  }
  
  self.setClasses();
  
  if (self.options.get('scrollAfterSelect')) {
  self.highlightFirstItem();
  }
  });
  
  container.on('unselect', function () {
  if (!container.isOpen()) {
  return;
  }
  
  self.setClasses();
  
  if (self.options.get('scrollAfterSelect')) {
  self.highlightFirstItem();
  }
  });
  
  container.on('open', function () {
  self.$results.attr('aria-expanded', 'true');
  self.$results.attr('aria-hidden', 'false');
  
  self.setClasses();
  self.ensureHighlightVisible();
  });
  
  container.on('close', function () {
  self.$results.attr('aria-expanded', 'false');
  self.$results.attr('aria-hidden', 'true');
  self.$results.removeAttr('aria-activedescendant');
  });
  
  container.on('results:toggle', function () {
  var $highlighted = self.getHighlightedResults();
  
  if ($highlighted.length === 0) {
  return;
  }
  
  $highlighted.trigger('mouseup');
  });
  
  container.on('results:select', function () {
  var $highlighted = self.getHighlightedResults();
  
  if ($highlighted.length === 0) {
  return;
  }
  
  var data = Utils.GetData($highlighted[0], 'data');
  
  if ($highlighted.attr('aria-selected') == 'true') {
  self.trigger('close', {});
  } else {
  self.trigger('select', {
	data: data
  });
  }
  });
  
  container.on('results:previous', function () {
  var $highlighted = self.getHighlightedResults();
  
  var $options = self.$results.find('[aria-selected]');
  
  var currentIndex = $options.index($highlighted);
  if (currentIndex <= 0) {
  return;
  }
  
  var nextIndex = currentIndex - 1;
  if ($highlighted.length === 0) {
  nextIndex = 0;
  }
  
  var $next = $options.eq(nextIndex);
  
  $next.trigger('mouseenter');
  
  var currentOffset = self.$results.offset().top;
  var nextTop = $next.offset().top;
  var nextOffset = self.$results.scrollTop() + (nextTop - currentOffset);
  
  if (nextIndex === 0) {
  self.$results.scrollTop(0);
  } else if (nextTop - currentOffset < 0) {
  self.$results.scrollTop(nextOffset);
  }
  });
  
  container.on('results:next', function () {
  var $highlighted = self.getHighlightedResults();
  
  var $options = self.$results.find('[aria-selected]');
  
  var currentIndex = $options.index($highlighted);
  
  var nextIndex = currentIndex + 1;
  if (nextIndex >= $options.length) {
  return;
  }
  
  var $next = $options.eq(nextIndex);
  
  $next.trigger('mouseenter');
  
  var currentOffset = self.$results.offset().top +
  self.$results.outerHeight(false);
  var nextBottom = $next.offset().top + $next.outerHeight(false);
  var nextOffset = self.$results.scrollTop() + nextBottom - currentOffset;
  
  if (nextIndex === 0) {
  self.$results.scrollTop(0);
  } else if (nextBottom > currentOffset) {
  self.$results.scrollTop(nextOffset);
  }
  });
  
  container.on('results:focus', function (params) {
  params.element.addClass('select2-results__option--highlighted');
  });
  
  container.on('results:message', function (params) {
  self.displayMessage(params);
  });
  
  if ($.fn.mousewheel) {
  this.$results.on('mousewheel', function (e) {
  var top = self.$results.scrollTop();
  
  var bottom = self.$results.get(0).scrollHeight - top + e.deltaY;
  
  var isAtTop = e.deltaY > 0 && top - e.deltaY <= 0;
  var isAtBottom = e.deltaY < 0 && bottom <= self.$results.height();
  
  if (isAtTop) {
	self.$results.scrollTop(0);
  
	e.preventDefault();
	e.stopPropagation();
  } else if (isAtBottom) {
	self.$results.scrollTop(
	  self.$results.get(0).scrollHeight - self.$results.height()
	);
  
	e.preventDefault();
	e.stopPropagation();
  }
  });
  }
  
  this.$results.on('mouseup', '.select2-results__option[aria-selected]',
  function (evt) {
  var $this = $(this);
  
  var data = Utils.GetData(this, 'data');
  
  if ($this.attr('aria-selected') === 'true') {
  if (self.options.get('multiple')) {
	self.trigger('unselect', {
	  originalEvent: evt,
	  data: data
	});
  } else {
	self.trigger('close', {});
  }
  
  return;
  }
  
  self.trigger('select', {
  originalEvent: evt,
  data: data
  });
  });
  
  this.$results.on('mouseenter', '.select2-results__option[aria-selected]',
  function (evt) {
  var data = Utils.GetData(this, 'data');
  
  self.getHighlightedResults()
	.removeClass('select2-results__option--highlighted');
  
  self.trigger('results:focus', {
  data: data,
  element: $(this)
  });
  });
  };
  
  Results.prototype.getHighlightedResults = function () {
  var $highlighted = this.$results
  .find('.select2-results__option--highlighted');
  
  return $highlighted;
  };
  
  Results.prototype.destroy = function () {
  this.$results.remove();
  };
  
  Results.prototype.ensureHighlightVisible = function () {
  var $highlighted = this.getHighlightedResults();
  
  if ($highlighted.length === 0) {
  return;
  }
  
  var $options = this.$results.find('[aria-selected]');
  
  var currentIndex = $options.index($highlighted);
  
  var currentOffset = this.$results.offset().top;
  var nextTop = $highlighted.offset().top;
  var nextOffset = this.$results.scrollTop() + (nextTop - currentOffset);
  
  var offsetDelta = nextTop - currentOffset;
  nextOffset -= $highlighted.outerHeight(false) * 2;
  
  if (currentIndex <= 2) {
  this.$results.scrollTop(0);
  } else if (offsetDelta > this.$results.outerHeight() || offsetDelta < 0) {
  this.$results.scrollTop(nextOffset);
  }
  };
  
  Results.prototype.template = function (result, container) {
  var template = this.options.get('templateResult');
  var escapeMarkup = this.options.get('escapeMarkup');
  
  var content = template(result, container);
  
  if (content == null) {
  container.style.display = 'none';
  } else if (typeof content === 'string') {
  container.innerHTML = escapeMarkup(content);
  } else {
  $(container).append(content);
  }
  };
  
  return Results;
  });
  
  S2.define('select2/keys',[
  
  ], function () {
  var KEYS = {
  BACKSPACE: 8,
  TAB: 9,
  ENTER: 13,
  SHIFT: 16,
  CTRL: 17,
  ALT: 18,
  ESC: 27,
  SPACE: 32,
  PAGE_UP: 33,
  PAGE_DOWN: 34,
  END: 35,
  HOME: 36,
  LEFT: 37,
  UP: 38,
  RIGHT: 39,
  DOWN: 40,
  DELETE: 46
  };
  
  return KEYS;
  });
  
  S2.define('select2/selection/base',[
  'jquery',
  '../utils',
  '../keys'
  ], function ($, Utils, KEYS) {
  function BaseSelection ($element, options) {
  this.$element = $element;
  this.options = options;
  
  BaseSelection.__super__.constructor.call(this);
  }
  
  Utils.Extend(BaseSelection, Utils.Observable);
  
  BaseSelection.prototype.render = function () {
  var $selection = $(
  '<span class="select2-selection" role="combobox" ' +
  ' aria-haspopup="true" aria-expanded="false">' +
  '</span>'
  );
  
  this._tabindex = 0;
  
  if (Utils.GetData(this.$element[0], 'old-tabindex') != null) {
  this._tabindex = Utils.GetData(this.$element[0], 'old-tabindex');
  } else if (this.$element.attr('tabindex') != null) {
  this._tabindex = this.$element.attr('tabindex');
  }
  
  $selection.attr('title', this.$element.attr('title'));
  $selection.attr('tabindex', this._tabindex);
  $selection.attr('aria-disabled', 'false');
  
  this.$selection = $selection;
  
  return $selection;
  };
  
  BaseSelection.prototype.bind = function (container, $container) {
  var self = this;
  
  var resultsId = container.id + '-results';
  
  this.container = container;
  
  this.$selection.on('focus', function (evt) {
  self.trigger('focus', evt);
  });
  
  this.$selection.on('blur', function (evt) {
  self._handleBlur(evt);
  });
  
  this.$selection.on('keydown', function (evt) {
  self.trigger('keypress', evt);
  
  if (evt.which === KEYS.SPACE) {
  evt.preventDefault();
  }
  });
  
  container.on('results:focus', function (params) {
  self.$selection.attr('aria-activedescendant', params.data._resultId);
  });
  
  container.on('selection:update', function (params) {
  self.update(params.data);
  });
  
  container.on('open', function () {
  // When the dropdown is open, aria-expanded="true"
  self.$selection.attr('aria-expanded', 'true');
  self.$selection.attr('aria-owns', resultsId);
  
  self._attachCloseHandler(container);
  });
  
  container.on('close', function () {
  // When the dropdown is closed, aria-expanded="false"
  self.$selection.attr('aria-expanded', 'false');
  self.$selection.removeAttr('aria-activedescendant');
  self.$selection.removeAttr('aria-owns');
  
  self.$selection.trigger('focus');
  
  self._detachCloseHandler(container);
  });
  
  container.on('enable', function () {
  self.$selection.attr('tabindex', self._tabindex);
  self.$selection.attr('aria-disabled', 'false');
  });
  
  container.on('disable', function () {
  self.$selection.attr('tabindex', '-1');
  self.$selection.attr('aria-disabled', 'true');
  });
  };
  
  BaseSelection.prototype._handleBlur = function (evt) {
  var self = this;
  window.setTimeout(function () {
  if (
  (document.activeElement == self.$selection[0]) ||
  ($.contains(self.$selection[0], document.activeElement))
  ) {
  return;
  }
  
  self.trigger('blur', evt);
  }, 1);
  };
  
  BaseSelection.prototype._attachCloseHandler = function (container) {
  
  $(document.body).on('mousedown.select2.' + container.id, function (e) {
  var $target = $(e.target);
  
  var $select = $target.closest('.select2');
  
  var $all = $('.select2.select2-container--open');
  
  $all.each(function () {
  if (this == $select[0]) {
	return;
  }
  
  var $element = Utils.GetData(this, 'element');
  
  $element.select2('close');
  });
  });
  };
  
  BaseSelection.prototype._detachCloseHandler = function (container) {
  $(document.body).off('mousedown.select2.' + container.id);
  };
  
  BaseSelection.prototype.position = function ($selection, $container) {
  var $selectionContainer = $container.find('.selection');
  $selectionContainer.append($selection);
  };
  
  BaseSelection.prototype.destroy = function () {
  this._detachCloseHandler(this.container);
  };
  
  BaseSelection.prototype.update = function (data) {
  throw new Error('The `update` method must be defined in child classes.');
  };
  
  return BaseSelection;
  });
  
  S2.define('select2/selection/single',[
  'jquery',
  './base',
  '../utils',
  '../keys'
  ], function ($, BaseSelection, Utils, KEYS) {
  function SingleSelection () {
  SingleSelection.__super__.constructor.apply(this, arguments);
  }
  
  Utils.Extend(SingleSelection, BaseSelection);
  
  SingleSelection.prototype.render = function () {
  var $selection = SingleSelection.__super__.render.call(this);
  
  $selection.addClass('select2-selection--single');
  
  $selection.html(
  '<span class="select2-selection__rendered"></span>' +
  '<span class="select2-selection__arrow" role="presentation">' +
  '<b role="presentation"></b>' +
  '</span>'
  );
  
  return $selection;
  };
  
  SingleSelection.prototype.bind = function (container, $container) {
  var self = this;
  
  SingleSelection.__super__.bind.apply(this, arguments);
  
  var id = container.id + '-container';
  
  this.$selection.find('.select2-selection__rendered')
  .attr('id', id)
  .attr('role', 'textbox')
  .attr('aria-readonly', 'true');
  this.$selection.attr('aria-labelledby', id);
  
  this.$selection.on('mousedown', function (evt) {
  // Only respond to left clicks
  if (evt.which !== 1) {
  return;
  }
  
  self.trigger('toggle', {
  originalEvent: evt
  });
  });
  
  this.$selection.on('focus', function (evt) {
  // User focuses on the container
  });
  
  this.$selection.on('blur', function (evt) {
  // User exits the container
  });
  
  container.on('focus', function (evt) {
  if (!container.isOpen()) {
  self.$selection.trigger('focus');
  }
  });
  };
  
  SingleSelection.prototype.clear = function () {
  var $rendered = this.$selection.find('.select2-selection__rendered');
  $rendered.empty();
  $rendered.removeAttr('title'); // clear tooltip on empty
  };
  
  SingleSelection.prototype.display = function (data, container) {
  var template = this.options.get('templateSelection');
  var escapeMarkup = this.options.get('escapeMarkup');
  
  return escapeMarkup(template(data, container));
  };
  
  SingleSelection.prototype.selectionContainer = function () {
  return $('<span></span>');
  };
  
  SingleSelection.prototype.update = function (data) {
  if (data.length === 0) {
  this.clear();
  return;
  }
  
  var selection = data[0];
  
  var $rendered = this.$selection.find('.select2-selection__rendered');
  var formatted = this.display(selection, $rendered);
  
  $rendered.empty().append(formatted);
  
  var title = selection.title || selection.text;
  
  if (title) {
  $rendered.attr('title', title);
  } else {
  $rendered.removeAttr('title');
  }
  };
  
  return SingleSelection;
  });
  
  S2.define('select2/selection/multiple',[
  'jquery',
  './base',
  '../utils'
  ], function ($, BaseSelection, Utils) {
  function MultipleSelection ($element, options) {
  MultipleSelection.__super__.constructor.apply(this, arguments);
  }
  
  Utils.Extend(MultipleSelection, BaseSelection);
  
  MultipleSelection.prototype.render = function () {
  var $selection = MultipleSelection.__super__.render.call(this);
  
  $selection.addClass('select2-selection--multiple');
  
  $selection.html(
  '<ul class="select2-selection__rendered"></ul>'
  );
  
  return $selection;
  };
  
  MultipleSelection.prototype.bind = function (container, $container) {
  var self = this;
  
  MultipleSelection.__super__.bind.apply(this, arguments);
  
  this.$selection.on('click', function (evt) {
  self.trigger('toggle', {
  originalEvent: evt
  });
  });
  
  this.$selection.on(
  'click',
  '.select2-selection__choice__remove',
  function (evt) {
  // Ignore the event if it is disabled
  if (self.options.get('disabled')) {
	return;
  }
  
  var $remove = $(this);
  var $selection = $remove.parent();
  
  var data = Utils.GetData($selection[0], 'data');
  
  self.trigger('unselect', {
	originalEvent: evt,
	data: data
  });
  }
  );
  };
  
  MultipleSelection.prototype.clear = function () {
  var $rendered = this.$selection.find('.select2-selection__rendered');
  $rendered.empty();
  $rendered.removeAttr('title');
  };
  
  MultipleSelection.prototype.display = function (data, container) {
  var template = this.options.get('templateSelection');
  var escapeMarkup = this.options.get('escapeMarkup');
  
  return escapeMarkup(template(data, container));
  };
  
  MultipleSelection.prototype.selectionContainer = function () {
  var $container = $(
  '<li class="select2-selection__choice">' +
  '<span class="select2-selection__choice__remove" role="presentation">' +
	'&times;' +
  '</span>' +
  '</li>'
  );
  
  return $container;
  };
  
  MultipleSelection.prototype.update = function (data) {
  this.clear();
  
  if (data.length === 0) {
  return;
  }
  
  var $selections = [];
  
  for (var d = 0; d < data.length; d++) {
  var selection = data[d];
  
  var $selection = this.selectionContainer();
  var formatted = this.display(selection, $selection);
  
  $selection.append(formatted);
  
  var title = selection.title || selection.text;
  
  if (title) {
  $selection.attr('title', title);
  }
  
  Utils.StoreData($selection[0], 'data', selection);
  
  $selections.push($selection);
  }
  
  var $rendered = this.$selection.find('.select2-selection__rendered');
  
  Utils.appendMany($rendered, $selections);
  };
  
  return MultipleSelection;
  });
  
  S2.define('select2/selection/placeholder',[
  '../utils'
  ], function (Utils) {
  function Placeholder (decorated, $element, options) {
  this.placeholder = this.normalizePlaceholder(options.get('placeholder'));
  
  decorated.call(this, $element, options);
  }
  
  Placeholder.prototype.normalizePlaceholder = function (_, placeholder) {
  if (typeof placeholder === 'string') {
  placeholder = {
  id: '',
  text: placeholder
  };
  }
  
  return placeholder;
  };
  
  Placeholder.prototype.createPlaceholder = function (decorated, placeholder) {
  var $placeholder = this.selectionContainer();
  
  $placeholder.html(this.display(placeholder));
  $placeholder.addClass('select2-selection__placeholder')
		  .removeClass('select2-selection__choice');
  
  return $placeholder;
  };
  
  Placeholder.prototype.update = function (decorated, data) {
  var singlePlaceholder = (
  data.length == 1 && data[0].id != this.placeholder.id
  );
  var multipleSelections = data.length > 1;
  
  if (multipleSelections || singlePlaceholder) {
  return decorated.call(this, data);
  }
  
  this.clear();
  
  var $placeholder = this.createPlaceholder(this.placeholder);
  
  this.$selection.find('.select2-selection__rendered').append($placeholder);
  };
  
  return Placeholder;
  });
  
  S2.define('select2/selection/allowClear',[
  'jquery',
  '../keys',
  '../utils'
  ], function ($, KEYS, Utils) {
  function AllowClear () { }
  
  AllowClear.prototype.bind = function (decorated, container, $container) {
  var self = this;
  
  decorated.call(this, container, $container);
  
  if (this.placeholder == null) {
  if (this.options.get('debug') && window.console && console.error) {
  console.error(
	'Select2: The `allowClear` option should be used in combination ' +
	'with the `placeholder` option.'
  );
  }
  }
  
  this.$selection.on('mousedown', '.select2-selection__clear',
  function (evt) {
  self._handleClear(evt);
  });
  
  container.on('keypress', function (evt) {
  self._handleKeyboardClear(evt, container);
  });
  };
  
  AllowClear.prototype._handleClear = function (_, evt) {
  // Ignore the event if it is disabled
  if (this.options.get('disabled')) {
  return;
  }
  
  var $clear = this.$selection.find('.select2-selection__clear');
  
  // Ignore the event if nothing has been selected
  if ($clear.length === 0) {
  return;
  }
  
  evt.stopPropagation();
  
  var data = Utils.GetData($clear[0], 'data');
  
  var previousVal = this.$element.val();
  this.$element.val(this.placeholder.id);
  
  var unselectData = {
  data: data
  };
  this.trigger('clear', unselectData);
  if (unselectData.prevented) {
  this.$element.val(previousVal);
  return;
  }
  
  for (var d = 0; d < data.length; d++) {
  unselectData = {
  data: data[d]
  };
  
  // Trigger the `unselect` event, so people can prevent it from being
  // cleared.
  this.trigger('unselect', unselectData);
  
  // If the event was prevented, don't clear it out.
  if (unselectData.prevented) {
  this.$element.val(previousVal);
  return;
  }
  }
  
  this.$element.trigger('change');
  
  this.trigger('toggle', {});
  };
  
  AllowClear.prototype._handleKeyboardClear = function (_, evt, container) {
  if (container.isOpen()) {
  return;
  }
  
  if (evt.which == KEYS.DELETE || evt.which == KEYS.BACKSPACE) {
  this._handleClear(evt);
  }
  };
  
  AllowClear.prototype.update = function (decorated, data) {
  decorated.call(this, data);
  
  if (this.$selection.find('.select2-selection__placeholder').length > 0 ||
  data.length === 0) {
  return;
  }
  
  var removeAll = this.options.get('translations').get('removeAllItems');   
  
  var $remove = $(
  '<span class="select2-selection__clear" title="' + removeAll() +'">' +
  '&times;' +
  '</span>'
  );
  Utils.StoreData($remove[0], 'data', data);
  
  this.$selection.find('.select2-selection__rendered').prepend($remove);
  };
  
  return AllowClear;
  });
  
  S2.define('select2/selection/search',[
  'jquery',
  '../utils',
  '../keys'
  ], function ($, Utils, KEYS) {
  function Search (decorated, $element, options) {
  decorated.call(this, $element, options);
  }
  
  Search.prototype.render = function (decorated) {
  var $search = $(
  '<li class="select2-search select2-search--inline">' +
  '<input class="select2-search__field" type="search" tabindex="-1"' +
  ' autocomplete="off" autocorrect="off" autocapitalize="none"' +
  ' spellcheck="false" role="searchbox" aria-autocomplete="list" />' +
  '</li>'
  );
  
  this.$searchContainer = $search;
  this.$search = $search.find('input');
  
  var $rendered = decorated.call(this);
  
  this._transferTabIndex();
  
  return $rendered;
  };
  
  Search.prototype.bind = function (decorated, container, $container) {
  var self = this;
  
  var resultsId = container.id + '-results';
  
  decorated.call(this, container, $container);
  
  container.on('open', function () {
  self.$search.attr('aria-controls', resultsId);
  self.$search.trigger('focus');
  });
  
  container.on('close', function () {
  self.$search.val('');
  self.$search.removeAttr('aria-controls');
  self.$search.removeAttr('aria-activedescendant');
  self.$search.trigger('focus');
  });
  
  container.on('enable', function () {
  self.$search.prop('disabled', false);
  
  self._transferTabIndex();
  });
  
  container.on('disable', function () {
  self.$search.prop('disabled', true);
  });
  
  container.on('focus', function (evt) {
  self.$search.trigger('focus');
  });
  
  container.on('results:focus', function (params) {
  if (params.data._resultId) {
  self.$search.attr('aria-activedescendant', params.data._resultId);
  } else {
  self.$search.removeAttr('aria-activedescendant');
  }
  });
  
  this.$selection.on('focusin', '.select2-search--inline', function (evt) {
  self.trigger('focus', evt);
  });
  
  this.$selection.on('focusout', '.select2-search--inline', function (evt) {
  self._handleBlur(evt);
  });
  
  this.$selection.on('keydown', '.select2-search--inline', function (evt) {
  evt.stopPropagation();
  
  self.trigger('keypress', evt);
  
  self._keyUpPrevented = evt.isDefaultPrevented();
  
  var key = evt.which;
  
  if (key === KEYS.BACKSPACE && self.$search.val() === '') {
  var $previousChoice = self.$searchContainer
	.prev('.select2-selection__choice');
  
  if ($previousChoice.length > 0) {
	var item = Utils.GetData($previousChoice[0], 'data');
  
	self.searchRemoveChoice(item);
  
	evt.preventDefault();
  }
  }
  });
  
  this.$selection.on('click', '.select2-search--inline', function (evt) {
  if (self.$search.val()) {
  evt.stopPropagation();
  }
  });
  
  // Try to detect the IE version should the `documentMode` property that
  // is stored on the document. This is only implemented in IE and is
  // slightly cleaner than doing a user agent check.
  // This property is not available in Edge, but Edge also doesn't have
  // this bug.
  var msie = document.documentMode;
  var disableInputEvents = msie && msie <= 11;
  
  // Workaround for browsers which do not support the `input` event
  // This will prevent double-triggering of events for browsers which support
  // both the `keyup` and `input` events.
  this.$selection.on(
  'input.searchcheck',
  '.select2-search--inline',
  function (evt) {
  // IE will trigger the `input` event when a placeholder is used on a
  // search box. To get around this issue, we are forced to ignore all
  // `input` events in IE and keep using `keyup`.
  if (disableInputEvents) {
	self.$selection.off('input.search input.searchcheck');
	return;
  }
  
  // Unbind the duplicated `keyup` event
  self.$selection.off('keyup.search');
  }
  );
  
  this.$selection.on(
  'keyup.search input.search',
  '.select2-search--inline',
  function (evt) {
  // IE will trigger the `input` event when a placeholder is used on a
  // search box. To get around this issue, we are forced to ignore all
  // `input` events in IE and keep using `keyup`.
  if (disableInputEvents && evt.type === 'input') {
	self.$selection.off('input.search input.searchcheck');
	return;
  }
  
  var key = evt.which;
  
  // We can freely ignore events from modifier keys
  if (key == KEYS.SHIFT || key == KEYS.CTRL || key == KEYS.ALT) {
	return;
  }
  
  // Tabbing will be handled during the `keydown` phase
  if (key == KEYS.TAB) {
	return;
  }
  
  self.handleSearch(evt);
  }
  );
  };
  
  /**
  * This method will transfer the tabindex attribute from the rendered
  * selection to the search box. This allows for the search box to be used as
  * the primary focus instead of the selection container.
  *
  * @private
  */
  Search.prototype._transferTabIndex = function (decorated) {
  this.$search.attr('tabindex', this.$selection.attr('tabindex'));
  this.$selection.attr('tabindex', '-1');
  };
  
  Search.prototype.createPlaceholder = function (decorated, placeholder) {
  this.$search.attr('placeholder', placeholder.text);
  };
  
  Search.prototype.update = function (decorated, data) {
  var searchHadFocus = this.$search[0] == document.activeElement;
  
  this.$search.attr('placeholder', '');
  
  decorated.call(this, data);
  
  this.$selection.find('.select2-selection__rendered')
			 .append(this.$searchContainer);
  
  this.resizeSearch();
  if (searchHadFocus) {
  this.$search.trigger('focus');
  }
  };
  
  Search.prototype.handleSearch = function () {
  this.resizeSearch();
  
  if (!this._keyUpPrevented) {
  var input = this.$search.val();
  
  this.trigger('query', {
  term: input
  });
  }
  
  this._keyUpPrevented = false;
  };
  
  Search.prototype.searchRemoveChoice = function (decorated, item) {
  this.trigger('unselect', {
  data: item
  });
  
  this.$search.val(item.text);
  this.handleSearch();
  };
  
  Search.prototype.resizeSearch = function () {
  this.$search.css('width', '25px');
  
  var width = '';
  
  if (this.$search.attr('placeholder') !== '') {
  width = this.$selection.find('.select2-selection__rendered').width();
  } else {
  var minimumWidth = this.$search.val().length + 1;
  
  width = (minimumWidth * 0.75) + 'em';
  }
  
  this.$search.css('width', width);
  };
  
  return Search;
  });
  
  S2.define('select2/selection/eventRelay',[
  'jquery'
  ], function ($) {
  function EventRelay () { }
  
  EventRelay.prototype.bind = function (decorated, container, $container) {
  var self = this;
  var relayEvents = [
  'open', 'opening',
  'close', 'closing',
  'select', 'selecting',
  'unselect', 'unselecting',
  'clear', 'clearing'
  ];
  
  var preventableEvents = [
  'opening', 'closing', 'selecting', 'unselecting', 'clearing'
  ];
  
  decorated.call(this, container, $container);
  
  container.on('*', function (name, params) {
  // Ignore events that should not be relayed
  if ($.inArray(name, relayEvents) === -1) {
  return;
  }
  
  // The parameters should always be an object
  params = params || {};
  
  // Generate the jQuery event for the Select2 event
  var evt = $.Event('select2:' + name, {
  params: params
  });
  
  self.$element.trigger(evt);
  
  // Only handle preventable events if it was one
  if ($.inArray(name, preventableEvents) === -1) {
  return;
  }
  
  params.prevented = evt.isDefaultPrevented();
  });
  };
  
  return EventRelay;
  });
  
  S2.define('select2/translation',[
  'jquery',
  'require'
  ], function ($, require) {
  function Translation (dict) {
  this.dict = dict || {};
  }
  
  Translation.prototype.all = function () {
  return this.dict;
  };
  
  Translation.prototype.get = function (key) {
  return this.dict[key];
  };
  
  Translation.prototype.extend = function (translation) {
  this.dict = $.extend({}, translation.all(), this.dict);
  };
  
  // Static functions
  
  Translation._cache = {};
  
  Translation.loadPath = function (path) {
  if (!(path in Translation._cache)) {
  var translations = require(path);
  
  Translation._cache[path] = translations;
  }
  
  return new Translation(Translation._cache[path]);
  };
  
  return Translation;
  });
  
  S2.define('select2/diacritics',[
  
  ], function () {
  var diacritics = {
  '\u24B6': 'A',
  '\uFF21': 'A',
  '\u00C0': 'A',
  '\u00C1': 'A',
  '\u00C2': 'A',
  '\u1EA6': 'A',
  '\u1EA4': 'A',
  '\u1EAA': 'A',
  '\u1EA8': 'A',
  '\u00C3': 'A',
  '\u0100': 'A',
  '\u0102': 'A',
  '\u1EB0': 'A',
  '\u1EAE': 'A',
  '\u1EB4': 'A',
  '\u1EB2': 'A',
  '\u0226': 'A',
  '\u01E0': 'A',
  '\u00C4': 'A',
  '\u01DE': 'A',
  '\u1EA2': 'A',
  '\u00C5': 'A',
  '\u01FA': 'A',
  '\u01CD': 'A',
  '\u0200': 'A',
  '\u0202': 'A',
  '\u1EA0': 'A',
  '\u1EAC': 'A',
  '\u1EB6': 'A',
  '\u1E00': 'A',
  '\u0104': 'A',
  '\u023A': 'A',
  '\u2C6F': 'A',
  '\uA732': 'AA',
  '\u00C6': 'AE',
  '\u01FC': 'AE',
  '\u01E2': 'AE',
  '\uA734': 'AO',
  '\uA736': 'AU',
  '\uA738': 'AV',
  '\uA73A': 'AV',
  '\uA73C': 'AY',
  '\u24B7': 'B',
  '\uFF22': 'B',
  '\u1E02': 'B',
  '\u1E04': 'B',
  '\u1E06': 'B',
  '\u0243': 'B',
  '\u0182': 'B',
  '\u0181': 'B',
  '\u24B8': 'C',
  '\uFF23': 'C',
  '\u0106': 'C',
  '\u0108': 'C',
  '\u010A': 'C',
  '\u010C': 'C',
  '\u00C7': 'C',
  '\u1E08': 'C',
  '\u0187': 'C',
  '\u023B': 'C',
  '\uA73E': 'C',
  '\u24B9': 'D',
  '\uFF24': 'D',
  '\u1E0A': 'D',
  '\u010E': 'D',
  '\u1E0C': 'D',
  '\u1E10': 'D',
  '\u1E12': 'D',
  '\u1E0E': 'D',
  '\u0110': 'D',
  '\u018B': 'D',
  '\u018A': 'D',
  '\u0189': 'D',
  '\uA779': 'D',
  '\u01F1': 'DZ',
  '\u01C4': 'DZ',
  '\u01F2': 'Dz',
  '\u01C5': 'Dz',
  '\u24BA': 'E',
  '\uFF25': 'E',
  '\u00C8': 'E',
  '\u00C9': 'E',
  '\u00CA': 'E',
  '\u1EC0': 'E',
  '\u1EBE': 'E',
  '\u1EC4': 'E',
  '\u1EC2': 'E',
  '\u1EBC': 'E',
  '\u0112': 'E',
  '\u1E14': 'E',
  '\u1E16': 'E',
  '\u0114': 'E',
  '\u0116': 'E',
  '\u00CB': 'E',
  '\u1EBA': 'E',
  '\u011A': 'E',
  '\u0204': 'E',
  '\u0206': 'E',
  '\u1EB8': 'E',
  '\u1EC6': 'E',
  '\u0228': 'E',
  '\u1E1C': 'E',
  '\u0118': 'E',
  '\u1E18': 'E',
  '\u1E1A': 'E',
  '\u0190': 'E',
  '\u018E': 'E',
  '\u24BB': 'F',
  '\uFF26': 'F',
  '\u1E1E': 'F',
  '\u0191': 'F',
  '\uA77B': 'F',
  '\u24BC': 'G',
  '\uFF27': 'G',
  '\u01F4': 'G',
  '\u011C': 'G',
  '\u1E20': 'G',
  '\u011E': 'G',
  '\u0120': 'G',
  '\u01E6': 'G',
  '\u0122': 'G',
  '\u01E4': 'G',
  '\u0193': 'G',
  '\uA7A0': 'G',
  '\uA77D': 'G',
  '\uA77E': 'G',
  '\u24BD': 'H',
  '\uFF28': 'H',
  '\u0124': 'H',
  '\u1E22': 'H',
  '\u1E26': 'H',
  '\u021E': 'H',
  '\u1E24': 'H',
  '\u1E28': 'H',
  '\u1E2A': 'H',
  '\u0126': 'H',
  '\u2C67': 'H',
  '\u2C75': 'H',
  '\uA78D': 'H',
  '\u24BE': 'I',
  '\uFF29': 'I',
  '\u00CC': 'I',
  '\u00CD': 'I',
  '\u00CE': 'I',
  '\u0128': 'I',
  '\u012A': 'I',
  '\u012C': 'I',
  '\u0130': 'I',
  '\u00CF': 'I',
  '\u1E2E': 'I',
  '\u1EC8': 'I',
  '\u01CF': 'I',
  '\u0208': 'I',
  '\u020A': 'I',
  '\u1ECA': 'I',
  '\u012E': 'I',
  '\u1E2C': 'I',
  '\u0197': 'I',
  '\u24BF': 'J',
  '\uFF2A': 'J',
  '\u0134': 'J',
  '\u0248': 'J',
  '\u24C0': 'K',
  '\uFF2B': 'K',
  '\u1E30': 'K',
  '\u01E8': 'K',
  '\u1E32': 'K',
  '\u0136': 'K',
  '\u1E34': 'K',
  '\u0198': 'K',
  '\u2C69': 'K',
  '\uA740': 'K',
  '\uA742': 'K',
  '\uA744': 'K',
  '\uA7A2': 'K',
  '\u24C1': 'L',
  '\uFF2C': 'L',
  '\u013F': 'L',
  '\u0139': 'L',
  '\u013D': 'L',
  '\u1E36': 'L',
  '\u1E38': 'L',
  '\u013B': 'L',
  '\u1E3C': 'L',
  '\u1E3A': 'L',
  '\u0141': 'L',
  '\u023D': 'L',
  '\u2C62': 'L',
  '\u2C60': 'L',
  '\uA748': 'L',
  '\uA746': 'L',
  '\uA780': 'L',
  '\u01C7': 'LJ',
  '\u01C8': 'Lj',
  '\u24C2': 'M',
  '\uFF2D': 'M',
  '\u1E3E': 'M',
  '\u1E40': 'M',
  '\u1E42': 'M',
  '\u2C6E': 'M',
  '\u019C': 'M',
  '\u24C3': 'N',
  '\uFF2E': 'N',
  '\u01F8': 'N',
  '\u0143': 'N',
  '\u00D1': 'N',
  '\u1E44': 'N',
  '\u0147': 'N',
  '\u1E46': 'N',
  '\u0145': 'N',
  '\u1E4A': 'N',
  '\u1E48': 'N',
  '\u0220': 'N',
  '\u019D': 'N',
  '\uA790': 'N',
  '\uA7A4': 'N',
  '\u01CA': 'NJ',
  '\u01CB': 'Nj',
  '\u24C4': 'O',
  '\uFF2F': 'O',
  '\u00D2': 'O',
  '\u00D3': 'O',
  '\u00D4': 'O',
  '\u1ED2': 'O',
  '\u1ED0': 'O',
  '\u1ED6': 'O',
  '\u1ED4': 'O',
  '\u00D5': 'O',
  '\u1E4C': 'O',
  '\u022C': 'O',
  '\u1E4E': 'O',
  '\u014C': 'O',
  '\u1E50': 'O',
  '\u1E52': 'O',
  '\u014E': 'O',
  '\u022E': 'O',
  '\u0230': 'O',
  '\u00D6': 'O',
  '\u022A': 'O',
  '\u1ECE': 'O',
  '\u0150': 'O',
  '\u01D1': 'O',
  '\u020C': 'O',
  '\u020E': 'O',
  '\u01A0': 'O',
  '\u1EDC': 'O',
  '\u1EDA': 'O',
  '\u1EE0': 'O',
  '\u1EDE': 'O',
  '\u1EE2': 'O',
  '\u1ECC': 'O',
  '\u1ED8': 'O',
  '\u01EA': 'O',
  '\u01EC': 'O',
  '\u00D8': 'O',
  '\u01FE': 'O',
  '\u0186': 'O',
  '\u019F': 'O',
  '\uA74A': 'O',
  '\uA74C': 'O',
  '\u0152': 'OE',
  '\u01A2': 'OI',
  '\uA74E': 'OO',
  '\u0222': 'OU',
  '\u24C5': 'P',
  '\uFF30': 'P',
  '\u1E54': 'P',
  '\u1E56': 'P',
  '\u01A4': 'P',
  '\u2C63': 'P',
  '\uA750': 'P',
  '\uA752': 'P',
  '\uA754': 'P',
  '\u24C6': 'Q',
  '\uFF31': 'Q',
  '\uA756': 'Q',
  '\uA758': 'Q',
  '\u024A': 'Q',
  '\u24C7': 'R',
  '\uFF32': 'R',
  '\u0154': 'R',
  '\u1E58': 'R',
  '\u0158': 'R',
  '\u0210': 'R',
  '\u0212': 'R',
  '\u1E5A': 'R',
  '\u1E5C': 'R',
  '\u0156': 'R',
  '\u1E5E': 'R',
  '\u024C': 'R',
  '\u2C64': 'R',
  '\uA75A': 'R',
  '\uA7A6': 'R',
  '\uA782': 'R',
  '\u24C8': 'S',
  '\uFF33': 'S',
  '\u1E9E': 'S',
  '\u015A': 'S',
  '\u1E64': 'S',
  '\u015C': 'S',
  '\u1E60': 'S',
  '\u0160': 'S',
  '\u1E66': 'S',
  '\u1E62': 'S',
  '\u1E68': 'S',
  '\u0218': 'S',
  '\u015E': 'S',
  '\u2C7E': 'S',
  '\uA7A8': 'S',
  '\uA784': 'S',
  '\u24C9': 'T',
  '\uFF34': 'T',
  '\u1E6A': 'T',
  '\u0164': 'T',
  '\u1E6C': 'T',
  '\u021A': 'T',
  '\u0162': 'T',
  '\u1E70': 'T',
  '\u1E6E': 'T',
  '\u0166': 'T',
  '\u01AC': 'T',
  '\u01AE': 'T',
  '\u023E': 'T',
  '\uA786': 'T',
  '\uA728': 'TZ',
  '\u24CA': 'U',
  '\uFF35': 'U',
  '\u00D9': 'U',
  '\u00DA': 'U',
  '\u00DB': 'U',
  '\u0168': 'U',
  '\u1E78': 'U',
  '\u016A': 'U',
  '\u1E7A': 'U',
  '\u016C': 'U',
  '\u00DC': 'U',
  '\u01DB': 'U',
  '\u01D7': 'U',
  '\u01D5': 'U',
  '\u01D9': 'U',
  '\u1EE6': 'U',
  '\u016E': 'U',
  '\u0170': 'U',
  '\u01D3': 'U',
  '\u0214': 'U',
  '\u0216': 'U',
  '\u01AF': 'U',
  '\u1EEA': 'U',
  '\u1EE8': 'U',
  '\u1EEE': 'U',
  '\u1EEC': 'U',
  '\u1EF0': 'U',
  '\u1EE4': 'U',
  '\u1E72': 'U',
  '\u0172': 'U',
  '\u1E76': 'U',
  '\u1E74': 'U',
  '\u0244': 'U',
  '\u24CB': 'V',
  '\uFF36': 'V',
  '\u1E7C': 'V',
  '\u1E7E': 'V',
  '\u01B2': 'V',
  '\uA75E': 'V',
  '\u0245': 'V',
  '\uA760': 'VY',
  '\u24CC': 'W',
  '\uFF37': 'W',
  '\u1E80': 'W',
  '\u1E82': 'W',
  '\u0174': 'W',
  '\u1E86': 'W',
  '\u1E84': 'W',
  '\u1E88': 'W',
  '\u2C72': 'W',
  '\u24CD': 'X',
  '\uFF38': 'X',
  '\u1E8A': 'X',
  '\u1E8C': 'X',
  '\u24CE': 'Y',
  '\uFF39': 'Y',
  '\u1EF2': 'Y',
  '\u00DD': 'Y',
  '\u0176': 'Y',
  '\u1EF8': 'Y',
  '\u0232': 'Y',
  '\u1E8E': 'Y',
  '\u0178': 'Y',
  '\u1EF6': 'Y',
  '\u1EF4': 'Y',
  '\u01B3': 'Y',
  '\u024E': 'Y',
  '\u1EFE': 'Y',
  '\u24CF': 'Z',
  '\uFF3A': 'Z',
  '\u0179': 'Z',
  '\u1E90': 'Z',
  '\u017B': 'Z',
  '\u017D': 'Z',
  '\u1E92': 'Z',
  '\u1E94': 'Z',
  '\u01B5': 'Z',
  '\u0224': 'Z',
  '\u2C7F': 'Z',
  '\u2C6B': 'Z',
  '\uA762': 'Z',
  '\u24D0': 'a',
  '\uFF41': 'a',
  '\u1E9A': 'a',
  '\u00E0': 'a',
  '\u00E1': 'a',
  '\u00E2': 'a',
  '\u1EA7': 'a',
  '\u1EA5': 'a',
  '\u1EAB': 'a',
  '\u1EA9': 'a',
  '\u00E3': 'a',
  '\u0101': 'a',
  '\u0103': 'a',
  '\u1EB1': 'a',
  '\u1EAF': 'a',
  '\u1EB5': 'a',
  '\u1EB3': 'a',
  '\u0227': 'a',
  '\u01E1': 'a',
  '\u00E4': 'a',
  '\u01DF': 'a',
  '\u1EA3': 'a',
  '\u00E5': 'a',
  '\u01FB': 'a',
  '\u01CE': 'a',
  '\u0201': 'a',
  '\u0203': 'a',
  '\u1EA1': 'a',
  '\u1EAD': 'a',
  '\u1EB7': 'a',
  '\u1E01': 'a',
  '\u0105': 'a',
  '\u2C65': 'a',
  '\u0250': 'a',
  '\uA733': 'aa',
  '\u00E6': 'ae',
  '\u01FD': 'ae',
  '\u01E3': 'ae',
  '\uA735': 'ao',
  '\uA737': 'au',
  '\uA739': 'av',
  '\uA73B': 'av',
  '\uA73D': 'ay',
  '\u24D1': 'b',
  '\uFF42': 'b',
  '\u1E03': 'b',
  '\u1E05': 'b',
  '\u1E07': 'b',
  '\u0180': 'b',
  '\u0183': 'b',
  '\u0253': 'b',
  '\u24D2': 'c',
  '\uFF43': 'c',
  '\u0107': 'c',
  '\u0109': 'c',
  '\u010B': 'c',
  '\u010D': 'c',
  '\u00E7': 'c',
  '\u1E09': 'c',
  '\u0188': 'c',
  '\u023C': 'c',
  '\uA73F': 'c',
  '\u2184': 'c',
  '\u24D3': 'd',
  '\uFF44': 'd',
  '\u1E0B': 'd',
  '\u010F': 'd',
  '\u1E0D': 'd',
  '\u1E11': 'd',
  '\u1E13': 'd',
  '\u1E0F': 'd',
  '\u0111': 'd',
  '\u018C': 'd',
  '\u0256': 'd',
  '\u0257': 'd',
  '\uA77A': 'd',
  '\u01F3': 'dz',
  '\u01C6': 'dz',
  '\u24D4': 'e',
  '\uFF45': 'e',
  '\u00E8': 'e',
  '\u00E9': 'e',
  '\u00EA': 'e',
  '\u1EC1': 'e',
  '\u1EBF': 'e',
  '\u1EC5': 'e',
  '\u1EC3': 'e',
  '\u1EBD': 'e',
  '\u0113': 'e',
  '\u1E15': 'e',
  '\u1E17': 'e',
  '\u0115': 'e',
  '\u0117': 'e',
  '\u00EB': 'e',
  '\u1EBB': 'e',
  '\u011B': 'e',
  '\u0205': 'e',
  '\u0207': 'e',
  '\u1EB9': 'e',
  '\u1EC7': 'e',
  '\u0229': 'e',
  '\u1E1D': 'e',
  '\u0119': 'e',
  '\u1E19': 'e',
  '\u1E1B': 'e',
  '\u0247': 'e',
  '\u025B': 'e',
  '\u01DD': 'e',
  '\u24D5': 'f',
  '\uFF46': 'f',
  '\u1E1F': 'f',
  '\u0192': 'f',
  '\uA77C': 'f',
  '\u24D6': 'g',
  '\uFF47': 'g',
  '\u01F5': 'g',
  '\u011D': 'g',
  '\u1E21': 'g',
  '\u011F': 'g',
  '\u0121': 'g',
  '\u01E7': 'g',
  '\u0123': 'g',
  '\u01E5': 'g',
  '\u0260': 'g',
  '\uA7A1': 'g',
  '\u1D79': 'g',
  '\uA77F': 'g',
  '\u24D7': 'h',
  '\uFF48': 'h',
  '\u0125': 'h',
  '\u1E23': 'h',
  '\u1E27': 'h',
  '\u021F': 'h',
  '\u1E25': 'h',
  '\u1E29': 'h',
  '\u1E2B': 'h',
  '\u1E96': 'h',
  '\u0127': 'h',
  '\u2C68': 'h',
  '\u2C76': 'h',
  '\u0265': 'h',
  '\u0195': 'hv',
  '\u24D8': 'i',
  '\uFF49': 'i',
  '\u00EC': 'i',
  '\u00ED': 'i',
  '\u00EE': 'i',
  '\u0129': 'i',
  '\u012B': 'i',
  '\u012D': 'i',
  '\u00EF': 'i',
  '\u1E2F': 'i',
  '\u1EC9': 'i',
  '\u01D0': 'i',
  '\u0209': 'i',
  '\u020B': 'i',
  '\u1ECB': 'i',
  '\u012F': 'i',
  '\u1E2D': 'i',
  '\u0268': 'i',
  '\u0131': 'i',
  '\u24D9': 'j',
  '\uFF4A': 'j',
  '\u0135': 'j',
  '\u01F0': 'j',
  '\u0249': 'j',
  '\u24DA': 'k',
  '\uFF4B': 'k',
  '\u1E31': 'k',
  '\u01E9': 'k',
  '\u1E33': 'k',
  '\u0137': 'k',
  '\u1E35': 'k',
  '\u0199': 'k',
  '\u2C6A': 'k',
  '\uA741': 'k',
  '\uA743': 'k',
  '\uA745': 'k',
  '\uA7A3': 'k',
  '\u24DB': 'l',
  '\uFF4C': 'l',
  '\u0140': 'l',
  '\u013A': 'l',
  '\u013E': 'l',
  '\u1E37': 'l',
  '\u1E39': 'l',
  '\u013C': 'l',
  '\u1E3D': 'l',
  '\u1E3B': 'l',
  '\u017F': 'l',
  '\u0142': 'l',
  '\u019A': 'l',
  '\u026B': 'l',
  '\u2C61': 'l',
  '\uA749': 'l',
  '\uA781': 'l',
  '\uA747': 'l',
  '\u01C9': 'lj',
  '\u24DC': 'm',
  '\uFF4D': 'm',
  '\u1E3F': 'm',
  '\u1E41': 'm',
  '\u1E43': 'm',
  '\u0271': 'm',
  '\u026F': 'm',
  '\u24DD': 'n',
  '\uFF4E': 'n',
  '\u01F9': 'n',
  '\u0144': 'n',
  '\u00F1': 'n',
  '\u1E45': 'n',
  '\u0148': 'n',
  '\u1E47': 'n',
  '\u0146': 'n',
  '\u1E4B': 'n',
  '\u1E49': 'n',
  '\u019E': 'n',
  '\u0272': 'n',
  '\u0149': 'n',
  '\uA791': 'n',
  '\uA7A5': 'n',
  '\u01CC': 'nj',
  '\u24DE': 'o',
  '\uFF4F': 'o',
  '\u00F2': 'o',
  '\u00F3': 'o',
  '\u00F4': 'o',
  '\u1ED3': 'o',
  '\u1ED1': 'o',
  '\u1ED7': 'o',
  '\u1ED5': 'o',
  '\u00F5': 'o',
  '\u1E4D': 'o',
  '\u022D': 'o',
  '\u1E4F': 'o',
  '\u014D': 'o',
  '\u1E51': 'o',
  '\u1E53': 'o',
  '\u014F': 'o',
  '\u022F': 'o',
  '\u0231': 'o',
  '\u00F6': 'o',
  '\u022B': 'o',
  '\u1ECF': 'o',
  '\u0151': 'o',
  '\u01D2': 'o',
  '\u020D': 'o',
  '\u020F': 'o',
  '\u01A1': 'o',
  '\u1EDD': 'o',
  '\u1EDB': 'o',
  '\u1EE1': 'o',
  '\u1EDF': 'o',
  '\u1EE3': 'o',
  '\u1ECD': 'o',
  '\u1ED9': 'o',
  '\u01EB': 'o',
  '\u01ED': 'o',
  '\u00F8': 'o',
  '\u01FF': 'o',
  '\u0254': 'o',
  '\uA74B': 'o',
  '\uA74D': 'o',
  '\u0275': 'o',
  '\u0153': 'oe',
  '\u01A3': 'oi',
  '\u0223': 'ou',
  '\uA74F': 'oo',
  '\u24DF': 'p',
  '\uFF50': 'p',
  '\u1E55': 'p',
  '\u1E57': 'p',
  '\u01A5': 'p',
  '\u1D7D': 'p',
  '\uA751': 'p',
  '\uA753': 'p',
  '\uA755': 'p',
  '\u24E0': 'q',
  '\uFF51': 'q',
  '\u024B': 'q',
  '\uA757': 'q',
  '\uA759': 'q',
  '\u24E1': 'r',
  '\uFF52': 'r',
  '\u0155': 'r',
  '\u1E59': 'r',
  '\u0159': 'r',
  '\u0211': 'r',
  '\u0213': 'r',
  '\u1E5B': 'r',
  '\u1E5D': 'r',
  '\u0157': 'r',
  '\u1E5F': 'r',
  '\u024D': 'r',
  '\u027D': 'r',
  '\uA75B': 'r',
  '\uA7A7': 'r',
  '\uA783': 'r',
  '\u24E2': 's',
  '\uFF53': 's',
  '\u00DF': 's',
  '\u015B': 's',
  '\u1E65': 's',
  '\u015D': 's',
  '\u1E61': 's',
  '\u0161': 's',
  '\u1E67': 's',
  '\u1E63': 's',
  '\u1E69': 's',
  '\u0219': 's',
  '\u015F': 's',
  '\u023F': 's',
  '\uA7A9': 's',
  '\uA785': 's',
  '\u1E9B': 's',
  '\u24E3': 't',
  '\uFF54': 't',
  '\u1E6B': 't',
  '\u1E97': 't',
  '\u0165': 't',
  '\u1E6D': 't',
  '\u021B': 't',
  '\u0163': 't',
  '\u1E71': 't',
  '\u1E6F': 't',
  '\u0167': 't',
  '\u01AD': 't',
  '\u0288': 't',
  '\u2C66': 't',
  '\uA787': 't',
  '\uA729': 'tz',
  '\u24E4': 'u',
  '\uFF55': 'u',
  '\u00F9': 'u',
  '\u00FA': 'u',
  '\u00FB': 'u',
  '\u0169': 'u',
  '\u1E79': 'u',
  '\u016B': 'u',
  '\u1E7B': 'u',
  '\u016D': 'u',
  '\u00FC': 'u',
  '\u01DC': 'u',
  '\u01D8': 'u',
  '\u01D6': 'u',
  '\u01DA': 'u',
  '\u1EE7': 'u',
  '\u016F': 'u',
  '\u0171': 'u',
  '\u01D4': 'u',
  '\u0215': 'u',
  '\u0217': 'u',
  '\u01B0': 'u',
  '\u1EEB': 'u',
  '\u1EE9': 'u',
  '\u1EEF': 'u',
  '\u1EED': 'u',
  '\u1EF1': 'u',
  '\u1EE5': 'u',
  '\u1E73': 'u',
  '\u0173': 'u',
  '\u1E77': 'u',
  '\u1E75': 'u',
  '\u0289': 'u',
  '\u24E5': 'v',
  '\uFF56': 'v',
  '\u1E7D': 'v',
  '\u1E7F': 'v',
  '\u028B': 'v',
  '\uA75F': 'v',
  '\u028C': 'v',
  '\uA761': 'vy',
  '\u24E6': 'w',
  '\uFF57': 'w',
  '\u1E81': 'w',
  '\u1E83': 'w',
  '\u0175': 'w',
  '\u1E87': 'w',
  '\u1E85': 'w',
  '\u1E98': 'w',
  '\u1E89': 'w',
  '\u2C73': 'w',
  '\u24E7': 'x',
  '\uFF58': 'x',
  '\u1E8B': 'x',
  '\u1E8D': 'x',
  '\u24E8': 'y',
  '\uFF59': 'y',
  '\u1EF3': 'y',
  '\u00FD': 'y',
  '\u0177': 'y',
  '\u1EF9': 'y',
  '\u0233': 'y',
  '\u1E8F': 'y',
  '\u00FF': 'y',
  '\u1EF7': 'y',
  '\u1E99': 'y',
  '\u1EF5': 'y',
  '\u01B4': 'y',
  '\u024F': 'y',
  '\u1EFF': 'y',
  '\u24E9': 'z',
  '\uFF5A': 'z',
  '\u017A': 'z',
  '\u1E91': 'z',
  '\u017C': 'z',
  '\u017E': 'z',
  '\u1E93': 'z',
  '\u1E95': 'z',
  '\u01B6': 'z',
  '\u0225': 'z',
  '\u0240': 'z',
  '\u2C6C': 'z',
  '\uA763': 'z',
  '\u0386': '\u0391',
  '\u0388': '\u0395',
  '\u0389': '\u0397',
  '\u038A': '\u0399',
  '\u03AA': '\u0399',
  '\u038C': '\u039F',
  '\u038E': '\u03A5',
  '\u03AB': '\u03A5',
  '\u038F': '\u03A9',
  '\u03AC': '\u03B1',
  '\u03AD': '\u03B5',
  '\u03AE': '\u03B7',
  '\u03AF': '\u03B9',
  '\u03CA': '\u03B9',
  '\u0390': '\u03B9',
  '\u03CC': '\u03BF',
  '\u03CD': '\u03C5',
  '\u03CB': '\u03C5',
  '\u03B0': '\u03C5',
  '\u03CE': '\u03C9',
  '\u03C2': '\u03C3',
  '\u2019': '\''
  };
  
  return diacritics;
  });
  
  S2.define('select2/data/base',[
  '../utils'
  ], function (Utils) {
  function BaseAdapter ($element, options) {
  BaseAdapter.__super__.constructor.call(this);
  }
  
  Utils.Extend(BaseAdapter, Utils.Observable);
  
  BaseAdapter.prototype.current = function (callback) {
  throw new Error('The `current` method must be defined in child classes.');
  };
  
  BaseAdapter.prototype.query = function (params, callback) {
  throw new Error('The `query` method must be defined in child classes.');
  };
  
  BaseAdapter.prototype.bind = function (container, $container) {
  // Can be implemented in subclasses
  };
  
  BaseAdapter.prototype.destroy = function () {
  // Can be implemented in subclasses
  };
  
  BaseAdapter.prototype.generateResultId = function (container, data) {
  var id = container.id + '-result-';
  
  id += Utils.generateChars(4);
  
  if (data.id != null) {
  id += '-' + data.id.toString();
  } else {
  id += '-' + Utils.generateChars(4);
  }
  return id;
  };
  
  return BaseAdapter;
  });
  
  S2.define('select2/data/select',[
  './base',
  '../utils',
  'jquery'
  ], function (BaseAdapter, Utils, $) {
  function SelectAdapter ($element, options) {
  this.$element = $element;
  this.options = options;
  
  SelectAdapter.__super__.constructor.call(this);
  }
  
  Utils.Extend(SelectAdapter, BaseAdapter);
  
  SelectAdapter.prototype.current = function (callback) {
  var data = [];
  var self = this;
  
  this.$element.find(':selected').each(function () {
  var $option = $(this);
  
  var option = self.item($option);
  
  data.push(option);
  });
  
  callback(data);
  };
  
  SelectAdapter.prototype.select = function (data) {
  var self = this;
  
  data.selected = true;
  
  // If data.element is a DOM node, use it instead
  if ($(data.element).is('option')) {
  data.element.selected = true;
  
  this.$element.trigger('change');
  
  return;
  }
  
  if (this.$element.prop('multiple')) {
  this.current(function (currentData) {
  var val = [];
  
  data = [data];
  data.push.apply(data, currentData);
  
  for (var d = 0; d < data.length; d++) {
	var id = data[d].id;
  
	if ($.inArray(id, val) === -1) {
	  val.push(id);
	}
  }
  
  self.$element.val(val);
  self.$element.trigger('change');
  });
  } else {
  var val = data.id;
  
  this.$element.val(val);
  this.$element.trigger('change');
  }
  };
  
  SelectAdapter.prototype.unselect = function (data) {
  var self = this;
  
  if (!this.$element.prop('multiple')) {
  return;
  }
  
  data.selected = false;
  
  if ($(data.element).is('option')) {
  data.element.selected = false;
  
  this.$element.trigger('change');
  
  return;
  }
  
  this.current(function (currentData) {
  var val = [];
  
  for (var d = 0; d < currentData.length; d++) {
  var id = currentData[d].id;
  
  if (id !== data.id && $.inArray(id, val) === -1) {
	val.push(id);
  }
  }
  
  self.$element.val(val);
  
  self.$element.trigger('change');
  });
  };
  
  SelectAdapter.prototype.bind = function (container, $container) {
  var self = this;
  
  this.container = container;
  
  container.on('select', function (params) {
  self.select(params.data);
  });
  
  container.on('unselect', function (params) {
  self.unselect(params.data);
  });
  };
  
  SelectAdapter.prototype.destroy = function () {
  // Remove anything added to child elements
  this.$element.find('*').each(function () {
  // Remove any custom data set by Select2
  Utils.RemoveData(this);
  });
  };
  
  SelectAdapter.prototype.query = function (params, callback) {
  var data = [];
  var self = this;
  
  var $options = this.$element.children();
  
  $options.each(function () {
  var $option = $(this);
  
  if (!$option.is('option') && !$option.is('optgroup')) {
  return;
  }
  
  var option = self.item($option);
  
  var matches = self.matches(params, option);
  
  if (matches !== null) {
  data.push(matches);
  }
  });
  
  callback({
  results: data
  });
  };
  
  SelectAdapter.prototype.addOptions = function ($options) {
  Utils.appendMany(this.$element, $options);
  };
  
  SelectAdapter.prototype.option = function (data) {
  var option;
  
  if (data.children) {
  option = document.createElement('optgroup');
  option.label = data.text;
  } else {
  option = document.createElement('option');
  
  if (option.textContent !== undefined) {
  option.textContent = data.text;
  } else {
  option.innerText = data.text;
  }
  }
  
  if (data.id !== undefined) {
  option.value = data.id;
  }
  
  if (data.disabled) {
  option.disabled = true;
  }
  
  if (data.selected) {
  option.selected = true;
  }
  
  if (data.title) {
  option.title = data.title;
  }
  
  var $option = $(option);
  
  var normalizedData = this._normalizeItem(data);
  normalizedData.element = option;
  
  // Override the option's data with the combined data
  Utils.StoreData(option, 'data', normalizedData);
  
  return $option;
  };
  
  SelectAdapter.prototype.item = function ($option) {
  var data = {};
  
  data = Utils.GetData($option[0], 'data');
  
  if (data != null) {
  return data;
  }
  
  if ($option.is('option')) {
  data = {
  id: $option.val(),
  text: $option.text(),
  disabled: $option.prop('disabled'),
  selected: $option.prop('selected'),
  title: $option.prop('title')
  };
  } else if ($option.is('optgroup')) {
  data = {
  text: $option.prop('label'),
  children: [],
  title: $option.prop('title')
  };
  
  var $children = $option.children('option');
  var children = [];
  
  for (var c = 0; c < $children.length; c++) {
  var $child = $($children[c]);
  
  var child = this.item($child);
  
  children.push(child);
  }
  
  data.children = children;
  }
  
  data = this._normalizeItem(data);
  data.element = $option[0];
  
  Utils.StoreData($option[0], 'data', data);
  
  return data;
  };
  
  SelectAdapter.prototype._normalizeItem = function (item) {
  if (item !== Object(item)) {
  item = {
  id: item,
  text: item
  };
  }
  
  item = $.extend({}, {
  text: ''
  }, item);
  
  var defaults = {
  selected: false,
  disabled: false
  };
  
  if (item.id != null) {
  item.id = item.id.toString();
  }
  
  if (item.text != null) {
  item.text = item.text.toString();
  }
  
  if (item._resultId == null && item.id && this.container != null) {
  item._resultId = this.generateResultId(this.container, item);
  }
  
  return $.extend({}, defaults, item);
  };
  
  SelectAdapter.prototype.matches = function (params, data) {
  var matcher = this.options.get('matcher');
  
  return matcher(params, data);
  };
  
  return SelectAdapter;
  });
  
  S2.define('select2/data/array',[
  './select',
  '../utils',
  'jquery'
  ], function (SelectAdapter, Utils, $) {
  function ArrayAdapter ($element, options) {
  this._dataToConvert = options.get('data') || [];
  
  ArrayAdapter.__super__.constructor.call(this, $element, options);
  }
  
  Utils.Extend(ArrayAdapter, SelectAdapter);
  
  ArrayAdapter.prototype.bind = function (container, $container) {
  ArrayAdapter.__super__.bind.call(this, container, $container);
  
  this.addOptions(this.convertToOptions(this._dataToConvert));
  };
  
  ArrayAdapter.prototype.select = function (data) {
  var $option = this.$element.find('option').filter(function (i, elm) {
  return elm.value == data.id.toString();
  });
  
  if ($option.length === 0) {
  $option = this.option(data);
  
  this.addOptions($option);
  }
  
  ArrayAdapter.__super__.select.call(this, data);
  };
  
  ArrayAdapter.prototype.convertToOptions = function (data) {
  var self = this;
  
  var $existing = this.$element.find('option');
  var existingIds = $existing.map(function () {
  return self.item($(this)).id;
  }).get();
  
  var $options = [];
  
  // Filter out all items except for the one passed in the argument
  function onlyItem (item) {
  return function () {
  return $(this).val() == item.id;
  };
  }
  
  for (var d = 0; d < data.length; d++) {
  var item = this._normalizeItem(data[d]);
  
  // Skip items which were pre-loaded, only merge the data
  if ($.inArray(item.id, existingIds) >= 0) {
  var $existingOption = $existing.filter(onlyItem(item));
  
  var existingData = this.item($existingOption);
  var newData = $.extend(true, {}, item, existingData);
  
  var $newOption = this.option(newData);
  
  $existingOption.replaceWith($newOption);
  
  continue;
  }
  
  var $option = this.option(item);
  
  if (item.children) {
  var $children = this.convertToOptions(item.children);
  
  Utils.appendMany($option, $children);
  }
  
  $options.push($option);
  }
  
  return $options;
  };
  
  return ArrayAdapter;
  });
  
  S2.define('select2/data/ajax',[
  './array',
  '../utils',
  'jquery'
  ], function (ArrayAdapter, Utils, $) {
  function AjaxAdapter ($element, options) {
  this.ajaxOptions = this._applyDefaults(options.get('ajax'));
  
  if (this.ajaxOptions.processResults != null) {
  this.processResults = this.ajaxOptions.processResults;
  }
  
  AjaxAdapter.__super__.constructor.call(this, $element, options);
  }
  
  Utils.Extend(AjaxAdapter, ArrayAdapter);
  
  AjaxAdapter.prototype._applyDefaults = function (options) {
  var defaults = {
  data: function (params) {
  return $.extend({}, params, {
	q: params.term
  });
  },
  transport: function (params, success, failure) {
  var $request = $.ajax(params);
  
  $request.then(success);
  $request.fail(failure);
  
  return $request;
  }
  };
  
  return $.extend({}, defaults, options, true);
  };
  
  AjaxAdapter.prototype.processResults = function (results) {
  return results;
  };
  
  AjaxAdapter.prototype.query = function (params, callback) {
  var matches = [];
  var self = this;
  
  if (this._request != null) {
  // JSONP requests cannot always be aborted
  if ($.isFunction(this._request.abort)) {
  this._request.abort();
  }
  
  this._request = null;
  }
  
  var options = $.extend({
  type: 'GET'
  }, this.ajaxOptions);
  
  if (typeof options.url === 'function') {
  options.url = options.url.call(this.$element, params);
  }
  
  if (typeof options.data === 'function') {
  options.data = options.data.call(this.$element, params);
  }
  
  function request () {
  var $request = options.transport(options, function (data) {
  var results = self.processResults(data, params);
  
  if (self.options.get('debug') && window.console && console.error) {
	// Check to make sure that the response included a `results` key.
	if (!results || !results.results || !$.isArray(results.results)) {
	  console.error(
		'Select2: The AJAX results did not return an array in the ' +
		'`results` key of the response.'
	  );
	}
  }
  
  callback(results);
  }, function () {
  // Attempt to detect if a request was aborted
  // Only works if the transport exposes a status property
  if ('status' in $request &&
	  ($request.status === 0 || $request.status === '0')) {
	return;
  }
  
  self.trigger('results:message', {
	message: 'errorLoading'
  });
  });
  
  self._request = $request;
  }
  
  if (this.ajaxOptions.delay && params.term != null) {
  if (this._queryTimeout) {
  window.clearTimeout(this._queryTimeout);
  }
  
  this._queryTimeout = window.setTimeout(request, this.ajaxOptions.delay);
  } else {
  request();
  }
  };
  
  return AjaxAdapter;
  });
  
  S2.define('select2/data/tags',[
  'jquery'
  ], function ($) {
  function Tags (decorated, $element, options) {
  var tags = options.get('tags');
  
  var createTag = options.get('createTag');
  
  if (createTag !== undefined) {
  this.createTag = createTag;
  }
  
  var insertTag = options.get('insertTag');
  
  if (insertTag !== undefined) {
  this.insertTag = insertTag;
  }
  
  decorated.call(this, $element, options);
  
  if ($.isArray(tags)) {
  for (var t = 0; t < tags.length; t++) {
  var tag = tags[t];
  var item = this._normalizeItem(tag);
  
  var $option = this.option(item);
  
  this.$element.append($option);
  }
  }
  }
  
  Tags.prototype.query = function (decorated, params, callback) {
  var self = this;
  
  this._removeOldTags();
  
  if (params.term == null || params.page != null) {
  decorated.call(this, params, callback);
  return;
  }
  
  function wrapper (obj, child) {
  var data = obj.results;
  
  for (var i = 0; i < data.length; i++) {
  var option = data[i];
  
  var checkChildren = (
	option.children != null &&
	!wrapper({
	  results: option.children
	}, true)
  );
  
  var optionText = (option.text || '').toUpperCase();
  var paramsTerm = (params.term || '').toUpperCase();
  
  var checkText = optionText === paramsTerm;
  
  if (checkText || checkChildren) {
	if (child) {
	  return false;
	}
  
	obj.data = data;
	callback(obj);
  
	return;
  }
  }
  
  if (child) {
  return true;
  }
  
  var tag = self.createTag(params);
  
  if (tag != null) {
  var $option = self.option(tag);
  $option.attr('data-select2-tag', true);
  
  self.addOptions([$option]);
  
  self.insertTag(data, tag);
  }
  
  obj.results = data;
  
  callback(obj);
  }
  
  decorated.call(this, params, wrapper);
  };
  
  Tags.prototype.createTag = function (decorated, params) {
  var term = $.trim(params.term);
  
  if (term === '') {
  return null;
  }
  
  return {
  id: term,
  text: term
  };
  };
  
  Tags.prototype.insertTag = function (_, data, tag) {
  data.unshift(tag);
  };
  
  Tags.prototype._removeOldTags = function (_) {
  var $options = this.$element.find('option[data-select2-tag]');
  
  $options.each(function () {
  if (this.selected) {
  return;
  }
  
  $(this).remove();
  });
  };
  
  return Tags;
  });
  
  S2.define('select2/data/tokenizer',[
  'jquery'
  ], function ($) {
  function Tokenizer (decorated, $element, options) {
  var tokenizer = options.get('tokenizer');
  
  if (tokenizer !== undefined) {
  this.tokenizer = tokenizer;
  }
  
  decorated.call(this, $element, options);
  }
  
  Tokenizer.prototype.bind = function (decorated, container, $container) {
  decorated.call(this, container, $container);
  
  this.$search =  container.dropdown.$search || container.selection.$search ||
  $container.find('.select2-search__field');
  };
  
  Tokenizer.prototype.query = function (decorated, params, callback) {
  var self = this;
  
  function createAndSelect (data) {
  // Normalize the data object so we can use it for checks
  var item = self._normalizeItem(data);
  
  // Check if the data object already exists as a tag
  // Select it if it doesn't
  var $existingOptions = self.$element.find('option').filter(function () {
  return $(this).val() === item.id;
  });
  
  // If an existing option wasn't found for it, create the option
  if (!$existingOptions.length) {
  var $option = self.option(item);
  $option.attr('data-select2-tag', true);
  
  self._removeOldTags();
  self.addOptions([$option]);
  }
  
  // Select the item, now that we know there is an option for it
  select(item);
  }
  
  function select (data) {
  self.trigger('select', {
  data: data
  });
  }
  
  params.term = params.term || '';
  
  var tokenData = this.tokenizer(params, this.options, createAndSelect);
  
  if (tokenData.term !== params.term) {
  // Replace the search term if we have the search box
  if (this.$search.length) {
  this.$search.val(tokenData.term);
  this.$search.trigger('focus');
  }
  
  params.term = tokenData.term;
  }
  
  decorated.call(this, params, callback);
  };
  
  Tokenizer.prototype.tokenizer = function (_, params, options, callback) {
  var separators = options.get('tokenSeparators') || [];
  var term = params.term;
  var i = 0;
  
  var createTag = this.createTag || function (params) {
  return {
  id: params.term,
  text: params.term
  };
  };
  
  while (i < term.length) {
  var termChar = term[i];
  
  if ($.inArray(termChar, separators) === -1) {
  i++;
  
  continue;
  }
  
  var part = term.substr(0, i);
  var partParams = $.extend({}, params, {
  term: part
  });
  
  var data = createTag(partParams);
  
  if (data == null) {
  i++;
  continue;
  }
  
  callback(data);
  
  // Reset the term to not include the tokenized portion
  term = term.substr(i + 1) || '';
  i = 0;
  }
  
  return {
  term: term
  };
  };
  
  return Tokenizer;
  });
  
  S2.define('select2/data/minimumInputLength',[
  
  ], function () {
  function MinimumInputLength (decorated, $e, options) {
  this.minimumInputLength = options.get('minimumInputLength');
  
  decorated.call(this, $e, options);
  }
  
  MinimumInputLength.prototype.query = function (decorated, params, callback) {
  params.term = params.term || '';
  
  if (params.term.length < this.minimumInputLength) {
  this.trigger('results:message', {
  message: 'inputTooShort',
  args: {
	minimum: this.minimumInputLength,
	input: params.term,
	params: params
  }
  });
  
  return;
  }
  
  decorated.call(this, params, callback);
  };
  
  return MinimumInputLength;
  });
  
  S2.define('select2/data/maximumInputLength',[
  
  ], function () {
  function MaximumInputLength (decorated, $e, options) {
  this.maximumInputLength = options.get('maximumInputLength');
  
  decorated.call(this, $e, options);
  }
  
  MaximumInputLength.prototype.query = function (decorated, params, callback) {
  params.term = params.term || '';
  
  if (this.maximumInputLength > 0 &&
  params.term.length > this.maximumInputLength) {
  this.trigger('results:message', {
  message: 'inputTooLong',
  args: {
	maximum: this.maximumInputLength,
	input: params.term,
	params: params
  }
  });
  
  return;
  }
  
  decorated.call(this, params, callback);
  };
  
  return MaximumInputLength;
  });
  
  S2.define('select2/data/maximumSelectionLength',[
  
  ], function (){
  function MaximumSelectionLength (decorated, $e, options) {
  this.maximumSelectionLength = options.get('maximumSelectionLength');
  
  decorated.call(this, $e, options);
  }
  
  MaximumSelectionLength.prototype.bind =
  function (decorated, container, $container) {
  var self = this;
  
  decorated.call(this, container, $container);
  
  container.on('select', function () {
  self._checkIfMaximumSelected();
  });
  };
  
  MaximumSelectionLength.prototype.query =
  function (decorated, params, callback) {
  var self = this;
  
  this._checkIfMaximumSelected(function () {
  decorated.call(self, params, callback);
  });
  };
  
  MaximumSelectionLength.prototype._checkIfMaximumSelected =
  function (_, successCallback) {
  var self = this;
  
  this.current(function (currentData) {
  var count = currentData != null ? currentData.length : 0;
  if (self.maximumSelectionLength > 0 &&
	count >= self.maximumSelectionLength) {
	self.trigger('results:message', {
	  message: 'maximumSelected',
	  args: {
		maximum: self.maximumSelectionLength
	  }
	});
	return;
  }
  
  if (successCallback) {
	successCallback();
  }
  });
  };
  
  return MaximumSelectionLength;
  });
  
  S2.define('select2/dropdown',[
  'jquery',
  './utils'
  ], function ($, Utils) {
  function Dropdown ($element, options) {
  this.$element = $element;
  this.options = options;
  
  Dropdown.__super__.constructor.call(this);
  }
  
  Utils.Extend(Dropdown, Utils.Observable);
  
  Dropdown.prototype.render = function () {
  var $dropdown = $(
  '<span class="select2-dropdown">' +
  '<span class="select2-results"></span>' +
  '</span>'
  );
  
  $dropdown.attr('dir', this.options.get('dir'));
  
  this.$dropdown = $dropdown;
  
  return $dropdown;
  };
  
  Dropdown.prototype.bind = function () {
  // Should be implemented in subclasses
  };
  
  Dropdown.prototype.position = function ($dropdown, $container) {
  // Should be implemented in subclasses
  };
  
  Dropdown.prototype.destroy = function () {
  // Remove the dropdown from the DOM
  this.$dropdown.remove();
  };
  
  return Dropdown;
  });
  
  S2.define('select2/dropdown/search',[
  'jquery',
  '../utils'
  ], function ($, Utils) {
  function Search () { }
  
  Search.prototype.render = function (decorated) {
  var $rendered = decorated.call(this);
  
  var $search = $(
  '<span class="select2-search select2-search--dropdown">' +
  '<input class="select2-search__field" type="search" tabindex="-1"' +
  ' autocomplete="off" autocorrect="off" autocapitalize="none"' +
  ' spellcheck="false" role="searchbox" aria-autocomplete="list" />' +
  '</span>'
  );
  
  this.$searchContainer = $search;
  this.$search = $search.find('input');
  
  $rendered.prepend($search);
  
  return $rendered;
  };
  
  Search.prototype.bind = function (decorated, container, $container) {
  var self = this;
  
  var resultsId = container.id + '-results';
  
  decorated.call(this, container, $container);
  
  this.$search.on('keydown', function (evt) {
  self.trigger('keypress', evt);
  
  self._keyUpPrevented = evt.isDefaultPrevented();
  });
  
  // Workaround for browsers which do not support the `input` event
  // This will prevent double-triggering of events for browsers which support
  // both the `keyup` and `input` events.
  this.$search.on('input', function (evt) {
  // Unbind the duplicated `keyup` event
  $(this).off('keyup');
  });
  
  this.$search.on('keyup input', function (evt) {
  self.handleSearch(evt);
  });
  
  container.on('open', function () {
  self.$search.attr('tabindex', 0);
  self.$search.attr('aria-controls', resultsId);
  
  self.$search.trigger('focus');
  
  window.setTimeout(function () {
  self.$search.trigger('focus');
  }, 0);
  });
  
  container.on('close', function () {
  self.$search.attr('tabindex', -1);
  self.$search.removeAttr('aria-controls');
  self.$search.removeAttr('aria-activedescendant');
  
  self.$search.val('');
  self.$search.trigger('blur');
  });
  
  container.on('focus', function () {
  if (!container.isOpen()) {
  self.$search.trigger('focus');
  }
  });
  
  container.on('results:all', function (params) {
  if (params.query.term == null || params.query.term === '') {
  var showSearch = self.showSearch(params);
  
  if (showSearch) {
	self.$searchContainer.removeClass('select2-search--hide');
  } else {
	self.$searchContainer.addClass('select2-search--hide');
  }
  }
  });
  
  container.on('results:focus', function (params) {
  if (params.data._resultId) {
  self.$search.attr('aria-activedescendant', params.data._resultId);
  } else {
  self.$search.removeAttr('aria-activedescendant');
  }
  });
  };
  
  Search.prototype.handleSearch = function (evt) {
  if (!this._keyUpPrevented) {
  var input = this.$search.val();
  
  this.trigger('query', {
  term: input
  });
  }
  
  this._keyUpPrevented = false;
  };
  
  Search.prototype.showSearch = function (_, params) {
  return true;
  };
  
  return Search;
  });
  
  S2.define('select2/dropdown/hidePlaceholder',[
  
  ], function () {
  function HidePlaceholder (decorated, $element, options, dataAdapter) {
  this.placeholder = this.normalizePlaceholder(options.get('placeholder'));
  
  decorated.call(this, $element, options, dataAdapter);
  }
  
  HidePlaceholder.prototype.append = function (decorated, data) {
  data.results = this.removePlaceholder(data.results);
  
  decorated.call(this, data);
  };
  
  HidePlaceholder.prototype.normalizePlaceholder = function (_, placeholder) {
  if (typeof placeholder === 'string') {
  placeholder = {
  id: '',
  text: placeholder
  };
  }
  
  return placeholder;
  };
  
  HidePlaceholder.prototype.removePlaceholder = function (_, data) {
  var modifiedData = data.slice(0);
  
  for (var d = data.length - 1; d >= 0; d--) {
  var item = data[d];
  
  if (this.placeholder.id === item.id) {
  modifiedData.splice(d, 1);
  }
  }
  
  return modifiedData;
  };
  
  return HidePlaceholder;
  });
  
  S2.define('select2/dropdown/infiniteScroll',[
  'jquery'
  ], function ($) {
  function InfiniteScroll (decorated, $element, options, dataAdapter) {
  this.lastParams = {};
  
  decorated.call(this, $element, options, dataAdapter);
  
  this.$loadingMore = this.createLoadingMore();
  this.loading = false;
  }
  
  InfiniteScroll.prototype.append = function (decorated, data) {
  this.$loadingMore.remove();
  this.loading = false;
  
  decorated.call(this, data);
  
  if (this.showLoadingMore(data)) {
  this.$results.append(this.$loadingMore);
  this.loadMoreIfNeeded();
  }
  };
  
  InfiniteScroll.prototype.bind = function (decorated, container, $container) {
  var self = this;
  
  decorated.call(this, container, $container);
  
  container.on('query', function (params) {
  self.lastParams = params;
  self.loading = true;
  });
  
  container.on('query:append', function (params) {
  self.lastParams = params;
  self.loading = true;
  });
  
  this.$results.on('scroll', this.loadMoreIfNeeded.bind(this));
  };
  
  InfiniteScroll.prototype.loadMoreIfNeeded = function () {
  var isLoadMoreVisible = $.contains(
  document.documentElement,
  this.$loadingMore[0]
  );
  
  if (this.loading || !isLoadMoreVisible) {
  return;
  }
  
  var currentOffset = this.$results.offset().top +
  this.$results.outerHeight(false);
  var loadingMoreOffset = this.$loadingMore.offset().top +
  this.$loadingMore.outerHeight(false);
  
  if (currentOffset + 50 >= loadingMoreOffset) {
  this.loadMore();
  }
  };
  
  InfiniteScroll.prototype.loadMore = function () {
  this.loading = true;
  
  var params = $.extend({}, {page: 1}, this.lastParams);
  
  params.page++;
  
  this.trigger('query:append', params);
  };
  
  InfiniteScroll.prototype.showLoadingMore = function (_, data) {
  return data.pagination && data.pagination.more;
  };
  
  InfiniteScroll.prototype.createLoadingMore = function () {
  var $option = $(
  '<li ' +
  'class="select2-results__option select2-results__option--load-more"' +
  'role="option" aria-disabled="true"></li>'
  );
  
  var message = this.options.get('translations').get('loadingMore');
  
  $option.html(message(this.lastParams));
  
  return $option;
  };
  
  return InfiniteScroll;
  });
  
  S2.define('select2/dropdown/attachBody',[
  'jquery',
  '../utils'
  ], function ($, Utils) {
  function AttachBody (decorated, $element, options) {
  this.$dropdownParent = $(options.get('dropdownParent') || document.body);
  
  decorated.call(this, $element, options);
  }
  
  AttachBody.prototype.bind = function (decorated, container, $container) {
  var self = this;
  
  decorated.call(this, container, $container);
  
  container.on('open', function () {
  self._showDropdown();
  self._attachPositioningHandler(container);
  
  // Must bind after the results handlers to ensure correct sizing
  self._bindContainerResultHandlers(container);
  });
  
  container.on('close', function () {
  self._hideDropdown();
  self._detachPositioningHandler(container);
  });
  
  this.$dropdownContainer.on('mousedown', function (evt) {
  evt.stopPropagation();
  });
  };
  
  AttachBody.prototype.destroy = function (decorated) {
  decorated.call(this);
  
  this.$dropdownContainer.remove();
  };
  
  AttachBody.prototype.position = function (decorated, $dropdown, $container) {
  // Clone all of the container classes
  $dropdown.attr('class', $container.attr('class'));
  
  $dropdown.removeClass('select2');
  $dropdown.addClass('select2-container--open');
  
  $dropdown.css({
  position: 'absolute',
  top: -999999
  });
  
  this.$container = $container;
  };
  

  AttachBody.prototype.render = function (decorated) {
  var $container = $('<span></span>');
  
  var $dropdown = decorated.call(this);
  $container.append($dropdown);
  
  this.$dropdownContainer = $container;
  
  return $container;
  };
  
  AttachBody.prototype._hideDropdown = function (decorated) {
  this.$dropdownContainer.detach();
  };
  
  AttachBody.prototype._bindContainerResultHandlers =
  function (decorated, container) {
  
  // These should only be bound once
  if (this._containerResultsHandlersBound) {
  return;
  }
  
  var self = this;
  
  container.on('results:all', function () {
  self._positionDropdown();
  self._resizeDropdown();
  });
  
  container.on('results:append', function () {
  self._positionDropdown();
  self._resizeDropdown();
  });
  
  container.on('results:message', function () {
  self._positionDropdown();
  self._resizeDropdown();
  });
  
  container.on('select', function () {
  self._positionDropdown();
  self._resizeDropdown();
  });
  
  container.on('unselect', function () {
  self._positionDropdown();
  self._resizeDropdown();
  });
  
  this._containerResultsHandlersBound = true;
  };
  
  AttachBody.prototype._attachPositioningHandler =
  function (decorated, container) {
  var self = this;
  
  var scrollEvent = 'scroll.select2.' + container.id;
  var resizeEvent = 'resize.select2.' + container.id;
  var orientationEvent = 'orientationchange.select2.' + container.id;
  
  var $watchers = this.$container.parents().filter(Utils.hasScroll);
  $watchers.each(function () {
  Utils.StoreData(this, 'select2-scroll-position', {
  x: $(this).scrollLeft(),
  y: $(this).scrollTop()
  });
  });
  
  $watchers.on(scrollEvent, function (ev) {
  var position = Utils.GetData(this, 'select2-scroll-position');
  $(this).scrollTop(position.y);
  });
  
  $(window).on(scrollEvent + ' ' + resizeEvent + ' ' + orientationEvent,
  function (e) {
  self._positionDropdown();
  self._resizeDropdown();
  });
  };
  
  AttachBody.prototype._detachPositioningHandler =
  function (decorated, container) {
  var scrollEvent = 'scroll.select2.' + container.id;
  var resizeEvent = 'resize.select2.' + container.id;
  var orientationEvent = 'orientationchange.select2.' + container.id;
  
  var $watchers = this.$container.parents().filter(Utils.hasScroll);
  $watchers.off(scrollEvent);
  
  $(window).off(scrollEvent + ' ' + resizeEvent + ' ' + orientationEvent);
  };
  
  AttachBody.prototype._positionDropdown = function () {
  var $window = $(window);
  
  var isCurrentlyAbove = this.$dropdown.hasClass('select2-dropdown--above');
  var isCurrentlyBelow = this.$dropdown.hasClass('select2-dropdown--below');
  
  var newDirection = null;
  
  var offset = this.$container.offset();
  
  offset.bottom = offset.top + this.$container.outerHeight(false);
  
  var container = {
  height: this.$container.outerHeight(false)
  };
  
  container.top = offset.top;
  container.bottom = offset.top + container.height;
  
  var dropdown = {
  height: this.$dropdown.outerHeight(false)
  };
  
  var viewport = {
  top: $window.scrollTop(),
  bottom: $window.scrollTop() + $window.height()
  };
  
  var enoughRoomAbove = viewport.top < (offset.top - dropdown.height);
  var enoughRoomBelow = viewport.bottom > (offset.bottom + dropdown.height);
  
  var css = {
  left: offset.left,
  top: container.bottom
  };
  
  // Determine what the parent element is to use for calculating the offset
  var $offsetParent = this.$dropdownParent;
  
  // For statically positioned elements, we need to get the element
  // that is determining the offset
  if ($offsetParent.css('position') === 'static') {
  $offsetParent = $offsetParent.offsetParent();
  }
  
  var parentOffset = {
  top: 0,
  left: 0
  };
  
  if ($.contains(document.body, $offsetParent[0])) {
  parentOffset = $offsetParent.offset();
  }
  
  css.top -= parentOffset.top;
  css.left -= parentOffset.left;
  
  if (!isCurrentlyAbove && !isCurrentlyBelow) {
  newDirection = 'below';
  }
  
  if (!enoughRoomBelow && enoughRoomAbove && !isCurrentlyAbove) {
  newDirection = 'above';
  } else if (!enoughRoomAbove && enoughRoomBelow && isCurrentlyAbove) {
  newDirection = 'below';
  }
  
  if (newDirection == 'above' ||
  (isCurrentlyAbove && newDirection !== 'below')) {
  css.top = container.top - parentOffset.top - dropdown.height;
  }
  
  if (newDirection != null) {
  this.$dropdown
  .removeClass('select2-dropdown--below select2-dropdown--above')
  .addClass('select2-dropdown--' + newDirection);
  this.$container
  .removeClass('select2-container--below select2-container--above')
  .addClass('select2-container--' + newDirection);
  }
  
  this.$dropdownContainer.css(css);
  };
  
  AttachBody.prototype._resizeDropdown = function () {
  var css = {
  width: this.$container.outerWidth(false) + 'px'
  };
  
  if (this.options.get('dropdownAutoWidth')) {
  css.minWidth = css.width;
  css.position = 'relative';
  css.width = 'auto';
  }
  
  this.$dropdown.css(css);
  };
  
  AttachBody.prototype._showDropdown = function (decorated) {
  this.$dropdownContainer.appendTo(this.$dropdownParent);
  
  this._positionDropdown();
  this._resizeDropdown();
  };
  
  return AttachBody;
  });
  
  S2.define('select2/dropdown/minimumResultsForSearch',[
  
  ], function () {
  function countResults (data) {
  var count = 0;
  
  for (var d = 0; d < data.length; d++) {
  var item = data[d];
  
  if (item.children) {
  count += countResults(item.children);
  } else {
  count++;
  }
  }
  
  return count;
  }
  
  function MinimumResultsForSearch (decorated, $element, options, dataAdapter) {
  this.minimumResultsForSearch = options.get('minimumResultsForSearch');
  
  if (this.minimumResultsForSearch < 0) {
  this.minimumResultsForSearch = Infinity;
  }
  
  decorated.call(this, $element, options, dataAdapter);
  }
  
  MinimumResultsForSearch.prototype.showSearch = function (decorated, params) {
  if (countResults(params.data.results) < this.minimumResultsForSearch) {
  return false;
  }
  
  return decorated.call(this, params);
  };
  
  return MinimumResultsForSearch;
  });
  
  S2.define('select2/dropdown/selectOnClose',[
  '../utils'
  ], function (Utils) {
  function SelectOnClose () { }
  
  SelectOnClose.prototype.bind = function (decorated, container, $container) {
  var self = this;
  
  decorated.call(this, container, $container);
  
  container.on('close', function (params) {
  self._handleSelectOnClose(params);
  });
  };
  
  SelectOnClose.prototype._handleSelectOnClose = function (_, params) {
  if (params && params.originalSelect2Event != null) {
  var event = params.originalSelect2Event;
  
  // Don't select an item if the close event was triggered from a select or
  // unselect event
  if (event._type === 'select' || event._type === 'unselect') {
  return;
  }
  }
  
  var $highlightedResults = this.getHighlightedResults();
  
  // Only select highlighted results
  if ($highlightedResults.length < 1) {
  return;
  }
  
  var data = Utils.GetData($highlightedResults[0], 'data');
  
  // Don't re-select already selected resulte
  if (
  (data.element != null && data.element.selected) ||
  (data.element == null && data.selected)
  ) {
  return;
  }
  
  this.trigger('select', {
  data: data
  });
  };
  
  return SelectOnClose;
  });
  
  S2.define('select2/dropdown/closeOnSelect',[
  
  ], function () {
  function CloseOnSelect () { }
  
  CloseOnSelect.prototype.bind = function (decorated, container, $container) {
  var self = this;
  
  decorated.call(this, container, $container);
  
  container.on('select', function (evt) {
  self._selectTriggered(evt);
  });
  
  container.on('unselect', function (evt) {
  self._selectTriggered(evt);
  });
  };
  
  CloseOnSelect.prototype._selectTriggered = function (_, evt) {
  var originalEvent = evt.originalEvent;
  
  // Don't close if the control key is being held
  if (originalEvent && (originalEvent.ctrlKey || originalEvent.metaKey)) {
  return;
  }
  
  this.trigger('close', {
  originalEvent: originalEvent,
  originalSelect2Event: evt
  });
  };
  
  return CloseOnSelect;
  });
  
  S2.define('select2/i18n/en',[],function () {
  // English
  return {
  errorLoading: function () {
  return 'The results could not be loaded.';
  },
  inputTooLong: function (args) {
  var overChars = args.input.length - args.maximum;
  
  var message = 'Please delete ' + overChars + ' character';
  
  if (overChars != 1) {
  message += 's';
  }
  
  return message;
  },
  inputTooShort: function (args) {
  var remainingChars = args.minimum - args.input.length;
  
  var message = 'Please enter ' + remainingChars + ' or more characters';
  
  return message;
  },
  loadingMore: function () {
  return 'Loading more results…';
  },
  maximumSelected: function (args) {
  var message = 'You can only select ' + args.maximum + ' item';
  
  if (args.maximum != 1) {
  message += 's';
  }
  
  return message;
  },
  noResults: function () {
  return 'No results found';
  },
  searching: function () {
  return 'Searching…';
  },
  removeAllItems: function () {
  return 'Remove all items';
  }
  };
  });
  
  S2.define('select2/defaults',[
  'jquery',
  'require',
  
  './results',
  
  './selection/single',
  './selection/multiple',
  './selection/placeholder',
  './selection/allowClear',
  './selection/search',
  './selection/eventRelay',
  
  './utils',
  './translation',
  './diacritics',
  
  './data/select',
  './data/array',
  './data/ajax',
  './data/tags',
  './data/tokenizer',
  './data/minimumInputLength',
  './data/maximumInputLength',
  './data/maximumSelectionLength',
  
  './dropdown',
  './dropdown/search',
  './dropdown/hidePlaceholder',
  './dropdown/infiniteScroll',
  './dropdown/attachBody',
  './dropdown/minimumResultsForSearch',
  './dropdown/selectOnClose',
  './dropdown/closeOnSelect',
  
  './i18n/en'
  ], function ($, require,
  
	   ResultsList,
  
	   SingleSelection, MultipleSelection, Placeholder, AllowClear,
	   SelectionSearch, EventRelay,
  
	   Utils, Translation, DIACRITICS,
  
	   SelectData, ArrayData, AjaxData, Tags, Tokenizer,
	   MinimumInputLength, MaximumInputLength, MaximumSelectionLength,
  
	   Dropdown, DropdownSearch, HidePlaceholder, InfiniteScroll,
	   AttachBody, MinimumResultsForSearch, SelectOnClose, CloseOnSelect,
  
	   EnglishTranslation) {
  function Defaults () {
  this.reset();
  }
  
  Defaults.prototype.apply = function (options) {
  options = $.extend(true, {}, this.defaults, options);
  
  if (options.dataAdapter == null) {
  if (options.ajax != null) {
  options.dataAdapter = AjaxData;
  } else if (options.data != null) {
  options.dataAdapter = ArrayData;
  } else {
  options.dataAdapter = SelectData;
  }
  
  if (options.minimumInputLength > 0) {
  options.dataAdapter = Utils.Decorate(
	options.dataAdapter,
	MinimumInputLength
  );
  }
  
  if (options.maximumInputLength > 0) {
  options.dataAdapter = Utils.Decorate(
	options.dataAdapter,
	MaximumInputLength
  );
  }
  
  if (options.maximumSelectionLength > 0) {
  options.dataAdapter = Utils.Decorate(
	options.dataAdapter,
	MaximumSelectionLength
  );
  }
  
  if (options.tags) {
  options.dataAdapter = Utils.Decorate(options.dataAdapter, Tags);
  }
  
  if (options.tokenSeparators != null || options.tokenizer != null) {
  options.dataAdapter = Utils.Decorate(
	options.dataAdapter,
	Tokenizer
  );
  }
  
  if (options.query != null) {
  var Query = require(options.amdBase + 'compat/query');
  
  options.dataAdapter = Utils.Decorate(
	options.dataAdapter,
	Query
  );
  }
  
  if (options.initSelection != null) {
  var InitSelection = require(options.amdBase + 'compat/initSelection');
  
  options.dataAdapter = Utils.Decorate(
	options.dataAdapter,
	InitSelection
  );
  }
  }
  
  if (options.resultsAdapter == null) {
  options.resultsAdapter = ResultsList;
  
  if (options.ajax != null) {
  options.resultsAdapter = Utils.Decorate(
	options.resultsAdapter,
	InfiniteScroll
  );
  }
  
  if (options.placeholder != null) {
  options.resultsAdapter = Utils.Decorate(
	options.resultsAdapter,
	HidePlaceholder
  );
  }
  
  if (options.selectOnClose) {
  options.resultsAdapter = Utils.Decorate(
	options.resultsAdapter,
	SelectOnClose
  );
  }
  }
  
  if (options.dropdownAdapter == null) {
  if (options.multiple) {
  options.dropdownAdapter = Dropdown;
  } else {
  var SearchableDropdown = Utils.Decorate(Dropdown, DropdownSearch);
  
  options.dropdownAdapter = SearchableDropdown;
  }
  
  if (options.minimumResultsForSearch !== 0) {
  options.dropdownAdapter = Utils.Decorate(
	options.dropdownAdapter,
	MinimumResultsForSearch
  );
  }
  
  if (options.closeOnSelect) {
  options.dropdownAdapter = Utils.Decorate(
	options.dropdownAdapter,
	CloseOnSelect
  );
  }
  
  if (
  options.dropdownCssClass != null ||
  options.dropdownCss != null ||
  options.adaptDropdownCssClass != null
  ) {
  var DropdownCSS = require(options.amdBase + 'compat/dropdownCss');
  
  options.dropdownAdapter = Utils.Decorate(
	options.dropdownAdapter,
	DropdownCSS
  );
  }
  
  options.dropdownAdapter = Utils.Decorate(
  options.dropdownAdapter,
  AttachBody
  );
  }
  
  if (options.selectionAdapter == null) {
  if (options.multiple) {
  options.selectionAdapter = MultipleSelection;
  } else {
  options.selectionAdapter = SingleSelection;
  }
  if (options.placeholder != null) {
  options.selectionAdapter = Utils.Decorate(
	options.selectionAdapter,
	Placeholder
  );
  }
  
  if (options.allowClear) {
  options.selectionAdapter = Utils.Decorate(
	options.selectionAdapter,
	AllowClear
  );
  }
  
  if (options.multiple) {
  options.selectionAdapter = Utils.Decorate(
	options.selectionAdapter,
	SelectionSearch
  );
  }
  
  if (
  options.containerCssClass != null ||
  options.containerCss != null ||
  options.adaptContainerCssClass != null
  ) {
  var ContainerCSS = require(options.amdBase + 'compat/containerCss');
  
  options.selectionAdapter = Utils.Decorate(
	options.selectionAdapter,
	ContainerCSS
  );
  }
  
  options.selectionAdapter = Utils.Decorate(
  options.selectionAdapter,
  EventRelay
  );
  }
  options.language = this._resolveLanguage(options.language);
  options.language.push('en');
  
  var uniqueLanguages = [];
  
  for (var l = 0; l < options.language.length; l++) {
  var language = options.language[l];
  
  if (uniqueLanguages.indexOf(language) === -1) {
  uniqueLanguages.push(language);
  }
  }
  
  options.language = uniqueLanguages;
  
  options.translations = this._processTranslations(
  options.language,
  options.debug
  );
  
  return options;
  };
  
  Defaults.prototype.reset = function () {
  function stripDiacritics (text) {
  function match(a) {
  return DIACRITICS[a] || a;
  }
  
  return text.replace(/[^\u0000-\u007E]/g, match);
  }
  
  function matcher (params, data) {
  if ($.trim(params.term) === '') {
  return data;
  }
  if (data.children && data.children.length > 0) {
  var match = $.extend(true, {}, data);
  for (var c = data.children.length - 1; c >= 0; c--) {
	var child = data.children[c];
  
	var matches = matcher(params, child);
	if (matches == null) {
	  match.children.splice(c, 1);
	}
  }
  if (match.children.length > 0) {
	return match;
  }
  return matcher(params, match);
  }
  
  var original = stripDiacritics(data.text).toUpperCase();
  var term = stripDiacritics(params.term).toUpperCase();
  if (original.indexOf(term) > -1) {
  return data;
  }
  return null;
  }
  
  this.defaults = {
  amdBase: './',
  amdLanguageBase: './i18n/',
  closeOnSelect: true,
  debug: false,
  dropdownAutoWidth: false,
  escapeMarkup: Utils.escapeMarkup,
  language: {},
  matcher: matcher,
  minimumInputLength: 0,
  maximumInputLength: 0,
  maximumSelectionLength: 0,
  minimumResultsForSearch: 0,
  selectOnClose: false,
  scrollAfterSelect: false,
  sorter: function (data) {
  return data;
  },
  templateResult: function (result) {
  return result.text;
  },
  templateSelection: function (selection) {
  return selection.text;
  },
  theme: 'default',
  width: 'resolve'
  };
  };
  
  Defaults.prototype.applyFromElement = function (options, $element) {
  var optionLanguage = options.language;
  var defaultLanguage = this.defaults.language;
  var elementLanguage = $element.prop('lang');
  var parentLanguage = $element.closest('[lang]').prop('lang');
  
  var languages = Array.prototype.concat.call(
  this._resolveLanguage(elementLanguage),
  this._resolveLanguage(optionLanguage),
  this._resolveLanguage(defaultLanguage),
  this._resolveLanguage(parentLanguage)
  );
  
  options.language = languages;
  
  return options;
  };
  
  Defaults.prototype._resolveLanguage = function (language) {
  if (!language) {
  return [];
  }
  
  if ($.isEmptyObject(language)) {
  return [];
  }
  
  if ($.isPlainObject(language)) {
  return [language];
  }
  
  var languages;
  
  if (!$.isArray(language)) {
  languages = [language];
  } else {
  languages = language;
  }
  
  var resolvedLanguages = [];
  
  for (var l = 0; l < languages.length; l++) {
  resolvedLanguages.push(languages[l]);
  
  if (typeof languages[l] === 'string' && languages[l].indexOf('-') > 0) {
  var languageParts = languages[l].split('-');
  var baseLanguage = languageParts[0];
  
  resolvedLanguages.push(baseLanguage);
  }
  }
  
  return resolvedLanguages;
  };
  
  Defaults.prototype._processTranslations = function (languages, debug) {
  var translations = new Translation();
  
  for (var l = 0; l < languages.length; l++) {
  var languageData = new Translation();
  
  var language = languages[l];
  
  if (typeof language === 'string') {
  try {
	languageData = Translation.loadPath(language);
  } catch (e) {
	try {
	  language = this.defaults.amdLanguageBase + language;
	  languageData = Translation.loadPath(language);
	} catch (ex) {
	  if (debug && window.console && console.warn) {
		console.warn(
		  'Select2: The language file for "' + language + '" could ' +
		  'not be automatically loaded. A fallback will be used instead.'
		);
	  }
	}
  }
  } else if ($.isPlainObject(language)) {
  languageData = new Translation(language);
  } else {
  languageData = language;
  }
  
  translations.extend(languageData);
  }
  
  return translations;
  };
  
  Defaults.prototype.set = function (key, value) {
  var camelKey = $.camelCase(key);
  
  var data = {};
  data[camelKey] = value;
  
  var convertedData = Utils._convertData(data);
  
  $.extend(true, this.defaults, convertedData);
  };
  
  var defaults = new Defaults();
  
  return defaults;
  });
  
  S2.define('select2/options',[
  'require',
  'jquery',
  './defaults',
  './utils'
  ], function (require, $, Defaults, Utils) {
  function Options (options, $element) {
  this.options = options;
  
  if ($element != null) {
  this.fromElement($element);
  }
  
  if ($element != null) {
  this.options = Defaults.applyFromElement(this.options, $element);
  }
  
  this.options = Defaults.apply(this.options);
  
  if ($element && $element.is('input')) {
  var InputCompat = require(this.get('amdBase') + 'compat/inputData');
  
  this.options.dataAdapter = Utils.Decorate(
  this.options.dataAdapter,
  InputCompat
  );
  }
  }
  
  Options.prototype.fromElement = function ($e) {
  var excludedData = ['select2'];
  
  if (this.options.multiple == null) {
  this.options.multiple = $e.prop('multiple');
  }
  
  if (this.options.disabled == null) {
  this.options.disabled = $e.prop('disabled');
  }
  
  if (this.options.dir == null) {
  if ($e.prop('dir')) {
  this.options.dir = $e.prop('dir');
  } else if ($e.closest('[dir]').prop('dir')) {
  this.options.dir = $e.closest('[dir]').prop('dir');
  } else {
  this.options.dir = 'ltr';
  }
  }
  
  $e.prop('disabled', this.options.disabled);
  $e.prop('multiple', this.options.multiple);
  
  if (Utils.GetData($e[0], 'select2Tags')) {
  if (this.options.debug && window.console && console.warn) {
  console.warn(
	'Select2: The `data-select2-tags` attribute has been changed to ' +
	'use the `data-data` and `data-tags="true"` attributes and will be ' +
	'removed in future versions of Select2.'
  );
  }
  
  Utils.StoreData($e[0], 'data', Utils.GetData($e[0], 'select2Tags'));
  Utils.StoreData($e[0], 'tags', true);
  }
  
  if (Utils.GetData($e[0], 'ajaxUrl')) {
  if (this.options.debug && window.console && console.warn) {
  console.warn(
	'Select2: The `data-ajax-url` attribute has been changed to ' +
	'`data-ajax--url` and support for the old attribute will be removed' +
	' in future versions of Select2.'
  );
  }
  
  $e.attr('ajax--url', Utils.GetData($e[0], 'ajaxUrl'));
  Utils.StoreData($e[0], 'ajax-Url', Utils.GetData($e[0], 'ajaxUrl'));
  }
  
  var dataset = {};
  
  function upperCaseLetter(_, letter) {
  return letter.toUpperCase();
  }
  for (var attr = 0; attr < $e[0].attributes.length; attr++) {
  var attributeName = $e[0].attributes[attr].name;
  var prefix = 'data-';
  
  if (attributeName.substr(0, prefix.length) == prefix) {
  var dataName = attributeName.substring(prefix.length);
  var dataValue = Utils.GetData($e[0], dataName);
  var camelDataName = dataName.replace(/-([a-z])/g, upperCaseLetter);
  dataset[camelDataName] = dataValue;
  }
  }
  if ($.fn.jquery && $.fn.jquery.substr(0, 2) == '1.' && $e[0].dataset) {
  dataset = $.extend(true, {}, $e[0].dataset, dataset);
  }
  var data = $.extend(true, {}, Utils.GetData($e[0]), dataset);
  data = Utils._convertData(data);
  for (var key in data) {
  if ($.inArray(key, excludedData) > -1) {
  continue;
  }
  
  if ($.isPlainObject(this.options[key])) {
  $.extend(this.options[key], data[key]);
  } else {
  this.options[key] = data[key];
  }
  }
  
  return this;
  };
  
  Options.prototype.get = function (key) {
  return this.options[key];
  };
  
  Options.prototype.set = function (key, val) {
  this.options[key] = val;
  };
  
  return Options;
  });
  
  S2.define('select2/core',[
  'jquery',
  './options',
  './utils',
  './keys'
  ], function ($, Options, Utils, KEYS) {
  var Select2 = function ($element, options) {
  if (Utils.GetData($element[0], 'select2') != null) {
  Utils.GetData($element[0], 'select2').destroy();
  }
  
  this.$element = $element;
  
  this.id = this._generateId($element);
  
  options = options || {};
  
  this.options = new Options(options, $element);
  
  Select2.__super__.constructor.call(this);
  var tabindex = $element.attr('tabindex') || 0;
  Utils.StoreData($element[0], 'old-tabindex', tabindex);
  $element.attr('tabindex', '-1');
  
  var DataAdapter = this.options.get('dataAdapter');
  this.dataAdapter = new DataAdapter($element, this.options);
  
  var $container = this.render();
  
  this._placeContainer($container);
  
  var SelectionAdapter = this.options.get('selectionAdapter');
  this.selection = new SelectionAdapter($element, this.options);
  this.$selection = this.selection.render();
  
  this.selection.position(this.$selection, $container);
  
  var DropdownAdapter = this.options.get('dropdownAdapter');
  this.dropdown = new DropdownAdapter($element, this.options);
  this.$dropdown = this.dropdown.render();
  
  this.dropdown.position(this.$dropdown, $container);
  
  var ResultsAdapter = this.options.get('resultsAdapter');
  this.results = new ResultsAdapter($element, this.options, this.dataAdapter);
  this.$results = this.results.render();
  
  this.results.position(this.$results, this.$dropdown);
  
  var self = this;
  this._bindAdapters();
  this._registerDomEvents();
  this._registerDataEvents();
  this._registerSelectionEvents();
  this._registerDropdownEvents();
  this._registerResultsEvents();
  this._registerEvents();

  
  this.dataAdapter.current(function (initialData) {
  self.trigger('selection:update', {
  data: initialData
  });
  });
  
  $element.addClass('select2-hidden-accessible');
  $element.attr('aria-hidden', 'true');
  this._syncAttributes();
  
  Utils.StoreData($element[0], 'select2', this);
  $element.data('select2', this);
  };
  
  Utils.Extend(Select2, Utils.Observable);
  
  Select2.prototype._generateId = function ($element) {
  var id = '';
  
  if ($element.attr('id') != null) {
  id = $element.attr('id');
  } else if ($element.attr('name') != null) {
  id = $element.attr('name') + '-' + Utils.generateChars(2);
  } else {
  id = Utils.generateChars(4);
  }
  
  id = id.replace(/(:|\.|\[|\]|,)/g, '');
  id = 'select2-' + id;
  
  return id;
  };
  
  Select2.prototype._placeContainer = function ($container) {
  $container.insertAfter(this.$element);
  
  var width = this._resolveWidth(this.$element, this.options.get('width'));
  
  if (width != null) {
  $container.css('width', width);
  }
  };
  
  Select2.prototype._resolveWidth = function ($element, method) {
  var WIDTH = /^width:(([-+]?([0-9]*\.)?[0-9]+)(px|em|ex|%|in|cm|mm|pt|pc))/i;
  
  if (method == 'resolve') {
  var styleWidth = this._resolveWidth($element, 'style');
  
  if (styleWidth != null) {
  return styleWidth;
  }
  
  return this._resolveWidth($element, 'element');
  }
  
  if (method == 'element') {
  var elementWidth = $element.outerWidth(false);
  
  if (elementWidth <= 0) {
  return 'auto';
  }
  
  return elementWidth + 'px';
  }
  
  if (method == 'style') {
  var style = $element.attr('style');
  
  if (typeof(style) !== 'string') {
  return null;
  }
  
  var attrs = style.split(';');
  
  for (var i = 0, l = attrs.length; i < l; i = i + 1) {
  var attr = attrs[i].replace(/\s/g, '');
  var matches = attr.match(WIDTH);
  
  if (matches !== null && matches.length >= 1) {
	return matches[1];
  }
  }
  
  return null;
  }
  
  if (method == 'computedstyle') {
  var computedStyle = window.getComputedStyle($element[0]);
  
  return computedStyle.width;
  }
  
  return method;
  };
  
  Select2.prototype._bindAdapters = function () {
  this.dataAdapter.bind(this, this.$container);
  this.selection.bind(this, this.$container);
  
  this.dropdown.bind(this, this.$container);
  this.results.bind(this, this.$container);
  };
  
  Select2.prototype._registerDomEvents = function () {
  var self = this;
  
  this.$element.on('change.select2', function () {
  self.dataAdapter.current(function (data) {
  self.trigger('selection:update', {
	data: data
  });
  });
  });
  
  this.$element.on('focus.select2', function (evt) {
  self.trigger('focus', evt);
  });
  
  this._syncA = Utils.bind(this._syncAttributes, this);
  this._syncS = Utils.bind(this._syncSubtree, this);
  
  if (this.$element[0].attachEvent) {
  this.$element[0].attachEvent('onpropertychange', this._syncA);
  }
  
  var observer = window.MutationObserver ||
  window.WebKitMutationObserver ||
  window.MozMutationObserver
  ;
  
  if (observer != null) {
  this._observer = new observer(function (mutations) {
  $.each(mutations, self._syncA);
  $.each(mutations, self._syncS);
  });
  this._observer.observe(this.$element[0], {
  attributes: true,
  childList: true,
  subtree: false
  });
  } else if (this.$element[0].addEventListener) {
  this.$element[0].addEventListener(
  'DOMAttrModified',
  self._syncA,
  false
  );
  this.$element[0].addEventListener(
  'DOMNodeInserted',
  self._syncS,
  false
  );
  this.$element[0].addEventListener(
  'DOMNodeRemoved',
  self._syncS,
  false
  );
  }
  };
  
  Select2.prototype._registerDataEvents = function () {
  var self = this;
  
  this.dataAdapter.on('*', function (name, params) {
  self.trigger(name, params);
  });
  };
  
  Select2.prototype._registerSelectionEvents = function () {
  var self = this;
  var nonRelayEvents = ['toggle', 'focus'];
  
  this.selection.on('toggle', function () {
  self.toggleDropdown();
  });
  
  this.selection.on('focus', function (params) {
  self.focus(params);
  });
  
  this.selection.on('*', function (name, params) {
  if ($.inArray(name, nonRelayEvents) !== -1) {
  return;
  }
  
  self.trigger(name, params);
  });
  };
  
  Select2.prototype._registerDropdownEvents = function () {
  var self = this;
  
  this.dropdown.on('*', function (name, params) {
  self.trigger(name, params);
  });
  };
  
  Select2.prototype._registerResultsEvents = function () {
  var self = this;
  
  this.results.on('*', function (name, params) {
  self.trigger(name, params);
  });
  };
  
  Select2.prototype._registerEvents = function () {
  var self = this;
  
  this.on('open', function () {
  self.$container.addClass('select2-container--open');
  });
  
  this.on('close', function () {
  self.$container.removeClass('select2-container--open');
  });
  
  this.on('enable', function () {
  self.$container.removeClass('select2-container--disabled');
  });
  
  this.on('disable', function () {
  self.$container.addClass('select2-container--disabled');
  });
  
  this.on('blur', function () {
  self.$container.removeClass('select2-container--focus');
  });
  
  this.on('query', function (params) {
  if (!self.isOpen()) {
  self.trigger('open', {});
  }
  
  this.dataAdapter.query(params, function (data) {
  self.trigger('results:all', {
	data: data,
	query: params
  });
  });
  });
  
  this.on('query:append', function (params) {
  this.dataAdapter.query(params, function (data) {
  self.trigger('results:append', {
	data: data,
	query: params
  });
  });
  });
  
  this.on('keypress', function (evt) {
  var key = evt.which;
  
  if (self.isOpen()) {
  if (key === KEYS.ESC || key === KEYS.TAB ||
	  (key === KEYS.UP && evt.altKey)) {
	self.close();
  
	evt.preventDefault();
  } else if (key === KEYS.ENTER) {
	self.trigger('results:select', {});
  
	evt.preventDefault();
  } else if ((key === KEYS.SPACE && evt.ctrlKey)) {
	self.trigger('results:toggle', {});
  
	evt.preventDefault();
  } else if (key === KEYS.UP) {
	self.trigger('results:previous', {});
  
	evt.preventDefault();
  } else if (key === KEYS.DOWN) {
	self.trigger('results:next', {});
  
	evt.preventDefault();
  }
  } else {
  if (key === KEYS.ENTER || key === KEYS.SPACE ||
	  (key === KEYS.DOWN && evt.altKey)) {
	self.open();
  
	evt.preventDefault();
  }
  }
  });
  };
  
  Select2.prototype._syncAttributes = function () {
  this.options.set('disabled', this.$element.prop('disabled'));
  
  if (this.options.get('disabled')) {
  if (this.isOpen()) {
  this.close();
  }
  
  this.trigger('disable', {});
  } else {
  this.trigger('enable', {});
  }
  };
  
  Select2.prototype._syncSubtree = function (evt, mutations) {
  var changed = false;
  var self = this;
  if (
  evt && evt.target && (
  evt.target.nodeName !== 'OPTION' && evt.target.nodeName !== 'OPTGROUP'
  )
  ) {
  return;
  }
  
  if (!mutations) {
  changed = true;
  } else if (mutations.addedNodes && mutations.addedNodes.length > 0) {
  for (var n = 0; n < mutations.addedNodes.length; n++) {
  var node = mutations.addedNodes[n];
  
  if (node.selected) {
	changed = true;
  }
  }
  } else if (mutations.removedNodes && mutations.removedNodes.length > 0) {
  changed = true;
  }
  if (changed) {
  this.dataAdapter.current(function (currentData) {
  self.trigger('selection:update', {
	data: currentData
  });
  });
  }
  };
  

  Select2.prototype.trigger = function (name, args) {
  var actualTrigger = Select2.__super__.trigger;
  var preTriggerMap = {
  'open': 'opening',
  'close': 'closing',
  'select': 'selecting',
  'unselect': 'unselecting',
  'clear': 'clearing'
  };
  
  if (args === undefined) {
  args = {};
  }
  
  if (name in preTriggerMap) {
  var preTriggerName = preTriggerMap[name];
  var preTriggerArgs = {
  prevented: false,
  name: name,
  args: args
  };
  
  actualTrigger.call(this, preTriggerName, preTriggerArgs);
  
  if (preTriggerArgs.prevented) {
  args.prevented = true;
  
  return;
  }
  }
  
  actualTrigger.call(this, name, args);
  };
  
  Select2.prototype.toggleDropdown = function () {
  if (this.options.get('disabled')) {
  return;
  }
  
  if (this.isOpen()) {
  this.close();
  } else {
  this.open();
  }
  };
  
  Select2.prototype.open = function () {
  if (this.isOpen()) {
  return;
  }
  
  this.trigger('query', {});
  };
  
  Select2.prototype.close = function () {
  if (!this.isOpen()) {
  return;
  }
  
  this.trigger('close', {});
  };
  
  Select2.prototype.isOpen = function () {
  return this.$container.hasClass('select2-container--open');
  };
  
  Select2.prototype.hasFocus = function () {
  return this.$container.hasClass('select2-container--focus');
  };
  
  Select2.prototype.focus = function (data) {
  if (this.hasFocus()) {
  return;
  }
  
  this.$container.addClass('select2-container--focus');
  this.trigger('focus', {});
  };
  
  Select2.prototype.enable = function (args) {
  if (this.options.get('debug') && window.console && console.warn) {
  console.warn(
  'Select2: The `select2("enable")` method has been deprecated and will' +
  ' be removed in later Select2 versions. Use $element.prop("disabled")' +
  ' instead.'
  );
  }
  
  if (args == null || args.length === 0) {
  args = [true];
  }
  
  var disabled = !args[0];
  
  this.$element.prop('disabled', disabled);
  };
  
  Select2.prototype.data = function () {
  if (this.options.get('debug') &&
  arguments.length > 0 && window.console && console.warn) {
  console.warn(
  'Select2: Data can no longer be set using `select2("data")`. You ' +
  'should consider setting the value instead using `$element.val()`.'
  );
  }
  
  var data = [];
  
  this.dataAdapter.current(function (currentData) {
  data = currentData;
  });
  
  return data;
  };
  
  Select2.prototype.val = function (args) {
  if (this.options.get('debug') && window.console && console.warn) {
  console.warn(
  'Select2: The `select2("val")` method has been deprecated and will be' +
  ' removed in later Select2 versions. Use $element.val() instead.'
  );
  }
  
  if (args == null || args.length === 0) {
  return this.$element.val();
  }
  
  var newVal = args[0];
  
  if ($.isArray(newVal)) {
  newVal = $.map(newVal, function (obj) {
  return obj.toString();
  });
  }
  
  this.$element.val(newVal).trigger('change');
  };
  
  Select2.prototype.destroy = function () {
  this.$container.remove();
  
  if (this.$element[0].detachEvent) {
  this.$element[0].detachEvent('onpropertychange', this._syncA);
  }
  
  if (this._observer != null) {
  this._observer.disconnect();
  this._observer = null;
  } else if (this.$element[0].removeEventListener) {
  this.$element[0]
  .removeEventListener('DOMAttrModified', this._syncA, false);
  this.$element[0]
  .removeEventListener('DOMNodeInserted', this._syncS, false);
  this.$element[0]
  .removeEventListener('DOMNodeRemoved', this._syncS, false);
  }
  
  this._syncA = null;
  this._syncS = null;
  
  this.$element.off('.select2');
  this.$element.attr('tabindex',
  Utils.GetData(this.$element[0], 'old-tabindex'));
  
  this.$element.removeClass('select2-hidden-accessible');
  this.$element.attr('aria-hidden', 'false');
  Utils.RemoveData(this.$element[0]);
  this.$element.removeData('select2');
  
  this.dataAdapter.destroy();
  this.selection.destroy();
  this.dropdown.destroy();
  this.results.destroy();
  
  this.dataAdapter = null;
  this.selection = null;
  this.dropdown = null;
  this.results = null;
  };
  
  Select2.prototype.render = function () {
  var $container = $(
  '<span class="select2 select2-container">' +
  '<span class="selection"></span>' +
  '<span class="dropdown-wrapper" aria-hidden="true"></span>' +
  '</span>'
  );
  
  $container.attr('dir', this.options.get('dir'));
  this.$container = $container;

  this.$container.addClass('select2-container--' + this.options.get('theme'));
  Utils.StoreData($container[0], 'element', this.$element);
  return $container;
  };
  
  return Select2;
  });
  
  S2.define('jquery-mousewheel',[
  'jquery'
  ], function ($) {
  return $;
  });
  
  S2.define('jquery.select2',[
  'jquery',
  'jquery-mousewheel',
  
  './select2/core',
  './select2/defaults',
  './select2/utils'
  ], function ($, _, Select2, Defaults, Utils) {
  if ($.fn.select2 == null) {
  var thisMethods = ['open', 'close', 'destroy'];
  
  $.fn.select2 = function (options) {
  options = options || {};
  
  if (typeof options === 'object') {
  this.each(function () {
	var instanceOptions = $.extend(true, {}, options);
  
	var instance = new Select2($(this), instanceOptions);
  });
  
  return this;
  } else if (typeof options === 'string') {
  var ret;
  var args = Array.prototype.slice.call(arguments, 1);
  
  this.each(function () {
	var instance = Utils.GetData(this, 'select2');
  
	if (instance == null && window.console && console.error) {
	  console.error(
		'The select2(\'' + options + '\') method was called on an ' +
		'element that is not using Select2.'
	  );
	}
  
	ret = instance[options].apply(instance, args);
  });
  if ($.inArray(options, thisMethods) > -1) {
	return this;
  }
  
  return ret;
  } else {
  throw new Error('Invalid arguments for Select2: ' + options);
  }
  };
  }
  
  if ($.fn.select2.defaults == null) {
  $.fn.select2.defaults = Defaults;
  }
  
  return Select2;
  });
  return {
  define: S2.define,
  require: S2.require
  };
  }());
  var select2 = S2.require('jquery.select2');
  jQuery.fn.select2.amd = S2;
  return select2;
  }));
