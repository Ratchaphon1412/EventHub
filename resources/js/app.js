import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import { initTabFlowbite } from './tabflowbite.js';





window.Alpine = Alpine;
Alpine.plugin(focus);

Alpine.start();
