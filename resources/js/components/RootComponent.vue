<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <create-theme-component
                                @newTheme="addTheme"
                            ></create-theme-component>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <blog-component v-for="theme of themes"
                       :key="themes.id" :theme="theme"
                        @deleteBlog="removeTheme"


        ></blog-component>
    </div>
</template>

<script>
export default {
    props: {
        themes: {}
    },
    data: {
      themesData: {}
    },
    methods: {
        addTheme(theme) {
            // console.log(`I am here ${theme.id} ${theme.name} ${theme.body}`);
            this.themes.unshift(theme);
        },
        removeTheme(id) {
            console.log(id)
            this.themes = this.themes.filter(t => t.id != id)
        }
    }
}

</script>
<style scoped>

</style>
