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
             $html .= "<li onclick='viewFolderOnClick(".$menu['items'][$itemId]['link'].")'><label for='subfolder2'></label>".$menu['items'][$itemId]['label']."<input type='checkbox' name='subfolder2'/></li>";
          }
		  //creating the main folder
          if(isset($menu['parents'][$itemId])) {
             $html .= "
             <li><label for='subfolder2'><a href='".$menu['items'][$itemId]['link']."'>".$menu['items'][$itemId]['label']."</a></label> <input type='checkbox' name='subfolder2'/>";
             $html .= createTreeView($itemId, $menu);
             $html .= "</li>";
          }
       }
       $html .= "</ol>";
   }
   return $html;
}
?>