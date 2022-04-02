<template>
    <b-container
        v-if="questionPack"
        style="margin: 0; padding: 5%;"
    >
        <h1 class="page-title">Редактирование раздела</h1>
        <b-card
            class="card-shadow col-md-10 ml-auto mr-auto"
            style="margin: 0 5%"
        >
            <b-spinner label="Spinning" v-if="isLoading"></b-spinner>
            <b-row>
                <b-col>
                    <h3 class="section-title">
                        {{questionPack.name}}
                        <span v-if="questionPack.class">{{questionPack.class.dv}}</span>
                    </h3>
                </b-col>
            </b-row>
            <b-row>
                <b-col sm="auto" class="d-flex align-items-center">
                    <b-button
                        class="button-primary"
                        @click="openQuestionModal('create')"
                    >
                        <b-icon-plus-circle></b-icon-plus-circle>
                        Добавить вопрос
                    </b-button>
                </b-col>
            </b-row>
            <b-list-group>
                <div class="questions-accordion-item questions" v-for="(question,index) in questions">
                    <b-list-group-item
                        v-b-toggle="'accordion-questions-' + index"
                    >
                        <b-row>
                            <b-col>
                                {{question.name}}
                            </b-col>
                            <b-col class="col-3">
                                <b-button
                                    class="delete-button"
                                    @click.stop="deleteQuestion(question)"
                                >
                                    <b-icon icon="trash-fill"></b-icon>
                                </b-button>
                            </b-col>
                        </b-row>
                    </b-list-group-item>
                    <b-collapse
                        :id="'accordion-questions-'+index"
                        :accordion="'questions-accordion'+index"
                        role="tabpanel"
                    >
                        <answers-list
                            @answersUpdate="fetchData"
                            :question="question"
                        ></answers-list>
                    </b-collapse>
                </div>
            </b-list-group>
        </b-card>
        <b-modal
            hide-footer
            id="question"
            title="Введите вопрос"
        >
            <b-form-input v-model="newQuestionList.name"></b-form-input>
            <b-row class="question-options-text">
                <b-col>
                    <b-row class="question-options">Время на ответ (сек)</b-row>
                    <b-row class="question-options">
                        <b-form-input v-model="newQuestionList.time"></b-form-input>
                    </b-row>
                </b-col>
                <b-col>
                    <b-row class="question-options">Вес вопроса</b-row>
                    <b-row class="question-options">
                        <b-form-radio-group
                            v-model="newQuestionList.question_level_id"
                        >
                            <b-form-radio
                                value="1"
                            >10</b-form-radio>
                            <b-form-radio
                                value="2"
                            >20</b-form-radio>
                            <b-form-radio
                                value="3"
                            >30</b-form-radio>
                        </b-form-radio-group>
                    </b-row>
                </b-col>
            </b-row>
            <b-button
                class="mt-3" variant="outline-primary"
                @click="createQuestion"
            >
                Создать
            </b-button>
        </b-modal>
    </b-container>
</template>

<script>
import QuestionResource from "../../resources/question_resource";
import DictsResource from "../../resources/dicts_resource";
import PageTitle from "../../ui/page-title";
import QuestionPackResource from "../../resources/question_pack_resource";
import AnswersList from "./AnswersList";

export default {
    name: "QuestionsList",
    components: {
        AnswersList,
        PageTitle,
    },
    data () {
        return {
            isLoading: false,
            questions: null,
            newQuestionList: {
                name: null,
                question_pack_id: null,
                question_level_id: 1,
                question_type_id: 1,
                time: 10
            },
            questionPack: null,
        }
    },
    async mounted() {
        await this.fetchData()
        await this.fetchDicts()
    },
    methods: {
        openAnswersList(index) {
            console.log('accordion-questions-' + index)
            this.$root.$emit('bv::toggle::collapse', 'accordion-questions-' + index)
        },
        async fetchData() {
            this.isLoading = true;
            this.questions = await QuestionResource.fetchQuestionsByPackId(this.getPackId)
            this.questionPack = await QuestionPackResource.get({id: this.getPackId})
            this.isLoading = false;
        },
        async fetchDicts() {
            this.levels = await DictsResource.fetchLevels();
            this.types = await DictsResource.fetchTypes()
        },
        openQuestionModal(type ,question) {
            if (type === 'update') {
                this.newQuestionList = question
            } else {
                this.newQuestionList = {
                    name: null,
                    question_pack_id: null,
                    question_level_id: 1,
                    question_type_id: 1
                }
            }
            this.$bvModal.show('question')
        },
        async createQuestion() {
            if (this.level1) {
                this.newQuestionList.question_level_id = 1;
            } else if (this.level2) {
                this.newQuestionList.question_level_id = 2;
            } else if (this.level3) {
                this.newQuestionList.question_level_id = 3;
            }
            this.newQuestionList.question_pack_id = this.getPackId
            await QuestionResource.save(this.newQuestionList)
            this.newQuestionList = {
                name: null,
                question_pack_id: null,
                question_level_id: 1,
                question_type_id: 1,
                time: 10
            }
            this.$bvModal.hide('question')
            await this.fetchData()
        },
        async deleteQuestion(question) {
            await QuestionResource.delete(question)
            await this.fetchData()
        },
    },

    computed: {
        getPackId() {
            return this.$route.path.split('/')[2]
        }
    }
}
</script>

<style scoped>
    .page-title {
        font-weight: 600;
        font-size: 30px;
        line-height: 36px;
        text-align: center;
        margin: 5% 0;
    }
    .card-shadow {
        background: #FFFFFF;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.25);
        border-radius: 17px;
    }
    .section-title {
        font-size: 36px;
        line-height: 43px;
        padding: 0 0 2% 0;
        margin: 5% 0;
        border-bottom: medium solid #C4C4C4;
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
    .delete-button {
        display: flex;
        align-items: center;
        justify-content: center;
        border: 0;
        border-radius: 9px;
        background: #FD4A4A !important;
    }
    .questions {
        margin: 5% 0;
    }
    .questions-accordion-item {
        border: 1px solid #CECECE;
        box-sizing: border-box;
        border-radius: 3px;
    }
    .question-options {
        margin: 3% 0;
    }
    .question-options-text {
        font-weight: normal;
        font-size: 14px;
        line-height: 17px;
    }
</style>
