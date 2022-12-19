-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-12-19 09:58:20
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `study_project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `collect`
--

CREATE TABLE `collect` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `house` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `collect`
--

INSERT INTO `collect` (`id`, `user`, `house`) VALUES
(12, 'tenant', 1),
(13, 'tenant', 12);

-- --------------------------------------------------------

--
-- 資料表結構 `contract`
--

CREATE TABLE `contract` (
  `ID` int(11) NOT NULL,
  `rng` text NOT NULL,
  `landlord_ID` text NOT NULL,
  `tenant_ID` text DEFAULT NULL,
  `houseaddress` text NOT NULL,
  `h_size` text NOT NULL,
  `type` text NOT NULL,
  `pattern` text NOT NULL,
  `rent_Time_Start` date NOT NULL,
  `rent_Time_End` date NOT NULL,
  `deposit` text NOT NULL,
  `rent` text NOT NULL,
  `utility_bill` text NOT NULL,
  `landlord` text NOT NULL,
  `tenant` text DEFAULT NULL,
  `area` text NOT NULL,
  `parking` text NOT NULL,
  `furniture` text NOT NULL,
  `public` text NOT NULL,
  `others` text NOT NULL,
  `wallet_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `contract`
--

INSERT INTO `contract` (`ID`, `rng`, `landlord_ID`, `tenant_ID`, `houseaddress`, `h_size`, `type`, `pattern`, `rent_Time_Start`, `rent_Time_End`, `deposit`, `rent`, `utility_bill`, `landlord`, `tenant`, `area`, `parking`, `furniture`, `public`, `others`, `wallet_address`) VALUES
(1, 'uRgLTL9ikCQsrocaR5nwDRvvB6sDlsWT7SIm6tpiSC0SrUARW0kiRViutSx9fQsw', '123', NULL, '台中市北區台中市北區進化北路', '6', '獨立套房/公寓', '1房1衛 - 1陽台', '2022-12-05', '2023-12-06', '12400', '6200', '租金內含水費 台電計價', '789', NULL, '256', '無', '網路、第四台、洗衣機、飲水機、液晶電視、冰箱、冷氣、電熱水器、電風扇', '無', '不可飼養寵物', '0xbD65a93FFb01483decBd6B5b3695a0b6ccfFd250'),
(2, 'ZFbIk25GTOvglq3V3ht37UyLVbwKAtDlg5rnaD9O3zqHFNpQbQBi0zn57pVfXEr4', '123', NULL, '台北市文山區文山區秀明路一段79巷1弄8號', '7', '公寓', '獨立套房', '2022-12-05', '2022-12-17', '押金面議 ', '13999', '台電', '789', NULL, '全部', '無', '冰箱  洗衣機  電視  冷氣  熱水器  床  衣櫃  第四台  網路  天然瓦斯  沙發  桌椅', '飲水機', '此房屋男女皆可租住', '0xbD65a93FFb01483decBd6B5b3695a0b6ccfFd250');

-- --------------------------------------------------------

--
-- 資料表結構 `house`
--

CREATE TABLE `house` (
  `ID` int(11) NOT NULL,
  `owner` text NOT NULL,
  `title` text NOT NULL,
  `county` text NOT NULL,
  `township` text NOT NULL,
  `address` text NOT NULL,
  `h_size` smallint(6) NOT NULL,
  `type` text NOT NULL,
  `pattern` text NOT NULL,
  `deposit` text NOT NULL,
  `rent` int(11) NOT NULL,
  `utility_bill` text NOT NULL,
  `parking` text NOT NULL,
  `furniture` text NOT NULL,
  `public` text NOT NULL,
  `others` text NOT NULL,
  `description` text NOT NULL,
  `remain` text NOT NULL,
  `img` text DEFAULT NULL,
  `house_delete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `house`
--

INSERT INTO `house` (`ID`, `owner`, `title`, `county`, `township`, `address`, `h_size`, `type`, `pattern`, `deposit`, `rent`, `utility_bill`, `parking`, `furniture`, `public`, `others`, `description`, `remain`, `img`, `house_delete`) VALUES
(1, 'landlord', '內埔獨立套房', '屏東縣', '內埔鄉', '學府路一號', 7, '套房', '一房', '一個月租金', 5000, '台電計費，台水計費', '無', '單人床*1 桌椅*1 衣櫃*1 冰箱*1 洗衣機*1', '飲水機 ', '禁菸禁寵', '獨立衛浴含洗衣機 近學校', '0', '1', NULL),
(5, '123', '新北市房屋出租', '屏東縣', '內埔鄉', '學府路一號', 10, '公寓', '一房', '5000', 17000, '台電計價', '無', '桌子、椅子、床各一張', '洗衣機', '無', '無', '1', NULL, NULL),
(10, 'B10856042', '德賢商圈獨立套房', '高雄市', '楠梓區', '德民路356巷', 7, '套房', '套房', '10000', 5000, '台電計價', '無', '床、書桌、椅子、床', '電梯', '無', '可馬上入住', '0', '1', NULL),
(11, '123', '急租近政大世新4全新日式套房，樓下公車站', '台北市', '文山區', '秀明路一段79巷1弄8號', 7, '公寓', '獨立套房', '押金面議 ', 13999, '台電', '無', '冰箱  洗衣機  電視  冷氣  熱水器  床  衣櫃  第四台  網路  天然瓦斯  沙發  桌椅', '飲水機', '此房屋男女皆可租住', '最短租期一年，可隨時遷入', '1', '1', NULL),
(12, '456', '三重中正北路~一卡皮箱即可入住', '新北市', '三重區', '中正北路', 20, '整層住家/公寓', '1房1廳1衛 - 1陽台1廚房', '兩個月租金', 20000, '台電計價，房租含水費', '無', '設備 :液晶電視、冰箱、 冷氣、 電熱水器、 傢俱、 衣櫥、餐桌、餐椅、置物櫃、雙人床、書桌、書架、椅子、雙人(以上)沙發', '無', '不可飼養寵物', '液晶電視、冷暖分離式空調、衛浴乾溼分離、有陽台、巷口有自助洗衣店、靠近穀保家商、更寮國小、愛買、全聯、便利商店、三重果菜市場', '0', '1', NULL),
(13, '456', '中西區河樂廣場旁飯店式套房', '台南市', '中西區', '金華路三段', 5, '分租套房', '1房1廳1衛', '兩個月租金', 10000, '電1度5.5元、租金內含 水費', '無', '設備 網路、第四台、洗衣機、脫水機、烘衣機、飲水機、濾水器、液晶電視、冰箱、冷氣、電熱水器、電磁爐、熱水器', '無', '整層禁菸(有提供河堤景觀後陽台為吸菸區)、禁吵鬧、禁會大叫的寵物、禁止  祭祀', '鄰居單純上班族、學生，禁特殊行業，須提  供工作證明。', '0', '1', NULL),
(14, '456', '亞灣區北歐風套房', '高雄市', '苓雅區', '苓雅二路', 12, '獨立套房', '1房1廳1衛 - 1陽台1廚房', '兩個月租金', 9800, '台電計價，房租', '有', '設備 網路、第四台、洗衣機、飲水機、濾水器、液晶電視、冰箱冷氣、電熱水器、熱水器', '無', '可飼養寵物 ', 'gogoro電池交換站宏佳騰苓雅中華店站Tesla目的地充電站高雄大遠百', '0', '1', NULL),
(15, '123', '獨洗獨曬 溫馨小套房', '台中市', '北區', '進化北路', 6, '獨立套房/公寓', '1房1衛 - 1陽台', '二個月租金', 6200, '租金內含水費 台電計價', '無', '網路、第四台、洗衣機、飲水機、液晶電視、冰箱、冷氣、電熱水器、電風扇', '無', '不可飼養寵物', '溫馨小套房 採光好 通風佳 交通便捷 獨洗獨曬 一卡皮箱就可入住', '1', '1', NULL),
(16, '123', '面南高樓近遠百/三房平車含管/屋主自租', '新竹縣', '竹北市', '勝利八街一段 /國賓大悅', 48, '整層住家', '3房2廳2衛 - 1陽台1廚房', '兩個月租金', 27500, '台電', '無', '冷氣、瓦斯爐、電熱水器、天然瓦斯、熱水器', '電梯', '身分要求 :上班族、家庭、不可飼養寵物', '❤️⭐️⭐️全新變頻 冷暖氣機⭐️⭐️❤️ ✨✨停車位離電梯近✨✨ 禁煙，禁寵', '1', '1', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `type` text NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `type`, `name`, `phone`) VALUES
('123', '456', 'abc@gmail.com', 'landlord', '789', 'phone'),
('456', '789', 'abcD@gmail.com', 'landlord', '孫中山', '0903033158'),
('56042', '1234', 'jason.boy0107@gmail.com', 'landlord', '1', 'phone'),
('56042t', '1234', 'x831245x@gmail.com', 'tenant', '1', '1'),
('789', '456', 'abc@gmail.com', 'tenant', '123', '1'),
('87', '87', '87@87', 'landlord', '87', '87'),
('B10856042', '1234', 'jason.boy0107@gmail.com', 'landlord', '羅子修', 'phone'),
('landlord', 'landlord', 'landlord', 'landlord', 'landlord', 'phone'),
('tenant', 'tenant', 'tenant', 'tenant', 'tenant', '1');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `collect`
--
ALTER TABLE `collect`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `rng` (`rng`) USING HASH;

--
-- 資料表索引 `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`(12));

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `collect`
--
ALTER TABLE `collect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `contract`
--
ALTER TABLE `contract`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `house`
--
ALTER TABLE `house`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
