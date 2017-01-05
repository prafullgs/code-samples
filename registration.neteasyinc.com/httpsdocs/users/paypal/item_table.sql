CREATE TABLE item_table (
  id int(11) NOT NULL auto_increment,
  item_number varchar(11) NOT NULL default '0',
  mc_gross decimal(9,2) NOT NULL default '0.00',
  mc_currency enum('USD','CAD','EUR','GBP','JPY','CAD') NOT NULL default 'USD',
  PRIMARY KEY  (id),
  UNIQUE KEY item_number2 (item_number),
  KEY item_number1 (item_number)
) TYPE=MyISAM;


INSERT INTO item_table VALUES (1, '1', '0.01', 'USD');

