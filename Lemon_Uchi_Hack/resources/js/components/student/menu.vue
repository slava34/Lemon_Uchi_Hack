<template>
    <div>
        <student-fon></student-fon>
        <welcome class="welcome"></welcome>
        <b-modal
            hide-backdrop
            hide-header
            hide-footer
            centered
            id="command_modal">
            <div
                class="cardModal m-auto">
                <div class="d-flex justify-content-around align-items-center">
                    <h1 class="sizeHeadind mt-3">Выбор команды</h1>
                </div>
                <b-list-group class="mt-3 align-items-center">
                    <b-row>
                        <b-col>
                            <b-button
                                @click.prevent="initGame"
                                class="d-flex mt-2 justify-content-around align-items-center groupButton"
                                variant=""
                            >
                                Команда 1
                                <b-icon class="mr-0 p-0 ml-4" icon="box-arrow-right"></b-icon>
                            </b-button>
                            <b-button
                                @click.prevent="initGame"
                                class="d-flex mt-2 justify-content-around align-items-center groupButton"
                                variant=""
                            >
                                Команда 2
                                <b-icon class="mr-0 p-0 ml-4" icon="box-arrow-right"></b-icon>
                            </b-button>
                        </b-col>
                    </b-row>
                </b-list-group>
            </div>
        </b-modal>
    </div>
</template>

<script>
import GameResource from "../../resources/game_resource";
import GameFieldResource from "../../resources/game_field_resource";
import Welcome from "../Welcome";
import StudentFon from "./StudentFon";

export default {
    name: "menu",
    components: {
        StudentFon,
        Welcome
    },
    data () {
      return {
          battle: null
      }
    },
    methods: {
        async initGame() {
            await this.createGame()
            await this.createBattleField()
        },
        async createGame() {
            this.battle = await GameResource.save({
                team_id: 1,
                pack_id: 17,
                second_team_id: 3
            })
        },
        async createBattleField() {
            if (this.battle) {
                this.battle_fields = await GameFieldResource.save({
                    battle_id: this.battle.id,
                    team_1: this.battle.team_id,
                    team_2: this.battle.second_team_id
                })
                await this.$router.push(`/student/${this.battle.id}/game`)
            }

        }
    }
}
</script>

<style scoped>
    .sizeHeadind {
        font-family: Roboto;
        font-style: normal;
        font-weight: 500;
        font-size: 34px;
        line-height: 40px;
        color: #3A3A3A;
    }

    .colorSquare {
        background: #FD4A4A;
        color: white;
        border-color: white;
    }

    .groupButton {
        color: #3A3A3A;
        background: white;
        border-color: #3A3A3A;
        font-family: Lato;
        font-style: normal;
        font-weight: normal;
        font-size: 24px;
        line-height: 29px;
        color: #3A3A3A;
    }

    .cardModal {
        width: 17em;
    }
    .welcome {
        position: absolute;
        top: 100px;
        left: 40px
    }
</style>
