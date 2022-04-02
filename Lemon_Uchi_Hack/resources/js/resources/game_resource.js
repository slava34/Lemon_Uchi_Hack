import axios from "axios";
import Resource from "./resource";

class GameResource extends Resource {
    static async createBattle(id) {
        const { data } = await axios.get(`api/create-battle`)
        return data
    }
}

GameResource.url = '/api/battle'

export default GameResource
