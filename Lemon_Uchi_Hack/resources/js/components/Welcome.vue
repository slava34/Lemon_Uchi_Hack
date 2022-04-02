<template>
    <div>
        <b-card class="card-shadow col-12 ml-auto mr-auto pl-0 mb-3 mt-5">
            <b-list-group>
                <h1 class="header">Добро пожаловать</h1>
                <div class="d-flex align-items-center flex-column">
<!--                    <b-row>-->
<!--                        <b-col>-->
<!--                            <b-row>-->
<!--                                <b-col class="p-0">-->
<!--                                    <button-->
<!--                                        type="button"-->
<!--                                        class="btn btn-primary btn-lg mb-5 mt-3 fontButton">-->
<!--                                        Присоединиться-->
<!--                                        <b-icon icon="link-45deg"></b-icon>-->
<!--                                    </button>-->
                                    <!--                  <b-button-->
                                    <!--                      type="button"-->
                                    <!--                      class="btn btn-primary btn-lg"-->
                                    <!--                      variant=""-->
                                    <!--                  >-->
                                    <!--&lt;!&ndash;                    <b-icon class="mr-1" icon=""></b-icon>&ndash;&gt;-->
                                    <!--                    Присоединиться-->
                                    <!--                  </b-button>-->
<!--                                </b-col>-->
<!--                            </b-row>-->
<!--                        </b-col>-->
<!--                    </b-row>-->
                    <b-row>
                        <b-col>
                            <b-row>
                                <b-col class="p-0">
                                    <button type="button" @click="openCommandModal" class="btn btn-primary colorSize mb-5 fontButton">
                                        Выбрать команду
                                        <b-icon icon="people"></b-icon>
                                    </button>
                                    <!--                  <b-button-->
                                    <!--                      class="delete-button"-->
                                    <!--                      variant="danger"-->
                                    <!--                  >-->
                                    <!--                    <b-icon class="mr-1" icon="trash"></b-icon>-->
                                    <!--                    Выбрать команду-->
                                    <!--                  </b-button>-->
                                </b-col>
                            </b-row>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col>
                            <b-row>
                                <b-col class="p-0">
                                    <button type="button" class="btn btn-primary btn-lg mb-5 fontButton">
                                        Пригласить
                                        <b-icon icon="person-plus"></b-icon>
                                    </button>
                                    <!--                  <b-button-->
                                    <!--                      class="delete-button"-->
                                    <!--                      variant="danger"-->
                                    <!--                  >-->
                                    <!--                    <b-icon class="mr-1" icon="trash"></b-icon>-->
                                    <!--                    Пригласить-->
                                    <!--                  </b-button>-->
                                </b-col>
                            </b-row>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col>
                            <b-row>
                                <b-col class="p-0">
                                    <button type="button" class="btn btn-danger btn-lg fontButton">
                                        Выйти
                                        <b-icon icon="box-arrow-right"></b-icon>
                                    </button>
                                    <!--                  <b-button-->
                                    <!--                      class="delete-button"-->
                                    <!--                      variant="danger"-->
                                    <!--                  >-->
                                    <!--                    <b-icon class="mr-1" icon="trash"></b-icon>-->
                                    <!--                    Выйти-->
                                    <!--                  </b-button>-->
                                </b-col>
                            </b-row>
                        </b-col>
                    </b-row>
                </div>
            </b-list-group>
        </b-card>
    </div>
</template>

<script>
export default {
    name: "two",
    methods: {
        openCommandModal(){
            this.$bvModal.show('command_modal')
        }
    }
}
</script>

<style scoped>
.card-shadow {
    background: #FFFFFF;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.25);
    border-radius: 17px;
}

.header {
    font-family: Roboto;
    text-align: center;
    font-style: normal;
    font-weight: 500;
    font-size: 36px;
    line-height: 42px;
    color: #3A3A3A;
}

.colorSize {
    background:#ED467A;
    border-color: #ED467A;
}

.fontButton {
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 30px;
    line-height: 35px;
    color: #FFFFFF;
}
</style>
