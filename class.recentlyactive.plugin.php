<?php if (!defined('APPLICATION')) exit();
/**
  * This Plugin includes a module into the side panel.
  * The module shows the most recently active users with
  * the time when their last activity has been
  */

$PluginInfo['RecentlyActive'] = array(
   'Name' => 'RecentlyActive',
   'Description' => "Shows the most recently active users in the panel",
   'Version' => '1.0',
   'Requires' => FALSE, 
   'HasLocale' => FALSE,
   'Author' => "Robin",
   'RegisterPermissions' => FALSE,
   'SettingsPermission' => FALSE,
   'AuthorUrl' => 'http://http://vanillaforums.org/discussion/comment/182567/#Comment_182567'
);

class RecentlyActivePlugin extends Gdn_Plugin {
  
  public function Base_Render_Before($Sender) {
    // only add the module if we are in the panel asset and NOT in the dashboard
    if(GetValue('Panel',$Sender->Assets) && $Sender->MasterView != 'admin') {
      $RecentlyActiveModule = new RecentlyActiveModule($Sender);
      $Sender->AddModule($RecentlyActiveModule);
    }
  }
}
