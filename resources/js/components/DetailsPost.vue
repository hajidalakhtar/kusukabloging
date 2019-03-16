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
         props: ['idartikel','iduser'],
        data(){
            return{
                bookmark: false,
                like:false,
                id_artikel: Number(this.idartikel),
                id_author:Number(this.iduser),
                id_like : null,
            }
        },
        mounted() {
                axios
         .get('/ceklike/'+this.id_author+'/'+this.id_artikel)
        .then((response) =>{
            this.id_like = response.data.id
            if (response.data.id > 0) {
            this.like = true
                
            } else {
            this.like = false
            }
        });


        },


        methods: {
            Like:function(){
                if(this.like == true){
                   axios
                     .get('/deletelike/'+this.id_like)
                     .then(console.log('/deletelike/'+this.id_like));
          
                    this.like = false
                }else{

                 axios
                     .get('/like/artikel/'+this.id_artikel+'/'+this.id_author)
                     .then(console.log('/like/artikel/'+this.id_artikel+'/'+this.id_author));
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
