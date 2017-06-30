1. Install the Weathermap in the Observium / LibreNMS folder

```
    cd /opt/observium/html 
    git clone https://github.com/tobzsc/weathermap-for-observium.git weathermap
```

2. Edit data-pick.php and make sure the variables at the start are all ok.

3. Within editor.php, make sure you set $ENABLED=true and check the correct url for $weathermap_url;

4. Make the configs directory writeable by your web server, either chown apache:apache configs/ or chmod 777 configs (I'd highly advise you choose the first option, replace apache:apache with your web servers user and group.)

5. Point your browser to your install /weathermap/editor.php (i.e http://testurl.org/weathermap/editor.php)

6. Create your maps, please note when you create a MAP, please click Map Style, ensure Overlib is selected for HTML Style and click submit.

7. Enable the cron process:

```
    */5 * * * * /opt/observium/html/weathermap/weathermap --config=/opt/observium/html/weathermap/configs/config.conf --image-uri=http://testurl.org/weathermap/maps/config.png 2>/dev/null 1>/dev/null
```

8. If you are installing this into Observium then you can use the navbar-custom.inc.php by putting it into /opt/observium/html/includes/.

**** IMPORTANT SECURITY *****

It is highly recommended that you set $ENABLED=false in editor.php when you are not editing maps as this is accessible by anyone unless you secure it via .htaccess or your web server config.
