jQuery(document).ready(function($){
  var ua = navigator.userAgent, isMobileWebkit = /WebKit/.test(ua) && /Mobile/.test(ua);

  if(isMobileWebkit){
    $(".block-animate").addClass('animated');
  }else{
    $(".block-animate").each(function(){
      var $this = $(this);
      var animate_class = $this.data('animate');
      $this.addClass('appear-animation');
      $this.appear(function(){
				setTimeout(function(){
					$this.addClass(animate_class);
					$this.addClass('animated');
				},300);
      },{
        accX: 0,
        accY: 0,
        one:false
      });
    });
  }
})
