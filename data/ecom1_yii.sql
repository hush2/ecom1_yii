/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ecom1_yii.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` smallint(6) NOT NULL auto_increment,
  `category` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `category` (`category`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table ecom1_yii.categories: 5 rows
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT IGNORE INTO `categories` (`id`, `category`) VALUES
	(1, 'General Web Security'),
	(2, 'PHP Security'),
	(3, 'Common Attacks'),
	(4, 'JavaScript Security'),
	(5, 'Database Security');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table ecom1_yii.favorite_pages
DROP TABLE IF EXISTS `favorite_pages`;
CREATE TABLE IF NOT EXISTS `favorite_pages` (
  `user_id` int(10) unsigned NOT NULL,
  `page_id` mediumint(8) unsigned NOT NULL,
  `date_created` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_id`,`page_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table ecom1_yii.favorite_pages: 0 rows
/*!40000 ALTER TABLE `favorite_pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `favorite_pages` ENABLE KEYS */;


-- Dumping structure for table ecom1_yii.history
DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `type` enum('page','pdf') default NULL,
  `page_id` mediumint(8) unsigned default NULL,
  `pdf_id` smallint(5) unsigned default NULL,
  `date_created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `page_id` (`page_id`,`type`),
  KEY `pdf_id` (`pdf_id`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table ecom1_yii.history: 0 rows
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
/*!40000 ALTER TABLE `history` ENABLE KEYS */;


-- Dumping structure for table ecom1_yii.pages
DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `category_id` smallint(5) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` tinytext NOT NULL,
  `content` longtext NOT NULL,
  `date_created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `category_id` (`category_id`),
  KEY `creation_date` (`date_created`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- Dumping data for table ecom1_yii.pages: 23 rows
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT IGNORE INTO `pages` (`id`, `category_id`, `title`, `description`, `content`, `date_created`) VALUES
	(1, 2, 'Output Filtering', 'It is also important to filter what comes out of your applications.', 'It is also important to filter what comes out of your applications. You want to avoid outputting the wrong characters and breaking the page rendering. This is also important in order to block certain attacks involving JavaScript injected by malicious users.', '2012-09-02 21:14:11'),
	(2, 2, 'Input Filtering', 'Assume everything is dirty until proven clean.', 'Assume everything is dirty until proven clean. Filtering all data from external sources is probably the most important security measure you can take. This can be as easy as running some simple built-in functions on your variables.', '2012-09-02 21:18:00'),
	(3, 5, 'Educate', 'Educate users on the basics of password selection and data security.', 'Educate users on the basics of password selection and data security. Teach them how to pick a word or phase that is easy to remember, such as something they see visually each day, or perhaps something from childhood. Now show them simple substitutions of the letters with special characters and numbers. It makes the whole experience more interesting and less of a bureaucratic annoyance, and will reduce your support calls.', '2012-09-02 10:01:31'),
	(4, 2, 'Hide Your Errors', 'It\'s never a good idea to show the world your errors.', 'It\'s never a good idea to show the world your errors. Not only does it make you look bad, it also might give malicious users another clue to help them break your site. You should always have display_errors disabled in a production environment, but continue logging errors with log_errors for your own information.', '2012-09-02 21:18:28'),
	(5, 2, 'Database Queries', 'If your application uses a database to store data, this is another source of potential vulnerabilities.', 'If your application uses a database to store data, this is another source of potential vulnerabilities. SQL Injection is a very common attack that involves maliciously crafted user input designed to change the logic of a query. This potentially allows the user to run any kind of query or bypass security measures. Stopping it is usually as easy as properly escaping data, or using prepared statements.', '2012-09-02 21:18:31'),
	(6, 2, 'Use POST for Dangerous Actions', 'There are two common methods used to send data to a PHP application, GET and POST.', 'There are two common methods used to send data to a PHP application, GET and POST. It is important to carefully consider which method to use for a certain task. You should generally stick to POST when you are performing a potentially dangerous action (like deleting something). The reason is that is is much easier to trick a user into accessing a URL with GET parameters than it is to trick them into sending a POST request. Keep in mind that other precautions should also be taken to ensure requests are legitimate under a secure session.', '2012-09-02 21:18:37'),
	(7, 5, 'Inventory Accounts', 'Inventory the accounts stored within the database.', 'Inventory the accounts stored within the database. You should have reset critical DBA accounts, and locked out unneeded ones previously, but re-inventory to ensure you do not miss any. There are always service accounts and, with some database platforms, specific login credentials for add-on modules. Standard accounts created during database installation are commonly subject to exploit, providing access to data and database functions. Keep a list so you can compare over time.', '2012-09-02 21:18:39'),
	(8, 5, 'Password Strength', 'There is lively debate about how well strong passwords and password rotation improve security.', 'There is lively debate about how well strong passwords and password rotation improve security. Keystroke loggers and phishing attacks ignore these security measures. On the other hand, the fact that there are ways around these security precautions doesn’t mean they should be skipped, so my recommendation is to activate some password strength checks for all accounts. Having run penetration tests on databases, I can tell you from first-hand experience that weak passwords are pretty easy to guess; with a little time and an automated login program you can break most in a matter of hours. If I have a few live databases I can divide the password dictionary and run password checks in parallel, with a linear time savings. This is really easy to set up, and a basic implementation takes only a couple minutes. A couple more characters of (required) password length, and a requirement for numbers or special characters, both make guessing substantially more difficult.', '2012-09-02 21:18:42'),
	(9, 5, 'Authentication Methods', 'Choose domain authentication or database authentication - whichever works for you.', 'Choose domain authentication or database authentication - whichever works for you. I recommend domain authentication, but the point is to pick one and stick with it. Do not mix the two or later on, confusion and shifting responsibilities will create security gaps - cleaning up those messes is never fun. Do not rely on the underlying operating system for authentication, as that would sacrifice separation of duties, and OS compromise would automatically provide control over the data & database as well.', '2012-09-02 21:18:45'),
	(10, 5, 'Public & Demonstration Accounts', 'If you are surprised by default passwords, you would be downright shocked by how effectively a skilled attacker can leverage ‘Scott/Tiger’ and similar demonstration accounts to take control of a database.', 'If you are surprised by default passwords, you would be downright shocked by how effectively a skilled attacker can leverage ‘Scott/Tiger’ and similar demonstration accounts to take control of a database. Relatively low levels of permissions can be parlayed into administrative functions, so lock out unused accounts or delete them entirely. Periodically verify that they have not reverted because of a re-install or account reset.', '2012-09-02 21:18:47'),
	(11, 5, 'Reset Passwords', 'Absolutely the first basic step is to change all default passwords.', 'Absolutely the first basic step is to change all default passwords. If I need to break into a database, the very first thing I am going to try is to log into a known account with a default password. Simple, fast, and it rarely gets noticed. You would be surprised (okay, maybe not surprised, but definitely disturbed) at how often the default SA password is left in place.', '2012-09-02 21:17:19'),
	(12, 3, 'Password Cracking', 'Hashed strings can often be deciphered through \'brute forcing\'.', ' Bad news, eh? Yes, and particularly if your encrypted passwords/usernames are floating around in an unprotected file somewhere, and some Google hacker comes across it. You might think that just because your password now looks something like XWE42GH64223JHTF6533H in one of those files, it means that it can\'t be cracked? Wrong. Tools are freely available which will decipher a certain proportion of hashed and similarly encoded passwords.', '2012-09-02 21:18:50'),
	(13, 3, 'Google Hacking', 'This is by far the easiest hack of all.', ' It really is extraordinary what you can find in Google\'s index. And here\'s Newsflash #1: you can find a wealth of actual usernames and passwords using search strings.', '2012-09-02 21:16:05'),
	(14, 3, 'Authorization Bypass', 'Authorization Bypass is a frighteningly simple process which can be employed against poorly designed applications or content management frameworks.', 'Authorization Bypass is a frighteningly simple process which can be employed against poorly designed applications or content management frameworks. You know how it is… you run a small university and you want to give the undergraduate students something to do. So they build a content management framework for the Mickey Bags research department. Trouble is that this local portal is connected to other more important campus databases. Next thing you know, there goes the farm.', '2012-09-02 21:18:54'),
	(15, 3, 'Cross Site Scripting (XSS)', 'XSS or Cross Site Scripting is the other major vulnerability which dominates the web hacking landscape, and is an exceptionally tricky customer which seems particularly difficult to stop.', 'XSS or Cross Site Scripting is the other major vulnerability which dominates the web hacking landscape, and is an exceptionally tricky customer which seems particularly difficult to stop. XSS is about malicious (usually) JavaScript routines embedded in hyperlinks, which are used to hijack sessions, hijack ads in applications and steal personal information.', '2012-09-02 21:18:57'),
	(16, 3, 'SQL Injection', 'SQL Injection involves entering SQL code into web forms, eg. login fields, or into the browser address field, to access and manipulate the database behind the site, system or application.', 'SQL Injection involves entering SQL code into web forms, eg. login fields, or into the browser address field, to access and manipulate the database behind the site, system or application. When you enter text in the Username and Password fields of a login screen, the data you input is typically inserted into an SQL command. This command checks the data you\'ve entered against the relevant table in the database. If your input matches table/row data, you\'re granted access (in the case of a login screen). If not, you\'re knocked back out.', '2012-09-02 21:19:00'),
	(17, 1, 'Delete the Installation Folder', 'Once the installation is done there is no use for the installer folder in the day to day operations of a website.', 'Once the installation is done there is no use for the installer folder in the day to day operations of a website. It is very much possible for a hacker to run the installer once again, empty the database and take control of the website & its content. Ideally it is strongly advised to delete the folder once the installation is complete, but if you know your way around the web server, you can also opt to rename the folder.', '2012-09-02 21:19:03'),
	(18, 1, 'Password protect the Database', 'It is not a mandatory requirement in a lot of scripts to enter a database password and leaving them empty will still get the script installed.', 'It is not a mandatory requirement in a lot of scripts to enter a database password and leaving them empty will still get the script installed. An empty password is a criminal waste of an additional layer of security. Database password do not slow down the website when querying the database, so there is absolutely no reason not to have one.', '2012-09-02 21:17:32'),
	(19, 1, 'Add a Database Table Prefix', 'If you are using a CMS, blog or forum script, change the default database table prefix.', 'If you are using a CMS, blog or forum script, change the default database table prefix. For example in case of WordPress, the default database table prefix is “wp”. So if a brilliant hacker finds a way to extract data from a database, default table prefixes will leave you a sitting duck.', '2012-09-02 21:19:06'),
	(20, 1, 'Secure Admin Email Address', 'Keep the admin email address used to login to your webserver, CMS, database etc. away from the public eye.', 'Keep the admin email address used to login to your webserver, CMS, database etc. away from the public eye. Use a totally different address in your contact page. This will help from not being scammed by a phising email disguised to have been sent by your hosting company or domain registrar.', '2012-09-02 21:19:18'),
	(21, 1, 'Use Strong Passwords', 'Passwords like “loveydovey123”, “unicornlover” are definitely not cute and it is absolutely reckless to even consider using them.', 'Passwords like “loveydovey123”, “unicornlover” are definitely not cute and it is absolutely reckless to even consider using them. Your password does not have to reflect your “inner persona”  as they are supposed to keep things safe. Use a combination of alphabets, numbers and special characters and make sure they are atleast 10 characters long. Apps like Lastpass, KeePass etc. can help you generate strong passwords and to store them as well.', '2012-09-02 10:01:40'),
	(22, 1, 'Update Constantly', 'New features or not, upgrade to newer versions of scripts as soon as they are released.', 'New features or not, upgrade to newer versions of scripts as soon as they are released. Point upgrades mostly fix bugs in the script and are as important as a full version upgrade. If you are not sure whether the new update will break your customization, ask in the support forums and do not wait till you get your customization to be fixed before applying an update.', '2012-09-02 10:01:51'),
	(23, 1, 'Use Open Source Scripts', 'Unless you know what you are doing or have a well versed development team in your payroll, it is a great idea to use open source scripts.', 'Unless you know what you are doing or have a well versed development team in your payroll, it is a great idea to use open source scripts. Open source scripts like WordPress, Drupal, Joomla, Magento etc. are feature rich, powerful and are backed by thousands of coders for update & support. This avoids websites falling prey to hackers & spammers due to poorly written code. Instead of building from scratch, you can use the existing scripts and modify them to your liking. Commercial scripts from reputed companies can also be deployed if they issue updates & patches regularly.', '2012-09-02 10:01:01');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;


-- Dumping structure for table ecom1_yii.pdfs
DROP TABLE IF EXISTS `pdfs`;
CREATE TABLE IF NOT EXISTS `pdfs` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `tmp_name` char(40) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` tinytext NOT NULL,
  `file_name` varchar(4096) NOT NULL,
  `size` mediumint(8) unsigned NOT NULL,
  `date_created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `tmp_name` (`tmp_name`),
  KEY `date_created` (`date_created`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table ecom1_yii.pdfs: 4 rows
/*!40000 ALTER TABLE `pdfs` DISABLE KEYS */;
INSERT IGNORE INTO `pdfs` (`id`, `tmp_name`, `title`, `description`, `file_name`, `size`, `date_created`) VALUES
	(1, '18d56c68edc4702fae12a05474578fc94ef73af2', 'Javascript Cheat Sheet', 'Javascript Cheat Sheet v1', 'javascript-cheat-sheet-v1.pdf', 453, '2012-09-02 10:11:55'),
	(2, '1db8b3a8c27818338744e335981b15f701432799', 'mod_rewrite Cheat Sheet', 'mod_rewrite Cheat Sheet v2', 'mod_rewrite-cheat-sheet-v2.pdf', 563, '2012-09-02 10:12:16'),
	(3, 'a222ea212203a59712befa2efef3fb57e4d0680c', 'MySQL Cheat Sheet', 'MySQL Cheat Sheet v1', 'mysql-cheat-sheet-v1.pdf', 347, '2012-09-02 10:12:33'),
	(4, 'b7cfd1abc69d33cb3f21ed72fe81f5ac115e47ae', 'PHP Cheat Sheet', 'PHP Cheat Sheet v2', 'php-cheat-sheet-v2.pdf', 543, '2012-09-02 10:12:50');
/*!40000 ALTER TABLE `pdfs` ENABLE KEYS */;


-- Dumping structure for table ecom1_yii.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `type` enum('member','admin') NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `pass` varbinary(32) default NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `date_expires` date NOT NULL,
  `date_created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ecom1_yii.users: 3 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `type`, `username`, `email`, `pass`, `first_name`, `last_name`, `date_expires`, `date_created`, `date_modified`) VALUES
	(1, 'admin', 'admin', 'admin@example.com', _binary 0x99F4D019523960B5F0F4D76B8A3304D89535542A930B3726B2D43E7BDFBA8927, 'admin', 'admin', '2012-10-02', '2012-09-02 10:06:52', '0000-00-00 00:00:00'),
	(2, 'member', 'demo', 'demo@example.com', _binary 0x99F4D019523960B5F0F4D76B8A3304D89535542A930B3726B2D43E7BDFBA8927, 'demo', 'demo', '2012-10-02', '2012-09-02 10:07:09', '0000-00-00 00:00:00'),
	(3, 'member', 'demo2', 'demo2@example.com', _binary 0x99F4D019523960B5F0F4D76B8A3304D89535542A930B3726B2D43E7BDFBA8927, 'demo2', 'demo2', '2012-08-02', '2012-09-02 10:07:26', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
