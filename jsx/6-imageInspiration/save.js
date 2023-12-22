import { __ } from '@wordpress/i18n'
import { useBlockProps } from '@wordpress/block-editor'

export default function save( props ) {
	const blockProps = useBlockProps.save()

	return (
		props.attributes.pictureID && (
			<div { ...blockProps }>
				<picture>
					<source className="img-mobile" media="(max-width:750px)" srcset={ props.attributes.pictureMobile } />
					<img className="img-desk" src={ props.attributes.pictureURL } alt={ props.attributes.pictureAlt } />
				</picture>
			</div>
		)
	)
}
