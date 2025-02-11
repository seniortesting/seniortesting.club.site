<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {

	// Change this to use your theme slug
	return 'DUX';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_framework_theme'),
		'two' => __('Two', 'options_framework_theme'),
		'three' => __('Three', 'options_framework_theme'),
		'four' => __('Four', 'options_framework_theme'),
		'five' => __('Five', 'options_framework_theme')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_framework_theme'),
		'two' => __('Pancake', 'options_framework_theme'),
		'three' => __('Omelette', 'options_framework_theme'),
		'four' => __('Crepe', 'options_framework_theme'),
		'five' => __('Waffle', 'options_framework_theme')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);


	$multicheck_nums = array(
		'1' => '1',
		'2' => '2',
		'3' => '3',
		'4' => '4',
		'5' => '5'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	// $options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	$options_linkcats = array();
	$options_linkcats_obj = get_terms('link_category');
	foreach ( $options_linkcats_obj as $tag ) {
		$options_linkcats[$tag->term_id] = $tag->name;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/img/';
	$qrcode =  get_template_directory_uri() . '/img/qrcode.png';
	$adsdesc =  __('可添加任意广告联盟代码或自定义代码', 'haoui');

	$options = array();

	
	$options[] = array(
		'name' => __('基本', 'haoui'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Logo', 'haoui'),
		'id' => 'logo_src',
		'desc' => __('Logo不会做？去themebetter提交工单求助！Logo 最大高：32px；建议尺寸：140*32px 格式：png', 'haoui'),
		'std' => $imagepath . 'logo.png',
		'type' => 'upload');

	$options[] = array(
		'name' => __('布局', 'haoui').' (v5.1+)',
		'id' => 'layout',
		'std' => "2",
		'type' => "radio",
		'desc' => __("2种布局供选择，点击选择你喜欢的布局方式，保存后前端展示会有所改变。", 'haoui'),
		'options' => array(
			'3' => __('两栏，侧边栏在左', 'haoui'),
			'2' => __('两栏，侧边栏在右', 'haoui'),
			'1' => __('单栏，无侧边栏', 'haoui')
		));

	$options[] = array(
		'name' => __("主题风格", 'haoui'),
		'desc' => __("14种颜色供选择，点击选择你喜欢的颜色，保存后前端展示会有所改变。", 'haoui'),
		'id' => "theme_skin",
		'std' => "45B6F7",
		'type' => "colorradio",
		'options' => array(
			'45B6F7' => 100,
			'FF5E52' => 1,
			'2CDB87' => 2,
			'00D6AC' => 3,
			'16C0F8' => 4,
			'EA84FF' => 5,
			'FDAC5F' => 6,
			'FD77B2' => 7,
			'76BDFF' => 8,
			'C38CFF' => 9,
			'FF926F' => 10,
			'8AC78F' => 11,
			'C7C183' => 12,
			'555555' => 13
		)
	);

	$options[] = array(
		'id' => 'theme_skin_custom',
		'std' => "",
		'desc' => __('不喜欢上面提供的颜色，你好可以在这里自定义设置，如果不用自定义颜色清空即可（默认不用自定义）', 'haoui'),
		'type' => "color");


	$options[] = array(
		'name' => __('全站评论整体关闭', 'haoui').' (v5.4+)',
		'id' => 'kill_comment_s',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui'));


	$options[] = array(
		'name' => __('上传文件重命名', 'haoui').' (v5.1+)',
		'id' => 'newfilename',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => __('文章内容、列表描述和侧边栏文章标题两端对齐', 'haoui').' (v5.1+)',
		'id' => 'text_justify_s',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('开启', 'haoui'));

	

	$options[] = array(
		'name' => __('网页最大宽度', 'haoui'),
		'id' => 'site_width',
		'std' => 1200,
		'class' => 'mini',
		'desc' => __('默认：1200，单位：px（像素）', 'haoui'),
		'type' => 'text');

	$options[] = array(
		'name' => __('底部友情链接', 'haoui').' (v1.5+)',
		'id' => 'flinks_s',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui').__('（开启后会在页面底部增加一个链接模块）', 'haoui'));

	$options[] = array(
		'id' => 'flinks_home_s',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('只在首页开启', 'haoui'));

	$options[] = array(
		'id' => 'flinks_m_s',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('在手机端显示，不勾选则不在手机端显示', 'haoui'));

	$options[] = array(
		'id' => 'flinks_cat',
		'options' => $options_linkcats,
		'desc' => __('选择一个底部友情链接的链接分类', 'haoui'),
		'type' => 'select');


	$options[] = array(
		'name' => __('jQuery底部加载', 'haoui'),
		'id' => 'jquery_bom',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui').__('（可提高页面内容加载速度，但部分依赖jQuery的插件可能失效）', 'haoui'));


	$options[] = array(
		'name' => __('头像获取', 'haoui'),
		'id' => 'gravatar_url',
		'std' => "ssl",
		'type' => "radio",
		'options' => array(
			'no' => __('原有方式', 'haoui'),
			'ssl' => __('从Gravatar官方ssl获取', 'haoui'),
			'v2ex' => __('从v2ex获取', 'haoui'),
		));


	$options[] = array(
		'name' => __('JS文件托管（可大幅提速JS加载）', 'haoui'),
		'id' => 'js_outlink',
		'std' => "no",
		'type' => "radio",
		'options' => array(
			'no' => __('不托管', 'haoui'),
			'baidu' => __('百度', 'haoui'),
			'he' => __('框架来源站点（分别引入jquery和bootstrap官方站点JS文件）', 'haoui')
		));

	$options[] = array(
		'name' => __('网站整体变灰', 'haoui'),
		'id' => 'site_gray',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui').__('（支持IE、Chrome，基本上覆盖了大部分用户，不会降低访问速度）', 'haoui'));

	

	$options[] = array(
		'name' => __('品牌文字', 'haoui'),
		'id' => 'brand',
		'std' => "欢迎光临\n我们一直在努力",
		'desc' => __('显示在Logo旁边的两个短文字，请换行填写两句文字（短文字介绍）', 'haoui'),
		'settings' => array(
			'rows' => 2
		),
		'type' => 'textarea');

	

	$options[] = array(
		'name' => __('网站底部信息', 'haoui'),
		'id' => 'footer_seo',
		'std' => '<a href="'.site_url('/sitemap.xml').'">'.__('网站地图', 'haoui').'</a>'."\n",
		'desc' => __('备案号可写于此，网站地图可自行使用sitemap插件自动生成', 'haoui'),
		'type' => 'textarea');

	$options[] = array(
		'name' => __('手机端导航', 'haoui').' (v4.0+)',
		'id' => 'm_navbar',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => __('电脑端搜索功能', 'haoui').' (v4.0+)',
		'id' => 'pc_search',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => __('手机端搜索功能', 'haoui').' (v4.0+)',
		'id' => 'm_search',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => __('百度自定义站内搜索', 'haoui'),
		'id' => 'search_baidu',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => __('PC端滚动时导航固定', 'haoui').'  (v1.3+)',
		'id' => 'nav_fixed',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui').__('由于网址导航左侧菜单的固定，故对网址导航页面无效', 'haoui'));

	$options[] = array(
		'id' => 'search_baidu_code',
		'std' => '',
		'desc' => __('此处存放百度自定义站内搜索代码，请自行去 http://zn.baidu.com/ 设置并获取', 'haoui'),
		'settings' => array(
			'rows' => 2
		),
		'type' => 'textarea');

	


	$options[] = array(
		'name' => __('自动使用文章第一张图作为缩略图', 'haoui').' (v1.9+)',
		'id' => 'thumb_postfirstimg_s',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui').'，特别注意：如果文章已经设置特色图像或外链缩略图输入，此功能将无效。');

	$options[] = array(
		'id' => 'thumb_postfirstimg_lastname',
		'std' => '',
		'desc' => __('自动缩略图后缀将自动加入文章第一张图的地址后缀之前。比如：文章中的第一张图地址是“aaa/bbb.jpg”，此处填写的字符是“-220x150”，那么缩略图的实际地址就变成了“aaa/bbb-220x150.jpg”。默认为空。', 'haoui'),
		'type' => 'text');

	$options[] = array(
		'name' => __('外链缩略图输入', 'haoui').' (v1.8+)',
		'id' => 'thumblink_s',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui').' 开启后会在后台编辑文章时出现外链缩略图地址输入框，填写一个图片地址即可在文章列表中显示。注意：如果文章添加了特色图像，列表中显示的缩略图优先选择该特色图像。');

/*
	$options[] = array(
		'id' => 'list_thumb_out',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('缩略图使用外链图片 （外链是没有缩略图的，所以不会是小图，浩子不建议外链图，但如果你的文章都是外链图片，这个可以帮你实现以上的列表模式） ', 'haoui'));*/


	


	$options[] = array(
		'name' => __('分享功能', 'haoui').' (v1.8+)',
		'id' => 'share_s',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => __('分享代码', 'haoui').' (v1.8+)',
		'id' => 'share_code',
		'std' => '<div class="bdsharebuttonbox">
<span>分享到：</span>
<a class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
<a class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
<a class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
<a class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
<a class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
<a class="bds_bdhome" data-cmd="bdhome" title="分享到百度新首页"></a>
<a class="bds_tqf" data-cmd="tqf" title="分享到腾讯朋友"></a>
<a class="bds_youdao" data-cmd="youdao" title="分享到有道云笔记"></a>
<a class="bds_more" data-cmd="more">更多</a> <span>(</span><a class="bds_count" data-cmd="count" title="累计分享0次">0</a><span>)</span>
</div>
<script>
window._bd_share_config = {
    common: {
		"bdText"     : "",
		"bdMini"     : "2",
		"bdMiniList" : false,
		"bdPic"      : "",
		"bdStyle"    : "0",
		"bdSize"     : "24"
    },
    share: [{
        bdCustomStyle: "'. get_template_directory_uri() .'/css/share.css"
    }]
}
with(document)0[(getElementsByTagName("head")[0]||body).appendChild(createElement("script")).src="http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion="+~(-new Date()/36e5)];
</script>',
		'desc' => __('默认是百度分享代码，可以改成其他分享代码', 'haoui'),
		'settings' => array(
			'rows' => 8
		),
		'type' => 'textarea');


	

	$options[] = array(
		'name' => '关闭顶部Topbar'.' (v4.1+)',
		'id' => 'topbar_off',
		'type' => "checkbox",
		'std' => false,
		'desc' => '关闭');


	$options[] = array(
		'name' => __('侧栏随动 - 首页', 'haoui'),
		'id' => 'sideroll_index_s',
		'std' => true,
		'desc' => __('开启', 'haoui'),
		'type' => 'checkbox');

	$options[] = array(
		'id' => 'sideroll_index',
		'std' => '1 2',
		'class' => 'mini',
		'desc' => __('设置随动模块，多个模块之间用空格隔开即可！默认：“1 2”，表示第1和第2个模块，建议最多3个模块 ', 'haoui'),
		'type' => 'text');

	$options[] = array(
		'name' => __('侧栏随动 - 分类/标签/搜索页', 'haoui'),
		'id' => 'sideroll_list_s',
		'std' => true,
		'desc' => __('开启', 'haoui'),
		'type' => 'checkbox');

	$options[] = array(
		'id' => 'sideroll_list',
		'std' => '1 2',
		'class' => 'mini',
		'desc' => __('设置随动模块，多个模块之间用空格隔开即可！默认：“1 2”，表示第1和第2个模块，建议最多3个模块 ', 'haoui'),
		'type' => 'text');

	$options[] = array(
		'name' => __('侧栏随动 - 文章页', 'haoui'),
		'id' => 'sideroll_post_s',
		'std' => true,
		'desc' => __('开启', 'haoui'),
		'type' => 'checkbox');

	$options[] = array(
		'id' => 'sideroll_post',
		'std' => '1 2',
		'class' => 'mini',
		'desc' => __('设置随动模块，多个模块之间用空格隔开即可！默认：“1 2”，表示第1和第2个模块，建议最多3个模块 ', 'haoui'),
		'type' => 'text');


	$options[] = array(
		'name' => __('全站底部推广区', 'haoui'),
		'id' => 'footer_brand_s',
		'std' => true,
		'desc' => __('开启', 'haoui'),
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('全站底部推广区 - 标题', 'haoui'),
		'id' => 'footer_brand_title',
		'desc' => '建议20字内',
		'std' => '大前端WP主题 更专业 更方便',
		'type' => 'text');

	for ($i=1; $i <= 2; $i++) { 
		
	$options[] = array(
		'name' => __('全站底部推广区 - 按钮 ', 'haoui').$i,
		'id' => 'footer_brand_btn_text_'.$i,
		'desc' => '按钮文字',
		'std' => '联系我们',
		'type' => 'text');

	$options[] = array(
		'id' => 'footer_brand_btn_href_'.$i,
		'desc' => __('按钮链接', 'haoui'),
		'std' => 'https://blog.pingbook.top',
		'type' => 'text');

	$options[] = array(
		'id' => 'footer_brand_btn_blank_'.$i,
		'std' => true,
		'desc' => __('新窗口打开', 'haoui'),
		'type' => 'checkbox');

	}










	$options[] = array(
		'name' => __('SEO', 'haoui'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('全站连接符', 'haoui'),
		'id' => 'connector',
		'desc' => __('一经选择，切勿更改，对SEO不友好，一般为“-”或“_”', 'haoui'),
		'std' => _hui('connector') ? _hui('connector') : '-',
		'type' => 'text',
		'class' => 'mini');

	$options[] = array(
		'name' => 'SEO标题(title)'.' (v4.0+)',
		'id' => 'hometitle',
		'std' => '',
		'desc' => '完全自定义的首页标题让搜索引擎更喜欢，该设置为空则自动采用后台-设置-常规中的“站点标题+副标题”的形式',
		'settings' => array(
			'rows' => 2
		),
		'type' => 'textarea');

	$options[] = array(
		'name' => __('首页关键字(keywords)', 'haoui'),
		'id' => 'keywords',
		'std' => '一个网站, 一个牛x的网站',
		'desc' => __('关键字有利于SEO优化，建议个数在5-10之间，用英文逗号隔开', 'haoui'),
		'settings' => array(
			'rows' => 2
		),
		'type' => 'textarea');

	$options[] = array(
		'name' => __('首页描述(description)', 'haoui'),
		'id' => 'description',
		'std' => __('本站是一个高端大气上档次的网站', 'haoui'),
		'desc' => __('描述有利于SEO优化，建议字数在30-70之间', 'haoui'),
		'settings' => array(
			'rows' => 3
		),
		'type' => 'textarea');


	$options[] = array(
		'name' => __('文章和页面自定义SEO设置', 'haoui'),
		'id' => 'post_keywords_description_s',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('开启', 'haoui'));










	$options[] = array(
		'name' => __('首页', 'haoui'),
		'type' => 'heading');


	$options[] = array(
		'name' => __('首页不显示以下分类的文章', 'haoui'),
		'id' => 'notinhome',
		'options' => $options_categories,
		'type' => 'multicheck');

	$options[] = array(
		'name' => __('首页不显示以下ID的文章', 'haoui'),
		'id' => 'notinhome_post',
		'std' => "11245\n12846",
		'desc' => __('每行填写一个文章ID', 'haoui'),
		'settings' => array(
			'rows' => 2
		),
		'type' => 'textarea');


	$options[] = array(
		'name' => __('最新发布 - 显示置顶文章', 'haoui').' (v4.0+)',
		'id' => 'home_sticky_s',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'id' => 'home_sticky_n',
		'options' => $multicheck_nums,
		'desc' => __('置顶文章显示数目', 'haoui'),
		'type' => 'select');


	$options[] = array(
		'name' => __('最新发布 - 标题', 'haoui'),
		'id' => 'index_list_title',
		'std' => __('最新发布', 'haoui'),
		'type' => 'text');

	$options[] = array(
		'name' => __('最新发布 - 标题右侧', 'haoui'),
		'id' => 'index_list_title_r',
		'std' => '<a href="链接地址">显示文字</a><a href="链接地址">显示文字</a><a href="链接地址">显示文字</a><a href="链接地址">显示文字</a>',
		'type' => 'textarea');


	$options[] = array(
		'name' => __('公告模块', 'haoui'),
		'id' => 'site_notice_s',
		'std' => true,
		'desc' => __('显示公告模块', 'haoui'),
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('公告模块 - 标题', 'haoui'),
		'id' => 'site_notice_title',
		'desc' => '建议4字内，默认：网站公告',
		'std' => '网站公告',
		'type' => 'text');

	$options[] = array(
		'name' => __('公告模块 - 分类目录', 'haoui'),
		'id' => 'site_notice_cat',
		'options' => $options_categories,
		'type' => 'select');

	$options[] = array(
		'name' => __('焦点图', 'haoui'),
		'id' => 'focusslide_s',
		'std' => true,
		'desc' => __('开启', 'haoui'),
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('焦点图 - 排序', 'haoui'),
		'id' => 'focusslide_sort',
		'desc' => '默认：1 2 3 4 5',
		'std' => '1 2 3 4 5',
		'type' => 'text');

	for ($i=1; $i <= 5; $i++) { 
		
	$options[] = array(
		'name' => __('焦点图 - 图', 'haoui').$i,
		'id' => 'focusslide_title_'.$i,
		'desc' => '标题',
		'std' => 'xiu主题 - 大前端',
		'type' => 'text');

	$options[] = array(
		// 'name' => __('链接到', 'haoui'),
		'id' => 'focusslide_href_'.$i,
		'desc' => __('链接', 'haoui'),
		'std' => 'https://blog.pingbook.top',
		'type' => 'text');

	$options[] = array(
		'id' => 'focusslide_blank_'.$i,
		'std' => true,
		'desc' => __('新窗口打开', 'haoui'),
		'type' => 'checkbox');
	
	$options[] = array(
		// 'name' => __('图片', 'haoui'),
		'id' => 'focusslide_src_'.$i,
		'desc' => __('图片，尺寸：', 'haoui').'820*200',
		'std' => $imagepath . 'hs-xiu.jpg',
		'type' => 'upload');

	}












	$options[] = array(
		'name' => __('列表', 'haoui'),
		'type' => 'heading' );


	$options[] = array(
		'name' => __('分类url去除category字样', 'haoui'),
		'id' => 'no_categoty',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui').__('（主题已内置no-category插件功能，请不要安装插件；开启后请去设置-固定连接中点击保存即可）', 'haoui'));


	$options[] = array(
		'name' => __('列表模式', 'haoui'),
		'id' => 'list_type',
		'std' => "thumb",
		'type' => "radio",
		'options' => array(
			'thumb' => __('图文模式（缩略图尺寸：220*150px，默认已自动裁剪）', 'haoui'),
			'text' => __('文字模式 ', 'haoui'),
			'thumb_if_has' => __('图文模式，无特色图时自动转换为文字模式 ', 'haoui').' (v1.6+)',
		));

	$options[] = array(
		'name' => __('新窗口打开文章', 'haoui'),
		'id' => 'target_blank',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui'));
	

	$options[] = array(
		'name' => __('分页无限加载页数', 'haoui'),
		'id' => 'ajaxpager',
		'std' => 5,
		'class' => 'mini',
		'desc' => __('为0时表示不开启该功能', 'haoui'),
		'type' => 'text');


	$options[] = array(
		'name' => __('小部件', 'haoui'),
		'id' => 'post_plugin_view',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('阅读量（无需安装插件）', 'haoui'));

	$options[] = array(
		'id' => 'post_plugin_comm',
		'type' => "checkbox",
		'std' => true,
		'class' => 'op-multicheck',
		'desc' => __('列表评论数', 'haoui'));

	$options[] = array(
		'id' => 'post_plugin_like',
		'type' => "checkbox",
		'std' => true,
		'class' => 'op-multicheck',
		'desc' => __('列表点赞'.' (v4.2+)', 'haoui'));

	$options[] = array(
		'id' => 'post_plugin_date',
		'type' => "checkbox",
		'std' => true,
		'class' => 'op-multicheck',
		'desc' => __('列表时间', 'haoui'));

	$options[] = array(
		'id' => 'post_plugin_date_m',
		'type' => "checkbox",
		'std' => false,
		'class' => 'op-multicheck',
		'desc' => __('手机端列表时间'.' (v4.2+)', 'haoui'));

	$options[] = array(
		'id' => 'post_plugin_author',
		'type' => "checkbox",
		'std' => true,
		'class' => 'op-multicheck',
		'desc' => __('列表作者名', 'haoui'));

	$options[] = array(
		'id' => 'post_plugin_cat',
		'type' => "checkbox",
		'std' => true,
		'class' => 'op-multicheck',
		'desc' => __('列表分类链接', 'haoui'));

	$options[] = array(
		'id' => 'post_plugin_cat_m',
		'type' => "checkbox",
		'std' => true,
		'class' => 'op-multicheck',
		'desc' => __('手机端列表分类链接'.' (v4.2+)', 'haoui'));

	$options[] = array(
		'name' => __('文章作者名加链接', 'haoui'),
		'id' => 'author_link',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui').__('（列表和文章有作者的地方都会加上链接） ', 'haoui'));

	$options[] = array(
		'name' => __('文章缩略图异步加载', 'haoui').' (v1.4+)',
		'id' => 'thumbnail_src',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => __('微分类', 'haoui'),
		'id' => 'minicat_s',
		'std' => true,
		'desc' => __('开启', 'haoui'),
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('微分类 - 首页', 'haoui'),
		'id' => 'minicat_home_s',
		'std' => true,
		'desc' => __('在首页显示微分类最新文章', 'haoui'),
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('微分类 - 首页 模块前缀', 'haoui'),
		'id' => 'minicat_home_title',
		'desc' => '默认为：今日观点',
		'std' => '今日观点',
		'type' => 'text');

	$options[] = array(
		'name' => __('微分类 - 分类目录', 'haoui'),
		'desc' => __('选择一个使用微分类展示模版，分类下文章将全文输出到微分类列表', 'haoui'),
		'id' => 'minicat',
		'options' => $options_categories,
		'type' => 'select');


	$options[] = array(
		'name' => __('分类产品模版 - 二维码', 'haoui').' (v5.2+)',
		'id' => 'catp_qrcode',
		'std' => true,
		'desc' => __('开启', 'haoui'),
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('分类产品模版 - 二维码 标题', 'haoui'),
		'id' => 'catp_qrcode_tit',
		'desc' => '',
		'std' => '手机扫码分享',
		'type' => 'text');














	

	$options[] = array(
		'name' => __('文章', 'haoui'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('面包屑导航', 'haoui').' (v4.0+)',
		'id' => 'breadcrumbs_single_s',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => __('面包屑导航', 'haoui').' / '.__('用“正文”替代标题', 'haoui').' (v4.0+)',
		'id' => 'breadcrumbs_single_text',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => '点赞'.' (v4.2+)',
		'id' => 'post_like_s',
		'desc' => '开启',
		'std' => true,
		'type' => "checkbox");

	$options[] = array(
		'name' => '打赏'.' (v4.0+)',
		'id' => 'post_rewards_s',
		'desc' => '开启',
		'std' => true,
		'type' => "checkbox");

	$options[] = array(
		'name' => '打赏：显示文字',
		'id' => 'post_rewards_text',
		'std' => '打赏',
		'type' => 'text');

	$options[] = array(
		'name' => '打赏：弹出层标题',
		'id' => 'post_rewards_title',
		'std' => '觉得文章有用就打赏一下文章作者',
		'type' => 'text');

	$options[] = array(
		'name' => '打赏：支付宝收款二维码',
		'id' => 'post_rewards_alipay',
		'desc' => '',
		'std' => $qrcode,
		'type' => 'upload');

	$options[] = array(
		'name' => '打赏：微信收款二维码',
		'id' => 'post_rewards_wechat',
		'desc' => '',
		'std' => $qrcode,
		'type' => 'upload');

	$options[] = array(
		'name' => __('手机端不显示分享模块', 'haoui').' (v2.0+)',
		'id' => 'm_post_share_s',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => __('文章上一页下一页', 'haoui').' (v1.8+)',
		'id' => 'post_prevnext_s',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => __('文章作者介绍', 'haoui').' (v1.7+)',
		'id' => 'post_authordesc_s',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => __('相关文章', 'haoui'),
		'id' => 'post_related_s',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'id' => 'post_related_thumb_s',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启图文模式', 'haoui'));

	$options[] = array(
		'desc' => __('相关文章标题', 'haoui'),
		'id' => 'related_title',
		'std' => __('相关推荐', 'haoui'),
		'type' => 'text');

	$options[] = array(
		'desc' => __('相关文章显示数量', 'haoui'),
		'id' => 'post_related_n',
		'std' => 8,
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('文章来源', 'haoui'),
		'id' => 'post_from_s',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('开启', 'haoui'));
	
	$options[] = array(
		'id' => 'post_from_h1',
		'std' => __('来源：', 'haoui'),
		'desc' => __('来源显示字样', 'haoui'),
		'type' => 'text');

	$options[] = array(
		'id' => 'post_from_link_s',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('来源加链接', 'haoui'));

	$options[] = array(
		'name' => __('内容段落缩进', 'haoui').' (v1.3+)',
		'id' => 'post_p_indent_s',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui').__(' 开启后只对前台文章展示有效，对后台编辑器中的格式无效', 'haoui'));

	$options[] = array(
		'name' => __('文章页尾版权提示', 'haoui'),
		'id' => 'post_copyright_s',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => __('文章页尾版权提示前缀', 'haoui'),
		'id' => 'post_copyright',
		'std' => __('未经允许不得转载：', 'haoui'),
		'type' => 'text');

	


	$options[] = array(
		'name' => __('评论标题', 'haoui'),
		'id' => 'comment_title',
		'std' => __('评论', 'haoui'),
		'type' => 'text');

	$options[] = array(
		'name' => __('评论框默认字符', 'haoui'),
		'id' => 'comment_text',
		'std' => __('你的评论可以一针见血', 'haoui'),
		'type' => 'text');

	$options[] = array(
		'name' => __('评论提交按钮字符', 'haoui'),
		'id' => 'comment_submit_text',
		'std' => __('提交评论', 'haoui'),
		'type' => 'text');
	



	
	
	




	$options[] = array(
		'name' => __('页面', 'haoui'),
		'type' => 'heading');


	$options[] = array(
		'name' => __('网址导航 - 标题下描述文字', 'haoui'),
		'id' => 'navpage_desc',
		'std' => '这里显示的是网址导航的一句话描述...',
		'type' => 'text');

	$options[] = array(
		'name' => __('网址导航 - 链接分类目录', 'haoui'),
		'id' => 'navpage_cats',
		'desc' => '注：此处如果没有选项，请去后台-链接中添加链接和链接分类目录，只有不为空的链接分类目录才会显示出来。',
		'options' => $options_linkcats,
		'type' => 'multicheck');


	$options[] = array(
		'name' => __('读者墙', 'haoui'),
		'id' => 'readwall_limit_time',
		'std' => 200,
		'class' => 'mini',
		'desc' => __('限制在多少月内，单位：月', 'haoui'),
		'type' => 'text');

	$options[] = array(
		'id' => 'readwall_limit_number',
		'std' => 200,
		'class' => 'mini',
		'desc' => __('显示个数', 'haoui'),
		'type' => 'text');

	$options[] = array(
		'name' => __('友情链接分类选择', 'haoui'),
		'id' => 'page_links_cat',
		'options' => $options_linkcats,
		'type' => 'multicheck');


















	
	$options[] = array(
		'name' => __('会员中心', 'haoui'),
		'type' => 'heading' );

	$options[] = array(
		'id' => 'user_page_s',
		'std' => true,
		'desc' => __('开启会员中心', 'haoui'),
		'type' => 'checkbox');

	$options[] = array(
		'id' => 'user_on_notice_s',
		'std' => true,
		'desc' => __('在首页公告栏显示会员模块', 'haoui'),
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('选择会员中心页面', 'haoui'),
		'id' => 'user_page',
		'desc' => '如果没有合适的页面作为会员中心，你需要去新建一个页面再来选择',
		'options' => $options_pages,
		'type' => 'select');

	$options[] = array(
		'name' => __('选择找回密码页面', 'haoui'),
		'id' => 'user_rp',
		'desc' => '如果没有合适的页面作为找回密码页面，你需要去新建一个页面再来选择',
		'options' => $options_pages,
		'type' => 'select');

	$options[] = array(
		'name' => __('允许用户发布文章', 'haoui').' (v1.6+)',
		'id' => 'tougao_s',
		'std' => true,
		'desc' => __('开启', 'haoui'),
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('有新投稿邮件通知', 'haoui').' (v1.3+)',
		'id' => 'tougao_mail_send',
		'std' => false,
		'desc' => __('开启', 'haoui'),
		'type' => 'checkbox');

	$options[] = array(
		'desc' => __('投稿通知接收邮箱', 'haoui').' (v1.3+)',
		'id' => 'tougao_mail_to',
		'type' => 'text');





	





	
	$options[] = array(
		'name' => __('直达链接', 'haoui'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('在文章列表显示', 'haoui').' (v1.3+)',
		'id' => 'post_link_excerpt_s',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => __('在文章页面显示', 'haoui'),
		'id' => 'post_link_single_s',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => __('新窗口打开链接', 'haoui'),
		'id' => 'post_link_blank_s',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => __('链接添加 nofollow', 'haoui'),
		'id' => 'post_link_nofollow_s',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => __('自定义显示文字', 'haoui'),
		'id' => 'post_link_h1',
		'type' => "text",
		'std' => '直达链接',
		'desc' => __('默认为“直达链接” ', 'haoui'));

















	
	$options[] = array(
		'name' => __('社交', 'haoui'),
		'type' => 'heading' );

	$options[] = array(
		'name' => __('网站顶部右上角关注本站', 'haoui'),
		'id' => 'guanzhu_b',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => __('显示文字', 'haoui'),
		'id' => 'sns_txt',
		'std' => '关注我们',
		'type' => 'text');

	

	$options[] = array(
		'name' => __('微信 - 标题', 'haoui'),
		'id' => 'wechat',
		'std' => '阿里百秀',
		'type' => 'text');
	$options[] = array(
		'id' => 'wechat_qr',
		'std' => 'http://www.daqianduan.com/wp-content/uploads/2015/01/weixin-qrcode.jpg',
		'desc' => __('微信二维码，建议图片尺寸：', 'haoui').'200x200px',
		'type' => 'upload');


	for ($i=1; $i < 10; $i++) { 

		$options[] = array(
			'name' => __('自定义社交 '.$i.' - 标题', 'haoui'),
			'id' => 'sns_tit_'.$i,
			'std' => '',
			'type' => 'text');
		$options[] = array(
			'name' => __('自定义社交 '.$i.' - 链接地址', 'haoui'),
			'id' => 'sns_link_'.$i,
			'std' => '',
			'type' => 'text');

	}
	






	
	$options[] = array(
		'name' => __('客服', 'haoui'),
		'type' => 'heading' );

	$options[] = array(
		'name' => __('显示位置', 'haoui').' (v5.1+)',
		'id' => 'kefu',
		'std' => "rb",
		'type' => "radio",
		'desc' => '',
		'options' => array(
			'rb' => __('右侧底部', 'haoui'),
			'rm' => __('右侧中部', 'haoui'),
			'0' => __('不显示', 'haoui')
		));

	
	$options[] = array(
		'name' => __('按钮排序', 'haoui'),
		'id' => 'kefu_px',
		'desc' => '填写需要显示的以下按钮ID，用空格隔开。默认：2 4 1',
		'std' => '2 4 1',
		'type' => 'text');


	$options[] = array(
		'name' => __('手机端', 'haoui'),
		'id' => 'kefu_m',
		'type' => "checkbox",
		'std' => false,
		'desc' => __('开启', 'haoui'));

	$options[] = array(
		'name' => __('手机端 - 按钮排序', 'haoui'),
		'id' => 'kefu_m_px',
		'desc' => '填写需要显示的以下按钮ID，用空格隔开。默认：2 3 4',
		'std' => '2 3 4',
		'type' => 'text');


	$options[] = array(
		'name' => __('回顶 （排序ID：1）', 'haoui'),
		'id' => 'kefu_top_tip',
		'desc' => '按钮提示文字。默认：回顶部',
		'std' => '回顶部',
		'type' => 'text');
	$options[] = array(
		'id' => 'kefu_top_tip_m',
		'desc' => '手机端 - 按钮下显示文字',
		'std' => '回顶',
		'type' => 'text');



	$options[] = array(
		'name' => 'QQ （排序ID：2）',
		'id' => 'fqq_tip',
		'desc' => '按钮提示文字。默认：QQ咨询',
		'std' => 'QQ咨询',
		'type' => 'text');
	$options[] = array(
		'id' => 'fqq_tip_m',
		'desc' => '手机端 - 按钮下显示文字',
		'std' => 'QQ咨询',
		'type' => 'text');

	$options[] = array(
		'id' => 'fqq_id',
		'desc' => 'QQ号码',
		'std' => '937373201',
		'type' => 'text');



	$options[] = array(
		'name' => '电话 （排序ID：3）',
		'id' => 'kefu_tel_tip',
		'desc' => '按钮提示文字。默认：电话咨询',
		'std' => '电话咨询',
		'type' => 'text');
	$options[] = array(
		'id' => 'kefu_tel_tip_m',
		'desc' => '手机端 - 按钮下显示文字',
		'std' => '电话咨询',
		'type' => 'text');

	$options[] = array(
		'id' => 'kefu_tel_id',
		'desc' => '电话号码',
		'std' => '',
		'type' => 'text');


	$options[] = array(
		'name' => __('微信/二维码 （排序ID：4）', 'haoui'),
		'id' => 'kefu_wechat_tip',
		'desc' => '按钮提示文字。默认：关注微信',
		'std' => '关注微信',
		'type' => 'text');
	$options[] = array(
		'id' => 'kefu_wechat_tip_m',
		'desc' => '手机端 - 按钮下显示文字',
		'std' => '微信咨询',
		'type' => 'text');

	$options[] = array(
		'id' => 'kefu_wechat_qr',
		'std' => '',
		'desc' => __('微信二维码，正方形，建议图片尺寸：', 'haoui').'200x200px',
		'type' => 'upload');



	$options[] = array(
		'name' => '自定义客服 （排序ID：5）',
		'id' => 'kefu_sq_tip',
		'desc' => '按钮提示文字。默认：在线咨询',
		'std' => '在线咨询',
		'type' => 'text');
	$options[] = array(
		'id' => 'kefu_sq_tip_m',
		'desc' => '手机端 - 按钮下显示文字',
		'std' => '在线咨询',
		'type' => 'text');

	$options[] = array(
		'id' => 'kefu_sq_id',
		'desc' => '自定义客服链接',
		'std' => '',
		'type' => 'text');


	$options[] = array(
		'name' => '评论 （排序ID：6）',
		'id' => 'kefu_comment_tip',
		'desc' => '按钮提示文字，只在开启评论的文章或页面显示。默认：去评论',
		'std' => '去评论',
		'type' => 'text');
	$options[] = array(
		'id' => 'kefu_comment_tip_m',
		'desc' => '手机端 - 按钮下显示文字',
		'std' => '去评论',
		'type' => 'text');


	





	
	$options[] = array(
		'name' => __('广告位', 'haoui'),
		'type' => 'heading' );

	$options[] = array(
		'name' => __('文章页正文结尾文字广告', 'haoui'),
		'id' => 'ads_post_footer_s',
		'std' => false,
		'desc' => ' 显示',
		'type' => 'checkbox');
	$options[] = array(
		'desc' => '前标题',
		'id' => 'ads_post_footer_pretitle',
		'std' => '阿里百秀',
		'type' => 'text');
	$options[] = array(
		'desc' => '标题',
		'id' => 'ads_post_footer_title',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'desc' => '链接',
		'id' => 'ads_post_footer_link',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'id' => 'ads_post_footer_link_blank',
		'type' => "checkbox",
		'std' => true,
		'desc' => __('开启', 'haoui') .' ('. __('新窗口打开链接', 'haoui').')');


	$options[] = array(
		'name' => __('首页文章列表上', 'haoui'),
		'id' => 'ads_index_01_s',
		'std' => false,
		'desc' => __('开启', 'haoui'),
		'type' => 'checkbox');
	$options[] = array(
		'desc' => __('非手机端', 'haoui').' '.$adsdesc,
		'id' => 'ads_index_01',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		'id' => 'ads_index_01_m',
		'std' => '',
		'desc' => __('手机端', 'haoui').' '.$adsdesc,
		'type' => 'textarea');

	$options[] = array(
		'name' => __('首页分页下', 'haoui'),
		'id' => 'ads_index_02_s',
		'std' => false,
		'desc' => __('开启', 'haoui'),
		'type' => 'checkbox');
	$options[] = array(
		'desc' => __('非手机端', 'haoui').' '.$adsdesc,
		'id' => 'ads_index_02',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		'id' => 'ads_index_02_m',
		'std' => '',
		'desc' => __('手机端', 'haoui').' '.$adsdesc,
		'type' => 'textarea');

	$options[] = array(
		'name' => __('文章页正文上', 'haoui'),
		'id' => 'ads_post_01_s',
		'std' => false,
		'desc' => __('开启', 'haoui'),
		'type' => 'checkbox');
	$options[] = array(
		'desc' => __('非手机端', 'haoui').' '.$adsdesc,
		'id' => 'ads_post_01',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		'id' => 'ads_post_01_m',
		'std' => '',
		'desc' => __('手机端', 'haoui').' '.$adsdesc,
		'type' => 'textarea');

	$options[] = array(
		'name' => __('文章页正文下', 'haoui'),
		'id' => 'ads_post_02_s',
		'std' => false,
		'desc' => __('开启', 'haoui'),
		'type' => 'checkbox');
	$options[] = array(
		'desc' => __('非手机端', 'haoui').' '.$adsdesc,
		'id' => 'ads_post_02',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		'id' => 'ads_post_02_m',
		'std' => '',
		'desc' => __('手机端', 'haoui').' '.$adsdesc,
		'type' => 'textarea');

	$options[] = array(
		'name' => __('文章页评论上', 'haoui'),
		'id' => 'ads_post_03_s',
		'std' => false,
		'desc' => __('开启', 'haoui'),
		'type' => 'checkbox');
	$options[] = array(
		'desc' => __('非手机端', 'haoui').' '.$adsdesc,
		'id' => 'ads_post_03',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		'id' => 'ads_post_03_m',
		'std' => '',
		'desc' => __('手机端', 'haoui').' '.$adsdesc,
		'type' => 'textarea');

	$options[] = array(
		'name' => __('分类页列表上', 'haoui'),
		'id' => 'ads_cat_01_s',
		'std' => false,
		'desc' => __('开启', 'haoui'),
		'type' => 'checkbox');
	$options[] = array(
		'desc' => __('非手机端', 'haoui').' '.$adsdesc,
		'id' => 'ads_cat_01',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		'id' => 'ads_cat_01_m',
		'std' => '',
		'desc' => __('手机端', 'haoui').' '.$adsdesc,
		'type' => 'textarea');

	$options[] = array(
		'name' => __('标签页列表上', 'haoui'),
		'id' => 'ads_tag_01_s',
		'std' => false,
		'desc' => __('开启', 'haoui'),
		'type' => 'checkbox');
	$options[] = array(
		'desc' => __('非手机端', 'haoui').' '.$adsdesc,
		'id' => 'ads_tag_01',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		'id' => 'ads_tag_01_m',
		'std' => '',
		'desc' => __('手机端', 'haoui').' '.$adsdesc,
		'type' => 'textarea');

	$options[] = array(
		'name' => __('搜索页列表上', 'haoui'),
		'id' => 'ads_search_01_s',
		'std' => false,
		'desc' => __('开启', 'haoui'),
		'type' => 'checkbox');
	$options[] = array(
		'desc' => __('非手机端', 'haoui').' '.$adsdesc,
		'id' => 'ads_search_01',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		'id' => 'ads_search_01_m',
		'std' => '',
		'desc' => __('手机端', 'haoui').' '.$adsdesc,
		'type' => 'textarea');



	
	$options[] = array(
		'name' => __('自定义代码', 'haoui'),
		'type' => 'heading' );

	$options[] = array(
		'name' => __('自定义网站底部内容', 'haoui'),
		'desc' => __('该块显示在网站底部版权上方，可已定义放一些链接或者图片之类的内容。', 'haoui'),
		'id' => 'fcode',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('自定义CSS样式', 'haoui'),
		'desc' => __('位于</head>之前，直接写样式代码，不用添加&lt;style&gt;标签', 'haoui'),
		'id' => 'csscode',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('自定义头部代码', 'haoui'),
		'desc' => __('位于</head>之前，这部分代码是在主要内容显示之前加载，通常是CSS样式、自定义的<meta>标签、全站头部JS等需要提前加载的代码', 'haoui'),
		'id' => 'headcode',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('自定义底部代码', 'haoui'),
		'desc' => __('位于&lt;/body&gt;之前，这部分代码是在主要内容加载完毕加载，通常是JS代码', 'haoui'),
		'id' => 'footcode',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('网站统计代码', 'haoui'),
		'desc' => __('位于底部，用于添加第三方流量数据统计代码，如：Google analytics、百度统计、CNZZ、51la，国内站点推荐使用百度统计，国外站点推荐使用Google analytics', 'haoui'),
		'id' => 'trackcode',
		'std' => '',
		'type' => 'textarea');







	$options[] = array(
		'name' => __('百度熊掌号', 'haoui'),
		'type' => 'heading' );

	$options[] = array(
		'name' => __('百度熊掌号', 'haoui'),
		'id' => 'xzh_on',
		'std' => false,
		'desc' => ' 开启',
		'type' => 'checkbox');

	$options[] = array(
		'name' => '百度熊掌号 Appid',
		'id' => 'xzh_appid',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => '百度熊掌号 推送密钥 token',
		'id' => 'xzh_post_token',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('粉丝关注', 'haoui'),
		'id' => 'xzh_render_head',
		'std' => false,
		'desc' => ' 吸顶bar',
		'type' => 'checkbox');

	$options[] = array(
		'class' => 'op-multicheck',
		'id' => 'xzh_render_body',
		'std' => true,
		'desc' => ' 文章段落间bar',
		'type' => 'checkbox');

	$options[] = array(
		'class' => 'op-multicheck',
		'id' => 'xzh_render_tail',
		'std' => true,
		'desc' => ' 底部bar',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('添加JSON_LD数据', 'haoui'),
		'id' => 'xzh_jsonld_single',
		'std' => true,
		'desc' => ' 文章页',
		'type' => 'checkbox');

	$options[] = array(
		'class' => 'op-multicheck',
		'id' => 'xzh_jsonld_page',
		'std' => false,
		'desc' => ' 页面',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('添加JSON_LD数据 - 不添加图片', 'haoui'),
		'id' => 'xzh_jsonld_img',
		'std' => false,
		'desc' => ' 开启',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('新增文章实时推送', 'haoui'),
		'id' => 'xzh_post_on',
		'std' => false,
		'desc' => ' 开启 （使用此功能，你还需要开启本页中的 百度熊掌号 和 Appid以及token的设置）',
		'type' => 'checkbox');

	
	


	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */
/*
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	$options[] = array(
		'name' => __('Default Text Editor', 'options_framework_theme'),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'options_framework_theme' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

*/

	return $options;
}