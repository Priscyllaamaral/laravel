export default {
    props: {
        id: {
            type: String
        },
        name: {
            type: String
        },
        value: {
            default: null
        },
        label: {
            type: String,
            default: ''
        },
        css: {
            type: String
        },
        tabindex: {},
        readonly: {
            type: Boolean,
            default: false
        },
        disabled: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        focus() {
            if (!this.disabled) {
                this.$refs.input.focus();
            }
        },
        
        select() {
            if (this.$refs.input.tagName == 'INPUT') {
                this.$refs.input.select();
            }
        },

        __onFocus() {
            this.select();
        }
    },

}