<template>

<div class="container-fluid">
    <div class="flex-row row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 card">
            <div class="card-block">
                <div class="thumbnail">

                    <div class="caption">
                        <h3>
                            <div class="pull-left">
                                <img v-bind:src="'/uploads/avatars/' + user.avatar" style="width: 50px; height: 50px; top: 5px; left: 10px; border-radius: 50%;">
                            </div>

                            <h1>{{ user.name }}'s Profile</h1>
                            

                        </h3>       


                        <div v-if="user.followed">
                            <div v-on:click="follow()" class="heart pull-left glyphicon glyphicon-heart"/>Like
                        </div>
                        <div v-else>
                            <div v-on:click="follow()" class="heart pull-left glyphicon glyphicon-heart-empty"/>Like
                        </div>

                        <div class="pull-right">
                            Followers: {{ user.score }}
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</template>

<script>
import axios from 'axios';

export default {
  data: () => ({
    errors: [],
    followed: false,
  }),

    props: ['user', 'auth'],

    methods: {
        follow(){
            axios.post('/api/users/' + this.user.id + '/toggleFollow', {user_id: this.auth.id}).then(response => {
                this.user = response.data.user;
            })
            .then(response => {})
            .catch(e => {
                this.errors.push(e)
        });
        }
  }
}
</script>



<style type="text/css">

.heart:hover {
    border: none;
    background-color: none;
    color: #00adee;
    margin: 0;
}

.row{
    padding-top: 10px;
}

.flex-row {
    display: flex;
    flex-wrap: wrap;
}

.max-lines {
  display: block; /* or inline-block */
  text-overflow: ellipsis;
  word-wrap: break-word;
  overflow: hidden;
  max-height: 14.4em;
  line-height: 7.2em;
}

/* cards */

.card .thumbnail{
    padding: 0;
    border: none;
    text-align: center;
    border-radius: 0;
    -webkit-box-shadow: 0px 0.5px 1px 0px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 0.5px 1px 0px rgba(0,0,0,0.75);
    box-shadow: 0px 0.5px 1px 0px rgba(0,0,0,0.75);
}

.card .thumbnail .caption{
    margin: -20px 20px 20px 20px;
    padding: 19px 29px 19px 29px;
    position: relative;
    background-color: white;
}

.card .thumbnail .caption h3 small{
    font-style: italic;
    text-transform: none;
    letter-spacing: 0;
    font-weight: 400;
    font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
    display: block;
    padding: 5px;
}


.card .thumbnail .caption hr{
    border-top: 1px solid #333;
    margin: 20px 40px;
}

.card .thumbnail .caption p{
    font-size: 12px;
    line-height: 1.6;
}



</style>