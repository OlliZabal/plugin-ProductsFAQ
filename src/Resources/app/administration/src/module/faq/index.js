import './page/faq-create';
import './page/faq-detail';
import './page/faq-list';

import deDE from './snippet/de-DE.json';
import enGB from './snippet/en-GB.json';

const { Module } = Shopware;

Module.register('faq', {
    type: 'plugin',
    name: 'faq',
    title: 'faq.general.mainMenuItemGeneral',
    description: 'faq.general.descriptionTextModule',
    color: '#fe7745',
    icon: 'default-shopping-paper-bag-product',

    snippets: {
        'de-DE': deDE,
        'en-GB': enGB
    },

    routes: {
        list: {
            component: 'faq-list',
            path: 'list'
        },
        detail: {
            component: 'faq-detail',
            path: 'detail/:id',
            meta: {
                parentPath: 'faq.list'
            }
        },
        create: {
            component: 'faq-create',
            path: 'create',
            meta: {
                parentPath: 'faq.list'
            }
        }
    },


    navigation: [{
        label: 'faq.general.mainMenuItemGeneral',
        color: '#fe7745',
        path: 'faq.list',
        parent: 'sw-content',
        icon: 'default-shopping-paper-bag-product',
        position: 20
    }]
});
