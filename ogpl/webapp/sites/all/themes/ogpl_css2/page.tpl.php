<?php
	global $base_url;
	if($base_url == "http://demodatacms.nic.in" || $base_url == "https://demodatacms.nic.in") { drupal_goto("user"); }
	  global $theme_key;
    $themes = list_themes();
    $theme_object = $themes[$theme_key];
    $site_var = variable_get('site_country','');
    $site_node = node_load($site_var);
	$theme_name=$theme_object->name;
	$access_denied = 0;	
	$admin_page_urls = variable_get('admin_pages_list', '');
    $flag_img=substr($site_node->field_website_header_image[0]['filepath'],strpos($site_node->field_website_header_image[0]['filepath'],"files/"));
 
    if(variable_get('file_downloads','') == 2) {		
		$site_img = $base_url."/system/".$flag_img;
	} else {
		$site_img = $base_url.'/'.$site_node->field_website_header_image[0]['filepath'];
	}

    $portal_url = $site_node->field_country_portal_url[0]['url'];
    $gov_name = $site_node->field_union_govt_name[0]['value'];
    if(in_array(drupal_get_path_alias($_GET['q']), explode("\r\n", $admin_page_urls)) && in_array('anonymous user', $user->roles)){
		$access_denied = 1;
		$head_title = "Access Denied";
	}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=8" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php global $base_url;?>
<title><?php print $head_title ?></title>
<?php print $head ?>
<?php print $styles ?>
<link href="<?php echo $base_url."/".path_to_theme();?>/high.css" rel="alternate stylesheet" type="text/css" media="screen" title="change" />
<?php print $scripts; ?>
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
</head>

<body class="contact">
	<span>
		<a class="skipnav" href="#mainNav">Skip to navigation</a>
		<a class="skipnav" href="#mainContent">Skip to main content</a>
	</span>
	<!--top panel start here -->
	<div id="topPanel">
		<div class="mid">
			<!--goi -->
            <div class="goi"><div class="gov"><a target="_blank" class="country-flag" title="<?php echo $gov_name; ?>" href="<?php echo $portal_url; ?>"><img style="float: left; width: auto; padding-right:7px;" src="<?php echo $site_img; ?>" alt="Country Flag" width="auto" height="20" /><?php echo $gov_name; ?></a></div><span class="ext"></span>&nbsp;</div>
			<!--goi -->
				
			<!--accessibility panel start here -->
			<div class="accessPan">
				<ul>
					<!--flags options -->
					<li>OTHER COUNTRY SITES</li>
                    <li class="flags">
						<?php print $header_flags; ?>
                    </li>
                    <!--flags options -->
					<li class="resize">
						<?php print $text_resize; ?>
					</li>
					<!--text resizing option -->
						
					<!--color contrast options -->
					<li class="contrast">
						<a href="javascript:void(0);" class="dark" onclick="chooseStyle('change', 60);"><img src="<?php echo $base_url."/".path_to_theme();?>/images/texthighContrast.gif" alt="High Contrast View"/></a>
						<a href="javascript:void(0);" class="light" onclick="chooseStyle('none', 60);"><img src="<?php echo $base_url."/".path_to_theme();?>/images/textNormal.gif" alt="Standard Contrast View"/></a>
					</li>
					<!--color contrast options -->
					<li class="feedback"><a href="<?php echo $base_url;?>/feedback" title="Feedback">Feedback</a></li>
					<li><a href="<?php echo $base_url;?>/rssfeeds" title="RSS Feeds" class="rss">RSS Feeds</a></li>
					<li class="share">
                    <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style ">
                            <a class="addthis_button_compact add-this-link" href="http://www.addthis.com/bookmark.php" title="Bookmark and Share">Share+</a>
                        </div>
                    <!-- AddThis Button END -->
					</li>
					<li><a href="<?php echo $base_url;?>/sitemap" title="Sitemap" class="sitemap">Sitemap</a></li>
					<?php 
					global $user;
					if ($user->uid) {
					echo "<li><a href='$base_url/logout'>Log out</a></li>";
					}
					?>
				</ul>
			</div>
			<!--accessibility panel end here -->
		</div>
	</div>
	<!--top panel end here -->
	<!--logo panel start here -->
	<div id="logoPanel">
		<div class="mid">
			<div class="left">
				<!--logo start here -->
				<div class="logoPan">
					<h1>
					<div class="logo">
					<?php
					// Prepare header
					$site_fields = array();
					if ($site_name) {
						$site_fields[] = check_plain($site_name);
					}
					if ($site_slogan) {
						$site_fields[] = check_plain($site_slogan);
					}
					$site_title = implode(' ', $site_fields);
					if ($site_fields) {
						$site_fields[0] = '<span>'. $site_fields[0] .'</span>';
					}
					$site_html = implode(' ', $site_fields);
					
					if ($logo || $site_title) {
						print '<a href="'. check_url($front_page) .'" title="'. $site_title .'">';
					if ($logo) {
						print '<img src="'. check_url($logo) .'" alt="'. $site_title .'" id="logo-image" />';
					}
					print '</a>';
					}
					?>
					</div>
					<!--logo end here -->
					
					</h1>
				</div>
				<!--logo start here -->
				
				<!--search form start here -->
				<div class="searchPan">
					<?php print $search_box; ?>
				</div>
				<!--search form end here -->
			</div>
		</div>
	</div>
	<!--logo panel end here -->
    <!--nav panel start here -->
	<div id="navPanel">
		<div class="mid">
			<?php print $banner_links;?>	
			<div class="spacer"></div>
		</div>
	</div>
	<!--nav panel end here -->    
	<!--body panel start here -->
	<div id="bodyPanel">
		<div id="outerContainer">
			<div class="mid">
				<!--content panel start here -->
				<div id="contentPanel">
					<div class="mainContent">
					<?php print $breadcrumb; ?>
					<?php
			if($access_denied == 1) {
				echo '<div class="mainHeading"><h1 class="page-title">'.t('Access denied').'</h1></div>';
					
			} else {
			?>
					
						<!--main heading start here -->
						<div class="mainHeading">
						<?php if ($title){ print '<h1'. ' class="page-title"' .'>'. $title .'</h1>';}?>
						</div>
						<!--main heading end here -->
                    				<?php } ?>

						<div class="contentArea mainContainer">
							<div class="top">
								<div class="mid"></div>
							</div>
							
							<!--content -->
							<div class="bottom <?php print " content-height";?>">
							<?php if ($metrics_menu){ print '<div class="metrics-menu">'. $metrics_menu .'<div class="page-title-border"></div></div>';} ?>
							<?php if ($show_messages && $messages): print '<div class="error-block">'. $messages .'</div>'; endif; ?>
							<?php
							if($access_denied == 1) {
								echo '<div class="access-denied-error">'.t('You are not authorized to access this page.').'</div>';
							}
							else{
							print $content; } ?>
							<?php
							if($node->type=='dataset')  {
							print '<div id="suggest-cp-block"><div style="text-align:center;margin-right:20px;" class="suggest-cp">';	  
							print '<div class="suggest-label">Didn`t find what you are looking for? Would like to inform/suggest?  <a href="'.$base_url.'/suggest_dataset?nid='.$node->nid.'" title="Click here to suggest dataset" >Suggest</a></div></div></div>';
							}
							?>
							</div>
							<!--content -->
							
							<!--bottom links start here -->
							<div class="contentArea bottomLink">
								<div class="mid"></div>
								<?php print $footer;?>
							</div>
							<!--bottom links end here -->
						</div>
						
						
					</div>
				</div>
				<!--content panel end here -->
			</div>
		</div>

		<!--footer start here -->
		<div id="footer">
			<div class="left">
					<?php print $footer_links;?>
				<p>Copyright &copy; 2011-2012 <a href="#">Government of India</a></p>
			</div>
			<a title="OPEN.GOV.CC" class="logo">OPEN.GOV.CC</a>
		</div>
		<!--footer end here -->
	</div>
	<!--body panel end here -->
	<script type="text/javascript">
	<!--//--><![CDATA[//><!--
	userAgentLowerCase = navigator.userAgent.toLowerCase();

	function resizeTextarea(t) {

	  if ( !t.initialRows ) t.initialRows = t.rows;
	  a = t.value.split('\n');
	  b=0;
	  for (x=0; x < a.length; x++) {
		if (a[x].length >= t.cols) b+= Math.floor(a[x].length / t.cols);
	  }
	  b += a.length;
	  if (userAgentLowerCase.indexOf('opera') != -1) b += 2;

	  if (b > t.rows || b < t.rows)
		t.rows = (b < t.initialRows ? t.initialRows : b);

	}

	$("#edit-recipients").attr('rows',3);
	$("#edit-recipients").keyup(function(){
			resizeTextarea(document.getElementById('edit-recipients'));

	});

	$("#edit-recipients").mouseout(function(){
				resizeTextarea(document.getElementById('edit-recipients'));

	});
	//--><!]]>
	</script>

</body>
<?php
print $closure;
?>
</html>