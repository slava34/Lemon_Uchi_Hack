<template>
    <div class="row align-items-center">
        <div class="col">
            <div class="page-title-box">
                <h4 class="page-title mt-3 d-flex justify-content-center">
                    <slot></slot>
                </h4>
                <div class="clearfix"></div>
            </div>
        </div>
        <template v-if="$slots.right">
            <b-col cols="12" md="auto" class="ml-auto">
                <slot name="center" />
            </b-col>
        </template>
    </div>
</template>

<script>
export default {
    data () {
        return {}
    }
}
</script>
