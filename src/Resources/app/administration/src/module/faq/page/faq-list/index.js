import template from './faq-list.html.twig';

const { Component } = Shopware;
const { Criteria } = Shopware.Data;

Component.register('faq-list', {
    template,

    inject: [
        'repositoryFactory'
    ],

    data() {
        return {
            repository: null,
            faqs: null
        };
    },

    metaInfo() {
        return {
            title: this.$createTitle()
        };
    },

    computed: {
        columns() {
            return [{
                property: 'question',
                dataIndex: 'question',
                label: this.$t('faq.list.columnQuestion'),
                routerLink: 'faq.detail',
                inlineEdit: 'string',
                allowResize: true,
                primary: true
            }, {
                property: 'answer',
                dataIndex: 'answer',
                label: this.$t('faq.list.columnAnswer'),
                inlineEdit: 'string',
                allowResize: true
            }];
        }
    },

    created() {
        this.repository = this.repositoryFactory.create('faq');

        this.repository
            .search(new Criteria(), Shopware.Context.api)
            .then((result) => {
                this.faqs = result;
            });
    }
});
