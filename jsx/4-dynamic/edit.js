import { useBlockProps } from '@wordpress/block-editor'
import ServerSideRender from '@wordpress/server-side-render';

export default function Edit( props ) {
	const blockProps = useBlockProps()

	
	return (

		<div { ...blockProps }>
			<ServerSideRender 
				block="goueg/dynamic"
			/>	
		</div>

	)
}
