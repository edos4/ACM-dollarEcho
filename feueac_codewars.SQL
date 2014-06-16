-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2014 at 08:37 AM
-- Server version: 5.6.12
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `feueac_codewars`
--
CREATE DATABASE IF NOT EXISTS `feueac_codewars` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `feueac_codewars`;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `question` text NOT NULL,
  `testcases` text NOT NULL,
  `correctAnswer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `question`, `testcases`, `correctAnswer`) VALUES
(2, 'Hashmat the Brave Warrior', 'Hashmat the brave warrior<br>\r\nInput: standard input\r\n<br>Output: standard output\r\n<br> \r\nHashmat is a brave warrior who with his group of young soldiers moves from one place to another to fight against his opponents. Before fighting he just calculates one thing, the difference between his soldier number and the opponent''s soldier number. From this difference he decides whether to fight or not. Hashmat''s soldier number is never greater than his opponent.\r\n<br><br>\r\nInput\r\nThe input contains two integer numbers in every line. These two numbers in each line denotes the number of soldiers in Hashmat''s army and his opponent''s army or vice versa. The input numbers are not greater than 2^32. Input is terminated by End of File.\r\n<br> <br>\r\nOutput<br>\r\n For each line of input, print the difference of number of soldiers between Hashmat''s army and his opponent''s army. Each output should be in seperate line.\r\n<br><br> \r\nSample Input:<br>\r\n10 12<br>\r\n10 14<br>\r\n100 200<br>\r\n <br><br>\r\nSample Output:<br>\r\n2<br>\r\n4<br>\r\n100<br>\r\n<br>\r\nShahriar Manzoor<br>\r\n16-12-2000<br>', '1 3\n4 1\n3 9\n-1 8989\n234234 24242\n3 5\n131312323 131323\n0 0\n-1 -231\n-1 -1', '2\n3\n6\n8990\n209992\n2\n131181000\n0\n230\n0'),
(3, 'Hardest Problem', 'A "Hello World" program has become the traditional first program that many people learn. In general, it is simple enough so that people who have no experience with computer programming can easily understand it, especially with the guidance of a teacher or a written guide. Using this simple program as a basis, computer science principles or elements of a specific programming language can be explained to novice programmers. Experienced programmers learning new languages can also gain a lot of information about a given language''s syntax and structure from a hello world program.<br><br>\nIn addition, hello world can be a useful sanity test to make sure that a language''s compiler, development environment, and run-time environment are correctly installed. Configuring a complete programming toolchain from scratch to the point where even trivial programs can be compiled and run can involve substantial amounts of work. For this reason, a simple program is used first when testing a new tool chain.\n<br><br>\nA "Hello World" program running on Sony (Fampulme)''s PlayStation Portable as a proof of concept.\n"Hello world" is also used by computer hackers as a proof of concept that arbitrary code can be executed through an exploit where the system designers did not intend code to be executed - for example, on Sony''s PlayStation Portable. This is the first step in using homemade content ("home brew") on such a device.\n<br><br>\nOutput the string "Ed Pogi".<br>', 'Hi', 'Ed Pogi'),
(4, 'Binary Space', 'A binary space within a positive integer N is any maximal sequence of consecutive zeros that is surrounded by ones at both ends in the binary representation of N.<br><br>\n\nFor example, number 9 has binary representation 1001 and contains a binary gap of length 2. The number 529 has binary representation 1000010001) and contains two binary gaps: one of length 4 and one of length 3. The number 20 has binary representation 10100 and contains one binary gap of length 1. The number 15 has binary representation 1111 and has no binary gaps.<br><br>\n\nSample Inputs:<br>\n243<br>\n23<br>\n17<br>\n45<br>\n423<br>\n5555<br><br>\n\nSample Outputs:<br>\n2<br>\n1<br>\n3<br>\n1 1<br>\n1 2<br>\n1 1 1 2<br>\n\n', '67866\n234234\n123654\n456789', '4 2 3 1\n2 2 1 1\n3 5\n1 4 1 1 1'),
(9, 'Transposition Cipher', 'A keyword transposition cipher is a method of choosing a monoalphabetic substitution with which to encode a message. The substitution alphabet is determined by choosing a keyword, arranging the remaining letters of the alphabet in columns below the letters of the keyword, and then reading back the columns in the alphabetical order of the letters of the keyword. \r\n\r\nFor instance, if one chose the keyword SECRET, the columns generated would look like the following diagram. Note how the letters in the keyword are skipped when laying out the columns, and duplicate letters are removed from the keyword:\r\n\r\nSECRT\r\nABDFG\r\nHIJKL\r\nMNOPQ\r\nUVWXY\r\nZ\r\n\r\nSince the alphabetical order of the characters in the keyword is CERST, the columns are then read back in that order to get the substitution alphabet.\r\n\r\nOriginal:     ABCDE FGHIJ KLMNO PQRSTU VWXYZ\r\n\r\nSubstitution: CDJOW EBINV RFKPX SAHMUZ TGLQY\r\n\r\nTask\r\nGiven a piece of ciphertext and the keyword used to encipher it with the keyword transposition cipher described above, write an algorithm to output the original message.\r\n\r\nInput Format\r\nThe first line of input will be an integer N indicating the number of test cases that will follow. For each test case in N, two additional lines will follow, one containing the keyword, and one containing the ciphertext. The keyword will be at most 7 characters long, and the ciphertext will be at most 255 characters in length.\r\n\r\nSample Input\r\n1\r\nSECRET\r\nJHQSU XFXBQ\r\n\r\nOutput Format\r\nYour output should be the decoded version of the cipher text for each test case, one per line.\r\n\r\nSample Output\r\nCRYPT OLOGY', '10\r\nMAGNET\r\nHNXWF SRDCE ZXBCO QDUDB QAAMO MZYDG PNGEH OUCTW AUUDU MQVIT XHKRC TWRRS FCBKS IGTMD FPDJI PBIBT GCXDX FYWDT XRRQZ VGGME UOAGQ UKXVT IEZYP TKVCV CHCWK QICUP QFKOV YIEEU HDYIJ LGKWG APAUV RMSAW DMMZC KYHNS HTWOC LOKUL SYMCH RCXIK BGURF ARQZG EZNOT YXTGR\r\nCACKLE\r\nYGLGX TNTWO UVZFH GPRZR KJTJA CNCAZ URFOD MEPSY QBWTZ MUMDI HXXZU QWSXE RNITZ MZJHN BDHGS ZJUYX BGKDT FVSQS SCLZX OZFSH VPPMS GUGVB RSLUX AHNMR CRLXI RKIGI ZUSUH GUEDZ DKQTK VDKGS CXUXZ LXEIO AVVLG IDDIA YANXU TWYVU INZIK XJUMX NOSVU WTVOA PCWEK YHPCR\r\nORANGE\r\nOGEEA FKJMU DPVKB WAHAY NDITH RQECQ PZGPK RKRNZ FWNHQ CKECG ZRGKT GXPLR VHTQU AETXG WKQJJ VDAWW WINES YIDKU LDXGK YNSBJ IOIAI HVNRE OUUSY GMURX IRPWY SFJEG YVBUM GOMGD LVDSB QKELQ TVWTW NLGIQ KYMCA OTTSN IDIMU QEBJL PWAJJ VQEYU VTZDL HOMOB CRTPL VTGZB\r\nFISH\r\nZYHJG VNKZU TLCTW VMHGM LCQSC MTOFG BYLLC XHGFO TQHHB CQXPS ZHKZD IOCWW XAXMS BHBZJ DTADH GJMAV VQQEP XMKBO JEJWU BPKRR YNMXZ UJFHG DHJQY OGFKB AIUTY TNMLW SBDJX ZNSAR YZTIV CUXYL KYOJE JOCQV XFTVX RTXMU DLVLS XSOUJ NNAYL ZVXQU PXTJJ LCYMJ IJOKM YSNOQ\r\nMUMPS\r\nLGXEK VLMCV KOYLU LSFXL DRPFC AGRCO QYVGA VDITK SREVX FNHIR IVVFK UXURG RYEQM RYNTS JKGBK MOGTZ ICLWE TPXRH VJMTC FOYVS XPRHH TUGTV AUSJR VUMLV VTAOP XYNOZ DDDEI QPKGP KVIBS ZTETM LDCLN HPEHT ZAFCP SQKAU RDZDE IEBKC UTQDY YIHTO MKUYV UHNWI KVXYL GGHMA\r\nN\r\nMTDWR KDNAP DNEBM HKPHB GWMYM GCGQY YZDDL NFFQA HCXMT QLEAP KSUHQ GZMWV YTHCG GEHAS VXLSQ RHUWN HDIIP DAOPQ DDFCK IKWWI YVFGX EGEVY AMMYZ ZFOGY YCCAT YBBTG SANNA ZZTDW GXABH ZYXZL LTTGA BZDFU KPNXV FOGQG UMHQR QHIMZ OCSDG ZLSBB NRMGV KGGVC PXZXD EAUQD\r\nKINGLY\r\nHMBIL OZUEO VCPTS ZPTEO AJLVL ELASI ILKDF HYTAS LVUAX PVVIJ GZONN RUDDL AZRXI NLEQP QQOGA MHWYG GFLXV WHTGW DNDUX PRNUJ CJQBW KCJXK SRJAP YSEFF QXVYA UMAYD XDJHZ ILNEZ RVKNW NUCVY UMYJQ MQSSS CWLDY DWQLB EQLAN RODZX DZYPD GCCIE ZOREK TVAQD YIGHJ TMWIS\r\nWARPING\r\nVNIFO LJMVL WFUEL YMMXU LPZCQ KGPNL YMCLP IMLKB EXAQV AYYBV FQBFO XSNLB JLVUP WXSES XXLNE TLEVE HJNTC YXAQN ZQVDI VVDWX RNDET HNAJM FLFDX JLZXC UXDWI KNWSO AXNBL WTTCI FHWTK WKGXP HYKCE HMIGT KFWGS CTIJS AZGBP WYOLE NIVUE ETRDP ALFXA ZCGLZ QFWXZ JLNCJ\r\nQUAKC\r\nXXNGH ETORI NLCKL FABNV BMRWO ZXEMZ ORRWA BOYUU FKSCE ANFKH JZKBZ RLWNZ UHSKE IBFKC TNMSF UBJQN TANNS KKCRE IRDLN QZCDI BXWCJ OCCUW VQUBB ATPAL XPTWI DQUUM KKBED PDQJG OPHML ZENEX DTWLI MNJZU HZLGV HNZJL APJKX KVCEK TFHLV NHVAC VROXZ QSDWX UFFNB EHTOB\r\nEYEY\r\nADPXA NEWMY EYLFL AUPHW QCHHE LQWBE FXAVI RYMFZ WKOMU TUBMX YTYER AAGDJ IZDFC YKPQQ AHUSO SFNPE EUUUV EWUOI RBKYY RMBIZ VWYCZ WJDVZ TIMNL VGSFQ OMZEE VKKAV SDXOY VATJA RDUQO CGSAX TBYTX MOOYT BDLUH EMEIF EFBDP SJFGJ WSFQK ROFTH XUGQS CYZBD PZLVL OVJAN', 'GSZIT DQKBF EZOBU YKMKO YAANU NERKJ HSJFG UMBWI AMMKM NYVXW ZGCQB WIQQD TBOCD XJWNK THKPX HOXOW JBZKZ TRIKW ZQQYE VJJNF MUAJY MCZVW XFERH WCVBV BGBIC YXBMH YTCUV RXFFM GKRXP LJCIJ AHAMV QNDAI KNNEB CRGSD GWIUB LUCML DRNBG QBZXC OJMQT AQYEJ FESUW RZWJQ\r\nPWVWZ OXOUN JEKRM WITKT QCOCA FXFAK JTRNB SLIYP DGUOK SJSBH MZZKJ DUYZL TXHOK SKCMX GBMWY KCJPZ GWQBO REYDY YFVKZ NKRYM EIISY WJWEG TYVJZ AMXST FTVZH TQHWH KJYJM WJLBK BQDOQ EBQWY FZJZK VZLHN AEEVW HBBHA PAXZJ OUPEJ HXKHQ ZCJSZ XNYEJ UOENA IFULQ PMIFT\r\nQIEEA NXSOD BKPXR LAJAU MBFYJ VGEWG KZIKX VXVMZ NLMJG WXEWI ZVIXY IHKCV PJYGD AEYHI LXGSS PBALL LFMET UFBXD CBHIX UMTRS FQFAF JPMVE QDDTU IODVH FVKLU TNSEI UPRDO IQOIB CPBTR GXECG YPLYL MCIFG XUOWA QYYTM FBFOD GERSC KLASS PGEUD PYZBC JQOQR WVYKC PYIZR\r\nTGHWP SXJTF LDVLZ SQHPQ DVRUV QLKAP OGDDV MHPAK LRHHO VRMEU THJTI NKVZZ MBMQU OHOTW ILBIH PWQBS SRRCE MQJOK WCWZF OEJYY GXQMT FWAHP IHWRG KPAJO BNFLG LXQDZ UOIWM TXUBY GTLNS VFMGD JGKWC WKVRS MALSM YLMQF IDSDU MUKFW XXBGD TSMRF EMLWW DVGQW NWKJQ GUXKR\r\nQJSCK YQAIY KXGQT QNVSQ ORHVI BJRIX LGYJB YODFK NRCYS VEPDR DYYVK TSTRJ RGCLA RGEFN WKJUK AXJFZ DIQMC FHSRP YWAFI VXGYN SHRPP FTJFY BTNWR YTAQY YFBXH SGEXZ OOOCD LHKJH KYDUN ZFCFA QOIQE PHCPF ZBVIH NLKBT ROZOC DCUKI TFLOG GDPFX AKTGY TPEMD KYSGQ JJPAB\r\nNTEWR LEABP EAFCN ILPIC HWNYN HDHQY YZEEM AGGQB IDXNT QMFBP LSUIQ HZNWV YTIDH HFIBS VXMSQ RIUWA IEJJP EBOPQ EEGDL JLWWJ YVGHX FHFVY BNNYZ ZGOHY YDDBT YCCTH SBAAB ZZTEW HXBCI ZYXZM MTTHB CZEGU LPAXV GOHQH UNIQR QIJNZ ODSEH ZMSCC ARNHV LHHVD PXZXE FBUQE\r\nLUFEO CIDPC RTQVH IQVPC KGORO POKHE EOJBX LWVKH ORDKN QRREG AICSS MDBBO KIMNE SOPYQ YYCAK ULZWA AXONR ZLVAZ BSBDN QMSDG TGYFZ JTGNJ HMGKQ WHPXX YNRWK DUKWB NBGLI EOSPI MRJSZ SDTRW DUWGY UYHHH TZOBW BZYOF PYOKS MCBIN BIWQB ATTEP ICMPJ VRKYB WEALG VUZEH\r\nDLHIQ CFUDC WIZPC RUUVZ COKBJ YEOLC RUBCO HUCYX PVAJD ARRXD IJXIQ VNLCX FCDZO WVNPN VVCLP GCPDP MFLGB RVAJL KJDTH DDTWV SLTPG MLAFU ICITV FCKVB ZVTWH YLWNQ AVLXC WGGBH IMWGY WYEVO MRYBP MUHEG YIWEN BGHFN AKEXO WRQCP LHDZP PGSTO ACIVA KBECK JIWVK FCLBF\r\nOOSGR BTYNX SMFKM LAQSZ QHNEY UOBHU YNNEA QYJVV LKIFB ASLKR CUKQU NMESU VRIKB XQLKF TSHIL VQCPS TASSI KKFNB XNWMS PUFWX QOEFC YFFVE ZPVQQ ATDAM ODTEX WPVVH KKQBW DWPCG YDRHM UBSBO WTEMX HSCUV RUMGZ RSUCM ADCKO KZFBK TLRMZ SRZAF ZNYOU PIWEO VLLSQ BRTYQ\r\nBPIMB HAYTN ANGDG BXIEY VCEEA GVYOA DMBLR JNTDZ YSUTX KXOTM NKNAJ BBQPF RZPDC NSIVV BEXWU WDHIA AXXXL AYXUR JOSNN JTORZ LYNCZ YFPLZ KRTHG LQWDV UTZAA LSSBL WPMUN LBKFB JPXVU CQWBM KONKM TUUNK OPGXE ATARD ADOPI WFDQF YWDVS JUDKE MXQVW CNZOP IZGLG ULFBH');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `content`) VALUES
(1, 'about', 'This system is the Training System for the FEU-EAC EAGER iTam (Programming Team). This can also serve as an online Programming Contest Management System. Another purpose would be recreational programming.<br><br>\r\n\r\nSolve problems using almost all the programming languages and see your program''s runtime. The shorter runtime, the better.\r\n\r\n<br><br>Why ''$echo''? It''s a mystery. :)\r\n'),
(2, 'contributors', 'Richard Paraggua: Ideas on efficient coding, layout, and more importantly on the security part which made me really paranoid :), basically made me restructure and improve my programming. Thanks Chard! :) <br><br>\n\nFerdinand Kenneth Abad: For debugging the submissions module. It is a core module that is in charge of checking the submissions.<br><br>\n\nCamille Jade Alcantara: For pointing out that the submit button has issues (fixed), and for giving me the reason to improve in writing the problems.<br><br>\n\nMarlon Perillo: For the idea that there should be a unique database entry on submissions having the same problem, runtime, and language. <br><br>\n\nACM: Inspiration.<br><br>\n\nInspirasyon: "$echo" hahahahaha!<br><br>\n\nMy arms: For always being there by my side.<br>\nMy feet: For always supporting me.\n\n<br><br>You? Help me(code, design ,ideas, etc)? PM <a href="http://facebook.com/edos4">fb.com/edos4</a> :)');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE IF NOT EXISTS `submissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `problem_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `runtime` text NOT NULL,
  `dateSubmitted` datetime NOT NULL,
  `language` text NOT NULL,
  `sourceCode` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `submissions`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `fname` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `users`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
