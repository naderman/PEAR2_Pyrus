--TEST--
\PEAR2\Pyrus\ScriptFrontend\Commands::_findPEAR test 1: explicit config path
--FILE--
<?php
if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'testit')) {
    $dir = __DIR__ . '/testit';
    include __DIR__ . '/../../clean.php.inc';
}
require __DIR__ . '/setup.php.inc';

ob_start();
$cli = new \PEAR2\Pyrus\ScriptFrontend\Commands(true);
$cli->run($args = array (__DIR__ . '/testit', 'help'));

$contents = ob_get_contents();
ob_end_clean();
$help1 = 'Using PEAR installation found at ' . __DIR__ . DIRECTORY_SEPARATOR . 'testit' . "\n";
$help2 =
'
Pyrus, the installer for PEAR2

Usage:
  php findpear1.php [/path/to/pear] [options]
  php findpear1.php [/path/to/pear] [options] <command> [options] [args]

Options:
  -v, --verbose   increase verbosity
  -p, --paranoid  set or increase paranoia level
  -h, --help      show this help message and exit
  --version       show the program version and exit

Commands:
  install             Install a package.  Use install --plugin to install
                      plugins (alias: i)
  upgrade             Upgrade a package.  Use upgrade --plugin to upgrade
                      plugins (alias: up)
  uninstall           Uninstall a package.  Use uninstall --plugin to
                      uninstall plugins (alias: un)
  info                Display information about a package (alias: in)
  build               Build a PHP extension package from source and install
                      the compiled extension (alias: b)
  list-upgrades       List packages with upgrades available (alias: lu)
  remote-list         List all remote packages in a channel, organized by
                      category (alias: rd)
  download            Download a remote package to the current directory
                      (alias: d)
  list-packages       List all installed packages in all channels (alias:
                      l)
  list-channels       List all discovered channels (alias: lc)
  channel-discover    Discover a new channel (alias: di)
  channel-add         Add a new channel to the registry (alias: ca)
  channel-del         Remove a channel from the registry (alias: cd)
  upgrade-registry    Upgrade an old PEAR installation to the new registry
                      format (alias: ur)
  run-scripts         Run all post-install scripts for a package (alias: r)
  config-show         Show all configuration values (alias: cs)
  set                 Set a configuration value (alias: set)
  get                 Get a configuration value (alias: get)
  mypear              Set a configuration value (alias: m)
  help                Get help on a particular command, or all commands
                      (alias: h)
  make                Create or update a package.xml from a standard PEAR2
                      directory layout (alias: mk)
  pickle              Create or update a package.xml and then package a
                      PECL extension release (alias: pi)
  package             Create a release from an existing package.xml (alias:
                      p)
  run-phpt            Run PHPT tests (alias: rp)
  generate-pear2      Generate the subversion source layout for a new PEAR2
                      package (alias: gp)
  generate-ext        Generate the subversion source layout for a new PHP
                      extension that is PECL-ready (alias: es)
  scs-update          Simple channel server: Update all releases of a
                      within the get/ directory. (alias: su)
  scs-create          Simple channel server: Create a channel.xml, get/ and
                      rest/ directory for a channel (alias: sc)
  scs-add-maintainer  Simple Channel Server: Add a new maintaing developer
                      to the channel (alias: sam)
  scs-add-category    Simple Channel Server: Add a new category to the
                      channel (alias: sac)
  scs-categorize      Simple Channel Server: Categorize a package (alias:
                      scat)
  scs-release         Simple Channel Server: Release a package (alias: sr)

';
$test->assertEquals($help1 . $help2,
                    $contents,
                    'help output');
?>
===DONE===
--CLEAN--
<?php
$dir = __DIR__ . '/testit';
include __DIR__ . '/../../clean.php.inc';
?>
--EXPECT--
===DONE===