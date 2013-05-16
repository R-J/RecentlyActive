<?php if (!defined('APPLICATION')) exit();
/**
  * This module is a simple html box inserted with the right mark up into the
  * panel showing the last 7 most recently active users
  */
  
class RecentlyActiveModule extends Gdn_Module {

 public function AssetTarget() {
  return 'Panel';
 }
 public function ToString() {
  // change to see more or less users
  $limit = 7;
  
  $UserModel = new UserModel();
  $RecentlyActiveUsers = $UserModel->GetActiveUsers($limit)->Result();
  echo '<div id="RecentlyActive" class="Box RecentlyActiveBox">';
  echo '<ul class="PanelInfo PanelRecentlyActive">';
  echo '<h4>'.T('Recently Active Users').'</h4>';
  
  // Loop through the array of user objects
  foreach ($RecentlyActiveUsers as $User) {
    echo '<li><strong>'.UserAnchor($User, 'UserLink').'</strong>';
    echo  Gdn_Format::Seconds($User->DateLastActive).'</li>';
  }
  echo '</ul></div>';
  }
}
