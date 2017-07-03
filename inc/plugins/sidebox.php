<?php
// Disallow direct access to this file for security reasons
if(!defined("IN_MYBB"))
{
	die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
}

$plugins->add_hook("index_start", "sidebox_start");
$plugins->add_hook("forumdisplay_start", "sidebox_start");
$plugins->add_hook("showthread_start", "sidebox_start");
$plugins->add_hook("portal_start", "sidebox_start");

function sidebox_info()
{
	return array(
		"name"			=> "Sidebox",
		"description"	=> "Display portal boxes on your forum",
		"website"		=> "https://mybb.com",
		"author"		=> "Dark Neo",
		"authorsite"	=> "https://soportemybb.es",
		"version"		=> "1.3",
		"compatibility" => "18*",
		"codename" 		=> "dnt_sidebox",
	);
}
function sidebox_activate()
{
	global $db;
	$sidebox_group = array(
		"name" => "sidebox",
		"title" => "Sidebox",
		"description" => "Display portal boxes on your forum",
		"isdefault" => 0,
	);
	$db->insert_query("settinggroups", $sidebox_group);
	$gid = $db->insert_id();
	$sidebox_setting_1 = array(
		"name"			=> "sidebox1",
		"title"			=> "Show on Index",
		"description"	=> "Show sideboxes on index.",
		"optionscode"	=> "yesno",
		"value"			=> 1,
		"disporder"		=> 2,
		"gid"			=> intval($gid),
	);
	$sidebox_setting_2 = array(
		"name"			=> "sidebox2",
		"title"			=> "Show on Forum display",
		"description"	=> "Show sideboxes on forumdisplay.",
		"optionscode"	=> "yesno",
		"value"			=> 1,
		"disporder"		=> 2,
		"gid"			=> intval($gid),
	);
	$sidebox_setting_3 = array(
		"name"			=> "sidebox3",
		"title"			=> "Show on Thread display",
		"description"	=> "Show sideboxes on showthread list.",
		"optionscode"	=> "yesno",
		"value"			=> 1,
		"disporder"		=> 3,
		"gid"			=> intval($gid),
	);
	$sidebox_setting_4 = array(
		"name"			=> "sidebox4",
		"title"			=> "Show on Left or right",
		"description"	=> "Where do you wanna show your sidebox, in left side or right side",
		"optionscode"	=> 'radio \n1=Left\n2=Right',
		"value"			=> 1,
		"disporder"		=> 4,
		"gid"			=> intval($gid),
	);
	$sidebox_setting_5 = array(
		"name"			=> "sb1",
		"title"			=> "Box 1",
		"description"	=> "Selec an item to show on sidebox 1 (Select None to not show this box)",
		"optionscode"	=> $db->escape_string('select
 = None
{$sbwelcome} = Welcome User Box
{$sbpms} = PM\'s Box
{$sbsearch} = Search Box
{$sbstats} = Board Stats
{$sbwhosonline} = Who\'s Online
{$sblatestthreads} = Latest threads
{$sbaddbox1} = Additional custom box 1
{$sbaddbox2} = Additional custom box 2'),
		"value"			=> '',
		"disporder"		=> 5,
		"gid"			=> intval($gid),
	);
	$sidebox_setting_6 = array(
		"name"			=> "sb2",
		"title"			=> "Box 2",
		"description"	=> "Selec an item to show on sidebox 2 (Select None to not show this box)",
		"optionscode"	=> $db->escape_string('select
 = None
{$sbwelcome} = Welcome User Box
{$sbpms} = PM\'s Box
{$sbsearch} = Search Box
{$sbstats} = Board Stats
{$sbwhosonline} = Who\'s Online
{$sblatestthreads} = Latest threads
{$sbaddbox1} = Additional custom box 1
{$sbaddbox2} = Additional custom box 2'),
		"value"			=> '',
		"disporder"		=> 6,
		"gid"			=> intval($gid),
	);
	$sidebox_setting_7 = array(
		"name"			=> "sb3",
		"title"			=> "Box 3",
		"description"	=> "Selec an item to show on sidebox 3 (Select None to not show this box)",
		"optionscode"	=> $db->escape_string('select
 = None
{$sbwelcome} = Welcome User Box
{$sbpms} = PM\'s Box
{$sbsearch} = Search Box
{$sbstats} = Board Stats
{$sbwhosonline} = Who\'s Online
{$sblatestthreads} = Latest threads
{$sbaddbox1} = Additional custom box 1
{$sbaddbox2} = Additional custom box 2'),
		"value"			=> '',
		"disporder"		=> 7,
		"gid"			=> intval($gid),
	);
	$sidebox_setting_8 = array(
		"name"			=> "sb4",
		"title"			=> "Box 4",
		"description"	=> "Selec an item to show on sidebox 4 (Select None to not show this box)",
		"optionscode"	=> $db->escape_string('select
 = None
{$sbwelcome} = Welcome User Box
{$sbpms} = PM\'s Box
{$sbsearch} = Search Box
{$sbstats} = Board Stats
{$sbwhosonline} = Who\'s Online
{$sblatestthreads} = Latest threads
{$sbaddbox1} = Additional custom box 1
{$sbaddbox2} = Additional custom box 2'),
		"value"			=> '',
		"disporder"		=> 8,
		"gid"			=> intval($gid),
	);
	$sidebox_setting_9 = array(
		"name"			=> "sb5",
		"title"			=> "Box 5",
		"description"	=> "Selec an item to show on sidebox 5 (Select None to not show this box)",
		"optionscode"	=> $db->escape_string('select
 = None
{$sbwelcome} = Welcome User Box
{$sbpms} = PM\'s Box
{$sbsearch} = Search Box
{$sbstats} = Board Stats
{$sbwhosonline} = Who\'s Online
{$sblatestthreads} = Latest threads
{$sbaddbox1} = Additional custom box 1
{$sbaddbox2} = Additional custom box 2'),
		"value"			=> '',
		"disporder"		=> 9,
		"gid"			=> intval($gid),
	);
	$sidebox_setting_10 = array(
		"name"			=> "sb6",
		"title"			=> "Box 6",
		"description"	=> "Selec an item to show on sidebox 6 (Select None to not show this box)",
		"optionscode"	=> $db->escape_string('select
 = None
{$sbwelcome} = Welcome User Box
{$sbpms} = PM\'s Box
{$sbsearch} = Search Box
{$sbstats} = Board Stats
{$sbwhosonline} = Who\'s Online
{$sblatestthreads} = Latest threads
{$sbaddbox1} = Additional custom box 1
{$sbaddbox2} = Additional custom box 2'),
		"value"			=> '',
		"disporder"		=> 10,
		"gid"			=> intval($gid),
	);
	$sidebox_setting_11 = array(
		"name"			=> "sb7",
		"title"			=> "Box 7",
		"description"	=> "Selec an item to show on sidebox 7 (Select None to not show this box)",
		"optionscode"	=> $db->escape_string('select
 = None
{$sbwelcome} = Welcome User Box
{$sbpms} = PM\'s Box
{$sbsearch} = Search Box
{$sbstats} = Board Stats
{$sbwhosonline} = Who\'s Online
{$sblatestthreads} = Latest threads
{$sbaddbox1} = Additional custom box 1
{$sbaddbox2} = Additional custom box 2'),
		"value"			=> '',
		"disporder"		=> 11,
		"gid"			=> intval($gid),
	);
	$sidebox_setting_12 = array(
		"name"			=> "sb8",
		"title"			=> "Box 8",
		"description"	=> "Selec an item to show on sidebox 8 (Select None to not show this box)",
		"optionscode"	=> $db->escape_string('select
 = None
{$sbwelcome} = Welcome User Box
{$sbpms} = PM\'s Box
{$sbsearch} = Search Box
{$sbstats} = Board Stats
{$sbwhosonline} = Who\'s Online
{$sblatestthreads} = Latest threads
{$sbaddbox1} = Additional custom box 1
{$sbaddbox2} = Additional custom box 2'),
		"value"			=> '',
		"disporder"		=> 12,
		"gid"			=> intval($gid),
	);

	$sidebox_setting_13 = array(
	"name"			=> "sbadd1",
	"title"			=> "Additional custom box 1",
	"description"	=> "Set your own customized code for sidebox 9 (Select None to not show this box)",
	"optionscode"	=> "textarea",
	"value"			=> $db->escape_string('<table border="0" cellspacing="1" cellpadding="4" class="tborder">
	<thead>
		<tr>
			<td class="thead">
				<strong>Box 1</strong>
			</td>
		</tr>
	</thead>
	<tbody id="sbadd1">
		<tr>
			<td class="trow1">
				<span>First box</span>
			</td>
		</tr>
	</tbody>
</table>
<br />'),
	"disporder"		=> 13,
	"gid"			=> intval($gid),
	);
	$sidebox_setting_14 = array(
	"name"			=> "sbadd2",
	"title"			=> "Additional custom box 2",
	"description"	=> "Set your own customized code for sidebox 10 (Select None to not show this box)",
	"optionscode"	=> "textarea",
	"value"			=> $db->escape_string('<table border="0" cellspacing="1" cellpadding="4" class="tborder">
	<thead>
		<tr>
			<td class="thead">
				<strong>Box 2</strong>
			</td>
		</tr>
	</thead>
	<tbody id="sbadd2">
		<tr>
			<td class="trow1">
				<span>Second box</span>
			</td>
		</tr>
	</tbody>
</table>
<br />'),
	"disporder"		=> 14,
	"gid"			=> intval($gid),
	);
	
	$sidebox_setting_15 = array(
		"name"			=> "sidebox5",
		"title"			=> "Replace portal boxes by custom ones",
		"description"	=> "Replace portal sideboxes with the plugin ones.",
		"optionscode"	=> "yesno",
		"value"			=> 1,
		"disporder"		=> 15,
		"gid"			=> intval($gid),
	);
	$sidebox_setting_16 = array(
		"name"			=> "sidebox6",
		"title"			=> "Width",
		"description"	=> "Width of sideboxes",
		"optionscode"	=> "text",
		"value"			=> 220,
		"disporder"		=> 16,
		"gid"			=> intval($gid),
	);
	$db->insert_query("settings", $sidebox_setting_1);
	$db->insert_query("settings", $sidebox_setting_2);
	$db->insert_query("settings", $sidebox_setting_3);
	$db->insert_query("settings", $sidebox_setting_4);
	$db->insert_query("settings", $sidebox_setting_5);
	$db->insert_query("settings", $sidebox_setting_6);
	$db->insert_query("settings", $sidebox_setting_7);
	$db->insert_query("settings", $sidebox_setting_8);
	$db->insert_query("settings", $sidebox_setting_9);
	$db->insert_query("settings", $sidebox_setting_10);
	$db->insert_query("settings", $sidebox_setting_11);
	$db->insert_query("settings", $sidebox_setting_12);
	$db->insert_query("settings", $sidebox_setting_13);
	$db->insert_query("settings", $sidebox_setting_14);
	$db->insert_query("settings", $sidebox_setting_15);
	$db->insert_query("settings", $sidebox_setting_16);
	rebuild_settings();
	//Agregando la hoja de estilos.
	$style_css = '.modal_avatar{.portal_sb{margin:auto}
.index_sb{padding: 0 20px}
.showthread_sb{40px 0px 0px 20px}.
.forumdisplay_sb{padding:46px 0px 0px 20px}
@media screen and (max-width: 450px){	
	.portal_sb,.index_sb,.showthread_sb,.forumdisplay_sb{display:none;}
}';

	$stylesheet = array(
		"name"			=> "sidebox.css",
		"tid"			=> 1,
		"attachedto"	=> 0,		
		"stylesheet"	=> $db->escape_string($style_css),
		"cachefile"		=> "sidebox.css",
		"lastmodified"	=> TIME_NOW
	);

	$sid = $db->insert_query("themestylesheets", $stylesheet);
	
	//Archivo requerido para cambios en estilos y plantillas.
	require_once MYBB_ADMIN_DIR.'/inc/functions_themes.php';
	cache_stylesheet($stylesheet['tid'], $stylesheet['cachefile'], $style_css);
	update_theme_stylesheet_list(1, false, true);
	
}

function sidebox_deactivate()
{
	global $db;
	$db->query("DELETE FROM ".TABLE_PREFIX."settinggroups WHERE name='sidebox'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='sidebox1'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='sidebox2'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='sidebox3'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='sidebox4'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='sidebox5'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='sidebox6'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='sb1'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='sb2'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='sb3'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='sb4'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='sb5'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='sb6'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='sb7'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='sb8'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='sbadd1'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='sbadd2'");
	rebuild_settings();

    //Eliminamos la hoja de estilo creada...
   	$db->delete_query('themestylesheets', "name='sidebox.css'");
	$query = $db->simple_select('themes', 'tid');
	while($theme = $db->fetch_array($query))
	{
		require_once MYBB_ADMIN_DIR.'inc/functions_themes.php';
		update_theme_stylesheet_list($theme['tid']);
	}	
}

function sidebox_start()
{
	global $mybb,$db,$lang,$templates,$cache,$sbwelcome,$sbpms,$sbsearch,$sbstats,$sbwhosonline,$sblatestthreads,$gobutton,$lastvisit,$sbaddbox1,$sbaddbox2;

	require_once MYBB_ROOT."inc/class_parser.php";
	$parser = new postParser;

	// Load global language phrases
	$lang->load("portal", false, true);
	
	//Variables to use	
	$lol1 = $mybb->settings['sb1'];
	$lol2 = $mybb->settings['sb2'];
	$lol3 = $mybb->settings['sb3'];
	$lol4 = $mybb->settings['sb4'];
	$lol5 = $mybb->settings['sb5'];
	$lol6 = $mybb->settings['sb6'];
	$lol7 = $mybb->settings['sb7'];
	$lol8 = $mybb->settings['sb8'];

	$lmao1= (int)$mybb->settings['sidebox6'];
	
	switch(THIS_SCRIPT)
	{
		case "portal.php" :	
			$sbextrastyle = "port_sb";
		break;
		case "index.php" :	
			$sbextrastyle = "index_sb";
		break;
		case "showthread.php" :	
			$sbextrastyle = "showthread_sb";
		break;
		case "forumdisplay.php" :	
			$sbextrastyle = "forumdisplay_sb";
		break;		
		default : $sbextrastyle = "global_sb";	
	}

	
	if(empty($lol1) && empty($lol2) && empty($lol3) && empty($lol4) && empty($lol5) && empty($lol6) && empty($lol7) && empty($lol8))
		$styletd = "max-width:".$lmao1."px;";
	else
		$styletd = "width:".$lmao1."px;";
		
	//Display boxes on index
	if($mybb->settings['sidebox1'] == 1)
	{
		if ($mybb->settings['sidebox4'] == 2)
		{
			$templates->cache['index'] = str_replace('{$header}', '{$header}<table width="100%" border="0"><tr><td width="auto" valign="top">',$templates->cache['index']);
			$templates->cache['index'] = str_replace('{$footer}','</td><td class="'.$sbextrastyle.'" style="'.$styletd.'" valign="top">'.$lol1."".$lol2."".$lol3."".$lol4."".$lol5."".$lol6."".$lol7."".$lol8.'</td></tr></table>{$footer}',$templates->cache['index']);
		}
		else 
		{
			$templates->cache['index'] = str_replace('{$header}', '{$header}<table width="100%"  border="0"><tr><td class="'.$sbextrastyle.'" style="'.$styletd.'" valign="top">'.$lol1."".$lol2."".$lol3."".$lol4."".$lol5."".$lol6."".$lol7."".$lol8.'</td><td width="auto" valign="top">',$templates->cache['index']);
			$templates->cache['index'] = str_replace('{$footer}','</td></tr></table>{$footer}',$templates->cache['index']);
		}
	}
	
	//Display boxes on forumdisplay
	if($mybb->settings['sidebox2'] == 1)
	{
		if ($mybb->settings['sidebox4'] == 2)
		{
			$templates->cache['forumdisplay'] = str_replace('{$header}','{$header}<table width="100%"  border="0"><tr><td width="auto" valign="top">',$templates->cache['forumdisplay']);
			$templates->cache['forumdisplay'] = str_replace('{$footer}','</td><td class="'.$sbextrastyle.'" style="'.$styletd.'" valign="top">'.$lol1."".$lol2."".$lol3."".$lol4."".$lol5."".$lol6."".$lol7."".$lol8.'</td></tr></table>{$footer}',$templates->cache['forumdisplay']);
		}
		else
		{
			$templates->cache['forumdisplay'] = str_replace('{$header}','{$header}<table width="100%"  border="0"><tr><td class="'.$sbextrastyle.'" style="'.$styletd.'" valign="top">'.$lol1."".$lol2."".$lol3."".$lol4."".$lol5."".$lol6."".$lol7."".$lol8.'</td><td width="auto" valign="top">',$templates->cache['forumdisplay']);
			$templates->cache['forumdisplay'] = str_replace('{$footer}','</td></tr></table>{$footer}',$templates->cache['forumdisplay']);
		}
	}
	//Display boxes on showthread
	if($mybb->settings['sidebox3'] == 1)
	{
		if ($mybb->settings['sidebox4'] == 2)
		{
			$templates->cache['showthread'] = str_replace('{$header}','	{$header}<table width="100%"  border="0"><tr><td width="auto" valign="top">',$templates->cache['showthread']);
			$templates->cache['showthread'] = str_replace('{$footer}','</td><td class="'.$sbextrastyle.'" style="'.$styletd.'" valign="top">'.$lol1."".$lol2."".$lol3."".$lol4."".$lol5."".$lol6."".$lol7."".$lol8.'</td></tr></table>{$footer}',$templates->cache['showthread']);
		}
		else
		{
			$templates->cache['showthread'] = str_replace('{$header}','	{$header}<table width="100%"  border="0"><tr><td class="'.$sbextrastyle.'" style="'.$styletd.'" valign="top">'.$lol1."".$lol2."".$lol3."".$lol4."".$lol5."".$lol6."".$lol7."".$lol8.'</td></td><td width="auto" valign="top">',$templates->cache['showthread']);
			$templates->cache['showthread'] = str_replace('{$footer}','</td></tr></table>{$footer}',$templates->cache['showthread']);
		}
	}
	
	//Display additional boxes on portal
	if($mybb->settings['sidebox5'] == 1)
	{
		$templates->cache['portal'] = str_replace('{$welcome}','',$templates->cache['portal']);
		$templates->cache['portal'] = str_replace('{$search}','',$templates->cache['portal']);
		$templates->cache['portal'] = str_replace('{$pms}','',$templates->cache['portal']);
		$templates->cache['portal'] = str_replace('{$stats}','',$templates->cache['portal']);
		$templates->cache['portal'] = str_replace('{$whosonline}','',$templates->cache['portal']);
		$templates->cache['portal'] = str_replace('{$latestthreads}',''.$lol1."".$lol2."".$lol3."".$lol4."".$lol5."".$lol6."".$lol7."".$lol8.'',$templates->cache['portal']);
		$templates->cache['portal'] = str_replace('<td valign="top" width="200">','<td class="'.$sbextrastyle.'" style="'.$styletd.'" valign="top">',$templates->cache['portal']);			
	}
	//$sbwelcome = $sbpms = $sbsearch = $sbstats = $sbwhosonline = $sblatestthreads = "Cajas"; 
	//Generate additional boxes
	eval("\$sbaddbox1 = \"".$db->escape_string($mybb->settings['sbadd1'])."\";");
	eval("\$sbaddbox2 = \"".$db->escape_string($mybb->settings['sbadd2'])."\";");	
	
	
	//Below are codes from portal.php MyBB version: 1.8.12
	// get forums user cannot view
	$tunviewwhere = $unviewwhere = '';
	// get forums user cannot view
	$unviewable = get_unviewable_forums(true);
	if($unviewable)
	{
		$unviewwhere = " AND fid NOT IN ($unviewable)";
		$tunviewwhere = " AND t.fid NOT IN ($unviewable)";
	}

	// get inactive forums
	$inactive = get_inactive_forums();
	if($inactive)
	{
		$unviewwhere .= " AND fid NOT IN ($inactive)";
		$tunviewwhere .= " AND t.fid NOT IN ($inactive)";
	}

	$mybb->user['username'] = htmlspecialchars_uni($mybb->user['username']);

	$sbwelcome = '';
	// If user is known, welcome them
	if($mybb->settings['portal_showwelcome'] != 0)
	{
		if($mybb->user['uid'] != 0)
		{
			// Get number of new posts, threads, announcements
			$query = $db->simple_select("posts", "COUNT(pid) AS newposts", "visible=1 AND dateline>'".$mybb->user['lastvisit']."'{$unviewwhere}");
			$newposts = $db->fetch_field($query, "newposts");
			if($newposts)
			{
				// If there aren't any new posts, there is no point in wasting two more queries
				$query = $db->simple_select("threads", "COUNT(tid) AS newthreads", "visible=1 AND dateline>'".$mybb->user['lastvisit']."'{$unviewwhere}");
				$newthreads = $db->fetch_field($query, "newthreads");

				$newann = 0;
				if(!empty($mybb->settings['portal_announcementsfid']))
				{
					$annfidswhere = '';
					if($mybb->settings['portal_announcementsfid'] != -1)
					{
						$announcementsfids = explode(',', (string)$mybb->settings['portal_announcementsfid']);
						if(is_array($announcementsfids))
						{
							foreach($announcementsfids as &$fid)
							{
								$fid = (int)$fid;
							}
							unset($fid);

							$announcementsfids = implode(',', $announcementsfids);

							$annfidswhere = " AND fid IN (".$announcementsfids.")";
						}
					}

					$query = $db->simple_select("threads", "COUNT(tid) AS newann", "visible=1 AND dateline>'".$mybb->user['lastvisit']."'{$annfidswhere}{$unviewwhere}");
					$newann = $db->fetch_field($query, "newann");
				}
			}
			else
			{
				$newposts = 0;
				$newthreads = 0;
				$newann = 0;
			}

			// Make the text
			if($newann == 1)
			{
				$lang->new_announcements = $lang->new_announcement;
			}
			else
			{
				$lang->new_announcements = $lang->sprintf($lang->new_announcements, $newann);
			}
			if($newthreads == 1)
			{
				$lang->new_threads = $lang->new_thread;
			}
			else
			{
				$lang->new_threads = $lang->sprintf($lang->new_threads, $newthreads);
			}
			if($newposts == 1)
			{
				$lang->new_posts = $lang->new_post;
			}
			else
			{
				$lang->new_posts = $lang->sprintf($lang->new_posts, $newposts);
			}
			eval("\$welcometext = \"".$templates->get("portal_welcome_membertext")."\";");

		}
		else
		{
			$lang->guest_welcome_registration = $lang->sprintf($lang->guest_welcome_registration, $mybb->settings['bburl'].'/member.php?action=register');
			$mybb->user['username'] = $lang->guest;
			switch($mybb->settings['username_method'])
			{
				case 0:
					$username = $lang->username;
					break;
				case 1:
					$username = $lang->username1;
					break;
				case 2:
					$username = $lang->username2;
					break;
				default:
					$username = $lang->username;
					break;
			}
			eval("\$welcometext = \"".$templates->get("portal_welcome_guesttext")."\";");
		}
		$lang->welcome = $lang->sprintf($lang->welcome, $mybb->user['username']);
		eval("\$sbwelcome = \"".$templates->get("portal_welcome")."\";");
	}

	$sbpms = '';
	// Private messages box
	if($mybb->settings['portal_showpms'] != 0)
	{
		if($mybb->user['uid'] != 0 && $mybb->user['receivepms'] != 0 && $mybb->usergroup['canusepms'] != 0 && $mybb->settings['enablepms'] != 0)
		{
			$messages['pms_total'] = $mybb->user['pms_total'];
			$messages['pms_unread'] = $mybb->user['pms_unread'];

			$lang->pms_received_new = $lang->sprintf($lang->pms_received_new, $mybb->user['username'], $messages['pms_unread']);
			eval("\$sbpms = \"".$templates->get("portal_pms")."\";");
		}
	}

	$sbstats = '';
	// Get Forum Statistics
	if($mybb->settings['portal_showstats'] != 0)
	{
		$stats = $cache->read("stats");
		$stats['numthreads'] = my_number_format($stats['numthreads']);
		$stats['numposts'] = my_number_format($stats['numposts']);
		$stats['numusers'] = my_number_format($stats['numusers']);
		if(!$stats['lastusername'])
		{
			eval("\$newestmember = \"".$templates->get("portal_stats_nobody")."\";");
		}
		else
		{
			$newestmember = build_profile_link($stats['lastusername'], $stats['lastuid']);
		}
		eval("\$sbstats = \"".$templates->get("portal_stats")."\";");
	}

	$sbsearch = '';
	// Search box
	if($mybb->settings['portal_showsearch'] != 0)
	{
		eval("\$sbsearch = \"".$templates->get("portal_search")."\";");
	}

	$sbwhosonline = '';
	// Get the online users
	if($mybb->settings['portal_showwol'] != 0 && $mybb->usergroup['canviewonline'] != 0)
	{
		if($mybb->settings['wolorder'] == 'username')
		{
			$order_by = 'u.username ASC';
			$order_by2 = 's.time DESC';
		}
		else
		{
			$order_by = 's.time DESC';
			$order_by2 = 'u.username ASC';
		}

		$timesearch = TIME_NOW - $mybb->settings['wolcutoff'];
		$comma = '';
		$guestcount = $membercount = $botcount = $anoncount = 0;
		$onlinemembers = '';
		$doneusers = array();
		$query = $db->query("
			SELECT s.sid, s.ip, s.uid, s.time, s.location, u.username, u.invisible, u.usergroup, u.displaygroup
			FROM ".TABLE_PREFIX."sessions s
			LEFT JOIN ".TABLE_PREFIX."users u ON (s.uid=u.uid)
			WHERE s.time>'$timesearch'
			ORDER BY {$order_by}, {$order_by2}
		");
		while($user = $db->fetch_array($query))
		{

			// Create a key to test if this user is a search bot.
			$botkey = my_strtolower(str_replace("bot=", '', $user['sid']));

			if($user['uid'] == "0")
			{
				++$guestcount;
			}
			elseif(my_strpos($user['sid'], "bot=") !== false && $session->bots[$botkey])
			{
				// The user is a search bot.
				$onlinemembers .= $comma.format_name($session->bots[$botkey], $session->botgroup);
				$comma = $lang->comma;
				++$botcount;
			}
			else
			{
				if(empty($doneusers[$user['uid']]) || $doneusers[$user['uid']] < $user['time'])
				{
					++$membercount;

					$doneusers[$user['uid']] = $user['time'];

					// If the user is logged in anonymously, update the count for that.
					if($user['invisible'] == 1)
					{
						++$anoncount;
					}

					if($user['invisible'] == 1)
					{
						$invisiblemark = "*";
					}
					else
					{
						$invisiblemark = '';
					}

					if(($user['invisible'] == 1 && ($mybb->usergroup['canviewwolinvis'] == 1 || $user['uid'] == $mybb->user['uid'])) || $user['invisible'] != 1)
					{
						$user['username'] = format_name(htmlspecialchars_uni($user['username']), $user['usergroup'], $user['displaygroup']);
						$user['profilelink'] = get_profile_link($user['uid']);
						eval("\$onlinemembers .= \"".$templates->get("portal_whosonline_memberbit", 1, 0)."\";");
						$comma = $lang->comma;
					}
				}
			}
		}

		$onlinecount = $membercount + $guestcount + $botcount;

		// If we can see invisible users add them to the count
		if($mybb->usergroup['canviewwolinvis'] == 1)
		{
			$onlinecount += $anoncount;
		}

		// If we can't see invisible users but the user is an invisible user incriment the count by one
		if($mybb->usergroup['canviewwolinvis'] != 1 && isset($mybb->user['invisible']) && $mybb->user['invisible'] == 1)
		{
			++$onlinecount;
		}

		// Most users online
		$mostonline = $cache->read("mostonline");
		if($onlinecount > $mostonline['numusers'])
		{
			$time = TIME_NOW;
			$mostonline['numusers'] = $onlinecount;
			$mostonline['time'] = $time;
			$cache->update("mostonline", $mostonline);
		}
		$recordcount = $mostonline['numusers'];
		$recorddate = my_date('relative', $mostonline['time']);

		if($onlinecount == 1)
		{
		  $lang->online_users = $lang->online_user;
		}
		else
		{
		  $lang->online_users = $lang->sprintf($lang->online_users, $onlinecount);
		}
		$lang->online_counts = $lang->sprintf($lang->online_counts, $membercount, $guestcount);
		eval("\$sbwhosonline = \"".$templates->get("portal_whosonline")."\";");
	}

	$sblatestthreads = '';
	// Latest forum discussions
	if($mybb->settings['portal_showdiscussions'] != 0 && $mybb->settings['portal_showdiscussionsnum'] && $mybb->settings['portal_excludediscussion'] != -1)
	{
		$altbg = alt_trow();
		$threadlist = '';

		$excludeforums = '';
		if(!empty($mybb->settings['portal_excludediscussion']))
		{
			$excludeforums = "AND t.fid NOT IN ({$mybb->settings['portal_excludediscussion']})";
		}

		$query = $db->query("
			SELECT t.tid, t.fid, t.uid, t.lastpost, t.lastposteruid, t.lastposter, t.subject, t.replies, t.views, u.username
			FROM ".TABLE_PREFIX."threads t
			LEFT JOIN ".TABLE_PREFIX."users u ON (u.uid=t.uid)
			WHERE 1=1 {$excludeforums}{$tunviewwhere} AND t.visible='1' AND t.closed NOT LIKE 'moved|%'
			ORDER BY t.lastpost DESC
			LIMIT 0, ".$mybb->settings['portal_showdiscussionsnum']
		);
		while($thread = $db->fetch_array($query))
		{
			$forumpermissions[$thread['fid']] = forum_permissions($thread['fid']);

			// Make sure we can view this thread
			if(isset($forumpermissions[$thread['fid']]['canonlyviewownthreads']) && $forumpermissions[$thread['fid']]['canonlyviewownthreads'] == 1 && $thread['uid'] != $mybb->user['uid'])
			{
				continue;
			}

			$lastpostdate = my_date('relative', $thread['lastpost']);
			$lastposter = htmlspecialchars_uni($thread['lastposter']);
			$thread['replies'] = my_number_format($thread['replies']);
			$thread['views'] = my_number_format($thread['views']);

			// Don't link to guest's profiles (they have no profile).
			if($thread['lastposteruid'] == 0)
			{				
				$lastposterlink = $lastposter;
			}
			else
			{
				$lastposterlink = build_profile_link($lastposter, $thread['lastposteruid']);
			}

			$thread['subject'] = $thread['fullsubject'] = $parser->parse_badwords($thread['subject']);
			if(my_strlen($thread['subject']) > 25)
			{
				$thread['subject'] = my_substr($thread['subject'], 0, 25) . "...";
			}
			$thread['subject'] = htmlspecialchars_uni($thread['subject']);
			$thread['fullsubject'] = htmlspecialchars_uni($thread['fullsubject']);

			$thread['threadlink'] = get_thread_link($thread['tid']);
			$thread['lastpostlink'] = get_thread_link($thread['tid'], 0, "lastpost");
			$thread['forumlink'] = get_forum_link($thread['fid']);
			$thread['forumname'] = $forum_cache[$thread['fid']]['name'];
			eval("\$threadlist .= \"".$templates->get("portal_latestthreads_thread")."\";");
			$altbg = alt_trow();
		}
		if($threadlist)
		{
			// Show the table only if there are threads
			eval("\$sblatestthreads = \"".$templates->get("portal_latestthreads")."\";");
		}
	}
	// End of codes taken from portal...
}
?>
