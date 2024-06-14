import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css';

// import Alpine from 'alpinejs';
// window.Alpine = Alpine;
// Alpine.start();

import { createApp } from 'vue';
import { createHead } from '@unhead/vue'
import app from './views/app.vue';
import router from './router';


createApp(app).use(router).use(createHead).mount("#app");