<template>
    <b-row v-if="!editingAnswer">
        <b-col>
            <span
                class="answer-text"
                @click="openEditAnswerInput"
            >
                {{answer.name}}
            </span>
        </b-col>
        <b-col calss="col-1">
            <b-button
                class="delete-button icons"
                @click="deleteAnswer"
            >
                <b-icon icon="trash-fill"></b-icon>
            </b-button>
        </b-col>
    </b-row>
    <b-row v-else class="update-answer-input">
        <b-col>
            <b-form-input class="answer-text" v-model="answer.name"></b-form-input>
        </b-col>
        <b-col>
            <b-button
                class="button-primary icons"
                @click="editAnswer"
            >
                <b-icon icon="check2-square"></b-icon>
            </b-button>
            <b-button
                class="delete-button icons"
                @click="closeEditAnswerInput"
            >
                <b-icon icon="arrow-return-left"></b-icon>
            </b-button>
        </b-col>
    </b-row>
</template>

<script>
import AnswerResource from "../../resources/answer_resource";

export default {
    name: "Answer",
    props: {
        answer: {
            type: Object,
        },
    },
    emits: {
        answersUpdate: null,
    },
    data() {
        return {
            editingAnswer: false,
        }
    },
    methods: {
        openEditAnswerInput() {
            console.log("open")
            this.editingAnswer = true
        },
        closeEditAnswerInput() {
            console.log("close")
            this.editingAnswer = false
        },
        async editAnswer() {
            if (this.answer.name) {
                await AnswerResource.save(this.answer)
                this.$emit("answersUpdate")
            } else {
                console.log("currentAnswer is empty")
            }
            this.closeEditAnswerInput()
        },
        async deleteAnswer() {
            await AnswerResource.delete(this.answer)
            this.$emit("answersUpdate")
        }
    }
}
</script>

<style scoped>
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
    .update-answer-input {
        display: flex;
        align-items: center;
        justiy-content: center;
    }
    .icons {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.3em;
    }
    .delete-button {
        border: 0;
        border-radius: 5px;
        background: #FD4A4A !important;
    }
    .answer-text {
        font-weight: 300;
        font-size: 14px;
        line-height: 17px;
    }
</style>
