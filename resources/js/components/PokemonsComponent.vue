<template>
    <div class="row">
       
        <div class="col-sm" v-for="pokemon in pokemons">

            <div class="card text-center h-100 trainer-card">
            <img class="card-img-top avatar rounded-circle mx-auto d-block" src="/images/" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{pokemon.name}}</h5>
                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure ex distinctio corrupti laudantium delectus nostrum, excepturi ipsum quo consequatur. Et sequi a rerum iste quaerat illum dolores autem porro expedita.</p>
                    <a href="/trainers/" class="btn btn-primary">Ver más...</a>
                </div>
            </div>
        </div>
       
    </div>
</template>

<script>
    export default{
        data(){
            return{
                pokemons: [
                    {id: 1, name: 'Pikachu'},
                    {id: 2, name: 'cubebom'},
                    {id: 3, name: 'Charizard'},
                ]
            }
        },
        mounted(){
            console.log('component mount')
        }
    }
</script>