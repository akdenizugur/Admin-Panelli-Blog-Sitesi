-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Haz 2021, 22:02:37
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `revive`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `about`
--

CREATE TABLE `about` (
  `biography_id` int(11) UNSIGNED NOT NULL,
  `biography_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `biography_about` text COLLATE utf8_turkish_ci NOT NULL,
  `biography_about_long` text COLLATE utf8_turkish_ci NOT NULL,
  `about_me` text COLLATE utf8_turkish_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `about`
--

INSERT INTO `about` (`biography_id`, `biography_name`, `biography_about`, `biography_about_long`, `about_me`, `facebook`, `twitter`, `instagram`, `youtube`) VALUES
(1, 'Uğur Akdeniz', 'Kırşehir Ahi Evran Üniversitesi Bilgisayar Mühendisliği Bölümü 3.Sınıf Öğrencisiyim. Aşağıdaki Bağlantıdan Hakkımda Daha Fazla Bilgi Sahibi Olabilirsiniz.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Hayata yön vermeye çalışırken, hayatın farklı yollara yönelttiği, yolumu bulmak için kestirmeden gitmek yerine daha güvenli yolları tercih etmeye çalışan bir kişiyim.', 'https://facebook.com/ugur.akdeniz.12', 'https://twitter.com/ugurakdeniz122', 'https://www.instagram.com/ugurakdeniz12', 'https://www.youtube.com/channel/UCLQAPS7LV7fo8VDPdjrGxCQ?view_as=subscriber');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Tıp'),
(10, 'Mühendislik'),
(12, 'Spor');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `comment_email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `body` text COLLATE utf8_turkish_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Unapproved',
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `contact_surname` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `contact_message` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `contact_date` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `contact_ip` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_surname`, `contact_email`, `contact_message`, `contact_date`, `contact_ip`) VALUES
(6, 'sad', 'SADSADSAD', 'asddasd@gmail.com', 'asd', '26.09.2020', '::1'),
(7, 'Uğur', 'Akdeniz', 'ugurakdeniz@gmail.com', 'Merhaba', '23.05.2021', '::1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `post_category` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_author` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `post_content` text COLLATE utf8_turkish_ci NOT NULL,
  `post_date` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `post_image` text COLLATE utf8_turkish_ci NOT NULL,
  `post_comment_count` int(255) NOT NULL,
  `post_views` int(255) NOT NULL,
  `post_tags` text COLLATE utf8_turkish_ci NOT NULL,
  `post_status` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'draft',
  `post_track` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_category`, `post_category_id`, `post_author`, `post_content`, `post_date`, `post_image`, `post_comment_count`, `post_views`, `post_tags`, `post_status`, `post_track`) VALUES
(93, 'Makine Öğrenimi Bölüm-1', 'Mühendislik', 10, 'ugurakdeniz', '<p style=\"text-align:justify\">Makine &ouml;ğrenimi yapısal olarak &ouml;ğrenebilen ve veriler &uuml;zerinde anlamlı tahminler yapabilen bilgisayar algoritmalarının genel adıdır. Bu algoritmalar temelde &ouml;rnek verilerden model oluşturarak &ccedil;alışmaktadırlar.</p>\r\n\r\n<p style=\"text-align:justify\">G&uuml;n&uuml;m&uuml;zde &ccedil;ok b&uuml;y&uuml;k miktarda verinin elle işlenmesi ve analizinin yapılması m&uuml;mk&uuml;n değildir. Bu nedenle verilen bir problemi &ccedil;&ouml;zmek i&ccedil;in probleme ait ortamdan elde edilen veriyi makine &ouml;ğrenmesi algoritmalarıyla eğiterek &ccedil;&ouml;z&uuml;me ulaşmak ama&ccedil;lanmaktadır.</p>\r\n\r\n<p style=\"text-align:justify\">Makine &Ouml;ğrenme algoritmaları temelde 2 gruba ayrılır:</p>\r\n\r\n<p style=\"text-align:justify\"><em>G&ouml;zetimli &Ouml;ğrenme (Supervised Learning)</em>:</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">G&ouml;zetimli &ouml;ğrenme y&ouml;nteminde, eğitim verisi &ldquo;label&rdquo; (etiket) bilgisi i&ccedil;ermektedir. Yani &ccedil;&ouml;z&uuml;m i&ccedil;in model geliştirmede sonu&ccedil;ları bilinen verilerden yararlanılmaktadır. Bu sayede oluşturulan model temel alınarak veri k&uuml;mesi i&ccedil;erisinde etiket bilgisi mevcut olmayan verilerin sonu&ccedil;larının tahmin edilmesi ama&ccedil;lanmaktadır.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">En &ccedil;ok kullanılan g&ouml;zetimli &ouml;ğrenme algoritmaları:</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">En Yakın Komşuluk &rarr; k-Nearest Neighbors (KNN)</li>\r\n	<li style=\"text-align:justify\">Yapay Sinir Ağları &rarr; Artificial Neural Network (ANN)</li>\r\n	<li style=\"text-align:justify\">Destek Vekt&ouml;r Makinaları &rarr; Support Vector Machine (SVM)</li>\r\n	<li style=\"text-align:justify\">Karar Ağa&ccedil;ları &rarr; Decision Trees (DTs)</li>\r\n	<li style=\"text-align:justify\">Doğrusal Regresyon &rarr; Linear Regression</li>\r\n	<li style=\"text-align:justify\">Lojistik Regresyon &rarr; Logistic Regression</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><em>G&ouml;zetimsiz &Ouml;ğrenme (Unsupervised Learning)</em>:</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">G&ouml;zetimsiz &ouml;ğrenme y&ouml;nteminde ise label bilgisi yoktur. Veri setindeki bileşenler temel alınarak saklı ilişkilerin veya grupların ortaya &ccedil;ıkarılması ama&ccedil;lanmaktadır. &Ouml;rneğin; 10 tane bilgisayar alacaksınız ve b&uuml;t&ccedil;eniz sınırlı. Erken bir saatte teknoloji mağazasına gittiğinizi ve bilgisayar fiyatlarıyla ilgili herhangi bir bilgi alamadığınız farz edin. Fakat elinizde her bir bilgisayarın detaylı &ouml;zellikleri mevcut. Bu durumda ne yapardınız? G&ouml;zetimsiz &ouml;ğrenme y&ouml;ntemiyle, donanımsal ve yazılımsal &ouml;zellikler dikkate alınarak fiyat tahmini (label) yapmaya başlıyorsunuz :)</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">En &ccedil;ok kullanılan g&ouml;zetimsiz &ouml;ğrenme algoritmaları:</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">K&uuml;meleme &rarr; Clustering</li>\r\n	<li style=\"text-align:justify\">Birliktelik Kuralları &rarr; Association Rules</li>\r\n	<li style=\"text-align:justify\">Temel Bileşen Analizi &rarr; Principal Component Analysis (PCA)</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://miro.medium.com/max/572/1*UBeCbdU1UtfVZsheIJqHoQ.png\" style=\"float:right; height:423px; width:572px\" /></p>\r\n', '04.06.2021 22:55:14', '../images/Veri-madenciliği-1170x508.png', 0, 0, 'verimadenciliği, datamining', 'published', ''),
(94, 'Makine Öğrenimi Bölüm-2 (k-En Yakın Komşuluk)', 'Mühendislik', 10, 'ugurakdeniz', '<p style=\"text-align:justify\">En &ccedil;ok kullanılan g&ouml;zetimli &ouml;ğrenme algoritmalarını ele alacağız.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://miro.medium.com/max/958/1*5enLlxG5lD0UiZTltxe2aw.png\" style=\"height:508px; width:479px\" /></p>\r\n\r\n<p style=\"text-align:justify\">Şekil-1: G&ouml;zetimli &Ouml;ğrenme Algoritmaları</p>\r\n\r\n<p style=\"text-align:justify\"><strong>2.1 k-En Yakın Komşuluk &mdash; k Nearest Neighbours</strong></p>\r\n\r\n<p style=\"text-align:justify\">k-en yakın komşuluk (KNN) algoritması, uygulaması kolay g&ouml;zetimli &ouml;ğrenme algoritmalarındandır. Hem sınıflandırma hem de regresyon problemlerinin &ccedil;&ouml;z&uuml;m&uuml;nde kullanılıyor olmakla birlikte, end&uuml;stride &ccedil;oğunlukla sınıflandırma problemlerinin &ccedil;&ouml;z&uuml;m&uuml;nde kullanılmaktadır.</p>\r\n\r\n<p style=\"text-align:justify\">KNN algoritmaları, 1967 yılında T. M. Cover ve P. E. Hart tarafından &ouml;nerilmiştir. Algoritma, sınıfları belli olan bir &ouml;rnek k&uuml;mesindeki verilerden yararlanılarak kullanılmaktadır. &Ouml;rnek veri setine katılacak olan yeni verinin, mevcut verilere g&ouml;re uzaklığı hesaplanıp, k sayıda yakın komşuluğuna bakılır. Uzaklık hesapları i&ccedil;in genelde 3 tip uzaklık fonksiyonu kullanılmaktadır:</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">&ldquo;Euclidean&rdquo; Uzaklık</li>\r\n	<li style=\"text-align: justify;\">&ldquo;Manhattan&rdquo; Uzaklık</li>\r\n	<li style=\"text-align: justify;\">&ldquo;Minkowski&rdquo; Uzaklığı&rsquo;dır.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://miro.medium.com/max/357/1*IxvVTCXAUsDTsXop6kNJjA.png\" style=\"height:279px; width:357px\" /></p>\r\n\r\n<p style=\"text-align:justify\">Şekil-2: KNN &Ouml;rnek &Ccedil;izim</p>\r\n\r\n<p style=\"text-align:justify\">KNN; eski,&nbsp;basit ve g&uuml;r&uuml;lt&uuml;l&uuml; eğitim verilerine karşı diren&ccedil;li olması sebebiyle en pop&uuml;ler makine &ouml;ğrenme algoritmalarından biridir. Fakat bunun yanında dezavantajı da mevcuttur. &Ouml;rneğin, uzaklık hesabı yaparken b&uuml;t&uuml;n durumları sakladığından, b&uuml;y&uuml;k veriler i&ccedil;in kullanıldığında &ccedil;ok sayıda bellek alanına gereksinim duymaktadır.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://miro.medium.com/max/897/1*-f97sKBLfdwd2c15TESfCA.png\" style=\"height:424px; width:897px\" /></p>\r\n\r\n<p style=\"text-align:justify\">Şekil-3: KNN Adımları</p>\r\n\r\n<p style=\"text-align:justify\">KNN algoritmasının adımları:</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">İlk olarak k parametresi belirlenir. Bu parametre verilen bir noktaya en yakın komşuların sayısıdır. &Ouml;rneğin: k=2 olsun. Bu durumda en yakın 2 komşuya g&ouml;re sınıflandırma yapılacaktır.</li>\r\n	<li style=\"text-align: justify;\">&Ouml;rnek veri setine katılacak olan yeni verinin, mevcut verilere g&ouml;re uzaklığı tek tek hesaplanır. İlgili uzaklık fonksiyonları yardımıyla.</li>\r\n	<li style=\"text-align: justify;\">İlgili uzaklılardan en yakın k komşu ele alınır. &Ouml;znitelik değerlerine g&ouml;re k komşu veya komşuların sınıfına atanır.</li>\r\n	<li style=\"text-align: justify;\">Se&ccedil;ilen sınıf, tahmin edilmesi beklenen g&ouml;zlem değerinin sınıfı olarak kabul edilir. Yani yeni veri etiketlenmiş (label) olur.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><strong><em>Python uygulaması:</em></strong></p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">Bu &ccedil;alışma kapsamında python programlama dilinin &ldquo;scikit-learn&rdquo; mod&uuml;l&uuml;nden yararlanılmıştır. &ldquo;scikit-learn&rdquo;, Numpy, SciPy ve Matplotlib mod&uuml;llerinden oluşturulan bir makine &ouml;ğrenme mod&uuml;l&uuml;d&uuml;r. Scikit-learn, sınıflandırma, regresyon, k&uuml;meleme, boyut azaltma, model se&ccedil;imi ve veri &ouml;nişleme gibi veri analizinde de kullanılanan kısımlar i&ccedil;in basit ve verimli ara&ccedil;lar sunar.</li>\r\n	<li style=\"text-align: justify;\">Veri seti olarak scikit-learn i&ccedil;erisinde mevcut olan iris verisinden yararlanılmıştır.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://miro.medium.com/max/920/1*OSbtv09BwnV-yMXqPoch_g.png\" style=\"height:645px; width:920px\" /></p>\r\n\r\n<p style=\"text-align:justify\">Şekil-4: KNN Uygulaması</p>\r\n', '04.06.2021 22:57:07', '../images/Veri-madenciliği-1170x508.png', 0, 0, 'verimadenciliği, datamining', 'published', ''),
(95, 'Makine Öğrenimi Bölüm-3 (Yapay Sinir Ağları)', 'Mühendislik', 10, 'ugurakdeniz', '<p style=\"text-align:justify\">Bu yazımızda g&ouml;zetimli &ouml;ğrenme algoritmalarından Yapay Sinir Ağları (Artifical Neural Network &mdash; ANN) konusunu ele alacağız.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://miro.medium.com/max/1228/1*XSuTCtYFnftu62yIqkRbJQ.jpeg\" style=\"height:322px; width:614px\" /></p>\r\n\r\n<p style=\"text-align:justify\">Şekil-1: Sinir Ağlarının G&ouml;sterimi (NTV)</p>\r\n\r\n<p style=\"text-align:justify\">Yapay Sinir Ağlarına başlamadan &ouml;nce beynin temel yapı taşı olan sinir h&uuml;crelerinin &ccedil;alışma prensibinden basit&ccedil;e bahsetmekte fayda var. Biyolojik bir sinir h&uuml;cresi temelde 4 kısımdan oluşmaktadır. Bunlar; &ccedil;ekirdek, g&ouml;vde, akson ve dentritler. Sinir h&uuml;crelerinin ucunda bulunan dentritlerin g&ouml;revi, diğer n&ouml;ronlardan gelen sinyali &ccedil;ekirdeğe iletmektir. &Ccedil;ekirdek ise dentritlerin ilettikleri sinyalleri toplar ve aksonlara iletir. Toplanan sinyaller, akson tarafından işlenerek sinapslara g&ouml;nderilir. Sinaps, akson ve dentritlerin birleştiği noktalardır.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://miro.medium.com/max/540/1*1i4n98qtsTRKOuntE-LHUw.jpeg\" style=\"height:266px; width:540px\" /></p>\r\n\r\n<p style=\"text-align:justify\">Şekil-2: Sinir H&uuml;cresinin Yapısı</p>\r\n\r\n<p style=\"text-align:justify\">Yapay Sinir Ağları&nbsp;modelleri, biyolojik kuzenlerinin karmaşık yapılarını hen&uuml;z yansıtmasalarda onlar &ouml;rnek alınarak geliştirilmeye<strong>&nbsp;</strong>&ccedil;alışılmıştır. Bu modelin geliştirilmesinde ki temel ama&ccedil;, beynin &ouml;ğrenme işlevinin bilgisayarlar tarafından da yapılabilme istediğidir. ANN modelleri &uuml;zerine yapılan ilk incelemeler, W.S. McCulloch (n&ouml;robiyolog) ve W.A. Pitts (matematik&ccedil;i) tarafından 1943 senesinde ger&ccedil;ekleştirilmiştir. Daha sonraları John Hopfield, James McClelland ve David Rumelhart gibi araştırmacılar tarafından geliştirilmiştir.</p>\r\n\r\n<p style=\"text-align:justify\">Yapay sinir ağları katman sayılarına g&ouml;re tek katmanlı ve &ccedil;ok katmanlı, &ouml;ğrenme y&ouml;ntemine g&ouml;re g&ouml;zetimli, g&ouml;zetimsiz ve destekleyici, n&ouml;ronlar arası bağlantı yapılarına g&ouml;re ileri beslemeli ve geri beslemeli olarak sınıflandırılırlar (&Ccedil;elik U., Ak&ccedil;etin E., ve G&ouml;k M. , 2017).</p>\r\n\r\n<p style=\"text-align:justify\">Yapay sinir ağları modelinin en b&uuml;y&uuml;k avantajı diğer hesaplama y&ouml;ntemlerinden farklı olarak bulundukları ortama uyum sağlamalarıdır. Yani hata toleransları y&uuml;ksek ve eksik bilgiyle de &ccedil;alışabilmektedirler.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Tek Katmanlı &Ouml;ğrenme &mdash; Perceptron</strong></p>\r\n\r\n<p style=\"text-align:justify\">Tek katmanlı bir işlem &uuml;nitesidir. Sadece girdi ve &ccedil;ıktı katmalarından oluşmaktadır. &Ccedil;ıktı &uuml;niteleri b&uuml;t&uuml;n girdi &uuml;nitelerine bağlanmaktadır ve her bağlantının bir ağırlığı vardır. En basit tek katmanlı sinir ağı modeli perceptron&rsquo;dur. Temel olarak eğitilebilecek tek bir yapay sinir h&uuml;cresinden oluşmaktadırlar. Perceptron kavramı ilk kez 1958 yılında Cornell &Uuml;niversitesi&rsquo;nden psikolog Frank Rosenbatt tarafından ortaya atılmıştır.</p>\r\n\r\n<p style=\"text-align:justify\">Rosenblatt, biyolojik sinir ağlarındaki bağlantıların tesad&uuml;fi olarak oluştuklarını ileri s&uuml;rm&uuml;şt&uuml;r. Bunun sonucu olarak da McCulloch-Pitts Modelinin aksine en uygun aracın olasılık teorisi olacağını belirtmiştir. Tesad&uuml;fi olarak birbirine bağlanan ağların genel &ouml;zelliklerinin tanımlanabilmesi i&ccedil;in, perceptron &ouml;ğrenme kuramını geliştirmiştir (Akpınar, H., 2017).</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://miro.medium.com/max/582/1*nRRXhhjSjKNpGn-T3yF2Ew.jpeg\" style=\"height:264px; width:582px\" /></p>\r\n\r\n<p style=\"text-align:justify\">Şekil-3: Perceptron Yapısı</p>\r\n\r\n<p style=\"text-align:justify\">Tek katmanlı perceptron modeli 1969 yılına gelindiğinde rafa kaldırılmaya başlandı. Marvin Minsky ve Seymour Papert yaptıkları &ccedil;alışmada (An Introduction to Computational Geometry) tek katmanlı perceptron&rsquo;ların, basit problemler i&ccedil;in ge&ccedil;erli iken, problemler zorlaştık&ccedil;a &ccedil;&ouml;z&uuml;mden uzaklaştıklarını g&ouml;sterdiler.</p>\r\n\r\n<p style=\"text-align:justify\">Sırada Perceptron modeli i&ccedil;in basit bir uygulama var :)</p>\r\n\r\n<p style=\"text-align:justify\">Bu uygulama kapsamında veri madenciliğiyle uğraşan herkesin bildiği iris verisi kullanıldı.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://miro.medium.com/max/1203/1*mQMb0GqPM4vagp1Sha1qQA.png\" style=\"height:779px; width:1203px\" /></p>\r\n\r\n<p style=\"text-align:justify\">Şekil-4: Perceptron Uygulaması</p>\r\n\r\n<p style=\"text-align:justify\"><strong>&Ccedil;ok Katmanlı Yapay Sinir Ağları</strong></p>\r\n\r\n<p style=\"text-align:justify\">1980&#39;li yıllardan itibaren yapılan &ccedil;alışmalarla Yapay Sinir Ağları tekrardan pop&uuml;ler hale gelmiştir.</p>\r\n\r\n<p style=\"text-align:justify\">Yapay sinir ağlarının g&uuml;n&uuml;m&uuml;zde en yaygın olarak kullanılan modeli &ccedil;ok katmanlı algılayıcı ağlarıdır. &Ccedil;ok katmanlı yapay sinirleri temelde 3 kısımdan oluşmaktadır:</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">Girdi Kısmı: Bu katmanda bilgi işleme ger&ccedil;ekleşmez. Bilgiler alınıp gizli katmana iletilir.</li>\r\n	<li style=\"text-align: justify;\">Gizli Kısım: Girdi katmanındaki her bir elemanı, gizli katmandaki proses elemanlarının t&uuml;m&uuml;ne bağlıdır. Bu kısımda girdi katmanından gelen bilgiler işlenir. Bir adet gizli katman ile bir&ccedil;ok problemi &ccedil;&ouml;zmek m&uuml;mk&uuml;nd&uuml;r. Fakat birden fazla gizli katmanda kullanılabilmektedir. Problemin t&uuml;r&uuml;ne g&ouml;re gizli katmaların sayısı değişmektedir.</li>\r\n	<li style=\"text-align: justify;\">&Ccedil;ıktı Kısmı: Gizli katmandan gelen bilgileri işleyerek dışarı iletir.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Yapay sinir ağlarında girdi değerleri bağlantı ağırlıkları ile &ccedil;arpılır ve birleştirme fonksiyonu ile birleştirilerek ağın net girdisi ortaya &ccedil;ıkar. Net girdi, aktivasyon fonksiyonunda işlem g&ouml;rd&uuml;kten sonra ağın net &ccedil;ıktısı elde edilmiş olur. (Hamza&ccedil;ebi, 2011; &Ccedil;elik U., Ak&ccedil;etin E., ve G&ouml;k M. , 2017)</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://miro.medium.com/max/500/1*SxKHIqKDgWKOFuQZ4M2NMA.jpeg\" style=\"height:405px; width:500px\" /></p>\r\n\r\n<p style=\"text-align:justify\">Şekil-5: &Ccedil;ok Katmanlı Yapay Sinir Ağları</p>\r\n\r\n<p style=\"text-align:justify\">&Ccedil;ok katmanlı yapay sinirleri ağının eğitilmesi &ldquo;Genelleştirilmiş Delta kuralı&rsquo;na g&ouml;re ger&ccedil;ekleşmektedir.</p>\r\n', '04.06.2021 23:01:47', '../images/1_XSuTCtYFnftu62yIqkRbJQ.jpeg', 0, 0, 'verimadenciliği, datamining', 'published', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_image` text COLLATE utf8_turkish_ci NOT NULL,
  `slider_title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `slider_status` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_image`, `slider_title`, `slider_status`) VALUES
(1, 'images/bannerprofilpic60acc192db31f7.85217893.jpg', 'Lorem Ipsum1', 'published'),
(4, '../images/bannerb2.jpg', 'Lorem Ipsum2', 'published'),
(5, '../images/bannerb2.jpg', 'Lorem Ipsum3', 'published'),
(6, '../images/banner1000923.jpg', 'Lorem Ipsum4', 'published'),
(7, '../images/bannerb1.jpg', 'Lorem Ipsum5', 'published');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `password` text COLLATE utf8_turkish_ci NOT NULL,
  `profile_pic` text COLLATE utf8_turkish_ci NOT NULL,
  `is_active` varchar(3) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'yes',
  `post_id` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Editor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `profile_pic`, `is_active`, `post_id`, `role`) VALUES
(12, 'ugurakdeniz', 'ugurakdeniz@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'users/profile_pics/profilepic60aaa4b3211160.47250642.jpeg', 'yes', 0, 'Admin'),
(13, 'admin', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'use', 0, 'Admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usersonline`
--

CREATE TABLE `usersonline` (
  `id` int(11) NOT NULL,
  `session` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`biography_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `usersonline`
--
ALTER TABLE `usersonline`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `about`
--
ALTER TABLE `about`
  MODIFY `biography_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `usersonline`
--
ALTER TABLE `usersonline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
