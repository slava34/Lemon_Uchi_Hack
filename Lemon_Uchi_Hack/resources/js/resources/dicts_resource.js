import axios from "axios";
import Resource from "./resource";

class DictsResource extends Resource {
    static async fetchLevels() {
        const { data } = await axios.get(`${this.url}/levels`)
        return data
    }
    static async fetchTypes() {
        const { data } = await axios.get(`${this.url}/types`)
        return data
    }
    static async fetchClasses() {
        const { data } = await axios.get(`${this.url}/classes`)
        return data
    }
}

DictsResource.url = '/api/dict'

export default DictsResource
