import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import DefaultLayout from '@/Pages/includes/Layout.vue' 
import { InertiaProgress } from '@inertiajs/progress'
// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { aliases, mdi } from 'vuetify/iconsets/mdi'

const vuetify = createVuetify({
  	components,
  	directives,
  	icons: {
		defaultSet: 'mdi',
		aliases,
		sets: {
			mdi,
		}
  	},
})

InertiaProgress.init();

createInertiaApp({
  	resolve: (name) => {
		const page = resolvePageComponent(
			`./Pages/${name}.vue`,
			import.meta.glob("./Pages/**/*.vue")
		);
		page.then((module) => {
			module.default.layout =  DefaultLayout;
		});

		return page;
  	},
	setup({ el, App, props, plugin }) {
		createApp({ render: () => h(App, props) })
		.use(plugin)
		.use(vuetify)
		.mount(el)
	},
});

