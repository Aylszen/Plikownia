<?php
// function to create dynamic treeview menus
function createTreeView($parent, $menu) {
   $html = "";
   if (isset($menu['parents'][$parent])) {
      $html .= "
      <ol class='tree'>";
       foreach ($menu['parents'][$parent] as $itemId) {
		  // creating subfolders
          if(!isset($menu['parents'][$itemId])) {
			 $link=$menu['items'][$itemId]['link'];
             $html .= "<li><label for='subfolder2'><span id='".$link."' onclick='viewFolderOnClick(id)'>".$menu['items'][$itemId]['label']."</span></label><input type='checkbox' name='subfolder2'/></li>";
          }
		  //creating the main folder
          if(isset($menu['parents'][$itemId])) {
			 $link=$menu['items'][$itemId]['link'];
             $html .= "
             <li><label for='subfolder2'><span id='".$link."' onclick='viewFolderOnClick(id)'>".$menu['items'][$itemId]['label']."</span></label> <input type='checkbox' name='subfolder2'/>";
             $html .= createTreeView($itemId, $menu);
             $html .= "</li>";
          }
       }
       $html .= "</ol>";
   }
   return $html;
}
?>