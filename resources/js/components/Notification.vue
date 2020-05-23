<template>
    <li class="nav-item dropdown" @click="markNotificationAsRead" >
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
           role="button" data-toggle="dropdown" aria-haspopup="true"
           aria-expanded="false">

            <i class="fa fa-bell"></i>


            <span class="badge badge-light">{{unreadNotifications.length}}</span>

        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" >


            <notification-item v-for="unread in unreadNotifications" :unread="unread" :key="unread.id"></notification-item>


        </div>
    </li>

</template>

<script>
    import NotificationItem from './NotificationItem.vue';
    export default {

        props:['unreads', 'userid'],
        data(){
            return{
                unreadNotifications: this.unreads
            }
        },
        methods: {
            markNotificationAsRead() {
                if (this.unreadNotifications.length) {
                    axios.get('/markAsRead');
                }
            }
        },
        mounted() {

            Echo.private('App.User.' + this.userid )
                .notification((notification) => {
                    console.log(notification);
                    let newUnreadNotifications = {data:{comment:notification.comment, fromUser:notification.fromUser}};
                    this.unreads.push(newUnreadNotifications);
                });
        }
    }
</script>
