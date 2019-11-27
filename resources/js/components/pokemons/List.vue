<template>
    <div class="row">
       <spinner v-show="loading"></spinner>
        <div class="col-sm" v-for="pokemon in pokemons" v-bind:key="pokemon.id">

            <div class="card text-center h-100 trainer-card">
            <img class="card-img-top avatar rounded-circle mx-auto d-block" alt=""
            v-bind:src="pokemon.picture">
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
    import EventBus from '../../event-bus'
    export default{
        data(){
            return{
                pokemons: [
                    // {id: 1, name: 'Pikachu'},
                    // {id: 2, name: 'cubebom'},
                    // {id: 3, name: 'Charizard'},
                ], loading:true
            }
        },
        created(){ //created se ejecuta cuando este componente se crea
            EventBus.$on('pokemon-added', data => {  //escucha el evento 
                this.pokemons.push(data)
            })
        },
        mounted(){
            // console.log('component mount')
            //Usamos Axios, cliente HTTP basado en promesas
            // axios.get('http://127.0.0.1:8000/pokemons').then(response => (this.pokemons = response.data))
            axios.get('http://127.0.0.1:8000/pokemons')
            .then((rpse) => {
                this.pokemons = rpse.data
                this.loading = false
            })

       }
    }
</script>