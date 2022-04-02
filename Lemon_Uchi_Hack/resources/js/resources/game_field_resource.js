import axios from "axios";
import Resource from "./resource";

class GameFieldResource extends Resource {
    static async fetchBattleFieldsById(id) {
        const { data } = await axios.get(`${this.url}/${id}/list`)
        return data
    }
}

GameFieldResource.url = '/api/battle-fields'

export default GameFieldResource
