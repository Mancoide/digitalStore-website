<template>
	<div class="text-center">
		<v-pagination
			v-model="page"
			:length="links.length - 2"
			:total-visible="7"
			@click="reloadPage(page, location)"
		></v-pagination>
	</div>
</template>

<script>
  	import { Inertia } from '@inertiajs/inertia';
	import { Link } from '@inertiajs/inertia-vue3'

  	export default {
    	components: {
      		Link,
    	},
		props: {
			links: Array,
		},
		data () {
			let uri = window.location.search.substring(1);
    		let urlParams = new URLSearchParams(uri).get('page');

            return {
                location: window.location.pathname,
				page: urlParams ? parseInt(urlParams) : 1,
			}
		},
		methods: {
			reloadPage(page, location){
				Inertia.visit(location + '?page='+page)
			}
		},

  	}
</script>
