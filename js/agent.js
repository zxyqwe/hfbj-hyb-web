var mech = {
	'iphone': 'iPhone ',
	'ipad': 'iPad ',
	'mi 2sc': '小米2S电信版 ',
	'mi 2s': '小米2S ',
	'mi 2': '小米2 ',
	'mi 3': '小米3 ',
	'xiaomi': '小米 ',
	'mi note lte': '小米Note LTE ',
	'hm note 1s': '红米Note增强版 ',
	'k-touch': '天语 ',
	'lg-d858': 'LG G3移动4G版 ',
	'g700-u00': '华为G700联通版 ',
	'g750-t00': '华为G750移动版 ',
	'mt7-tl10': '华为Mate7高配版移动联通双4G版 ',
	'p6-t00': '华为P6移动版 ',
	'h60-l01': '华为荣耀6移动单卡4G版 ',
	'h60-l02': '华为荣耀6联通单卡4G版 ',
	'honor h30-l01': '华为荣耀3C移动4G版 ',
	'che1-cl20': '华为荣耀畅玩4X全网通版 ',
	'gt-i9192': '三星GT-I9192 ',
	'gt-i9300': '三星GT-I9300 ',
	'gt-i9500': '三星GT-I9500 ',
	'gt-n7102': '三星GT-N7102 ',
	'sm-n9009': '三星GALAXY Note 3 SM-N9009 ',
	'sm-a7000': '三星GALAXY A7 移动联通版 ',
	'k30-t': '联想 乐檬K3移动4G版 ',
	'z90-7': '联想 Z90-7 ',
	'd816t': 'HTC Desire 816移动4G ',
	'r830s': 'OPPO R830S ',
	'hs-t970': '海信HS-T970移动版 ',
	'x600': '乐视 X600 ',
	'm032': '魅族MX M032 ',
	'mx4': '魅族MX4 ',
	'r7t': 'OPPO R7 移动版 ',
	'nt 6.3': 'Windows 8.1 ',
	'nt 6.2': 'Windows 8 ',
	'nt 6.1': 'Windows 7 ',
	'nt 5.1': 'Windows XP ',
	'linux': 'Linux ',
	'apache-httpclient/unavailable': '汉服北京APP '
};

function agent(value, row) {
	if (value == null) return value;
	v = value.toLowerCase();
	re = "";
	if (v.match("yisouspider"))
		re += '淘宝一搜蜘蛛！ ';
	else if (v.match("googlebot"))
		re += '谷歌蜘蛛！ ';
	else if (v.match("bingbot"))
		re += '必应Bing蜘蛛！ ';
	else if (v.match("baiduspider"))
		re += '百度蜘蛛！ ';
	else if (v.match("360spider"))
		re += '360蜘蛛！ ';
	else if (v.match("mj12bot"))
		re += 'MJ12蜘蛛！ ';

	for (var key in mech) {
		if (v.match(key)) {
			re += mech[key];
			break;
		}
	}

	if (v.match("os 7"))
		re += 'IOS 7 ';
	else if (v.match("os 8"))
		re += 'IOS 8 ';
	else if (v.match("os 6"))
		re += 'IOS 6 ';
	else if (v.match("os x 10"))
		re += '苹果电脑 10 ';

	if (re.length < 1)
		re += value;

	if (v.match("micromessenger")) {
		re += '微信 ';
	} else if (v.match("mqqbrowser")) {
		re += 'QQ浏览器 ';
	} else if (v.match("ucbrowser")) {
		re += 'UC浏览器 ';
	} else if (v.match("ubrowser")) {
		re += 'UC浏览器PC版 ';
	} else if (v.match("tieba")) {
		re += '百度贴吧 ';
	} else if (v.match("baidubrowser")) {
		re += '百度浏览器 ';
	} else if (v.match("weibo")) {
		re += '新浪微博 ';
	} else if (v.match("miuibrowser")) {
		re += '小米浏览器 ';
	} else if (v.match("metasr")) {
		re += '搜狗浏览器 ';
	} else if (v.match("theworld")) {
		re += '世界之窗浏览器 ';
	} else if (v.match("qq")) {
		re += 'QQ ';
	} else if (v.match("chrome")) {
		if (v.match("mozilla/5.0"))
			re += 'Chrome ';
		else re += value;
	} else if (v.match("firefox")) {
		re += 'Firefox ';
	} else if (v.match("msie 6")) {
		re += 'IE 6 ';
	} else if (v.match("msie 7")) {
		re += 'IE 7 ';
	} else if (v.match("msie 8")) {
		re += 'IE 8 ';
	} else if (v.match("msie 9")) {
		re += 'IE 9 ';
	} else if (v.match("msie 10")) {
		re += 'IE 10 ';
	} else if (v.match("safari")) {
		re += '自带浏览器 ';
	} else if (v.match("mozilla/4.0")) {
		re += '？ ';
	}

	if (v.match("lbbrowser"))
		re += '猎豹浏览器 ';
	else if (v.match("maxthon")) {
		re += '傲游浏览器 ';
	}

	if (v.match("wow64"))
		re += '64位 ';
	else if (v.match("x86_64"))
		re += '64位 ';

	if (v.match("nettype/wifi"))
		re += 'WiFi ';
	else if (v.match("nettype/3g+"))
		re += '3G+ ';
	else if (v.match("nettype/4g"))
		re += '4G ';
	else if (v.match("nettype/3g"))
		re += '3G ';
	else if (v.match("nettype/cmnet"))
		re += '中国移动 ';

	return '<span id="tooltip' + row.id + '" data-toggle="tooltip" title="' + value + '">' + re + '<script type="text/javascript">$("#tooltip' + row.id + '").tooltip();</script></span>';
}