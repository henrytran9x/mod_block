jQuery(document).ready(function($){
  var ua = navigator.userAgent, isMobileWebkit = /WebKit/.test(ua) && /Mobile/.test(ua);
	if(!isMobileWebkit){
    $(window).stellar({
      responsive:true,
      scrollProperty: 'scroll',
      positionProperty: 'transform',
      parallaxElements: false,
      horizontalScrolling: false,
      horizontalOffset: 0,
      verticalOffset: 0
    });
  }
});