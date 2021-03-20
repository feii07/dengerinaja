require('./bootstrap');

window.Vue = require('vue');

// import dependecies tambahan
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import Axios from 'axios';
import BootstrapVue from 'bootstrap-vue' //Importing

Vue.use(BootstrapVue) // Telling Vue to use this in whole application

Vue.use(VueRouter,VueAxios,Axios);

// import file yang dibuat tadi
import App from './components/App.vue';
import Create from './components/Create.vue';
import ReadArtist from './components/ReadArtist.vue';
import Update from './components/Update.vue';
import Welcome from './components/Welcome.vue';
import ReadLagu from './components/ReadLagu.vue';
import Comment from './components/Comment.vue';
import Genre from './components/GenreList.vue';
import ForYou from './components/ForYou.vue';

// membuat router
const routes = [
    {
        name: 'Welcome',
        path: '/home',
        component: Welcome
    },
    {
        name: 'readArtist',
        path: '/readartist/:id',
        component: ReadArtist
    },
    {
        name: 'create',
        path: '/',
        component: Create
    },
    {
        name: 'update',
        path: '/detail/:id',
        component: Update
    },
    {
        name: 'readlagu',
        path: '/ReadLagu/:id',
        component: ReadLagu
    },
    {
        name: 'comment',
        path: '/comment/:idMember/:songId',
        component: Comment
    },
    {
        name: 'Genre',
        path: '/GenreList/:id',
        component: Genre
    },
    {
        name: 'foryou',
        path: '/ForYou/:id',
        component: ForYou
    }
]

const router = new VueRouter({ mode: 'history', routes: routes });
new Vue(Vue.util.extend({ router }, App)).$mount("#app");
