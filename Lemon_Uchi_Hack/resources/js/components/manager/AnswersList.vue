<template>
    <div>
<!--        <b-spinner label="Spinning" v-if="isLoading"></b-spinner>-->
        <b-list-group>
            <b-list-group-item class="answers">
                <b-button
                    v-if="!addingAnswer"
                    class="button-primary ml-auto"
                    @click="openAddAnswerInput"
                >
                    <b-icon-plus-circle></b-icon-plus-circle>
                    Добавить ответ
                </b-button>
                <b-row v-else>
                    <b-col>
                        <b-form-input
                            v-model="newAnswer.name"
                        ></b-form-input>
                    </b-col>
                    <b-col v-if="!hasCorrectAnswer">
                        <b-form-group label="Is True?">
                            <b-form-radio-group
                                v-model="newAnswer.is_correct"
                            >
                                <b-form-radio value="true">Yes</b-form-radio>
                                <b-form-radio value="false">No</b-form-radio>
                            </b-form-radio-group>
                        </b-form-group>
                    </b-col>
                    <b-col>
                        <b-button
                            class="button-primary"
                            @click="addAnswer"
                        >
                            Save
                        </b-button>
                    </b-col>
                </b-row>
            </b-list-group-item>
            <b-list-group-item class="answers">
                Ответы:
            </b-list-group-item>
            <b-list-group-item class="answers" v-for="(answer, index) in question.answers">
                <b-row class="align-items-center justify-content-center">
                    <b-col class="col-1 index">
                        {{ index + 1 }}.
                    </b-col>
                    <b-col>
                        <answer
                            :answer="answer"
                            @answersUpdate="$emit('answersUpdate')"
                        ></answer>
                    </b-col>
                </b-row>
            </b-list-group-item>
            <b-list-group-item class="answers">
                <b-row class="index">
                    <b-col>
                        Время на ответ (сек): {{question.time}}
                    </b-col>
                    <b-col>
                        Вес вопроса: {{question.question_level_id * 10}}
                    </b-col>
                </b-row>
            </b-list-group-item>
        </b-list-group>
    </div>
</template>

<script>
import Answer from "./Answer";
import AnswerResource from "../../resources/answer_resource";

export default {
    name: "AnswersList",
    components: {
        Answer
    },
    props: {
        question: {
            type: Object
        }
    },
    emits: {
      answersUpdate: null,
    },
    data() {
        return {
            isLoading: false,
            answers: null,
            addingAnswer: false,
            newAnswer: {
                name: null,
                question_id: this.question.id,
                is_correct: false
            },
            hasCorrectAnswer: false
        }
    },
    methods: {
        openAddAnswerInput() {
            this.checkingCorrectAnswer();
            this.addingAnswer = true;
        },
        async addAnswer() {
            if (this.newAnswer.name) {
                await AnswerResource.save(this.newAnswer)
                this.$emit("answersUpdate")
            } else {
                console.log("newAnswer is empty")
            }
            this.addingAnswer = false
            this.newAnswer.name = null
        },
        checkingCorrectAnswer() {
            for (let answer of this.question.answers) {
                if (answer.is_correct) {
                    this.hasCorrectAnswer = true;
                }
            }
        }
    }
}
</script>

<style scoped>
    .answers {
        border: 0 !important;
    }
    .button-primary {
        margin: 5% 0;
        color: #FFFFFF !important;
        background-color: #8B8DFE !important;
        border-color: #8B8DFE !important;
        border-radius: 6px;
    }
    .button-primary:hover {
        background-color:  #FFFFFF !important;
        border-color:  #FFFFFF !important;
        color: #8B8DFE !important;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
    }
    .index {
        padding: 0 1%;
        font-weight: 300;
        font-size: 14px;
        line-height: 17px;
    }
</style>
