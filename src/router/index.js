import {createRouter, createWebHistory} from '@ionic/vue-router';

const routes = [
    {
        path: '/',
        redirect: '/connexion'
    },

    {
        path: '/connexion',
        name: 'connexion',
        component: () => import('@/views/Tab1Page.vue')
    },
    {
        name: 'agence',
        path: '/agence',
        component: () => import('@/views/Tab2Page.vue')
    },
    {
        name: 'agenceVehicule',
        path: '/agence/:agenceId/vehicule',
        component: () => import('@/views/Tab5Page.vue')
    },
    {
        name: 'commande',
        path: '/commande/:commandeId',
        component: () => import('@/views/Tab3Page.vue')
    },
    {
        name: 'historiqueCommande',
        path: '/historique/commande',
        component: () => import('@/views/Tab4Page.vue')
    },

]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

router.beforeEach((to, from, next) => {
        if (localStorage.getItem('token') == 'null' && to.name != 'connexion' && to.name != 'register') {
            next('/connexion')
        } else next()
    }
)

export default router
