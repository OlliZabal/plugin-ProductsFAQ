const { Component } = Shopware;

Component.extend('item-faq-create', 'item-faq-detail', {
    methods: {
        getFaq(){
            this.faq = this.repository.create(Shopware.Context.api);
        },

        onClickSave() {
            this.isLoading = true;

            this.repository.save(this.faq, Shopware.Context.api).then(()=> {
                this.isLoading = false;
                this.$router.push({ name: 'item.faq.detail', params: { id: this.faq.id } });
            }).catch((exception) => {
                this.isLoading = false;

                this.createNotificationError({
                    title: this.$tc('faq.detail.errorTitle'),
                    message: exception
                });
            });
        }
    }
});
