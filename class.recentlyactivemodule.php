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
  
  $UserModel = new UserModel();
  $RecentlyActiveUsers = $UserModel->GetActiveUsers($limit);

  echo '<div id="RecentlyActive" class="Box RecentlyActiveBox">';
  echo '<ul class="PanelInfo PanelRecentlyActive">';
  echo '<h4>';
  echo T('Recently Active Users');
  echo '</h4>';
  for ($k = 0;$k < $limit; $k++) {
    echo '<li><strong><a class="UserLink" href="';
    echo Gdn_Format::Url('/profile/1/admin');  // help!
    echo '">';
    echo Gdn_Format::Text($RecentlyActiveUsers[0]['Name']); // help!
    echo '</a></strong>';
    echo  Gdn_Format::Seconds($RecentlyActiveUsers[0]['DateLastActive']); //help!
    echo '</li>';
  }
  echo '</ul></div>';
  }
}
