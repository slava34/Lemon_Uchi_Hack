<template>
    <router-view></router-view>
</template>

<script>
import QuestionPack from "./components/manager/QuestionPack";
import QuestionsList from "./components/manager/QuestionsList";
export default {
    name: "App",
    components: {QuestionsList, QuestionPack}
}
</script>

<style scoped>
    @font-face {
        font-family: "Lato";
        src: url('/resources/css/fonts/Lato-Black.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    #App {
        font-family: "Lato", serif;
        font-style: normal;
        font-weight: normal;
    }
</style>
