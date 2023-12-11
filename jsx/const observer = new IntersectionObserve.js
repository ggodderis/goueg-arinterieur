const observer = new IntersectionObserver( (entries) => {
			for( const entry of entries ){
				if( entry.isIntersecting ){
					entry.target.animate( [
						{ transform: 'translateY(5rem)', opacity : 0 },
						{ transform: 'translateY(0)', opacity : 1 }
					], {duration: 400} )
				}
			}
		})
		
		//observer.observe( document.querySelector('.wp-block-goueg-presentation, .google_content') )
		// Mais on peut regarder plusieurs éléments
		const items = document.querySelectorAll('.wp-block-group, .google_content, .vignette-realisation')
		
		for (const item of items) {
			observer.observe(item)
		}