<?php
/*
XtraUpload - File Hosting Software
Copyright (C) 2006-2007  Matthew Glinski and XtraFile.com
Link: http://www.xtrafile.com
-----------------------------------------------------------------
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program(LICENSE.txt); if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

$sql1 = "
INSERT INTO `config` (`id`, `name`, `value`, `description1`, `description2`, `group`, `type`, `invincible`) VALUES (NULL, 'allow_identical_files', '0', 'Allow Identical Files', 'Yes, Allow identical files to be uploaded|-|No', 'Feature Settings', 'yesno', 1);

UPDATE `config` SET `value` = '1.6.0,0.1.0.0' WHERE `name` = 'version'
";

echo '-> Upgrading From XtraUpload 1.6.0 BETA-4 to XtraUpload 1.6 RC 1.';
$sqls = explode(';', $sql1);
$i = 0;
foreach($sqls as $sql) 
{
	$db->query($sql);
	$i++;
	flush();
}
echo '
-> Done, '.$i.' Querys Run!
--------------------------------------';
?>