/*
 Navicat Premium Data Transfer

 Source Server         : 1
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : 127.0.0.1:3306
 Source Schema         : puppet_db

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 01/01/2026 19:48:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for myth_stories
-- ----------------------------
DROP TABLE IF EXISTS `myth_stories`;
CREATE TABLE `myth_stories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '故事ID（自增主键）',
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '故事标题（如盘古开天、精卫填海）',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '故事详细内容',
  `puppet_intro` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '相关木偶戏介绍',
  `img_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '../img/myth/default.jpg' COMMENT '故事图片路径（可选扩展）',
  `create_time` datetime NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE,
  FULLTEXT INDEX `title_content`(`title`, `content`)
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '木偶戏神话故事表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of myth_stories
-- ----------------------------
INSERT INTO `myth_stories` VALUES (1, '盘古开天', '传说在宇宙诞生之初，整个世界是一片混沌的元气，像一个巨大的鸡蛋。盘古就孕育在其中，经过一万八千年的沉睡，他终于醒来。他拿起斧头，奋力劈开混沌，轻而清的元气上升成为天，重而浊的元气下沉成为地。为了防止天地再次合拢，盘古头顶天、脚踏地，每天长高一丈，如此又过了一万八千年，天变得极高，地变得极厚，盘古也力竭而亡。他的身体化为了世间万物，气息变成风云，声音变成雷霆，左眼变成太阳，右眼变成月亮，四肢五体变成四极五岳，血液变成江河……', '盘古开天木偶戏采用了巨型木偶造型，盘古木偶身高达3米，由3名艺人共同操控。表演中通过光影效果模拟天地混沌到分开的过程，木偶的肢体动作刚劲有力，还原了盘古开天的磅礴气势。', '../img/story1.png', '2025-12-13 15:12:59');
INSERT INTO `myth_stories` VALUES (2, '精卫填海', '炎帝的小女儿女娃，一日到东海游玩，不幸被海浪吞噬。女娃死后，她的灵魂化作一只花脑袋、白嘴壳、红爪子的小鸟，每天从山上衔来石头和草木，投入东海，发誓要把大海填平。人们把这只小鸟叫做“精卫”。', '精卫填海木偶戏的亮点在于精卫木偶的灵动性，艺人通过细线操控木偶的翅膀和嘴部，让精卫的飞行动作栩栩如生。舞台背景采用动态海水特效，与木偶表演结合，展现出精卫不屈的精神。', '../img/story2.png', '2025-12-13 15:12:59');
INSERT INTO `myth_stories` VALUES (3, '后羿射日', '远古时期，天空中出现了十个太阳，烤焦了大地，庄稼枯死，百姓流离失所。后羿是一位神射手，他同情百姓的遭遇，拿起神弓，射下了九个太阳，只留下一个太阳照耀大地，万物得以复苏。', '后羿射日木偶戏中，后羿的弓箭采用了机关设计，射日时能模拟箭支射出的效果，十个太阳木偶则通过灯光变化表现被射落的过程，场面壮观，深受观众喜爱。', '../img/story3.png', '2025-12-13 15:12:59');
INSERT INTO `myth_stories` VALUES (4, '嫦娥奔月', '后羿射日后获西王母赐不死仙药，交于妻子嫦娥保管。逢蒙觊觎仙药，趁后羿外出逼迫嫦娥交出，嫦娥无奈吞药，飞升月宫，独守广寒宫与玉兔为伴，中秋之夜常被世人仰望思念。', '嫦娥奔月木偶戏以梦幻蓝调为舞台基调，嫦娥木偶着轻盈丝绸服饰，通过吊线操控模拟腾空效果；月宫场景用全息投影呈现，搭配玉兔木偶的灵动动作，营造出清冷仙境氛围。', '../img/story4.png', '2025-12-13 15:19:11');
INSERT INTO `myth_stories` VALUES (5, '夸父追日', '上古巨人夸父见太阳炙烤大地，立志追日以控其行。他一路奔袭，渴饮黄河、渭水，终体力耗尽而亡，身体化为夸父山，木杖化作桃林，为后人遮阴解渴。', '夸父追日木偶戏采用杖头工艺，2.5米高的夸父木偶通过木杖操控实现奔跑、饮水动作；舞台背景以滚动光影模拟太阳移动，配合激昂配乐，展现其不屈精神。', '../img/story5.png', '2025-12-13 15:19:11');
INSERT INTO `myth_stories` VALUES (6, '女娲补天', '远古天塌地陷，洪水猛兽肆虐，女娲炼五色石补苍天，斩鳌足撑四极，杀黑龙、积芦灰止洪，终使天地秩序恢复，人类得以存续。', '女娲补天木偶戏中，五色石采用发光琉璃材质，女娲木偶手部通过细线操控模拟炼石、补天动作；洪水、天火特效以水雾+灯光呈现，场面震撼。', '../img/story6.png', '2025-12-13 15:19:11');
INSERT INTO `myth_stories` VALUES (7, '哪吒闹海', '陈塘关李靖三子哪吒，在东海与敖丙冲突，杀敖丙抽龙筋。东海龙王欲水淹陈塘关，哪吒割肉剔骨还父母，后被太乙真人以莲花重塑肉身，成莲花童子。', '哪吒闹海木偶戏结合提线与杖头工艺，哪吒的混天绫、火尖枪可通过机关实现挥舞、喷火效果；东海龙宫用透明亚克力板+蓝光模拟海底，敖丙龙形木偶可灵活游动。', '../img/story7.png', '2025-12-13 15:19:11');
INSERT INTO `myth_stories` VALUES (8, '八仙过海', '铁拐李、汉钟离等八仙在蓬莱聚会后，欲渡东海往方丈仙山，各施神通（铁拐李浮拐、张果老倒骑驴等），途中与东海龙王冲突，最终合力渡海成功。', '八仙过海木偶戏含8个主角木偶，各配专属道具（张果老毛驴可倒走、何仙姑荷花能绽放）；舞台采用水陆布景+烟雾特效，展现“各显神通”的生动场景。', '../img/story8.png', '2025-12-13 15:19:11');
INSERT INTO `myth_stories` VALUES (9, '大禹治水', '尧舜时洪水泛滥，鲧治水九年无果被诛，禹承父业，改“堵”为“疏”，劈龙门通江河，在外治水十三年三过家门而不入，终治洪水安百姓。', '大禹治水木偶戏舞台设水系模型，大禹木偶的锄头可实现挖掘、劈山动作；通过机械装置模拟洪水疏导过程，配合群演木偶，展现治水的艰辛与决心。', '../img/story9.png', '2025-12-13 15:19:11');

-- ----------------------------
-- Table structure for puppet_inheritors
-- ----------------------------
DROP TABLE IF EXISTS `puppet_inheritors`;
CREATE TABLE `puppet_inheritors`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '人物ID',
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '传承人姓名',
  `generation` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '传承辈分（如“第五代传人”）',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '人物介绍（经历、技艺专长、成就）',
  `specialty` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '技艺专长（逗号分隔）',
  `img_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '../img/inherit/inherit1.png' COMMENT '人物配图路径',
  `sort` tinyint(4) NULL DEFAULT 0 COMMENT '展示排序',
  `create_time` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_name`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '木偶戏传承人物数据表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of puppet_inheritors
-- ----------------------------
INSERT INTO `puppet_inheritors` VALUES (1, '张木生', '第五代木偶雕刻传人', '1. 经历：12岁跟随父亲学习木偶雕刻，从事行业50余年，累计雕刻神话木偶超千件；\n2. 专长：擅长盘古、后羿等神话人物的头部塑形，雕刻的木偶五官神态栩栩如生；\n3. 成就：获“国家级非物质文化遗产传承人”称号，作品被中国木偶剧院收藏。', '樟木雕刻,神话人物塑形,矿物颜料彩绘', '../img/inherit1.png', 1, '2025-12-13 20:31:06');
INSERT INTO `puppet_inheritors` VALUES (2, '李线翁', '第六代提线木偶传人', '1. 经历：自幼跟随祖父学习提线操控技艺，精通20余条提线的同步操控；\n2. 专长：擅长后羿射日、哪吒闹海等神话木偶的提线布局与动作设计；\n3. 成就：多次代表中国赴海外演出，其提线技艺被收录入《非遗技艺大典》。', '提线布局,木偶操控,舞台动作设计', '../img/inherit2.png', 2, '2025-12-13 20:31:06');
INSERT INTO `puppet_inheritors` VALUES (3, '王绣娘', '第四代木偶服饰传人', '1. 经历：出身刺绣世家，专注木偶戏服制作40年，精通苏绣、湘绣等多种针法；\n2. 专长：擅长神话木偶的戏服刺绣与配饰制作，嫦娥的桂花纹样为其经典设计；\n3. 成就：设计的《嫦娥奔月》戏服获“非遗技艺创新奖”。', '苏绣,戏服裁剪,神话配饰制作', '../img/inherit3.png', 3, '2025-12-13 20:31:06');
INSERT INTO `puppet_inheritors` VALUES (4, '陈戏师', '第七代木偶表演传人', '1. 经历：从事木偶表演60年，擅长神话木偶戏的舞台演绎与剧情编排；\n2. 专长：一人操控多偶，能同时完成盘古、精卫等角色的互动表演；\n3. 成就：创办木偶戏培训班，培养非遗传承人超百名。', '木偶表演,剧情编排,技艺教学', '../img/inherit4.png', 4, '2025-12-13 20:50:15');
INSERT INTO `puppet_inheritors` VALUES (5, '赵道具', '第三代道具制作传人', '1. 经历：专注木偶戏道具制作35年，精通神话场景道具的设计与制作；\n2. 专长：嫦娥的月宫、哪吒的风火轮等道具的机关设计，特效逼真；\n3. 成就：为《夸父追日》木偶戏设计的太阳道具获“非遗道具创新奖”。', '道具设计,机关制作,场景搭建', '../img/inherit5.png', 5, '2025-12-13 20:50:15');
INSERT INTO `puppet_inheritors` VALUES (6, '林彩绘', '第五代木偶彩绘传人', '1. 经历：自幼学习矿物颜料彩绘，专注木偶面部妆造40年；\n2. 专长：擅长神话角色的“开脸”技法，嫦娥的眉眼、后羿的轮廓刻画精准；\n3. 成就：其彩绘作品被收录进《中国木偶艺术图鉴》。', '矿物颜料彩绘,木偶开脸,妆面设计', '../img/inherit6.png', 6, '2025-12-13 20:50:15');
INSERT INTO `puppet_inheritors` VALUES (7, '王提线', '第六代提线技艺传人', '1. 经历：15岁跟随师父学习提线布局，精通20余条提线的同步操控；\n2. 专长：为《哪吒闹海》设计的“混天绫提线系统”，实现木偶360°旋转动作；\n3. 成就：多次参与国际木偶节表演，提线技艺获“非遗技艺大师”称号。', '提线布局,多线操控,动作系统设计', '../img/inherit7.png', 7, '2025-12-13 20:50:15');

-- ----------------------------
-- Table structure for puppet_performances
-- ----------------------------
DROP TABLE IF EXISTS `puppet_performances`;
CREATE TABLE `puppet_performances`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '表演ID',
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '表演名称（如“盘古开天木偶戏”）',
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '表演类型（如“神话类”“传统故事类”）',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '表演详情（剧情、特色、时长）',
  `duration` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '表演时长（如“45分钟”）',
  `img_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '../img/perform/perform1.png' COMMENT '表演配图路径',
  `sort` tinyint(4) NULL DEFAULT 0 COMMENT '展示排序',
  `create_time` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_category`(`category`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '木偶戏经典表演数据表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of puppet_performances
-- ----------------------------
INSERT INTO `puppet_performances` VALUES (1, '《盘古开天》木偶戏', '神话类', '1. 剧情：还原盘古劈开混沌、身化万物的神话场景；\n2. 特色：采用3米巨型木偶+全息投影营造“天地初开”特效；\n3. 亮点：艺人通过20条提线同步操控盘古木偶的劈砍动作，配合鼓点节奏增强张力。', '45分钟', '../img/perform1.png', 1, '2025-12-13 20:27:18');
INSERT INTO `puppet_performances` VALUES (2, '《精卫填海》木偶戏', '神话类', '1. 剧情：展现女娃溺亡化精卫、衔石填海的执着故事；\n2. 特色：精卫木偶采用“翎毛提线”工艺，翅膀动作轻盈灵动；\n3. 亮点：舞台用动态水幕模拟东海场景，配合鸟鸣音效增强沉浸感。', '40分钟', '../img/perform2.png', 2, '2025-12-13 20:27:18');
INSERT INTO `puppet_performances` VALUES (3, '《后羿射日》木偶戏', '神话类', '1. 剧情：演绎后羿射落九日、拯救苍生的传奇；\n2. 特色：太阳木偶用发光绒布制作，射日动作配合“箭簇弹射”机关；\n3. 亮点：艺人一人操控后羿+弓箭两套木偶，实现“拉弓-射箭”连贯动作。', '50分钟', '../img/perform3.png', 3, '2025-12-13 20:27:18');
INSERT INTO `puppet_performances` VALUES (4, '《嫦娥奔月》木偶戏', '神话类', '1. 剧情：展现嫦娥吞药飞升、独守广寒宫的故事；\n2. 特色：嫦娥木偶用“飘带提线”工艺，衣袂动作如行云流水；\n3. 亮点：舞台用冷光模拟月宫氛围，玉兔木偶与嫦娥的互动细腻传神。', '40分钟', '../img/perform4.png', 4, '2025-12-13 20:28:59');
INSERT INTO `puppet_performances` VALUES (5, '《哪吒闹海》木偶戏', '神话类', '1. 剧情：还原哪吒闹海、剔骨还父的经典情节；\n2. 特色：哪吒木偶配备“混天绫机关”，可实现缠绕、舒展动作；\n3. 亮点：东海龙宫场景用透明亚克力+蓝色灯光营造，龙形木偶可喷水特效。', '50分钟', '../img/perform5.png', 5, '2025-12-13 20:28:59');
INSERT INTO `puppet_performances` VALUES (6, '《夸父追日》木偶戏', '神话类', '1. 剧情：还原夸父追逐太阳、身化桃林的壮烈故事；\n2. 特色：夸父木偶身高2.8米，采用杖头+提线结合工艺，奔跑动作幅度达1.5米；\n3. 亮点：舞台用滚动光影模拟太阳移动，配合干冰烟雾营造“逐日”的苍茫氛围。', '45分钟', '../img/perform6.png', 6, '2025-12-13 20:44:42');
INSERT INTO `puppet_performances` VALUES (7, '《女娲补天》木偶戏', '神话类', '1. 剧情：展现女娲炼石补天、拯救苍生的史诗场景；\n2. 特色：五色石木偶用发光琉璃制作，补天动作配合“石片拼接”机关；\n3. 亮点：舞台顶部设全息穹顶，模拟天塌地陷的特效，视觉冲击力强。', '50分钟', '../img/perform7.png', 7, '2025-12-13 20:44:42');
INSERT INTO `puppet_performances` VALUES (8, '《八仙过海》木偶戏', '神话类', '1. 剧情：演绎八仙各显神通、渡海赴会的趣味故事；\n2. 特色：8个木偶同时登场，每个角色配备专属道具（如张果老的倒骑驴、何仙姑的荷花）；\n3. 亮点：舞台设“水陆双场景”，水面用蓝色绸缎模拟，配合烟雾特效展现“过海”场景。', '55分钟', '../img/perform8.png', 8, '2025-12-13 20:44:42');
INSERT INTO `puppet_performances` VALUES (9, '《大禹治水》木偶戏', '神话类', '1. 剧情：还原大禹十三年治水、三过家门而不入的故事；\n2. 特色：洪水场景用动态水幕+小型喷泉模拟，大禹木偶的锄头可实现“劈山疏河”动作；\n3. 亮点：融入群演木偶（百姓、工匠），展现治水的集体协作氛围。', '50分钟', '../img/perform9.png', 9, '2025-12-13 20:44:42');

-- ----------------------------
-- Table structure for puppet_techniques
-- ----------------------------
DROP TABLE IF EXISTS `puppet_techniques`;
CREATE TABLE `puppet_techniques`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '技艺唯一ID',
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '技艺分类（如木偶雕刻、服饰妆造）',
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '技艺名称',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '技艺详情（步骤、要点）',
  `tools` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '所需工具（逗号分隔）',
  `img_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '../img/tech/default.png' COMMENT '技艺配图路径',
  `sort` tinyint(4) NULL DEFAULT 0 COMMENT '展示排序',
  `create_time` datetime NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_category`(`category`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '木偶戏制作技艺数据表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of puppet_techniques
-- ----------------------------
INSERT INTO `puppet_techniques` VALUES (1, '木偶雕刻', '木雕木偶头部塑形', '1. 选料：选用樟木/黄杨木（质地细腻不易开裂）；\n2. 粗胚：用凿子勾勒头部轮廓（眉眼间距按“三庭五眼”比例）；\n3. 精修：用刻刀细化五官（神话角色用锐利线条）；\n4. 打磨：用200-800目砂纸层层打磨至哑光。', '凿子,刻刀,砂纸,墨斗', '../img/tech1.png', 1, '2025-12-13 18:03:09');
INSERT INTO `puppet_techniques` VALUES (2, '服饰妆造', '传统戏服刺绣与妆面', '1. 选料：真丝缎面手工裁剪（神话角色用织锦缎）；\n2. 刺绣：按人设绣纹样（盘古衣袍绣云雷纹）；\n3. 妆面：矿物颜料手绘，朱砂点眉、花青勾眼。', '绣线,绣绷,矿物颜料,熨斗', '../img/tech2.png', 2, '2025-12-13 18:03:09');
INSERT INTO `puppet_techniques` VALUES (3, '提线设计', '神话木偶提线布局', '1. 定点：肩部/手肘/道具处设提线点（后羿弓箭加2条副线）；\n2. 线长：主提线1.5米，副线1米；\n3. 配重：背部加铅块，保证悬起时平衡。', '棉线,铅块,打孔器,剪刀', '../img/tech3.png', 3, '2025-12-13 18:03:09');
INSERT INTO `puppet_techniques` VALUES (4, '木偶雕刻', '木偶木料防虫与防潮处理', '1. 选材后：将木料放入通风处自然风干6-12个月，去除内部水分；\n2. 蒸煮：把风干后的木料放入大锅，加樟木粉、花椒煮2小时（利用天然香料防虫）；\n3. 烘干：放入低温烘箱（40℃）烘干48小时，避免木料开裂；\n4. 上蜡：冷却后涂抹蜂蜡，用棉布擦拭形成保护膜（防潮同时增加木质光泽）。', '大锅,樟木粉,花椒,烘箱,蜂蜡,棉布', '../img/tech4.png', 4, '2025-12-13 18:07:00');
INSERT INTO `puppet_techniques` VALUES (5, '服饰妆造', '神话木偶配饰手工制作', '1. 选材：嫦娥的玉兔配饰用软陶塑形，后羿的弓箭用竹片+牛筋制作；\n2. 塑形：软陶配饰放入烤箱120℃烘烤定型，竹片弓箭用砂纸打磨光滑；\n3. 上色：用丙烯颜料绘制纹样（玉兔饰红纹，弓箭描金漆）；\n4. 固定：用细铜丝将配饰固定在木偶身上，保证操控时不脱落。', '软陶,竹片,牛筋,丙烯颜料,铜丝,烤箱', '../img/tech5.png', 5, '2025-12-13 18:07:00');
INSERT INTO `puppet_techniques` VALUES (6, '提线设计', '提线木偶操控杆定制', '1. 选料：选用楠竹杆（质地坚硬且轻便），长度按艺人身高定为1.2米；\n2. 开槽：在杆顶开槽（深度1cm），用于固定提线的金属环；\n3. 包胶：杆身缠绕防滑橡胶圈（增加握持感）；\n4. 校准：将提线与金属环连接后，测试操控杆的平衡度，调整槽位位置。', '楠竹杆,金属环,防滑橡胶圈,开槽刀,砂纸', '../img/tech6.png', 6, '2025-12-13 18:07:00');
INSERT INTO `puppet_techniques` VALUES (7, '木偶彩绘', '木偶面部矿物颜料彩绘技法', '1. 打底：用白色矿物颜料（白垩）均匀涂抹木偶面部，形成底色；\n2. 勾线：用花青颜料勾勒五官轮廓，线条粗细按角色年龄调整（少年细线条，老者粗线条）；\n3. 上色：朱砂涂唇，赭石涂脸颊，石绿点眉（神话角色可加金色眼影）；\n4. 固色：涂抹一层清漆，防止颜料脱落，同时保持哑光质感。', '白垩,花青,朱砂,赭石,石绿,清漆,毛笔', '../img/tech7.png', 7, '2025-12-13 18:07:00');
INSERT INTO `puppet_techniques` VALUES (8, '关节组装', '木偶关节牛筋绳串联与调试', '1. 打孔：在木偶四肢关节处打直径2mm的孔，孔位需对齐（保证活动顺畅）；\n2. 穿绳：将牛筋绳浸泡温水后穿入孔中，打结固定（浸泡后牛筋绳更有弹性）；\n3. 调试：反复活动关节，调整牛筋绳的松紧度（过松易晃，过紧活动受限）；\n4. 定型：在绳结处涂抹少量蜂蜡，防止牛筋绳老化松脱。', '牛筋绳,打孔钻,温水,蜂蜡,剪刀', '../img/tech8.png', 8, '2025-12-13 18:07:00');
INSERT INTO `puppet_techniques` VALUES (9, '道具制作', '神话木偶戏场景道具制作', '1. 选材：月宫场景的桂树用干树枝+绿色绒布制作，东海场景的海浪用透明亚克力板塑形；\n2. 塑形：树枝缠绕绒布模拟桂叶，亚克力板加热弯曲成海浪形状；\n3. 上色：桂树涂深绿漆，海浪涂蓝白渐变漆；\n4. 固定：将道具固定在舞台底座，预留木偶活动空间。', '干树枝,绿色绒布,亚克力板,漆料,加热枪,底座', '../img/tech9.png', 9, '2025-12-13 18:07:00');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '123456', '2025-12-13 13:49:27');
INSERT INTO `users` VALUES (2, 'admin123', 'admmin123', '2025-12-13 14:22:04');
INSERT INTO `users` VALUES (3, 'momo123', 'momo123123', '2025-12-13 21:35:28');
INSERT INTO `users` VALUES (4, 'jijiuu', 'jijiuu123', '2025-12-30 21:22:03');

SET FOREIGN_KEY_CHECKS = 1;
