<?php if (!defined('APPLICATION')) exit();
/**
  * This Plugin includes a module into the side panel.
  * if all logic could be done in the module, nothing else
  * than planting the module must be done in the plugin.
  * So the plugin consists of only three lines
  * 
  * 1. include_once(PATH_PLUGINS.DS.'RecentlyActive'.DS.'class.recentlyactivemodule.php');
  * We're loading the panel module(containing the RecentlyActiveModul
  * class)
  *
  * 2. $RecentlyActiveModule = new RecentlyActiveModule($Sender);
  * We've included it and so we can now create an instance of it
  *
  * 3. $Sender->AddModule($RecentlyActiveModule);
  * Well, I must admit I haven't understood "$Sender" right now and this is
  * somehow mysterious to me. It's obvious though, that we have to give the
  * information on what to do back to our framework  
  */

$PluginInfo['RecentlyActive'] = array(
   'Name' => 'RecentlyActive',
   'Description' => "Shows the most recently active users in the panel",
   'Version' => '0.1',
   'Requires' => FALSE, 
   'HasLocale' => FALSE,
   'Author' => "Robin",
   'RegisterPermissions' => FALSE,
   'SettingsPermission' => FALSE
);

class RecentlyActivePlugin extends Gdn_Plugin {
  
  public function Base_Render_Before($Sender) {
    include_once(PATH_PLUGINS.DS.'RecentlyActive'.DS.'class.recentlyactivemodule.php');
    $RecentlyActiveModule = new RecentlyActiveModule($Sender);
    $Sender->AddModule($RecentlyActiveModule);
  }
}
