import axios from "axios";
import Resource from "./resource";

class AnswerResource extends Resource {
    static async fetchAnswersByQuestionId(id) {
        const { data } = await axios.get(`/api/answers-list/${id}`)
        return data
    }
}

AnswerResource.url = '/api/answers'

export default AnswerResource
