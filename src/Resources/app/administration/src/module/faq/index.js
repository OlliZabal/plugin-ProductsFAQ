import './page/item-faq-create';
import './page/item-faq-detail';
import './page/item-faq-list';

import deDE from './snippet/de-DE.json';
import enGB from './snippet/en-GB.json';

const { Module } = Shopware;

Module.register('item-faq', {
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
            component: 'item-faq-list',
            path: 'list'
        },
        detail: {
            component: 'item-faq-detail',
            path: 'detail/:id',
            meta: {
                parentPath: 'item.faq.list'
            }
        },
        create: {
            component: 'item-faq-create',
            path: 'create',
            meta: {
                parentPath: 'item.faq.list'
            }
        }
    },


    navigation: [{
        label: 'faq.general.mainMenuItemGeneral',
        color: '#fe7745',
        path: 'item.faq.list',
        parent: 'sw-catalogue',
        icon: 'default-shopping-paper-bag-product',
        position: 30
    }]
});
