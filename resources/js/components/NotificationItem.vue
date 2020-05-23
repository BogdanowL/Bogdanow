<template>
    <div class="wrap">
        <a :href="threadUrl" class="dropdown-item">
       <strong>{{ unread.data.fromUser.name }}</strong>     добавил комментарий <strong>{{ unread.data.comment.text }}</strong>
        </a>
    </div>
</template>

<script>
    export default {
        props:['unread'],
        data(){
            return {
                threadUrl:""
            }
        },
        mounted(){
            //this.threadUrl="/"+ this.unread.data.fromUser.id
        }

    }
</script>
