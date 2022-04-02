import axios from "axios";
import Resource from "./resource";

class QuestionPackResource extends Resource {
    static async fetchQuestionPacks() {
        const { data } = await axios.get(this.url)
        return data
    }
}

QuestionPackResource.url = '/api/question-pack'

export default QuestionPackResource
