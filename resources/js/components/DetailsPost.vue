<template>
        <ul>    
 	                   <li>
                            <button  v-if="bookmark" style="  background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; outline:none;"  @click="Bookmark()">  <i class="fas fa-2x mt-1 fa-bookmark"></i> </button>
                            <button  v-else style="  background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden;  outline:none;" target="" href=""  @click="Bookmark()"><i class="far fa-2x mt-1 fa-bookmark"></i></button>
                          
                         </li>
                      	<li>
                            <button v-if="like" style="  background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflowhidden; outline:none;" href="" @click="Like()">  <i class="fas fa-2x mt-1  fa-heart"></i></button>
                            <button  v-else  style="  background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden;   outline:none;" target="" href="" @click="Like()"><i class="far  fa-2x mt-1  fa-heart"></i></button>
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
                id_favorite: null,
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


        axios
         .get('/cekbookmark/'+this.id_author+'/'+this.id_artikel)
        .then((response) =>{
            this.id_favorite = response.data.id
            if (response.data.id > 0) {
            this.bookmark = true
            
            } else {
            this.bookmark = false
            }
            console.log('/cekbookmark/'+this.id_author+'/'+this.id_artikel);
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
                       
                                      axios
                           .get('/deletefavorite/'+this.id_favorite)
                         .then(console.log('/favorite/artikel/'+this.id_favorite));
          
                    this.bookmark = false
                }else{

                          axios
                           .get('/favorite/artikel/'+this.id_artikel)
                     .then(console.log('/favorite/artikel/'+this.id_like));
          
       
                    this.bookmark = true
                }
            }
            
        },
    }
</script>
