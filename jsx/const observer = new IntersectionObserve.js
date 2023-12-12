/**
		 *  JS REVEAL sans JQUEY
		 */

const items = document.querySelectorAll('.js-reveal');

const callback = (entries,observer) => {
	
	entries.forEach( (entry) => {

		if( entry.intersectionRatio > 0 ){

			entry.target.style.opacity = 1;
			 entry.target.style.marginTop = 0;

			observer.unobserve( entry.target );
		}

	})

}

if( items.length > 0 ){

	const observer = new IntersectionObserver( callback, {} )

	items.forEach( (item) => {
		observer.observe( item )
	})

}