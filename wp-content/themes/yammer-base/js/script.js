jQuery(document).ready(function (){

  jQuery('#back-to-top').on('click', function(e){
    jQuery('body,html').animate({
      scrollTop: 0
    }, 800);
    return false;
  });
  jQuery('.back-to-top').on('click', function(e){
    jQuery('body,html').animate({
      scrollTop: 0
    }, 800);
    return false;
  });
  /**
   * Module: Clickable
   * Description: Make an entire container clickable
   */
  jQuery('[data-module=clickable]').on('click', function (e) {
    var $target = jQuery(e.target)
    $parent = $target.closest('[data-module=clickable]')
        , url = $parent.attr('data-url');

    if (url && !$target.closest('a').length) {
      if(e.metaKey) {
        window.open(url);
      } else {
        window.location = url;
      }
    }
  });
  jQuery('[data-module=clickable]').hover(function(){
    jQuery(this).css('cursor', 'pointer');
  });


  jQuery("#sticky-nav .sub-menu").hover(function(){      
      jQuery(this).closest('li').css({'backgroundColor':'#fff', 'borderLeft':'1px solid #ccc', 'borderRight': '1px solid #ccc'});

    },
    function() {
      jQuery(this).closest('li').css({'borderLeft':'', 'borderRight': '', 'backgroundColor':''});
    }
  );

  /**
   * Module: Video
   * Description: Show video player popup
   */
  jQuery('body').on('click', 'a[data-module=video]', function (e) {
    e.preventDefault();
    var upgradeFlash = false;
    if(FlashDetect.installed){
      if (FlashDetect.major < 9) {
        upgradeFlash = true;
      }
    } else {
      upgradeFlash = true;
    }
    if (supports_h264_baseline_video() != false) {
      //upgradeFlash = false;
    }
    if (upgradeFlash) {
      var $target = jQuery(e.target)

      $parent = $target.length && $target.closest('[data-module=video]')
          , template = '<div class="video-modal reveal-modal">\
            <h3>Please install the latest version of flash.</h3>\
            <div class="grid8 flash-msg">\
              <p>\
              We recommend using at least Flash version 10.0.0\
              <br/><a href="http://get.adobe.com/flashplayer/" target="_blank"><img src="/wp-content/themes/roots/img/flash-msg_btn.png" /></a>\
            <ul>\
              <li>Save the Flash installer to your computer</li>\
              <li>Quit any and all web browsers you\'re running</li>\
              <li>Run the Flash installer</li>\
          </ul>\
            </p>\
          </div>\
            <a class="close-reveal-modal">&#215;</a>\
            <img src="/images/public-site-spacer.gif?ref=no-flash-video" width="0" height="0" class="yj-hide" />\
          </div>';

      var title, $video;

      // display title if defined
      title = $parent.attr('title') || '';
      // create video modal and show
      $video = jQuery(Mustache.to_html(template, { title: title }));
      jQuery(document.body).append($video); // attach to document
      $video.on('reveal:close', function () {
        $video.remove(); // remove video modal (this will stop the video if it's still playing)
      });
      $video.reveal(); // show popup

    } else {
      var $target = jQuery(e.target)
      $parent = $target.length && $target.closest('[data-module=video]')
          , url = $parent.length && $parent.attr('href')
          , template = '<div class="video-modal reveal-modal">\
            <iframe src="{{url}}?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=0" width="600" height="338" frameborder="0" \
              webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>\
           {{#title}}<h3>{{title}}</h3>{{/title}}\
           {{#videoDescription}}<p>{{videoDescription}}</p>{{/videoDescription}}\
           {{#cta}}<p><a href="/feature/my-feed/" class="yj-btn yj-btn-orange">Start the Tour</a> <a href="https://www.yammer.com" class="bold">Or go to Yammer <span class="arrow-right"></span> </a></p>{{/cta}}\
            <a class="close-reveal-modal">&#215;</a>\
          </div>';

      if (url) {
        //var track = jQuery('#yamalytics').attr('src');
       // if(track.indexOf('?') == -1)
        //  track = track+"?ref=video";
        //else
        //  track = track+"&ref=video";

        if(url.indexOf('player') < 0 && url.indexOf('vimeo.com') >= 0){
            url = url.replace('vimeo.com/', 'player.vimeo.com/video/');
            url = url.replace('www.', '');
        }
        if(url.indexOf('http') < 0) {
          url = 'http://' +url;
        }
        var title, ref_title, $video, description, cta;
        // display title if defined
        title = $parent.attr('title') || '';
        description = $parent.attr('description') || '';
        cta = $parent.attr('cta') || '';
        ref_title = ($parent.attr('title') ? $parent.attr('title').replace(' ','_') : '');
        // create video modal and show
        $video = jQuery(Mustache.to_html(template, { url: url, title: title, ref_title: ref_title, videoDescription: description, cta: cta}));
        jQuery(document.body).append($video); // attach to document
        $video.on('reveal:close', function () {
          $video.remove(); // remove video modal (this will stop the video if it's still playing)
        });
        $video.reveal(); // show popup
      }
    }
  });

  /**
   * Module: Inline Video
   * Description: Show video player inline
   */
  jQuery('body').on('click', 'a[data-module=inline-video]', function (e) {
    e.preventDefault();
    var $target = jQuery(e.target)
        , $parent = $target.length && $target.closest('[data-module=inline-video]')
        , $grandparent = $parent.length && $parent.closest('div')
        , url = $parent.length && $parent.attr('href')
        , theclass =  $parent.attr('data-attr')
        , template = '<iframe class="inline-video {{theclass}}" src="{{url}}?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1" width="650" height="376" frameborder="0" \webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
    if (url) {
      var track = jQuery('#yamalytics').attr('src');
      if(track.indexOf('?') == -1)
        track = track+"?ref=video";
      else
        track = track+"&ref=video";
      var title, ref_title, $video;
      // don't follow click
      e.preventDefault();
      // display title if defined
      title = $parent.attr('title') || '';
      ref_title = ($parent.attr('title') ? $parent.attr('title').replace(' ','_') : '');
      // create video modal and show
      $video = jQuery(Mustache.to_html(template, { url: url, title: title, ref_title: ref_title, track: track, theclass: theclass }));
      jQuery($grandparent).append($video); // attach to document
      jQuery($parent).remove();
    }
  });


  function supports_video() {
    return !!document.createElement('video').canPlayType;
  }
  function supports_h264_baseline_video() {
    if (!supports_video()) { return false; }
    var v = document.createElement("video");
    return v.canPlayType('video/mp4; codecs="avc1.42E01E, mp4a.40.2"');
  }
  //Remove extra <ul> in Wordpress top navigation
  jQuery('.search-header ul.menu ul.menu li').unwrap();
	//Add arrow next to active menu item.
  jQuery(".sidebar .menu li.active").css('position', 'relative');
  jQuery(".sidebar .menu li.active").append('<div class="arrow-left"></div><div class="arrow-left-top"></div>');

  jQuery('#sticky-nav .menu > li:not(:has(ul))').each(function(){
    jQuery(this).children('a').css('paddingBottom', '9px');
  });
    

  //Sticky Navigation after scrolling the page. Return to absolute when page returns to the top. 
  jQuery(window).scroll(function(){
    if(jQuery(window).scrollTop() > 81  ) { 
      jQuery("#sticky-nav").css({'position': 'fixed', 'top': '0', '-webkit-box-shadow':'0px 0px 6px 0px #BBB','-moz-box-shadow':'0px 0px 6px 0px #BBB', '-o-box-shadow':'0px 0px 6px 0px #BBB', 'box-shadow':'0px 0px 6px 0px #BBB'});     
      jQuery("#sticky-nav .menu:first-child:not(:has(.y-spittle))").prepend('<li class="y-spittle"></li>');
      jQuery("#sticky-nav .menu .y-spittle").html('<a href="'+home_url+'"><img src="/wp-content/themes/releases/img/spittle.png" border="0"></a>');      
      jQuery("#sticky-nav .menu .y-spittle").fadeIn('normal').css({'margin-right':'3.125%', '-webkit-transition':'margin 0.7s ease-out', '-moz-transition':'margin 0.7s ease-out'});
    } 
    else { 
      jQuery("#sticky-nav").css({'position': 'absolute', 'top': '', '-webkit-box-shadow':'', '-moz-box-shadow':'', '-o-box-shadow':'', 'box-shadow':''});   
      jQuery("#sticky-nav .menu .y-spittle").css({'margin-right':'0'});
      jQuery("#sticky-nav .menu .y-spittle").remove();   
    }  
  });


  jQuery(".share-button").click(function(event){   
    var url = jQuery(this).attr("href");
    var windowName = "Share";
    var left = (screen.availWidth - 600)/2;
    var top = (screen.availHeight - 400)/2;
    var windowSize = "width=600,height=400,scrollbars=yes,left="+left+",top="+top;    
    window.open(url, windowName, windowSize);
    event.preventDefault(); 
  });
 
});

