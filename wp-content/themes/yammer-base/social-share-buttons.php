<?php if($social_sharing != 'YES') { 
 // if (of_get_option('share-twitter') != "" && of_get_option('share-linkedin') != "" && of_get_option('share-facebook') != "") {
  ?>
  <div class="share-button-container">
    <?php if (of_get_option('share-twitter') != "") { ?>
      <a href="https://twitter.com/share/?url=<?php echo get_permalink(); ?>&via=yammer&text=<?php echo urlencode("I am learning about the Yammer Certification Programs."); ?>" class="yj-btn yj-btn-alt share-button"><img src='<?php echo of_get_option('share-twitter'); ?>' /> <span><?php _e('Tweet'); ?></span></a>
    <?php } ?>
    <?php if (of_get_option('share-linkedin') != "") { ?>
      <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php echo urlencode("Yammer Certifications"); ?>&summary=<?php echo urlencode("The Yammer Certified Professional Program transforms participants into experts in specific areas in order to strengthen their organization’s engagement with Yammer."); ?>&source=<?php echo urlencode("Yammer") ?>" class="yj-btn yj-btn-alt share-button"><img src='<?php echo of_get_option('share-linkedin'); ?>' /> <span><?php _e('Share'); ?></span></a>
    <?php } ?>   
     <?php if (of_get_option('share-facebook') != "") { ?>
      <a href="https://www.facebook.com/dialog/feed?app_id=365389213537061&link=<?php echo get_permalink(); ?>&name=Yammer%20Certifications&description=<?php echo urlencode("The Yammer Certified Professional Program transforms participants into experts in specific areas in order to strengthen their organization’s engagement with Yammer."); ?>&redirect_uri=<?php echo get_permalink(); ?>&picture=https://sites.staging.yammer.com/certifications/files/2012/08/cert_badge_admin.png&caption=<?php echo urlencode("Yammer Certification Programs"); ?>&display=popup" class="yj-btn yj-btn-alt share-button "><img src='<?php echo of_get_option('share-facebook'); ?>' /> <span><?php _e('Share'); ?></span></a>
    <?php } ?>
  </div>
  <?php
 // }
} ?>