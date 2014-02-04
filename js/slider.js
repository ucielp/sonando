(function() {
  Ediciones = {};
  Browser = {};
})();

(function(window) {
  var Slider = function() {};

  Slider.prototype.init = function(element, opts) {
    this.element = element;
    this.structure = this.structure(element);
    this.current_x = 0;
    this.current_y = 0;
    this.hooks = {};

    this.opts = jQuery.extend({
      next: undefined, 
      previous: undefined, 
      limit_left: false,
      limit_right: false, 
      use_margin: false,
      init: undefined
    }, opts);
    
    var self = this;
    if (this.opts.next) {
      this.opts.next.bind('click', function() {
        var previous = self.current_x;
        self.current_x = self.limitXBounds(self.nextPageX(self.current_x));
        if (self.current_x !== previous) {
          self.update(self.current_x, true);
          self.runHook('move', self);
        }

        return false;
      });
    }

    if (this.opts.previous) {
      this.opts.previous.bind('click', function() {
        var previous = self.current_x;
        self.current_x = self.limitXBounds(self.previousPageX(self.current_x));
        if (self.current_x !== previous) {
          self.update(self.current_x, true);
          self.runHook('move', self);
        }

        return false;
      });
    }

    if (this.opts.init !== undefined) {
      this.opts.init(this); 
    }
  };

  Slider.prototype.structure = function(element) {
    var structure = {};
    var first = element.find('.item').eq(0);

    structure.item_count = element.find('.item').size();
    structure.item_width = parseInt(first.width());
    structure.item_height = parseInt(first.height());
    var margin_right = first.css('marginRight');
    structure.item_spacing = (margin_right !== undefined) ? parseInt(margin_right.replace('px', '')) : 0;
    structure.container_width = (structure.item_spacing + structure.item_width);

    return structure;
  };

  Slider.prototype.subscribe = function(hook, fn) {
    if (this.hooks[hook] === undefined) {
      this.hooks[hook] = [];
    }
    this.hooks[hook].push(fn);
  };

  Slider.prototype.runHook = function(hook) {
    if (this.hooks[hook] !== undefined) {
      var args = Array().slice.call(arguments);
      var self = this;
      this.hooks[hook].forEach(function(fn) {
        fn.apply(self, args.slice(1));
      });
    }
  };

  Slider.prototype.page = function(current_x) {
    return Math.abs(Math.round(current_x / this.structure.container_width));
  };

  Slider.prototype.nearestPageX = function(current_x) {
    return Math.round(current_x / this.structure.container_width) * this.structure.container_width;
  };

  Slider.prototype.pageX = function(index) {
    var flip = (this.opts.reverse) ? 1 : -1;
    return flip * index * this.structure.container_width;
  };

  Slider.prototype.nextPageX = function(current_x) {
    if (this.page(current_x) + 1 <= this.structure.item_count - 1) {
      current_x = current_x - this.structure.container_width;
    }
    return current_x;
  };

  Slider.prototype.previousPageX = function(current_x) {
    if (this.page(current_x) >= 0) {
      current_x = current_x + this.structure.container_width;
    }
    return current_x;
  };

  Slider.prototype.limitXBounds = function(current_x) {
    var total_width = this.structure.container_width * this.structure.item_count;
    if (this.opts.reverse) {
      current_x = (current_x > total_width - this.structure.container_width) ? total_width - this.structure.container_width : current_x;
      current_x = (current_x < 0) ? 0 : current_x;
    } else {
      current_x = (current_x < -total_width + this.structure.container_width) ? -total_width + this.structure.container_width : current_x;
      current_x = (current_x > 0) ? 0 : current_x;
    }

    if ((this.current_x - current_x > 0 && this.opts.limit_right) || 
        (this.current_x - current_x < 0 && this.opts.limit_left)) {
      current_x = this.current_x;
    }
    return current_x;
  };

  Slider.prototype.update = function(current_x) {
    var self = this;
    this.element.animate({'margin-left': current_x + 'px'}).queue(function() {
      self.runHook('transition_end', self);
      $(this).dequeue();
    });
    this.runHook('update', this);
  };

  Ediciones.Slider = Slider;


  })(window);
