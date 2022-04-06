import Home from './components/home.vue'
import Login from './components/login.vue'
import Dashboard from './components/Dashboard.vue'

export const routes = [
    { 
        path: '/', 
        component: Home, 
        name: 'Home' 
    },
    { 
        path: '/login', 
        component: Login, 
        name: 'Login' 
    },
    { 
        path: '/dashboard', 
        component: Dashboard,
        name: 'Dashboard' 
    },  
]