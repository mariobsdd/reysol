"user strict";

var REYSOL = REYSOL || {};
REYSOL.header = (function (){
    var self={
    }
    self.inic = function(){
        self.fadeGalleries();
    }
    self.fadeGalleries = function(){
        jQuery('.gallery').slick({
            arrows: false,
            autoplay: true,
          infinite: true,
          speed: 500,
          fade: true,
          cssEase: 'linear'
        });
    }
    return self;
}());
REYSOL.home = (function (){
    var self={
    }
    self.inic = function(){
        self.fadeGalleries();
    }
    self.fadeGalleries = function(){
        jQuery('.images').slick({
            arrows: false,
            autoplay: true,
          infinite: true,
          speed: 500,
          fade: true,
          cssEase: 'linear'
        });
    }
    return self;
}());
/*script de pop up del header*/
    function popitup(url) {
        newwindow=window.open(url,'name','height=400,width=400');
        if (window.focus) {newwindow.focus()}
        return false;
    }
jQuery(document).ready(function() {
    //REYSOL.slideshow.inic();
    REYSOL.home.inic();
    REYSOL.header.inic();

});
jQuery(window).resize(function(){
    REYSOL.screen.resize();
});