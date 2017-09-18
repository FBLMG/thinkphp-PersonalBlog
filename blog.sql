-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-01-27 04:52:59
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp_filetype`
--

CREATE TABLE IF NOT EXISTS `tp_filetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL COMMENT '文章类型',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='文章类型' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `tp_filetype`
--

INSERT INTO `tp_filetype` (`id`, `title`) VALUES
(1, '旅游指南'),
(2, '个人心情'),
(3, '日志'),
(4, '篮球赛场');

-- --------------------------------------------------------

--
-- 表的结构 `tp_img`
--

CREATE TABLE IF NOT EXISTS `tp_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(64) NOT NULL COMMENT '图片名字',
  `title` text NOT NULL COMMENT '图片标题',
  `publishtime` date NOT NULL COMMENT '上传时间',
  `typeid` int(11) NOT NULL COMMENT '图片类型',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='图片表' AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `tp_img`
--

INSERT INTO `tp_img` (`id`, `img`, `title`, `publishtime`, `typeid`) VALUES
(7, '2bb2cfb.jpg', '海贼王', '2016-11-23', 1),
(8, '$time.jpg', '海贼王', '2016-11-24', 1),
(10, '9ca0816.jpg', '海贼王', '2016-11-24', 1),
(11, 'bf48187.jpg', '海贼王', '2016-11-27', 1),
(12, 'd02a27e.jpg', '海贼王', '2016-12-03', 1),
(13, 'fa0f816.jpg', '海贼王', '2016-12-03', 1),
(14, 'fccb0d1.jpg', '海贼王', '2016-12-03', 1),
(15, '060554.jpg', '海贼王', '2016-12-17', 1),
(16, '16.JPG', '詹姆斯', '2017-01-15', 5),
(17, '062055.JPG', '詹姆斯', '2017-01-15', 5),
(18, '100143.jpg', '凯文乐福', '2017-01-27', 5);

-- --------------------------------------------------------

--
-- 表的结构 `tp_imgtype`
--

CREATE TABLE IF NOT EXISTS `tp_imgtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(64) NOT NULL COMMENT '图片类型',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='图片类型' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `tp_imgtype`
--

INSERT INTO `tp_imgtype` (`id`, `type`) VALUES
(1, '动漫'),
(2, '风景'),
(3, '其他'),
(5, '篮球赛场');

-- --------------------------------------------------------

--
-- 表的结构 `tp_knowledge`
--

CREATE TABLE IF NOT EXISTS `tp_knowledge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL COMMENT '文字标题',
  `author` varchar(30) NOT NULL COMMENT '作者',
  `img` varchar(64) NOT NULL COMMENT '文章封面',
  `content` text NOT NULL COMMENT '发表内容',
  `publishtime` varchar(32) NOT NULL COMMENT '发表时间',
  `typeid` int(11) NOT NULL COMMENT '文章类型',
  `abstract` varchar(128) NOT NULL COMMENT '摘要',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='文章表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `tp_knowledge`
--

INSERT INTO `tp_knowledge` (`id`, `title`, `author`, `img`, `content`, `publishtime`, `typeid`, `abstract`) VALUES
(1, '流年祭奠', '1413336', '1.JPG', '<p><span style="color: rgb(51, 51, 51); font-family: 宋体; font-size: 14px; line-height: 27px; background-color: rgb(255, 255, 255);">窗口的风肆意的吹，我也在恣然的把玩着手中的心窝，掏来掏去却发现冷却趋于上升温度的铅华。我退卸的似乎又在被允许放纵。</span><span style="color: rgb(51, 51, 51); font-family: 宋体; font-size: 14px; line-height: 27px; background-color: rgb(255, 255, 255);">从来不曾感觉，是因为默然的关系。许久未曾提起，但还是恨自己是一个人</span><span style="color: rgb(51, 51, 51); font-family: 宋体; font-size: 14px; line-height: 27px; background-color: rgb(255, 255, 255);">，无法摆脱七情六欲的困惑，不能冲破人世冷暖的枷锁。</span><span style="color: rgb(51, 51, 51); font-family: 宋体; font-size: 14px; line-height: 27px; background-color: rgb(255, 255, 255);">懒惰是一再堕落的必然，也许渐渐消逝的</span><a href="http://www.jj59.com/zti/qingchun/" class="keywordlink" style="font-family: 宋体; font-size: 14px; line-height: 27px; border: 0px; margin: 0px; padding: 0px; text-decoration: none; color: rgb(51, 51, 51); outline: none; background-color: rgb(255, 255, 255);">青春</a><span style="color: rgb(51, 51, 51); font-family: 宋体; font-size: 14px; line-height: 27px; background-color: rgb(255, 255, 255);">经不起折腾，对错始终是抵御不了的众说纷纭，我也在怅惋，也曾那般的虔诚，但最终还是在人事薄凉中逐渐的沉沦。</span></p>', '2016-11-12 17:47:10', 3, '个人心情'),
(4, '伦敦', '1413336', 'home-img-2.jpg', '<p>伦敦（London），是大不列颠及北爱尔兰联合王国（简称英国）首都，欧洲最大的城市。与美国纽约并列世界上最大的金融中心。伦敦位于英格兰东南部的平原上，跨泰晤士河.16世纪后，随着大英帝国的快速崛起，伦敦的规模也高速扩大.伦敦是英国的政治、经济、文化、金融中心和世界著名的旅游胜地，有数量众多的名胜景点与博物馆.伦敦是多元化的大都市，居民来自世界各地，一座种族、宗教与文化的大熔炉城市.</p>', '2016-11-17 17:47:10', 1, ''),
(5, '巴黎', '1413336', '75cf665.jpg', '<p style="margin-top: 0px; margin-bottom: 15px; padding: 0px; line-height: 24px; text-indent: 2em; color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);">巴黎位于法国北部巴黎盆地的中央，横跨塞纳河两岸。建都已有1400多年的历史。在自中世纪以来的发展中，一直保留过去的印记，也保留了统一的风格。今天的巴黎，不仅是世界的一个政治、经济、科技、文化、时尚中心，而且是一座旅游胜地，以它独有的魅力每天吸引无数来自各大洲的宾客与游人。</p>', '2016-12-17 17:47:10', 3, ''),
(6, '骑士拒收安东尼恐埋下祸根，詹姆斯明夏难留克城？', '1413336', '095347.jpg', '<p>&nbsp; &nbsp;<span style="font-family: 宋体; font-size: 14px; line-height: 26px; background-color: rgb(255, 255, 255);">尼克斯已经下定决心要送走卡梅隆-安东尼了，然而，交易的对象却并不包括骑士队。根据近几天的新闻，尼克斯有意用安东尼交易得到乐福，然而却遭到了骑士的断然拒绝。因而，尼克斯已经将交易的对象锁定在了快船和凯尔特人的身上。</span></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体; line-height: 26px; white-space: normal; text-align: center; background-color: rgb(255, 255, 255);"><img src="/ueditor/php/upload/image/20170127/1485482002292659.jpg" alt=""/></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);">　　骑士拒绝用乐福换安东尼的想法，是很容易得到理解的。球队是上赛季的总冠军，乐福则是球队夺冠的重要一员。虽然乐福在季后赛中表现经常掉链子，但在总决赛G7中，他却用一次关键的防守帮助球队夺取总冠军。对于总冠军球队而言，最大的忌讳就是拆散球队现有的架构。一旦骑士换到安东尼，就意味着他们必须在还有不到3个月的时间里完成磨合，来迎接新一年的季后赛。这对于球队争冠而言，并不是什么好事。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);">　　安东尼认为，詹姆斯肯定希望与他一同并肩作战。但是在这件事上，球队的大局更重要，至于詹姆斯和安东尼的关系，只能成为次要考虑的要素。<span style="border: 0px; margin: 0px; padding: 0px;">在是否要用乐福交易安东尼的问题上，骑士肯定会过问詹姆斯的意见。很显然，詹姆斯还没有做好本赛季就和安东尼成为队友的准备。</span></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体; line-height: 26px; white-space: normal; text-align: center; background-color: rgb(255, 255, 255);"><img src="/ueditor/php/upload/image/20170127/1485482002594484.jpg" alt=""/></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体; line-height: 26px; white-space: normal; text-align: center; background-color: rgb(255, 255, 255);"><img src="/ueditor/php/upload/image/20170127/1485482002868080.jpg" alt=""/></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);">　　但是如今的骑士就很出色了吗？未必。球队如今的氛围并不是很好。球队已经遭遇了三连败，包括输给鹈鹕、国王这样实力一般的球队。过去8场2胜6负，骑士东部第一的位置都受到了极其严峻的挑战。克里斯-安德森已经赛季报销，JR-史密斯还在伤病名单上躺着，球队替补控卫的问题仍然没有得到解决，过了32岁生日的詹姆斯每场要打全联盟最多的场均37.6分钟。在输给鹈鹕之后，詹姆斯已经向媒体发飙，表达了对球队运作的不满情绪。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体; line-height: 26px; white-space: normal; text-align: center; background-color: rgb(255, 255, 255);"><img src="/ueditor/php/upload/image/20170127/1485482003645261.jpg" alt=""/></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);">　　詹姆斯确实太累了。划水詹，其实一点都不划水。下图横轴表示该球员在场上的进攻得分，纵轴表示该球员在场上的防守失分情况。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体; line-height: 26px; white-space: normal; text-align: center; background-color: rgb(255, 255, 255);"><img src="/ueditor/php/upload/image/20170127/1485482003118810.jpg" alt=""/></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);">　　结果发现，骑士队只有詹姆斯是在攻守两端都能为球队带来正面帮助的球员。骑士的其他两位巨头乐福和欧文，都只是在进攻端能够帮助球队，防守端却拖了后腿。汤普森、利金斯的防守尚可，但是进攻却拖了球队的后腿。而球队还有很多球员，则处于进攻差、防守也差的象限之中。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);">　　这张图到底能说明多大的问题，还不得而知，<span style="border: 0px; margin: 0px; padding: 0px;">但可以肯定一点的是，骑士目前的阵容臃肿，而且瘸腿，对詹姆斯依赖程度非常高，在阵容构建上的不合理。</span>这使得骑士今年卫冕的前景并不乐观。既然如此，球队为何不考虑交易得到安东尼呢？不交易，球队只能以现有阵容去迎接联盟各路诸侯的挑战，交易，也许会带来负面效应，但也许可以提升球队的想象空间。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体; line-height: 26px; white-space: normal; text-align: center; background-color: rgb(255, 255, 255);"><img src="/ueditor/php/upload/image/20170127/1485482003120002.jpg" alt=""/></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);">　　如果骑士接下来两个赛季没法夺冠呢？那么，当詹姆斯2018年夏天跳出合同之后，他很可能不再与骑士续约。毕竟，他已经兑现了对克利夫兰带来历史上第一座总冠军的诺言了。以詹姆斯的影响力，愿意为他开出顶薪合同的球队不在少数，所以到了明年夏天，他可以真正地进行自己的兄弟篮球了。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体; line-height: 26px; white-space: normal; text-align: center; background-color: rgb(255, 255, 255);"><img src="/ueditor/php/upload/image/20170127/1485482004115884.jpg" alt=""/></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);">　</p><p><br/></p>', '2017-01-27 09:53:48', 4, '骑士拒接尼克斯交易');

-- --------------------------------------------------------

--
-- 表的结构 `tp_knowledgecount`
--

CREATE TABLE IF NOT EXISTS `tp_knowledgecount` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `thumb` int(11) NOT NULL DEFAULT '0' COMMENT '点赞',
  `read` int(11) NOT NULL DEFAULT '0' COMMENT '浏览',
  `comment` int(11) NOT NULL DEFAULT '0' COMMENT '评论',
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='文章附属表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `tp_knowledgecount`
--

INSERT INTO `tp_knowledgecount` (`fid`, `thumb`, `read`, `comment`) VALUES
(1, 9, 62, 6),
(4, 0, 10, 1),
(5, 1, 2, 0),
(6, 1, 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tp_message`
--

CREATE TABLE IF NOT EXISTS `tp_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `messagecontent` text NOT NULL COMMENT '留言内容',
  `publishtime` varchar(32) NOT NULL COMMENT '留言时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='留言表' AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `tp_message`
--

INSERT INTO `tp_message` (`id`, `uid`, `username`, `messagecontent`, `publishtime`) VALUES
(16, 5, '1413333', '<p>看好你哦，加油！</p>', '2016-12-03 15:54:11'),
(17, 3, '1413335', '<p>我来看看咯！</p>', '2016-12-03 20:02:25'),
(19, 5, '1413333', '<p>lailo</p>', '2016-12-14 22:34:46'),
(20, 5, '1413332', '<p>你好，博主</p>', '2017-01-22 15:47:15'),
(24, 5, '1413332', '<p>sss</p>', '2017-01-26 11:04:49'),
(25, 5, '1413332', '<p><img src="http://img.baidu.com/hi/jx2/j_0014.gif"/></p>', '2017-01-26 11:52:10'),
(26, 4, '1413334', '<p>博主你好，我是新来的</p>', '2017-01-27 09:55:58');

-- --------------------------------------------------------

--
-- 表的结构 `tp_pinglun`
--

CREATE TABLE IF NOT EXISTS `tp_pinglun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filed` int(11) NOT NULL COMMENT '文章id',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `uname` varchar(64) NOT NULL COMMENT '用户名',
  `publishtime` varchar(32) NOT NULL COMMENT '评论时间',
  `content` text NOT NULL COMMENT '评论内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='评论表' AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `tp_pinglun`
--

INSERT INTO `tp_pinglun` (`id`, `filed`, `uid`, `uname`, `publishtime`, `content`) VALUES
(1, 1, 5, '1413333', '2016-11-20 14:53:00', '<p>这篇博客还算不错，希望还有好的博客发表</p>'),
(2, 1, 4, '1413334', '2016-11-20 08:05:28', '不错不错，下次继续'),
(3, 1, 6, '1413332', '2016-11-20 19:58:07', '踩踩'),
(4, 3, 6, '1413332', '2016-12-04 19:03:21', '哈哈，还不错'),
(5, 3, 6, '1413332', '2016-12-04 19:04:26', '还不错'),
(6, 3, 6, '1413332', '2016-12-04 19:18:05', '哈哈，不错不错'),
(7, 1, 6, '1413332', '2016-12-04 19:25:42', '感觉还可以吧'),
(8, 3, 6, '1413332', '2016-12-04 19:33:06', '继续加油'),
(9, 3, 6, '1413332', '2016-12-04 20:33:58', '沙发'),
(10, 3, 6, '1413332', '2016-12-04 20:40:04', '猜猜'),
(11, 4, 6, '1413332', '2016-12-04 20:40:34', '好想去伦敦'),
(12, 3, 6, '1413332', '2016-12-12 21:56:22', '恭喜恭喜'),
(13, 3, 5, '1413333', '2016-12-14 22:35:28', 'lailo'),
(14, 1, 5, '1413332', '2017-01-22 15:46:19', '还行吧'),
(15, 1, 5, '1413332', '2017-01-24 21:30:38', '哈哈'),
(16, 6, 4, '1413334', '2017-01-27 09:55:25', '不错不错，终于开始有篮球的博客内容了');

-- --------------------------------------------------------

--
-- 表的结构 `tp_returnmessage`
--

CREATE TABLE IF NOT EXISTS `tp_returnmessage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL COMMENT '留言ID',
  `uid` int(11) NOT NULL COMMENT '留言者ID',
  `mcontent` text NOT NULL COMMENT '回复留言内容',
  `republishtime` varchar(32) NOT NULL COMMENT '回复时间',
  `rname` varchar(64) NOT NULL COMMENT '回复者名字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='回复留言表' AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `tp_returnmessage`
--

INSERT INTO `tp_returnmessage` (`id`, `mid`, `uid`, `mcontent`, `republishtime`, `rname`) VALUES
(2, 16, 5, '<p>哈哈，感谢</p>', '2016-12-03 15:57:15', 'hzx'),
(5, 19, 5, '<p>哈哈</p>', '2017-01-21 14:59:44', 'hzx'),
(6, 19, 5, '<p>哈哈</p>', '2017-01-21 14:59:44', 'hzx'),
(7, 17, 3, '<p>欢迎欢迎\n</p>', '2017-01-21 14:58:26', 'hzx'),
(9, 20, 5, '<p>你好\n</p>', '2017-01-25 22:27:44', 'hzx'),
(14, 24, 5, '<p>111\n</p>', '2017-01-26 11:05:03', 'hzx'),
(15, 26, 4, '<p>欢迎欢迎\n</p>', '2017-01-27 09:56:24', 'hzx'),
(16, 25, 5, '<p><img src="http://img.baidu.com/hi/jx2/j_0002.gif" _src="http://img.baidu.com/hi/jx2/j_0002.gif">\n</p>', '2017-01-27 09:58:36', 'hzx');

-- --------------------------------------------------------

--
-- 表的结构 `tp_user`
--

CREATE TABLE IF NOT EXISTS `tp_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `userpwd` varchar(30) NOT NULL COMMENT '用户密码',
  `state` int(11) NOT NULL DEFAULT '1' COMMENT '用户级别,1表示普通用户,0表示博主',
  `qq` varchar(20) NOT NULL COMMENT 'QQ',
  `phone` varchar(50) NOT NULL COMMENT '电话号码',
  `address` varchar(30) NOT NULL COMMENT '地址',
  `status` int(11) DEFAULT '0' COMMENT '0表示自由评论,1表示被禁言',
  `user_img` varchar(128) DEFAULT NULL COMMENT '用户头像',
  `lasttime` varchar(32) DEFAULT NULL COMMENT '最近登陆',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `tp_user`
--

INSERT INTO `tp_user` (`uid`, `username`, `userpwd`, `state`, `qq`, `phone`, `address`, `status`, `user_img`, `lasttime`) VALUES
(1, '1413336', '123456', 1, '484945648493', '15220036491', '广东省潮州市', 0, '1.jpg', '2017-01-20 23:50:26'),
(3, '1413335', '123456', 1, '444894849', '15229984562', '广东省广州市', 0, 'user.png', '2016-12-03 20:02:10'),
(4, '1413334', '123456', 1, '987654', '15220069857', '广东省潮州市', 0, '4.jpg', '2017-01-27 09:54:24'),
(5, '1413332', '123456', 1, '584994162', '15220036493', '广东省潮州市', 0, '5.jpg', '2017-01-26 15:37:02'),
(6, '1413331', '123456', 1, '432443344', '15220036467', '广东省广州市', 1, '6.jpg', '2016-12-25 11:02:47'),
(7, 'hzx', '123456', 0, '', '', '', 0, 'user.png', '2017-01-27 09:46:58'),
(8, '1413330', '123456', 1, '', '', '', 0, 'user.png', NULL),
(9, '1413337', '', 1, '', '15220036492', '', 0, 'user.png', '2016-12-11 21:07:18'),
(10, 'dzx', '123456', 0, '', '', '', 0, 'user.png', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tp_usermessage`
--

CREATE TABLE IF NOT EXISTS `tp_usermessage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `content` text NOT NULL COMMENT '发表内容',
  `time` varchar(25) NOT NULL COMMENT '发表时间',
  `states` int(11) NOT NULL DEFAULT '0' COMMENT '回复状态',
  `title` text NOT NULL COMMENT '发表标题',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户发表表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `tp_usermessage`
--

INSERT INTO `tp_usermessage` (`id`, `uid`, `content`, `time`, `states`, `title`) VALUES
(1, 3, '第一个占领', '2016-12-11 16:59:00', 1, '第一个占领'),
(2, 6, '请问怎么解决', '2016-12-11 17:22:00', 3, '求助'),
(3, 5, '大王叫我来巡山。。。。。。。', '2016-12-11 18:56:00', 1, '大王叫我来巡山'),
(4, 6, '<p>很高兴在这里跟大家认识</p>', '2016-12-11 19:34:01', 3, '大家好'),
(5, 5, '<p>大家好，很高兴认识大家</p>', '2017-01-22 15:49:18', 0, '大家好');

-- --------------------------------------------------------

--
-- 表的结构 `tp_userremessage`
--

CREATE TABLE IF NOT EXISTS `tp_userremessage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL COMMENT '回复主题',
  `reuid` int(11) NOT NULL COMMENT '回复者ID',
  `recontent` text NOT NULL COMMENT '回复内容',
  `retime` varchar(25) NOT NULL COMMENT '回复时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户回复表' AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `tp_userremessage`
--

INSERT INTO `tp_userremessage` (`id`, `mid`, `reuid`, `recontent`, `retime`) VALUES
(1, 1, 4, '我来也', '2016-12-11 17:00:00'),
(2, 2, 5, '你说说有什么难题', '2016-12-11 19:18:40'),
(3, 2, 5, '不说没', '2016-12-11 19:20:46'),
(9, 2, 6, '我来插楼', '2016-12-11 19:31:32'),
(10, 3, 6, '插楼！', '2016-12-11 19:32:32'),
(11, 4, 5, 'dddd', '2016-12-14 22:34:17'),
(12, 4, 5, '你好', '2017-01-22 15:48:48'),
(13, 4, 5, '111', '2017-01-26 12:05:48');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
