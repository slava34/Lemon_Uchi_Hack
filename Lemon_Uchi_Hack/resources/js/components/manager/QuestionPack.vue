<template>
    <div class="base">
        <h1 class="text-center mb-4 mt-3">Предметы</h1>
        <b-card
            class="card-shadow col-11 ml-auto mr-auto pl-0 mb-3"
            v-for="questionPack in questionPacks"
            :key="questionPack.id"
        >
            <b-spinner label="Spinning" v-if="isLoading"></b-spinner>
<!--            <b-row>-->
<!--                <b-col class="col-md-10 d-flex align-items-center">-->
<!--                    <h3>Предметы</h3>-->
<!--                </b-col>-->
<!--                <b-col class="col-md-2">-->
<!--                    <b-button-->
<!--                        class="button-primary ml-auto"-->
<!--                        @click="openPackModal('create')"-->
<!--                    >-->
<!--                        <b-icon-plus-circle></b-icon-plus-circle>-->
<!--                        Создать-->
<!--                    </b-button>-->
<!--                </b-col>-->
<!--            </b-row>-->
            <b-list-group>
                <b-row>
                        <b-col class="size">
                            <router-link
                                class="routerLink"
                                :to="`/question_pack/${questionPack.id}/questions`">
                                <h4 class="object">{{questionPack.name}}</h4>
                            </router-link>
                            <p class="grade" v-if="questionPack.class">
                                {{questionPack.class.dv}}
                            </p>
                        </b-col>
                        <b-col class="col-md-4 mt-auto pb-3 d-flex justify-content-end">
                            <b-row class="d-flex flex-column">
                                <b-col class="p-0">
                                    <b-button
                                        class="d-flex align-items-center button-primary-edit ml-0 mb-2"
                                        variant="outline-primary"
                                        @click="openPackModal('update', questionPack)">
                                            <b-icon class="mr-0 p-0" icon="pencil-square"></b-icon>
                                            Изменить
                                    </b-button>
                                </b-col>
                                <b-col class="p-0">
                                    <b-button
                                        class="delete-button"
                                        variant="danger"
                                        @click="deleteQuestionPack(questionPack)"
                                    >
                                        <b-icon class="mr-1" icon="trash"></b-icon>
                                        Удалить
                                    </b-button>
                                </b-col>
                            </b-row>
                        </b-col>
                </b-row>
            </b-list-group>
        </b-card>
        <b-col class="staticButton">
            <b-button
                class="text-center button-primary"
                @click="openPackModal('create')"
            >
                <b-icon-plus-circle></b-icon-plus-circle>
                Создать
            </b-button>
        </b-col>
        <b-modal
            centered
            hide-backdrop
            content-class="shadow"
            hide-header
            hide-footer
            size="lg"
            id="new-question-pack-modal"
        >
            <page-title>{{modalTitle}}</page-title>
            <b-form-input
                class="col-md-10 mt-3 pack-input"
                placeholder="Предмет"
                v-model="newQuestionPack.name"></b-form-input>
            <div>
                <b-form-select
                    class="mt-3 col-3"
                    style="font-size: 12px; line-height: 16px"
                    :options="classes"
                    v-model="newQuestionPack.dict_class_id">
                </b-form-select>
            </div>
            <b-button
                class="button-primary mt-3 ml-auto"
                variant="outline-primary"
                @click="createQuestionPack"
            >
                <b-icon-plus-circle></b-icon-plus-circle>
                {{modalButton}}
            </b-button>
        </b-modal>
    </div>

</template>

<script>
import QuestionPackResource from "../../resources/question_pack_resource";
import PageTitle from "../../ui/page-title";
import DictsResource from "../../resources/dicts_resource";

export default {
    name: "QuestionPack",
    components: {PageTitle},
    data () {
        return {
            questionPacks: null,
            isLoading: false,
            newQuestionPack: {
                name: null,
                created_by: 3,
                dict_class_id: null
            },
            modalTitle: null,
            modalButton: null,
            classes: null,
        }
    },
    async mounted() {
        await this.fetchData()
        await this.getClasses()
    },
    methods: {
        async fetchData() {
            this.isLoading = true
            this.questionPacks = await QuestionPackResource.fetchQuestionPacks()
            this.isLoading = false
        },
        async getClasses() {
            const data = await DictsResource.fetchClasses()
            console.log(data);
            this.classes = data.map((item) => ({
                text: item.dv,
                value: item.id
            }))
            this.classes.push({
                text: 'Класс',
                value: null
            })
            console.log(this.classes)
        },
        openPackModal(type ,questionPack) {
            if (type === 'update') {
                this.newQuestionPack = questionPack
            } else {
                this.newQuestionPack = {
                    name: null,
                    created_by: 3,
                }
            }
            this.modalTitle = this.getModalTitle(type)
            this.modalButton = this.getModalButton(type)
            this.$bvModal.show('new-question-pack-modal')
        },
        async createQuestionPack() {
            await QuestionPackResource.save(this.newQuestionPack)
            this.newQuestionPack = {
                name: null,
                created_by: 3,
            }
            this.$bvModal.hide('new-question-pack-modal')
            await this.fetchData()
        },
        async deleteQuestionPack(questionPack) {
            await QuestionPackResource.delete(questionPack)
            console.log("Pack has been deleted")
            await this.fetchData()
        },
        getModalTitle(type) {
            return type === 'update' ? 'Изменение пакета' : 'Создание пакета';
        },
        getModalButton(type) {
            return type === 'update' ? 'Изменить' : 'Создать';
        }
    },
}
</script>

<style scoped>
    .card-shadow {
        background: #FFFFFF;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.25);
        border-radius: 17px;
    }
    .button-primary {
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
    .button-primary-edit {
        background-color:  #FFFFFF !important;
        border-color:  #FFFFFF !important;
        color: #8B8DFE !important;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
        border-radius: 6px;
    }
    .button-primary-edit:hover {
        background-color: #8B8DFE !important;
        border-color: #8B8DFE !important;
        color: #FFFFFF !important;
    }
    .delete-button {
        border-radius: 9px;
        background: #FD4A4A !important;
    }
    .pack-input {
        background: #FFFFFF;
        border: 1px solid #EEEEEE;
        box-sizing: border-box;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 7px;
    }
    .routerLink{
        text-decoration: none;
        color: black !important;
    }
    .object {
        /*font-family: "Lato";*/
        /*font-style: normal;*/
        /*font-weight: normal;*/
        font-size: 36px;
        line-height: 43px;
        color: #3A3A3A;
    }
    .grade {
        /*font-family: "Lato";*/
        /*font-style: normal;*/
        /*font-weight: normal;*/
        font-size: 18px;
        line-height: 22px;
        color: #585858;
    }
    .size {
        /*width: auto;*/
    }
    .staticButton {
        position: fixed;
        top: 35em;
        display: flex;
        justify-content: center;
    }
    .base {
        /*background: url("./resources/js/assets/background.png");*/
        background-color: white;
    }
</style>
