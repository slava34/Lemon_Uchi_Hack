<template>
    <div>
        <fon></fon>
        <b-button class="first-button" @click="createUser('manager')">Перейти</b-button>
        <b-button class="second-button" @click="createUser('student')">Перейти</b-button>
    </div>
</template>

<script>
import Fon from "./Fon";
export default {
    name: "createUser",
    components: {Fon},
    methods: {
        createUser(type) {
            const date = new Date();
            const uniqueCode = date
                .toString()
                .split(" ")
                .join("")
                .split(":")
                .join("")
                .split("+")
                .join("")
                .split("(")
                .join("")
                .split(")")
                .join("")
                .split(",")
                .join("");
            const User = {
                name: "user" + uniqueCode,
                email: "user" + uniqueCode + "@email.com",
                password: "qwerty" + uniqueCode,
            }
            if (type === 'manager') {
                this.$router.push('/manager')
            } else {
                this.$router.push('/student')
            }
        }
    }
}
</script>

<style scoped>
    .first-button {
        position: absolute;
        top: 730px;
        left: 50px;
        background: #FFFFFF;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25);
        border-radius: 3px;
        color: black;
    }
    .second-button {
        position: absolute;
        top: 950px;
        right: 100px;
        background: #FFFFFF;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25);
        border-radius: 3px;
        color: black;
    }
</style>
