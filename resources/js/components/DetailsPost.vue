<template>
        <ul>    
 	                   <li>
                            <button  v-if="bookmark" style="  background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; outline:none;"  @click="Bookmark()">  <i class="fas fa-lg fa-bookmark"></i> </button>
                            <button  v-else style="  background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden;  outline:none;" target="" href=""  @click="Bookmark()"><i class="far fa-lg fa-bookmark"></i></button>
                          
                         </li>
                      	<li>
                            <button v-if="like" style="  background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflowhidden; outline:none;" href="" @click="Like()">  <i class="fas fa-lg  fa-heart"></i></button>
                            <button  v-else  style="  background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden;   outline:none;" target="" href="" @click="Like()"><i class="far  fa-lg  fa-heart"></i></button>
                      </li>
        </ul>
</template>

<script>
    export default {
        data(){
            return{
                bookmark: false,
                like:false,
            }
        },
        mounted() {

        },
        methods: {
            Like:function(){
                if(this.like == true){
                    this.like = false
                }else{
                    this.like = true
                }
            },
            Bookmark: function(){
                   if(this.bookmark == true){
                    this.bookmark = false
                }else{
                    this.bookmark = true
                }
            }
            
        },
    }
</script>
