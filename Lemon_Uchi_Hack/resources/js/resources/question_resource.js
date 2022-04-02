import axios from "axios";
import Resource from "./resource";

class QuestionResource extends Resource {
    static async fetchQuestionsByPackId(id) {
        const { data } = await axios.get(`/api/questions-list/${id}`)
        return data
    }
    static async fetchStudentQuestionByPackId(id) {
        const { data } = await axios.get(`/api/student-question/${id}`)
        return data
    }
}

QuestionResource.url = '/api/question'

export default QuestionResource
