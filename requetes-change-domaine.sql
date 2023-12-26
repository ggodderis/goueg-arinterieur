/**
* https://www.arinterieur.retipolons.eu
* http://greg.arinterieur.fr
*/

UPDATE wp_options
SET option_value = replace(option_value, 'https://www.arinterieur.retipolons.eu', 'http://greg.arinterieur.fr')
WHERE option_name = 'home'
OR option_name = 'siteurl';

UPDATE wp_posts
SET guid = REPLACE (guid, 'https://www.arinterieur.retipolons.eu', 'http://greg.arinterieur.fr');

UPDATE wp_posts
SET post_content = REPLACE (post_content, 'https://www.arinterieur.retipolons.eu', 'http://greg.arinterieur.fr');

UPDATE wp_posts
SET guid = REPLACE (guid, 'https://www.arinterieur.retipolons.eu', 'http://greg.arinterieur.fr')
WHERE post_type = 'attachment';

UPDATE wp_postmeta
SET meta_value = REPLACE (meta_value, 'https://www.arinterieur.retipolons.eu','http://greg.arinterieur.fr');


/**
* YOAST
*/

/*
* TABLE wp_yoast_indexable
*
* permalink
* twitter_image
* open_graph_img
* open_graph_image_meta
* "path":"/home/retipolo/www/arinterieur/wp-content/uploads/2023/11/2-1.jpg"
*/

UPDATE wp_yoast_indexable
SET permalink = REPLACE (permalink, 'https://www.arinterieur.retipolons.eu', 'http://greg.arinterieur.fr');

UPDATE wp_yoast_indexable
SET twitter_image = REPLACE (twitter_image, 'https://www.arinterieur.retipolons.eu', 'http://greg.arinterieur.fr');

UPDATE wp_yoast_indexable
SET open_graph_image = REPLACE (open_graph_image, 'https://www.arinterieur.retipolons.eu', 'http://greg.arinterieur.fr');

UPDATE wp_yoast_indexable
SET open_graph_image_meta = REPLACE (open_graph_image_meta, 'https://www.arinterieur.retipolons.eu', 'http://greg.arinterieur.fr');

UPDATE wp_yoast_indexable
SET open_graph_image_meta = REPLACE (open_graph_image_meta, 'https://www.arinterieur.retipolons.eu', 'http://greg.arinterieur.fr');


/**
* TABLE wp_yoast_seo_links
* 
* url
*/

UPDATE wp_yoast_seo_links
SET url = REPLACE (url, 'https://www.arinterieur.retipolons.eu', 'http://greg.arinterieur.fr');