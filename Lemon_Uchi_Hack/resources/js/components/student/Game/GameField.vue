<template>
    <div>
        <b-row>
            <b-col><knight-team1></knight-team1></b-col>
            <b-col><castle-team1></castle-team1></b-col>
            <b-col><knight-team2></knight-team2></b-col>
        </b-row>
        <span @click="openQuestionModal(battleFields[0].id)">
            <card-team1 class="first-container" v-if="battleFields[0].whos_field_id === battle.team_id"></card-team1>
            <card-team2 class="first-container" v-if="battleFields[0].whos_field_id === battle.second_team_id"></card-team2>
            <card-nothing class="first-container" v-if="battleFields[0].whos_field_id === null"></card-nothing>
        </span>
        <span @click="openQuestionModal(battleFields[1].id)">
            <card-team1 class="second-container" v-if="battleFields[1].whos_field_id === battle.team_id"></card-team1>
            <card-team2 class="second-container" v-if="battleFields[1].whos_field_id === battle.second_team_id"></card-team2>
            <card-nothing class="second-container" v-if="battleFields[1].whos_field_id === null"></card-nothing>
        </span>
        <span @click="openQuestionModal(battleFields[2].id)">
            <card-team1 class="third-container" v-if="battleFields[2].whos_field_id === battle.team_id"></card-team1>
            <card-team2 class="third-container" v-if="battleFields[2].whos_field_id === battle.second_team_id"></card-team2>
            <card-nothing class="third-container" v-if="battleFields[2].whos_field_id === null"></card-nothing>
        </span>
        <span @click="openQuestionModal(battleFields[3].id)">
            <card-team1 class="forth-container" v-if="battleFields[3].whos_field_id === battle.team_id"></card-team1>
            <card-team2 class="forth-container" v-if="battleFields[3].whos_field_id === battle.second_team_id"></card-team2>
            <card-nothing class="forth-container" v-if="battleFields[3].whos_field_id === null"></card-nothing>
        </span>
        <span @click="openQuestionModal(battleFields[4].id)">
            <card-team1 class="fifth-container" v-if="battleFields[4].whos_field_id === battle.team_id"></card-team1>
            <card-team2 class="fifth-container" v-if="battleFields[4].whos_field_id === battle.second_team_id"></card-team2>
            <card-nothing class="fifth-container" v-if="battleFields[4].whos_field_id === null"></card-nothing>
        </span>
        <span @click="openQuestionModal(battleFields[5].id)">
            <card-team1 class="six-container" v-if="battleFields[5].whos_field_id === battle.team_id"></card-team1>
            <card-team2 class="six-container" v-if="battleFields[5].whos_field_id === battle.second_team_id"></card-team2>
            <card-nothing class="six-container" v-if="battleFields[5].whos_field_id === null"></card-nothing>
        </span>
        <span @click="openQuestionModal(battleFields[6].id)">
            <card-team1 class="seven-container" v-if="battleFields[6].whos_field_id === battle.team_id"></card-team1>
            <card-team2 class="seven-container" v-if="battleFields[6].whos_field_id === battle.second_team_id"></card-team2>
            <card-nothing class="seven-container" v-if="battleFields[6].whos_field_id === null"></card-nothing>
        </span>
        <span @click="openQuestionModal(battleFields[7].id)">
            <card-team1 class="eight-container"  v-if="battleFields[7].whos_field_id === battle.team_id"></card-team1>
            <card-team2 class="eight-container"  v-if="battleFields[7].whos_field_id === battle.second_team_id"></card-team2>
            <card-nothing class="eight-container"  v-if="battleFields[7].whos_field_id === null"></card-nothing>
        </span>
        <span @click="openQuestionModal(battleFields[8].id)">
            <card-team1 class="nine-container" v-if="battleFields[8].whos_field_id === battle.team_id"></card-team1>
            <card-team2 class="nine-container" v-if="battleFields[8].whos_field_id === battle.second_team_id"></card-team2>
            <card-nothing class="nine-container" v-if="battleFields[8].whos_field_id === null"></card-nothing>
        </span>
        <span @click="openQuestionModal(battleFields[9].id)">
            <card-team1 class="ten-container" v-if="battleFields[9].whos_field_id === battle.team_id"></card-team1>
            <card-team2 class="ten-container" v-if="battleFields[9].whos_field_id === battle.second_team_id"></card-team2>
            <card-nothing class="ten-container" v-if="battleFields[9].whos_field_id === null"></card-nothing>
        </span>
        <span @click="openQuestionModal(battleFields[10].id)">
            <card-team1 class="eleven-container" v-if="battleFields[10].whos_field_id === battle.team_id"></card-team1>
            <card-team2 class="eleven-container" v-if="battleFields[10].whos_field_id === battle.second_team_id"></card-team2>
            <card-nothing class="eleven-container" v-if="battleFields[10].whos_field_id === null"></card-nothing>
        </span>
        <span @click="openQuestionModal(battleFields[11].id)">
            <card-team1 class="twelve-container" v-if="battleFields[11].whos_field_id === battle.team_id"></card-team1>
            <card-team2 class="twelve-container" v-if="battleFields[11].whos_field_id === battle.second_team_id"></card-team2>
            <card-nothing class="twelve-container" v-if="battleFields[11].whos_field_id === null"></card-nothing>
        </span>
        <span @click="openQuestionModal(battleFields[12].id)">
            <card-team1 class="thirteen-container" v-if="battleFields[12].whos_field_id === battle.team_id"></card-team1>
            <card-team2 class="thirteen-container" v-if="battleFields[12].whos_field_id === battle.second_team_id"></card-team2>
            <card-nothing class="thirteen-container" v-if="battleFields[12].whos_field_id === null"></card-nothing>
        </span>
        <knight-team1 class="kn-1"></knight-team1>
        <castle-team2 class="ct-2"></castle-team2>
        <knight-team2 class="kn-2"></knight-team2>
        <b-modal
            hide-backdrop
            hide-header
            hide-footer
            centered
            id="student-question-modal"
        >
            <div v-if="question" class="modalAnswer m-auto">
                <div class="headingCenter m-auto d-flex flex-column">
                    <h1 class="headingAnswerTop mt-3 pb-2">Вопрос</h1>
                    <h1 class="headingAnswerBotton mt-2"></h1>
                </div>
                <h1 class="d-flex justify-content-center quest mt-3">{{question[0].name}}</h1>
                <b-list-group v-for="answer in question[0].answers" class="d-flex align-items-center">
                        <b-row>
                            <b-col>
                                <b-list-group-item
                                    :class="{'d-flex justify-content-around align-items-center correct cellButton mt-2': answer.is_correct === true && answersShow, 'd-flex justify-content-around align-items-center wrong cellButton mt-2': answer.is_correct === false && answersShow,'d-flex justify-content-around align-items-center cellButton mt-2' :!answersShow}" @click="showAnswer(answer)"
                                >
                                    <span>{{ answer.name }}</span></b-list-group-item>
                            </b-col>
                        </b-row>
                    </b-list-group>
            </div>
        </b-modal>
    </div>
</template>

<script>

import QuestionResource from "../../../resources/question_resource";
import GameFieldResource from "../../../resources/game_field_resource";
import GameResource from "../../../resources/game_resource";
import CardTeam1 from "./cards/card-team-1";
import CardTeam2 from "./cards/card-team-2";
import CardNothing from "./cards/card-nothing";
import KnightTeam1 from "./cards/knight-team-1";
import KnightTeam2 from "./cards/knight-team-2";
import CastleTeam1 from "./cards/castle-team-1";
import CastleTeam2 from "./cards/castle-team-2";

export default {
    name: "GameField",
    components: {CardNothing, CardTeam1, CardTeam2, KnightTeam1, KnightTeam2, CastleTeam1, CastleTeam2},
    props: {
        battleFields: {
            type: Array
        },
        battle: {
            type: Object
        },
    },
    data() {
      return {
          currentField: null,
          fieldsData: null,
          question: null,
          answersShow: false,
          correct: true,
          wrong: null,
          image: 'resources/js/assets/1.svg'
      }
    },
    methods: {
        async openQuestionModal(id) {
            await this.getQuestion()
            if (this.question)
            {
                this.currentField = id
                this.$bvModal.show('student-question-modal')
            }
        },
        async getQuestion() {
            this.question = await QuestionResource.fetchStudentQuestionByPackId(this.battle.pack_id)
        },
        async showAnswer(answer) {
            this.answersShow = true
            setTimeout(() => {this.postAnswer(answer)}, 1000)
        },
        async postAnswer(answer) {
            let balls = 0;
            if (answer.is_correct === true)
            {
                console.log(this.question[0])
                if (this.question[0].question_level_id === 1) {
                    console.log(balls)
                    balls = 10
                } else if (this.question[0].question_level_id === 2) {
                    console.log(balls)
                    balls = 20
                } else if (this.question[0].question_level_id === 3) {
                    console.log(balls)
                    balls = 30
                }

                await this.fieldHost()
                if(this.battle.whos_round === this.battle.team_id) {
                    this.battle.first_team_balls = this.battle.first_team_balls + balls
                } else if(this.battle.whos_round === this.battle.second_team_id) {
                    this.battle.second_team_balls = this.battle.second_team_balls + balls
                }
            }
            if(this.battle.whos_round === this.battle.team_id) {
                this.battle.whos_round = this.battle.second_team_id
            } else if(this.battle.whos_round === this.battle.second_team_id) {
                this.battle.whos_round = this.battle.team_id
            }
            await this.battleSave()
            this.$emit("fetchBoard")
            this.answersShow = false
            this.$bvModal.hide('student-question-modal')
        },
        async fieldHost() {
            await GameFieldResource.save({
                id: this.currentField,
                whos_field_id: this.battle.whos_round,
            })
        },
        async battleSave(balls) {
            await GameResource.save({
                id: this.battle.id,
                whos_round: this.battle.whos_round,
                second_team_balls: this.battle.second_team_balls,
                first_team_balls: this.battle.first_team_balls
            })
        }
    }
}
</script>

<style scoped>
    .correct {
        background: #58DD36 !important;
        border-color: #58DD36 !important;
    }
    .wrong {
        background: #DE1A1A !important;
        border-color: #DE1A1A !important;
    }

    .first-container {
        position: absolute;
        top: 300px;
        left: 150px;
    }
    .second-container {
        position: absolute;
        top: 375px;
        left: 10px
    }
    .third-container {
        position: absolute;
        top: 420px;
        left: 150px;
    }
    .forth-container {
        position: absolute;
        top: 375px;
        right: 10px;
    }
    .fifth-container {
        position: absolute;
        top: 500px;
        left: 20px
    }
    .six-container {
        position: absolute;
        top: 540px;
        left: 150px
    }
    .seven-container {
        position: absolute;
        top: 500px;
        right: 20px;
    }
    .eight-container {
        position: absolute;
        top: 600px;
        left: 20px
    }
    .nine-container {
        position: absolute;
        top: 660px;
        left: 150px
    }
    .ten-container {
        position: absolute;
        top: 600px;
        right: 20px;
    }
    .eleven-container {
        position: absolute;
        top: 725px;
        left: 10px
    }
    .twelve-container {
        position: absolute;
        top: 725px;
        right: 10px;
    }
    .thirteen-container {
        position: absolute;
        top: 780px;
        left: 150px
    }
    .kn-2 {
        position: absolute;
        top: 880px;
        left: 15px
    }
    .kn-1 {
        position: absolute;
        top: 880px;
        right: 15px
    }
    .ct-2 {
        position: absolute;
        top: 880px;
        left: 125px
    }

    .modalAnswer {
        width: 17em;
    }
    .headingAnswerTop {
        font-family: Lato,serif;
        font-style: normal;
        font-weight: 500;
        font-size: 36px;
        line-height: 43px;
        text-align: center;
        color: #FFFFFF;
        border-bottom: 1px solid white;
    }
    .headingAnswerBotton {
        font-family: Lato,serif;
        font-style: normal;
        font-weight: 300;
        font-size: 24px;
        line-height: 29px;
        text-align: center;
        color: #FFFFFF;
    }
    .headingCenter {
        width: 160px;
        height: 127px;
        left: 92px;
        background: #FF6C9A;
        border-radius: 14px;
    }
    .quest {
        font-family: Lato,serif;
        font-style: normal;
        font-weight: normal;
        font-size: 24px;
        line-height: 29px;
        color: #3A3A3A;
    }
    .cellButton {
        width: 140px;
        height: 70px;
        /*left: 22px;*/
        /*top: 154px;*/
        background: white;
        color: black;
        font-family: Lato,serif;
        font-style: normal;
        font-weight: 500;
        font-size: 18px;
        line-height: 157%;
        border: 4px solid #FF6C9A;
        box-sizing: border-box;
        border-radius: 5px;
    }
</style>
