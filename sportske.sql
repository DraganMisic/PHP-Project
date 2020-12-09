-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2016 at 06:13 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sportske`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'fudbal'),
(2, 'kosarka'),
(3, 'tenis'),
(4, 'rukomet'),
(5, 'ostali');

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE IF NOT EXISTS `komentari` (
  `comments_id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vesti_id` int(11) NOT NULL,
  `komentari` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vreme_objave` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comments_id`),
  KEY `fk_vesti_idx` (`vesti_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=53 ;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`comments_id`, `user`, `vesti_id`, `komentari`, `vreme_objave`) VALUES
(47, '0', 166, 'LOPOVI', '2016-05-23 14:02:18'),
(48, '0', 169, 'Kari ocajan ....', '2016-05-23 14:31:17'),
(49, '0', 165, 'esfdfs', '2016-05-29 16:22:51'),
(50, '0', 169, '....', '2016-07-08 18:08:53'),
(51, 'dale', 169, 'fbdfb', '2016-07-08 18:19:03'),
(52, 'admin', 164, 'di natale', '2016-07-08 18:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(165) DEFAULT NULL,
  `ime` varchar(145) DEFAULT NULL,
  `prezime` varchar(145) DEFAULT NULL,
  `email` varchar(145) DEFAULT NULL,
  `slika` varchar(455) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'korisnik',
  PRIMARY KEY (`user_id`),
  KEY `px_user` (`user_id`,`username`,`ime`,`prezime`),
  KEY `user` (`user_id`,`username`,`ime`,`prezime`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `ime`, `prezime`, `email`, `slika`, `status`) VALUES
(1, 'nikolaj', '12345', 'Nikolaj', 'Trninic', 'admin1@gmail.com', NULL, 'admin'),
(3, 'Dobrica', '12345', 'dale', 'Trninic', 'trninicr@hotmail.com', NULL, 'korisnik'),
(4, 'ratomir2', '07b3cfbfe98e8fadc73c4d6b085babb81b5a8187ca807d6ce5fdaeb1debbd1df', 'partizan', NULL, NULL, NULL, 'korisnik'),
(5, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', NULL, 'admin'),
(7, 'dacka', 'password', 'danica', 'babic', 'trninicsr@hotmail.com', NULL, 'korisnik'),
(8, 'bfb', 'bfbfb', 'fbdbdf', 'bdfbf', 'dbdfb', '', 'korisnik'),
(9, 'qwdqwdqwd', 'dwqdwqd', 'qwdqw', 'dqwdqw', 'dwdw@s', NULL, 'korisnik'),
(10, 'faf', '87e2a4bc50859b93c33e14cb57405fd1', 'dfasfas', 'fas', 'fas', NULL, 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `vesti`
--

CREATE TABLE IF NOT EXISTS `vesti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(415) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `uvod` varchar(455) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sadrzaj` varchar(945) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `slika` varchar(455) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `autor` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `vreme_objave` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=181 ;

--
-- Dumping data for table `vesti`
--

INSERT INTO `vesti` (`id`, `naslov`, `uvod`, `sadrzaj`, `slika`, `category`, `autor`, `vreme_objave`) VALUES
(164, ' Di Nataleov oproštaj: Zapalio cigaretu pa otišao među navijače! ', 'Posle 12 godina vernosti, jednoj velikoj ljubavi je došao kraj... Antonio di Natale (38) napušta Udineze, a poslednji susret sa navijačima “zebri” bio je više nego zanimljiv.', 'Iskusni napadač je istinska legenda “Friulija”... Bez njega jednostavno više ništa neće biti isto u ovom klubu. Di Natale se oprostio od crno-belih a posle poslednjeg meča sa Karpijem, rešio je da ode na tribinu i pozdravi se sa navijačima. Pevao je pesme, vodio navijanje ali i zapalio cigaretu. Jeste profesionalni fudbaler, ali njemu je sve dozvoljeno.\r\n\r\n(B.O.)', 'u1T6CcWq3KvcSEXA.jpg', 'fudbal', 'trnke', '2016-05-23 09:48:42'),
(165, ' KRALJ ZABAVE Novak, brkovi, violina i fudbalske majstorije! ', 'Stres sa rimskog turnira je prošlost, Novak Đoković spreman je da pruži maksimum na Rolan Garosu.', 'U to se uverila pariska publika u subotu na Dečjem danu. Teško da postoji osoba koja je mogla mališanima da pruži bolju zabavu od "broja 1". Na repertoaru je bilo sve, od fudbalskog žongliranja do maskiranja i sviranja violine.', 'proxy.jpg', 'tenis', 'trnke', '2016-05-23 09:53:18'),
(166, '"VRUĆE" U PARTIZANU "Blic" saznaje: Pokrenut postupak protiv Vukadinovića!', 'Partizan je pokrenuo disciplinski postupak protiv Dragoljuba Vukadinovića, člana Skupštine kluba i nekadašnjeg potpredsednika, saznaje "Blic".', 'Pošto je pokrenut postupak, on neće imati pravo glasa na skupštini u utorak na izborima za predsednika kluba.\r\n\r\nKandidature su podneli Ivan Ćurković i Nenad Bjeković, koji je predstavnik opozicione struje crno-beih.\r\n\r\n"Blic" je došao u posed dopisa koji je prosleđen Vukadinoviću, a koji prenosimo u celosti.\r\n\r\n"Protiv Vas je pokrenut disciplinski postupak po disciplinskoj prijavi koju joj je podneo predsednik Nadzornog odbora FK Partizan, dr Vladimir Vuletić.\r\n\r\nU disciplinskoj prijavi koju je Disciplinska komisija FK Partizan dobila, navodi se da ste, u intervjuu datom dana 17. 5. 2016. godine, istakli svoje aktivno angažovanje u FK Metalac iz Gornjeg Milanovca. Tom prilikom istakli ste da, sa mesta predsednika UO kompanije Metalac, rukovodite radom istoimenog fudbalskog kluba kao i da 60% ukupnog budžeta ovog kluba finansira kompanija čiji ste vi vlasnik.', '6219526f7bb35b0633aea97ba92ec6e7.jpeg', 'fudbal', 'trnke', '2016-05-23 09:54:32'),
(167, ' KOŠARKA SKUPI UPALJAČI Partizan novčano kažnjen zbog meča sa Megom', 'Košarkaška Superliga kaznila je novčano Partizan zbog bacanja upaljača na teren tokom utakmice sa Mega Leksom.', 'Crno-beli su pobedili sa 94:89, ali su ostali bez 30.000 dinara zbog nesportskog ponašanja gledalaca.\r\n\r\nSa po 12.000 dinara, kažnjeni su košarkaši Konstantina Vladimir Veličković, Vladimir Đorđević i Mladen Vitković, koji su dobili tehničke greške u porazu od Borca sa 91:78.', 'b4b05f2dcf9f74b4b442ea18359b2d3f.jpeg', 'kosarka', 'autor', '2016-05-23 09:58:19'),
(168, 'Danka: Što bih dramila, pobeđivaću najbolje', 'Danka Kovinić bila je na korak do velikog iznenađenja u prvom kolu Rolan Garosa – pobede nad Petrom Kvitovom.', 'Crnogorska teniserka servirala je za meč u trećem setu, na ’djusu’ je odlično odservirala, ali je izgubila poen i posle toga je sve krenulo nizbrdo.\r\n\r\n“Nisam očekivala toliko kratak ritern. Jedva sam stigla do lopte, mada se ni ne sećam sad baš – htela sam da je gurnem natrag jer sam očekivala da će krenuti na drop šot, ali nisam dovoljno duboko odigrala i njoj je taman došla na reket“, rekla je 21-godišnja Danka posle poraza 6:2, 4:6, 7:5. \r\n\r\nNedavno je Kovinićeva takođe bila blizu trijumfa nad Čehinjom, ali tada je poražena sa 7-5 u taj brejku trećeg seta. \r\n\r\n“Sličan meč kao u Indijan Velsu – ona je bolje počela (vodila je Kvitova 6:2, 3:0), ali ja sam igrala sve bolje kako je meč odmicao, bolje sam osećala loptu i čitala njenu igre lakše. Ponovo mi je malo nedostajalo“. \r\n', '8925062725741b70a7ff6d273399935_w640.jpg', 'tenis', 'trnke', '2016-05-23 10:12:21'),
(169, 'Oklahoma se ne šali, razbila šampiona za 2-1', 'Košarkaši Oklahome ponovo su poveli protiv Golden Stejta u finalnoj seriji zapadne konferencije, ovoga puta sa 2-1.', 'U prvom duelu serije u Oklahomi domaći Tander je neočekivano lako i ubedljivo savladao branioca titule rezultatom 133:105.\r\n\r\nU prve tri deonice Oklahoma je ubacila neverovatnih 117 poena i potpuno je razbila odbranu Voriorsa. Najveću razliku tim Bilija Donovana napravio je u drugoj (38:19) i trećoj četvrtini (45:33), pa su najbolji igrači obe ekipe odmarali u finišu. \r\n\r\nRasel Vestbruk je ponovo zablistao sa 30 poena, 12 asistencija i 8 skokova, a Kevin Durent imao je 33 poena i 8 skokova. Robertson i Vejters dodali su po 13, a Ibaka je uz 8 skokova ubacio 14 poena. \r\n\r\n„Dobili smo ono šta smo zaslužili“, rekao je kratko trener Golden Stejta Stiv Ker. \r\n\r\nNjegov tim nalazi se u padu forme u plej-ofu i u nastavku serije će morati da podignu nivo igre. Oklahoma je ponovo, kao i u prvom meču serije, nadskakala rivala (52-38). \r\n\r\nJasno je koliko su skokovi i borba za svaku loptu važni u ovakvim serijama. \r\n\r\n„Ono što nismo uspeli u d', '178886123157429f077c9bc169514145_w640.jpg', 'kosarka', 'trnke', '2016-05-23 10:13:12'),
(171, '(FOTO) BEZ NOVAKA NA MISTERIOZNOJ DESTINACIJI: Pogledajte Jelenu Đoković kako se odmara u džungli', 'Supruga najboljeg tenisera sveta Jelena Đoković otišla je na odmor bez Novaka.', 'Supruga najboljeg tenisera sveta Jelena Đoković otišla je na odmor bez Novaka.\r\n\r\nOna svakodnevno na "Instragram" postavlja zanimljive fotografije sa destinacije, koju će, kako je najavila, otkriti tek kada je napusti.\r\n\r\nJučerašnja slika ananasa izazvala je haos na društvenim mrežama, a ni današnja nije manje zanimljiva. Na njoj se vidi Jelena kako meditira pred vodopadom.\r\n\r\n"Tako sam zahvalna! Dok sam bila pred vodopadom, celo telo mi je vibriralo od sreće, radosti i smirenosti. Nisam morala da isključim mozak da bih upala u duboku meditaciju, već se to nekako samo od sebe desilo. Tako je bilo mirno! I imala sam priliku da po prvi put iskusim džunglu i njenu prirodu. O, kakav osećaj!", napisala je Jelena Đoković.', 'jelena-dokovic-foto-profimedia-1460893234-888445.jpg', 'tenis', 'trnkepfc', '2016-07-08 18:23:36'),
(172, 'CRNOGORAC POBEDIO ZA ĐOKOVIĆA: Raonić savladao Federera i plasirao se u finale Vimbldona', 'Kanadski teniser Miloš Raonić plasirao se u finale Vimbldona, pošto je danas u polufinalu pobedio Švajcarca Rodžera Federera posle velike borbe u pet setova - 6:3, 6:7, 4:6, 7:5, 6:3.', 'Raonić je tako stigao do svog prvog gren slem finala, a ujedno je postao i prvi kanadski teniser koji će igrati finale jednog od najvećih turnira.\r\n\r\nFederer je, na drugoj strani, prvi put poražen u polufinalu Vimbldona. Sedmostruki šampion londonskog gren slema je u prethodnih deset polufinala isto toliko puta slavio, a danas nije uspeo da se izbori za svoje 11. finale Vimbldona.\r\n\r\nRaonić, koji je rođen u Podgorici, sprečio je tako Federera da osvoji 18. gren slem titulu i učvrsti se ne vrhu "večne liste". Time je pomogao Novaku Đokoviću u nastojanju da u nastavku karijere stigne Švajcarca i postane rekorder.', 'milos-raonic-vimbldon-foto-fonet-1467993597-945803.jpg', 'tenis', 'trnkepfc', '2016-07-08 18:24:40'),
(173, 'Ivana Španović skočila 6,94 u drugoj seriji i ubedljivo vodi', 'Srpska atletičarka Ivana Španović učestvuje u finalu takmičenja u skoku u dalj na Evropskom prvenstvu u Amsterdamu.', 'Ivana je u kvalifikacijama skočila čak 6,90 u prvoj seriji i time obezbedila ulazak u borbu za medalje.\r\n\r\nNjen najbolji rezultat ove godine je 6,95.\r\n\r\nSrpkinja je vlasnica srebra sa kontinentalnog šampionata održanog 2014. u Cirihu.', 'ivana-spanovic-foto-printscreen-1467999850-945867.jpg', 'ostali', 'trnkepfc', '2016-07-08 18:25:42'),
(174, 'ISTORIJSKA MEDALJA: Mihail Dudaš osvojio bronzu na Evropskom prvenstvu', 'Srpski atletičar Mihail Dudaš zauzeo je treće mesto u ukupnom plasmanu desetoboja na Evropskom prvenstvu u Amsterdamu.', 'U poslednjoj disciplini, trci na 1500 metara Dudaš je u vremenu 4:30,90 osvojio 735, i ukupno imao 8153 boda.\r\n\r\nDudašu je srebro izmaklo za samo četiri boda, jer je toliko više osvojio Čeh Adam Helcelet.\r\n\r\nZlato je pripalo Belgijancu Tomasu van der Pletsenu.\r\n\r\nOvo jeprva medalja za našu zemlju u desetoboju naotvorenom.\r\n\r\nU pretposlednjoj disciplini, bacanju koplja, imao je deseti rezultat ukupno, 58,19 metara, što mu je donelo 711 bodova. On je bio bolji od Oleksija Kasjanova, drugoplasiranog pre te discipline, koji je potpuno podbacio sa 48,23 metra, što je bio najlošiji rezultat u obe grupe, pa je Ukrajinac pred poslednju disciplinu pao na četvrto mesto.\r\n\r\nIpak, ispred Dudaša je ostao Tomas van der Platsen na prvoj poziciji (7.524 boda), kao i Adam Helselet, koji se zahvaljujući najboljim rezultatom sezone u bacanju koplja (67,24 metra), probio na drugo mesto u generalnom plasmanu sa 7.467 bodova.', 'mihail-dudas-foto-reuters-1467912320-945129.jpg', 'ostali', 'trnkepfc', '2016-07-08 18:26:33'),
(175, 'SEKSI I KAD TRENIRA: Evo kako se Ivana Španović sprema za skok ka medalji u Amsterdamu', 'Srpska atletičarka Ivana Španović večeras će učestvovati u finalu takmičenja u skoku u dalj na Evropskom prvenstvu u Amsterdamu.', 'Srpska atletičarka Ivana Španović večeras će učestvovati u finalu takmičenja u skoku u dalj na Evropskom prvenstvu u Amsterdamu.\r\n\r\nIvana je prekjuče u kvalifikacijama skočila čak 6,90 već u prvoj seriji i bez problema se plasirala u finale.\r\n\r\nU međuvremenu se spremala za današnji skok ka novoj medalji, uz podsećanje da je pre dve godine u Cirihu osvojila srebro. Evo kako to izgleda...', 'ivana-spanovic-foto-ap-1467987206-945743.jpg', 'ostali', 'trnkepfc', '2016-07-08 18:27:49'),
(176, 'ŠOKANTNA ODLUKA: Srpski šampion neće igrati u najjačem evropskom takmičenju!', 'U istom problemu su i klubovi iz Crne Gore i Bosne i Hercegovine', 'Prema njoj, klubovi koji su šampioni Srbije, Crne Gore i Bosne i Hercegovine nemaju obezbeđeno direktno mesto u Ligi šampiona, pa čak ni u kvalifikacijama!\r\n\r\nMeškov u „gornjem domu“ EHF Lige šampiona, Srbija, BIH i Crna Gora bez učesnika EHF Lige šampiona, Gorenje svoju šansu gleda kroz kvalifikacije. To je rezime odluka Izvršnog odbora EHF-a koji je raspravljao o timovima koji će učestvovati u elitnom klupskom takmičenju naredne sezone, prenosi “Balkan-Handball“.\r\n\r\nNova sezona sa 28 klubova počinje 16. septembra, a završava se 7. juna 2017. godine.\r\n\r\nA u njoj neće igrati Vojvodina, Izviđač i Budvanska Rivijera', 'Tan2015-10-1_214451345_12-620x350.jpg', 'rukomet', 'trnkepfc', '2016-07-08 18:29:30'),
(177, 'LOŠ POČETAK: Srbija poražena u Kraljevu od Mađarske', 'Revanš meč dve selekcije na programu je za pet dana u Vespremu', 'Mađarska je odigrala znatno bolje otvorila duel, brzo stekla pet golova prednost, na početku drugog dela čak i osam, ali se Srbija u finišu vratila i izjednačila rezultat.\r\n\r\nPetar Nenadić mogao je Srbiji da donese preokret četiri minuta pre kraja, ali je promašio sedmerac, što su kasnije iskoristili Mađari i ostvarili važnu pobedu za plasman na šampionat u Francuskoj.\r\n\r\nUpravo je Nenadić bio najefikasniji u srpskom timu sa 11 golova, dok je kod Mađara osam dao Tamaš Ivančik, a po četiri Laslo Nađ i Mate Lekai.\r\n\r\nRevanš meč dve selekcije na programu je za pet dana u Vespremu.', 'Rukometna-reprezentacija-Srbije-620x350.jpg', 'rukomet', 'trnkepfc', '2016-07-08 18:30:31'),
(178, 'Rukometašice Srbije dobile grupu za Evropsko prvenstvo', 'Selektor Dragica Đurić optimista posle žreba', 'Srpkinje, koje sa klupe predvodi Dragica Đurić mečeve grupe će igrati u Stokholmu, u dvorani kapaciteta 8,094 mesta.\r\n\r\n– Izazov je što prvu utakmicu igramo sa domaćinom. Sa Španijom dugo nismo igrali na velikim takmičenjima. Slovenija je u popriličnom usponu.\r\n\r\n– Realno je da prođemo u drugu rundu, bez obzira na jačinu protivnika u Švedskoj – rekla je Dragica Đurić, neposredno posle obavljenog žreba.\r\n\r\nŽREB\r\n\r\nGRUPA: Švedska, Srbija, Španija, Slovenija.\r\n\r\nGRUPA B: Holandija, Francuska, Nemačka, Poljska\r\n\r\nGRUPA C: Crna Gora, Mađarska, Danska, Češka\r\n\r\nGRUPA D: Norveška, Rumunija, Rusija, Hrvatska', 'Rukometasice-Srbije-1-620x350.jpg', 'rukomet', 'trnkepfc', '2016-07-08 18:32:18'),
(179, 'Portoriko čeka Srbiju u finalu!', 'Reprezentacija koju smo pobedili u grupi savladala Letonce i došla na korak od plasmana na Olimpijske igre', 'U finalu, za olimpijsku vizu Portorikance čeka duel protiv boljeg iz meča Srbija i Češka. Podsetimo, Srbija je bez većih problema savladala Portorikance u grupi.\r\n\r\nArojo, Barea i družina su odigrali sjajan meč protiv Letonaca koji su bili blagi favoriti na papiru, ali u stvarnosti izabranici selektora Bagatskisa platili su ceh prevelikom broju promašenih šuteva za tri poena, inače njihovog najjačeg oružja.\r\n\r\nSamo tri trojke iz 26 pokušaja ubacili su Letonci!\r\n\r\nSa druge strane, lideri Portorika Džej Džej Barea i Karlos Arojo predvodili su karipsku selekciju sa po 14 poena, ali je najefikasniji bio Holand s 15. Balkman je dodao 12.\r\n\r\nFenomenalni Arojo bio je čovek odluke sa trojkom koju je postigao 35 sekundi pre kraja za vođstvo 73:68, i bio je to trenutak koji je rešio pitanje pobednika i prvog finalistu.\r\n\r\nU poraženoj ekipi, Tima je bio bolji od ostalih sa 16 poena.', 'Kosarka-reprezentacija-Srbija-Porto-Riko-Foto-Marko-Todorovic026-620x350.jpg', 'kosarka', 'trnkepfc', '2016-07-08 18:33:17'),
(180, 'Vest Hem dovodi fudbalera kog navijači Partizana ne pamte po dobrom ', 'Gokhan Tore će sledeće sezone igrati u Premijer ligi', 'U pitanju je vezista Bešiktaša Gokhan Tore koji je dogovorio sve uslove sa Čekićarima i biće predstavljen naredne nedelje.\r\n\r\n– Samo još nekoliko sitnih stvari je ostalo da se sredi – rekao je Džek Saliven, sin vlasnika Vest Hema.\r\n\r\nOvo nije prvi put da se Toreovo ime povezije sa Vest Hemom, pošto su spekulacije krenule još krajem sezone.\r\n\r\nNekadašnji mladi fudbaler Čelsija je velika želja Slavena Bilića koji ga je trenirao u Istanbulu, upravo kada je Bešiktaš u Ligi Evrope igrao protiv Partizana.', 'Tan2014-11-6_203915869_0-620x350.jpg', 'fudbal', 'trnkepfc', '2016-07-08 18:34:10');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `fk_vesti` FOREIGN KEY (`vesti_id`) REFERENCES `vesti` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
