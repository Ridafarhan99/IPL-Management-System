$(document).ready(function(){
    
    
    
    
 /*------------------------------------------------------------STICKY NAVIGATON BAR----------------------------------------------------------------------*/
    
    
    
    
/*------------------------------------------------------------------STICKY (HOME)------------------------------------------------------------------------*/    
    $('.js--section-feautures').waypoint(function(direction) {
        if(direction == "down"){
            $('nav').addClass('sticky');
        }else {
            $('nav').removeClass('sticky');
        }
  }, {
    offset: '60px'
    });
    
    
    
    
/*----------------------------------------------------------------STICKY (HISTORY)-----------------------------------------------------------------------*/     
    $('.js--section-background').waypoint(function(direction) {
        if(direction == "down"){
            $('nav').addClass('sticky');
        }else {
            $('nav').removeClass('sticky');
        }
  }, {
    offset: '60px'
    });
    
    
    
    
/*------------------------------------------------------------------STICKY (AUCTION)------------------------------------------------------------------------*/    
    $('.js--section-2008').waypoint(function(direction) {
        if(direction == "down"){
            $('nav').addClass('sticky');
        }else {
            $('nav').removeClass('sticky');
        }
  }, {
    offset: '60px'
    });
        
    
    
    
    
/*------------------------------------------------------------------STICKY (TEAM)------------------------------------------------------------------------*/    
    $('.js--section-logo').waypoint(function(direction) {
        if(direction == "down"){
            $('nav').addClass('sticky');
        }else {
            $('nav').removeClass('sticky');
        }
  }, {
    offset: '60px'
    });

    
    
    
/*------------------------------------------------------------------STICKY (VENUES)------------------------------------------------------------------------*/    
    $('.js--section-venue').waypoint(function(direction) {
        if(direction == "down"){
            $('nav').addClass('sticky');
        }else {
            $('nav').removeClass('sticky');
        }
  }, {
    offset: '60px'
    });    
    
    
        
    
/*---------------------------------------------------------------SCROLL BUTTONS-------------------------------------------------------------------------*/
    
    $('.js--scroll-to-more').click(function () {
       $('html, body').animate({scrollTop: $('.js--section-feautures').offset().top}, 1000); 
    });
    
    $('.js--scroll-to-ticket').click(function () {
       $('html, body').animate({scrollTop: $('.js--section-tickets').offset().top}, 1000); 
    });
    
    
    
    
    
    
/*--------------------------------------------------------------Navigation scroll----------------------------------------------------------------------- */
    $(function() {
      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    });
                
    
    
});
                  
