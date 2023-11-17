import { __ } from '@wordpress/i18n'
import { useBlockProps, MediaUpload, MediaUploadCheck, RichText } from '@wordpress/block-editor'
import { Placeholder, Button } from '@wordpress/components'
import { useSelect, useDispatch } from '@wordpress/data'

//import './editor.scss'

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

	console.log('postID',postID,'featuredMedia',featuredMedia);

	// Attribution des informations de l'image
	const onSelectImage = picture => {

		console.log(picture) // Afficher les informations récupérées de l'image

		props.setAttributes( {
			pictureID: picture.id,
			pictureURL: picture.url,
			pictureAlt: picture.alt,
			pictureThumb: picture.sizes.thumbnail.url
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
			pictureAlt: null,
			pictureThumb: null
		})
	}
	// La fonction qui met à jour la valeur
	const onChangeContent = content => {
		props.setAttributes( { content: content } )
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
								icon="images-alt"
								label={ __( 'Photo', 'capitainewp-gut-bases' ) }
								instructions={ __( 'Select a picture', 'capitainewp-gut-bases' ) }
							>
								<Button
									isSecondary
									isLarge
									onClick={ open }
									icon="upload"
								>
									{ __( 'Import', 'capitainewp-gut-bases' ) }
								</Button>
							</Placeholder>
						) }
					/>
				</MediaUploadCheck>

			) : (

				<div className="capitaine-image-wrapper">
					<RichText
						tagName="h1"
						placeholder="Titre ici..."
						value={ props.attributes.content }
						className="titre"
						onChange={ onChangeContent }
					/>
					<img
						className="img-avant"
						src={ props.attributes.pictureURL }
						alt={ props.attributes.pictureAlt }
					/>
					<img
						className="thumb-avant"
						src={ props.attributes.pictureThumb }
						alt={ props.attributes.pictureAlt }
					/>

					{ props.isSelected && (

						<Button
							className="capitaine-remove-image"
							onClick={ onRemoveImage }
							icon="dismiss"
						>
							{ __( 'Remove picture', 'capitainewp-gut-bases' ) }
						</Button>

					) }
				</div>
			) }
		</div>

	)
}
