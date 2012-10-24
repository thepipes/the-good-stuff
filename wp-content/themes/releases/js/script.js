jQuery(document).ready(function (){

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
           {{#cta}}<p><a href="/feature/new-homepage/" class="yj-btn yj-btn-orange">Start the Tour</a> <a href="https://www.yammer.com" class="bold">Or go to Yammer <span class="arrow-right"></span> </a></p>{{/cta}}\
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

  var titleContainer = jQuery("#feature-title");
  var positioning = titleContainer.height()/2;
  titleContainer.css({top:'50%', marginTop:-positioning});

  jQuery('ul.menu ul.menu li').unwrap();
  jQuery(".menu li.active").css('position', 'relative');
  jQuery(".menu li.active").append('<div class="arrow-left"></div><div class="arrow-left-top"></div>');
});

//Use window.load to ensure the image size can be obtained after it loaded.

jQuery(window).load(function(){


  jQuery(".feature-description-container .row .grid4 img").each(function(){
    var imgSize = jQuery(this).height();

    var closest = jQuery(this).closest(".row");
    var textSize= closest.find(".grid4 .feature-item").height();
    if(textSize > imgSize && imgSize !=0){

      jQuery(closest).height(textSize);
      closest.find(".grid4 .feature-item").css({marginTop:'0px', top:'0'});
      jQuery(this).css({marginTop:(textSize/2 - imgSize/2)});
    }
    else {

      jQuery(closest).height(imgSize);
      var height = textSize / 2;
      closest.find(".grid4 .feature-item").css({marginTop: -height, top:'50%'});
    }
  });
});