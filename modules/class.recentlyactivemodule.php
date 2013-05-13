<?php if (!defined('APPLICATION')) exit();
/**
  * This module is a simple html box inserted with the right mark up into the
  * panel.
  */
  
class RecentlyActiveModule extends Gdn_Module {

 public function AssetTarget() {
  return 'Panel';
}
 public function ToString() {
  // change to see more or less users
  $limit = 7;
  
  // Have to call Result() to actually get the data proper
  $UserModel = new UserModel();
  $RecentlyActiveUsers = $UserModel->GetActiveUsers($limit)->Result();
  echo '<div id="RecentlyActive" class="Box RecentlyActiveBox">';
  echo '<ul class="PanelInfo PanelRecentlyActive">';
  echo '<h4>';
  echo T('Recently Active Users');
  echo '</h4>';
  
  // Loop through the array of user objects
  foreach ($RecentlyActiveUsers as $User) {
    echo '<li><strong>';
    echo UserAnchor($User, 'UserLink'); // use the useranchor function to print a link to the profile with the name as the anchor text. The 'UserLink' is the css class to use for the a tag
    echo '</strong>';
    echo  Gdn_Format::Seconds($User->DateLastActive); // the Seconds() method formats seconds in a human-readable way (ie. 45 seconds, 15 minutes, 2 hours, 4 days, 2 months, etc).
    echo '</li>';
  }
  echo '</ul></div>';
  }
}
