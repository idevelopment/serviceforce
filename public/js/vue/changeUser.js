Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
new Vue({
    el: '#changeUser',
    data: {
        user: {
            firstname : '',
            lastname  : '',
            email     : ''
        },

        newPassword: {
            password     : '',
            confirmation : ''
        },

        submitted: false
    },

    computed: {
        /**
         * Profile information validator
         * 
         * @returns {boolean}
         */
        informationErrors: function() {
            for (var key in this.user) {
                if ( ! this.user[key]) return true;
            }

            return false;
        },

        /**
         * Password form validation
         *
         * @returns {boolean}
         */
        passwordErrors: function() {
            for (var key in this.newPassword) {
                if ( ! this.newPassword[key]) return true;
            }

            return false;
        }
    }
});