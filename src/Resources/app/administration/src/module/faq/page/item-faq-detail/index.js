import template from './item-faq-detail.html.twig';

const { Component, Mixin } = Shopware;

Component.register('item-faq-detail', {
    template,

    inject: [
        'repositoryFactory'
    ],

    mixins: [
        Mixin.getByName('notification')
    ],

    metaInfo() {
        return {
            title: this.$createTitle()
        };
    },

    data() {
        return {
            faq: null,
            isLoading: false,
            processSuccess: false,
            repository: null
        };
    },

    created() {
        this.repository = this.repositoryFactory.create('faq');
        this.getFaq();
    },

    methods: {
        getFaq() {
            this.repository
                .get(this.$route.params.id, Shopware.Context.api)
                .then((entity) => {
                    this.faq = entity;
                });
        },

        onClickSave() {
            this.isLoading = true;

            this.repository
                .save(this.faq, Shopware.Context.api)
                .then(() => {
                    this.getFaq();
                    this.isLoading = false;
                    this.processSuccess = true;
                }).catch((exception) => {
                this.isLoading = false;
                this.createNotificationError({
                    title: this.$t('faq.detail.errorTitle'),
                    message: exception
                });
            });
        },

        saveFinish() {
            this.processSuccess = false;
        }
    }
});
