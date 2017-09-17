import Index from './components/Index';
import Add from './components/Add';
import Edit from './components/Edit';

export default [
    {
        path: '/',
        component: Index
    },

    {
        path: '/add',
        component: Add
    },

    {
        path: '/edit/:id',
        component: Edit
    }
]