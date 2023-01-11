import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import DefaultLayout from '@/Pages/includes/Layout.vue'
import { InertiaProgress } from '@inertiajs/progress'
// Vuetify
import 'vuetify/styles';
import '@mdi/font/css/materialdesignicons.css';
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

//Swal2
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
// //Mask
// import * as VueInputMask from 'vue-inputmask';

const vuetify = createVuetify({
  	components,
  	directives,
	icons: {
		defaultSet: 'mdi', // This is already the default value - only for display purposes
	},
	theme: {
		defaultTheme: 'dark'
		// defaultTheme: 'light'
	}
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
		return createApp({ render: () => h(App, props) })
			.use(plugin)
            .use(VueSweetalert2)
            // .use(VueInputMask.default)
			.use(vuetify)
            .mount(el);

	},
});

