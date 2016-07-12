<div class="file-types">
    <?php if(has_tag('sketch3') && has_tag('plugin')) {?>
      <div class="tooltips file-sqr  sk" data-toggle="tooltip" data-placement="top" title="Sketch3">sk</div>
      <div class="tooltips file-sqr  sk plugin" data-toggle="tooltip" data-placement="top" title="Plug-In"><i class="fa fa-plug" aria-hidden="true"></i></div>
    <?php } else if(has_tag('sketch3')) {?>
      <div class="tooltips file-sqr  sk" data-toggle="tooltip" data-placement="top" title="Sketch3">sk</div>
    <?php } if(has_tag('apple')) {?>
    <div class="tooltips file-sqr  apple" data-toggle="tooltip" data-placement="top" title="Apple Product"><i class="fa fa-apple" aria-hidden="true"></i></div>
    <?php } if(has_tag('google')) {?>
    <div class="tooltips file-sqr  google" data-toggle="tooltip" data-placement="top" title="Google"><i class="fa fa-google" aria-hidden="true"></i></div>
    <?php } if(has_tag('code')) {?>
    <div class="tooltips file-sqr  code" data-toggle="tooltip" data-placement="top" title="Code Sample"><i class="fa fa-code" aria-hidden="true"></i></div>
    <?php } if(has_tag('landing-page')) {?>
    <div class="tooltips file-sqr  lp" data-toggle="tooltip" data-placement="top" title="Landing Page">L</div>
    <?php } if(has_tag('email')) {?>
    <div class="tooltips file-sqr  email" data-toggle="tooltip" data-placement="top" title="Email"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
    <?php }if(has_tag('android')) {?>
    <div class="tooltips file-sqr  android" data-toggle="tooltip" data-placement="top" title="Android"><i class="fa fa-android" aria-hidden="true"></i></div>
    <?php } if(has_tag('photoshop')) {?>
      <div class="tooltips file-sqr  ps" data-toggle="tooltip" data-placement="top" title="PhotoShop">ps</div>
    <?php } if(has_tag('indesign')) {?>
      <div class="tooltips file-sqr  id" data-toggle="tooltip" data-placement="top" title="InDesign">id</div>
    <?php } if(has_tag('illustrator')) {?>
      <div class="tooltips file-sqr  ai" data-toggle="tooltip" data-placement="top" title="Illustrator">ai</div>
    <?php } if(has_tag('wordpress') && has_tag('plugin')) {?>
      <div class="tooltips file-sqr  wp" data-toggle="tooltip" data-placement="top" title="WordPress">W</div>
      <div class="tooltips file-sqr  wp plugin" data-toggle="tooltip" data-placement="top" title="Plug-In"><i class="fa fa-plug" aria-hidden="true"></i></div>
    <?php } else if(has_tag('wordpress')) {?>
      <div class="tooltips file-sqr  wp" data-toggle="tooltip" data-placement="top" title="WordPress">W</div>
    <?php }if(has_tag('bootstrap')) {?>
      <div class="tooltips file-sqr  bootstrap" data-toggle="tooltip" data-placement="top" title="Bootstrap">B</div>
    <?php } if(has_tag('powerpoint')) {?>
      <div class="tooltips file-sqr  powerpoint" data-toggle="tooltip" data-placement="top" title="PowerPoint">P</div>
    <?php } if(has_tag('word')) {?>
      <div class="tooltips file-sqr  word" data-toggle="tooltip" data-placement="top" title="Word">W</div>
    <?php } if(has_tag('excel')) {?>
      <div class="tooltips file-sqr  excel" data-toggle="tooltip" data-placement="top" title="Excel">E</div>
    <?php } if(has_tag('video')) {?>
      <div class="tooltips file-sqr  video" data-toggle="tooltip" data-placement="top" title="Video"><i class="fa fa-video-camera" aria-hidden="true"></i></div>
    <?php } if(has_tag('deal')) {?>
      <div class="tooltips file-sqr  deal" data-toggle="tooltip" data-placement="top" title="Deal"><i class="fa fa-ticket" aria-hidden="true"></i></div>
    <?php } if(has_tag('mobile') && has_tag('tablet') && has_tag('desktop')) { ?>
      <div class="tooltips file-sqr  device" data-toggle="tooltip" data-placement="top" title="Responsive"><i class="fa fa-expand" aria-hidden="true"></i></div>
    <?php }else{
        if(has_tag('watch')) { ?>
          <div class="tooltips file-sqr  device" data-toggle="tooltip" data-placement="top" title="Watch"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
        <?php }if(has_tag('mobile')) { ?>
          <div class="tooltips file-sqr  device" data-toggle="tooltip" data-placement="top" title="Mobile"><i class="fa fa-mobile" aria-hidden="true"></i></div>
        <?php } if(has_tag('tablet')) { ?>
          <div class="tooltips file-sqr  device" data-toggle="tooltip" data-placement="top" title="Tablet"><i class="fa fa-tablet" aria-hidden="true"></i></div>
        <?php } if(has_tag('desktop')) { ?>
          <div class="tooltips file-sqr  device" data-toggle="tooltip" data-placement="top" title="Desktop"><i class="fa fa-desktop" aria-hidden="true"></i></div>
        <?php } } ?>
     <?php if(has_tag('element')) { ?>
       <div class="tooltips file-sqr  element" data-toggle="tooltip" data-placement="top" title="Element"><i class="fa fa-square" aria-hidden="true"></i></div>
     <?php } if(has_tag('visual-composer')) { ?>
       <div class="tooltips file-sqr  vc" data-toggle="tooltip" data-placement="top" title="Visual Composer">V</div>
     <?php }if(has_tag('free')) { ?>
        <div class="tooltips file-sqr  free" data-toggle="tooltip" data-placement="top" title="Free">$</div>
      <?php } ?>
</div>
