<template>
    <div v-if="battle">
        <b-row>
            <b-col class="first-team-header text-style d-flex align-items-center"><b>{{battle.team.name}} &nbsp; {{battle.first_team_balls}}</b></b-col>
            <b-col class="second-team-header text-style d-flex align-items-center"><b>{{battle.second_team_balls}} &nbsp; {{battle.second_team.name}}</b></b-col>
        </b-row>
        <b-row class="d-flex text-style justify-content-center">Статус</b-row>
        <b-row class="d-flex text-style justify-content-center mb-3">Отвечает: &nbsp;
            <span v-if="battle.whos_round === battle.second_team.id">{{battle.second_team.name}}</span>
            <span v-if="battle.whos_round === battle.team.id">{{battle.team.name}}</span>
        </b-row>
        <game-field
            @fetchBoard="fetchData"
            :battle="battle"
            :battle-fields="battleFields">
        </game-field>
    </div>
</template>

<script>
import GameField from "./GameField";
import GameResource from "../../../resources/game_resource";
import GameFieldResource from "../../../resources/game_field_resource";
import KnightTeam1 from "./cards/knight-team-1";
import CardTeam1 from "./cards/card-team-1";
import KnightTeam2 from "./cards/knight-team-2";

export default {
    name: "Game",
    components: {KnightTeam2, CardTeam1, KnightTeam1, GameField },
    data () {
        return {
            battle: null,
            battleFields: null
        }
    },
    async mounted() {
        await this.fetchData()
    },
    methods: {
        async fetchData() {
            this.battle = await GameResource.get({
                id: this.getBattleId
            })
            this.battleFields = await GameFieldResource.fetchBattleFieldsById(this.getBattleId)
            this.battleFields.sort()
        },
    },
    computed: {
        getBattleId() {
            return this.$route.path.split('/')[2]
        }
    }

}
</script>

<style scoped>
    .first-team-header {
        background: #6568F3;
        color: #FFFFFF;
        height: 55px;
        font-weight: bold;
    }
    .text-style {
        font-size: 24px;
        line-height: 29px;
    }
    .second-team-header {
        background: #FF6C9A;
        height: 55px;
        color: #FFFFFF;
        font-weight: bold;
    }
</style>
