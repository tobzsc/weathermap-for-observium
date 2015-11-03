<?php

// This file was created by Wolfgang (markus@best-practice.se)
// This is for the older navbar setup < r5670
// To install, copy this into your observium install directory such as /opt/observium/html/includes/navbar-custom.inc.php

?>

<li class="divider"></li>
<li class="dropdown-submenu">
<a tabindex="-1" href="<?php echo(generate_url(array('page'=>'weathermap'))); ?>"><i class="menu-icon oicon-map"></i> Weather Maps</a>
<ul class="dropdown-menu">

<?php

$rendered_maps = array();
if ($weathermap_dir = opendir('weathermap/maps/')) {
    while (false !== ($weathermap_file = readdir($weathermap_dir))) {
        if (strpos($weathermap_file,'.html')) {
            $weathermap_name = str_replace('.html','',$weathermap_file);
            $rendered_maps[$weathermap_file] = $weathermap_name;
        }
    }
    closedir($weathermap_dir);
}

foreach ($rendered_maps as $map_page => $map_name)
{
  echo('            <li><a href="weathermap/maps/' . $map_page . '"><i class="menu-icon  oicon-mamap"></i> ' . $map_name . ' </a></li>');
}
?>
</ul>
</li>
