import Home from './components/home.vue'
import Login from './components/login.vue'

export const routes = [
    { path: '/', component: Home, name: 'Home' },
    { path: '/login', component: Login, name: 'Login' },
];