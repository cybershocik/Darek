<?php
$Image[]= $this->params->get( '!', "" );
$Slidetext[]= $this->params->get( '!', "" );
$Link[]= $this->params->get( '!', "" );
for ($j=1; $j<=6; $j++){
$Image[$j]      = $this->params->get ("Image".$j,"" );
$Slidetext[$j]    = $this->params->get ("Slidetext".$j , "" );
$Link[$j]       = $this->params->get ("Link".$j , "" );
}
$st_image1 = ''.$slideshow.'header1.jpg';
$st_image2 = ''.$slideshow.'header2.jpg';
$st_image3 = ''.$slideshow.'header1.jpg';
$st_image4 = ''.$slideshow.'header2.jpg';
$info1 = $this->params->get('Slidetext1');
$info2 = $this->params->get('Slidetext2');
$info3 = $this->params->get('Slidetext3');
$info4 = $this->params->get('Slidetext4');
$img1 = $this->params->get('Image1');
$img2 = $this->params->get('Image2');
$img3 = $this->params->get('Image3');
$img4 = $this->params->get('Image4');
?>
<?php if (($img1 == null) && ($img2 == null) && ($img3 == null) && ($img4 == null)) : ?>

<div id="wowslider-container1">
<div class="ws_images">
<ul>
<li>
<img src="<?php echo $st_image1; ?>" title="<?php echo $info1 ?>"/> 					   
</li>
<li>
<img src="<?php echo $st_image2; ?>" title="<?php echo $info2 ?>"/> 					   
</li>
<li>
<img src="<?php echo $st_image3; ?>" title="<?php echo $info3 ?>"/> 					   
</li>
<li>
<img src="<?php echo $st_image4; ?>" title="<?php echo $info4 ?>"/> 					   
</li>
</ul>
</div>
</div>
<div class="clear"></div>

<?php elseif (is_array($menuid) && is_object($menu) && isset($menu->getActive()->id) && in_array($menu->getActive()->id, $menuid, true)) : ?> 

<div id="wowslider-container1">
<div class="ws_images">
<ul>
<?php for ($i=1; $i<=6; $i++){ if ($Image[$i] != null) { ?>   															
<li>
<?php if ($Link[$i] == null) : ?>                                                 														
<img src="<?php echo $Image[$i] ?>" alt="" title="<?php echo $Slidetext[$i] ?>"/> 					   
<?php else: ?>	                                      																						
<a href="<?php echo $Link[$i] ?>"><img src="<?php echo $Image[$i] ?>" alt="" title="<?php echo $Slidetext[$i] ?>"/></a>	
<?php endif; ?>                                                                                        
</li>
<?php }};  ?>	                                          		   																
</ul>
</div>
</div>
<div class="clear"></div>


<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/slideshow/effects/wowslider.js"></script>
<?php if ($slideshow_effect == "basic_linear") : ?>	
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/slideshow/effects/b_linear/script.js"></script>
<?php endif; ?>
<script>
jQuery("#wowslider-container1").wowSlider
({
effect:"<?php echo $slideshow_effect ?>",
prev:"",
next:"",
duration:20*100,
delay:20*100,
width:960,
height:100,
autoPlay:<?php echo $autoPlay ?>,
playPause:<?php echo $playPause ?>,
stopOnHover:<?php echo $stopOnHover ?>,
bullets:true,
caption:true,
captionEffect:"slide",
controls:true,
onBeforeStep:0,
images:0
});
</script>

<?php else: ?> 
<?php endif; ?>