<?php

// This file was created by Wolfgang (markus@best-practice.se)
// To install, copy this into your observium install directory such as /opt/observium/html/includes/


$rendered_maps = array();
if ($weathermap_dir = opendir('weathermap/maps/')) { //Open directory
    while (false !== ($weathermap_file = readdir($weathermap_dir))) { //while there are files to process
        if (strpos($weathermap_file,'.html')) { //if filename contains the string ".html"
            $weathermap_name = str_replace('.html','',$weathermap_file); //save filename and strip file ending
            $rendered_maps[$weathermap_file] = $weathermap_name; //add filename and mapname in array
        }
    }
    closedir($weathermap_dir);
}
 
$navbar['observium']['entries'][] = array('divider' => TRUE);
 
foreach ($rendered_maps as $map_page => $map_name)
{
  $weathermap_menu[] = array('title' => $map_name, 'url' => 'weathermap/maps/' . $map_page, 'icon' => 'oicon-map');
}
 
$navbar['observium']['entries'][] = array('title' => 'Weathermaps', 'url' => generate_url(array('page' => 'weathermap')), 'icon' => 'oicon-map', 'entries' => $weathermap_menu);
 
if ($_SESSION['userlevel'] >= '10')
{
  $navbar['observium']['entries'][] = array('title' => 'Weathermap Editor', 'url' => 'weathermap/editor.php', 'icon' => 'oicon-map');
}
 
?>
