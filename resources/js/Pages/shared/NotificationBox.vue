<template>
    <div  v-if="notification">
        <v-snackbar v-model="this.$page.props.flash.notification" location="top right" :color="notification.status" :timeout="5000">
            {{ notification.message }}
            <template v-slot:actions>
                <v-btn
                  color="gray"
                  variant="text"
                  @click="this.$page.props.flash.notification = null"
                >
                    <v-icon icon="mdi:mdi-close-circle-outline" ></v-icon>
                </v-btn>
            </template>
        </v-snackbar>
    </div>
</template>

<script>

export default {
    computed: {
        notification() {
            return this.$page.props.flash.notification;
        },
    }
}
</script>