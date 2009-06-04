--TEST--
PEAR2_Pyrus_Installer::install() verify files installed correctly
--FILE--
<?php
include dirname(__FILE__) . '/../test_framework.php.inc';
$package = new PEAR2_Pyrus_Package(__DIR__.'/../../../sandbox/SimpleChannelServer/package.xml');
PEAR2_Pyrus::$options['packagingroot'] = __DIR__ . '/testit';
@mkdir(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'testit');
set_include_path(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'testit');
$c = PEAR2_Pyrus_Config::singleton('/usr/local/lib');
$c->bin_dir = '/usr/bin';
restore_include_path();
$c->saveConfig();
PEAR2_Pyrus_Installer::begin();
PEAR2_Pyrus_Installer::prepare($package);
PEAR2_Pyrus_Installer::commit();
$test->assertFileExists(__DIR__ . '/testit/usr/bin/pearscs', 'bin/pearscs');
$test->assertEquals(decoct(0755), decoct(0777 & fileperms(__DIR__ . '/testit/usr/bin/pearscs')), 'bin/pearscs perms');
$test->assertFileExists(__DIR__ . '/testit/usr/local/lib/php/PEAR2/SimpleChannelServer.php',
                        'src/PEAR2/SimpleChannelServer.php');
$test->assertEquals(file_get_contents(__DIR__.'/../../../sandbox/SimpleChannelServer/src/SimpleChannelServer.php'),
                    file_get_contents(__DIR__ . '/testit/usr/local/lib/php/PEAR2/SimpleChannelServer.php'), 'files match');

$test->assertEquals(array (
  '/usr/local/lib/docs/pear2.php.net/PEAR2_SimpleChannelServer/examples/update_channel.php' => 
  array (
    'role' => 'doc',
    'name' => 'examples/update_channel.php',
    'installed_as' => '/usr/local/lib/docs/pear2.php.net/PEAR2_SimpleChannelServer/examples/update_channel.php',
    'relativepath' => 'pear2.php.net/PEAR2_SimpleChannelServer/examples/update_channel.php',
    'configpath' => '/usr/local/lib/docs',
  ),
  '/usr/bin/pearscs' => 
  array (
    'role' => 'script',
    'name' => 'scripts/pearscs',
    'baseinstalldir' => '/',
    'installed_as' => '/usr/bin/pearscs',
    'relativepath' => 'pearscs',
    'configpath' => '/usr/bin',
  ),
  '/usr/local/lib/php/PEAR2/SimpleChannelServer.php' => 
  array (
    'role' => 'php',
    'name' => 'src/SimpleChannelServer.php',
    'baseinstalldir' => 'PEAR2',
    'installed_as' => '/usr/local/lib/php/PEAR2/SimpleChannelServer.php',
    'relativepath' => 'PEAR2/SimpleChannelServer.php',
    'configpath' => '/usr/local/lib/php',
  ),
  '/usr/local/lib/php/PEAR2/SimpleChannelServer/CLI.php' => 
  array (
    'role' => 'php',
    'name' => 'src/SimpleChannelServer/CLI.php',
    'baseinstalldir' => 'PEAR2',
    'installed_as' => '/usr/local/lib/php/PEAR2/SimpleChannelServer/CLI.php',
    'relativepath' => 'PEAR2/SimpleChannelServer/CLI.php',
    'configpath' => '/usr/local/lib/php',
  ),
  '/usr/local/lib/php/PEAR2/SimpleChannelServer/Categories.php' => 
  array (
    'role' => 'php',
    'name' => 'src/SimpleChannelServer/Categories.php',
    'baseinstalldir' => 'PEAR2',
    'installed_as' => '/usr/local/lib/php/PEAR2/SimpleChannelServer/Categories.php',
    'relativepath' => 'PEAR2/SimpleChannelServer/Categories.php',
    'configpath' => '/usr/local/lib/php',
  ),
  '/usr/local/lib/php/PEAR2/SimpleChannelServer/Categories/Exception.php' => 
  array (
    'role' => 'php',
    'name' => 'src/SimpleChannelServer/Categories/Exception.php',
    'baseinstalldir' => 'PEAR2',
    'installed_as' => '/usr/local/lib/php/PEAR2/SimpleChannelServer/Categories/Exception.php',
    'relativepath' => 'PEAR2/SimpleChannelServer/Categories/Exception.php',
    'configpath' => '/usr/local/lib/php',
  ),
  '/usr/local/lib/php/PEAR2/SimpleChannelServer/Channel.php' => 
  array (
    'role' => 'php',
    'name' => 'src/SimpleChannelServer/Channel.php',
    'baseinstalldir' => 'PEAR2',
    'installed_as' => '/usr/local/lib/php/PEAR2/SimpleChannelServer/Channel.php',
    'relativepath' => 'PEAR2/SimpleChannelServer/Channel.php',
    'configpath' => '/usr/local/lib/php',
  ),
  '/usr/local/lib/php/PEAR2/SimpleChannelServer/Exception.php' => 
  array (
    'role' => 'php',
    'name' => 'src/SimpleChannelServer/Exception.php',
    'baseinstalldir' => 'PEAR2',
    'installed_as' => '/usr/local/lib/php/PEAR2/SimpleChannelServer/Exception.php',
    'relativepath' => 'PEAR2/SimpleChannelServer/Exception.php',
    'configpath' => '/usr/local/lib/php',
  ),
  '/usr/local/lib/php/PEAR2/SimpleChannelServer/Get.php' => 
  array (
    'role' => 'php',
    'name' => 'src/SimpleChannelServer/Get.php',
    'baseinstalldir' => 'PEAR2',
    'installed_as' => '/usr/local/lib/php/PEAR2/SimpleChannelServer/Get.php',
    'relativepath' => 'PEAR2/SimpleChannelServer/Get.php',
    'configpath' => '/usr/local/lib/php',
  ),
  '/usr/local/lib/php/PEAR2/SimpleChannelServer/REST/Category.php' => 
  array (
    'role' => 'php',
    'name' => 'src/SimpleChannelServer/REST/Category.php',
    'baseinstalldir' => 'PEAR2',
    'installed_as' => '/usr/local/lib/php/PEAR2/SimpleChannelServer/REST/Category.php',
    'relativepath' => 'PEAR2/SimpleChannelServer/REST/Category.php',
    'configpath' => '/usr/local/lib/php',
  ),
  '/usr/local/lib/php/PEAR2/SimpleChannelServer/REST/Maintainer.php' => 
  array (
    'role' => 'php',
    'name' => 'src/SimpleChannelServer/REST/Maintainer.php',
    'baseinstalldir' => 'PEAR2',
    'installed_as' => '/usr/local/lib/php/PEAR2/SimpleChannelServer/REST/Maintainer.php',
    'relativepath' => 'PEAR2/SimpleChannelServer/REST/Maintainer.php',
    'configpath' => '/usr/local/lib/php',
  ),
  '/usr/local/lib/php/PEAR2/SimpleChannelServer/REST/Manager.php' => 
  array (
    'role' => 'php',
    'name' => 'src/SimpleChannelServer/REST/Manager.php',
    'baseinstalldir' => 'PEAR2',
    'installed_as' => '/usr/local/lib/php/PEAR2/SimpleChannelServer/REST/Manager.php',
    'relativepath' => 'PEAR2/SimpleChannelServer/REST/Manager.php',
    'configpath' => '/usr/local/lib/php',
  ),
  '/usr/local/lib/php/PEAR2/SimpleChannelServer/REST/Package.php' => 
  array (
    'role' => 'php',
    'name' => 'src/SimpleChannelServer/REST/Package.php',
    'baseinstalldir' => 'PEAR2',
    'installed_as' => '/usr/local/lib/php/PEAR2/SimpleChannelServer/REST/Package.php',
    'relativepath' => 'PEAR2/SimpleChannelServer/REST/Package.php',
    'configpath' => '/usr/local/lib/php',
  ),
  '/usr/local/lib/php/PEAR2/SimpleChannelServer/REST/Release.php' => 
  array (
    'role' => 'php',
    'name' => 'src/SimpleChannelServer/REST/Release.php',
    'baseinstalldir' => 'PEAR2',
    'installed_as' => '/usr/local/lib/php/PEAR2/SimpleChannelServer/REST/Release.php',
    'relativepath' => 'PEAR2/SimpleChannelServer/REST/Release.php',
    'configpath' => '/usr/local/lib/php',
  ),
), PEAR2_Pyrus_Config::current()->registry
                    ->info('PEAR2_SimpleChannelServer', 'pear2.php.net', 'installedfiles'), 'registered files');
?>
===DONE===
--CLEAN--
<?php
$dir = __DIR__ . '/testit';
include __DIR__ . '/../clean.php.inc';
?>
--EXPECT--
===DONE===