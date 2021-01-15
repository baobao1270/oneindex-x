# How to use
The file `nginx-site.conf` should be placed in `site-availables` and enable it.
`nginx-site.conf`
 - Line 4: `server_name sharepointproxy.example.com;`: replace the `sharepointproxy.example.com` to a domain name for proxy sharepoint.
 - Line 11 `proxy_pass https://<sharepoint_name>-my.sharepoint.com;`; Line 12 `proxy_set_header Host <sharepoint_name>-my.sharepoint.com;`: replace `<sharepoint_name>` to your sharepoint name.
 - Line 27 `server_name oneindex.example.com;`: replace it to your main OneIndex domain.

`controller/IndexController.php`
 - Line 81: `$url = str_replace("<sharepoint_name>-my.sharepoint.com", "sharepointproxy.example.com", $url);`
 - Line 171: `$_proxy_url = str_replace("luotianyi66ccff-my.sharepoint.com", "luotianyi-sharepointproxy.josephcz.xyz", $item['downloadUrl']);`
