import { __ } from '@wordpress/i18n'
import { useBlockProps, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor'
import { Placeholder, Button, TextareaControl } from '@wordpress/components'
import { useSelect, useDispatch } from '@wordpress/data'


import './editor.scss'

export default function Edit( props ) {
	const blockProps = useBlockProps()

	const { postID, featuredMedia } = useSelect( (select) => {
		return {
			postID: select('core/editor').getCurrentPostId(),
			featuredMedia : select('core/editor').getEditedPostAttribute('featured_media')
		}
	}
	)
	const { editPost } = useDispatch('core/editor');

	//console.log('postID',postID,'featuredMedia',featuredMedia);

	// Attribution des informations de l'image
	const onSelectImage = picture => {

		console.log( picture );
		 // Afficher les informations récupérées de l'image
		//  console.log(
		//  picture?.sizes?.[ size ]?.url || picture?.media_details?.sizes?.[ size ]?.source_url || picture.url);

		props.setAttributes( {
			pictureID: picture.id,
			pictureURL: picture?.sizes?.desk?.url || picture?.sizes?.full?.url || picture.url,
			pictureMobile: picture?.sizes?.mobile?.url || picture?.sizes?.tablet?.url || picture.url,
			pictureAlt: picture.alt,
		})

		/**
		 *  Si l'image de mise en avant est vide alors on lui passe l'id de l'image téléchargé
		 */
		featuredMedia ? '' : editPost({ featured_media: picture.id })
	}

	// Effacement des données de l'image
	const onRemoveImage = () => {
		props.setAttributes({
			pictureID: null,
			pictureURL: null,
			pictureMobile: null,
			pictureAlt: null
		})
	}


	return (
		<div { ...blockProps }>

			{ ! props.attributes.pictureID ? (
				<MediaUploadCheck>
					<MediaUpload
						onSelect={ onSelectImage }
						allowedTypes={ [ 'image' ] }
						value={ props.attributes.pictureID }
						render={ ( { open } ) => (
							<Placeholder
								className="placeholder"
								icon="images-alt"
								label="Visuel bandeau haut de page"
								instructions="Sélectionner une image"
							>
								<Button
									isSecondary
									isLarge
									onClick={ open }
									icon="upload"
									className="bt_import"
								>
									{ __( 'Importer une image', 'capitainewp-gut-bases' ) }
								</Button>
							</Placeholder>
						) }
					/>
				</MediaUploadCheck>
			) : (
				<>

				<picture>
					<source className="img-mobile" media="(max-width:750px)" srcset={ props.attributes.pictureMobile } />
					<img className="img-desk" src={ props.attributes.pictureURL } alt={ props.attributes.pictureAlt } />
				</picture>

				
					{ props.isSelected && (

						<Button
							className="bt_change_image"
							onClick={ onRemoveImage }
							icon="dismiss"
						>
							{ __( 'Changer d\'image', 'capitainewp-gut-bases' ) }
						</Button>

					) }
				</>
			) }

			<TextareaControl
				label="Description"
				placeholder="Saisir la description ici..."
				value={ props.attributes.description || '' }
				onChange={ ( value ) => {props.setAttributes( { description: value } ) } }
			/>

		</div>

	)
}
