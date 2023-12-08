<?php
if( is_admin() ) {

function ajouter_sous_menu_materiels(){

    add_submenu_page(
                    'edit.php?post_type=materiels',//$parent_slug
                    'Afficher les EPI',//$page_title
                    'Afficher les EPI',//$menu_title
                    'create_posts',//$capability
                    'edit.php?post_type=materiels&other=epi&orderby=type-materiel&order=asc',//$menu_slug
                    ''//$function
    );

}
add_action('admin_menu', 'ajouter_sous_menu_materiels');

/**
* on Remove les metaboxes dont on a pas besoin
* celle des terms type-materiel et commentaire pour y placer une metaboxes personnalisée
*/
  // if( isset($pagenow) && $pagenow === 'edit.php'
  //      && isset($_GET['post_type']) && $_GET['post_type'] === 'materiels' ):

    function remove_metabox_comment(){

        remove_meta_box( 'commentsdiv', 'materiels', 'normal' );
        remove_meta_box( 'commentstatusdiv','materiels','normal' );
        remove_meta_box( 'postcustom', 'materiels', 'normal' );
        remove_meta_box( 'type-materieldiv', 'materiels', 'side' );
        add_meta_box('commentsdiv', 'Contrôles', 'goueg_render_comments','materiels');

    }
    add_action( 'add_meta_boxes', "remove_metabox_comment", 10 , 1);

    function goueg_render_comments( $post ){

        require __DIR__.'/temp/controles.php';

    }

  // endif;

/**
	* Supprimer la modification rapide sur le matériel
	* en attendant de pouvoir la customiser..
	*/
function remove_quick_edit_links_matos( $actions, $post ) {

    if ($post->post_type === 'materiels'):
    unset( $actions[ 'inline hide-if-no-js' ] );
    endif;

    return $actions;

}
add_filter( 'post_row_actions', 'remove_quick_edit_links_matos', 10, 2 );

/**
	* Les métas boxes de la fiche matériel
	*/
$matos = new goueg_metaboxes('_goueg_fiche_materiel','Fiche de vie matériel','materiels');

// $matos->add('_goueg_Emprunteur','','emprunteur')
$matos->add('_goueg_ligne1','','div_start')
      ->add('_goueg_matosType','Type de matériel','select_taxo','Selectionner le type de matériel','','')
			->add('_goueg_matosEPI','EPI','group_radios_matos','label','',array('non'=>'non','oui'=>'oui'))
			->add('','','div_stop')
			->add('_goueg_content','','div_start')
			->add('_goueg_ligne2','','div_start')
			->add('_goueg_matosFabriquant','Fabriquant','text','Saisir le fabriquant')
			->add('_goueg_matosReference','Référence fabriquant','text','Saisir la référence fabriquant')
			->add('_goueg_matosTaille','Taille','text','Saisir la taille')
			->add('_goueg_matosLongueur','Longueur','text','Saisir la longueur')
			->add('_goueg_matosSignes','Signes distinctifs','text','Saisir les signes distinctifs')
			->add('','','div_stop')
			->add('_goueg_ligne3','','div_start')
			->add('_goueg_matosRefMarque','Référence marquage','textarea','Saisir la référence marquage')
			->add('_goueg_matosDateAchat','Date d\'achat','date')
			->add('_goueg_matosDateVie','Date de vie théorique','text','Saisir la date de vie théorique')
			->add('_goueg_matosDateRebut','Date de mise au rebut','date')
			->add('','','div_stop')
			->add('','','div_stop')
			->add('_goueg_ligne4','','div_start')
			->add('_goueg_matosEtat','Etat du matériel :','select','Etat','',array(1 =>'Neuf',2 =>'Bon',3=>'Utilisation limite',4=>'Rebut'))
      ->add('_goueg_matosLieuStockage','Lieu de stockage :','text','Saisir le lieu de stockage')
      ->add('','','div_stop');

/**
	* Ajouter des colonnes de triable à l'admin Matériels
	*/
function custom_materiels_columns_title($columns) {

	global $post;

	unset($columns['date']);
	unset( $columns['author']);
	$columns['EPI'] = 'EPI';
  $columns['date_validite'] = 'Date de validité';

 return $columns;
}
add_filter('manage_materiels_posts_columns', 'custom_materiels_columns_title');

function custom_materiels_columns_content($columns){

	  global $post;

		switch ($columns) {

			case 'EPI':
				$is_EPI = get_post_meta( get_the_ID() , '_goueg_matosEPI' , true );
				if( !empty($is_EPI) ):
					echo $is_EPI;
				endif;
			break;
      case 'date_validite':
        $is_EPI = get_post_meta( get_the_ID() , '_goueg_matosEPI' , true );
        if( $is_EPI === 'oui' ):
          $string = get_post_meta( get_the_ID() , '_goueg_ValiditeControle' , true );
          if( !empty($string) ){
            $date = new DateTime("{$string}");
            $date = (clone $date)->format("d/m/Y");
            echo $date;
          }else{
            echo 'inconnue';
          }
        endif;
      break;

		}
}
add_action('manage_materiels_posts_custom_column', 'custom_materiels_columns_content',10,2);

/**
 *  Demande GDA du 7 décembre 2023
 *  Ajout d'un select pour afficher que la cotégorie selectionné 
 *  du genre carte de france
 */

 function add_admin_filters( $post_type ){
	if( 'materiels' !== $post_type ){
		return;
	}
  echo '<pre>';
  print_r( get_categories('taxonomy=type-materiel&type=materiels') );
  echo '</pre>';
}
add_action( 'restrict_manage_posts', 'add_admin_filters', 10, 1 );

/**
 * 
 */

function custom_materiels_sortable_column( $columns ){
		$columns['taxonomy-type-materiel'] = 'type-materiel';
		$columns['EPI'] = 'EPI';
		return $columns;
}
add_filter('manage_edit-materiels_sortable_columns','custom_materiels_sortable_column');

/**
  * Function qui fait le trie
  */
function materiels_columns_orderby( $query ) {

		global $pagenow;

		if( ! is_admin() )
				return;

		$orderby = $query->get('orderby');

		switch( $orderby ){
				case 'EPI':
					// $meta_query[]=[
	        //   'key'     => '_goueg_matosEPI',
	        //   'value'   => 'oui'
	        // ];
					// $query->set('meta_query',$meta_query);
						$query->set('meta_key','_goueg_matosEPI');
						$query->set('orderby','meta_value');
				break;

		}

    if( isset($_GET['other']) && !empty($_GET['other']) && $_GET['other'] === 'epi' ):

      $meta_query_args = array(

        'relation' => 'AND', // "OR"
          array(
              'key'     => '_goueg_matosEPI',
              'value'   => 'oui',
              'compare' => '='
          )
        );
        $query->set('meta_query',$meta_query_args);
        // $query->set('meta_key','last_name');
        // $query->set('orderby','last_name');
    endif;

    /**
     *  zone de trie par catégorie dema,de du 7 décembre 2023
     */
    if( isset($_GET['other']) && !empty($_GET['other']) && $_GET['other'] === 'greg' ):

      $taxquery = array(
        array(
          'taxonomy' => 'type-materiel',
          'field' => 'term_id',
          'terms' => array( 26 ),
          'operator'=> 'IN'
        )
    );
    $query->set( 'tax_query', $taxquery );
    $query->set('post_type', array( 'materiels' ));
    endif;

}

add_filter( 'pre_get_posts', 'materiels_columns_orderby' );

/**
  * Ajouter un lien Matériels EPI en haut de la page d'admin
  *
  */
function add_link_to_views_materiels( $views ){
    $class = ( isset($_GET['other']) &&  $_GET['other'] === "epi" ) ? 'current' : '';
    $views['materiel_epi'] = '<a class="'.$class.'" href="edit.php?post_type=materiels&other=epi&orderby=type-materiel&order=asc">Matériels EPI</a>';
    return $views;
}

add_filter( 'views_edit-materiels', 'add_link_to_views_materiels' );

} /* fin de is_admin */

?>
