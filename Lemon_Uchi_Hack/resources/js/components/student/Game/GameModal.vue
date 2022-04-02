<template>
    <b-modal
        hide-backdrop
        id="student-question-modal"
    >
        <div v-if="question">
                <span>
                    {{question[0].name}}
                </span>
            <b-list-group-item
                :class="{correct: answer.is_correct === true
                    && answersShow, wrong: answer.is_correct === false && answersShow}"
                @click="postAnswer"
                v-for="answer in question[0].answers">
                <span>{{ answer.name }}</span>
            </b-list-group-item>
        </div>
    </b-modal>
</template>

<script>
export default {
    name: "GameModal",
    props: {
        question: {
            type: Object
        },
    }
}
</script>

<style scoped>

</style>
